![thumbnail](https://res.cloudinary.com/thiomark/image/upload/v1672769990/Trade_Books_-_Thumbnail_ly8xm3.png)
![desktop-home](https://res.cloudinary.com/thiomark/image/upload/v1657357601/large_tradebooks_home_8f10cc1378.png)
![approve-students](https://res.cloudinary.com/thiomark/image/upload/v1657357597/large_tradebooks_admin2_dc17534399.png)
![login](https://res.cloudinary.com/thiomark/image/upload/v1657357596/tradebooks_login_a2a8577841.png)
# The assignment requirements;
- [x] The user must be able to register and login
- [x] The registration information must be stored in a MySQL database
- [x] Users must fill in the name and student number fields when registering and then create a username and password
- [x] An 8-character password must be created and confirmed as the correct password
- [x] The user should be able to view used textbooks that have been loaded onto the application.
#### Librarian User (seller) Functionality: 
#### The college’s librarians will load the details of used books that students want to sell. For the user to start selling textbooks, the college librarians need to confirm the following details for the users (sellers): 
- [x] Verify that the seller is a student at the institution before the options to sell/upload the textbook are available to the buyer (from the MySQL database)
- [x] Remove books from the database that have been sold
- [x] Approve students, giving them the functionality to sell books
- [x] Communicate with all users regarding books that are being sold
- [x] Make sure that books are delivered to the buyers
- [x] Liaise between the buyer and the selle

# How to run the application
* Create a database called <ins>**bookstore**</ins> (with all lowercase)
* Add your information suchs as <ins>**PORT**</ins> and <ins>**DATABASE USER**</ins> in the DBConn.php file (located in the config folder)
* run the createTable.php script which will create tblUser and tblBook tables and add dummy data

#### &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <ins>Config folder containes all the configration of the application like:</ins>

* BDConn.php = which creates the connection between the web application and the database
* createTable.php = which deletes tblUser and tblBook tables and the re-adds them in the database
* userData = which contains dummy data for the users createTable
* booksData = whcih contains dummy data for the books table 

# To create admin user:
* register like how students register by going to the login.php url
* use the password "admin321"

### &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <ins>To approve students:</ins>
* Only admins can approve users
* if you are an admin an "Office link" will show on the navigation which will show all the unapproved students 
* click on approve will make it possible for them to add books

### &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <ins>How to add books:</ins>
* on the navigation section there is a "sell" option which is for selling books
* You must be approved first by the admin


# Application Structure:
<ins><strong>config folder</strong></ins> - conatins configration for the application </br>
<ins><strong>server_login </strong></ins> - conatins server code for authetication, logout, approving students, adding books and images folder:
