# Sistema Web Navina 
Laravel Web Project (Blade + Database)

This project is a Laravel web application using Blade templates and a relational database.
It follows a simple and clean structure suitable for teamwork and future scaling.

Requirements
Before starting, make sure you have the following installed:
PHP 8.1 or higher
Composer
MySQL
Git
Node.js & npm (for assets)
A local server XAMPP

Clone the Repository
git clone https://github.com/Juarex11/Sistema-web-Navina.git
cd Sistema-web-Navina

Select the Development Branch
git checkout develop
⚠️ All development must be done from develop or feature branches.
Do NOT work directly on main.


Install Dependencies
PHP dependencies
# composer install
Frontend dependencies
# npm install
Copy the environment file:
# cp .env.example .env
Generate the application key:
# php artisan key:generate

Database Configuration
Edit the .env file and set your database credentials:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=navina_db
DB_USERNAME=root
DB_PASSWORD=


Create the database manually in MySQL:
# CREATE DATABASE navina_db;

Run Migrations
# php artisan migrate

Compile Assets
# npm run dev

For production:
# npm run build

Run the Project
# php artisan serve

Then open your browser at:
# http://127.0.0.1:8000

Project Structure (Important)
app/
 └── Http/
     └── Controllers/

resources/
 ├── views/        ← Blade templates
 │   ├── layouts/
 │   ├── components/
 │   └── pages/
 └── css/
 └── js/

routes/
 └── web.php       ← Web routes (Blade)

database/
 ├── migrations/
 └── seeders/

Blade Guidelines
- Use layouts for shared UI
- Use components for reusable elements
- Avoid logic inside views
- Keep Blade files clean and readable


Example:
@extends('layouts.app')

@section('content')
    <h1>Welcome</h1>
@endsection
