Hello, 
First things first, create the DB locally 
'iap_gig_connector'
to start your project locally, please run the following commands.

Backend
composer install
cp .env.example .env
cp .env.example .env
php artisan key:generate
php artisan migrate

Frontend
npm install
npm run dev
php artisan serve

