<?php

    include realpath($_SERVER["DOCUMENT_ROOT"]).'/functions/config.php';
    include $root.'/functions/db.php';

?>
<html>
<head>
	<title>Sri Vijaya Electronics : Cancel</title>
	<?php include $root.'/partials/head.php'; ?>
</head>
<body>
    
    <div class="headbar col-md-12 col-sm-12 col-xs-12">
        <img class="himg" src="/assets/svelogo.png">
        <h1 class="htitle">
            Bill Cancelled
        </h1>
    </div>
    <?php
    
        $sql = "DROP TABLE bill".$_POST['tabname'].";";
        $conn->query($sql);
        $conn->close();
    ?>
    <div class="cen">
        <form method="POST" action="/pages/connect.php">
            <button class="sub" type="submit">Main Menu</button>
        </form>
    </div>

</body>
</html>