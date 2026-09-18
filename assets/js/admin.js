const adminProducts = [
  { id: 1, name: "House latte", category: "Coffee", price: 4.5, stock: 42, icon: "☕", art: "art-orange" },
  { id: 2, name: "Iced matcha", category: "Coffee", price: 5.25, stock: 18, icon: "🍵", art: "art-mint" },
  { id: 3, name: "Butter croissant", category: "Food", price: 3.75, stock: 7, icon: "🥐", art: "art-yellow" },
  { id: 4, name: "Avocado toast", category: "Food", price: 8.5, stock: 24, icon: "🥑", art: "art-blue" },
  { id: 5, name: "Berry bowl", category: "Food", price: 7.25, stock: 4, icon: "🫐", art: "art-pink" },
  { id: 6, name: "Canvas tote", category: "Merch", price: 18, stock: 31, icon: "👜", art: "art-lilac" }
];
const list = document.querySelector("#admin-product-list");
const search = document.querySelector("#admin-search");
const category = document.querySelector("#category-filter");
const status = document.querySelector("#status-filter");
const modal = document.querySelector("#product-modal");
const form = document.querySelector("#product-form");
const toast = document.querySelector("#admin-toast");

function money(value) { return `$${value.toFixed(2)}`; }
function renderProducts() {
  const query = search.value.toLowerCase().trim();
  const visible = adminProducts.filter((product) => {
    const productStatus = product.stock <= 10 ? "Low stock" : "In stock";
    return product.name.toLowerCase().includes(query)
      && (category.value === "All" || category.value === product.category)
      && (status.value === "All" || status.value === productStatus);
  });
  list.innerHTML = visible.length ? visible.map((product) => {
    const isLow = product.stock <= 10;
    return `<tr><td><div class="table-product"><span class="table-art ${product.art}">${product.icon}</span><div><strong>${product.name}</strong><span>SKU-${String(product.id).padStart(4, "0")}</span></div></div></td><td>${product.category}</td><td>${money(product.price)}</td><td><span class="stock-number ${isLow ? "low" : ""}">${product.stock} units</span></td><td><span class="status-pill ${isLow ? "low-stock" : "in-stock"}">${isLow ? "Low stock" : "In stock"}</span></td><td><button class="table-action" type="button" data-edit="${product.id}" aria-label="Edit ${product.name}">•••</button></td></tr>`;
  }).join("") : '<tr><td class="empty-table" colspan="6">No products match those filters.</td></tr>';
  document.querySelector("#total-products").textContent = adminProducts.length;
  document.querySelector("#low-stock").textContent = adminProducts.filter((product) => product.stock <= 10).length;
}
function showToast(message) { toast.textContent = message; toast.classList.add("visible"); setTimeout(() => toast.classList.remove("visible"), 2200); }
function toggleModal(open) { modal.classList.toggle("open", open); modal.setAttribute("aria-hidden", String(!open)); if (!open) form.reset(); }
[search, category, status].forEach((control) => control.addEventListener("input", renderProducts));
document.querySelector("#add-product-button").addEventListener("click", () => toggleModal(true));
document.querySelector("#close-modal").addEventListener("click", () => toggleModal(false));
modal.addEventListener("click", (event) => { if (event.target === modal) toggleModal(false); });
document.addEventListener("click", (event) => { const edit = event.target.closest("[data-edit]"); if (edit) showToast("Product editing is ready to connect."); });
form.addEventListener("submit", (event) => { event.preventDefault(); const data = new FormData(form); adminProducts.push({ id: Date.now(), name: data.get("name"), category: data.get("category"), price: Number(data.get("price")), stock: Number(data.get("stock")), icon: "✦", art: "art-mint" }); renderProducts(); toggleModal(false); showToast("Product added to inventory."); });
renderProducts();
