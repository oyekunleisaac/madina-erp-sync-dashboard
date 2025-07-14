ERP Madina Product Sync Dashboard
A lightweight Laravel-based dashboard for syncing and comparing product data between an ERP system and the Madina store.
Features
•	View ERP and Madina product data side-by-side
•	Highlight mismatches (stock, price, status)
•	Sync individual products from ERP to Madina
File Structure
File / Folder	Description
resources/views/dashboard.blade.php	Main dashboard interface (HTML)
public/css/sync.css	Styling (CSS)
public/js/sync.js	Dynamic sync logic (JavaScript)
routes/web.php	Route definition (/dashboard)
storage/app/erp_products.json	Mock ERP product data
storage/app/madina_products.json	Mock Madina product data

Endpoints
Method	Endpoint	Description
GET	/api/erp/products	Fetch ERP products
GET	/api/madina/products	Fetch Madina products
POST	/api/sync/product/{id}	Sync product by ID from ERP

Setup
1.	Clone the repo
2.	Run composer install
3.	Start the server: php artisan serve
4.	Visit: http://localhost:8000
