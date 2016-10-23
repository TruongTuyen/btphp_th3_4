<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta charset="utf-8" />

	<title>Tính tiền</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/custom.css" />
</head>

<body>
    <div class="container login-section" >
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <?php 
                    function tong( $a, $b ){
                        return $a+$b;
                    }
                    function hieu( $a, $b ){
                        return $a-$b;
                    }
                    function tich( $a, $b ){
                        return $a*$b;
                    }
                    function thuong( $a, $b ){
                        return $a / $b;
                    }
                    function trung_binh( $args ){
                        $dem = 0;
                        $tong = 0;
                        foreach( $args as $val ){
                            if( is_numeric( $val ) ){
                                $tong = $tong + $val; 
                                $dem++; 
                            }
                        }
                        if( $dem > 0 ){
                            return $tong / $dem;
                        }else{
                            return 0;
                        }
                        
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
                        $so_a  = ( is_numeric( $_POST['so_a'] ) ) ? $_POST['so_a'] : 1;
                        $so_b  = ( is_numeric( $_POST['so_b'] ) ) ? $_POST['so_b'] : 1;
                        
                        $tong = tong( $so_a, $so_b );
                        $hieu = hieu( $so_a, $so_b );
                        $tich = tich( $so_a, $so_b );
                        $thuong = thuong( $so_a, $so_b );
                        
                        $args = array( $tong, $hieu, $tich, $thuong);
                        ?>
                        <div class="alert alert-danger" role="alert">
                            <p>Tổng <?php echo $so_a . " + " . $so_b ." = " . $tong; ?></p>
                            <p>Hiệu <?php echo $so_a . " - " . $so_b ." = " . $hieu; ?></p>
                            <p>Tích <?php echo $so_a . " * " . $so_b ." = " . $tich; ?></p>
                            <p>Thương <?php echo $so_a . " / " . $so_b ." = " . $thuong; ?></p>
                            <p>Trung bình 4 phép toán <?php echo trung_binh( $args ); ?> </p>
                            
                            <?php
                                if( kt_so_nguyen_to( $so_a ) ){
                                    echo '<p>Số: '. $so_a .' là số nguyên tố</p>';
                                }else{
                                    echo '<p>Số: '. $so_a .' không phải là số nguyên tố</p>';
                                }
                                
                            ?>
                            
                            <?php
                                
                                echo '<p>Giai thừa: '. $so_b .'! = '. tinh_giai_thua( $so_b ) .'</p>';
                                
                            ?>
                            
                        </div>
                        <?php
                        
                    }
                ?>
            
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Tính toán</h3>
                    </div>
                    <div class="panel-body">
                        <form action="" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <label for="so_a">Nhập vào số a</label>
                                    <input class="form-control"  name="so_a" type="text" value="<?php if( isset( $so_a ) ){ echo $so_a; } ?>" />
                                </div>
                                <div class="form-group">
                                    <label for="so_b">Nhập vào số b</label>
                                    <input class="form-control"  name="so_b" type="text" placeholder="" value="<?php if( isset( $so_b ) ){ echo $so_b; } ?>" />
                                </div>
                                
                                <input type="submit" name="submit" value="Tính toán" class="btn btn-success" />
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>