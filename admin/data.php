<?php
require('../includes/db.php');
require('../includes/functions.php');


function prepared_count($mysqli, $sql, $params, $types = "") {
    $types = $types ?: str_repeat("s", count($params));
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param($types, ...$params);
    $stmt->execute();
    return $stmt;
}
// Your database connection and query code here
// Fetch data and format it as JSON

$stmt = prepared_query($conn, 'select (SELECT COUNT(*) FROM members WHERE que1 = ?) AS discord, (SELECT COUNT(*) FROM members WHERE que1 = ?) AS telegram, (SELECT COUNT(*) FROM members WHERE que1 = ?) AS meet, (SELECT COUNT(*) FROM members WHERE que1 = ?) AS zoom from members', [1,2,3,4], '');
$row = $stmt->get_result()->fetch_assoc();
$discord = $row['discord'];
$telegram = $row['telegram'];
$meet = $row['meet'];
$zoom = $row['zoom'];

$stmt2 = prepared_query($conn, 'select (SELECT COUNT(*) FROM members WHERE que2 = ?) AS morn, (SELECT COUNT(*) FROM members WHERE que2 = ?) AS noon, (SELECT COUNT(*) FROM members WHERE que2 = ?) AS eve, (SELECT COUNT(*) FROM members WHERE que2 = ?) AS night from members', [1,2,3,4], '');
$row2 = $stmt2->get_result()->fetch_assoc();
$morn = $row2['morn'];
$noon = $row2['noon'];
$eve = $row2['eve'];
$night = $row2['night'];
$data = [
    [
        ['label' => 'Discord', 'value' => $discord],
        ['label' => 'Telegram', 'value' => $telegram],
        ['label' => 'Google Meet', 'value' => $meet],
        ['label' => 'Zoom', 'value' => $zoom],
    ],
    [
        ['label' => '10am - 12pm', 'value' => $morn],
        ['label' => '1pm - 3pm', 'value' => $noon],
        ['label' => '4pm - 6pm', 'value' => $eve],
        ['label' => '6pm - 8am', 'value' => $night],
    ]
];


// $data2 = [
//     ['label' => '10am - 12pm', 'value' => $morn],
//     ['label' => '1pm - 3pm', 'value' => $noon],
//     ['label' => '4pm - 6pm', 'value' => $eve],
//     ['label' => '6pm - 8am', 'value' => $night],
// ];

echo json_encode($data);
// echo json_encode($data);
?>
