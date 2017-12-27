<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Headset System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
    
	<script src="<?php echo base_url();?>assets/js/jquery-1.11.1.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <!-- HEADER END-->
    <div class="navbar navbar-inverse set-radius-zero header">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/" style="height: auto;">

                    <img src="<?php echo base_url();?>assets/img/logo-white.png" />
                </a>

            </div>

            <?php if(isset($usuario)){  ?>
	            <div class="right-div">
	                <div class="user-settings-wrapper">
	                    <ul class="nav">

	                        <li class="dropdown">
	                            <a class="dropdown-toggle" data-toggle="dropdown" href="/" aria-expanded="false">
	                                <span class="glyphicon glyphicon-user" style="font-size: 25px;"></span>
	                            </a>
	                            <div class="dropdown-menu dropdown-settings">
	                                <div class="media">
	                                    <a class="media-left" href="#">
	                                        <img src="<?php echo base_url();?>assets/img/usuario.jfif" alt="" class="img-rounded" />
	                                    </a>
	                                    <div class="media-body">
	                                        <h4 class="media-heading"><?php echo $usuario ?></h4>
	                                        <h5><?php echo $cargo ?></h5>

	                                    </div>
	                                </div>
	                                <hr />
	                                <!--<h5><strong>Personal Bio : </strong></h5>
	                                Anim pariatur cliche reprehen derit.
	                                <hr />
	                                <a href="#" class="btn btn-info btn-sm">Full Profile</a>&nbsp;--> 
	                                <a href="<?php echo base_url();?>logout" class="btn btn-danger btn-sm">Logout</a>

	                            </div>
	                        </li>


	                    </ul>
	                </div>
	            </div>
            <?php } ?>
        </div>
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a class="menu-top-active" href="dashboard">Dashboard</a></li>
                            <li><a href="#">Modulo</a></li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    </div>
	<div id="notification_div"></div>
    <!-- LOGO HEADER END-->
    <!-- MENU SECTION END-->
    <div id="allcontent">
		<?php if(isset($content)){ print $content; } ?>
	</div>
            <!--
            <?= $this->content ?>
        	-->
</body>
</html>