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
                        $diachi     = strip_tags( trim( $_POST['diachi'] ) );
                        $gioitinh   = strip_tags( trim( $_POST['gioitinh'] ) );
                        
                        $quequan    = strip_tags( trim( $_POST['quequan'] ) );
                        $ghichu     = strip_tags( trim( $_POST['ghichu'] ) );
                        
                        $files = $_FILES['hinhanh'];
                        
                        if( $hoten != '' &&  $diachi != '' && $quequan != '' && $gioitinh != '' && $ghichu != '' ){
                            if( !empty( $files ) ){
                                //Upload file
                                $allow_types = array(
                                    'image/jpeg',
                                    'image/jpg',
                                    'image/gif',
                                    'image/png'
                                );
                                $max_size_allow = 2024000;
                                $img_url = '';
                                $error = array();
                                if( in_array( $files['type'], $allow_types ) ){
                                    if( $files['type'] <= $max_size_allow ){
                                        $url = 'uploads/' . $files['name'];
                                        if( move_uploaded_file( $files['tmp_name'], $url ) ){
                                            $img_url = $url;
                                        }else{
                                            $img_url = '';
                                        }
                                    }else{
                                        $error['file_size'] = '<p>Ảnh vượt quá kích thước cho phép</p>';
                                    }
                                }else{
                                    $error['file_type'] = '<p>Ảnh không hợp lệ</p>';
                                }
                                
                                ?>
                                <?php 
                                    if( !empty( $error ) ){
                                        ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo implode( ' ', $error ); ?>
                                        </div>
                                        <?php
                                    }
                                
                                ?>
                                <h2>Thông tin đã nhập <a href="bai3_5.php" class="btn btn-success text-right">Nhập thông tin</a></h2>
                              
                                <table class="table table-bordered">
                                      <thead>
                                          <tr>
                                             <th>Họ tên</th>
                                             <th>Địa chỉ</th>
                                             <th>Giới tính</th>
                                             <th>Quê quán</th>
                                             <th>Ghi chú</th>
                                             <th>Hình ảnh</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <tr>
                                             <td><?php echo $hoten; ?></td>
                                             <td><?php echo $diachi; ?></td>
                                             <td><?php echo $gioitinh; ?></td>
                                             <td><?php echo $quequan; ?></td>
                                             <td><?php echo $ghichu; ?></td>
                                             <td class="thumbnail" >
                                                <?php if( $img_url != '' ){
                                                    echo '<img src="'.$img_url.'" alt="...">';
                                                } ?>
                                             </td>
                                          </tr>
                                      </tbody>
                               </table>
                            <?php
                            }else{
                                ?>
                                <div class="alert alert-danger" role="alert">
                                    <p class="error">Vui lòng nhập ảnh <a href="bai3_5.php" class="btn btn-success text-right">Quay lại</a></p>
                                </div>
                                <?php
                            }
                            
                        }else{
                            ?>
                            <div class="alert alert-danger" role="alert">
                                <p class="error">Vui lòng nhập đầy đủ thông tin <a href="bai3_5.php" class="btn btn-success text-right">Quay lại</a></p>
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