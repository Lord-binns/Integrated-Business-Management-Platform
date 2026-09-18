<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Counter product administration dashboard.">
  <title>Counter | Admin</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/styles.css">
  <link rel="stylesheet" href="../assets/css/admin.css">
  <script src="../assets/js/admin.js" defer></script>
</head>
<body>
  <main class="app-shell">
    <aside class="sidebar" aria-label="Primary navigation">
      <a class="brand" href="../index.php" aria-label="Counter home"><span class="brand-mark">C</span><span>counter</span></a>
      <nav class="nav-list">
        <a class="nav-item" href="dashboard.php"><span class="nav-icon">▦</span> Register</a>
        <a class="nav-item active" href="admin-dashboard.php"><span class="nav-icon">◇</span> Products</a>
        <a class="nav-item" href="#orders"><span class="nav-icon">↗</span> Orders</a>
        <a class="nav-item" href="#customers"><span class="nav-icon">◎</span> Customers</a>
      </nav>
      <div class="admin-badge"><span>Admin workspace</span><strong>Manage your store</strong></div>
      <div class="sidebar-footer"><div class="status-dot"></div><div><strong>System online</strong><span>All services operational</span></div></div>
    </aside>

    <section class="workspace">
      <header class="topbar admin-topbar">
        <div><p class="eyebrow">System administration</p><h1>Product management</h1></div>
        <div class="topbar-actions"><button class="icon-button" type="button" aria-label="Notifications">♧<span class="notification-dot"></span></button><button class="profile-button" type="button"><span class="avatar">A</span><span>Alex Morgan</span><span class="chevron">⌄</span></button></div>
      </header>

      <div class="admin-content">
        <section class="metrics-grid" aria-label="Inventory summary">
          <article class="metric-card"><span class="metric-icon mint">◇</span><div><span>Total products</span><strong id="total-products">6</strong><small>Across 3 categories</small></div></article>
          <article class="metric-card"><span class="metric-icon blue">⌁</span><div><span>Inventory value</span><strong>$4,820</strong><small class="positive">↑ 12.4% this month</small></div></article>
          <article class="metric-card"><span class="metric-icon orange">!</span><div><span>Low stock items</span><strong id="low-stock">2</strong><small>Need attention today</small></div></article>
          <article class="metric-card"><span class="metric-icon lilac">↗</span><div><span>Items sold today</span><strong>148</strong><small class="positive">↑ 8.2% from yesterday</small></div></article>
        </section>

        <section class="management-panel" aria-labelledby="products-title">
          <div class="section-heading"><div><p class="eyebrow">Your inventory</p><h2 id="products-title">All products</h2></div><button class="primary-small" id="add-product-button" type="button">+ Add product</button></div>
          <div class="admin-toolbar"><label class="search-field admin-search"><span>⌕</span><input id="admin-search" type="search" placeholder="Search by product name" aria-label="Search products"></label><select id="category-filter" aria-label="Filter by category"><option value="All">All categories</option><option value="Coffee">Coffee</option><option value="Food">Food</option><option value="Merch">Merch</option></select><select id="status-filter" aria-label="Filter by stock status"><option value="All">All statuses</option><option value="In stock">In stock</option><option value="Low stock">Low stock</option></select></div>
          <div class="product-table-wrap"><table class="product-table"><thead><tr><th>Product</th><th>Category</th><th>Price</th><th>Stock</th><th>Status</th><th><span class="sr-only">Actions</span></th></tr></thead><tbody id="admin-product-list"></tbody></table></div>
        </section>
      </div>
    </section>
  </main>
  <div class="admin-modal" id="product-modal" aria-hidden="true"><div class="modal-card"><div class="modal-heading"><div><p class="eyebrow">Inventory</p><h2>Add a product</h2></div><button class="close-modal" id="close-modal" type="button" aria-label="Close">×</button></div><form id="product-form"><label>Product name<input name="name" type="text" placeholder="e.g. Vanilla latte" required></label><div class="form-row"><label>Category<select name="category"><option>Coffee</option><option>Food</option><option>Merch</option></select></label><label>Price<input name="price" type="number" min="0" step="0.01" placeholder="0.00" required></label></div><label>Stock quantity<input name="stock" type="number" min="0" placeholder="0" required></label><button class="charge-button" type="submit">Save product <span>→</span></button></form></div></div>
  <div class="toast" id="admin-toast" role="status" aria-live="polite"></div>
</body>
</html>
