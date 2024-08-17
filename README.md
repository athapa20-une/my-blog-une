# Advance CRUD Blog Application

This is a comprehensive CRUD (Create, Read, Update, Delete) blog application built with Laravel. The application allows users to manage blog posts, including creating, viewing, editing, and deleting posts. It also includes user role management and permission-based access control to ensure only authorized users can manage content.

## Features

- **Authentication**: Secure login and logout functionality for users.
- **Authorization**: Role-based access control with admin privileges.
- **Create**: Add new blog posts with title, content, and status (e.g., Draft, Published).
- **View**: View detailed information of each blog post.
- **List**: Display a list of all blog posts with options to filter by status or author.
- **Update**: Edit existing blog posts and change their content or status.
- **Delete**: Remove blog posts from the database.
- **User Management**: Admins can manage users, assign roles, and set permissions.
- **Permissions**: Fine-grained control over what users can do, such as creating, editing, or deleting posts.

## Technologies Used

- **Laravel**: A powerful PHP framework for building modern web applications.
- **MongoDB**: A NoSQL database system for flexible and scalable data storage.
- **Blade**: Laravel’s templating engine for dynamic, reusable views.
- **Bootstrap**: For responsive and clean user interface styling.
- **CSS**: Additional custom styling for enhanced user experience.

## Prerequisites

Before you begin, ensure you have the following installed:

- **PHP >= 8.2**: Required for Laravel 11.
- **Composer**: Dependency manager for PHP.
- **MongoDB**: NoSQL database management system for storing blog data.

## Installation

1. **Clone the Repository**

   Clone the repository to your local machine:
   ```bash
   git clone https://github.com/athapa20-une/my-blog-une.git
   cd my-blog-une
   ```

2. **Install Dependencies**

   Install the necessary dependencies using Composer:
   ```bash
   composer install
   ```

3. **Set Up Environment File**

   Copy the `.env.example` file to `.env` and configure your database settings:
   ```bash
   cp .env.example .env
   ```
   Edit the `.env` file to match your MongoDB database credentials:
   ```bash
   DB_CONNECTION=mongodb
   DB_HOST=127.0.0.1
   DB_PORT=27017
   DB_DATABASE=my_blog_une
   DB_USERNAME=
   DB_PASSWORD=
   ```

4. **Run Migrations**

   Set up your database schema by running the migrations:
   ```bash
   php artisan migrate
   ```

5. **Seed the Database**

   Populate your database with 10 dummy blog posts:
   ```bash
   php artisan db:seed
   ```

6. **Start the Development Server**

   Launch the application using Laravel’s built-in server:
   ```bash
   php artisan serve
   ```

## Usage

- **Admin Access**: Only users with the admin role can manage users, assign roles, and configure permissions.
- **User Access**: Regular users can create, edit, or delete posts based on their assigned permissions.

## Contribution

If you would like to contribute to this project, please fork the repository and submit a pull request. We welcome contributions that enhance functionality, improve code quality, or fix bugs.

## License

This project is open-source and available under the [MIT License](https://opensource.org/licenses/MIT).

---

This README now accurately reflects your use of MongoDB as the database, along with the updated installation and configuration instructions.