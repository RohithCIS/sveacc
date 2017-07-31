<?php

    include realpath($_SERVER["DOCUMENT_ROOT"]).'/functions/config.php';
    include $root.'/functions/db.php';

?>
<html>
<head>
	<title>Sri Vijaya Electronics : Print Bill</title>
	<?php include $root.'/partials/head.php'; ?>
</head>
<body>
    
    <div class="headbar col-md-12 col-sm-12 col-xs-12">
        <img class="himg" src="/assets/svelogo.png"><br>
        <p>TIN:33136440982<br>20/147, Gandhi Road, Opposite GH, Arakkonam<br>Phone: +919444838630 Web: srivijayaelectronics.webs.com</p>
    </div>
    <?php

        $sql = "SELECT * FROM bill".$_POST['tabname'].";";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $ID=$row["ID"];
                    $NAME=$row["NAME"];
                    $PRICE=$row["PRICE"];
                    $QTY=$row["QTY"];
                    $DISC=$row["DISC"];
                    $stk = "INSERT INTO dt".date(dmY)." (ID,NAME,PRICE,QTY,DISC,NET_VALUE,CORD) VALUES (".$ID.",'".$NAME."',".$PRICE.",".$QTY.",".$DISC.",PRICE*QTY-DISC,'CREDIT');";
                        if ($conn->query($stk)===TRUE){
                            echo "";
                        }
                        else{
                            $stk = "UPDATE dt".date(dmY)." SET NAME='".$NAME."',PRICE=".$PRICE.",QTY=QTY+".$QTY.",DISC=DISC+".$DISC.",NET_VALUE=PRICE*QTY-DISC WHERE ID=".$ID.";";
                            if ($conn->query($stk)===TRUE){
                                echo "";
                            }
                            else{
                                echo "";
                            }
                        }

                    $stk = "INSERT INTO mon".date(mY)." (ID,NAME,PRICE,QTY,DISC,NET_VALUE,CORD) VALUES (".$ID.",'".$NAME."',".$PRICE.",".$QTY.",".$DISC.",PRICE*QTY-DISC,'CREDIT');";
                        if ($conn->query($stk)===TRUE){
                            echo "";
                        }
                        else{
                            $stk = "UPDATE mon".date(mY)." SET NAME='".$NAME."',PRICE=".$PRICE.",QTY=QTY+".$QTY.",DISC=DISC+".$DISC.",NET_VALUE=PRICE*QTY-DISC WHERE ID=".$ID.";";
                            if ($conn->query($stk)===TRUE){
                                echo "";
                            }
                            else{
                                echo "";
                            }
                        }

                    $stk = "UPDATE STOCK SET QTY=QTY-".$QTY.",NET_VALUE=PRICE*QTY WHERE ID=".$ID.";";
                        if ($conn->query($stk)===TRUE){
                            echo "";
                        }
                        else{
                            echo "";
                        }
                }
        } else {
            echo "No such Item";
        }

    ?>

    <div class="loltabdisp">
    <h3>Invoice #<?php echo $_POST['tabname']; ?> </h3>
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
        ?>
        
        </table>
        <h1>Total : Rs 
        <?php
            
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
        <button onclick="printFunc()" class="print">Print Bill</button>
        <form method="POST" action="/pages/connect.php">
            <button type="submit" class="sub">Main Menu</button>
        </form>
    </div>

    <script>
    function printFunc() {
        window.print();
    }
    </script>
</body>
</html>