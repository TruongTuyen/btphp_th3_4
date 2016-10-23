<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta charset="utf-8" />

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/custom.css" />
</head>

<body>
    <div class="container login-section" >
    <?php
        if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
            $user_name = strip_tags( trim( $_POST['username'] ) );
            $password  = strip_tags( trim( $_POST['password'] ) );
            
            $account_info = array(
                'username' => 'admin',
                'password' => 123456
            );
            
            if( $user_name != '' && $password != '' ){
                if( $user_name == $account_info['username'] && $password == $account_info['password'] ){
                    ?>
                    <div class="container">
                        <div class="alert alert-danger" role="alert">
                            <p class="wellcome">Chào mừng bạn, Admin</p>
                        </div>
                    </div>
                    <?php
                }else{
                    ?>
                    <div class="container">
                        <div class="alert alert-danger" role="alert">
                            Sai thông tin đăng nhập
                        </div>
                    </div>
                    <?php
                }
            }else{
                ?>
                <div class="container">
                    <div class="alert alert-danger" role="alert">
                        Sai thông tin đăng nhập
                    </div>
                </div>
                <?php
            }
            
        }
        ?>
    </div>
</body>
</html>

<?php
