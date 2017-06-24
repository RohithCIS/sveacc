
<html>
<head>
	<title>Sri Vijaya Electronics : Login</title>
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

    <div class="col-md-4 col-sm-1 col-xs-1">
    </div>
    <div class="col-md-4 col-sm-10 col-xs-10 contl">
        <img src="svelogo.png">
        <form class="logf" method="POST" action="connect.php">
            <input type="text" placeholder="Username" name="name" required><br>
            <input type="password" placeholder="Password" name="pwd" required><br>
            <button type="submit">Login</button>
        </form>
    </div>
    <div class="col-md-4 col-sm-1 col-xs-1">
    </div>

</body>
</html>
