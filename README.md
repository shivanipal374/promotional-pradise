# Promotional Pradise

This is a dynamic 5-page website built with **Laravel 12** and **PHP 8.2**, designed to showcase company services, gallery, and manage client contacts. It includes a simple admin panel to manage content.

---🛠 Project Requirements
PHP Version: 8.2+
Laravel Version: 10+
Database: MySQL
Web Server: XAMPP / Apache

## 🔹 Database Setup & Migration



1. Create a new database (e.g., `promotional_pradise`) in your local MySQL.
2. Update your `.env` file with database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=promotional_pradise
DB_USERNAME=root
DB_PASSWORD=
Run migrations to create all tables (including status column for Services):
php artisan migrate
Link storage folder (for images uploaded by admin):
php artisan storage:link

Now your database is ready and all tables are created. You can start the server:

php artisan serve
🔹 Admin Panel Access
URL: http://127.0.0.1:8000/admin/login
Email: admin@gmail.com
Password: 123456
Image Processing: Intervention Image (for .webp conversion)
🌐 Website Pages
Home: Landing page with hero section, stats, and overview.
About: Static page describing the company.
Services: Dynamic page fetching services from database with images and descriptions.
Gallery: Dynamic page showing gallery images uploaded via admin panel.
Contact: Contact form storing submissions in the database.
🔑 Admin Panel Features
Login/Logout System
Manage Services
Add new service with title, description, and image
Edit existing services
Delete services
Status: Active / Inactive toggle for each service
Manage Gallery
Upload images
Delete images
View Contact Form Submissions
🖼 Image Upload
All images uploaded in Services and Gallery are automatically converted to .webp format for better performance.
Images are stored in:
storage/app/public/services
storage/app/public/gallery
⚙ Installation Steps
Clone the repository:
git clone https://github.com/shivanipal374/promotional-pradise.git
cd promotional-pradise/paradise
Install dependencies:
composer install
npm install
npm run dev
Setup environment file:
cp .env.example .env
php artisan key:generate
Configure database in .env file (see Database Setup above).
Run migrations & storage link:
php artisan migrate
php artisan storage:link
Start development server:
php artisan serve
✅ Additional Notes
Admin can toggle status (active/inactive) for services, which reflects on the frontend dynamically.
Contact form submissions are stored in the contacts table and can be viewed via admin panel.
All pages are responsive and built with Bootstrap 5.3.
Images are automatically optimized using Intervention Image.
