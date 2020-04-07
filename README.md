## env ##

using mssql
```
DB_CONNECTION=sqlsrv
DB_HOST=127.0.0.1
DB_PORT=1433
DB_DATABASE=dbname
DB_USERNAME=sa
DB_PASSWORD=
```

run migrateion with seeder
```
php artisan migrate:refresh --seed
```
