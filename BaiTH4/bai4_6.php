<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta charset="utf-8" />

	<title>Đăng nhập</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/custom.css" />
</head>

<body>
    <div class="container login-section" >
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <?php 
                if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
                    $user_name = (isset( $_POST['username'] ) ) ? strip_tags( trim( $_POST['username'] ) ) : '';
                    $password  = (isset( $_POST['password'] ) ) ? strip_tags( trim( $_POST['password'] ) ) : '';
                    $remember_me = (isset( $_POST['remember'] ) ) ? strip_tags( trim( $_POST['remember'] ) ) : '';
                    
                    
                    $errors = array();
                    if( $user_name != '' && $password != '' ){
                        if( $user_name == 'admin' && $password == 12345 ){
                            if( $remember_me != '' && $remember_me == true ){
                                $_SESSION['admin_logged_in']  == true;
                                header('location: bai4_6_admin.php');
                            }else{
                                setcookie('admin_logged_in', true, time() + 60*60*24*30*3 );//luu login trong vong 3 thang
                                header('location: bai4_6_admin.php');
                            }
                        }else{
                            $errors['wrong_info'] = '<p>Wrong username or password</p>';
                        }
                    }else{
                        $errors['empty_user_or_pass'] = '<p>Vui lòng nhập đủ thông tin</p>';
                    }
                    
                }
                
                ?>
                <?php if( !empty( $errors ) ) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php
                            echo implode( '', $errors );
                        ?>
                    </div>
                <?php endif; ?>
            
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Đăng nhập</h3>
                    </div>
                    <div class="panel-body">
                        <form action="" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Tên đăng nhập" name="username" type="text" />
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Mật khẩu" name="password" type="password" />
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="true" />Remember Me
                                    </label>
                                </div>
                                <input type="submit" name="submit" value="Đăng nhập" class="btn btn-lg btn-success btn-block" />
                                
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>