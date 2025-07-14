async function fetchData() {
  const erpRes = await fetch('/api/erp/products?ts=' + Date.now());
  const madinaRes = await fetch('/api/madina/products?ts=' + Date.now());

  const erpData = await erpRes.json();
  const madinaData = await madinaRes.json();

  const tbody = document.querySelector("#productTable tbody");
  tbody.innerHTML = "";

  erpData.forEach(erpProduct => {
    const madinaProduct = madinaData.find(p => p.id === erpProduct.id);

    const row = document.createElement("tr");

    const isMismatch = (key) =>
      madinaProduct && madinaProduct[key] !== erpProduct[key] ? 'highlight' : '';

    row.innerHTML = `
      <td>${erpProduct.name}</td>
      <td class="${isMismatch('stock')}">${erpProduct.stock}</td>
      <td class="${isMismatch('price')}">${erpProduct.price}</td>
      <td class="${isMismatch('status')}">${erpProduct.status}</td>
      <td class="${isMismatch('stock')}">${madinaProduct?.stock ?? '-'}</td>
      <td class="${isMismatch('price')}">${madinaProduct?.price ?? '-'}</td>
      <td class="${isMismatch('status')}">${madinaProduct?.status ?? '-'}</td>
      <td>
        <button class="btn btn-primary" onclick="syncProduct(${erpProduct.id})">
          <i class="fas fa-sync"></i> Sync Now
        </button>
      </td>
    `;

    tbody.appendChild(row);
  });
}

async function syncProduct(productId) {
  const button = event.target.closest('button');
  const originalContent = button.innerHTML;
  
  try {
    button.disabled = true;
    button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Syncing...';
    
    await fetch(`/api/sync/product/${productId}`, {
      method: 'POST'
    });
    
    await fetchData(); 
    
  } catch (error) {
    console.error('Error syncing product:', error);
    alert('Failed to sync product. Please try again.');
  } finally {
    button.disabled = false;
    button.innerHTML = originalContent;
  }
}

document.addEventListener("DOMContentLoaded", fetchData);