# Docker Apache + PHP with MariaDB application

This project sets up a web application using Docker with an Apache + PHP container and a MySQL/MariaDB database container.

## Project Structure

```
Projekt Narz_prog
├── src
│   ├── html
│   │   ├── index.php
│   │   ├── login.php
│   │   ├── ftp_server.php
│   │   └── register.php
│   ├── php
│   │   ├── connect.php
│   │   ├── logout.php
│   │   ├── login2.php
│   │   └── register2.php
│   ├── css
│   │   ├── style1.css
│   │   ├── style2.css
│   │   ├── style_login.css
│   │   └── style_register.css
│   ├── arch_logo.png
│   └── users.sql
├── docker-compose.yml
├── Dockerfile
└── README.md
```

## Setup Instructions

1. **Clone the Repository**
   ```bash
   git clone https://github.com/JakubTydryszewski/Projekt_NarzProg
   cd "Projekt Narz_prog"
   ```

2. **Build and Run the Containers**
   ```bash
   docker-compose up --build
   ```

3. **Access the Application**
   Open your web browser and navigate to `http://localhost/html/index.php`. (temporary solution)

## Usage Guidelines

- The application allows users to register, log in, and log out.
- User credentials are stored in a MySQL/MariaDB database.
- The application is styled using CSS files located in the `src` directory.

## Database Setup

The `users.sql` file contains the SQL commands to create the necessary database structure. It will be executed automatically when the database container is started.