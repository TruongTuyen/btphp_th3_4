<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta charset="utf-8" />

	<title>Admin area</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/custom.css" />
</head>

<body>
    <div class="container login-section" >
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <?php
                    if( isset( $_COOKIE['admin_logged_in'] ) && $_COOKIE['admin_logged_in'] == true ){
                ?>
                <div class="alert alert-info" role="alert">
                    <p>welcome back, admin</p>
                    <a href="bai4_5_logout.php" class="btn btn-info">Logout</a>
                </div>
                <?php }else{ ?>
                <div class="alert alert-info" role="alert">
                    <p>Please login first!!!</p>
                    <a href="bai4_5.php" class="btn btn-success">Login now</a>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
</html>