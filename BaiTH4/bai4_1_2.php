<?php

?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta charset="utf-8" />

	<title>Người dùng</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/custom.css" />
</head>

<body>
    <div class="container login-section" >
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <?php 
                   if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
                        $user_name = strip_tags( trim( $_POST['username'] ) );
                        $errors = array();
                        $file_name = 'nguoi_dung.txt';
                        $list_user = '';
                        if( $user_name != '' ){
                            if( file_exists( $file_name ) ){
                                
                                $file_content = file_get_contents( $file_name );
                                
                                if( file_put_contents( $file_name, $file_content . $user_name ."<br/>" ) ){
                                    $list_user = file_get_contents( $file_name );
                                }else{
                                    $list_user = $file_content;
                                }
                                
                            }else{
                                echo "File not exists";
                            }
                        }else{
                            $errors[] = '<p>Vui lòng nhập thông tin</p>';
                        }
                        
                   }
                
                ?>
                <?php if( isset( $list_user ) && $list_user != '' ) {
                    ?>
                    <div class="alert alert-info" role="alert">
                        <?php echo $list_user; ?>
                    </div>
                    <?php
                } ?>
            
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Người dùng</h3>
                    </div>
                    <div class="panel-body">
                        <form action="" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Tên người dùng" name="username" type="text" />
                                </div>
                                
                                <input type="submit" name="submit" value="Nhập" class="btn btn-success" />
                                
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>