# Basic MVC Skeleton Project

This project provides a foundational Model-View-Controller (MVC) skeleton for building simple PHP web applications. It's designed to be a starting point, demonstrating a basic separation of concerns and incorporating modern PHP practices.

## Features

*   **MVC Architecture:** Clear separation of application logic into Models, Views, and Controllers.
*   **PSR-4 Autoloading:** Classes are autoloaded using Composer's PSR-4 standard.
*   **Basic Routing:** A simple routing mechanism (implied by `public/index.php` and `HomeController`).
*   **Modern PHP Practices:** Utilizes strict types and type hinting for improved code quality and maintainability.
*   **Basic Error Handling:** Custom exception for view not found scenarios.
*   **Dependency Management:** Uses Composer for managing project dependencies.
*   **Basic Testing Setup:** Includes a basic setup for unit tests with PHPUnit.

## Prerequisites

Before you begin, ensure you have the following installed on your system:

*   **PHP:** Version 8.0 or higher.
*   **Composer:** The PHP dependency manager.
*   **Web Server:** Apache, Nginx, or PHP's built-in development server.

## Installation

Follow these steps to get the project up and running on your local machine:

1.  **Clone the repository:**

    ```bash
    git clone https://github.com/4ndrenobr3/basic-mvc-skeleton.git
    cd basic-mvc-skeleton
    ```

2.  **Install Composer dependencies:**

    ```bash
    composer install
    ```

3.  **Configure your web server (e.g., Apache/Nginx):**

    Point your web server's document root to the `public/` directory of this project. This ensures that `public/index.php` is the entry point for all requests.

    **Example for Apache (`.htaccess` or Virtual Host configuration):**
    ```apache
    # .htaccess in the project root
    <IfModule mod_rewrite.c>
        RewriteEngine On
        RewriteRule ^(.*)$ public/$1 [L]
    </IfModule>
    ```

    **Alternatively, use PHP's built-in development server:**

    From the project root directory, run:
    ```bash
    php -S localhost:8000 -t public/
    ```

## Usage

After successful installation and server configuration, open your web browser and navigate to:

```
http://localhost:8000/
```

(If using the built-in PHP server, or your configured domain/IP if using Apache/Nginx).

You should see the output from the `HomeController`.

## Further Development

Refer to `GEMINI.md` for an overview of modern PHP best practices and PSR standards, and `docs/TODO.md` for a list of suggested improvements and tasks to further modernize and enhance this project.
