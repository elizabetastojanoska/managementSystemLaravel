Task Manager

A simple Laravel application to manage projects, tasks, and categories. The application provides an API as well as a user interface to interact with projects, tasks, and categories, including filtering and marking tasks as completed.

Features
Projects: Create, list, and filter projects.
Categories: Create and list categories for organizing tasks.
Tasks: Create tasks, assign them to projects and categories, filter tasks by status and category, and mark tasks as completed.

Technologies Used
Laravel 8.x (or higher)
PHP 7.4 (or higher)
MySQL (or any compatible database)
Bootstrap 5 for frontend design

Setup Instructions
Step 1: Clone the Repository
Clone the project repository to your local machine:

git clone https://github.com/elizabetastojanoska/managementSystemLaravel.git

Navigate to the project directory:

cd task-manager

Step 2: Install Dependencies
Make sure you have Composer installed on your machine. If not, you can download it from here.

Run the following command to install all the necessary dependencies:

composer install

Step 3: Set Up the Environment File
Copy the .env.example file to create a new .env file:


cp .env.example .env
Step 4: Configure Database
In the .env file, configure the database connection. For example, if you're using MySQL:

DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=task_manager

DB_USERNAME=root

DB_PASSWORD=

Make sure you have a database called task_manager (or whatever you specify) created in your MySQL database.

Step 5: Generate Application Key
Run the following command to generate a unique application key for your Laravel app:


php artisan key:generate

Step 6: Run Migrations
Run the migrations to create the necessary tables in the database:


php artisan migrate

Step 7: Serve the Application
Run the application using the built-in Laravel development server:

php artisan serve
This will start the application at http://127.0.0.1:8000.
