<?php session_start(); ?>
<?php 
    if( !isset( $_SESSION['is_user_logged_in'] ) ){
        header('location: bai_5_2_login.php' );
        exit;
    } 
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8"/>
	<title>Bai 5.2</title>
</head>

<body>
    <div class="container">
    <?php
        if( isset( $_SESSION['is_user_logged_in'] ) && isset( $_SESSION['logged_in_level'] ) ){
            if( $_SESSION['logged_in_level'] != 10 ){ //user binh thuong
                 echo "Ban da dang nhap he thong: <a href='bai_5_2_logout.php'>Thoat</a>";
            }else{ //admin 
                ?>
                <h3>Chao ban Admin</h3>
                <div class="menu_link">
                    <ul>
                        <li><a href="bai_5_3.php">Them chuyen muc</a></li>
                        <li><a href="">Quan ly chuyen muc</a></li> 
                        <li><a href="">Them tin tuc</a></li> 
                        <li><a href="">Quan ly tin tuc</a></li> 
                        <li><a href="">Them thanh vien</a></li> 
                        <li><a href="">Quan ly thanh vien</a></li> 
                        <li><a href="bai_5_2_logout.php">Dang xuat</a></li>          
                    </ul>
                </div>
                <?
            }
        }
    
    ?>
    
    </div>


</body>
</html>