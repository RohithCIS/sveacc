
<html>
<head>
	<title>Sri Vijaya Electronics : Billing</title>
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
        <h1 class="htitle">Sri Vijaya Electronics</h1>            
    </div>
    <h2>
        <?php

        $servername = "localhost";
        $username = $_POST["name"];
        $password = $_POST["pwd"];
        $ID=$_POST["id"];
        $QTY=$_POST["qty"];
        $DISC=$_POST["disc"];
        $stk=$_POST["stk"];
        $tabn=$_POST["tabname"];

        $conn = new mysqli($servername, $username, $password, "SVE");

        // if ($conn->connect_error) {
        //     die("Connection failed: " . $conn->connect_error) . "<br>";
        // }
        // echo "Connected successfully <br>";

        $bill = "CREATE TABLE IF NOT EXISTS bill".$tabn." (ID INT(6) UNSIGNED PRIMARY KEY, NAME VARCHAR(30) NOT NULL, PRICE FLOAT(15) NOT NULL, QTY INT(6), DISC INT(10), NET_VALUE FLOAT(10), CORD VARCHAR(10));";
        $conn->query($bill);
        $fetch = "SELECT NAME,PRICE FROM STOCK WHERE ID=".$ID.";";
        $result = $conn->query($fetch);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $NAME=$row["NAME"];
                    $PRICE=$row["PRICE"];
                }
            }

        if ($stk != "") {

        $stk = "INSERT INTO bill".$_POST["tabname"]." (ID,NAME,PRICE,QTY,DISC,NET_VALUE,CORD) VALUES (".$ID.",'".$NAME."',".$PRICE.",".$QTY.",".$DISC.",PRICE*QTY-DISC,'CREDIT');";
            if ($conn->query($stk)===TRUE){
                echo "<br>Added";
            }
            else{
                $stk = "UPDATE bill".$_POST["tabname"]." SET NAME='".$NAME."',PRICE=".$PRICE.",QTY=".$QTY.",DISC=".$DISC.",NET_VALUE=PRICE*QTY-DISC WHERE ID=".$ID.";";
                if ($conn->query($stk)===TRUE){
                    echo "<br>Updated";
                }
                else{
                    echo "Error<br>";
                }
            }
        }
        else{
            echo "<br>Initialised";
        }


        $conn->close();

        ?>
    </h2>

    <div class="additem">
        <h3>Invoice #<?php echo $_POST['tabname']; ?> </h3>
        <br>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label>Add Item</label><br>
            <input type="hidden" name="tabname" value="<?php echo $_POST['tabname']; ?>">
            <input type="hidden" name="name" value="<?php echo $_POST['name']; ?>">
            <input type="hidden" name="pwd" value="<?php echo $_POST['pwd']; ?>">
            <input type="hidden" name="stk" value="1">
            <input type="number" name="id" placeholder="ID" required>
            <input type="number" name="qty" placeholder="Quantity" required>
            <input type="number" name="disc" placeholder="Discount, 0 if none" required>
            <button class="sub" type="submit">Add</button>
        </form>
        <form method="POST" action="cancel.php">
            <input type="hidden" name="tabname" value="<?php echo $_POST['tabname']; ?>">
            <input type="hidden" name="name" value="<?php echo $_POST['name']; ?>">
            <input type="hidden" name="pwd" value="<?php echo $_POST['pwd']; ?>">
            <button class="sub" type="submit">Cancel Bill</button>
        </form>
        <form method="POST" action="submit.php">
            <input type="hidden" name="tabname" value="<?php echo $_POST['tabname']; ?>">
            <input type="hidden" name="name" value="<?php echo $_POST['name']; ?>">
            <input type="hidden" name="pwd" value="<?php echo $_POST['pwd']; ?>">
            <button class="sub" type="submit">Submit Bill</button>
        </form>
    </div>


    <div class="billdisp">
        <table class="tdytab">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Discount</th>
            <th>Total</th>
        </tr>
        <?php
            $servername = "localhost";
            $username = $_POST["name"];
            $password = $_POST["pwd"];
            $conn = new mysqli($servername, $username, $password, "SVE");
            $sql = "SELECT ID,NAME,PRICE,QTY,DISC,NET_VALUE FROM bill".$_POST['tabname'].";";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "  <tr>
                                <td>".$row["ID"]."</td>
                                <td>".$row["NAME"]."</td>
                                <td>".$row["PRICE"]."</td>
                                <td>".$row["QTY"]."</td>
                                <td>".$row["DISC"]."</td>
                                <td>".$row["NET_VALUE"]."</td>
                            </tr>";
                }
            } else {
                echo "0 results";
            }
            $conn->close();
        ?>
        
        </table>
        <h1>Total : Rs 
        <?php
            $servername = "localhost";
            $username = $_POST["name"];
            $password = $_POST["pwd"];
            $conn = new mysqli($servername, $username, $password, "SVE");
            $sql = "SELECT SUM(NET_VALUE) FROM bill".$_POST['tabname'].";";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo $row["SUM(NET_VALUE)"];
                }
            } 
            else {
                echo "0";
            }
            $conn->close();
        ?>
            
        </h1>
    </div>
</body>
</html>