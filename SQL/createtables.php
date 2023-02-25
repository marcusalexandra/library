<?php
//Database connection
  $servername = "localhost";
  $username = "root";
  $password = "";
  $databasename = "library";
  $connect = mysqli_connect($servername, $username, $password, $databasename);
  //Checks connection and prints a message
  if($connect){
    echo "Connected Succsesfully! <br>";
    //If the connection has been succsesfull then it creates the tables
    $createtable1 = mysqli_query($connect, "CREATE TABLE users (
        user_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(100),
        user_password VARCHAR(50),
        firstname VARCHAR(100),
        lastname VARCHAR(100),
        token VARCHAR(255),
        -- active INT( 1 ) NOT NULL DEFAULT '0',
        profile_picture BLOB
      )"
    );
    //Checks if the table has been created
    if($createtable1){
        echo "Users table created succsesfully! <br>";
    }else{
        echo "Failed to create users table! <br>";
    }
    $createtable2 = mysqli_query($connect, "CREATE TABLE books (
        book_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(100),
        author VARCHAR(100),
        publisher VARCHAR(200),
        description LONGTEXT,
        published_date DATE,
        book_picture BLOB
      )"
    );
    //Checks if the table has been created
    if($createtable2){
        echo "Books table created succsesfully! <br>";
    }else{
        echo "Failed to create books table! <br>";
    }
    $createtable3 = mysqli_query($connect, "CREATE TABLE borrowed (
        borrow_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        borrow_date DATE,
        due_date DATE,
        returned_date DATE,
        book_id INT UNSIGNED,
        FOREIGN KEY (book_id) REFERENCES books(book_id),
        user_id INT UNSIGNED,
        FOREIGN KEY (user_id) REFERENCES users(user_id)
      )"
    );
    //Checks if the table has been created
    if($createtable3){
        echo "Borrowed table created succsesfully! <br>";
    }else{
        echo "Failed to create borrowed table! <br>";
    }
  }else{
    echo "Connection Failed! <br>";
  }
?>