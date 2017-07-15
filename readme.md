How to execute de Laravel Challange:

1 - Go to de application folder in the terminal

2 - Create database, tables and populate  (MySQL)

	Option A
		- import the script authentication.sql to MySQL by either using DBMS or command line
		
	Option B 
		- run the follow scripts
		
		MySQL (Data Base Management System (DBMS))		
		- CREATE DATABASE  IF NOT EXISTS `authentication` /*!40100 DEFAULT CHARACTER SET utf8 */;
		- USE `authentication`;
		
		Terminal (inside de Project Folder)
		- php artisan migrate
		- php artisan migrate:refresh --seed
		
This scrips will create the database 'authentication' with the following tables
- users - store the users in two types (managers and users) 
	MANAGER - could create, edit and list all users
	USER    - only access de system
- migrations 
- password_reminders

Configure the database access
Access the database.php file in App/config and change de user and password.

If you don't see a vendor folder, access the project folder in the terminal and run (requirement: composer)
- comporser dump-autoload

To run the system 
- access the project folder 
- run: php artisan serve

For the first access use:
	Email:    teste@teste.com
	Password: admin
	
Or create a new account (normal user).

	