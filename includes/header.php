<!DOCTYPE html>
<?php
	session_start();
	require('core.php');
?>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Chat App</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<?php if(isset($_SESSION['username'])){ ?> 
			<link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css" />
			<link rel="stylesheet" href="../css/index.css" />
		<?php } else { ?>
			<link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css" />
			<link rel="stylesheet" href="css/index.css" />
		<?php 
			}
		?>
	</head>

	<body>
		<nav class="navbar navbar-default">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand"<?php if(isset($_SESSION['username'])){ ?> href="chat_rooms.php" <?php } ?> >Web Chat Application</a>
		    </div>
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav navbar-right">
			    <?php 
			    	if(isset($_SESSION['username'])){
	    		?>
			    		<li class="dropdown">
				          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span>Logged in as:</span> <?php echo $_SESSION['username']?> <span class="caret"></span></a>
				          <ul class="dropdown-menu">
				            <li><a href="logout.php">Log Out</a></li>
				          </ul>
				        </li>
		    	<?php } ?>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>