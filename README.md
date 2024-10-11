# Vaccine Scheduling System

A comprehensive vaccine scheduling system built with Laravel. 
This application is designed to manage user registration, login, vaccine appointment scheduling, and email notifications. It aims to provide a user-friendly platform for individuals to book vaccination slots efficiently.

- This project is containerized with docker.
- Using laravel service repository design pattern.
- 20 Vaccine center are created with seeder.
- Registration feature.
- User login feature.
- Profile page with current status.
- Served with first come first serve.
- Every weekend are considered.
- Weekday schedule starts from 9am.
- Every schedule has 5 minutes interval.
- Only one schedule can create for every person. (some feature like delete schedule, update user vaccine center before schedule make are not considered for limited time).
- Search feature are implemented. 
- If user will take their vaccine on their scheduled date. Show the Vaccinated status if the scheduled date is passed.
- Email notification are implemented with laravel job and queue.


## Table of Contents

- [Features](#features)
- [Technologies Used](#technologies-used)
- [Installation](#installation)
- [Configuration](#configuration)
- [Queue Configuration](#queue-configuration)
- [Usage](#usage)
- [Testing](#testing)
- [Improvements](#improvement)

## Features

- **User Registration:** Users can register with their personal information and receive a unique registration number.
- **User Authentication:** Secure login/logout functionality with password hashing.
- **Vaccine Center Management:** Users can view all available vaccine centers and select one for scheduling.
- **Appointment Scheduling:** Users can book appointments and check available slots at their selected vaccine center.
- **Profile Management:** Users can view and update their profile and vaccination status.
- **Email Notifications:** Users receive email reminders for their scheduled appointments.
- **Admin Panel (Future Scope):** Potential for admin functionality to manage users and schedules (currently not implemented).

## Technologies Used

- **PHP**: Version 8.0 or higher
- **Laravel**: Version 10.x
- **MySQL**: For the database
- **Composer**: For dependency management
- **Guzzle**: For HTTP requests (if needed)
- **Laravel Queues**: For background job processing (email notifications)
- **Laravel Blade**: For templating
- **Docker**: For containerization the project

## Installation

1. **Clone the repository:**
- git clone https://github.com/Zannatul/kahf.git
- Go project root folder.
- Open terminal and run following commands.
- ```bash
   sudo docker compose build
   sudo docker compose up -d
   sudo docker exec -it kahf sh
    composer install
   cp .env.example .env
    php artisan key:generate  
    php artisan migrate
    php artisan db:seed

- if face any problem related to FROM php:8.2-fpm-alpine then please run this command.
- ```bash
    rm  ~/.docker/config.json 

## Configuration
- MAIL_MAILER=smtp
- MAIL_HOST=smtp.mailgun.org
- MAIL_PORT=587
- MAIL_USERNAME=your_username
- MAIL_PASSWORD=your_password
- MAIL_ENCRYPTION=tls
- MAIL_FROM_ADDRESS=no-reply@example.com
- MAIL_FROM_NAME="${APP_NAME}"
- QUEUE_CONNECTION=database

## Queue Configuration

- ```bash
    php artisan queue:work

## Testing
- No text cases are written.

## improvement
This projects has lots of improvements options. For search faster improvements.

**Indexing:** Use full-text search indexes to speed up queries. Laravel has built-in support for MySQL full-text indexing with the fullText method in migrations.

**Database Optimization**: Optimize database queries by limiting the number of columns you select, ensuring that you're only retrieving necessary data.Use ->select() to specify columns instead of selecting all.
Consider eager loading related models to reduce database queries using with().

**Caching:** Implement caching for frequently searched terms or results using Laravel’s caching features.


**SMS Notification :** If we consider sms notification along with emial notification,we need to setup SMS provider, create notification class, modify my existing job, update user model use notifiable and some another related task.


