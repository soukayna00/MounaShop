# 🛒 E-Commerce Web Application (Laravel)

A full-stack e-commerce web application built with **Laravel**, offering a complete shopping experience including product browsing, cart management, checkout, and order processing.

---

## 🚀 Features

### 👤 Customer Side
- Browse product catalogue
- View product categories
- Add products to cart
- Update or remove cart items
- Checkout process (shipping + payment simulation)
- Order confirmation page
- Promotion page with discounts

### 🛍️ Shopping Cart
- Session-based cart system
- Real-time quantity updates
- Automatic total calculation (including TVA)
- Cart persistence during session

### 💳 Checkout System
- Shipping information form
- User personal information form
- Payment form (card simulation)
- Order validation and storage

### 🧑‍💼 Admin / Management
- View product orders
- Manage order details
- Product/category management (if enabled)

---

## 🛠️ Technologies Used

- **Backend:** Laravel (PHP)
- **Frontend:** Blade, HTML5, CSS3, Bootstrap
- **Database:** MySQL
- **JavaScript:** jQuery (AJAX for cart actions)
- **Styling:** Custom CSS (modern ecommerce UI)

---


## ⚙️ Installation

### 1. Clone the project
```bash
git clone https://github.com/your-repo/ecommerce-laravel.git
````

### 2. Install dependencies

```bash
composer install
npm install
```

### 3. Configure environment

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Setup database

```bash
php artisan migrate
```

### 5. Run the server

```bash
php artisan serve
```

---

## 📦 Main Features Flow

1. User browses products
2. Adds items to cart
3. Updates cart quantities
4. Proceeds to checkout
5. Enters shipping & payment info
6. Confirms order
7. Views confirmation page

---

## 🎨 UI/UX Design

* Modern ecommerce layout
* Beige + dark elegant theme
* Responsive design for mobile & desktop
* Smooth hover effects and card animations
* Clean checkout inspired by Stripe UI

---

## 📌 Future Improvements

* Stripe real payment integration
* User authentication improvements
* Admin dashboard analytics
* Order tracking system
* Email confirmation system
* Product search & filtering

---


