<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8"/>
	<title>Bai 5.3</title>
    <style type="text/css">
        .container{
            max-width:  1200px;
            margin: auto;
        }
        .cate_info{
            width: 600px;
            border-collapse: collapse;
        }
        .cate_info, tr, th, td{
            border: 1px solid #342E34;
        }
        
        tr th{
            text-align: left;
        }
        
        th, td{
            padding: 8px;
        }
        .page_nav ul{
            padding-left: 0;
        }
        
        .page_nav ul li{
            display: inline;
            padding: 5px;
            border: 1px solid #004040;
            margin-right: 5px;
        }
        .page_nav ul li a{
            color: #004040;
            font-weight: bold;
            text-decoration: none;
        }
        .page_nav ul li:hover{
            background: #004040;
        }
        .page_nav ul li:hover a{
            color: white;
        }
        .active{
            background: #004040;
            color: white;
        }
    </style>
</head>
<?php 
    if( !isset( $_SESSION['is_user_logged_in'] ) ){
        header('location: bai_5_2_login.php' );
        exit;
    }else{
        if( $_SESSION['logged_in_level'] != 10  ){
            header('location: bai_5_2.php' );
            exit;
        }
    }
    global $max_pages;
    
    function cate_pagination( $max_pages, $type = 'basic' ){
        if( !isset( $max_pages ) ){
            $max_pages = 1;
        }
        if( $max_pages <= 1 ){
            return;
        }
        $current_page = 1;
        if( isset( $_GET['page'] ) && is_numeric( $_GET['page'] ) && $_GET['page'] > 0 && $_GET['page'] <= $max_pages ){
            $current_page = abs( $_GET['page'] );
        }
        $html = '';
        $before = '';
        $after = '';
        if( $current_page != 1 ){//Show prev button
            $before = '<li><a href="?page='.($current_page-1).'">Prev</a></li>';
        }
        
        if( $current_page != $max_pages ){
            $after = '<li><a href="?page='.($current_page+1).'">Next</a></li>';
        }
        if( $type == 'advance' ){
            $first = '';
            $last = '';
            
            if( $current_page != 1 ){
               $first =  '<li><a href="?page=1">First</a></li>';
               $before = $first . $before;
            }
            
            if( $current_page != $max_pages ){
               $last =  '<li><a href="?page='.$max_pages.'">Last</a></li>';
               $after = $after . $last;
            }
        }
        
        for( $i=1; $i<=$max_pages; $i++ ){
            if( $i == $current_page ){
                $html .= '<li class="active">'.$i.'</li>';
            }else{
                $html .= '<li><a href="?page='.$i.'">'.$i.'</a></li>';
            }
            
        }
        
        echo '<div class="page_nav"><ul>' . $before . $html . $after . '</ul></div>';
    }
    
    function get_cate_data( $record_per_page = 5 ){
        global $max_pages;
        $connect = mysql_connect( 'localhost', 'root', '' ) or die( mysql_error() );
        mysql_select_db( 'baitap_php_th5', $connect ) or die( mysql_error() );
        
        $count_all = "SELECT Count(*) AS count FROM `cate_news`";
        $count = mysql_query( $count_all, $connect );
        
        if( mysql_num_rows( $count ) > 0 ){
            $all_record = mysql_fetch_assoc( $count );
        }
        
        if( isset( $all_record ) && !empty( $all_record['count'] ) && is_numeric( $all_record['count'] ) ){
            $total_page = $all_record['count'] / $record_per_page;
            
            $max_pages = ceil( $total_page );
        }else{
            $max_pages = 1;
        }
        
        $page = 1;
        if( isset( $_GET['page'] ) && is_numeric( $_GET['page'] ) && $_GET['page'] > 0 && $_GET['page'] <= $max_pages ){
            $page = abs( $_GET['page'] );
        }
        
        $start = ( $page - 1 ) * $record_per_page;
        
        $sql = "SELECT * FROM `cate_news` LIMIT $start, $record_per_page";
        $query = mysql_query( $sql, $connect );
        
        $data = array();
        if( mysql_num_rows( $query ) > 0 ){
            while( $row = mysql_fetch_assoc( $query ) ){
                $data[] = $row;
            }
        }
        return $data;
    }
?>
<body>
    <?php
        $data = get_cate_data();
    ?>
    <div class="container">
        <h3>Danh sách chuyên mục <a href="bai_5_3_addnew.php">Thêm mới</a></h3>
        <table class="cate_info">
            <tr>
                <th>STT</th>
                <th>Tên chuyên mục</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
            <?php 
                if( !empty( $data ) ){
                    $i = 1;
                    foreach( $data as $value ){
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $value['cate_tittle']; ?></td>
                            <td><a href="bai_5_3_edit.php?id=<?php echo $value['cate_id']; ?>">Sua</a></td>
                            <td><a onclick="return confirm('Ban chac chan muon xoa!');" href="bai_5_3_delete.php?id=<?php echo $value['cate_id']; ?>">Xoa</a></td>
                        </tr>
                        <?php
                        $i++;
                    }
                    
                }else{
                    echo "<tr><td col-span='4'>Khong co du lieu</td></tr>";
                }
            ?>
            
        </table>
        <div class="page_nav_wrap">
            <?php cate_pagination( $max_pages, 'basic' ); ?>
            <?php cate_pagination( $max_pages, 'advance' ); ?>
        </div>
    </div>


</body>
</html>