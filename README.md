# To Do List 

### Contents
* To Do List Website
* How To View/Work

*** 

### To Do List Website

### Home Page
Home Page - College Category: 
* The Home page displays all the tasks in the different categories

![image info](./readme-images/Home.png)


* Click the buttons to view tasks in other categories

Home Page - Home Category: 
![image info](./readme-images/Home-Home.png)

### Add Task Page

* To add a task - click on the Add Task Button in the Nav bar.
* This brings you to the Add Task form

![image info](./readme-images/AddTask01.png)

* Fill in the form - all required inputs need to be filled.
* If they are not a warning will pop up. 
* Unfilled required inputs will be highlighted red and 
  turn green once filled.

![image info](./readme-images/AddTask02.png)

![image info](./readme-images/AddTask03.png)


### Category Page

* To view your categories click the Manage Categories 
  button in the Nav bar.
* Here you can add or delete catgories.

![image info](./readme-images/Categories01.png)

* Fill in the input bar at the botton and press the 
  "Add" button to add a category.

![image info](./readme-images/Categories02.png)

* This will add the new category to the table

![image info](./readme-images/Categories03.png)

* Just press the "Delete" button beside the category name 
  to remove any unwanted categories. 

![image info](./readme-images/Categories04.png)


### Phone Size (as small as 576px)
* The website is responsive to different screen sizes 
  from desktop to phone.

* ![image info](./readme-images/Phone-Home.png)

* ![image info](./readme-images/Phone-AddTask.png)

* ![image info](./readme-images/Phone-Categories.png)

***

# How To View/Work

Click this link to see the application live:

[To Do List PHP CRUD app](https://mysql07.comp.dkit.ie/D00228217/ca2-php-crud-2/index.php)


or download it to run it locally

* Install [XAMPP](https://www.apachefriends.org/download.html)
* Run XAMPP as adminastrator and open Control Panel and run Apache and MySQL

![image info](./readme-images/XAMPP.png)

* Create a MySQL database called ca2-php-crud-2 in [PHP MyAdmin](http://localhost/phpmyadmin)

![image info](./readme-images/phpmyadmin.png)

* Go to SQL file and add the code from the "data-for-your-database.txt" file

![image info](./readme-images/sql.png)

* Move the PHP files into your XAMPP htdocs folder so Apache can process the PHP code

* Configure the database.php file to connect to your SQL database - change the username and password to yours

$dsn = 'mysql:host=localhost;dbname=ca2-php-crud-2';
$username = 'USERNAME';
$password = 'PASSWORD';