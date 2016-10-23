<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta charset="utf-8" />

	<title>Thông tin sinh viên</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/custom.css" />
</head>

<body>
    <div class="container login-section" >
        <div class="row">
            <div class="col-md-12">
                <?php
                    if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
                        $hoten      = strip_tags( trim( $_POST['hoten'] ) );
                        $dienthoai  = strip_tags( trim( $_POST['dienthoai'] ) );
                        $cmnd       = strip_tags( trim( $_POST['cmnd'] ) );
                        
                        $diachi     = strip_tags( trim( $_POST['diachi'] ) );
                        $email      = strip_tags( trim( $_POST['email'] ) );
                        $gioitinh   = strip_tags( trim( $_POST['gioitinh'] ) );
                        $ghichu     = strip_tags( trim( $_POST['ghichu'] ) );
                        
                        
                        if( $hoten != '' && $dienthoai != '' && $cmnd != '' && $diachi != '' && $email != '' && $gioitinh != '' && $ghichu != '' ){
                            if( $hoten == 'Nguyen Hoang Lam' || $cmnd == 8723451 ){
                                ?>
                                <div class="alert alert-danger" role="alert">
                                    <p class="error">Sinh viên này chưa đóng học phí cho học kỳ II</p>
                                </div>
                                <?php
                            }
                            ?>
                              <h2>Thông tin đã nhập <a href="bai3_2.php" class="btn btn-success text-right">Nhập thông tin</a></h2>
                              
                              <table class="table table-bordered">
                                  <thead>
                                      <tr>
                                         <th>Họ tên</th>
                                         <th>Điện thoại</th>
                                         <th>CMND</th>
                                         <th>Địa chỉ</th>
                                         <th>Email</th>
                                         <th>Giới tính</th>
                                         <th>Ghi chú</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                         <th><?php echo $hoten; ?></th>
                                         <th><?php echo $dienthoai; ?></th>
                                         <th><?php echo $cmnd; ?></th>
                                         <th><?php echo $diachi; ?></th>
                                         <th><?php echo $email; ?></th>
                                         <th><?php echo $gioitinh; ?></th>
                                         <th><?php echo $ghichu; ?></th>
                                      </tr>
                                  </tbody>
                              </table>
                            <?php
            
                        }else{
                            ?>
                            <div class="alert alert-danger" role="alert">
                                <p class="error">Vui lòng nhập đầy đủ thông tin <a href="bai3_2.php" class="btn btn-success text-right">Quay lại</a></p>
                            </div>
                            
                            <?php
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>