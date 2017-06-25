
<html>
<head>
	<title>Sri Vijaya Electronics : Menu</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="icon" href="svelogo.png" type="image/png" sizes="16x16 32x32"> 
	<link rel="stylesheet" type="text/css" media="(min-width: 720px)" href="styles.css">
	<link rel="stylesheet" type="text/css" media="(max-width: 720px)" href="mobilestyles.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

    <div class="headbar col-md-12 col-sm-12 col-xs-12">
        <img class="himg" src="svelogo.png">
        <h1 class="htitle">Menu</h1>
    </div>
    <br>
    <h2>
        <?php

        $servername = "localhost";
        $username = $_POST["name"];
        $password = $_POST["pwd"];

        $conn = new mysqli($servername, $username, $password);

        $create="CREATE DATABASE IF NOT EXISTS SVE;";
        if ($conn->query($create) === TRUE) {
            echo "";
        } 
        $conn->close();


        $conn = new mysqli($servername, $username, $password, "SVE");

        // Check connection
        // if ($conn->connect_error) {
        //     die("Connection failed: " . $conn->connect_error) . "<br>";
        // }
        // echo "Connected successfully <br>";

        $stk = "CREATE TABLE IF NOT EXISTS STOCK (ID INT(6) UNSIGNED PRIMARY KEY, NAME VARCHAR(30) NOT NULL, PRICE FLOAT(15) NOT NULL, QTY INT(6), NET_VALUE FLOAT(10), LUPDAT TIMESTAMP);";
        $conn->query($stk);

        //DATABASE
        $tdy = "CREATE TABLE IF NOT EXISTS dt".date("dmY")." (ID INT(6) UNSIGNED PRIMARY KEY, NAME VARCHAR(30) NOT NULL, PRICE FLOAT(15) NOT NULL, QTY INT(6), DISC INT(10), NET_VALUE FLOAT(10), CORD VARCHAR(10));";

        $mon = "CREATE TABLE IF NOT EXISTS mon".date("mY")." (ID INT(6) UNSIGNED PRIMARY KEY, NAME VARCHAR(30) NOT NULL, PRICE FLOAT(15) NOT NULL, QTY INT(6), DISC INT(10), NET_VALUE FLOAT(10), CORD VARCHAR(10));";
        
        if ($conn->query($tdy) && $conn->query($mon) === TRUE) {
            echo "";
        } else {
            echo "Error opening Account: " . $conn->error . "<br>";
        }

        $conn->close();

        ?>
        	</h6>
    
    <div class="mitem col-md-6 col-sm-12 col-xs-12">
        <form method="POST" action="today.php">
            <label>Records</label><br>
            <input type="hidden" name="tabname" value="<?php echo 'dt'.date('dmY'); ?>">
            <input type="hidden" name="name" value="<?php echo $_POST['name']; ?>">
            <input type="hidden" name="pwd" value="<?php echo $_POST['pwd']; ?>">
            <button type="submit">View Today's Accounts</button>
        </form>
        <form method="POST" action="month.php">
            <input type="hidden" name="tabname" value="<?php echo 'mon'.date('mY'); ?>">
            <input type="hidden" name="name" value="<?php echo $_POST['name']; ?>">
            <input type="hidden" name="pwd" value="<?php echo $_POST['pwd']; ?>">
            <button type="submit">View this Month's Accounts</button>
        </form>
        <form method="POST" action="sdate.php">
            <input type="hidden" name="tabname" value="<?php echo 'dt'; ?>">
            <input type="hidden" name="name" value="<?php echo $_POST['name']; ?>">
            <input type="hidden" name="pwd" value="<?php echo $_POST['pwd']; ?>">
            <input type="text" name="tabext" placeholder="Enter Date like ddmmyyyy" required>
            <button type="submit">View Accounts of given Day</button>
        </form>
        <form method="POST" action="smonth.php">
            <input type="hidden" name="tabname" value="<?php echo 'mon'; ?>">
            <input type="hidden" name="name" value="<?php echo $_POST['name']; ?>">
            <input type="hidden" name="pwd" value="<?php echo $_POST['pwd']; ?>">
            <input type="text" name="tabext" placeholder="Enter Month like mmyyyy" required>
            <button type="submit">View Accounts of given Month</button>
        </form>
    </div>
    <div class="mitem col-md-6 col-sm-12 col-xs-12">
        <form method="POST" action="bill.php">
            <label>Billing</label><br>
            <input type="hidden" name="name" value="<?php echo $_POST['name']; ?>">
            <input type="hidden" name="pwd" value="<?php echo $_POST['pwd']; ?>">
            <input type="hidden" name="tabname" value="<?php echo date(dmyhi); ?>">
            <input type="hidden" name="id" value="">
            <input type="hidden" name="price" value="">
            <input type="hidden" name="qty" value="">
            <input type="hidden" name="stk" value="">
            <button type="submit">New Bill</button>
        </form>
        <form method="POST" action="billview.php">
            <input type="hidden" name="tabname" value="<?php echo 'bill'; ?>">
            <input type="hidden" name="name" value="<?php echo $_POST['name']; ?>">
            <input type="hidden" name="pwd" value="<?php echo $_POST['pwd']; ?>">
            <input type="text" name="tabext" placeholder="Enter Invoice Number" required>
            <button type="submit">View Bill</button>
        </form>
    </div>
    <div class="mitem col-md-6 col-sm-12 col-xs-12">
        <form method="POST" action="stockup.php">
            <label>Stock</label><br>
            <input type="hidden" name="name" value="<?php echo $_POST['name']; ?>">
            <input type="hidden" name="pwd" value="<?php echo $_POST['pwd']; ?>">
            <input type="hidden" name="id" value="">
            <input type="hidden" name="pname" value="">
            <input type="hidden" name="price" value="">
            <input type="hidden" name="qty" value="">
            <input type="hidden" name="stk" value="">
            <button type="submit">Update Stock</button>
        </form>
        <form method="POST" action="stockview.php">
            <input type="hidden" name="tabname" value="STOCK">
            <input type="hidden" name="name" value="<?php echo $_POST['name']; ?>">
            <input type="hidden" name="pwd" value="<?php echo $_POST['pwd']; ?>">
            <button type="submit">View Stock</button>
        </form>
    </div>

</body>
</html>
