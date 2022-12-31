<?php
    #세션 검증을 통한 접근제어
    session_start();  
    if(!isset($_SESSION['logged_in'])){
        echo "<script>alert('Permission Denied');</script>";
        echo "<script>history.back();</script>"; 
    }  
    echo "ISLAB{Web_hacking_is_fun!}";
?>
