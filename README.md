# 🚀 Premium Developer Portfolio

A high-performance, modern personal portfolio website built with a robust and scalable architecture. This project serves as a dynamic showcase of professional experience, projects, and skills.

## 🛠️ Tech Stack

- **Backend:** Laravel 13 (PHP 8.3)
- **Database:** MySQL
- **Frontend Engine:** React.js
- **SPA Bridge:** Inertia.js
- **Styling:** Tailwind CSS & Framer Motion
- **Admin CMS:** Filament PHP v3

## ✨ Features

- **Dynamic SPA Frontend:** Blazing fast navigation without page reloads using Inertia.js.
- **Bespoke UI/UX:** Ultra-premium jet-black dark mode (`#050505`) with ambient glow blobs, floating pill-shaped navbar, and center-aligned Hero section. Animations powered by Framer Motion.
- **Admin Dashboard (SPA Mode):** A fully functional, GUI-based CMS using Filament PHP with fully collapsible sidebar and SPA page transitions for managing Projects, Experiences, Education, and Skills.
- **AI CV Parser Integration:** Automatically populate profile data, experience, and education by uploading a PDF CV, powered by Google Gemini 2.5 Flash API.
- **Dynamic Image Gallery:** Attach multiple photos to experiences/projects and automatically render them as an interactive swipeable slider in the frontend.
- **Smart Tech Stack Matching:** Intelligent tech stack engine that auto-corrects typos (e.g., "veujs" -> "Vue") and renders full-color authentic SVG logos via SimpleIcons (`react-icons/si`).
- **Live Visitor Tracking:** Automatically logs page visits and visualizes them on the admin dashboard.

## 🚀 Installation Guide

1. Clone the repository:
   ```bash
   git clone https://github.com/firdhan29/websaya-portfolio.git
   ```
2. Install PHP dependencies:
   ```bash
   composer install
   ```
3. Install NPM dependencies:
   ```bash
   npm install
   ```
4. Copy the environment file and generate app key:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
5. Configure your database credentials in `.env`.
6. Run database migrations:
   ```bash
   php artisan migrate
   ```
7. Build the frontend assets:
   ```bash
   npm run build
   ```
8. Start the local development server:
   ```bash
   php artisan serve
   ```

## 🔐 Accessing the Admin Panel

Navigate to `/admin` in your browser.
Create a new admin user by running:
```bash
php artisan make:filament-user
```

---
*Developed by Firdhan*
