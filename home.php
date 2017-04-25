<?php
   include('includes/session.php');
?>

<html>
   
    <head>
        <title>Welcome </title>
        <link rel="stylesheet" href="css/semantic.css" type="text/css" />
        <link rel="stylesheet" href="css/main.css" type="text/css" />
        <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
        <script src="js/semantic.js"></script>
        <style>

            .ui.table {
                table-layout: fixed;
            }

        </style>
    </head>
    <body>
        <!-- the sidebar -->
        <div id="sidebar" class="ui left vertical inverted labeled visible sidebar menu medium" id="sidebar">
            <a class="item" href="?page=search">
                <i class="search icon"></i>
                Student Search
            </a>
            <a class="item" href="logout.php">
                <i class="logout icon"></i>
                Logout
            </a>
            
        </div>
        <!-- END sidebar -->


        
        <!-- the content -->
        <div class="pusher" id="content" style="width: calc(100% - 260px);">  
            <!-- Will be switched here which page will ber rendered-->
            
            <!-- Search -->
            <form  id="searchbar"  method="GET">
                <div class="ui search">
                    <div class="ui icon input">
                        <input type="hidden" name="page" value="search">
                        <input name="search" class="prompt" type="text" placeholder="Keywords">
                        <i class="search icon"></i>
                    </div>
                </div>
                <div class="results"></div>
            </form>
            <!-- END Search -->

            <?php 
                if(isset($_GET["page"])){
                    switch($_GET["page"]){
                        case "student":
                            include("layouts/student.php");
                            break;
                        default:
                            include("layouts/search.php");
                    }
                }else{
                    include("layouts/search.php");
                }
            ?>
        </div>

        <!-- END content -->

    </body>
</html>