<html>
<head>
	<title>My account</title>
		<link rel="stylesheet" href="<?php echo ROOT_URL;?>assets/css/bootstrap.min.css" >
		<link rel="stylesheet" href="<?php echo ROOT_URL;?>vendor/bootstrap/css/bootstrap.min.css" >
		<link rel="stylesheet" href="<?php echo ROOT_URL;?>assets/css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
      <div class="container">
        <a class="navbar-brand" href="<?php echo  ROOT_URL;?>">Shareboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav">
            <li>
              <a class="nav-link" href="<?php echo  ROOT_URL;?>">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo  ROOT_URL;?>shares">Shares</a>
            </li>
		</ul>
		
		<ul class="navbar-nav ml-auto">
		<?php if(isset($_SESSION['is_logged_in'])) : ?>
		<li>
              <a class="nav-link" href="<?php echo  ROOT_URL;?>">Welcome <?php echo $_SESSION['user_data']['name'] ?>
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item ml-auto">
              <a class="nav-link" href="<?php echo  ROOT_URL;?>users/logout">Logout</a>
         </li>
		<?php else : ?>
			<li>
              <a class="nav-link" href="<?php echo  ROOT_URL;?>users/login">Login
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item ml-auto">
              <a class="nav-link" href="<?php echo  ROOT_URL;?>users/register">Signup</a>
            </li>
          <?php endif; ?>
          </ul>
		  
        </div>
      </div>
    </nav>

    <!-- Page Content -->
	<?php Messages::display();?>
	<?php require($view)?>
		
	</div>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	
</body>
</html>