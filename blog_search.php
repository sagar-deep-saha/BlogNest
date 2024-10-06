<?php
error_reporting(0);
session_start();
if ($_SESSION["new_session"] == false) {
    header('location:log.php');
    exit;
}

$df = $_SESSION['emailadd'];

$search_name = $_POST['search'];

if (isset($_SERVER['REQUEST_METHOD'])) {


    require "connector.php";

    $sql_query = "SELECT * FROM blog LEFT JOIN users ON blog.writer=users.userid WHERE `type` LIKE '%$search_name%' OR `blog` LIKE '%$search_name%' ORDER BY id DESC ";
    $sql_query_x = "SELECT userid,email FROM users WHERE email='$df' ";

    $last_query = mysqli_query($connection, $sql_query);
    $last_query_x = mysqli_query($connection, $sql_query_x);

    $connection->close();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        background: linear-gradient(to right, #4f4f4f2e 1px, transparent 1px),
            linear-gradient(to bottom, #4f4f4f2e 1px, transparent 1px);
        background-size: 14px 24px;
        text-align: center;
    }


    .card {
        width: 99%;
        height: fit-content;
        background-color: white;
        box-shadow: 0px 187px 75px rgba(0, 0, 0, 0.01), 0px 105px 63px rgba(0, 0, 0, 0.05), 0px 47px 47px rgba(0, 0, 0, 0.09), 0px 12px 26px rgba(0, 0, 0, 0.1), 0px 0px 0px rgba(0, 0, 0, 0.1);
        border-radius: 17px 17px 27px 27px;
    }

    .title {
        width: 99%;
        height: 50px;
        position: relative;
        display: flex;
        align-items: center;
        padding-left: 20px;
        border-bottom: 1px solid #d9d9d9;
        border-top: 1px solid #d9d9d9;
        font-weight: 700;
        font-size: 13px;
        color: #47484b;
        border-top-left-radius: 40px;
        border-top-right-radius: 40px;
        box-shadow: 0px -187px 75px rgba(0, 0, 0, 0.01), 0px -105px 63px rgba(0, 0, 0, 0.05), 0px -47px 47px rgba(0, 0, 0, 0.09), 0px -12px 26px rgba(0, 0, 0, 0.1), 0px 0px 0px rgba(0, 0, 0, 0.1);


    }

    .title::after {
        content: '';
        width: 8ch;
        height: 1px;
        position: absolute;
        bottom: -1px;
        background-color: #47484b;
    }

    .comments {
        display: grid;
        grid-template-columns: 35px 1fr;
        gap: 20px;
        padding: 20px;
    }

    .comment-react {
        width: 35px;
        height: fit-content;
        display: grid;
        grid-template-columns: auto;
        margin: 0;
        background-color: #f1f1f1;
        border-radius: 5px;
    }

    .comment-react button {
        width: 35px;
        height: 35px;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: transparent;
        border: 0;
        outline: none;
    }

    .comment-react button:after {
        content: '';
        width: 40px;
        height: 40px;
        position: absolute;
        left: -2.5px;
        top: -2.5px;
        background-color: #f5356e;
        border-radius: 50%;
        z-index: 0;
        transform: scale(0);
    }

    .comment-react button svg {
        position: relative;
        z-index: 9;
    }

    .comment-react button:hover:after {
        animation: ripple 0.6s ease-in-out forwards;
    }

    .comment-react button:hover svg {
        fill: #f5356e;
    }

    .comment-react button:hover svg path {
        stroke: #f5356e;
        fill: #f5356e;
    }

    .comment-react hr {
        width: 80%;
        height: 1px;
        background-color: #dfe1e6;
        margin: auto;
        border: 0;
    }

    .comment-react span {
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: auto;
        font-size: 13px;
        font-weight: 600;
        color: #707277;
    }

    .comment-container {
        display: flex;
        flex-direction: column;
        gap: 15px;
        padding: 0;
        margin: 0;
    }

    .comment-container .user {
        display: grid;
        grid-template-columns: 40px 1fr;
        gap: 10px;
    }

    .comment-container .user .user-pic {
        width: 40px;
        height: 40px;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #f1f1f1;
        border-radius: 50%;
    }

    .comment-container .user .user-pic:after {
        content: '';
        width: 9px;
        height: 9px;
        position: absolute;
        right: 0px;
        bottom: 0px;
        border-radius: 50%;
        background-color: #0fc45a;
        border: 2px solid #ffffff;
    }

    .comment-container .user .user-info {
        width: 99%;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: center;
        gap: 3px;
    }

    .comment-container .user .user-info span {
        font-weight: 700;
        font-size: 12px;
        color: #47484b;
        font-size: 18px;
    }

    .comment-container .user .user-info p {
        font-weight: 600;
        font-size: 10px;
        color: #acaeb4;
    }

    .comment-container .comment-content {
        font-size: 14px;
        line-height: 16px;
        font-weight: 600;
        color: #5f6064;
    }

    .text-box {
        width: 98%;
        height: fit-content;
        padding: 8px;
        border-top: 1px solid #d9d9d9;
        ;
        margin-bottom: 60px;
    }

    .text-box .box-container {
        background-color: #ffffff;
        border-radius: 8px 8px 21px 21px;
        padding: 8px;
        border-bottom: 1px solid;
    }

    .text-box textarea {
        width: 100%;
        height: 40px;
        resize: none;
        border: 0;
        border-radius: 6px;
        padding: 12px 12px 10px 12px;
        font-size: 13px;
        outline: none;
        caret-color: #0a84ff;
    }

    .text-box .formatting {
        display: grid;
        grid-template-columns: auto auto auto auto auto 1fr;
    }

    .text-box .formatting button {
        width: 30px;
        height: 30px;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: transparent;
        border-radius: 50%;
        border: 0;
        outline: none;
    }

    .text-box .formatting button:hover {
        background-color: #f1f1f1;
    }

    .text-box .formatting .send {
        width: 30px;
        height: 30px;
        background-color: #0a84ff;
        margin: 0 0 0 auto;
    }

    .text-box .formatting .send:hover {
        background-color: #026eda;
    }

    @keyframes ripple {
        0% {
            transform: scale(0);
            opacity: 0.6;
        }

        100% {
            transform: scale(1);
            opacity: 0;
        }
    }


    #blog_logo {
        height: 200px;
        margin-top: -80px;
        margin-bottom: -70px;
    }

    #search_bar {
        border-radius: 17px;
        height: 18px;
        border: 0.25px solid;
    }

    #head_box {
        border-radius: 12px;
        padding: 2%;
        font-family: 'Courier New', Courier, monospace;
        color: navy;
        width: 95%;
        background: -webkit-linear-gradient(top, rgb(255, 252, 252) 20%, rgb(227, 227, 227) 70%);
        position: fixed !important;
        box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.5);
        text-align: left;
        align-items: center;
        z-index: 3;
        display: flex;
    }

    #head_box h2 {
        margin: 1% 0% -1.5% 0%;
        display: flexbox;
    }

    #blog_tail {
        font-family: 'Courier New', Courier, monospace;
        color: Navy;
        margin-left: 30%;
        color: red !important;
        font-weight: 600;
    }


    .form-box {
        width: 30%;
        background: #f1f7fe;
        overflow: hidden;
        border-radius: 16px;
        color: #010101;
        margin-left: 36%;
        margin-top: 10%;
        z-index: 4;
        position: fixed;
    }

    .form {
        position: relative;
        display: flex;
        flex-direction: column;
        padding: 32px 24px 24px;
        gap: 16px;
        text-align: center;

    }

    .title2 {
        font-weight: bold;
        font-size: 1.6rem;
    }

    .subtitle {
        font-size: 1rem;
        color: #666;
    }

    .form-container {
        overflow: hidden;
        border-radius: 8px;
        background-color: #fff;
        margin: 1rem 0 .5rem;
        width: 100%;
    }

    .input {
        background: none;
        border: 0;
        outline: 0;
        height: 40px;
        width: 100%;
        border-bottom: 1px solid #eee;
        font-size: .9rem;
        padding: 8px 15px;
    }

    .form-section {
        padding: 16px;
        font-size: .85rem;
        background-color: #e0ecfb;
        box-shadow: rgb(0 0 0 / 8%) 0 -1px;
    }

    .form-section a {
        font-weight: bold;
        color: #0066ff;
        transition: color .3s ease;
    }

    .form-section a:hover {
        color: #005ce6;
        text-decoration: underline;
    }

    .form button {
        background-color: #0066ff;
        color: #fff;
        border: 0;
        border-radius: 24px;
        padding: 10px 16px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: background-color .3s ease;
    }

    .form button:hover {
        background-color: #005ce6;
    }


    .card1 {
        position: fixed;
        background-color: #ffffff;
        text-align: left;
        border-radius: 0.5rem;
        max-width: 290px;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        z-index: 9;
        margin-left: 38%;
        margin-top: 12%;
        display: none;

    }

    .header1 {
        padding: 1.25rem 1rem 1rem 1rem;
        background-color: #ffffff;

    }

    .image1 {
        display: flex;
        margin-left: auto;
        margin-right: auto;
        background-color: #FEE2E2;
        flex-shrink: 0;
        justify-content: center;
        align-items: center;
        width: 3rem;
        height: 3rem;
        border-radius: 9999px;
    }

    .image1 svg {
        color: #DC2626;
        width: 1.5rem;
        height: 1.5rem;
    }

    .content1 {
        margin-top: 0.75rem;
        text-align: center;
    }

    .title1 {
        color: #111827;
        font-size: 1rem;
        font-weight: 600;
        line-height: 1.5rem;
    }

    .message1 {
        margin-top: 0.5rem;
        color: #6B7280;
        font-size: 0.875rem;
        line-height: 1.25rem;
    }

    .actions1 {
        margin: 0.75rem 1rem;
        background-color: #F9FAFB;
    }

    .desactivate1 {
        display: inline-flex;
        padding: 0.5rem 1rem;
        background-color: #DC2626;
        color: #ffffff;
        font-size: 1rem;
        line-height: 1.5rem;
        font-weight: 500;
        justify-content: center;
        width: 100%;
        border-radius: 0.375rem;
        border-width: 1px;
        border-color: transparent;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    }

    .cancel1 {
        display: inline-flex;
        margin-top: 0.75rem;
        padding: 0.5rem 1rem;
        background-color: #ffffff;
        color: #374151;
        font-size: 1rem;
        line-height: 1.5rem;
        font-weight: 500;
        justify-content: center;
        width: 100%;
        border-radius: 0.375rem;
        border: 1px solid #D1D5DB;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    }




    .dismiss {
        position: absolute;
        right: 10px;
        top: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0.5rem 1rem;
        background-color: #fff;
        color: black;
        border: 2px solid #D1D5DB;
        font-size: 1rem;
        font-weight: 300;
        width: 30px;
        height: 30px;
        border-radius: 7px;
        transition: .3s ease;
        cursor: pointer;
    }

    .dismiss:hover {
        background-color: #ee0d0d;
        color: #fff;
    }

    a {
        text-decoration: none;
    }

    .nandan {
        margin: 0%, 0%, 0%, 0%;
    }
</style>

<body>
    <div>
        <div>


            <div id="head_box">

                <a href="blog.php">
                    <img src="fold/logo.png" alt="" height="40px" id="blog_logo" style="display: block;">
                </a>
                <br>

                <a href="index.php" style="margin-left: 5%;margin-right: 5%;">
                    <p id="welcome_user" style="color:black;font-weight:bold;">Welcome
                        <?php
                        echo $_SESSION['emailadd'];
                        ?>

                    </p>
                </a>


                <div style="display: flex;">
                    <span onclick="blog_form_show();" style=" color:black;display: flexbox;width:131px;margin-right:6px;margin-left:10%;cursor:pointer;" class="nandan">Create Blog</span>
                    |
                    <a href="blog.php" class="mfg" style="color: black;margin-right:-16px; margin-left:6px;display: flexbox; width:75px;justify-content:baseline;" class="nandan">Home</a>
                    |
                    <a href="my_blog.php" class="mfg" style="color: black;margin-right:-16px; margin-left:6px;display: flexbox; width:131px;justify-content:baseline;" class="nandan">My Blogs</a>
                    |
                    <form action="blog_search.php" style="display: flex" method="post">
                        <input type="text" name="search" id="search_bar" style="padding-left:4px;display:flexbox;margin-left:6px;" class="nandan">
                        <img src="fold/search.svg" alt="" id="musk" onclick="brown();" style="margin-left:6px;cursor:pointer;">
                        <button type="submit" style="display: none;margin-left:-18px;z-index:-1;" id="false_fish">
                        </button>
                    </form>

                </div>

                <h4 id="blog_tail">
                    <a href="out.php">
                        <img src="fold/box-arrow-right.svg" alt="">
                    </a>
                </h4>

            </div>
            <div class="card1">
                <div class="header1">
                    <div class="image1"><svg aria-hidden="true" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" fill="none">
                            <path d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" stroke-linejoin="round" stroke-linecap="round"></path>
                        </svg></div>
                    <div class="content1">
                        <span class="title1">Desactivate account</span>
                        <p class="message1">Are you sure you want to deactivate your account? All of your data will be permanently removed. This action cannot be undone.</p>
                    </div>
                    <div class="actions1">
                        <button class="desactivate1" type="button">Desactivate</button>
                        <button class="cancel1" type="button">Cancel</button>
                    </div>
                </div>
            </div>
            <div class="form-box" id="blog_form" style="display: none;">
                <form class="form" action="blog_load.php" method="POST">
                    <buttom class="dismiss" onclick="blog_form_hide();">×</buttom>
                    <span class="title2">Write a Blog</span>
                    <br>
                    <span class="subtitle">Free to express your words</span>
                    <div class="form-container">
                        <input type="text" class="input" name="title" placeholder="Title of the blog">
                        <textarea name="blog" id="" class="input" style="height: 150px;" rows="8" placeholder="Write your blog here ..."></textarea>
                        <div style="display: none;">

                            <?php
                            if (mysqli_num_rows($last_query_x) > 0) {
                                $r = 0;
                                while ($look = mysqli_fetch_array($last_query_x)) {
                            ?>

                                    <input type="text" name="writer" id="" required="required" class="mrx" value="<?php echo $look["userid"]; ?> "><br><br>

                            <?php
                                    $r++;
                                }
                            } else {
                                echo "No result found";
                            }
                            ?>
                        </div>
                    </div>
                    <button type="submit" id="blog_form_button">Create</button>
                </form>

            </div>



            <div style="height: 160px;"> </div>

            <div class="card">

                <?php
                if (mysqli_num_rows($last_query) > 0) {
                    $s = 0;
                    while ($loop = mysqli_fetch_array($last_query)) {
                ?>

                        <span class="title">Blog No. <?php echo $loop["id"]; ?></span>
                        <div class="comments">
                            <div class="comment-react">
                                <hr>
                                <span><?php echo $loop["id"]; ?> </span>
                            </div>
                            <div class="comment-container">
                                <div class="user">
                                    <div class="user-pic">
                                        <svg fill="none" viewBox="0 0 24 24" height="20" width="20" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linejoin="round" fill="#707277" stroke-linecap="round" stroke-width="2" stroke="#707277" d="M6.57757 15.4816C5.1628 16.324 1.45336 18.0441 3.71266 20.1966C4.81631 21.248 6.04549 22 7.59087 22H16.4091C17.9545 22 19.1837 21.248 20.2873 20.1966C22.5466 18.0441 18.8372 16.324 17.4224 15.4816C14.1048 13.5061 9.89519 13.5061 6.57757 15.4816Z"></path>
                                            <path stroke-width="2" fill="#707277" stroke="#707277" d="M16.5 6.5C16.5 8.98528 14.4853 11 12 11C9.51472 11 7.5 8.98528 7.5 6.5C7.5 4.01472 9.51472 2 12 2C14.4853 2 16.5 4.01472 16.5 6.5Z"></path>
                                        </svg>
                                    </div>
                                    <div class="user-info">
                                        <span> <?php echo $loop["name"]; ?></span>
                                        <p><?php echo $loop["dt"]; ?></p>
                                    </div>
                                </div>
                                <h4 style="text-align: left;"><?php echo $loop["type"]; ?></h4>
                                <p class="comment-content" style="text-align: left;margin-top: -20px;">
                                    <?php echo $loop["blog"]; ?>
                                </p>
                            </div>
                        </div>


                        <style>
                            #king {
                                text-align: left;
                                margin-left: 5%;
                                margin-right: 5%;
                                background-color: #e0ebeb;
                                padding: 2%;
                                border-radius: 7px;
                                box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
                                cursor: pointer;


                            }

                            #s_bold {
                                font-size: 11px;
                                font-weight: 300;
                            }
                        </style>
                        <details id="king">
                            <summary>Comments :</summary>
                            <?php
                            if (isset($_SERVER['REQUEST_METHOD'])) {
                                require "connector.php";

                                $cfs3 = $loop['id'];

                                $sql_query_2_search3 = "SELECT * FROM comment  LEFT JOIN users ON comment.writer=users.email WHERE blogid='$cfs3' ORDER BY id DESC LIMIT 10";

                                $last_query_2_search3 = mysqli_query($connection, $sql_query_2_search3);

                                $connection->close();
                            }
                            if (mysqli_num_rows($last_query_2_search3) > 0) {
                                $ts3 = 0;
                                while ($pool_search3 = mysqli_fetch_array($last_query_2_search3)) {
                            ?>
                                    <p class="dom_x"><?php echo $pool_search3["comment"]; ?></p>
                                    <p class="dom_x" id="s_bold">Comment By <?php echo $pool_search3["name"]; ?></p>
                                    <hr style="color: navy;">
                            <?php
                                    $ts3++;
                                }
                            } else {
                                echo "No Comments found";
                            }
                            ?>
                        </details>
                        <br>


                        <div class="text-box">
                            <div class="box-container">
                                <form action="comment_load.php" method="POST">
                                    <div style="display: none;">
                                        <input type="text" name="blogid" id="" value="<?php echo $loop["id"]; ?>">
                                        <input type="text" name="writer" id="" value="<?php echo $_SESSION['emailadd']; ?>">
                                    </div>
                                    <textarea placeholder="Reply" name="comment"></textarea>
                                    <div>
                                        <div class="formatting">
                                            <button type="button">
                                                <svg fill="none" viewBox="0 0 24 24" height="16" width="16" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" stroke="#707277" d="M5 6C5 4.58579 5 3.87868 5.43934 3.43934C5.87868 3 6.58579 3 8 3H12.5789C15.0206 3 17 5.01472 17 7.5C17 9.98528 15.0206 12 12.5789 12H5V6Z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                                    <path stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" stroke="#707277" d="M12.4286 12H13.6667C16.0599 12 18 14.0147 18 16.5C18 18.9853 16.0599 21 13.6667 21H8C6.58579 21 5.87868 21 5.43934 20.5607C5 20.1213 5 19.4142 5 18V12"></path>
                                                </svg>
                                            </button>
                                            <button type="button">
                                                <svg fill="none" viewBox="0 0 24 24" height="16" width="16" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-width="2.5" stroke="#707277" d="M12 4H19"></path>
                                                    <path stroke-linecap="round" stroke-width="2.5" stroke="#707277" d="M8 20L16 4"></path>
                                                    <path stroke-linecap="round" stroke-width="2.5" stroke="#707277" d="M5 20H12"></path>
                                                </svg>
                                            </button>
                                            <button type="button">
                                                <svg fill="none" viewBox="0 0 24 24" height="16" width="16" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" stroke="#707277" d="M5.5 3V11.5C5.5 15.0899 8.41015 18 12 18C15.5899 18 18.5 15.0899 18.5 11.5V3"></path>
                                                    <path stroke-linecap="round" stroke-width="2.5" stroke="#707277" d="M3 21H21"></path>
                                                </svg>
                                            </button>
                                            <button type="button">
                                                <svg fill="none" viewBox="0 0 24 24" height="16" width="16" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" stroke="#707277" d="M4 12H20"></path>
                                                    <path stroke-linecap="round" stroke-width="2.5" stroke="#707277" d="M17.5 7.66667C17.5 5.08934 15.0376 3 12 3C8.96243 3 6.5 5.08934 6.5 7.66667C6.5 8.15279 6.55336 8.59783 6.6668 9M6 16.3333C6 18.9107 8.68629 21 12 21C15.3137 21 18 19.6667 18 16.3333C18 13.9404 16.9693 12.5782 14.9079 12"></path>
                                                </svg>
                                            </button>
                                            <button type="button">
                                                <svg fill="none" viewBox="0 0 24 24" height="16" width="16" xmlns="http://www.w3.org/2000/svg">
                                                    <circle stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" stroke="#707277" r="10" cy="12" cx="12"></circle>
                                                    <path stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" stroke="#707277" d="M8 15C8.91212 16.2144 10.3643 17 12 17C13.6357 17 15.0879 16.2144 16 15"></path>
                                                    <path stroke-linejoin="round" stroke-linecap="round" stroke-width="3" stroke="#707277" d="M8.00897 9L8 9M16 9L15.991 9"></path>
                                                </svg>
                                            </button>
                                            <button type="submit" class="send" title="Send">
                                                <svg fill="none" viewBox="0 0 24 24" height="18" width="18" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" stroke="#ffffff" d="M12 5L12 20"></path>
                                                    <path stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" stroke="#ffffff" d="M7 9L11.2929 4.70711C11.6262 4.37377 11.7929 4.20711 12 4.20711C12.2071 4.20711 12.3738 4.37377 12.7071 4.70711L17 9"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </form>

                            </div>


                        </div>



                <?php
                        $s++;
                    }
                } else {
                    echo "No Blogs found";
                }
                ?>


            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>