  <p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Comments

 - Inside the storage/app folder, a folder called "temp" is always created, where the files are stored before the scan, but the files are deleted right after, if you want to keep the files saved, comment the line in the controller: https://github.com/igorcfreittas/virus_scan/blob/main/app/Http/Controllers/ScanController.php#L68
 - The default folder where files are stored is defined here (Using Laravel's Storage class): https://github.com/igorcfreittas/virus_scan/blob/main/config/filesystems.php#L35
 - I used bootstrap in the view "form_scan" just to give it a style
 - The project was created based on the <a href="https://github.com/phpMussel"> phpMussel package </a>
 - This project does not use any database, all files except the ones created by me are from the standard Laravel project.

# SETUP

 - First you can clone the project and run the command: **composer install**
 - Then we will generate a secret key: **php artisan key:generate**
 - The project is basically ready, we can run it now: **php artisan serve** in the root of the project
 - By default the route will be: <a href="http://localhost:8000/"> http://localhost:8000/ </a>
 
# Web Page

 - Default

![image](https://github.com/igorcfreittas/virus_scan/assets/22238386/3945c213-9f92-4844-80c9-c8ea76c680bc)

 - If you are using it through the browser, the result will appear on the screen
 - Example

![image](https://github.com/igorcfreittas/virus_scan/assets/22238386/eabc83c7-28c8-4d4b-8b8c-94dc3ee6bbe6)

# API

 - You can also use via API in the route: **(POST) http://localhost:8000/api/scan**
 - Example

![image](https://github.com/igorcfreittas/virus_scan/assets/22238386/836cca80-9bf0-4aed-9870-531ede5b6e47)

## How to send a file via Postman

 - Create the route with the POST verb using the address mentioned above
 - Select: Body -> Form-data -> Create a key with the name "file", next to value select "file" and put your file

![image](https://github.com/igorcfreittas/virus_scan/assets/22238386/b8bc8f67-1631-430e-a0c1-63c38342bce1)

 - If that doesn't work, check your headers (the Content-type will change according to the uploaded file):
 - Some people need to disable Content-type to work, I need to keep it enabled, you can check what happens to you and modify

![image](https://github.com/igorcfreittas/virus_scan/assets/22238386/e7d9092e-b294-4c17-9f6e-ac82bc3b3e79)

So that's it, setup finished!
