# CRUD Blog Application

This is a simple CRUD (Create, Read, Update, Delete) blog application built with Laravel. The application allows users to manage blog posts, including creating, viewing, editing, and deleting posts.

## Features

- **Create**: Add new blog posts with title, content, and status.
- **View**: View a post details.
- **List**: List aall posts.
- **Update**: Edit existing blog posts.
- **Delete**: Remove blog posts.

## Technologies Used

- Laravel: PHP framework for building web applications.
- MySQL: Database management system.
- Blade: Laravel’s templating engine.
- CSS: For styling the user interface.

## Prerequisites

Before you begin, ensure you have the following installed:

- PHP >= 8.2
- Composer
- MySQL

## Installation

1. **Clone the Repository**

   ```bash
   git clone https://github.com/athapa20-une/my-blog-une.git
   cd my-blog-une

2. **Install Dependencies**

    ```bash
   composer install

3. **Set Up Environment File**

    Copy the .env.example file to .env and configure your database settings:

    ```bash
    cp .env.example .env
    ```
    Edit the .env file to match your database       credentials:
    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=my_blog_une
    DB_USERNAME=root
    DB_PASSWORD=
    ```
4. **Run Migrations**
    ```bash
    php artisan migrate
    ```
5. **Seed the Database (to get the 10 dummy datas in posts table)**
    ```bash
    php artisan db:seed
    ```
6. **Start the Development Server**
    ```bash
    php artisan serve
    ```
