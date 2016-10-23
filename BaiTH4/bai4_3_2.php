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
                    function tinhtien( $so_luong, $don_gia ){
                        $chiet_khau = 0;
                        $sub_total = $so_luong * $don_gia;
                        $vat = 0.1;
                        if( $so_luong >= 30 ){
                            $vat = 0.08;
                        }
                        $sub_total_vat = $sub_total * $vat;
                        return $sub_total + $sub_total_vat;
                    }
                    
                ?>
                <?php
                    if( $_SERVER['REQUEST_METHOD'] == "POST" ){
                        $soluong = filter_var( $_POST['soluong'], FILTER_VALIDATE_INT, array( 'options' => array( 'min_range' => 1 ) ) );
                        $dongia  = filter_var( $_POST['dongia'], FILTER_VALIDATE_INT, array( 'options' => array( 'min_range' => 1 ) ) );
                        if( !$soluong || !$dongia ){
                            ?>
                            <div class="alert alert-danger" role="alert">
                                <p class="error">Vui lòng nhập vào số nguyên dương</p>
                            </div>
                            <?php
                        }else{
                            $tong_tien = tinhtien( $soluong, $dongia );
                            $tong_tien = number_format( $tong_tien, 0, ',', '.' );
                            ?>
                            <div class="alert alert-info" role="alert">
                                <?php
                                    echo '<p>Tổng tiền bạn phải trả: '. $tong_tien .' VNĐ (Đã bao gồm thuế VAT)</p>';
                                ?>
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
                                    <label for="soluong">Nhập vào số lượng</label>
                                    <input class="form-control"  name="soluong" type="text" value="<?php if( isset( $soluong ) ){ echo $soluong; } ?>" />
                                </div>
                                <div class="form-group">
                                    <label for="dongia">Nhập vào đơn giá</label>
                                    <input class="form-control"  name="dongia" type="text" placeholder="VNĐ" value="<?php if( isset( $dongia ) ){ echo $dongia; } ?>" />
                                </div>
                                
                                <input type="submit" name="submit" value="Tính tiền" class="btn btn-success" />
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>