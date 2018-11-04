Demo application using powerorm ecosystem
-----------------------------------------

This is a demo app that shows how to use 

 - [powerom](http://powerorm.readthedocs.io/en/1.1.0/) - the orm
 - [powerormfaker](http://powerorm.readthedocs.io/en/1.1.0/) - generate dummy data for the orm models
 - [powerform](http://powerorm.readthedocs.io/en/1.1.0/) - create forms based on the orm models
 - [powerormdebugger](http://powerorm.readthedocs.io/en/1.1.0/) - toolbar to get sqls statements run bt the orm.

It does not use any frameworks just a straight plain php project for easier understanding.

NOTE
----
This demo uses the development version of the orm branch 1.1.0.x-dev.

This explains why you will find some new features on this demo.

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
create database called `powerormcomponents` and update the database configurations to work with your database.

Run migrations
--------------
Once the database is created you will have to create tables that this app uses.
To do this simple run 

``php pmanager migrate``

Generate data
--------------

To use the exact data i'm using for this examples on your database. 

Run this command to have powerormfaker generate the exact data.

``php pmanager faker:generatedata -r 50 -s 123456``

Run php server
--------------
All code samples are located under `app/`. 

The application use the builtin php server, to start using 

``php -S 127.0.0.1:8000/app/``
 