<?php
if( isset( $_SESSION['admin_logged_in'] ) ){
    unset( $_SESSION["admin_logged_in"] );
}

if( isset( $_COOKIE['admin_logged_in'] ) ){
    setcookie( 'admin_logged_in', false, time() - 60*60*24*7 );
}

?>
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
                <div class="alert alert-info" role="alert">
                    <p>Have a nice day!!!</p>
                    <a href="bai4_6.php" class="btn btn-success">Login now</a>
                </div>
                
            </div>
        </div>
    </div>
</body>
</html>