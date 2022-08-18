# First Step
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

### &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <ins> Users Can:</ins>
[x] Login

[x] Register

[x] Add books - (ONLY if approved)
### &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <ins> Admin Can: </ins> 
[x] Login

[x] Register

[x] Approve users

[x] Add books


# Application Structure:
<ins><strong>config folder</strong></ins> - conatins configration for the application </br>
<ins><strong>server_login </strong></ins> - conatins server code for authetication, logout, approving students, adding books and images folder:
