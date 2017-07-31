<?php

    include realpath($_SERVER["DOCUMENT_ROOT"]).'/functions/config.php';
    
?>
<html>
<head>
	<title>Sri Vijaya Electronics : Menu</title>
	<?php include $root.'/partials/head.php'; ?>
</head>
<body>

    <div class="headbar col-md-12 col-sm-12 col-xs-12">
        <img class="himg" src="/assets/svelogo.png">
        <h1 class="htitle">Menu</h1>
    </div>
    <br>
    
    <div class="mitem col-md-6 col-sm-12 col-xs-12">
        <form method="POST" action="/pages/today.php">
            <label>Records</label><br>
            <input type="hidden" name="tabname" value="<?php echo 'dt'.date('dmY'); ?>">
            <button type="submit">View Today's Accounts</button>
        </form>
        <form method="POST" action="/pages/month.php">
            <input type="hidden" name="tabname" value="<?php echo 'mon'.date('mY'); ?>">
            <button type="submit">View this Month's Accounts</button>
        </form>
        <form method="POST" action="/pages/sdate.php">
            <input type="hidden" name="tabname" value="<?php echo 'dt'; ?>">
            <input type="text" name="tabext" placeholder="Enter Date like ddmmyyyy" required>
            <button type="submit">View Accounts of given Day</button>
        </form>
        <form method="POST" action="/pages/smonth.php">
            <input type="hidden" name="tabname" value="<?php echo 'mon'; ?>">
            <input type="text" name="tabext" placeholder="Enter Month like mmyyyy" required>
            <button type="submit">View Accounts of given Month</button>
        </form>
    </div>
    <div class="mitem col-md-6 col-sm-12 col-xs-12">
        <form method="POST" action="/pages/bill.php">
            <label>Billing</label><br>
            <input type="hidden" name="tabname" value="<?php echo date('dmyhi'); ?>">
            <input type="hidden" name="id" value="">
            <input type="hidden" name="price" value="">
            <input type="hidden" name="qty" value="">
            <input type="hidden" name="stk" value="">
            <button type="submit">New Bill</button>
        </form>
        <form method="POST" action="/pages/billview.php">
            <input type="hidden" name="tabname" value="<?php echo 'bill'; ?>">
            <input type="text" name="tabext" placeholder="Enter Invoice Number" required>
            <button type="submit">View Bill</button>
        </form>
    </div>
    <div class="mitem col-md-6 col-sm-12 col-xs-12">
        <form method="POST" action="/pages/stockup.php">
            <label>Stock</label><br>
            <input type="hidden" name="id" value="">
            <input type="hidden" name="pname" value="">
            <input type="hidden" name="price" value="">
            <input type="hidden" name="qty" value="">
            <input type="hidden" name="stk" value="">
            <button type="submit">Update Stock</button>
        </form>
        <form method="POST" action="/pages/stockview.php">
            <input type="hidden" name="tabname" value="STOCK">
            <button type="submit">View Stock</button>
        </form>
    </div>

</body>
</html>
