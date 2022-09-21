<?php
session_start();

require_once "set.php";

//space kosong
$s_danger = $s_info = $s_success = "";
$e_tot = 0;

if (!empty($_SESSION["info"])) {
    $s_info .= $_SESSION["info"];
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $kategori = "User";	
	
  if (empty($_POST["username"])) {
    $s_danger .= "Username tidak boleh kosong!";
	$e_tot += 1;
  } else {
    $username = saring($_POST["username"]);
  }
  
  if (empty($_POST["password"])) {
    $s_danger .= "\n Password harus diisi!";
	$e_tot += 1;
  } else {
    $password = saring($_POST["password"]);
  }
  
  if (empty($_POST["rememberme"])) {
		$ingat = 0;
  }
	else {
		$ingat = 1;
  }
  
  if ($e_tot == 0) {
	try {
		$conn = new PDO("mysql:host=$servername;dbname=telepresence", $usernamedb, $passworddb);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// prepare sql and bind parameters
		$stmt = $conn->prepare("SELECT * FROM pengguna 
		WHERE username=:username");
		$stmt->bindValue(':username', $username);

		$stmt->execute();
		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		if($row == false){
			$s_danger .= "\n Username salah!";
		} else{
			$data_kategori = $row['kategori'];
			$data_username = $row['username'];
			$data_password = $row['paswd'];
            $data_email = $row['email'];
		}
	}
	catch(PDOException $e) {
		$s_danger = "\n " . $e->getMessage();
	}
  }
  
  if (password_verify($password, $data_password)) {
    setcookie("role", $data_kategori, time() + (60 * 60 * 24), "/");
    //$_SESSION["role"] = $data_kategori;
	$_SESSION["nama"] = $data_username;
    $_SESSION["email"] = $data_email;
	header("Location: index.php"); 
	$conn = null;
	exit();
  } else {
      $s_danger .= "\n Username salah!";
  }
}

$conn = null;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | Telepresence</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);"><b>TELE</b>PRESENCE</a>
            <small>Feel like you are present in another place </small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="sign-in.php">
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="sign-up.php">Register Now!</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="forgot-password.php">Forgot Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-in.js"></script>
</body>

</html>