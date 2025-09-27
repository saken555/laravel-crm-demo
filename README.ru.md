[Read in English](README.md)

# Demo CRM on Laravel

Простая CRM-система, созданная на фреймворке Laravel 11 в качестве демонстрационного проекта. Проект демонстрирует знание основных концепций Laravel, CRUD-операций, связей между моделями (Eloquent Relationships) и профессионального рабочего процесса с Git (Feature Branch Workflow, Pull Requests).

## Скриншот
![Dashboard Screenshot]https://github.com/saken555/laravel-crm-demo/blob/main/img.png


## Основные возможности (Features)

* **Аутентификация:** Регистрация и вход пользователей.
* **Дашборд:** Сводная статистика по клиентам, контактам и сделкам.
* **CRUD для Клиентов:** Полный цикл операций (Создание, Просмотр, Редактирование, Удаление) для компаний-клиентов.
* **CRUD для Контактов:** Управление контактными лицами с обязательной привязкой к клиенту (связь "Один ко многим").
* **CRUD для Сделок:** Управление сделками с привязкой к клиенту и контакту.

## Технический стек (Tech Stack)

* **Бэкенд:** PHP 8.2, Laravel 11
* **Фронтенд:** Blade, Tailwind CSS
* **База данных:** SQLite
* **Инструменты:** Git, GitHub, Composer, NPM

## Инструкция по установке и запуску (Installation Guide)

1.  Клонируйте репозиторий:
    ```bash
    git clone [https://github.com/saken555/laravel-crm-demo.git](https://github.com/saken555/laravel-crm-demo.git)
    ```
2.  Перейдите в папку проекта:
    ```bash
    cd laravel-crm-demo
    ```
3.  Установите зависимости PHP:
    ```bash
    composer install
    ```
4.  Создайте файл окружения `.env` из примера:
    ```bash
    cp .env.example .env
    ```
5.  Сгенерируйте ключ приложения:
    ```bash
    php artisan key:generate
    ```
6.  Создайте пустой файл для базы данных SQLite:
    ```bash
    touch database/database.sqlite
    ```
7.  Запустите миграции для создания таблиц в базе данных:
    ```bash
    php artisan migrate
    ```
8.  Установите зависимости JavaScript:
    ```bash
    npm install
    ```
9.  Скомпилируйте frontend-ассеты:
    ```bash
    npm run build
    ```
10. Настройте ваш локальный веб-сервер (например, Apache в LAMPP) так, чтобы корневой директорией сайта была папка `public/`.
