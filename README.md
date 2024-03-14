<# Laravel Project Setup

This guide will walk you through setting up a Laravel project from scratch.

## Prerequisites

- PHP (>=7.4)
- Composer
- Node.js (>=14)
- NPM or Yarn
- MySQL or SQLite

## Installation

1. Clone this repository:

   ```bash
   git clone <repository-url>
## Navigate into the project directory:

cd <project-directory>
## Install PHP dependencies:

composer install
Copy the .env.example file to .env:

cp .env.example .env
Generate an application key:

php artisan key:generate

Update the .env file with your database credentials.

Database Setup
Create a new database for your project.

Update the .env file with your database credentials:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password

Migrate the database:

php artisan migrate

## Development Server
To start a development server, run:

php artisan serve

Your application will be available at http://localhost:8000.

## Update Node packages
Run 
npm install
npm run dev