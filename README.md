# 📦 FastPrint Product Management System

[![Laravel Version](https://img.shields.io/badge/Laravel-10.x-red.svg)](https://laravel.com)
[![PHP Version](https://img.shields.io/badge/PHP-8.1%2B-blue.svg)](https://php.net)
[![SQLite](https://img.shields.io/badge/Database-SQLite-003B57.svg)](https://www.sqlite.org/)
[![Bootstrap 5](https://img.shields.io/badge/UI-Bootstrap%205-7952b3.svg)](https://getbootstrap.com)

A robust web application built as a technical assessment for **FastPrint**. This system integrates with an external API for automated data synchronization and provides a clean, responsive interface for managing product inventory.

## 🚀 Key Features

- **Automated API Sync**: Custom Artisan command with time-based authentication (MD5 hashing) to fetch and update products, categories, and statuses.
- **CRUD Management**: Complete Create, Read, Update, and Delete functionality.
- **Smart Filtering**: Displays only products with "bisa dijual" status by default for cleaner cataloging.
- **Form Validation**: Strict server-side and client-side validation for data integrity.
- **Mobile Responsive**: Fully optimized UI using Bootstrap 5 for seamless use on smartphones and desktops.
- **Security**: Protection against CSRF and SQL Injection using Laravel Eloquent.

## 🛠️ Tech Stack

- **Framework:** Laravel 12
- **Language:** PHP 8.3+
- **Database:** SQLite (Lightweight & Portable)
- **Frontend:** Blade Templating, Bootstrap 5
- **Tooling:** CURL for API Integration