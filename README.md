Smart File Submission System

A role-based Laravel web application for secure file submission, admin approval workflow, and real-time notification management.

🚀 Overview

The Smart File Submission System is designed to manage file uploads with proper validation, admin moderation, and automated notifications. It demonstrates a full backend workflow using Laravel, including authentication, authorization, events, and database-driven notifications.

🎯 Key Features
👤 User Features
Secure user registration and login
File submission with validation
View submission status (Pending / Approved / Rejected)
Real-time notification updates
Notification history page
🛡️ Admin Features
Dedicated admin dashboard
View all user submissions
Approve or reject files
Trigger automatic notifications on status change
Role-based access control (admin-only routes)
⚙️ Tech Stack
Laravel 12
PHP 8+
MySQL
Blade Templates
Tailwind CSS
JavaScript (AJAX for live updates)
🔐 Security System
Authentication using Laravel Breeze
Middleware-based route protection
Admin-only access using is_admin field
CSRF protection on all forms
File validation before upload
📂 Core Modules
1. File Submission System

Users can upload files which are validated on both frontend and backend before being stored securely.

2. Admin Approval Workflow

Admins review submissions and decide whether to approve or reject them.

3. Notification System

When admin updates a submission:

A database notification is created
User sees notification in bell icon
Notification list updates dynamically
4. Role-Based Access Control
Normal users → Dashboard only
Admin users → Dashboard + Admin panel
🔄 System Workflow
User registers/login
User uploads file
Backend validates file
File stored in system
Admin reviews submission
Admin approves/rejects file
Notification is generated
User sees update in real-time UI
🔔 Notification System
Bell icon with unread count badge
Dropdown preview of latest notifications
Full notification page
AJAX-based live updates every few seconds
📊 Project Highlights
Clean MVC architecture
Event-driven notification system
Secure admin panel
Real-time UI updates
Scalable Laravel structure
🚀 Future Improvements
WebSocket-based real-time notifications (Laravel Reverb / Pusher)
File preview system
Advanced admin analytics dashboard
Email notification integration
Activity logs for users and admins
👨‍💻 Developer

Mariam Fatima

📌 Note

This project was built as a complete backend workflow system to demonstrate secure file submission, admin moderation, and event-based notifications using Laravel.