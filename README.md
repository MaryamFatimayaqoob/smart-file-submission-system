📌 Smart File Submission System
🚀 Project Overview

The Smart File Submission System is a web-based application developed using Laravel that allows users to submit files securely and enables an admin to manage, validate, and process those submissions.

The system demonstrates core concepts of form validation, file validation, and event handling using both frontend and backend logic.

🎯 Objective of the Project

The main objective of this project is to implement:

Form validation (frontend + backend)
File validation and secure upload handling
Event-driven workflow for submission status updates
Role-based system (User and Admin)
⚙️ Technologies Used
Laravel 12 (PHP Framework)
PHP 8+
MySQL Database
Blade Templates
Tailwind CSS
JavaScript (AJAX for UI updates)
👥 System Roles
👤 User
Register and login system
Submit files with validation
View submission status
Receive notifications for updates
🛡️ Admin
Access admin dashboard
View all user submissions
Approve or reject submissions
Trigger system events for notifications
🧪 Core Requirements Implementation
1️⃣ Form Validation (Frontend + Backend)
Backend Validation (Laravel)
Required fields enforced (title, file)
Validation rules applied in controller
Error messages returned to UI
Frontend Validation
Input fields restricted using HTML validation
Error messages displayed to users

✔ Ensures only valid and complete data is submitted

2️⃣ File Validation

The system ensures secure file uploads by:

Allowing only specific file types (PDF, DOCX, images)
Restricting file size limits
Preventing invalid or malicious uploads
Storing files securely in server storage

✔ Ensures system security and data integrity

3️⃣ Event Handling System

The system uses an event-driven approach:

When an admin approves or rejects a submission
A system event is triggered
Notification is generated for the user automatically
Flow:

Admin Action → Event Triggered → Notification Sent → User Updated

✔ Demonstrates decoupled and scalable architecture

🔔 Notification System
Database-based notifications
Unread notification badge (bell icon)
Dropdown preview of latest notifications
Full notification history page
Live updates using AJAX polling
🔐 Security Features
Authentication required for all users
Middleware-based admin protection
Role-based access control using is_admin
CSRF protection for all forms
Secure file upload validation
🔄 System Workflow
User registers and logs in
User submits a file
Backend validates form and file
File is stored securely
Admin reviews submission
Admin approves/rejects submission
Event is triggered automatically
User receives notification update
📊 Key Concepts Demonstrated
Form validation (frontend + backend)
File validation and secure upload handling
Event-driven programming in Laravel
Role-based authentication system
Dynamic UI updates using JavaScript

🚀 Future Enhancements
Real-time notifications using WebSockets
File preview system
Email notification integration
Advanced admin analytics dashboard
👨‍💻 Developer

Mariam Fatima
