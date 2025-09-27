[Читать на русском](README.ru.md)

# Demo CRM on Laravel

A simple CRM system built with the Laravel 11 framework as a portfolio project. The project demonstrates knowledge of core Laravel concepts, CRUD operations, Eloquent Relationships, and a professional Git workflow (Feature Branch Workflow, Pull Requests).

## Screenshot
![Dashboard Screenshot](https://github.com/saken555/laravel-crm-demo/blob/main/img.png?raw=true)

## Features

* **Authentication:** User registration and login.
* **Dashboard:** A summary dashboard with statistics on clients, contacts, and deals.
* **Clients CRUD:** Full Create, Read, Update, Delete operations for client companies.
* **Contacts CRUD:** Manage contact persons with a mandatory relationship to a client (One-to-Many relationship).
* **Deals CRUD:** Manage sales deals with relationships to clients and contacts.

## Tech Stack

* **Backend:** PHP 8.2, Laravel 11
* **Frontend:** Blade, Tailwind CSS
* **Database:** SQLite
* **Tooling:** Git, GitHub, Composer, NPM

## Installation and Setup

1.  Clone the repository:
    ```bash
    git clone [https://github.com/saken555/laravel-crm-demo.git](https://github.com/saken555/laravel-crm-demo.git)
    ```
2.  Navigate to the project directory:
    ```bash
    cd laravel-crm-demo
    ```
3.  Install PHP dependencies:
    ```bash
    composer install
    ```
4.  Create a copy of the `.env.example` file:
    ```bash
    cp .env.example .env
    ```
5.  Generate the application key:
    ```bash
    php artisan key:generate
    ```
6.  Create an empty file for the SQLite database:
    ```bash
    touch database/database.sqlite
    ```
7.  Run the database migrations to create the tables:
    ```bash
    php artisan migrate
    ```
8.  Install JavaScript dependencies:
    ```bash
    npm install
    ```
9.  Compile frontend assets:
    ```bash
    npm run build
    ```
10. Configure your local web server (e.g., Apache in LAMPP) to point the document root to the `public/` directory.
