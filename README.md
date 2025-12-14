# Todo List Application

A simple and elegant Todo List application built with Laravel 10, featuring user authentication and complete CRUD operations.

## Features

- **User Authentication**: Register and login functionality using Laravel UI
- **Create Todos**: Add new tasks with title and description
- **View Todos**: See all your todos in a clean, organized list
- **Update Todos**: Edit todo details and mark them as complete/incomplete
- **Delete Todos**: Remove todos you no longer need
- **User Authorization**: Each user can only access their own todos
- **Responsive Design**: Bootstrap-based UI that works on all devices

## Requirements

- PHP 8.1 or higher
- Composer
- Node.js and NPM

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/ahmedwelee/todo.git
   cd todo
   ```

2. Install PHP dependencies:
   ```bash
   composer install
   ```

3. Install JavaScript dependencies:
   ```bash
   npm install
   ```

4. Create environment file:
   ```bash
   cp .env.example .env
   ```

5. Generate application key:
   ```bash
   php artisan key:generate
   ```

6. Configure database in `.env` file. By default, SQLite is configured:
   ```
   DB_CONNECTION=sqlite
   ```
   
   Create the SQLite database file if it doesn't exist:
   ```bash
   touch database/database.sqlite
   ```

7. Run database migrations:
   ```bash
   php artisan migrate
   ```

8. Build frontend assets:
   ```bash
   npm run build
   ```

## Usage

1. Start the development server:
   ```bash
   php artisan serve
   ```

2. Visit `http://localhost:8000` in your browser

3. Register a new account or login with existing credentials

4. Start managing your todos!

## Application Structure

- **Models**: `App\Models\Todo` - Todo model with user relationship
- **Controllers**: `App\Http\Controllers\TodoController` - Handles all todo operations
- **Policies**: `App\Policies\TodoPolicy` - Authorization logic for todo access
- **Views**: `resources/views/todos/` - Blade templates for todo pages
- **Routes**: `routes/web.php` - Application routes

## Technologies Used

- **Laravel 10**: PHP web application framework
- **Laravel UI**: Authentication scaffolding with Bootstrap
- **SQLite**: Lightweight database
- **Bootstrap 5**: CSS framework
- **Blade**: Laravel templating engine

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
