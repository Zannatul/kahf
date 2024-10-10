# Vaccine Scheduling System

A comprehensive vaccine scheduling system built with Laravel. This application is designed to manage user registration, login, vaccine appointment scheduling, and email notifications. It aims to provide a user-friendly platform for individuals to book vaccination slots efficiently.

## Table of Contents

- [Features](#features)
- [Technologies Used](#technologies-used)
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [Directory Structure](#directory-structure)
- [API Endpoints](#api-endpoints)
- [Queue Configuration](#queue-configuration)
- [Testing](#testing)
- [License](#license)

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
- **Laravel**: Version 9.x
- **MySQL** or **SQLite**: For the database
- **Composer**: For dependency management
- **Guzzle**: For HTTP requests (if needed)
- **Laravel Queues**: For background job processing (email notifications)
- **Laravel Blade**: For templating

## Installation

1. **Clone the repository:**

## Configuration
- MAIL_MAILER=smtp
- MAIL_HOST=smtp.mailgun.org
- MAIL_PORT=587
- MAIL_USERNAME=your_username
- MAIL_PASSWORD=your_password
- MAIL_ENCRYPTION=tls
- MAIL_FROM_ADDRESS=no-reply@example.com
- MAIL_FROM_NAME="${APP_NAME}"
   
