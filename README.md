DEMO APP DEMOSTRATING USING POWERORM, POWERFORM, POWERORMFAKER
--------------------------------------------------------------

This is a demo app that shows how to use powerom, powerormfaker, and powerform.
It use not framework just a straight forward php example.

Install
-------
``git clone https://github.com/eddmash/powerocomponentsdemo.git``

Fetch packages
---------------
Get into the powercomponents folder and run to get the dependencies.

``composer update``
This downloads all the libraries this application depends on.

Update config
-------------
All configs are found under `app/Config/powerorm.php`.
create database called `tester` and update the database configurations to point to your database.

Run migrations
--------------
Once the database is created you will have to create tables that this app uses.
To do this simple run 

``php pmanager.php makemigrations``

Run php server
--------------
All code samples are located under `app/`. 

The application use the builtin php server, to start using 

``php -S 127.0.0.1:8000/app/``

NOTE
----
To create you own pages on this project you simple need to ensure you require
- header.php  - responsible to initialization of the orm, toolbar and exception handler.
- footer.php  - display of the toolbar

A simple page looks as below
``````
<?php require_once "header.php";?>
    ... content goes here
    <h4>Welcome to Power Components Demo</h4>
<?php require_once "footer.php";?>
``````

