<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Laravel eCommerce Backend API

This project is a backend solution for an eCommerce platform built using **Laravel 9**. It provides endpoints for managing users, customers, products, employees, payments, orders, and more. JWT-based authentication secures the API.

---

## Features

### **Authentication**
- User registration and login with JWT Authentication.
- Password hashing for security.
- Logout endpoint for token invalidation.

### **Customers**
- Retrieve all customers with their sales representatives.
- Get customers with order counts.
- Fetch customers' highest credit limits.
- Calculate total amounts paid by customers.

### **Employees**
- List all employees.
- Get employee details by employee number.
- Retrieve employees by office code.

### **Offices**
- List all offices.
- Get offices filtered by country.

### **Products**
- Retrieve all products with their product lines.
- List products in stock.
- Search for products with filters.

### **Orders**
- Fetch orders by customer with pagination.
- Retrieve pending orders.
- Get order details by order number.

### **Payments**
- Fetch total payment amounts for specific customers.
- Retrieve payments within a given date range.

---

## Requirements

Ensure the following dependencies are installed on your system:
- **PHP 8.0.2 or higher**
- **Composer**
- **MySQL**
- **Laravel 9.x**

This project requires the following packages:

```json
"php": "^8.0.2",
"guzzlehttp/guzzle": "^7.2",
"laravel/framework": "^9.19",
"laravel/sanctum": "^3.0",
"laravel/tinker": "^2.7",
"tymon/jwt-auth": "^2.1"
```

---

## Installation Guide

1. **Clone the repository:**
   ```bash
   git clone <your-repository-link>
   cd <project-folder>
   ```

2. **Install dependencies:**
   ```bash
   composer install
   ```

3. **Configure environment variables:**
   - Duplicate `.env.example` and rename it to `.env`.
   - Update database credentials, JWT secret, and other configuration values.
   ```bash
   php artisan key:generate
   ```

4. **Run database migrations:**
   ```bash
   php artisan migrate
   ```

5. **Generate JWT secret:**
   ```bash
   php artisan jwt:secret
   ```

6. **Start the Laravel development server:**
   ```bash
   php artisan serve
   ```

---

## API Endpoints

Below are some key endpoints for this eCommerce backend:

### **Authentication**
| Method | Endpoint          | Description                |
|--------|-------------------|----------------------------|
| POST   | `/api/register`   | Register a new user        |
| POST   | `/api/login`      | Login and get JWT token    |
| POST   | `/api/logout`     | Logout and invalidate token|

### **Customers**
| Method | Endpoint                        | Description                              |
|--------|---------------------------------|------------------------------------------|
| GET    | `/api/customers`                | Get all customers                        |
| GET    | `/api/customers/highest-credit` | Get customer with highest credit limit   |
| GET    | `/api/customers/order-count`    | Get customers with their order counts    |
| GET    | `/api/customers/total-paid`     | Calculate total payment by each customer |

### **Employees**
| Method | Endpoint                        | Description                          |
|--------|---------------------------------|--------------------------------------|
| GET    | `/api/employees`                | Get all employees                    |
| GET    | `/api/employees/{id}`           | Get employee by ID                   |
| GET    | `/api/employees/office/{code}`  | Get employees by office code         |

### **Products**
| Method | Endpoint                          | Description                          |
|--------|-----------------------------------|--------------------------------------|
| GET    | `/api/products`                   | Get all products                     |
| GET    | `/api/products/in-stock`          | Get products in stock                |
| GET    | `/api/products/search`            | Search products with filters         |

### **Orders**
| Method | Endpoint                            | Description                          |
|--------|-------------------------------------|--------------------------------------|
| GET    | `/api/orders/customer/{id}`         | Get orders for a specific customer   |
| GET    | `/api/orders/pending`               | Get pending orders                   |

### **Payments**
| Method | Endpoint                            | Description                              |
|--------|-------------------------------------|------------------------------------------|
| GET    | `/api/payments/customer/{id}`       | Get total payment for a customer         |
| GET    | `/api/payments/date-range`          | Get payments within a specific date range|

---

## Project Structure

The project follows a clean architecture with service classes, request validations, and separation of concerns.

- **Controllers**: Handles incoming HTTP requests and responses.
- **Services**: Business logic implementation.
- **Requests**: Validates incoming user inputs.
- **Models**: ORM models for database interaction.
- **Routes**: API endpoints.

---

## Testing

You can test the endpoints using tools like **Postman** or **cURL**. Ensure you include the **JWT Bearer Token** for protected routes.

---

## Security

- Uses **JWT Authentication** for user login.
- Passwords are hashed using **Bcrypt**.
- Validates inputs with Laravel **Request classes**.

---

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

## Contribution

If you'd like to contribute, feel free to create a pull request. Make sure to follow clean code principles and best practices.

---

## Contact

For any inquiries or issues, you can reach out via:

- **Email**: samirsudhir30@gmail.com  
- **GitHub**: [Samir-Sudhir](https://github.com/samir-sudhir)  
