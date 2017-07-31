<?php

    include realpath($_SERVER["DOCUMENT_ROOT"]).'/functions/config.php';
    include $root.'/functions/db.php';

?>
<html>
<head>
	<title>Sri Vijaya Electronics : Stock Update</title>
	<?php include $root.'/partials/head.php'; ?>
</head>
<body>

    <div class="headbar col-md-12 col-sm-12 col-xs-12">
        <img class="himg" src="/assets/svelogo.png">
        <h1 class="htitle">Update Stock</h1>
    </div>
    <h2>
        <?php

        
        $ID=$_POST["id"];
        $NAME=$_POST["pname"];
        $PRICE=$_POST["price"];
        $QTY=$_POST["qty"];
        $stk =$_POST["stk"];


        if ($stk != "") {

        $stk = "INSERT INTO STOCK (ID,NAME,PRICE,QTY,NET_VALUE,LUPDAT) VALUES (".$ID.",'".$NAME."',".$PRICE.",".$QTY.",PRICE*QTY,CURRENT_TIME);";
            if ($conn->query($stk)===TRUE){
                echo "Entry Added <br>";
            }
            else{
                $stk = "UPDATE STOCK SET NAME='".$NAME."',PRICE=".$PRICE.",QTY=QTY+".$QTY.",NET_VALUE=PRICE*QTY WHERE ID=".$ID.";";
                if ($conn->query($stk)===TRUE){
                    echo "Updated <br>";
                }
                else{
                    echo "Error<br>";
                }
            }
        }
        else{
            echo "Initialised";
        }


        $conn->close();

        ?>
	</h2>

    <div class="cen">
        <form method="POST" action="/pages/connect.php">
            <button class="sub" type="submit">Main Menu</button>
        </form>
    </div>
    
    <div class="upitem col-md-12 col-sm-12 col-xs-12">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label>Add or Update Item</label><br>
            <input type="hidden" name="stk" value="1">        
            <input type="number" name="id" placeholder="ID" required autofocus><br>        
            <input type="text" name="pname" placeholder="Name" required ><br>
            <input type="number" name="price" placeholder="Price" required ><br>        
            <input type="number" name="qty" placeholder="Quantity" required ><br>
            <button type="submit">Add or Update</button>
        </form>
    </div>

</body>
</html>
