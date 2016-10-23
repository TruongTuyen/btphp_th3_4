<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta charset="utf-8" />

	<title>Làm việc trên mảng</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/custom.css" />
</head>

<body>
    <div class="container login-section" >
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <?php 
                    if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
                        $ngay  = $_POST['ngay'];
                        $thang = $_POST['thang'];
                        $nam   = $_POST['nam'];
                        if( $ngay != '' && $thang != '' && $nam != '' ){
                        
                        ?>
                        <div class="alert alert-info" role="alert">
                            <p class="">Ngày tháng năm sinh của bạn: <?php echo $ngay . '/' . $thang . '/' . $nam; ?> </p>
                            <p>Bạn năm nay: <?php echo (date('Y') - $nam ) ?> tuổi</p>
                        </div>
                        <?php
                        }else{
                            ?>
                            <div class="alert alert-danger" role="alert">
                                <p>Vui lòng chọn đủ ngày, tháng, năm</p>
                            </div>
                            <?php
                        }
                    }
                ?>
            
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Chọn ngày tháng năm sinh</h3>
                    </div>
                    <div class="panel-body">
                        <form action="" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <select class="form-control" name="ngay">
                                        <?php
                                            $ngay = range( 1, 31 );
                                        ?>
                                        <?php foreach( $ngay as $val ) : ?>
                                            <option value="<?php echo $val; ?>" ><?php echo $val; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="thang">
                                        <?php
                                            $thang = range( 1, 12 );
                                        ?>
                                        <?php foreach( $thang as $val ) : ?>
                                            <option value="<?php echo $val; ?>"  ><?php echo $val; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="nam">
                                        <?php
                                            $nam = range( 1900, date( 'Y' ) - 1 );
                                        ?>
                                        <?php foreach( $nam as $val ) : ?>
                                            <option value="<?php echo $val; ?>" ><?php echo $val; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <input type="submit" name="submit" value="Xử lý" class="btn btn-success " />
                                
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>