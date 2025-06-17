# 🎨 Lidia Codreanu - Artist Portfolio & Booking Platform

<div align="center">

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)
![MySQL](https://img.shields.io/badge/mysql-%2300f.svg?style=for-the-badge&logo=mysql&logoColor=white)
![CSS3](https://img.shields.io/badge/css3-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white)
![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white)

**A sophisticated web platform for visual artist Lidia Codreanu featuring gallery management, client booking system, and dynamic content administration.**

[Features](#-features) • [Demo](#-demo) • [Installation](#-installation) • [Architecture](#-architecture) • [Contributing](#-contributing)

</div>

---

## 📋 Table of Contents

- [Overview](#-overview)
- [Features](#-features)
- [Technology Stack](#-technology-stack)
- [Installation](#-installation)
- [Usage](#-usage)
- [Project Structure](#-project-structure)
- [Database Schema](#-database-schema)
- [Security Features](#-security-features)
- [Performance Optimizations](#-performance-optimizations)
- [Contributing](#-contributing)

---

## 🌟 Overview

The **Lidia Codreanu Art Portfolio** is a full-stack web application designed to showcase visual art, manage client bookings, and provide comprehensive administrative control. Built with modern web technologies and best practices, this platform serves as both a stunning portfolio showcase and a powerful business management tool.

### 🎯 Key Highlights

- **Responsive Design**: Seamlessly adapts across all devices and screen sizes
- **Dark/Light Theme**: Dynamic theme switching with smooth transitions
- **Secure Authentication**: Role-based access control with password hashing
- **Image Management**: Efficient file upload and optimization system
- **Interactive Gallery**: Sortable art collection with lightbox viewing
- **Booking System**: Client appointment scheduling with status management
- **Admin Dashboard**: Comprehensive content management interface

---

## ✨ Features

### 🖼️ **Gallery Management**
- **Dynamic Art Display**: Grid-based responsive layout with hover effects
- **Smart Sorting**: Sort by newest, price (ascending/descending)
- **Lightbox Experience**: Full-screen image viewing with smooth animations
- **CRUD Operations**: Complete create, read, update, delete functionality for artwork

### 📅 **Booking System**
- **Client Scheduling**: Date/time selection with form validation
- **Status Management**: Pending, confirmed, declined booking states
- **Contact Integration**: Email validation and phone number handling
- **Admin Notifications**: Real-time booking status updates

### 🔐 **Security & Authentication**
- **Secure Login**: BCrypt password hashing with session management
- **Input Sanitization**: XSS and SQL injection protection
- **Session Timeout**: Automatic logout for enhanced security
- **Access Control**: Role-based permissions for administrative functions

### 🎨 **User Experience**
- **Theme Toggle**: Smooth dark/light mode transitions
- **Responsive Design**: Mobile-first approach with CSS Grid and Flexbox
- **Performance Optimization**: Lazy loading and efficient asset management
- **Accessibility**: WCAG compliant with proper semantic markup

---

## 🛠️ Technology Stack

### **Backend**
- **PHP 8.0+**: Server-side logic and API endpoints
- **MySQL**: Relational database with optimized queries
- **PDO**: Secure database interactions with prepared statements

### **Frontend**
- **Vanilla JavaScript**: Dynamic interactions and API consumption
- **CSS3**: Modern styling with CSS Grid, Flexbox, and custom properties
- **HTML5**: Semantic markup with accessibility features

### **Development Tools**
- **File Upload Handling**: Multi-format image processing
- **Session Management**: Secure user state persistence
- **Error Handling**: Comprehensive logging and user feedback

---

## 🚀 Installation

### Prerequisites
- PHP 8.0 or higher
- MySQL 5.7 or higher
- Web server (Apache/Nginx)
- Modern web browser

### Setup Instructions

1. **Clone the Repository**
   ```bash
   git clone https://github.com/username/lidia-codreanu-portfolio.git
   cd lidia-codreanu-portfolio
   ```

2. **Database Configuration**
   ```sql
   -- Create database
   CREATE DATABASE singh84_db;
   
   -- Import database structure
   mysql -u username -p singh84_db < database/schema.sql
   ```

3. **Environment Setup**
   ```php
   // Update connect.php with your database credentials
   $dbh = new PDO(
       "mysql:host=localhost;dbname=your_database",
       "your_username",
       "your_password"
   );
   ```

4. **File Permissions**
   ```bash
   # Create uploads directory
   mkdir uploads
   chmod 755 uploads
   
   # Set proper permissions
   chmod 644 *.php
   chmod 755 js/ css/ images/
   ```

5. **Admin Account Setup**
   ```sql
   -- Create admin user (replace with your credentials)
   INSERT INTO admin_users (username, pw_hash) 
   VALUES ('admin', '$2y$10$your_hashed_password_here');
   ```

### 🌐 Server Configuration

**Apache (.htaccess)**
```apache
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php [QSA,L]

# Security headers
Header always set X-Content-Type-Options nosniff
Header always set X-Frame-Options DENY
Header always set X-XSS-Protection "1; mode=block"
```

**Nginx**
```nginx
location / {
    try_files $uri $uri/ /index.php?$query_string;
}

location ~ \.php$ {
    fastcgi_pass unix:/var/run/php/php8.0-fpm.sock;
    fastcgi_index index.php;
    include fastcgi_params;
}
```

---

## 💻 Usage

### **Public Interface**

1. **Homepage**: Artist biography and testimonials
2. **Gallery**: Browse and view artwork collections
3. **Schedule**: Book consultations and commissions
4. **Theme Toggle**: Switch between light and dark modes

### **Admin Interface**

1. **Login**: Access at `/admin.php`
2. **Dashboard**: Manage art, bookings, and content
3. **Art Management**: Upload, edit, and delete artwork
4. **Booking Management**: Review and update client requests
5. **Content Editing**: Update about sections and artist information

### **API Endpoints**

```php
GET  /get_art_pieces.php?sort=newest    // Fetch artwork with sorting
POST /art-save.php                      // Upload new artwork
POST /booking-new.php                   // Submit booking request
POST /admin-auth.php                    // Admin authentication
```

---

## 📁 Project Structure

```
lidia-codreanu-portfolio/
├── 📄 index.php              # Homepage with artist info
├── 📄 gallery.php            # Art gallery display
├── 📄 schedule.php            # Booking interface
├── 📄 admin.php               # Admin login
├── 📄 admin-dashboard.php     # Admin control panel
├── 📄 admin-auth.php          # Authentication handler
├── 📄 connect.php             # Database connection
├── 📁 css/
│   └── 📄 styles.css          # Comprehensive styling
├── 📁 js/
│   ├── 📄 gallery.js          # Gallery interactions
│   ├── 📄 admin-db.js         # Admin dashboard logic
│   ├── 📄 flip-theme.js       # Theme switching
│   └── 📄 index.js            # Homepage animations
├── 📁 images/
│   ├── 🖼️ about_light.png     # Artist portrait (light theme)
│   └── 🖼️ about_dark.png      # Artist portrait (dark theme)
├── 📁 uploads/                # Dynamic art uploads
├── 📁 art-management/
│   ├── 📄 art-save.php        # Save artwork
│   ├── 📄 art-edit.php        # Edit artwork
│   └── 📄 art-delete.php      # Delete artwork
├── 📁 booking-system/
│   ├── 📄 booking-new.php     # Create booking
│   └── 📄 booking-update.php  # Update booking status
└── 📄 README.md               # This file
```

---

## 🗃️ Database Schema

### **Core Tables**

```sql
-- Art pieces management
CREATE TABLE art_pieces (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    description TEXT,
    image VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Client bookings
CREATE TABLE bookings (
    id INT PRIMARY KEY AUTO_INCREMENT,
    meeting_date DATE NOT NULL,
    full_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    message TEXT,
    status ENUM('pending', 'confirmed', 'declined') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Admin authentication
CREATE TABLE admin_users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) UNIQUE NOT NULL,
    pw_hash VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Artist information
CREATE TABLE about (
    id INT PRIMARY KEY AUTO_INCREMENT,
    aboutMe TEXT,
    myStory TEXT,
    artistStatement TEXT,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

---

## 🔒 Security Features

### **Input Validation & Sanitization**
- XSS protection with `htmlspecialchars()`
- SQL injection prevention using prepared statements
- File upload validation with type and size restrictions
- Email validation with built-in PHP filters

### **Authentication & Authorization**
- BCrypt password hashing (cost factor 10)
- Session-based authentication with timeout
- CSRF protection on sensitive operations
- Role-based access control for admin functions

### **Security Headers**
```php
// Implemented security measures
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');
```

---

## ⚡ Performance Optimizations

### **Frontend Optimizations**
- **CSS Grid & Flexbox**: Efficient layout rendering
- **Image Optimization**: Responsive images with proper sizing
- **Lazy Loading**: Deferred content loading for faster initial render
- **Minimal JavaScript**: Vanilla JS for reduced bundle size

### **Backend Optimizations**
- **Prepared Statements**: Efficient database queries
- **Connection Pooling**: Optimized database connections
- **File Caching**: Strategic caching for static content
- **Error Logging**: Comprehensive error tracking without exposing sensitive data

### **Database Performance**
```sql
-- Optimized indexes
CREATE INDEX idx_art_pieces_created ON art_pieces(created_at);
CREATE INDEX idx_bookings_date ON bookings(meeting_date);
CREATE INDEX idx_bookings_status ON bookings(status);
```

---

## 🏆 Development Approach
- **Collaborative Coding**: Shared responsibility across all components
- **Code Review**: Peer review process for quality assurance  
- **Modern Practices**: Following PHP and web development best practices
- **Documentation**: Comprehensive inline comments and documentation

---

## 🤝 Contributing

We welcome contributions to improve this project! Here's how you can help:

### **Getting Started**
1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

### **Contribution Guidelines**
- Follow PSR-12 coding standards for PHP
- Write meaningful commit messages
- Include tests for new features
- Update documentation as needed
- Ensure responsive design compatibility

### **Bug Reports**
- Use the issue tracker to report bugs
- Include browser/server environment details
- Provide steps to reproduce the issue
- Include screenshots when applicable

---

## 🎉 Acknowledgments

- **Google Fonts**: Poppins and Playfair Display typography
- **PHP Community**: For excellent documentation and resources
- **Design Inspiration**: Modern art portfolio websites and galleries
- **Testing Team**: Beta testers who provided valuable feedback

---

<div align="center">

**Built with ❤️ by Harsifat Singh**

[⬆ Back to Top](#-lidia-codreanu---artist-portfolio--booking-platform)

</div>
