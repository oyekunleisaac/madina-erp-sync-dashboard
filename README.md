ERP-Madina Product Sync Dashboard

A lightweight Laravel-based dashboard for syncing and comparing product data between an ERP system and the Madina store.


Features

* View ERP and Madina product data side-by-side
* Highlight mismatches in stock, price, and status
* Sync individual products from ERP to Madina


File Structure

* `resources/views/dashboard.blade.php` - Main dashboard interface (Blade template)
* `public/css/sync.css` - Styling (CSS)
* `public/js/sync.js` - Dynamic sync logic (JavaScript)
* `routes/web.php` - Route definition for `/dashboard`
* `storage/app/erp_products.json` - Mock ERP product data
* `storage/app/madina_products.json` - Mock Madina product data


Endpoints

* `GET /api/erp/products` - Fetch ERP products
* `GET /api/madina/products` - Fetch Madina products
* `POST /api/sync/product/{id}` - Sync a specific product by ID from ERP to Madina

Setup

1. Clone the repository:

  
   git clone https://github.com/your-username/your-repo.git
   

2. Install dependencies:

   
   composer install
   

3. Start the Laravel development server:

 
   php artisan serve


4. Open the dashboard in your browser:

 
   http://localhost:8000/dashboard

