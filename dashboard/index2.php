<?php
session_start();

if (empty($_SESSION["role"])) {
	$_SESSION["info"] = "\n Anda harus login terlebih dahulu.";
	header("Location: sign-in.php"); 
	exit();
}
else {
	$nama = $_SESSION["nama"];
	$email = $_SESSION["email"];
	
	
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
  <title>Robot Telepresence</title>
  <!-- Favicon-->
  <link rel="icon" href="favicon.ico" type="image/x-icon" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
    type="text/css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css" />

  <!-- Bootstrap Core Css -->
  <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet" />

  <!-- Waves Effect Css -->
  <link href="plugins/node-waves/waves.css" rel="stylesheet" />

  <!-- Animation Css -->
  <link href="plugins/animate-css/animate.css" rel="stylesheet" />
  
  <!-- noUISlider Css -->
  <link href="plugins/nouislider/nouislider.min.css" rel="stylesheet" />

  <!-- Custom Css -->
  <link href="css/style.css" rel="stylesheet" />

  <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
  <link href="css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
  <!-- Page Loader -->

  <!-- #END# Page Loader -->
  <!-- Overlay For Sidebars -->
  <!-- <div class="overlay"></di"> -->
  <!-- Top Bar -->
  <nav class="navbar">
    <div class="container-fluid">
      <div class="navbar-header">
        <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse"
          data-target="#navbar-collapse" aria-expanded="false"></a>
        <a href="javascript:void(0);" class="bars"></a>
        <a class="navbar-brand" href="index.html">ROBOT TELEPRESENCE</a>
      </div>
      
  </nav>
  <!-- #Top Bar -->
  <!-- Left Sidebar -->
  <section>
    <aside id="leftsidebar" class="sidebar">
      <!-- User Info -->
      <div class="user-info">
        <div class="image">
          <img src="images/user.png" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
          <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo $nama; ?>
          </div>
          <div class="email"><?php echo $email; ?></div>
          <div class="btn-group user-helper-dropdown">
        </div>
        </div>
      </div>
      <!-- #User Info -->
      <!-- Menu -->
      <div class="menu">
        <ul class="list">
          <li class="header">Navigasi Utama</li>
          <li>
            <a href="javascript:void(0)">
              <i class="material-icons">home</i>
              <span>Home</span>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <!-- <i class="material-icons">video_call</i> onclick="pose(0.0,0.0,0.0)-->
              <i class="material-icons">build</i> <span>Edit Pengguna</span>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <!-- <i class="material-icons">video_call</i> onclick="pose(0.0,0.0,0.0)-->
             <i class="material-icons">build</i> <span>Edit Robot</span>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <!-- <i class="material-icons">video_call</i> -->
             <i class="material-icons">info</i> <span id = "logout">Logout</span>
            </a>
          </li>

        </ul>
      </div>
      <!-- #Menu -->
      <!-- Footer -->
      <div class="legal">
        <div class="copyright">
          &copy; 2021 <a href="javascript:void(0);">SARI Teknologi</a>.
        </div>
        <div class="version"><b>Versi: </b> 1.0.5</div>
		<div class="text-center">
			<img src="images/brin.png" alt="brin-logo" style="background: transparent; max-height:30pt; max-width: auto;">
			<img src="images/gunadarma.png" alt="gunadarma-logo" style="background: transparent; max-height:30pt; max-width: auto;">
			<img src="images/sari.jpeg" alt="sari-logo" style="background: transparent; max-height:30pt; max-width: auto;">
		</div>
      </div>
      <!-- #Footer -->
    </aside>
      </section>

  <section class="content">
    <div class="container-fluid">
    
              
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Example</h2>
                        </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-md-2">
                                <input type="text" class="knob" value="35" data-width="125" data-height="125" data-thickness="0.25" data-angleArc="250" data-angleoffset="-125"
                                       data-fgColor="#F44336">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="info-box-3 bg-teal hover-expand-effect">
                                                <div class="icon">
                                                    <i class="material-icons">equalizer</i>
                                                </div>
                                                <div class="content">
                                                    <div class="text">Example</div>
                                                    <div class="number">62%</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="info-box-3 bg-green hover-expand-effect">
                                                <div class="icon">
                                                    <i class="material-icons">battery_charging_full</i>
                                                </div>
                                                <div class="content">
                                                    <div class="text">Example</div>
                                                    <div class="number">00:00</div>
                                                </div>
                                            </div>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- page 2 -->
              <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Robot Status : </h2>
                        </div>
                    <div class="body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="info-box-3 bg-teal hover-expand-effect">
                                    <div class="icon">
                                        <i class="material-icons">equalizer</i>
                                    </div>
                                    <div class="content">
                                        <div class="text">Robot 1</div>
                                        <div class="location">Lokasi : </div>
                                        <div class="Device-Id">Devices ID : </div>
                                        <div class="status">Status : </div>
                                    </div>
                                </div>
                            </div>     
                                         <div class="col-lg-6">
                                            <div class="info-box-3 bg-teal hover-expand-effect">
                                                <div class="icon">
                                                    <i class="material-icons">equalizer</i>
                                                </div>
                                                <div class="content">
                                                    <div class="text">Robot 2</div>
                                                    <div class="location">Lokasi : </div>
                                                    <div class="Device-Id">Devices ID : </div>
                                                    <div class="status">Status : </div>
                                                </div>
                                            </div>
                                        </div>
                            </div>
                            <div class="row">
                                        <div class="col-lg-6">
                                            <div class="info-box-3 bg-green hover-expand-effect">
                                                <div class="icon">
                                                    <i class="material-icons">battery_charging_full</i>
                                                </div>
                                                <div class="content">
                                                    <div class="text">Robot 3</div>
                                                    <div class="location">Lokasi :  </div>
                                                    <div class="Device-Id">Devices ID : </div>
                                                    <div class="status">Status : </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="info-box-3 bg-deep-purple">
                                                <div class="icon">
                                                    <i class="material-icons">favorite</i>
                                                </div>
                                                <div class="content">
                                                    <div class="text">Robot 4</div>
                                                    <div class="location">Lokasi : </div>
                                                    <div class="Device-Id">Devices ID : </div>
                                                    <div class="status">Status : </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  

  <!-- Video Call Js-->
  <script src="../../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../../plugins/node-waves/waves.js"></script>

    <!-- Chart Plugins Js -->
    <script src="../../plugins/chartjs/Chart.bundle.js"></script>

    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>
    <script src="../../js/pages/charts/chartjs.js"></script>

    <!-- Demo Js -->
    <script src="../../js/demo.js"></script>

 </body>

</html>
<?php } ?>