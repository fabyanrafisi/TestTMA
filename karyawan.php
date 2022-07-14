<?php

require_once "koneksi.php";

header('Access-Control-Allow-Origin: *');

if (function_exists($_GET['function'])) {
    $_GET['function']();
}

function list_karyawan()
{
    global $mysqli;

    $query = "CALL listKaryawan()";

    // $data = array();

    $hasil = $mysqli->query($query);
    while ($row = mysqli_fetch_object($hasil)) {
        $data[] = $row;
    }
    $response = array(
        'status' => 1,
        'message' => 'Success',
        'data' => $data
    );
    header('Content-Type: application/json');
    header("Access-Control-Allow-Origin: *");
    echo json_encode($response);
}
?>