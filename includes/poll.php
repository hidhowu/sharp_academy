<?php
    require('db.php');
    require('functions.php');
    $email = $_POST['email'];
    $opt1 = $_POST['opt1'];
    $opt2 = $_POST['opt2'];



    prepared_query($conn, 'update members set que1 = ?, que2 = ? where email = ?', [$opt1, $opt2, $email]);
    // Output
    echo 'success';

?>