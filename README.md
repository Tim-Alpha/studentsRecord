## About Project

    This is a simple student registration project. 
    Here you have to upload a .csv or .xsls file containing student data.
    As you you upload your .csv file server provide students information api, 
    server also save all the data to the mysql database in background and 
    uploading is not fail even user refresh or leave the page, 
    rest while server also satrt sending email to those student whose data is successfully add to the database.

## How to setup project

-  cd studendRecord/
-  cd code . 
-  composer install // to install all the related depenencies 
-  php artisan serve // to run server  --> if using docker run: -> ./vendor/bin/sail up
-  run appache and mysql server and database // --> if using docker no need to do this step
-  php artisan schedule:work // to send email on local envirounment
-  php artisan queue:work  // to upload data in background by reducing larger file into smaller chunk
-  php artisan migrate  // to create related table in database

## How to Upload CSV file

    To upload csv file you can use sample UI provided in project for testing on the other hand use API also,

    If want to use UI page to upload .csv file vist the url : -> http://127.0.0.1/upload

    Note:- please kindly run the server before visiting url.

## How to get student data in API

    POST - upload/
    HOST - 127.0.0.1/ 
    Content-type: multipart/form-data

    on successful upload:
        -> The respected data send through API
    on unsuccessfull upload:
        -> Error message is send to the user

## Email sending

Email sending is a background process and don't effect the API and UI interface.
Don't create any API for emails, please make sure that email addres provide in .csv file is a valid email address.
