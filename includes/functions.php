<?php
function prepared_query($mysqli, $sql, $params, $types= ""){
    $types = $types ?: str_repeat("s", count($params));
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param($types, ...$params);
    $stmt -> execute();
    return $stmt;
}


function prepared_select($mysqli, $sql, $params = [], $types= ""){
    return prepared_query($mysqli, $sql, $params, $types)->get_result();
}


?>