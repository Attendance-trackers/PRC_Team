<?php
$serverName = "sql.bsite.net\\MSSQL2016";
$connectionOptions = [
    "Database" => "bhotepramod_",
    "Uid"      => "bhotepramod_",
    "PWD"      => "Airtel@753"
];

$conn = sqlsrv_connect($serverName, $connectionOptions);
if ($conn === false) {
    die( print_r(sqlsrv_errors(), true) );
} else {
    echo "Connected successfully!";
}
?>