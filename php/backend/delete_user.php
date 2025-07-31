<?php
$user_id = $_GET['user_id'];

if (!$user_id) {
    echo "user id is required";
    exit();
}

$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'foodi'
);

$delete_user = mysqli_query(
    $conn,
    "DELETE FROM user_crud_ops WHERE user_id =  $user_id"
);
if ($delete_user) {
    echo "User deleted successfully";
}
