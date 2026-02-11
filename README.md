# Business Listing & Rating System

A web-based Business Listing & Rating System developed using Core PHP, MySQL, jQuery, AJAX, and Bootstrap.

This application allows users to manage businesses and provide ratings with real-time average updates.

===============================================================

## Features

### 1 Business Management
- Add new business listings
- Update existing business details
- Delete business records
- View all businesses in tabular format

### 2 Rating System
- Rate businesses using star ratings
- Rating scale: 1–5 stars
- Multiple users can rate the same business
- Existing users can update their rating

### 3 Rating Logic
- If Email OR Phone already exists for a business → Rating updated
- If new user → Rating inserted
- Prevents duplicate ratings from same user

### 4 Real-Time Updates
- Average rating recalculated instantly
- Business table updates without page refresh
- AJAX-based operations

------------------------------------

## Tech Stack

| Technology | Usage |

| Core PHP | Backend logic |
| MySQL | Database |
| jQuery | DOM & AJAX |
| AJAX | Real-time operations |
| Bootstrap 5 | UI & Modals |
| JavaScript | Client-side logic |

-----------------------------------

## Project Structure

business-rating-system/
(index.php | db.php | add_business.php | update_business.php | delete_business.php | fetch_business.php | submit_rating.php | database.sql | assets/)

## Database Structure

### businesses
- id (Primary Key)
- name
- address
- phone
- email
- created_at

### ratings
- id (Primary Key)
- business_id (Foreign Key)
- name
- email
- phone
- rating
- created_at

---------------------------------------

## Installation & Setup

### Step 1 — Clone Repository

git clone https://github.com/yourusername/business-rating-system.git

Or download ZIP and extract in `htdocs`.

---------------------------------------

### Step 2 — Move Project

Place folder inside:

xampp/htdocs/

---------------------------------------

### Step 3 — Import Database

1. Open phpMyAdmin  
2. Create database:

business_rating

3. Import file:

database.sql

---------------------------------------

### Step 4 — Start Server

Start from XAMPP:

- Apache 
- MySQL   

---------------------------------------

### Step 5 — Run Project

Open browser:

http://localhost/business_rating_system

## Functional Flow

### Add Business
1. Click “Add Business”
2. Enter details
3. Save via AJAX

### Update Business
1. Click “Update”
2. Edit details
3. Save changes

### Delete Business
1. Click “Delete”
2. Confirm removal

### Rate Business
1. Click “Rate Business”
2. Enter user details
3. Select stars
4. Submit rating

---------------------------------------

## Real-Time Behavior

- No page refresh
- Ratings update instantly
- Average recalculated dynamically

## Author

  Ramin Singh   
B.Tech Computer Science & Engineering  
 Software/Web Developer

## License

This project is created for learning and machine test purposes.

Free to use and modify.
