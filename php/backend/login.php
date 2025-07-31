
<?php 
$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'foodi',
);


// <!-- //correct user data(username, password) -->

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($username) || empty($password)) {
	$_SESSION['message'] = "All fields are required";
	header('location: ../login.php');
	exit();
}


// <!-- //check for existing username orss password -->

$checkForExistingData = mysqli_query(
     $conn,
     "SELECT * FROM user_crud_ops WHERE username = '$username'  AND pas ='$password'"
);

if (mysqli_num_rows($checkForExistingData)=== 0) {
	$_SESSION['message']='incorrect password';
	header('location: ../login.php');
	exit();
};

// <!-- //store the users data in session called "user_data" -->

$username="";
$password="";

foreach ($checkForExistingData as $rows) {
	$username=$rows['username'];
	$password=$rows['password'];


$_SESSION['user_data']=[
   'username'=>$username,
   'password'=>$password
];

};
header('location:../index.php');


