# Forahia Project Management Solution
PMS was built using Laravel 11 and React.

## Features
1. Registration & Login
2. Projects CRUD with sorting, filtering and pagination
3. Tasks CRUD with sorting, filtering and pagination
4. Create Tasks inside project
5. Show all tasks or show tasks for a specific project
6. Assign users to tasks
7. View Tasks assigned to me
8. Show dashboard with overview information

## Installation
1. Clone the project
2. Navigate to the project's root directory using terminal
3. Create `.env` file - `cp .env.example .env`
4. Execute `composer install`
5. Execute `npm install`
6. Set application key - `php artisan key:generate --ansi`
7. Execute migrations and seed data - `php artisan migrate --seed`
8. Start vite server - `npm run dev`
9. Start Artisan server - `php artisan serve`

## Demo
https://pms.forahia.org.ng/

