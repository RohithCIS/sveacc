
<html>
<head>
	<title>Sri Vijaya Electronics : Stock Update</title>
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
        <h1 class="htitle">Update Stock</h1>
    </div>
    <br>
    <br>
    <h2>
<?php

$servername = "localhost";
$username = $_POST["name"];
$password = $_POST["pwd"];
echo "LOL";
    $ID=$_POST["id"];
    $NAME=$_POST["pname"];
    $PRICE=$_POST["price"];
    $QTY=$_POST["qty"];
    $stk = "INSERT INTO STOCK (ID,NAME,PRICE,QTY,NET_VALUE,LUPDAT) VALUES (".$ID.",".$NAME.",".$PRICE.",".$QTY.",PRICE*QTY,CURRENT_TIME);";

$conn = new mysqli($servername, $username, $password, "SVE");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error) . "<br>";
}
echo "Connected successfully <br>";

if ($stk != "") {

$stk = "INSERT INTO STOCK (ID,NAME,PRICE,QTY,NET_VALUE,LUPDAT) VALUES (".$ID.",'".$NAME."',".$PRICE.",".$QTY.",PRICE*QTY,CURRENT_TIME);";
    if ($conn->query($stk)===TRUE){
        echo "Entry Added <br>";
    }
    else{
        $stk = "UPDATE STOCK SET NAME='".$NAME."',PRICE=".$PRICE.",QTY=".$QTY." WHERE ID=".$ID.";";
        $conn->query($stk);
        echo "Updated or Error<br>";
    }
}


$conn->close();

?>
	</h2>
    <div class="mitem col-md-6 col-sm-12 col-xs-12">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label>Today</label><br>
            <input type="hidden" name="name" value="<?php echo $_POST['name']; ?>">
            <input type="hidden" name="pwd" value="<?php echo $_POST['pwd']; ?>">         
            <input type="number" name="id" placeholder="ID" required autofocus>         
            <input type="text" name="pname" placeholder="Name" required >         
            <input type="number" name="price" placeholder="Price" required >         
            <input type="number" name="qty" placeholder="Quantity" required >
            <button type="submit">Add/Update</button>
        </form>
    </div>

</body>
</html>
