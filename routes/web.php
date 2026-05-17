<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function (\Illuminate\Http\Request $request) {
    // Log the page visit
    \App\Models\PageVisit::create([
        'ip_address' => $request->ip(),
        'user_agent' => $request->userAgent(),
    ]);

    $user = \App\Models\User::first();
    $projects = \App\Models\Project::orderBy('created_at', 'desc')->get();
    $experiences = \App\Models\Experience::orderBy('is_current', 'desc')
        ->orderBy('end_date', 'desc')
        ->orderBy('start_date', 'desc')
        ->get();
    $skills = \App\Models\Skill::all();

    return Inertia::render('Portfolio', [
        'user' => $user,
        'projects' => $projects,
        'experiences' => $experiences,
        'skills' => $skills,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
