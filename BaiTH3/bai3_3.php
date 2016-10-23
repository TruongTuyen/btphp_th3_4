<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta charset="utf-8" />

	<title>Kiểm tra số</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/custom.css" />
</head>

<body>
    <div class="container login-section" >
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <?php 
                    function kt_so_chan( $so ){
                        if( $so % 2 == 0 ){
                            return true;
                        }
                        return false;
                    }
                    
                    function kt_so_nguyen_to( $so ){
                        $dem = 0;
                        if( $so <= 1 ){
                            return false;
                        }else{
                            if( $so == 2 || $so == 3 ){ return true; }
                            for( $i=1; $i<= sqrt( $so ); $i++ ){
                                if( $so % $i == 0 ){
                                    $dem++;
                                }
                            }
                            if( $dem > 0 ){
                                return false;
                            }
                            
                        }
                        return true;
                        
                    }
                    
                    function tinh_giai_thua( $so ){
                        if( $so == 0 || $so == 1 ){
                            return 1;
                        }else{
                            return $so * tinh_giai_thua( $so - 1 );
                        }
                    }
                    
                ?>
                <?php
                    if( $_SERVER['REQUEST_METHOD'] == "POST" ){
                        $so = filter_var( $_POST['so'], FILTER_VALIDATE_INT, array( 'options' => array( 'min_range' => 1 ) ) );
                        if( $so ){
                            $is_so_chan = kt_so_chan( $so );
                            $is_so_ngto = kt_so_nguyen_to( $so );
                            $giai_thua  = tinh_giai_thua( $so );
                            
                            ?>
                            <div class="alert alert-info" role="alert">
                                <?php
                                    if( $is_so_chan ){
                                        echo '<p>Số '. $so .' là số chẵn</p>';
                                    }else{
                                        echo '<p>Số '. $so .' không phải là số chẵn</p>';
                                    }
                                    
                                    if( $is_so_ngto ){
                                        echo '<p>Số '. $so .' là số nguyên tố</p>';
                                    }else{
                                        echo '<p>Số '. $so .' không phải là số nguyên tố</p>';
                                    }
                                    
                                    echo '<p>Giai thừa: '. $so .'! = '.$giai_thua .'</p>';
                        
                                ?>
                            </div>
                            <?php
                        }else{
                            ?>
                            <div class="alert alert-danger" role="alert">
                                <p class="error">Vui lòng nhập vào số nguyên dương</p>
                            </div>
                            <?php
                        }
                    }
                ?>
            
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Kiểm tra số</h3>
                    </div>
                    <div class="panel-body">
                        <form action="" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <label for="so">Nhập vào số </label>
                                    <input class="form-control"  name="so" type="text" />
                                </div>
                                
                                <input type="submit" name="submit" value="Kiểm tra" class="btn btn-success" />
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>