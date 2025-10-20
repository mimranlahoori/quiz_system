# **📚 Interactive Quiz System**

This project is a robust, full-featured **Interactive Quiz System** built using the **Laravel** framework. It allows administrators to create multiple-choice quizzes, manage questions, and generate certificates of achievement for users who successfully complete the quizzes. It provides a seamless experience for both quiz creators and participants.

## **✨ Key Features**

This system is designed with a focus on comprehensive quiz management and a great user experience:

* **Quiz Management (CRUD):** Easily create, read, update, and delete quizzes.  
* **Question Management:** Add, edit, and remove multiple-choice questions for each quiz.  
  * Each question supports a question text, four distinct options (A, B, C, D), and a designated correct answer.  
* **Quiz Taking:** Users can attempt available quizzes and submit their answers.  
* **Automated Scoring:** The system automatically calculates the user's score immediately upon submission.  
* **Certificate Generation (PDF):**  
  * Generates a professional **Certificate of Achievement** in PDF format upon successful quiz completion.  
  * The certificate includes the user's name, quiz title, final score, and date of completion.  
* **User Authentication:** Secure registration and login for user access.

## **🛠️ Technology Stack**

* **Backend:** PHP (Laravel Framework)  
* **Database:** MySQL / SQLite  
* **Frontend:** Blade Templates, Tailwind CSS  
* **PDF Generation:** DomPDF (via barryvdh/laravel-dompdf)

## **🚀 Local Setup and Installation**

Follow these steps to get the quiz system running on your local machine.

### **Prerequisites**

You must have the following installed on your system:

* PHP (version 8.1 or higher)  
* Composer  
* Node.js & npm (for compiling assets)  
* Database (MySQL recommended)

### **1\. Clone the Repository**

Clone the project from GitHub and navigate into the directory:

git clone \[https://github.com/mimranlahoori/quiz\_system.git\](https://github.com/mimranlahoori/quiz\_system.git)  
cd quiz\_system

### **2\. Install Dependencies**

Install the PHP dependencies using Composer and the JavaScript dependencies using npm:

composer install  
npm install  
npm run dev \# or npm run build

### **3\. Environment Setup**

Create a copy of the example environment file and generate a unique application key:

cp .env.example .env  
php artisan key:generate

### **4\. Database Configuration**

Edit the .env file and update the database configuration details (DB\_DATABASE, DB\_USERNAME, DB\_PASSWORD).

\# .env file excerpt  
DB\_CONNECTION=mysql  
DB\_HOST=127.0.0.1  
DB\_PORT=3306  
DB\_DATABASE=quiz\_system\_db  
DB\_USERNAME=root  
DB\_PASSWORD=

### **5\. Run Migrations**

Run the database migrations to create the necessary tables (users, quizzes, questions, attempts, etc.):

php artisan migrate \--seed

*(The \--seed flag is optional, but recommended if you have initial data seeders.)*

### **6\. Start the Development Server**

Launch the Laravel development server:

php artisan serve

The application should now be accessible at http://127.0.0.1:8000 (or the port shown in your terminal).

## **📄 File Structure Highlights**

Key files mentioned in the project that handle the core logic and presentation:

| Path | Description |  
| app/Models/UserQuizAttempt.php | Model for tracking user attempts and scores. |  
| app/Http/Controllers/QuestionController.php | Handles question CRUD operations. |  
| resources/views/questions/create.blade.php | The form for adding new quiz questions. |  
| resources/views/certificate/template.blade.php | The Blade template for generating the PDF certificate. |  
| routes/web.php | Defines the application routes. |

## **🤝 Contribution**

Feel free to fork the repository, submit pull requests, or report issues. All contributions are welcome\!

## **📜 License**

The project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
