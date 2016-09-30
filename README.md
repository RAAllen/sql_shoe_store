
# _SQL Shoe Store_

#### _This is an application that will pair brands of shoes with the stores that carry them.  September 30, 2016_

#### By _**Rebecca Allen**_

## Setup/Installation requirements

* _In order to utilize this project you will need a terminal application such as Terminal or Bash, a web browser such as Chrome or Firefox, PHP, MAMP, MySQL and the Composer application installed on your computer. If you want to additionally edit this program, you must have a text editor application such as Atom._
* _Start by opening the terminal and typing the command "git clone https://github.com/RAAllen/sql_shoe_store.git" after navigating with the "cd" command to the location you would like the project to be cloned in to._
* _In the terminal application navigate to the project folder using the "cd" command, then type the command "composer install"._
* _Next navigate to the web folder using the "cd" command._
* _Sign in to the MySQL shell by typing "/Applications/MAMP/Library/bin/mysql --host=localhost -uroot -proot"._
* _Launch the MAMP program and start its server, making sure the document root is set to the project folder in the Preferences>Web Server._
* _Then launch a local server from within the web folder of the project directory using the "php -S localhost:8000" command. If you are already running a localhost you should simply alter the number 8000 to something like 8001._
* _Next switch to your web browser and navigate to the server localhost:8000 you just created. The program should now launch._


## Program Specifications

* _The program will allow users to input and save a single stylist._
* Example Input: .
* Example Output: .

* _The program's databases were made with the following commands entered into the terminal. Before beginning navigate to the project directory. Then enter the following command "/Applications/MAMP/Library/bin/mysql --host=localhost -uroot -proot" to begin your mysql commands._
* CREATE DATABASE shoes;
* USE shoes;
* CREATE TABLE brands (name VARCHAR (255), id serial PRIMARY KEY);
* CREATE TABLE stores (name VARCHAR (255), id serial PRIMARY KEY);
* CREATE TABLE brands_stores (store_id INT, brand_id INT, id serial PRIMARY KEY);
* INSERT INTO brands (name) VALUES ('Nike');
* INSERT INTO brands (name) VALUES ('Saucony');
* INSERT INTO brands (name) VALUES ('Reebok');
* INSERT INTO brands (name) VALUES ('Clarks');
* INSERT INTO brands (name) VALUES ('Manolo Blahnik');
* INSERT INTO brands (name) VALUES ('Jimmy Choo');
* INSERT INTO brands (name) VALUES ('Christian Louboutin');
* INSERT INTO brands (name) VALUES ('Birkenstock');
* INSERT INTO brands (name) VALUES ('UGG');
* INSERT INTO brands (name) VALUES ('Crocs');
* INSERT INTO brands (name) VALUES ('Keds');
* INSERT INTO brands (name) VALUES ('Adidas');
* INSERT INTO brands (name) VALUES ('Cole Haan');
* INSERT INTO brands (name) VALUES ('Dr. Martens');
* INSERT INTO brands (name) VALUES ('Moon Boot');
* INSERT INTO stores (name) VALUES ("Fred's Footwear");
* INSERT INTO stores (name) VALUES ("Lila's Loafers");
* INSERT INTO stores (name) VALUES ("Sally's Shoes");
* INSERT INTO stores (name) VALUES ("Cathy's Clogs");
* INSERT INTO stores (name) VALUES ("Helena's Heels");
* INSERT INTO stores (name) VALUES ("Sam's Sneakers");
* INSERT INTO stores (name) VALUES ("Walkwell's");
* INSERT INTO brands_stores (store_id, brand_id) VALUES (1, 1);
* INSERT INTO brands_stores (store_id, brand_id) VALUES (1, 4);
* INSERT INTO brands_stores (store_id, brand_id) VALUES (1, 6);
* INSERT INTO brands_stores (store_id, brand_id) VALUES (1, 8);
* INSERT INTO brands_stores (store_id, brand_id) VALUES (1, 9);
* INSERT INTO brands_stores (store_id, brand_id) VALUES (1, 13);
* INSERT INTO brands_stores (store_id, brand_id) VALUES (1, 15);
* INSERT INTO brands_stores (store_id, brand_id) VALUES (2, 4);
* INSERT INTO brands_stores (store_id, brand_id) VALUES (2, 8);
* INSERT INTO brands_stores (store_id, brand_id) VALUES (2, 10);
* INSERT INTO brands_stores (store_id, brand_id) VALUES (2, 12);
* INSERT INTO brands_stores (store_id, brand_id) VALUES (3, 3);
* INSERT INTO brands_stores (store_id, brand_id) VALUES (3, 7);
* INSERT INTO brands_stores (store_id, brand_id) VALUES (3, 11);
* INSERT INTO brands_stores (store_id, brand_id) VALUES (3, 12);
* INSERT INTO brands_stores (store_id, brand_id) VALUES (3, 13);
* INSERT INTO brands_stores (store_id, brand_id) VALUES (3, 14);
* INSERT INTO brands_stores (store_id, brand_id) VALUES (3, 15);
* INSERT INTO brands_stores (store_id, brand_id) VALUES (4, 4);
* INSERT INTO brands_stores (store_id, brand_id) VALUES (4, 10);
* INSERT INTO brands_stores (store_id, brand_id) VALUES (5, 5);
* INSERT INTO brands_stores (store_id, brand_id) VALUES (5, 6);
* INSERT INTO brands_stores (store_id, brand_id) VALUES (5, 7);
* INSERT INTO brands_stores (store_id, brand_id) VALUES (6, 1);
* INSERT INTO brands_stores (store_id, brand_id) VALUES (6, 2);
* INSERT INTO brands_stores (store_id, brand_id) VALUES (6, 3);
* INSERT INTO brands_stores (store_id, brand_id) VALUES (6, 11);
* INSERT INTO brands_stores (store_id, brand_id) VALUES (6, 12);
* INSERT INTO brands_stores (store_id, brand_id) VALUES (7, 2);
* INSERT INTO brands_stores (store_id, brand_id) VALUES (7, 5);
* INSERT INTO brands_stores (store_id, brand_id) VALUES (7, 9);
* INSERT INTO brands_stores (store_id, brand_id) VALUES (7, 11);
* INSERT INTO brands_stores (store_id, brand_id) VALUES (7, 12);
* INSERT INTO brands_stores (store_id, brand_id) VALUES (7, 13);
* INSERT INTO brands_stores (store_id, brand_id) VALUES (7, 14);
* INSERT INTO brands_stores (store_id, brand_id) VALUES (7, 15);

## Support and Contact Details

_Please contact RebeccaZarsky@gmail.com for technical questions or assistance running the program_

## Technologies Used

_This program utilizes HTML, CSS, PHP, MySQL, PHPUnit, Twig, Composer and Bootstrap_

## License

*This program is licensed under the MIT license*

Copyright (c) 2016 **_Rebecca Allen_**
