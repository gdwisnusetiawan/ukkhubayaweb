# UKKH Ubaya Management System

> A comprehensive web-based platform for managing student activity units (UKKH) at the University of Surabaya (Ubaya).

## 📋 Overview

This application serves as a centralized hub for managing various aspects of student organizations, including member registries, event planning, committee structures, and contact profiles. It is designed to streamline administrative tasks and improve communication within the university's student body.

## 🛠 Tech Stack

**Backend**
*   **Language:** PHP 7.2+
*   **Framework:** Laravel 6.2
*   **Database:** PostgreSQL

**Frontend**
*   **Framework:** Vue.js
*   **Styling:** Bootstrap 4, AdminLTE 3
*   **Build Tool:** Laravel Mix (Webpack)
*   **Libraries:** jQuery, Axios

## ✨ Key Features

*   **User Management:** Role-based access control for administrators, viewers, and members.
*   **Organization Hierarchy:** Manage Faculties, Study Programs, and organizational Periods.
*   **Activity Management:** Create and track Events, Committees, and Management boards.
*   **Member Directory:** Detailed profiles for members including contact information.
*   **Secure Authentication:** Built-in email verification and secure password handling.
*   **File Storage:** Custom logic for securely displaying storage images.

## 🚀 Setup & Installation

To run this project locally, follow these steps:

### Prerequisites
*   PHP >= 7.2
*   Composer
*   Node.js & NPM
*   PostgreSQL

### Installation

1.  **Clone the repository**
    ```bash
    git clone https://github.com/yourusername/ukkhubayaweb.git
    cd ukkhubayaweb
    ```

2.  **Install PHP dependencies**
    ```bash
    composer install
    ```

3.  **Install JavaScript dependencies**
    ```bash
    npm install
    ```

4.  **Environment Configuration**
    Copy the example environment file and configure your database credentials.
    ```bash
    cp .env.example .env
    ```
    Update the `.env` file with your PostgreSQL settings:
    ```
    DB_CONNECTION=pgsql
    DB_HOST=127.0.0.1
    DB_PORT=5432
    DB_DATABASE=ukkhubaya
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
    ```

5.  **Generate App Key**
    ```bash
    php artisan key:generate
    ```

6.  **Run Migrations & Seeders**
    ```bash
    php artisan migrate --seed
    ```

7.  **Compile Assets**
    ```bash
    npm run dev
    ```

8.  **Serve Application**
    ```bash
    php artisan serve
    ```
    Visit `http://localhost:8000` in your browser.

## ⚠️ Disclaimer

> "This is a sanitized version of a private repository for portfolio demonstration purposes."