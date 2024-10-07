<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require "connector.php";

    $password = $_POST["pass"];
    $cpassword = $_POST["cpass"];

    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["address"];


    if ($password == $cpassword) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql_query = "INSERT INTO `users`(`pass`, `name`, `phone`,`email`,`addr`) VALUES ('$hash','$name','$phone','$email','$address')";

        $final_query = mysqli_query($connection, $sql_query);

        if ($final_query) {
            header('location:log.php');
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlogNest</title>
    <link rel="shortcut icon" href="fold/logo.png" type="image/x-icon">

</head>
<style>
    body {
        /* background: linear-gradient(to right, #4f4f4f2e 1px, transparent 1px),
            linear-gradient(to bottom, #4f4f4f2e 1px, transparent 1px);
        background-size: 14px 24px; */
        background-image: url('fold/flowers-notebook-near-laptop.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        text-align: center;
    }

    .form-control {
        text-align: left;
        margin: 20px;
        margin-top: -190px;
        margin-left: 34%;
        background-color: #ffffff;
        box-shadow: 0 15px 25px rgba(0, 0, 0, 0.6);
        width: 400px;
        display: flex;
        justify-content: center;
        flex-direction: column;
        gap: 10px;
        padding: 25px;
        border-radius: 8px;
        position: fixed;
        z-index: 3;
    }

    .title {
        font-size: 28px;
        font-weight: 800;
    }

    .input-field {
        position: relative;
        width: 100%;
    }

    .input {
        margin-top: 15px;
        width: 100%;
        outline: none;
        border-radius: 8px;
        height: 45px;
        border: 1.5px solid #ecedec;
        background: transparent;
        padding-left: 10px;
    }

    .input:focus {
        border: 1.5px solid #2d79f3;
    }

    .input-field .label {
        position: absolute;
        top: 25px;
        left: 15px;
        color: #ccc;
        transition: all 0.3s ease;
        pointer-events: none;
        z-index: 2;
    }

    .input-field .input:focus~.label,
    .input-field .input:valid~.label {
        top: 5px;
        left: 5px;
        font-size: 12px;
        color: #2d79f3;
        background-color: #ffffff;
        padding-left: 5px;
        padding-right: 5px;
    }

    .submit-btn {
        margin-top: 30px;
        height: 55px;
        background: #f2f2f2;
        border-radius: 11px;
        border: 0;
        outline: none;
        color: #ffffff;
        font-size: 18px;
        font-weight: 700;
        background: linear-gradient(180deg, #363636 0%, #1b1b1b 50%, #000000 100%);
        box-shadow: 0px 0px 0px 0px #ffffff, 0px 0px 0px 0px #000000;
        transition: all 0.3s cubic-bezier(0.15, 0.83, 0.66, 1);
        cursor: pointer;
    }

    .submit-btn:hover {
        box-shadow: 0px 0px 0px 2px #ffffff, 0px 0px 0px 4px #0000003a;
    }

    #logo {
        height: 200px;
        position: relative;
        z-index: 4;
        margin-top: -3.5%;
        margin-bottom: 3.5%;
    }
</style>

<body>

    <div>
        <img src="fold/logo.png" alt="" id="logo">
        <div>
            <form class="form-control" action="" method="post">
                <p class="title">Sign Up</p>
                <div class="input-field">
                    <input required="" class="input" type="text" name="name" />
                    <label class="label" for="input">Enter Full Name</label>
                </div>
                <div class="input-field">
                    <input required="" class="input" type="text" name="phone" />
                    <label class="label" for="input">Enter Phone No.</label>
                </div>
                <div class="input-field">
                    <input required="" class="input" type="email" name="email" />
                    <label class="label" for="input">Enter Email</label>
                </div>
                <div class="input-field">
                    <input required="" class="input" type="text" name="address" />
                    <label class="label" for="input">Enter Relevant Address</label>
                </div>
                <div class="input-field">
                    <input required="" class="input" type="password" name="pass" />
                    <label class="label" for="input">Enter Password</label>
                </div>
                <div class="input-field">
                    <input required="" class="input" type="password" name="cpass" />
                    <label class="label" for="input">Re-enter Password</label>
                </div>
                <span>Already Signed-Up, <a href="log.php">Sign In</a></span>
                <button class="submit-btn" type="submit">Sign Up</button>
            </form>

        </div>
    </div>


</body>

</html>