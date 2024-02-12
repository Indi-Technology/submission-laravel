<p align="center">
  <a href="https://github.com/taufikhdyt01/submission-laravel">
    <h1 align="center" style="color: #4B47FF">Laravel Beginner Demo-Project: Personal Blog</h1>
  </a>
  <p align="center">
    This project submission for MSIB INDI Technology utilizes Laravel Breeze (Tailwind CSS) as its Auth Starter Kit.
  </p>
</p>

# Profile
-   Taufik Hidayat - Universitas Brawijaya

# Getting Started

## Prerequisites

You will need the following to run StuBaby:

-   PHP >= 8.0.2
-   Composer
-   NPM
-   Database server (MySQL, MariaDB, PostgreSQL, or SQLite)

## Installation

The following steps will guide you through the installation process for running in a development environment locally on your machine:

1. Clone the latest version from the repository
2. Run `composer install` to install the required PHP dependencies
3. Copy the .env.example file to .env and edit the database credentials according to your database server
4. Run `php artisan key:generate` to generate a new application key
5. Run `php artisan migrate` to create the database tables. You can also add the `--seed` flag to seed the database with some dummy data
6. Run `php artisan serve` to start the development server
7. Open another terminal and run `npm install && npm run build` to install the required node modules
8. Run `npm run dev` to compile the assets for development
9. Open your browser and go to `http://localhost:8000` to view the application
10. You can login to manage articles with default credentials `admin@example.com` - `password`
