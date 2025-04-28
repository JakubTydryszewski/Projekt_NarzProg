# Docker Apache + PHP with MariaDB

This project sets up a web application using Docker with an Apache + PHP container and a MySQL/MariaDB database container.

## Project Structure

```
Projekt Narz_prog
├── src
│   ├── index.php
│   ├── connect.php
│   ├── login.php
│   ├── login2.php
│   ├── logout.php
│   ├── register.php
│   ├── register2.php
│   ├── style1.css
│   ├── style_login.css
│   ├── style_register.css
│   └── users.sql
├── docker-compose.yml
├── Dockerfile
└── README.md
```

## Setup Instructions

1. **Clone the Repository**
   ```bash
   git clone <repository-url>
   cd "Projekt Narz_prog"
   ```

2. **Build and Run the Containers**
   ```bash
   docker-compose up --build
   ```

3. **Access the Application**
   Open your web browser and navigate to `http://localhost`.

## Usage Guidelines

- The application allows users to register, log in, and log out.
- User credentials are stored in a MySQL/MariaDB database.
- The application is styled using CSS files located in the `src` directory.

## Database Setup

The `users.sql` file contains the SQL commands to create the necessary database structure. It will be executed automatically when the database container is started.

## Contributing

Feel free to submit issues or pull requests for improvements or bug fixes.