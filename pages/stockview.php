<?php

    include realpath($_SERVER["DOCUMENT_ROOT"]).'/functions/config.php';
    include $root.'/functions/db.php';

?>
<html>
<head>
	<title>Sri Vijaya Electronics : Stock</title>
	<?php include $root.'/partials/head.php'; ?>
</head>
<body>
    
    <div class="headbar col-md-12 col-sm-12 col-xs-12">
        <img class="himg" src="/assets/svelogo.png">
        <h1 class="htitle">Total Stock : Rs 
        <?php
            
            $sql = "SELECT SUM(NET_VALUE) FROM ".$_POST['tabname'].";";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo $row["SUM(NET_VALUE)"];
                }
            } else {
                echo "0";
            }
        ?>
            
        </h1>
    </div>

    <div class="cen">
        <form method="POST" action="/pages/connect.php">
            <button class="sub" type="submit">Main Menu</button>
        </form>
    </div>

    <div class="tdytabdisp">
        <table class="tdytab">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Last Updated</th>
        </tr>
        <?php
            
            $sql = "SELECT ID,NAME,PRICE,QTY,NET_VALUE,LUPDAT FROM ".$_POST['tabname'].";";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "  <tr>
                                <td>".$row["ID"]."</td>
                                <td>".$row["NAME"]."</td>
                                <td>".$row["PRICE"]."</td>
                                <td>".$row["QTY"]."</td>
                                <td>".$row["NET_VALUE"]."</td>
                                <td>".$row["LUPDAT"]."</td>
                            </tr>";
                }
            } else {
                echo "0 results";
            }
            $conn->close();
        ?>
        
        </table>
    </div>
</body>
</html>