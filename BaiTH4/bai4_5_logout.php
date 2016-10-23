<?php
setcookie( 'admin_logged_in', false, time() - 60*60*24*7 );
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
                    <a href="bai4_5.php" class="btn btn-success">Login now</a>
                </div>
                
            </div>
        </div>
    </div>
</body>
</html>