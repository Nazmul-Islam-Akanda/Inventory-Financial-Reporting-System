## 📬 Inventory & Financial Reporting System  
A simple inventory system with proper accounting records and financial reports.  

## 🚀 Getting Started  
### 🛠 Setup Instructions  

#### 1. Clone the repository  
git clone https://github.com/Nazmul-Islam-Akanda/Inventory-Financial-Reporting-System.git  
cd Inventory-Financial-Reporting-System  

#### 2. Copy .env file  
cp .env.example .env  

#### 3. Update the .env File  
DB_CONNECTION=mysql  
DB_HOST=127.0.0.1  
DB_PORT=3306  
DB_DATABASE=inventory  
DB_USERNAME=root  
DB_PASSWORD=  

# --- Laravel app key ---  
🔑 Laravel app key will be automatically generated during container startup using:  
run: php artisan key:generate  

#### 4. Create a database  
Create a database with name inventory  

#### 6. Running the Application  
run: composer install  
Run: php artisan migrate  
Run: php artisan db:seed  
Run: php artisan serve  

##### Note  
Use 'admin@gmail.com' as user name and 'admin123' as password.  