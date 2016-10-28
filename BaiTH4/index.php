<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta charset="utf-8" />

	<title>Bài thực hành số 4</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/custom.css" />
</head>

<body>
    <div class="container login-section" >
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3>Bài tập</h3>
                <?php 
                
                $sever = $_SERVER['SERVER_NAME'];
                $uri = $_SERVER['REQUEST_URI'];
                $directory_uri = $sever . $uri;
                
                ?>
                <ul>
                  <li><a target="_blank" href="bai4_1_1.php">Bài 4.1.1</a></li>
                  <li><a target="_blank" href="bai4_1_2.php">Bài 4.1.2</a></li>
                  <li><a target="_blank" href="bai4_2.php">Bài 4.2</a></li>
                  <li><a target="_blank" href="bai4_3.php">Bài 4.3.1</a></li>
                  <li><a target="_blank" href="bai4_3_2.php">Bài 4.3.2</a></li>
                  <li><a target="_blank" href="bai4_4.php">Bài 4.4</a></li>
                  <li><a target="_blank" href="bai4_5.php">Bài 4.5</a></li>
                  <li><a target="_blank" href="bai4_6.php">Bài 4.5</a></li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>