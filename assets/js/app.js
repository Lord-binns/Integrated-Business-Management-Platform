const products = [
  { id: 1, name: "House latte", category: "Coffee", price: 4.5, icon: "☕", art: "art-orange" },
  { id: 2, name: "Iced matcha", category: "Coffee", price: 5.25, icon: "🍵", art: "art-mint" },
  { id: 3, name: "Butter croissant", category: "Food", price: 3.75, icon: "🥐", art: "art-yellow" },
  { id: 4, name: "Avocado toast", category: "Food", price: 8.5, icon: "🥑", art: "art-blue" },
  { id: 5, name: "Berry bowl", category: "Food", price: 7.25, icon: "🫐", art: "art-pink" },
  { id: 6, name: "Canvas tote", category: "Merch", price: 18, icon: "👜", art: "art-lilac" }
];

let cart = [{ productId: 1, quantity: 1 }, { productId: 3, quantity: 2 }];
let activeCategory = "All";

const productGrid = document.querySelector("#product-grid");
const cartItems = document.querySelector("#cart-items");
const searchInput = document.querySelector("#search");
const subtotalElement = document.querySelector("#subtotal");
const taxElement = document.querySelector("#tax");
const totalElement = document.querySelector("#total");
const chargeButton = document.querySelector("#charge-button");
const toast = document.querySelector("#toast");

function formatMoney(amount) {
  return `$${amount.toFixed(2)}`;
}

function renderProducts() {
  const query = searchInput.value.toLowerCase().trim();
  const visibleProducts = products.filter((product) => {
    const matchesCategory = activeCategory === "All" || product.category === activeCategory;
    const matchesSearch = product.name.toLowerCase().includes(query);
    return matchesCategory && matchesSearch;
  });

  productGrid.innerHTML = visibleProducts.length
    ? visibleProducts.map((product) => `
      <article class="product-card">
        <div class="product-art ${product.art}">${product.icon}</div>
        <div class="product-info">
          <div><strong>${product.name}</strong><span>${formatMoney(product.price)}</span></div>
          <button class="add-product" type="button" data-add="${product.id}" aria-label="Add ${product.name}">+</button>
        </div>
      </article>`).join("")
    : '<p class="empty-cart">No products match your search.</p>';
}

function renderCart() {
  if (!cart.length) {
    cartItems.innerHTML = '<div class="empty-cart">Your order is empty.<br>Add an item to get started.</div>';
  } else {
    cartItems.innerHTML = cart.map((item) => {
      const product = products.find((entry) => entry.id === item.productId);
      return `<div class="cart-item">
        <div class="mini-art ${product.art}">${product.icon}</div>
        <div><strong>${product.name}</strong><span>${formatMoney(product.price)} each</span>
          <div class="quantity-controls"><button type="button" data-decrease="${product.id}" aria-label="Decrease ${product.name}">−</button><span>${item.quantity}</span><button type="button" data-increase="${product.id}" aria-label="Increase ${product.name}">+</button></div>
        </div>
        <span class="item-price">${formatMoney(product.price * item.quantity)}</span>
      </div>`;
    }).join("");
  }

  const subtotal = cart.reduce((sum, item) => {
    const product = products.find((entry) => entry.id === item.productId);
    return sum + product.price * item.quantity;
  }, 0);
  const tax = subtotal * 0.0825;
  const total = subtotal + tax;
  subtotalElement.textContent = formatMoney(subtotal);
  taxElement.textContent = formatMoney(tax);
  totalElement.textContent = formatMoney(total);
  chargeButton.textContent = `Checkout · ${formatMoney(total)}`;
  const arrow = document.createElement("span");
  arrow.textContent = "→";
  chargeButton.append(arrow);
  chargeButton.disabled = cart.length === 0;
}

function updateQuantity(productId, change) {
  const item = cart.find((entry) => entry.productId === productId);
  if (!item && change > 0) cart.push({ productId, quantity: 1 });
  if (item) item.quantity += change;
  cart = cart.filter((entry) => entry.quantity > 0);
  renderCart();
}

document.addEventListener("click", (event) => {
  const addButton = event.target.closest("[data-add]");
  if (addButton) updateQuantity(Number(addButton.dataset.add), 1);
  const increaseButton = event.target.closest("[data-increase]");
  if (increaseButton) updateQuantity(Number(increaseButton.dataset.increase), 1);
  const decreaseButton = event.target.closest("[data-decrease]");
  if (decreaseButton) updateQuantity(Number(decreaseButton.dataset.decrease), -1);
  if (event.target.closest(".add-note")) showToast("Notes can be added at checkout.");
  if (event.target.closest("#charge-button") && !chargeButton.disabled) showToast("Checkout is ready to connect.");
});

document.querySelectorAll(".category-tab").forEach((button) => {
  button.addEventListener("click", () => {
    activeCategory = button.dataset.category;
    document.querySelectorAll(".category-tab").forEach((tab) => tab.classList.toggle("selected", tab === button));
    renderProducts();
  });
});

searchInput.addEventListener("input", renderProducts);

let toastTimer;
function showToast(message) {
  toast.textContent = message;
  toast.classList.add("visible");
  clearTimeout(toastTimer);
  toastTimer = setTimeout(() => toast.classList.remove("visible"), 2400);
}

renderProducts();
renderCart();
