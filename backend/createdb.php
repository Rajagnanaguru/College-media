<?php

  $servername = "localhost";
  $username = "root";
  $password = "";

/*  $conn = new mysqli($servername,$username,$password);  // Establising connection with server.

  if($conn->connect_error)
    die("Connection Failure:".$conn->connect_error);

  $sql = "CREATE DATABASE COLLEGE_MEDIA"; // Query to create the database

  if($conn->query($sql) == TRUE)
    echo "Database creation successful!\n";
  else
    die("Error in database creation ".$conn->error);
  $conn->close();
*/

  $db = "COLLEGE_MEDIA";
  $conn = new mysqli($servername,$username,$password,$db);  // Establising connection with server.
  $sql = "CREATE TABLE STUDENT(
    S_ROLLNO INT PRIMARY KEY,
    UNAME VARCHAR(50) NOT NULL,
    SNAME VARCHAR(50) NOT NULL,
    DEPT VARCHAR(50),
    IMAGE VARCHAR(50),
    PASSWORD VARCHAR(100)
  )";
  if($conn->query($sql) == TRUE)
    echo "STUDENT table created successfully!";
  else
    die("Error in STUDENT table creation".$conn->error);


    // Creation of clubs table
    $sql = "CREATE TABLE CLUBS(
      CLUB_ID INT PRIMARY KEY AUTO_INCREMENT,
      CLUB_NAME VARCHAR(60),
      U_ID INT,
      FOREIGN KEY(U_ID) REFERENCES STUDENT(S_ROLLNO)
    )";
    if($conn->query($sql))
      echo "CLUBS table created successfully!";
    else
      die("Error in CLUBS table creation".$conn->error);


      // Creation of ACTIVITIES table
          $sql = "CREATE TABLE ACTIVITIES(
            ACT_ID INT PRIMARY KEY AUTO_INCREMENT,
            ACT_NAME VARCHAR(60),
            C_ID INT,
            DATEOFACT DATE,
            FOREIGN KEY(C_ID) REFERENCES CLUBS(CLUB_ID)
          )";
          if($conn->query($sql))
            echo "ACTIVITIES table created successfully!";
          else
            die("Error in ACTIVITIES table creation".$conn->error);


  // Creation of CHAT table
            $sql = "CREATE TABLE CHAT(
              CHAT_ID INT PRIMARY KEY AUTO_INCREMENT,
              SENDER INT,
              RECIEVER INT,
              MESSAGE VARCHAR(200),
              READSTATUS INT,
              CHECK (READSTATUS IN (0,1)),
              FOREIGN KEY(SENDER) REFERENCES STUDENT(S_ROLLNO),
              FOREIGN KEY(RECIEVER) REFERENCES STUDENT(S_ROLLNO)
            )";
            if($conn->query($sql))
              echo "CHAT table created successfully!";
            else
              die("Error in CHAT table creation".$conn->error);


          // Creation of groupchat
                $sql = "CREATE TABLE GROUPCHAT(
                  SENDER INT,
                  C_ID INT,
                  TIMESTMP TIMESTAMP,
                  CHAT_ID INT PRIMARY KEY AUTO_INCREMENT,
                  MESSAGE VARCHAR(200),
                  FOREIGN KEY(SENDER) REFERENCES STUDENT(S_ROLLNO)
                )";
                if($conn->query($sql))
                  echo "GROUPCHAT table created successfully!";
                else
                  die("Error in GROUPCHAT table creation".$conn->error);
  $conn->close(); //Closing connection to server
?>
