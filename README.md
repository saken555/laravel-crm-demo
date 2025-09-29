[Читать на русском](README.ru.md)

# Demo CRM on Laravel (with Feature Tests)

A simple CRM system built with the Laravel 11 framework. This project was initially built with basic functionality and then refactored to incorporate clean architecture concepts.

The project demonstrates a understanding of core Laravel concepts, clean architecture patterns (Form Requests, Policies, Service Layer), database relationships, automated testing, and a Git workflow (Feature Branch Workflow, Pull Requests). The development environment is fully containerized using Docker and Laravel Sail.

## Screenshot
![Dashboard Screenshot](https://github.com/saken555/laravel-crm-demo/blob/main/img.png?raw=true)

## Key Features

* **Authentication:** User registration and login (Laravel Breeze).
* **Dashboard:** A summary dashboard with statistics on clients, contacts, and deals.
* **Clients, Contacts, Deals:** Full CRUD functionality for all core CRM entities.
* **Database Relationships:** Implemented One-to-Many relationships (Client -> Contacts, Client -> Deals).

## Tech Stack & Concepts Demonstrated

* **Backend:** PHP 8.3, Laravel 11
* **Frontend:** Blade, Tailwind CSS
* **Database:** SQLite
* **Development Environment:** Docker, Laravel Sail
* **Architecture & Patterns:**
    * MVC (Model-View-Controller)
    * **Service Layer:** Business logic is encapsulated in Service classes, keeping controllers thin.
    * **Form Requests:** Validation logic is separated from controllers into dedicated request classes.
    * **Policies:** Authorization logic is handled by Policy classes to define user permissions.
* **Testing:**
    * Feature tests written with **PHPUnit**.
    * In-memory SQLite database for fast and isolated test runs.
* **Tooling:** Git, GitHub, Composer, NPM

## Installation and Setup (via Docker & Sail)

This project is configured to run with Laravel Sail. The only prerequisite is to have [Docker Desktop](https://www.docker.com/products/docker-desktop/) installed.

1.  Clone the repository:
    ```bash
    git clone [https://github.com/saken555/laravel-crm-demo.git](https://github.com/saken555/laravel-crm-demo.git)
    ```
2.  Navigate to the project directory:
    ```bash
    cd laravel-crm-demo
    ```
3.  Create a copy of the `.env.example` file:
    ```bash
    cp .env.example .env
    ```
4.  Install PHP dependencies via a temporary Docker container:
    ```bash
    docker run --rm \
        -u "$(id -u):$(id -g)" \
        -v "$(pwd):/var/www/html" \
        -w /var/www/html \
        laravelsail/php83-composer:latest \
        composer install --ignore-platform-reqs
    ```
5.  Start the Sail containers in the background:
    ```bash
    ./vendor/bin/sail up -d
    ```
6.  Generate the application key:
    ```bash
    ./vendor/bin/sail artisan key:generate
    ```
7.  Run the database migrations:
    ```bash
    ./vendor/bin/sail artisan migrate
    ```
8.  The application is now running and available at **http://localhost**.