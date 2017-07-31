<?php

    include realpath($_SERVER["DOCUMENT_ROOT"]).'/functions/config.php';
    include $root.'/functions/db.php';

?>
<html>
<head>
	<title>Sri Vijaya Electronics : Records</title>
	<?php include $root.'/partials/head.php'; ?>
</head>
<body>
    
    <div class="headbar col-md-12 col-sm-12 col-xs-12">
        <img class="himg" src="/assets/svelogo.png">
        <h1 class="htitle">Sri Vijaya Electronics  
        </h1>
        <p>TIN:33136440982<br>20/147, Gandhi Road, Opposite GH, Arakkonam<br>Phone: +919444838630 Web: srivijayaelectronics.webs.com</p>
    </div>

    <div class="loltabdisp">
        <h1>Invoice # <?php echo $_POST["tabext"]; ?></h1>
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
            
            $sql = "SELECT ID,NAME,PRICE,QTY,DISC,NET_VALUE FROM ".$_POST['tabname'].$_POST['tabext'].";";
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
        
        </table><h1>Total : Rs 
        <?php
            
            $sql = "SELECT SUM(NET_VALUE) FROM bill".$_POST['tabext'].";";
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