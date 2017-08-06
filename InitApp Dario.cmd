@echo off
cd %~d0%~p0 
start cmd.exe
start http://192.168.1.121:9000
php artisan serve --port=9000 --host=192.168.1.121
-start http://127.0.0.1:9000
-php artisan serve --port=9000 --host=127.0.0.1


