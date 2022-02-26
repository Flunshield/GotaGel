<?php
	$username = $_POST["username"];
    $password = $_POST["password"];
	$link = mysqli_connect("mysql-julien84350.alwaysdata.net", "$username", "$password", "julien84350_data");
	$response = array();
	if(!$link)
		{
	   	$code = "false";
		$response["success"] = 0;
		array_push($response, array("code"=>$code));
		echo json_encode($response);
		exit;
		}
    else 
		{
			$code = "login_success";
			$response["success"] = 1;
			array_push($response, array("code"=>$code));
			echo json_encode($response);
	
		}  
?>


