
<html>
<head>
	<title>Sri Vijaya Electronics : Stock</title>
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
        <h1 class="htitle">Total Stock : Rs 
        <?php
            $servername = "localhost";
            $username = $_POST["name"];
            $password = $_POST["pwd"];
            $conn = new mysqli($servername, $username, $password, "SVE");
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
            $conn->close();
        ?>
            
        </h1>
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
            $servername = "localhost";
            $username = $_POST["name"];
            $password = $_POST["pwd"];
            $conn = new mysqli($servername, $username, $password, "SVE");
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