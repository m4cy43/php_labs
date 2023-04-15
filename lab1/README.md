# How to use this app

## Download and setup php

This app is running on the localhost. To use this app you need to install php from the official site and do next steps:

- Open https://windows.php.net/download#php-8.2
- Choose VS16 x64 Thread Safe Zip file
- Extract zip-file and rename folder to 'php-_version_' (for example 'php-8.2.4')
- Move folder to 'C:\Program Files\'
- Find file 'php.ini-development', copy it and rename to 'php.ini'
- In new 'php.ini' file find rows ';extension_dir = "ext"' (row 768) and ';extension=mysqli' (row 938), and then remove ';' (uncomment the row). Save the file
- In windows find 'Edit the system enciroments virable'. Click 'Advanced' tab, then 'Enviroment variables'. In 'System variables' section find and chose 'Path', than click 'Edit' button. In new window click 'New' and add path to 'php-_version_' folder (for exmple 'C:\Program Files\php-8.2.4') and click 'Ok' in all windows

## Creating database schema

We need to create database schema and table to use this app:

- Open the project folder with IDE (optional)
- Start your MySql client
- In new tab run script (copy and run) from file 'createUserSchema.sql' in project folder
- Edit file 'dbConnect.php'. Change rows private (row 8) 'private $username = '_name_'' and (row 8) 'private $password = '_password_''. Change the _name_ and _password_ with your MySql name and password

## Starting the app

To start the app do next:

- In root of the folder open the terminal (optional in the IDE)
- Type in terminal 'php -S localhost:8080'
- Visit http://localhost:8080/
- Check the login and register forms, logout function
- Validation is name and password between 4 and 32 symbols
