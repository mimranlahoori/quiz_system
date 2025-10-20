# Interactive Quiz System

A robust and full-featured quiz platform built with Laravel and Blade/Tailwind for front-end.
It enables administrators to create quizzes, manage questions & categories, and awards users PDFs certificates upon successful completion.

---

## ✨ Key Features

* ✅ Quiz Management (CRUD): create, update, delete quizzes

* ✅ Category Management: hierarchical categories (parent/child) and attach quizzes

* ✅ Question Management: each quiz supports questions with four options (A, B, C, D) and a correct answer

* ✅ Quiz Attempt Flow:

  * Shuffle questions per attempt
  * Users can skip up to a specified number (e.g., 5)
  * Resume quiz where left off (if not completed)
  * Score is updated automatically

* ✅ Result Tracking & History: users and admins can review previous attempts

* ✅ Certificate Generation (PDF):

  * When user completes quiz successfully, a professional certificate with user name, quiz title, score and date is created
  * Uses DomPDF (via `barryvdh/laravel-dompdf`)

* ✅ Dashboard: overview stats (quizzes, categories, attempts), recent activity & quick links

* ✅ Tailwind CSS dark-mode friendly UI, clean and modern

* ✅ Authentication & roles (e.g., admin vs user) so only authorised users can manage content

---

## 🛠️ Technology Stack

* **Backend:** PHP (Laravel)
* **Frontend:** Blade templates + Tailwind CSS
* **Database:** MySQL (or SQLite for simpler setups)
* **PDF Generation:** DomPDF (`barryvdh/laravel-dompdf`)
* **Dev Tools:** Node.js, npm, Vite (for compiling front-end assets)

---

## 📥 Local Setup & Installation

Follow these steps to get the project running locally:

### 1. Clone the Repository

```bash
git clone https://github.com/mimranlahoori/quiz_system.git
cd quiz_system
```

### 2. Install Dependencies

```bash
composer install
npm install
npm run dev   # Or `npm run build` for production assets
```

### 3. Environment Setup

```bash
cp .env.example .env
php artisan key:generate
```

Update `.env` with your database settings (and any other settings):

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=quiz_system_db
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Run Migrations & Seeders

```bash
php artisan migrate --seed
```

> The `--seed` flag will run initial seeders (e.g., sample categories, quizzes, questions) if provided.

### 5. Serve the Application

```bash
php artisan serve
```

Visit `http://127.0.0.1:8000` in your browser (or whichever address the server shows).

---

## 📁 File Structure Highlights

| Path                                             | Description                                                                                |
| ------------------------------------------------ | ------------------------------------------------------------------------------------------ |
| `app/Models/UserQuizAttempt.php`                 | Model for tracking quiz attempts, score, progress & resume logic                           |
| `app/Http/Controllers/QuestionController.php`    | Handles CRUD for questions                                                                 |
| `resources/views/questions/create.blade.php`     | Form for adding a new question                                                             |
| `resources/views/certificate/template.blade.php` | Blade template used to generate the PDF certificate                                        |
| `routes/web.php`                                 | Defines the main application routes (quizzes, categories, attempts, results, certificates) |

---

## 🤝 Contribution

Feel free to fork the repository, submit pull requests or raise issues. All contributions are welcome!
Please make sure to follow the repository’s coding standards & include tests if applicable.

---

## 📄 License

This project is open-sourced software licensed under the MIT License.
