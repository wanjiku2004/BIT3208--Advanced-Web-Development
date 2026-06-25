<?php
// index.php - Kikapu Mart Homepage
$pageTitle = "Kikapu Mart - Shop Everything in Kenya";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $pageTitle ?></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  
  <style>
    :root {
      --primary: #1a472a;
      --accent: #e67e22;
    }
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { font-family: 'Segoe UI', sans-serif; line-height: 1.6; }

    /* Header */
    .top-bar {
      background: var(--primary);
      color: white;
      text-align: center;
      padding: 10px;
      font-size: 14px;
    }

    .main-header {
      background: white;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      position: sticky;
      top: 0;
      z-index: 1000;
    }

    .header-content {
      max-width: 1400px;
      margin: 0 auto;
      padding: 15px 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 15px;
    }

    .logo {
      font-size: 28px;
      font-weight: bold;
      color: var(--primary);
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .search-bar {
      flex: 1;
      max-width: 520px;
      position: relative;
    }

    .search-bar input {
      width: 100%;
      padding: 14px 20px 14px 50px;
      border: 2px solid #ddd;
      border-radius: 50px;
      font-size: 16px;
    }

    .nav-icons {
      display: flex;
      gap: 22px;
      font-size: 1.5rem;
      color: #333;
    }

    .cart-count {
      position: absolute;
      top: -6px;
      right: -8px;
      background: #e74c3c;
      color: white;
      font-size: 12px;
      width: 18px;
      height: 18px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    /* Navigation */
    .main-nav {
      background: #f8f9fa;
      border-top: 1px solid #eee;
    }

    .nav-menu {
      max-width: 1400px;
      margin: 0 auto;
      padding: 0 20px;
      display: flex;
      list-style: none;
      gap: 35px;
    }

    .nav-menu a {
      display: block;
      padding: 18px 0;
      color: #333;
      text-decoration: none;
      font-weight: 500;
    }

    .dropdown {
      position: absolute;
      background: white;
      box-shadow: 0 10px 25px rgba(0,0,0,0.12);
      border-radius: 10px;
      min-width: 240px;
      opacity: 0;
      visibility: hidden;
      transform: translateY(15px);
      transition: all 0.3s ease;
      z-index: 999;
    }

    .nav-menu li:hover .dropdown {
      opacity: 1;
      visibility: visible;
      transform: translateY(0);
    }

    /* Hero Section */
    .hero {
      background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://source.unsplash.com/random/1600x900/?kenya,market') center/cover no-repeat;
      color: white;
      text-align: center;
      padding: 120px 20px;
    }

    .hero h1 {
      font-size: 3.2rem;
      margin-bottom: 15px;
    }

    .hero p {
      font-size: 1.3rem;
      max-width: 700px;
      margin: 0 auto 30px;
    }

    .btn {
      display: inline-block;
      padding: 14px 40px;
      background: var(--accent);
      color: white;
      text-decoration: none;
      border-radius: 50px;
      font-weight: bold;
      font-size: 1.1rem;
    }

    /* Sections */
    section {
      padding: 60px 20px;
      max-width: 1400px;
      margin: 0 auto;
    }

    h2 {
      text-align: center;
      margin-bottom: 40px;
      font-size: 2.2rem;
      color: var(--primary);
    }

    .products-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
      gap: 25px;
    }

    .product-card {
      border: 1px solid #eee;
      border-radius: 12px;
      overflow: hidden;
      transition: transform 0.3s, box-shadow 0.3s;
    }

    .product-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    }

    .product-card img {
      width: 100%;
      height: 220px;
      object-fit: cover;
    }

    .product-info {
      padding: 15px;
    }

    .product-info h3 {
      font-size: 1.1rem;
      margin-bottom: 8px;
    }

    .price {
      color: var(--accent);
      font-size: 1.3rem;
      font-weight: bold;
    }

    footer {
      background: #1a472a;
      color: white;
      padding: 60px 20px 30px;
      text-align: center;
    }
  </style>
</head>
<body>

  <!-- Top Bar -->
  <div class="top-bar">
    🚚 Free Delivery on Orders Over KSh 5,000 | 🌍 Shop Local • Delivered Fast
  </div>

  <!-- Header -->
  <header class="main-header">
    <div class="header-content">
      <a href="index.php" class="logo">
        <i class="fas fa-basket-shopping"></i> Kikapu Mart
      </a>

      <div class="search-bar">
        <input type="text" id="searchInput" placeholder="Search rice, phones, fashion, groceries...">
        <button onclick="performSearch()"><i class="fas fa-search"></i></button>
      </div>

      <div class="nav-icons">
        <a href="#"><i class="fas fa-user"></i></a>
        <a href="#"><i class="fas fa-heart"></i></a>
        <a href="#" style="position:relative;">
          <i class="fas fa-shopping-cart"></i>
          <span class="cart-count" id="cartCount">4</span>
        </a>
      </div>
    </div>
  </header>

  <!-- Main Navigation -->
  <nav class="main-nav">
    <ul class="nav-menu" id="navMenu"></ul>
  </nav>

  <!-- Hero -->
  <section class="hero">
    <h1>Welcome to Kikapu Mart</h1>
    <p>Your trusted online marketplace for quality products across Kenya</p>
    <a href="#" class="btn">Shop Now</a>
  </section>

  <!-- Featured Categories -->
  <section>
    <h2>Featured Categories</h2>
    <div class="products-grid">
      <?php
      $categories = [
        ["Fresh Produce", "🥕", "#"],
        ["Smartphones", "📱", "#"],
        ["Fashion", "👕", "#"],
        ["Home & Kitchen", "🏠", "#"]
      ];
      foreach($categories as $cat) {
        echo "<div class='product-card' style='text-align:center; padding:20px;'>
                <div style='font-size:3rem; margin-bottom:10px;'>{$cat[1]}</div>
                <h3>{$cat[0]}</h3>
                <a href='{$cat[2]}' style='color:var(--primary);'>Shop →</a>
              </div>";
      }
      ?>
    </div>
  </section>

  <!-- Popular Products -->
  <section style="background:#f8f9fa;">
    <h2>Popular Products</h2>
    <div class="products-grid" id="productsGrid">
      <!-- Populated by JavaScript -->
    </div>
  </section>

  <footer>
    <p>&copy; <?= date("Y") ?> Kikapu Mart. All Rights Reserved. | Nairobi, Kenya</p>
  </footer>

  <script>
    // Menu Data
    const menuData = [
      { title: "Shop", hasDropdown: true, submenu: ["All Products","Groceries","Electronics","Fashion"] },
      { title: "Categories", hasDropdown: true, submenu: ["Fresh Produce","Phones","Clothing","Home"] },
      { title: "Deals", hasDropdown: false },
      { title: "Brands", hasDropdown: true, submenu: ["Samsung","Nike","Unilever"] },
      { title: "Local Market", hasDropdown: false }
    ];

    function renderMenu() {
      const navMenu = document.getElementById('navMenu');
      navMenu.innerHTML = '';
      menuData.forEach(item => {
        const li = document.createElement('li');
        li.style.position = 'relative';
        
        if (item.hasDropdown) {
          li.innerHTML = `
            <a href="#">${item.title} <i class="fas fa-chevron-down"></i></a>
            <div class="dropdown">
              <ul style="list-style:none; padding:15px 0;">
                ${item.submenu.map(sub => `<li><a href="#" style="padding:8px 25px; display:block;">${sub}</a></li>`).join('')}
              </ul>
            </div>
          `;
        } else {
          li.innerHTML = `<a href="#">${item.title}</a>`;
        }
        navMenu.appendChild(li);
      });
    }

    // Sample Products
    const products = [
      { name: "Jasmine Rice 5kg", price: "KSh 890", img: "https://source.unsplash.com/random/300x300/?rice" },
      { name: "Samsung Galaxy A35", price: "KSh 28,999", img: "https://source.unsplash.com/random/300x300/?phone" },
      { name: "Men's Leather Shoes", price: "KSh 2,499", img: "https://source.unsplash.com/random/300x300/?shoes" },
      { name: "Fresh Avocado (1kg)", price: "KSh 180", img: "https://source.unsplash.com/random/300x300/?avocado" }
    ];

    function renderProducts() {
      const container = document.getElementById('productsGrid');
      container.innerHTML = '';
      products.forEach(product => {
        const card = document.createElement('div');
        card.className = 'product-card';
        card.innerHTML = `
          <img src="${product.img}" alt="${product.name}">
          <div class="product-info">
            <h3>${product.name}</h3>
            <p class="price">${product.price}</p>
            <button onclick="addToCart('${product.name}')" style="margin-top:10px; width:100%; padding:10px; background:var(--primary); color:white; border:none; border-radius:6px; cursor:pointer;">
              Add to Cart
            </button>
          </div>
        `;
        container.appendChild(card);
      });
    }

    function performSearch() {
      const query = document.getElementById('searchInput').value.trim();
      if (query) alert(`🔍 Searching for "${query}"...`);
    }

    function addToCart(name) {
      alert(`${name} added to cart! 🛒`);
      let count = parseInt(document.getElementById('cartCount').textContent);
      document.getElementById('cartCount').textContent = count + 1;
    }

    // Initialize
    window.onload = () => {
      renderMenu();
      renderProducts();
    };
  </script>
</body>
</html>
