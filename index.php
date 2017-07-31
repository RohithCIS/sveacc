<?php

    include realpath($_SERVER["DOCUMENT_ROOT"]).'/functions/config.php';
    if (isset($_GET['error_code'])) {
        $errorm=$_GET['error_code'];
    }
    else {
        $errorm="";
    }
?>
<html>
<head>
	<title>Sri Vijaya Electronics : Login</title>
	<?php include $root.'/partials/head.php'; ?>
</head>
<body>

    <div class="col-md-4 col-sm-1 col-xs-1">
    </div>
    <div class="col-md-4 col-sm-10 col-xs-10 contl">
        <img src="/assets/svelogo.png">
        <form class="logf" method="POST" action="/functions/login.php">
            <input type="text" placeholder="Username" name="name" required><br>
            <input type="password" placeholder="Password" name="pwd" required><br>
            <?php echo $errorm; ?><br>
            <button type="submit">Login</button>
        </form>
    </div>
    <div class="col-md-4 col-sm-1 col-xs-1">
    </div>

</body>
</html>
