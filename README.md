# 🛠️ Simple Service Booking System API

A Laravel-based RESTful API for a **Service Booking System** that allows **customers** to register, view services, and book them, while **admins** can manage services and view all bookings.

---

## 📦 Features

### ✅ Authentication (Sanctum)
- Customer Registration & Login
- Admin Login (seeded user)
- Token-based API protection

### ✅ User Roles
- **Customer** (can browse & book services)
- **Admin** (can manage services & view all bookings)

### ✅ Core Modules
- **Service**
  - name, description, price, status
- **Booking**
  - user_id, service_id, booking_date, status

### ✅ API Endpoints

#### 🔓 Public Routes
| Method | Endpoint         | Description                 |
|--------|------------------|-----------------------------|
| POST   | `/api/register`  | Customer Registration       |
| POST   | `/api/login`     | Login (Customer/Admin)      |

#### 🔐 Customer Routes
| Method | Endpoint         | Description                      |
|--------|------------------|----------------------------------|
| GET    | `/api/services`  | View All Available Services      |
| POST   | `/api/bookings`  | Book a Service                   |
| GET    | `/api/bookings`  | View My Bookings                 |

#### 🛠 Admin Routes
| Method | Endpoint                      | Description              |
|--------|-------------------------------|--------------------------|
| POST   | `/api/services`               | Add New Service          |
| PUT    | `/api/services/{id}`          | Update Service Info      |
| DELETE | `/api/services/{id}`          | Delete Service           |
| GET    | `/api/admin/bookings`         | View All Bookings        |

---

## 🗂 Models & Relationships

- `User` - can have role: `admin` or `customer`
- `Service` - has many `Bookings`
- `Booking` - belongs to `User` and `Service`

---

## 🔐 Validation Rules

- All inputs validated using **Validate method**
- Prevents booking services on past dates create by **ValidationServiceProvider**
- Proper error responses for each request


## 🚀 Getting Started

### 📁 Clone the Repository

```bash
git clone # 🛠️ Simple Service Booking System API

A Laravel-based RESTful API for a **Service Booking System** that allows **customers** to register, view services, and book them, while **admins** can manage services and view all bookings.

Developed for the recruitment task at **Qtec Solution Limited**.

---

## 📦 Features

### ✅ Authentication (Sanctum)
- Customer Registration & Login
- Admin Login (seeded user)
- Token-based API protection

### ✅ User Roles
- **Customer** (can browse & book services)
- **Admin** (can manage services & view all bookings)

### ✅ Core Modules
- **Service**
  - name, description, price, status
- **Booking**
  - user_id, service_id, booking_date, status

### ✅ API Endpoints

#### 🔓 Public Routes
| Method | Endpoint         | Description                 |
|--------|------------------|-----------------------------|
| POST   | `/api/register`  | Customer Registration       |
| POST   | `/api/login`     | Login (Customer/Admin)      |

#### 🔐 Customer Routes
| Method | Endpoint         | Description                      |
|--------|------------------|----------------------------------|
| GET    | `/api/services`  | View All Available Services      |
| POST   | `/api/bookings`  | Book a Service                   |
| GET    | `/api/bookings`  | View My Bookings                 |

#### 🛠 Admin Routes
| Method | Endpoint                      | Description              |
|--------|-------------------------------|--------------------------|
| POST   | `/api/services`               | Add New Service          |
| PUT    | `/api/services/{id}`          | Update Service Info      |
| DELETE | `/api/services/{id}`          | Delete Service           |
| GET    | `/api/admin/bookings`         | View All Bookings        |

---

## 🗂 Models & Relationships

- `User` – can have role: `admin` or `customer`
- `Service` – has many `Bookings`
- `Booking` – belongs to `User` and `Service`

---

## 🔐 Validation Rules

- All inputs validated using **Form Request Classes**
- Prevents booking services on past dates
- Proper error responses for each request


## 🚀 Getting Started
### 📁 Clone the Repository

git clone https://github.com/scidata-analyst/service-booking-system.git
cd service-booking-system

## Follow below command
1. Composer install.
2. php artisan migrate.
3. php artisan db:seed.
4. php artisan serve.
