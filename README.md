## AMARAN ##
sila ubah seeding row . default 30 juta rekod 
https://github.com/hanafiah/audit-test/blob/master/database/seeds/PemilihSeeder.php#L16


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

test url
http://localhost/pemilih
