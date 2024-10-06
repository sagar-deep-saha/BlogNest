<?php
// if ($_SERVER["REQUEST_METHOD"] == "POST") {

//     require "connector.php";

//     $emailid = $_POST["email"];
//     $password = $_POST["pass"];

//     $sql_query = "SELECT * FROM users WHERE email='$emailid';";

//     $ultimate_query = mysqli_query($connection, $sql_query);

//     $conditional_query = mysqli_num_rows($ultimate_query);
//     if ($conditional_query == 1) {
//         while ($conditional_query = mysqli_fetch_assoc($ultimate_query)) {
//             if (password_verify($password, $conditional_query['pass'])) {

//                 session_start();
//                 $_SESSION["new_session"] = true;
//                 $_SESSION["emailadd"] = $emailid;
//                 header('location:blog.php');
//             }
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
    <title>glitch</title>
    <link rel="shortcut icon" href="fold/logo.png" type="image/x-icon">
    <style>
        body {
            background-color: aliceblue;
        }

        .box0 {
            border: 1px green solid;
            margin: 11% 2% 5% 2%;
            border-radius: 12px;
            display: flex;
        }

        #log_form {
            /* border: 1px red solid; */
            margin: 2%;
            padding: 2%;
            width: 407px;
            border-radius: 10px;
            background-color: #53c683;
            border-top: 4px solid #26734d;
            display: flexbox;
            margin: 2% 2% 2% 65%;
            box-shadow: 8px 8px 16px rgba(0, 0, 0, 0.5);
        }

        #log_form label {
            width: 456px;
            font-size: 18px;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }

        #log_form input {
            width: 399px;
            font-size: 20px;
            height: 27px;
            border-radius: 4px;
        }

        #log_button {
            background-color: green;
            cursor: pointer;
            padding: 1.5%;
            /* float: right; */
            margin: -8% 0% 0% 84%;
            color: whitesmoke;
            font-size: 16px;
            font-weight: 600;
            font-family: Arial, Helvetica, sans-serif;
            border-radius: 4px;
            box-shadow: 8px 8px 16px rgba(0, 0, 0, 0.5);
        }

        #log_button:hover {
            box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.5);
            background-color: #009975;

        }

        #log_head {
            font-family: 'Courier New', Courier, monospace;
            margin: 10% 0% -10% 0%;
            color: lightseagreen;
            text-align: center;
        }

        #log_img {
            display: flexbox;
            margin: 3% 0% 0% -84%;
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

<body>
    <div id="fonk">
        <img src="fold/logo.png" alt="" id="logo_dis">
    </div>
    <h2 id="log_head">Log In</h2>
    <div class="box0">
        <form action="" method="post" id="log_form">
            <br>
            <label for="email">Email Address</label><br>
            <input type="text" name="email" id="log_email" placeholder="Enter Register Email"><br><br>
            <br>
            <label for="pass">Password</label><br>
            <input type="password" name="pass" id="log_pass" placeholder="Enter Password"><br><br>
            <br>
            <span>Not Yet Signed-Up, <a href="reg.php">Sign Up</a></span>
            <button type="submit" id="log_button">Log In</button>
        </form>
        <img src="fold/log.png" alt="" id="log_img">
    </div>
</body>

</html>