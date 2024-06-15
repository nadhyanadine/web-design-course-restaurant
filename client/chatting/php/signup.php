<?php 
session_start();
include_once "config.php";
$fname = mysqli_real_escape_string($conn, $_REQUEST['fname'] ?? '');
$lname = mysqli_real_escape_string($conn, $_REQUEST['lname'] ?? '');
$email = mysqli_real_escape_string($conn, $_REQUEST['email'] ?? '');
$password = mysqli_real_escape_string($conn, $_REQUEST['password'] ?? '');

if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
    // let's check user email is valid or not
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) { //IF EMAIL IS VALID
        // let's chech that email already exist in the database or not
        $sql = mysqli_query($conn,"SELECT email FROM  users WHERE email = '{$email}'");
        if(mysqli_num_rows($sql) > 0) { //if email elready exist
            echo "$email - this email already exist";
        } else {
            // let's check user upload file or not
            if(isset($_FILES['image'])) { //if file is uploaded
                $img_name = $_FILES['image']['name']; //getting user uploaded img name
                $img_type = $_FILES['image']['type']; //getting user upload img type
                $tmp_name =$_FILES['image']['tmp_name']; // this temporary name is used to save/move file in our folder

                //let's explode image and get the last extension name like jpg png
                $img_explode = explode('.', $img_name);
                $img_ext = end($img_explode); // here we get the extension of an user uploaded img file

                $extensions = ['png', 'jpeg', 'jpg']; //these are sine valid img ext and we've store them in array
                if(in_array($img_ext, $extensions) === true) {
                    $time = time();
               

                    $new_img_name = $time.$img_name;
                    
                    if(move_uploaded_file($tmp_name, "images/". $new_img_name)){
                    $status = "Active now";
                    $random_id = rand(time(), 10000000);
                
                
                    $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status)
                            VALUES('{$random_id}', '{$fname}', '{$lname}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");

                    if($sql2) {
                        $sql3 = mysqli_query($conn,"SELECT * FROM users WHERE email = '{$email}'");
                        if(mysqli_num_rows($sql3) > 0){
                            $row = mysqli_fetch_assoc($sql3);
                            $_SESSION['unique_id'] = $row['unique_id'];
                            echo "success";
                        }
                    } else {
                        echo "Something went wrong!";
                    }
                }

                }else{
                    echo "Please select an Image file - jpeg, jpg, png!";
                }

            } else {
                echo "Please select an Image file!";
            }
        }

    } else {
        echo "$email - this is not a valid email!";
    }
    } else {
        echo "All input field are required!";
    }

?>
