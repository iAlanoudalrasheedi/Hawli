
# Hawli - Restaurant Management System  

## 📌 Project Description  
Hawli is a web-based restaurant management system that allows users to:  
- View restaurant information  
- Add, edit, or delete restaurant records  
- Manage data through an admin dashboard  

This project is built using PHP and MySQL with a structured architecture for better code organization.  

# 📂 Project Structure  

# 1️⃣ Core PHP Files (Main Functionality)  
- business-logic/business-logic.php → Handles core business logic.  
- data-access/data-access.php → Manages database queries.  
- include/db-connect.php → Connects to the MySQL database.  

# 2️⃣ Presentation Layer (User Interface & Pages)  
- presentation/index.php → Homepage displaying restaurant listings.  
- presentation/login.php → Admin login page.  
- presentation/admin-page.php → Admin dashboard.  
- presentation/rest-add.php → Add new restaurants.  
- presentation/restaurants.php → View all restaurants.  
- presentation/rest-delete.php → Delete a restaurant entry.  
- presentation/rest-edit.php → Edit restaurant details.  
- presentation/rest-Info.php → View detailed restaurant info.  

# 3️⃣ Design Files (CSS for Styling)  
- css/style.css → Main website design.  
- css/login.css → Login page styling.  

# 4️⃣ Database File (SQL for Data Storage)  
- it390_hawli.sql → Contains database schema and initial data.  


# 🔧 Installation & Setup  

 1️⃣ Setting Up the Database  
1. Open phpMyAdmin.  
2. Create a new database named hawli (or any name you prefer).  
3. Import it390_hawli.sql into your database.  

 2️⃣ Configuring the Project  
1. Open include/db-connect.php.  
2. Update the database credentials if needed:  
   ```php
   $servername = "localhost";  
   $username = "root";  
   $password = "";  
   $dbname = "hawli";  


### 3️⃣ Running the Project  
1. Place the project folder inside htdocs (if using XAMPP).  
2. Start Apache and MySQL from XAMPP.  
3. Open your browser and go to:  
     http://localhost/web_project/presentation/index.php
     

## 🚀 Features  
✅ Add, edit, and delete restaurants.  
✅ Admin dashboard for restaurant management.  
✅ Styled with CSS for a clean UI.  
✅ Uses MySQL for data storage.  


## 💡 Future Improvements  
- Implement user authentication for better security.  
- Add restaurant rating and review system.  
- Improve UI/UX with modern design.  

---

## Developed by  
[Alanoud Alrasheedi]  

---
