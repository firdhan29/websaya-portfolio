<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Form;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Smalot\PdfParser\Parser;
use App\Models\User;
use App\Models\Experience;
use App\Models\Education;
use Filament\Notifications\Notification;

class CvUploader extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'AI CV Parser';
    protected static ?string $navigationGroup = 'Profile Management';
    protected static ?string $title = 'Auto-Fill Profile with AI (CV Upload)';
    protected static ?int $navigationSort = 1;

    protected static string $view = 'filament.pages.cv-uploader';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('cv_file')
                    ->label('Upload Your CV Document (PDF)')
                    ->acceptedFileTypes(['application/pdf'])
                    ->helperText('Upload a PDF version of your CV. Our AI will automatically extract and fill your Summary, Experiences, and Educations.')
                    ->required()
                    ->directory('temp_cvs'),
            ])
            ->statePath('data');
    }

    public function processCv()
    {
        $data = $this->form->getState();
        $filePath = Storage::disk('public')->path($data['cv_file']);
        
        try {
            $parser = new Parser();
            $pdf = $parser->parseFile($filePath);
            $text = $pdf->getText();
            $text = substr($text, 0, 15000); // Limit tokens
        } catch (\Exception $e) {
            Notification::make()->title('Failed to read PDF file')->danger()->send();
            return;
        }

        $prompt = "You are an expert ATS CV parser. I will provide a CV text. Extract the following information and output ONLY a valid JSON block without any markdown formatting, backticks, or comments.
Schema:
{
  \"summary\": \"Brief professional summary based on the CV\",
  \"phone_wa\": \"Phone number, numbers only\",
  \"linkedin_url\": \"Full LinkedIn URL if found\",
  \"github_url\": \"Full GitHub URL if found\",
  \"experiences\": [
    {
      \"company\": \"Company Name\",
      \"position\": \"Job Title\",
      \"start_date\": \"YYYY-MM-DD\",
      \"end_date\": \"YYYY-MM-DD (or null if present)\",
      \"is_current\": boolean,
      \"description\": \"Detailed responsibilities\"
    }
  ],
  \"educations\": [
    {
      \"institution\": \"University/School Name\",
      \"degree\": \"Degree Name\",
      \"start_date\": \"YYYY-MM-DD\",
      \"end_date\": \"YYYY-MM-DD (or null if present)\"
    }
  ]
}

CV Text:
" . $text;

        $apiKey = env('GEMINI_API_KEY');
        if (!$apiKey) {
            Notification::make()
                ->title('Gemini API Key missing!')
                ->body('Please add GEMINI_API_KEY to your .env file.')
                ->danger()
                ->send();
            return;
        }

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key={$apiKey}", [
            'contents' => [
                ['parts' => [['text' => $prompt]]]
            ]
        ]);

        if ($response->successful()) {
            $jsonStr = $response->json('candidates.0.content.parts.0.text');
            $jsonStr = str_replace(['```json', '```'], '', $jsonStr);
            $parsedData = json_decode(trim($jsonStr), true);

            if ($parsedData) {
                // Update User
                $user = auth()->user();
                if (!empty($parsedData['summary'])) $user->summary = $parsedData['summary'];
                if (!empty($parsedData['phone_wa'])) $user->phone_wa = $parsedData['phone_wa'];
                if (!empty($parsedData['linkedin_url'])) $user->linkedin_url = $parsedData['linkedin_url'];
                if (!empty($parsedData['github_url'])) $user->github_url = $parsedData['github_url'];
                $user->save();

                // Experiences
                if (!empty($parsedData['experiences'])) {
                    foreach ($parsedData['experiences'] as $exp) {
                        Experience::create([
                            'company' => $exp['company'] ?? 'Unknown',
                            'position' => $exp['position'] ?? 'Unknown',
                            'start_date' => $exp['start_date'] ?? null,
                            'end_date' => $exp['end_date'] ?? null,
                            'is_current' => $exp['is_current'] ?? false,
                            'description' => $exp['description'] ?? null,
                        ]);
                    }
                }

                // Educations
                if (!empty($parsedData['educations'])) {
                    foreach ($parsedData['educations'] as $edu) {
                        Education::create([
                            'institution' => $edu['institution'] ?? 'Unknown',
                            'degree' => $edu['degree'] ?? 'Unknown',
                            'start_date' => $edu['start_date'] ?? null,
                            'end_date' => $edu['end_date'] ?? null,
                        ]);
                    }
                }

                Notification::make()
                    ->title('Success! AI parsed your CV.')
                    ->body('Your Summary, Experiences, and Educations have been automatically updated!')
                    ->success()
                    ->send();
                
                $this->form->fill();
            } else {
                Notification::make()->title('AI failed to return valid JSON.')->danger()->send();
            }
        } else {
            Notification::make()->title('AI API Connection Error')->danger()->send();
        }
    }
}
