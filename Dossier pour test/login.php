<?php
    $con = mysqli_connect("mysql-julien84350.alwaysdata.net", "135290_login", "juliendu84350", "julien84350_data");
    
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $statement = mysqli_prepare($con, "SELECT * FROM user WHERE pseudo = ? AND mdp = ?");
    mysqli_stmt_bind_param($statement, "ss", $username, $password);
    mysqli_stmt_execute($statement);
    
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $id, $username, $password);
    
    $response = array();
    $response["success"] = 0;  
    
    while(mysqli_stmt_fetch($statement)){
        $response["success"] = 1;  
        $response["username"] = $username;
        $response["password"] = $password;
    }
    
    echo json_encode($response);
?>