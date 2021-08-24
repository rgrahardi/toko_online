## Toko Online
Toko Online adalah project latihan dibuat dengan dua versi
1. versi web diakses menggunakan browser
2. versi restapi diakses menggunakan postman
## Cara Install & Setup Codebase
untuk melakukan instalasi project ini, silahkan ikuti langkah langkah berikut :
1. git clone https://github.com/rgrahardi/toko_online.git
2. cd toko_online
3. composer install
4. cp .env.example .env
5. sesuaikan konfigurasi database
6. php artisan key:generate
7. php artisan jwt:secret
8. php artisan migrate
9. php artisan db:seed
10. php artisan serve

