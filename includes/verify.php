<?php
    require('db.php');
    require('functions.php');
    
    $email = $_POST['email'];
    $code =  $_POST['code'];

// echo $conn;

$sque =  "select code, referral from members where email = ?";
$data = prepared_query($conn, $sque, [$email])->get_result()->fetch_assoc();
$dbcode = $data['code'];
$ref = $data['referral'];


if($dbcode == $code){
    prepared_query($conn, 'update members set verify = ? where email = ?', [1, $email]);

    if(!empty($ref)){
        
        prepared_query($conn, 'update members set ref_count = ref_count + 1 where email = ?', [$ref]);
    }
    $output = 'success';
}else{
    $output = 'failed';
}
echo $output;
?>