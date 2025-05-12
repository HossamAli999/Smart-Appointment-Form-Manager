# Smart Appointment Form Manager

A flexible Laravel-based web application for creating and sharing appointment or registration forms with limited dates and submission quotas. Ideal for teachers, event organizers, service providers, and anyone needing structured input collection.

## 🌟 Features

* Create and manage custom forms
* Add selectable date options for submissions
* Limit the number of submissions per form
* Share forms via a unique public link
* Allow users to submit their name, phone, class, and selected date
* Export submissions to CSV (supports Arabic characters)
* Responsive design and intuitive interface

## 🚀 Getting Started

### Prerequisites

* PHP 8.x
* Composer
* SQLite or MySQL
* Node.js and npm (for frontend assets)

### Installation

```bash
git clone https://github.com/your-username/appointment-form-manager.git
cd appointment-form-manager

composer install
npm install && npm run dev

cp .env.example .env
php artisan key:generate
```

Update your `.env` file to use SQLite:

```
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database.sqlite
```

Then create the SQLite file:

```bash
touch database/database.sqlite
```

Run the migrations:

```bash
php artisan migrate
```

Serve the app:

```bash
php artisan serve
```

Visit [http://127.0.0.1:8000](http://127.0.0.1:8000) to start using it.

## 📤 Exporting Submissions

You can export form submissions as CSV by clicking the **Export to CSV** button in the dashboard. The file is encoded as UTF-8 with BOM to ensure proper Arabic support.

## 📁 Project Structure

* `app/Models/Form.php` - The form model
* `app/Models/StudentSubmission.php` - Handles user submissions
* `resources/views/forms` - Admin form views
* `resources/views/student` - Public form interface

## 💠 Customization Ideas

* Add login system for admin
* Email notification after submission
* PDF export for submissions
* Date-based closing of forms

## 🛡 License

This project is open-source and available under the MIT License.

---

**Made with ❤️ using Laravel**
