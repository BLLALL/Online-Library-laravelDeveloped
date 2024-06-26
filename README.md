# اقرأ - Online Book Reading and Download Platform

اقرأ is a web application that allows users to browse, read, and download books. It features user authentication, book management, and an admin panel for content management.

## Features

- User Authentication (Register, Login)
- Browse books by categories and authors
- Read books online
- Download books
- Add books to favorites
- User profile management
- Admin panel for CRUD operations on categories, authors, and books

## Technologies Used

- Backend: Laravel
- Frontend: Custom CSS and vanilla JavaScript
- Database: MySQL

## Prerequisites

- PHP >= 7.3
- Composer
- Node.js and npm
- [Any other specific requirements]

## Installation
1. Clone the repository:
gh repo clone BLLALL/Online-Library-laravelDeveloped

2. Install PHP dependencies:
composer install

3. Install JavaScript dependencies:
npm install

4. Create a copy of the .env file:
cp .env.example .env

5. Configure your database in the .env file:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password

6. Generate application key:
php artisan key:generate

7. Run database migrations:
php artisan migrate

8. Start the development server:
php artisan serve

## Usage

- Visit `http://localhost:8000/home` in your web browser
- Register a new account and log in
- Browse books, read online, or download
- Admins can access the admin panel at `/admin` to manage content
