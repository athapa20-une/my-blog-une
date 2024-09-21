# Advance CRUD Blog Application

This is a comprehensive CRUD (Create, Read, Update, Delete) blog application built with Laravel. The application allows users to manage blog posts, including creating, viewing, editing, and deleting posts. It also includes user role management and permission-based access control to ensure only authorized users can manage content.

There is an API endpoints that is used for my react blog applications.

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
- **APIS**: the API endpoints for my react blog application.


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
   DB_USERNAME= # Leave blank if not using authentication
   DB_PASSWORD= # Leave blank if not using authentication
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

## API Endpoints

The application provides a set of API endpoints for managing blog posts:

### **Blog Posts (From api and frontend blog application)**

- **GET /api/posts** - Retrieve a list of all blog posts.
- **GET /api/posts/{id}** - Retrieve details of a single blog post.

### **Authentication (From Admin Panel)**

- **POST /api/login** - Authenticate a user and retrieve a token.
- **POST /api/logout** - Log out the authenticated user.

### **User Management (From Admin Panel: Admin Only)**

- **GET /api/users** - Retrieve a list of all users.
- **GET /api/users/{id}** - Retrieve details of a specific user.
- **POST /api/users** - Create a new user.
- **PUT /api/users/{id}** - Update user information.
- **DELETE /api/users/{id}** - Delete a user.

## Approach

### 1. **API Development**
   - The application uses the Laravel sanctum to build a robust RESTful API, following best practices such as proper HTTP status codes and responses.
   - The `Laravel Sanctum` package was used for token-based authentication, ensuring secure access to protected routes.

### 2. **Data Storage and Retrieval**
   - MongoDB was selected as the database, providing flexibility in storing blog posts and user data.
   - Eloquent ORM was used to manage data models and interact with the MongoDB database.

### 3. **Role-Based Access Control**
   - Role and permission management was implemented to ensure that only authorized users can perform certain actions.
   - Admin users have full control over posts and user management, while regular users have restricted permissions.

## Challenges

1. **Error Handling and Validation**:
   - Providing meaningful error messages for API consumers was crucial. This was managed by using Laravel's built-in validation features and custom error handling.

## License

- **Name:** Anish Thapa
- **Email**: athapa20@myune.edu.au
- **Student Id**: 220277013