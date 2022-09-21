<?php
session_start();

require_once "set.php";

//space kosong
$s_danger = $s_info = $s_success = "";
$e_tot = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $kategori = saring($_POST["kategori"]);
	
  if (empty($_POST["name"])) {
    $s_danger .= "Nama tidak boleh kosong!";
	$e_tot += 1;
  } else {
    $name = saring($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $s_info .= "\n Nama hanya boleh mengandung huruf.";
	  $e_tot += 1;
    }
  }

  if (empty($_POST["username"])) {
    $s_danger .= "Username tidak boleh kosong!";
	$e_tot += 1;
  } else {
    $username = saring($_POST["username"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9 ]*$/",$username)) {
      $s_info .= "\n Username hanya boleh mengandung huruf dan angka.";
	  $e_tot += 1;
    }
  }

  if (empty($_POST["email"])) {
    $s_danger .= "\n Email harus diisi!";
	$e_tot += 1;
  } else {
    $email = saring($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $s_danger .= "\n Email tidak benar.";
	  $e_tot += 1;
    }
  }
  
  if (empty($_POST["password"])) {
    $s_danger .= "\n Password harus diisi!";
	$e_tot += 1;
  } else {
    $password = saring($_POST["password"]);
	$paswd = password_hash($password, PASSWORD_BCRYPT, ["cost" => 12]);
  }
  
  if (empty($_POST["terms"])) {
    $s_danger .= "\n Terms and policy harus disetujui!";
	$e_tot += 1;
  }
  
  if ($e_tot == 0) {
	try {
		$conn = new PDO("mysql:host=$servername;dbname=telepresence", $usernamedb, $passworddb);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// prepare sql and bind parameters
		$stmt = $conn->prepare("INSERT INTO pengguna (kategori, username, paswd, email, nama)
		VALUES (:kategori, :username, :paswd, :email, :nama)");
		$stmt->bindValue(':kategori', $kategori);
		$stmt->bindValue(':username', $username);
		$stmt->bindValue(':paswd', $paswd);
		$stmt->bindValue(':email', $email);
  	    $stmt->bindValue(':nama', $name);
		$stmt->execute();

		$s_success = "\n Akun berhasil didaftarkan, silakan login.";
	}
	catch(PDOException $e) {
		$s_danger = "\n " . $e->getMessage();
	}
  }
}

$conn = null;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign Up | Telepresence.site</title>
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

<body class="signup-page">
    <div class="signup-box">
        <div class="logo">
            <a href="javascript:void(0);">Tele<b>presence</b></a>
            <small>Feel like you are present in another place </small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_up" method="POST" action="sign-up.php">
                    <div class="msg">Register a new membership</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="name" placeholder="Name" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                        </div>
                    </div>
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
                            <input type="password" class="form-control" name="password" minlength="6" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="confirm" minlength="6" placeholder="Confirm Password" required>
                            <input type="hidden" name="kategori" value="User">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink">
                        <label for="terms">I read and agree to the <a href="javascript:void(0);">terms of usage</a>.</label>
                    </div>

                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">SIGN UP</button>

                    <div class="m-t-25 m-b--5 align-center">
                        <a href="sign-in.php">You already have a membership?</a>
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
    <script src="js/pages/examples/sign-up.js"></script>
</body>

</html>