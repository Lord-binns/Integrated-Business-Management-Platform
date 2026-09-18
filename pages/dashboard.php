<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="A simple point of sale workspace.">
  <title>Counter | Point of Sale</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/styles.css">
  <script src="../assets/js/app.js" defer></script>
</head>
<body>
  <main class="app-shell">
    <aside class="sidebar" aria-label="Primary navigation">
      <a class="brand" href="../index.php" aria-label="Counter home">
        <span class="brand-mark">C</span>
        <span>counter</span>
      </a>
      <nav class="nav-list">
        <a class="nav-item active" href="dashboard.php"><span class="nav-icon">▦</span> Register</a>
        <a class="nav-item" href="#orders"><span class="nav-icon">↗</span> Orders</a>
        <a class="nav-item" href="admin-dashboard.php"><span class="nav-icon">◇</span> Products</a>
        <a class="nav-item" href="#customers"><span class="nav-icon">◎</span> Customers</a>
      </nav>
      <div class="sidebar-footer">
        <div class="status-dot"></div>
        <div><strong>Register online</strong><span>Station 01 · Open</span></div>
      </div>
    </aside>

    <section class="workspace" id="catalog">
      <header class="topbar">
        <div>
          <p class="eyebrow">Thursday, September 18, 2026</p>
          <h1>Good morning, Alex</h1>
        </div>
        <div class="topbar-actions">
          <button class="icon-button" type="button" aria-label="Notifications">♧<span class="notification-dot"></span></button>
          <button class="profile-button" type="button"><span class="avatar">A</span><span>Alex Morgan</span><span class="chevron">⌄</span></button>
        </div>
      </header>

      <div class="content-grid">
        <section class="catalog-panel" aria-labelledby="catalog-title">
          <div class="section-heading">
            <div>
              <p class="eyebrow">Your inventory</p>
              <h2 id="catalog-title">Product catalog</h2>
            </div>
            <button class="outline-button" type="button">+ Add product</button>
          </div>
          <div class="catalog-toolbar">
            <label class="search-field"><span>⌕</span><input id="search" type="search" placeholder="Search products" aria-label="Search products"></label>
            <div class="category-tabs" role="tablist" aria-label="Product categories">
              <button class="category-tab selected" type="button" data-category="All">All items</button>
              <button class="category-tab" type="button" data-category="Coffee">Coffee</button>
              <button class="category-tab" type="button" data-category="Food">Food</button>
              <button class="category-tab" type="button" data-category="Merch">Merch</button>
            </div>
          </div>
          <div class="product-grid" id="product-grid"></div>
        </section>

        <aside class="cart-panel" aria-labelledby="cart-title">
          <div class="cart-heading"><div><p class="eyebrow">Current sale</p><h2 id="cart-title">Order <span>#1048</span></h2></div><button class="more-button" type="button" aria-label="More order options">•••</button></div>
          <div class="customer-chip"><span class="customer-avatar">W</span><span><strong>Walk-in customer</strong><small>Guest checkout</small></span><button type="button" aria-label="Change customer">⌄</button></div>
          <div class="cart-items" id="cart-items"></div>
          <button class="add-note" type="button">＋ Add a note</button>
          <div class="totals">
            <div><span>Subtotal</span><strong id="subtotal">$0.00</strong></div>
            <div><span>Tax <small>(8.25%)</small></span><strong id="tax">$0.00</strong></div>
            <div class="total-row"><span>Total</span><strong id="total">$0.00</strong></div>
          </div>
          <button class="charge-button" id="charge-button" type="button" disabled>Charge $0.00 <span>→</span></button>
          <p class="payment-hint">Taxes calculated automatically</p>
        </aside>
      </div>
    </section>
  </main>
  <div class="toast" id="toast" role="status" aria-live="polite"></div>
</body>
</html>
