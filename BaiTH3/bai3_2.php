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
            <div class="col-md-8 col-md-offset-2">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Thông tin sinh viên</h3>
                    </div>
                    <div class="panel-body">
                        <form action="bai3_2_view.php" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <label for="hoten">Họ và tên</label>
                                    <input class="form-control" placeholder="Họ và tên" name="hoten" type="text" />
                                </div>
                                <div class="form-group">
                                    <label for="dienthoai">Điện thoại</label>
                                    <input class="form-control" placeholder="Điện thoại" name="dienthoai" type="text" />
                                </div>
                                <div class="form-group">
                                    <label for="cmnd">CMND</label>
                                    <input class="form-control" placeholder="CMND" name="cmnd" type="text" />
                                </div>
                                <div class="form-group">
                                    <label for="diachi">Địa chỉ</label>
                                    <input class="form-control" placeholder="Địa chỉ" name="diachi" type="text" />
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input class="form-control" placeholder="Email" name="email" type="text" />
                                </div>
                                <div class="form-group">
                                    <label for="gioitinh">Giới tính: </label>
                                    <label class="radio-inline"><input type="radio" name="gioitinh" checked="checked" value="Nam"/>Nam</label>
                                    <label class="radio-inline"><input type="radio" name="gioitinh" value="Nữ"/>Nữ</label>
                                </div>
                                <div class="form-group">
                                    <label for="ghichu">Ghi chú</label>
                                    <textarea class="form-control" rows="5" id="ghichu" name="ghichu"></textarea>
                                </div>
                                
                                <input type="submit" name="submit" value="Nhập" class="btn btn-success" />
                                <input type="reset" name="reset" value="Xóa" class="btn btn-danger" />
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>