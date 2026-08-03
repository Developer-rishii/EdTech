# EdTech / Skill Swap Platform

A comprehensive platform designed for students, educators, and lifelong learners to exchange skills, access educational materials, and collaborate through a barter system. The platform is built using PHP, MySQL, JavaScript, HTML, and CSS.

## 🚀 Features

### 👤 User Features
- **Authentication System**: Secure registration, login, and password reset functionalities.
- **Skill Barter System**: 
  - Create, view, edit, and delete barter posts.
  - Send and manage barter requests to exchange skills with other users.
- **Study Materials & Experiments**:
  - Access structured study materials (Unit-wise).
  - Dynamically fetch, view, and learn from uploaded experiments.
- **Search & Filtering**: 
  - AJAX-based dynamic search for quick access to posts and users.
  - Category-wise filters to easily find specific skills or materials.
- **Interactive Profile**: Manage personal posts, update details, and view incoming requests.

### 🛡️ Admin Features
- **Dynamic Dashboard**: Get an overview of platform activity.
- **Manage Users**: View and sort a dynamic list of user accounts.
- **Manage Experiments**: Upload new experiments, review existing ones, and delete outdated content.
- **Manage Barter Posts**: Monitor platform activity and delete inappropriate barter posts.

## 📁 Project Structure

The platform uses a clean and organized directory structure:

- `index.php` — Entry point of the application (Login/Register).
- `public/` — Front-end pages and user views (`home`, `explore`, `barter`, `profile`, etc.).
- `actions/` — Server-side PHP scripts handling form submissions, CRUD operations, and AJAX endpoints.
- `admin/` — Admin-specific views and management scripts.
- `includes/` — Reusable configurations, database connections, and authentication checks.
- `assets/` — Static assets including `css/`, `js/`, and `images/`.
- `misc/` — Setup and utility scripts (e.g., `create.php` for database initialization).

## 🛠️ Technology Stack

- **Frontend**: HTML5, CSS3, Vanilla JavaScript, FontAwesome Icons
- **Backend**: PHP (Core)
- **Database**: MySQL

## ⚙️ Setup & Installation

1. Clone this repository to your local server directory (e.g., `XAMPP/htdocs`, `WAMP/www`, or `/var/www/html`).
2. Create a new MySQL database for the project using phpMyAdmin or the MySQL CLI.
3. Update your database credentials in `includes/config.php` and `includes/connect.php`.
4. Run `misc/create.php` in your browser (e.g., `http://localhost/EdTech/misc/create.php`) to automatically initialize the necessary database tables.
5. Navigate to the project root (`http://localhost/EdTech`) to launch the application.

## 🎥 Demo

[![Watch the video](https://img.youtube.com/vi/cbgLyJIFGHI/maxresdefault.jpg)](https://youtu.be/cbgLyJIFGHI)

### [Watch video | Skill Swap Platform | Demo](https://youtu.be/cbgLyJIFGHI)
