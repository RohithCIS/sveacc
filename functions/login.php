<?php

if (($_POST["name"]=="sveacc")&&($_POST["pwd"]=="sveacc123")){
	header('Location: /pages/connect.php');
	exit();
}

header('Location: /index.php?error_code=Incorrect Username or Password');
	    	exit();

?>