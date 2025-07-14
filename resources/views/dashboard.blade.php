<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ERP ↔ Madina Product Sync</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/sync.css') }}">
</head>
<body>
  <div class="container">
    <div class="header">
      <h1>
        <i class="fas fa-database"></i>
        ERP
        <i class="fas fa-sync-alt sync-icon"></i>
        Madina
      </h1>
      <p>Product Synchronization Dashboard</p>
    </div>


    <div class="table-container">
      <table id="productTable">
        <thead>
          <tr>
            <th><i class="fas fa-box"></i> Product</th>
            <th><i class="fas fa-warehouse"></i> ERP Stock</th>
            <th><i class="fas fa-dollar-sign"></i> ERP Price</th>
            <th><i class="fas fa-toggle-on"></i> ERP Status</th>
            <th><i class="fas fa-warehouse"></i> Madina Stock</th>
            <th><i class="fas fa-dollar-sign"></i> Madina Price</th>
            <th><i class="fas fa-toggle-on"></i> Madina Status</th>
            <th><i class="fas fa-cogs"></i> Actions</th>
          </tr>
        </thead>
        <tbody id="productTableBody">

    </tbody>
      </table>
    </div>
  </div>

  <script src="{{ asset('js/sync.js') }}"></script>
</body>
</html>