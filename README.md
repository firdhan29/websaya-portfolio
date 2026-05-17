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
- **Bespoke UI/UX:** Premium dark-mode aesthetic with smooth scroll animations via Framer Motion.
- **Admin Dashboard:** A fully functional, GUI-based CMS using Filament PHP for managing Projects, Experiences, and Profile settings.
- **Live Visitor Tracking:** Automatically logs page visits and visualizes them on the admin dashboard.
- **Smart Tech Tags:** Auto-suggests programming languages and translates them into sleek UI badges.

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
