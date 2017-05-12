<?php    
    ///===== With Prepare Statement ===== ///

    // Create connection
    //$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    try{
        $DB_SERVER = DB_SERVER;
        $DB_DATABASE = DB_DATABASE;
        $pdo = new PDO("mysql:host=$DB_SERVER;dbname=$DB_DATABASE", DB_USERNAME, DB_PASSWORD);
    }catch (PDOException $e) {
        // Check connection
        die("Connection failed: " . $e->getMessage());
    }
        
    // prepare and bind
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":password", $password);

    $username = playSafe($db, $_POST['username']);
    $password = playSafe($db, $_POST['password']);

    //execute stmt (call the stored procedure if existing one)
    $stmt->execute();

    //result will be checkd here
    foreach ($stmt as $row) {
        // do something with $row
            $_SESSION['login_user'] = $username;
            header("location: home.php");
    }	

    // let PDO know it can close the conn
    $pdo = null;
    
?>