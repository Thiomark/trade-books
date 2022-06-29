# First Step - before you do anything:  *NB
    - create a database called bookstore (with all lowercase)
    - add your information suchs as PORT, USER in the DBConn.php file (located in the config folder)
    - run the createTable.php script which will create tblUser and tblBook tables and add dummy data

# config folder containes all the configration of the application like:
    - BDConn.php            = which creates the connection between the web application and the database
    - createTable.php       = which deletes tblUser and tblBook tables and the re-adds them in the database
    - userData              = which contains dummy data for the users createTable
    - booksData             = whcih contains dummy data for the books table 

# To create admin user: * NB   
    - register like how students register by going to the login.php url
    - use the password "admin321"

# to approve students:
    - Only admins can approve users
    - if you are an admin an "Office link" will show on the navigation which will show all the unapproved students 
    - click on approve will make it possible for them to add books

# How to add books;
    - on the navigation section there is a "sell" option which is for selling books
    - You must be approved first by the admin

# Users can = login, register, add books (ONLY if approved)
# Admin can = login, register, approve users, add books


# application structure:
    config folder - conatins configration for the application
    server_login - conatins server code for authetication, logout, approving students, adding books and images folder:
