<?php
// SQL Server connection details
$serverName = "localhost"; // or "SERVER\INSTANCE"
$connectionOptions = [
    "Database" => "bhotepramod_",
    "Uid" => "bhotepramod_",
    "PWD" => "Airtel@753"
];

// Connect to SQL Server
$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Get form data
$username = $_POST['username'];
$password = $_POST['password'];

// Query to check user (plaintext password for demo; use HASH in real system)
$sql = "SELECT * FROM Users WHERE UserName = ? AND UserPassword = ?";
$params = array($username, $password);

$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

if (sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    echo "<h2>✅ Login Successful! Welcome, $username</h2>";
} else {
    echo "<h2>❌ Invalid username or password</h2>";
}

// Close connection
sqlsrv_close($conn);
?>
