<?php
    $con = mysqli_connect("mysql8.000webhost.com", "a4428777_pavan", "Pavankhandelwal1987", "a4428777_Login");
    
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $statement = mysqli_prepare($con, "SELECT * FROM user WHERE username = ? AND password = ?");
    mysqli_stmt_bind_param($statement, "ss", $username, $password);
    mysqli_stmt_execute($statement);
    
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $userID, $name, $age, $username, $password);
    
    $response = array();
    $response["success"] = false;  
    
    while(mysqli_stmt_fetch($statement)){
        $response["success"] = true;  
        $response["name"] = $name;
        $response["age"] = $age;
        $response["username"] = $username;
        $response["password"] = $password;
    }
    
    echo json_encode($response);
?>
