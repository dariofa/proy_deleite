@echo off
cd %~d0%~p0 
start cmd.exe
start http://127.0.0.1:9000
php artisan serve --port=9000 --host=127.0.0.1


