<?php
error_reporting(0);
session_start();
if ($_SESSION["new_session"] == false) {
    header('location:log.php');
    exit;
}

$df = $_SESSION['emailadd'];


$search_name = $_POST['search'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogging Website</title>
    <link rel="shortcut icon" href="fold/logo.png" type="image/x-icon">
    <style>
        body {
            background-color: aliceblue;
        }

        #blog_tail {
            font-family: 'Courier New', Courier, monospace;
            color: Navy;
            /* margin-left: 80%; */
            /* margin: 80%,80%,80%,80%; */
            /* margin-right: -20%; */
            /* align-items: right; */
            margin-top: -20px;
            float: right;
            font-weight: 600;
        }

        a {
            text-decoration: none;

        }

        #head_box {
            border: navy 1px solid;
            border-radius: 12px;
            padding: 2%;
            font-family: 'Courier New', Courier, monospace;
            color: navy;
            width: 95%;
            /* display: flexbox; */
            background: -webkit-linear-gradient(top, rgb(204, 255, 242) 20%, rgb(26, 255, 198) 70%);
            position: fixed !important;
            box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.5);
            text-align: center;
            align-items: center;
        }

        #head_box h2 {
            margin: 1% 0% -1.5% 0%;
            display: flexbox;
        }

        #head_box marquee {
            width: 74%;
            margin: 0% 0% 0% 25%;
            display: flexbox;
        }

        #blog_box_1 {
            /* border: navy 1px solid; */
            border: none;
            border-radius: 12px;
            padding: 2%;
        }

        #blog_box_2 {
            border: navy 1px solid;
            border-radius: 9px;
            padding: 2%;
            background-color: whitesmoke;
            box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.5);
            margin-bottom: 20px;
        }

        #blog_form {
            margin: 9% 0% -43.15% 33%;
            border: navy 1px solid;
            border-radius: 12px;
            padding: 2%;
            width: 390px;
            height: 450px;
            opacity: 0.9;
            background-color: #00cccc;
            position: fixed;
            display: none;
            z-index: 1;
        }

        #blog_form label {
            font-family: 'Courier New', Courier, monospace;
            font-size: 18px;
            color: navy;
            font-weight: 700;
        }

        #blog_form input {
            font-family: 'Courier New', Courier, monospace;
            font-size: 16px;
            font-weight: 200;
            width: 380px;
            border-radius: 7px;
            height: 30px;
            border: 0.2px solid black;
        }

        #blog_form textarea {
            font-family: 'Courier New', Courier, monospace;
            font-size: 16px;
            font-weight: 200;
            width: 380px;
            border-radius: 7px;
            height: 120px;
        }

        #blog_form_button {
            background-color: skyblue;
            border-radius: 4px;
            padding: 1.5%;
            font-family: 'Courier New', Courier, monospace;
            color: navy;
            border: 0.4px solid navy;
            font-size: 20px;
            font-weight: 600;
            cursor: pointer;
            width: 385px;
        }

        #blog_form h4 {
            font-family: Arial, Helvetica, sans-serif;
            margin: -5% 0% 0% 95%;
            font-weight: 50;
            cursor: pointer;
        }

        .dom_x {
            color: brown;
        }

        .dom_z {
            color: green;
        }

        buttom {
            padding: 4%;
            /* background-color: #bfc0c8; */
            /* background: -webkit-linear-gradient(top, rgb(133, 165, 235, 0.32) 20%, rgb(133, 165, 235) 70%); */
            color: black;
            font-family: 'Courier New', Courier, monospace;
            /* border: 0.5px solid navy; */
            cursor: pointer;
            /* margin: 0% 0% 0% 17%; */
            font-weight: 560;
            border-radius: 4px;
        }

        .mfg {
            padding: 4%;
            /* background-color: #bfc0c8; */
            /* background: -webkit-linear-gradient(top, rgb(133, 165, 235, 0.32) 20%, rgb(133, 165, 235) 70%); */
            color: black;
            font-family: 'Courier New', Courier, monospace;
            /* border: 0.5px solid navy; */
            cursor: pointer;
            /* margin: 0% 0% 0% 17%; */
            font-weight: 560;
            border-radius: 4px;
        }


        #side_box {
            padding: 2%;
            padding-top: 0%;
            background-color: gray;
            color: whitesmoke;
            margin-bottom: -10%;
            margin-left: 86%;
            height: 158px;
            position: fixed;
            border-top-left-radius: 12px;
            border-bottom-left-radius: 12px;
            width: 10%;
            border: 0.5px solid navy;
        }

        #reset_button {
            border: none;
            background-color: inherit;
            padding: 0;
            margin: 0% 0% 0% 0%;
            cursor: pointer;
        }

        #welcome_user {
            color: green;
            font-weight: 200;
            font-family: 'Courier New', Courier, monospace;
        }

        details {
            color: brown;
        }

        summary {
            font-family: 'Courier New', Courier, monospace;
        }

        summary:hover {
            cursor: pointer;
            /* color: #bfc0c8; */
        }

        summary::after {
            color: #bfc0c8;
        }

        #s_bold {
            font-size: 12px;
            font-weight: bolder;
            font-family: Arial, Helvetica, sans-serif;
        }

        .mfg {
            margin-left: 25px;
            color: bisque;
            font-family: 'Courier New', Courier, monospace;
        }

        #blog_logo {
            height: 200px;
            margin-top: -80px;
            margin-bottom: -70px;
        }

        #search_bar {
            /* display: flexbox; */
            margin-top: 10px;
            border-radius: 17px;
            height: 22px;
        }

        #musk {
            color: black;
            font-weight: 900;
            background-color: rgb(26, 255, 198);
            border: none;
            margin-top: 8px;
            cursor: pointer;
        }

        #search_post {
            margin: 9% 0% -43.15% 12%;
            border: navy 1px solid;
            border-radius: 12px;
            padding: 2%;
            width: 1090px;
            height: 450px;
            opacity: 0.9;
            background-color: #00cccc;
            position: fixed;
            /* display: none; */
            z-index: 1;
        }
    </style>
</head>


<body>



    <!-- <form action="blog_load.php" method="POST" id="blog_form">
        <button type="reset" id="reset_button">
            <img src="fold/r.svg" alt="reset">
        </button>
        <h4 onclick="blog_form_hide();">X</h4>
        <br><br>
        <div style="display: none;">

            <php
            if (mysqli_num_rows($last_query_x) > 0) {
                $r = 0;
                while ($look = mysqli_fetch_array($last_query_x)) {
            ?>

                    <input type="text" name="writer" id="" required="required" class="mrx" value="<php echo $look["userid"]; ?> "><br><br>

            <php
                    $r++;
                }
            } else {
                echo "No result found";
            }
            ?>
        </div>
        <label for="title">Title</label><br>
        <input type="text" name="title" id="" required="required" id="blog_title" class="mrx"><br><br>
        <label for="blog">Blog</label><br>
        <textarea type="text" name="blog" id="" required="required" id="blog_blog" class="mrx"></textarea><br><br><br><br>
        <button type="submit" id="blog_form_button">Submit</button>
    </form> -->






    <!-- <div id="search_post">
        <button onclick="fish();">X</button>
        <script>
            function brown() {
                document.getElementById('false_fish').click();
            }

            function fish() {
                document.getElementById('search_post').style.display = 'none';

            }
        </script>

        <?php

        
if (isset($_SERVER['REQUEST_METHOD'])) {


    require "connector.php";

    $sql_query = "SELECT * FROM blog LEFT JOIN users ON blog.writer=users.userid ORDER BY id DESC WHERE `search_name` LIKE '%$search_name%' ";
    $sql_query_x = "SELECT userid,email FROM users WHERE email='$df' WHERE `search_name` LIKE '%$search_name%'";

    $last_query = mysqli_query($connection, $sql_query);
    $last_query_x = mysqli_query($connection, $sql_query_x);


    // $sql_query = "SELECT * FROM `blog` WHERE `search_name` LIKE '%$search_name%'";
    // $last_query = mysqli_query($connection, $sql_query_search);

    $connection->close();
}



        if (mysqli_num_rows($last_query_search) > 0) {
            $ss = 0;
            while ($loop_search = mysqli_fetch_array($last_query_search)) {
        ?>
                <div id="blog_box_2">
                    <p class="dom_z">
                        Blog No.
                        <?php echo $loop_search["id"]; ?>
                    </p>
                    <h3>
                        <?php echo $loop_search["type"]; ?>
                    </h3>
                    <p>
                        <?php echo $loop_search["blog"]; ?>
                    </p>
                    <h5>Written By : <?php echo $loop_search["name"]; ?></h5>
                    <details>
                        <summary>Comments :</summary>
                        <?php
                        if (isset($_SERVER['REQUEST_METHOD'])) {
                            require "connector.php";

                            $cfs = $loop_search['id'];

                            $sql_query_2_search = "SELECT * FROM comment  LEFT JOIN users ON comment.writer=users.email WHERE blogid='$cfs' ORDER BY id DESC LIMIT 10";

                            $last_query_2_search = mysqli_query($connection, $sql_query_2_search);

                            $connection->close();
                        }
                        if (mysqli_num_rows($last_query_2_search) > 0) {
                            $ts = 0;
                            while ($pool_search = mysqli_fetch_array($last_query_2_search)) {
                        ?>
                                <p class="dom_x"><?php echo $pool_search["comment"]; ?></p>
                                <p class="dom_x" id="s_bold">Comment By <?php echo $pool_search["name"]; ?></p>
                                <hr>
                        <?php
                                $ts++;
                            }
                        } else {
                            echo "No result found";
                        }
                        ?>
                    </details>
                    <br>
                    <form action="comment_load.php" method="POST">
                        <div style="display: none;">
                            <input type="text" name="blogid" id="" value="<?php echo $loop_search["id"]; ?>">
                            <input type="text" name="writer" id="" value="<?php echo $_SESSION['emailadd']; ?>">
                        </div>
                        <input type="text" name="comment" placeholder="Enter Your Comment" required="required">
                        <button type="submit" onclick="blog_form_hide();">Comment</button>
                    </form>
                </div>
        <?php
                $ss++;
            }
        } else {
            echo "No Blogs found";
        }
        ?>
    </div> -->


    <div id="head_box">
        <h4 id="blog_tail">
            <a href="out.php">
                <!-- &nbsp;Do Log Out -->
                <img src="fold/box-arrow-right.svg" alt="">
            </a>
        </h4>
        <img src="fold/logo.png" alt="" height="40px" id="blog_logo">
        <!-- <h2>WordStream</h2> -->
        <!-- <marquee behavior="scroll" direction="left">
            Free to express your words
        </marquee> -->
        <br>

        <a href="index.php">
            <p id="welcome_user" style="color:black;font-weight:bold;">Welcome
                <?php
                echo $_SESSION['emailadd'];
                ?>

            </p>
        </a>

        <div>
            <buttom onclick="blog_form_show();">Create Blog</buttom>
            |
            <a href="my_blog.php" class="mfg" style="color: black; margin: x 1px;">My Blogs</a>
            <br>
            <form action="patala.php">
                <input type="text" name="search" id="search_bar">

                <brown onclick="brown();">
                    <img src="fold/search.svg" alt="" id="musk">
                </brown>
                <button type="submit" style="display: none;" id="false_fish">
                </button>
            </form>

        </div>

    </div>

    <!-- <div id="side_box">
        <h3>Create A Blog</h3>
        <buttom onclick="blog_form_show();">Create</buttom>
        <br>
        <br>
        <hr>
        <a href="my_blog.php" class="mfg">My Blogs</a>
        <hr>
        <a href="out.php">
            <h4 id="blog_tail">&nbsp;Do Log Out</h4>
        </a>
        <br>
    </div> -->
    <div id="blog_box_1">

        <div style="height: 230px;"> </div>


        <?php
        if (mysqli_num_rows($last_query) > 0) {
            $s = 0;
            while ($loop = mysqli_fetch_array($last_query)) {
        ?>

                <div id="blog_box_2">
                    <p class="dom_z">
                        Blog No.
                        <?php echo $loop["id"]; ?>
                    </p>
                    <h3>
                        <?php echo $loop["type"]; ?>
                    </h3>
                    <p>
                        <?php echo $loop["blog"]; ?>
                    </p>

                    <h5>Written By : <?php echo $loop["name"]; ?></h5>



                    <details>
                        <summary>Comments :</summary>

                        <?php
                        if (isset($_SERVER['REQUEST_METHOD'])) {


                            require "connector.php";

                            $cf = $loop['id'];

                            $sql_query_2 = "SELECT * FROM comment  LEFT JOIN users ON comment.writer=users.email WHERE blogid='$cf' ORDER BY id DESC LIMIT 10";

                            $last_query_2 = mysqli_query($connection, $sql_query_2);

                            $connection->close();
                        }


                        if (mysqli_num_rows($last_query_2) > 0) {
                            $t = 0;
                            while ($pool = mysqli_fetch_array($last_query_2)) {
                        ?>
                                <p class="dom_x"><?php echo $pool["comment"]; ?></p>
                                <p class="dom_x" id="s_bold">Comment By <?php echo $pool["name"]; ?></p>
                                <hr>
                        <?php
                                $t++;
                            }
                        } else {
                            echo "No result found";
                        }
                        ?>

                    </details>




                    <br>
                    <form action="comment_load.php" method="POST">
                        <div style="display: none;">
                            <input type="text" name="blogid" id="" value="<?php echo $loop["id"]; ?>">
                            <input type="text" name="writer" id="" value="<?php echo $_SESSION['emailadd']; ?>">
                        </div>
                        <input type="text" name="comment" placeholder="Enter Your Comment" required="required">
                        <button type="submit" onclick="blog_form_hide();">Comment</button>
                    </form>

                </div>



        <?php
                $s++;
            }
        } else {
            echo "No Blogs found";
        }
        ?>

    </div>

    <script src="script.js"></script>
</body>

</html>