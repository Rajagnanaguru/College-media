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
    UNAME CHARACTER(50) NOT NULL,
    SNAME CHARACTER(50) NOT NULL,
    DEPT CHARACTER(50),
    IMAGE CHARACTER(50),
    PASSWORD CHARACTER(100)
  )";
  if($conn->query($sql) == TRUE)
    echo "STUDENT table created successfully!";
  else
    die("Error in STUDENT table creation".$conn->error);


    // Creation of clubs table
    $sql = "CREATE TABLE CLUBS(
      CLUB_ID INT PRIMARY KEY,
      CLUB_NAME CHARACTER(60),
      U_ID INT,
      FOREIGN KEY(U_ID) REFERENCES STUDENT(S_ROLLNO)
    )";
    if($conn->query($sql))
      echo "CLUBS table created successfully!";
    else
      die("Error in CLUBS table creation".$conn->error);


      // Creation of ACTIVITIES table
          $sql = "CREATE TABLE ACTIVITIES(
            ACT_ID INT,
            ACT_NAME CHARACTER(60),
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
              CHAT_ID INT PRIMARY KEY,
              SENDER INT,
              RECIEVER INT,
              MESSAGE CHARACTER(200),
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
                  CHAT_ID INT,
                  MESSAGE CHARACTER(200),
                  FOREIGN KEY(SENDER) REFERENCES STUDENT(S_ROLLNO)
                )";
                if($conn->query($sql))
                  echo "GROUPCHAT table created successfully!";
                else
                  die("Error in GROUPCHAT table creation".$conn->error);
  $conn->close(); //Closing connection to server
?>
