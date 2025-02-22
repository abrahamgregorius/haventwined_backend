# Setup Guide

[Frontend Repo](https://github.com/abrahamgregorius/haventwined_frontend)

## **Prerequisites**
- **PHP** (>= 8.1)  
- **Composer** (Dependency Manager for PHP)  
- **Database** (MySQL)

---

## **Installation Steps**

### **1. Clone the Repository**
```sh
git clone <repository-url>
cd <project-folder>
```
### **2. Install Dependencies**
```sh
composer install
```
### **3. Copy Environment File**
```sh
cp .env.example .env
```
### **4. Generate Application Key**
```sh
php artisan key:generate
```
### **5. Configure Database**
Edit the `.env` file and update the database settings:
```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```
### **6. Run Migrations**
```sh
php artisan migrate --seed
```
### **7. Running the Application**
```sh
php artisan serve
```

The application will be available at:
📌 http://127.0.0.1:8000