POS assignment using Laravel and Filament submitted by Shawn Malsawmhlua

Mizoram University B.Tech I.T 8th semester

Steps on how to run the POS system
Clone the Repository "git clone https://github.com/ReclusiarchShawn/lar-fil-pos.git"

Install dependencies "composer install"
Copy the .env.example file to create the .env file:"copy .env.example.env"
Open the .env file and cinfigure database settings like this-
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pos
DB_USERNAME=root
DB_PASSWORD=
Run database migration- "php artisan migrate"
Create admin using filament-"php artisan make:filament-user"
Then run server-"php artisan serve"
Login using the "gmail" and "password" that you created earlier in "/admin" route

How to use the system-
Users-Can create another user admin to edit or delete
Customers-admin can put in customer's information
Inventory:
Step 1-Categories:create category for the product eg-"food, electronic etc"
Step 2-Products:create the product and fill out its information
Step 3-Stock Product:fill in the necessary information from the Products panel
Step 4-Stocks:the information that you have made will where "product_name,barcode,quantity" will be shown taken from the Products and Stock Product panels
Step 5-Sales management:put in the necessary information where the information process of selling the product will be entered in the sales item 
Step 6-Sales Item:this panel will take the "product" from sales management rendering the product from sales management being sold where the "product" will disappear from sales management
Note:admins can delete or edit informations in every panel according to there needs
