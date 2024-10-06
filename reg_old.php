<?php

// if ($_SERVER["REQUEST_METHOD"] == "POST") {

//     require "connector.php";

//     // $username = $_POST["roll"];
//     $password = $_POST["pass"];
//     $cpassword = $_POST["cpass"];

//     $name = $_POST["name"];
//     $phone = $_POST["phone"];
//     $email = $_POST["email"];
//     $address = $_POST["address"];


//     if ($password == $cpassword) {
//         $hash = password_hash($password, PASSWORD_DEFAULT);
//         $sql_query = "INSERT INTO `users`(`pass`, `name`, `phone`,`email`,`addr`) VALUES ('$hash','$name','$phone','$email','$address')";
//         // $query_2 = "INSERT INTO `details`(`roll`, `name`, `phone`,`email`,`addr`) VALUES ('$username','$name','$phone','$email','$address')";

//         $final_query = mysqli_query($connection, $sql_query);
//         // $ultimate_query = mysqli_query($connection,$query_2);

//         if ($final_query) {
//             // if($ultimate_query){
//             header('location:log.php');
//             // }
//         }
//     }
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WordStream</title>
    <link rel="shortcut icon" href="fold/logo.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        clifford: '#da373d',
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background-color: #e6fff9;

        }

        .box0 {
            border: 1px green solid;
            margin: 11% 2% 5% 2%;
            border-radius: 12px;
            display: flex;
        }

        #reg_form {
            /* border: 1px red solid; */
            margin: 2%;
            padding: 2%;
            width: 470px;
            border-radius: 10px;
            background-color: #53c683;
            border-top: 4px solid #26734d;
            display: flexbox;
            box-shadow: 8px 8px 16px rgba(0, 0, 0, 0.5);

        }

        #reg_form label {
            width: 456px;
            font-size: 18px;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }

        #reg_form input {
            width: 456px;
            font-size: 20px;
            height: 27px;
            border-radius: 4px;
        }

        #reg_button {
            background-color: green;
            cursor: pointer;
            padding: 1.5%;
            /* float: right; */
            margin: -8% 0% 0% 82%;
            color: whitesmoke;
            font-size: 16px;
            font-weight: 600;
            font-family: Arial, Helvetica, sans-serif;
            border-radius: 4px;
            box-shadow: 8px 8px 16px rgba(0, 0, 0, 0.5);
        }

        #reg_button:hover {
            box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.5);
            background-color: #009975;

        }

        #reg_head {
            font-family: 'Courier New', Courier, monospace;
            margin: 10% 0% -10% 0%;
            color: lightseagreen;
            text-align: center;
        }

        #reg_img {
            display: flexbox;
            margin: 11% 0% -2% 14%;
            height: 400px;
        }

        span {
            margin: 2% 0% -6% 0%;
        }

        input::placeholder {
            font-size: 14px;
            color: #00994d;
        }

        #logo_dis {
            height: 200px;
            margin: -2% 0% -4% 0%;
        }

        #fonk {
            text-align: center;
            align-items: center;
            justify-content: baseline;
            /* background:red; */
            margin-bottom: -140px;
            margin-top: -10px;
        }
    </style>
</head>

<body >
    <!-- <div class="relative h-full w-full bg-white">
        <div class="absolute bottom-0 left-0 right-0 top-0 bg-[linear-gradient(to_right,#4f4f4f2e_1px,transparent_1px),linear-gradient(to_bottom,#4f4f4f2e_1px,transparent_1px)] bg-[size:14px_24px] [mask-image:radial-gradient(ellipse_80%_50%_at_50%_0%,#000_70%,transparent_110%)]"></div>
    </div> -->
    <div id="fonk">
        <img src="fold/logo.png" alt="" id="logo_dis">
    </div>
    <h2 id="reg_head">Registration Form</h2>
    <div class="box0">
        <form action="" method="post" id="reg_form">
            <br>
            <!-- <label for="roll">University Roll No.</label><br>
                <input type="text" name="roll" id="reg_roll" required="required" placeholder="Write Your Roll Number"><br><br> -->
            <label for="name">Name</label><br>
            <input type="text" name="name" id="" required="required" placeholder="Enter Your Full Name"><br><br>
            <label for="phone">Phone</label><br>
            <input type="text" name="phone" id="" required="required" placeholder="Enter Phone Number"><br><br>
            <label for="email">Email</label><br>
            <input type="email" name="email" id="" required="required" placeholder="Enter Email Address"><br><br>
            <label for="address">Address</label><br>
            <input type="text" name="address" id="" required="required" placeholder="Enter Relevent Address"><br><br>
            <label for="pass">Password</label><br>
            <input type="password" name="pass" id="reg_pass" required="required" placeholder="Enter Password"><br><br>
            <label for="cpass">Confirm Password</label><br>
            <input type="password" name="cpass" id="reg_cpass" required="required" placeholder="Re-enter Password"><br><br>
            <br>
            <span>Already Signed-Up, <a href="log.php">Log In</a></span>
            <button type="submit" id="reg_button">Sign Up</button>
        </form>
        <img src="fold/reg.png" alt="" id="reg_img">
    </div>
</body>

</html>