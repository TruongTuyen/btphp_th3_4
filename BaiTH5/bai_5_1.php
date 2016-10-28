<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8"/>
	<title>Bai 5.1</title>
</head>

<body>
    <?php
    $connect = mysql_connect( 'localhost', 'root', '' ) or die( mysql_error() );
    mysql_select_db( 'baitap_php_th5', $connect ) or die( mysql_error() );
    
    if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
        $search = mysql_real_escape_string( strip_tags( trim( $_POST['search'] ) ), $connect );
        
        $query = "SELECT * FROM `user` WHERE `name` LIKE '%{$search}%'";
        
        $result = mysql_query( $query, $connect );
        $data = array();
        if( mysql_num_rows( $result ) > 0 ){
            while( $row = mysql_fetch_assoc( $result ) ){
                $data[] = $row;
            }
        }
    }
    
    ?>
    <div class="container">
    <?php if( isset( $data ) ){ ?>
        <?php if( !empty( $data ) ) { ?>
            <table class="table_info">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                </tr>
                <?php foreach( $data as $value ) { ?>
                    <tr>
                        <td><?php echo $value['id']; ?></td>
                        <td><?php echo $value['name']; ?></td>
                        <td><?php echo $value['address']; ?></td>
                        <td><?php echo $value['phone']; ?></td>
                    </tr>
                <?php } ?>
            </table>
        <?php }else{ ?>
            <p>Không tìm thấy bản ghi nào theo từ khóa: <?php echo $search;  ?></p>
        <?php } ?>
    <?php } ?>
        <form method="post" action="">
            <input class="form-field" name="search" value="" placeholder="Tim theo ten" />
            <input name="submit" type="submit" value="Tim kiem" />
        </form>
    </div>


</body>
</html>