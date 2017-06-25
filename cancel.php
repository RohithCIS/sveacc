
<html>
<head>
	<title>Sri Vijaya Electronics : Cancel</title>
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
        <h1 class="htitle">
            Bill Cancelled
        </h1>
    </div>
    <?php
        $servername = "localhost";
        $username = $_POST["name"];
        $password = $_POST["pwd"];
        $conn = new mysqli($servername, $username, $password, "SVE");
        $sql = "DROP TABLE bill".$_POST['tabname'].";";
        $conn->query($sql);
        $conn->close();
    ?>
    <div class="cen">
        <form method="POST" action="connect.php">
            <input type="hidden" name="name" value="<?php echo $_POST['name']; ?>">
            <input type="hidden" name="pwd" value="<?php echo $_POST['pwd']; ?>">
            <button class="sub" type="submit">Main Menu</button>
        </form>
    </div>

</body>
</html>