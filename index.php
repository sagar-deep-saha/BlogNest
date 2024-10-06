<?php
session_start();
if ($_SESSION["new_session"] == false) {
    header('location:log.php');
    exit;
}

$df = $_SESSION['emailadd'];


if (isset($_SERVER['REQUEST_METHOD'])) {

    require "connector.php";

    $sql_query = "SELECT * FROM users WHERE email='$df';";
    $last_query = mysqli_query($connection, $sql_query);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container {
            position: relative;
            height: 100%;
            width: 100%;
            background-color: white;
        }

        .gradient-overlay {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background-image: radial-gradient(#e5e7eb 1px, transparent 1px);
            background-size: 16px 16px;
        }

        body {
            text-align: center;
        }

        .card {
            width: 70%;
            background: #454f4f;
            clip-path: polygon(30px 0%,
                    100% 0,
                    100% calc(100% - 30px),
                    calc(100% - 30px) 100%,
                    0 100%,
                    0% 30px);
            border-top-right-radius: 20px;
            border-bottom-left-radius: 20px;
            display: flex;
            flex-direction: column;
            margin-top: 3%;
            margin-bottom: -30%;
            padding-top: 6%;
            padding-bottom: 6%;
            margin-left: 15%;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            opacity: 0.7;
            position: fixed;
        }

        .card span {
            font-weight: bold;
            color: white;
            text-align: center;
            display: block;
            font-size: 1em;
        }

        .card .info {
            font-weight: 400;
            color: white;
            display: block;
            text-align: center;
            font-size: 0.72em;
            margin: 1em;
        }

        .card .img {
            width: 4.8em;
            height: 4.8em;
            background: white;
            border-radius: 15px;
            margin: auto;
        }

        .card .share {
            margin-top: 1em;
            display: flex;
            justify-content: center;
            gap: 1em;
        }

        .card a {
            color: white;
            transition: 0.4s ease-in-out;
        }

        .card a:hover {
            color: red;
        }

        .card button {
            padding: 0.8em 1.7em;
            display: block;
            margin: auto;
            border-radius: 25px;
            border: none;
            font-weight: bold;
            background: #ffffff;
            color: rgb(0, 0, 0);
            transition: 0.4s ease-in-out;
        }

        .card button:hover {
            background: red;
            color: white;
            cursor: pointer;
        }

        #doss {
            padding: 0.8em 1.7em;
            display: block;
            margin: auto;
            border-radius: 25px;
            border: none;
            font-weight: bold;
            background: #ffffff;
            color: rgb(0, 0, 0);
            transition: 0.4s ease-in-out;
        }

        #doss:hover {
            background: blue;
            color: white;
            cursor: pointer;
        }


        table {
            border: black 0.5px solid;
            margin: auto 12%;
            border-radius: 10px;
            color: whitesmoke;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        th {
            border: black 0.5px solid;
            border-radius: 8px;
            padding: 2%;
            font-size: 18px;
            width: 30%;
        }

        td {
            border: black 0.5px solid;
            border-radius: 8px;
            padding: 2%;
            width: 30%;
            font-size: 18px;
        }
    </style>
</head>

<body class="gradient-overlay">
    <div>
        <div class="card">
            <br>
            <span style="margin-top:-40px;">About Me</span>
            <p class="info">
            <table>
                <?php
                if (mysqli_num_rows($last_query) == 1) {
                    while ($loop = mysqli_fetch_array($last_query)) {
                ?>
                        <tr>
                            <th>Name:</th>
                            <td><?php echo $loop["name"]; ?></td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td><?php echo $loop["email"]; ?></td>
                        </tr>
                        <tr>
                            <th>Phone:</th>
                            <td><?php echo $loop["phone"]; ?></td>
                        </tr>
                        <tr>
                            <th>Address:</th>
                            <td><?php echo $loop["addr"]; ?></td>
                        </tr>
                <?php
                    }
                } else {
                    echo "No result found";
                }
                ?>
            </table>
            </p>
            <a href="blog.php">
                <button id="doss">Home Page
                </button>
            </a>
            <br>
            <a href="out.php">

                <button style="margin-bottom: -40px;">Log Out
                    &nbsp;
                    <img src="fold/box-arrow-right.svg" alt="" height="16px" style="font-weight: bold;margin-bottom:-3px;">
                </button>
            </a>
        </div>

    </div>
</body>

</html>