<?php

?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta charset="utf-8" />

	<title>Đếm lượt truy cập</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/custom.css" />
</head>

<body>
    <div class="container login-section" >
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
               <?php 
               $file_name = 'luot_truy_cap.txt';
               $so_luot = 0;
               if( file_exists( $file_name ) ){
                  $file_content = file_get_contents( $file_name );
                  if( $file_content != '' ){
                     $so_luot = intval( $file_content );
                     if( file_put_contents( $file_name, $so_luot+1 ) ){
                        $so_luot = $so_luot +1;
                     }
                     
                  }
               }
               echo "Số lượt truy cập: " . $so_luot; 
               
               ?>
            </div>
        </div>
    </div>
</body>
</html>