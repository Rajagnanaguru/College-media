<?php
    include_once "config.php";
    $uname = mysqli_real_escape_string($conn,$_POST['username']);
    $pwd = mysqli_real_escape_string($conn,$_POST['password']);
    $conf_pwd = mysqli_real_escape_string($conn,$_POST['conf_password']);
    $uname_pat = '/^[A-Za-z][A-Za-z0-9]{5,20}$/';
    $upperCase = preg_match('@[A-Z]@',$pwd);
    $lowerCase = preg_match('@[a-z]@',$pwd);
    $number = preg_match('@[0-9]@',$pwd);

    //Checking whether all input fields are filled or not
    if(!empty($uname) && !empty($pwd) && !empty($conf_pwd)){
        //validatiing username
        if(preg_match($uname_pat,$uname))
        {
            $sql1 = "SELECT * FROM STUDENT WHERE UNAME= '{$uname}'";
            $row = $conn -> query($sql1);
            //checking whether the email already exists
            if(mysqli_num_rows($row)>0){
                echo "Username already exists";
            }
            else{
                //Validating password
                if($upperCase && $lowerCase && $number && strlen($pwd)>8){
                    //Checking whether the cpassword and confirm the password are same
                    if($pwd == $conf_pwd){
                        //inserting the data inot student table
                        $sql2 = "INSERT INTO STUDENT(UNAME,PASSWORD) VALUES('$uname','$pwd')";
                        if($conn->query($sql2)){
                            echo "Success";
                        }
                        else{
                            echo "Something went wrong";
                        }
                    }
                    else{
                        echo "Confirm the password correctly";
                    }
                }
                else{
                    echo "Password is not valid";
                }
            }
        }
        else{
            echo "Username is not valid";
        }

    }
    else{
        echo "All input fields are required";
    }
?>
