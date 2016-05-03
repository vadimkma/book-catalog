# Yii-Sample-Project

This is my a simple example project with the PHP Yii-Framework. It is used as a sample project in the PHP. 

Notes
=====

This is the first project to use Yii, the project is implemented book catalog

## Settings


### Database
Backup database in the project root, you have to restore it and change the settings in the database file

```
\protected\config\database.php
```

```
        'connectionString' => 'mysql:host=localhost;dbname=library',
	'emulatePrepare' => true,
	'username' => 'root',
	'password' => '',
	'charset' => 'utf8',
```

## Test data
Now you can login as a demo or as admin.
Test data 
```
-admin 
    login: admin 
    password: admin
-demo 
    login: demo 
    password: demo
```