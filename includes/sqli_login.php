<?php
    /// ===== With real_escape_string ===== ///

    //// SQLi Testing /////
    $username = $_POST['username'];
    $password = $_POST['password'];

    //$username=mysqli_real_escape_string($_POST['username']);
    //$password=mysqli_real_escape_string($_POST['password']);

    //$username = playSafe($db,$_POST['username']);
    //$password = playSafe($db,$_POST['password']); 

    $sql = "SELECT * from users WHERE username = '$username' AND password = '$password'";
    ///////////////////////

    $result = mysqli_query($db,$sql);
    $row =  mysqli_fetch_array($result,MYSQLI_ASSOC);

    //$active = $row['active'];		

    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row
    if($count === 1) {		
        //session_register("username"); //Depreciated 
        $_SESSION['login_user'] = $username;
            
        header("location: home.php");
    }else {
        $error = "Your Login Name or Password is invalid";
        //echo $error;//Close to become Blind SQLi
    }

?>