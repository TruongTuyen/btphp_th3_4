<?php session_start();
    if( isset( $_SESSION['is_user_logged_in'] ) ){
        unset( $_SESSION['is_user_logged_in'] );
        header('location: bai_5_2_login.php' );
    }
?>