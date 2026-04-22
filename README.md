# 🚀 Smart File Submission System

> A Laravel-based role-based file submission system with admin approval workflow, notifications, and real-time UI updates.

---

## 📌 Project Overview

The **Smart File Submission System** is a full-stack Laravel application designed to manage secure file submissions with admin moderation and automated notifications.

It is built to demonstrate core backend concepts including:

- 🧾 Form Validation (user input validation on frontend + backend)
- 📁 File Validation (type, size, and secure upload handling)
- ⚡ Event-Driven Architecture (submission status updates trigger events & notifications)

---

## ✨ Key Features

### 👤 User Side
- Secure authentication system
- File submission with validation
- Real-time status updates
- Notification system (bell icon + full page view)

### 🛡️ Admin Side
- Admin dashboard for managing submissions
- Approve / Reject files
- Trigger automatic user notifications

---

## 🔔 Notification System

- Database-based notifications
- Bell icon with unread badge counter
- Dropdown preview (latest notifications)
- Full notifications page
- Live updates using AJAX polling

---

## ⚙️ Tech Stack

- Laravel 12
- PHP 8+
- MySQL
- Blade Templates
- Tailwind CSS
- JavaScript (AJAX)

---

## 🔐 Security & Validation

- Form validation (server-side + client-side)
- File validation (type, size, integrity checks)
- Middleware-based admin protection
- Role-based access control (`is_admin`)
- CSRF protection for all forms

---

## 🔄 System Workflow

1. User registers/login  
2. User submits file (validated form + file rules)  
3. System stores file securely  
4. Event is triggered on submission  
5. Admin reviews file  
6. Admin approves/rejects submission  
7. Notification is generated automatically  
8. User sees update in real-time UI  

---

## 📈 Future Improvements

- WebSocket real-time notifications (Laravel Reverb / Pusher)
- File preview system
- Advanced admin analytics dashboard
- Email notification integration
- Activity logs for users and admins

---

## 👨‍💻 Developer

**Mariam Fatima**