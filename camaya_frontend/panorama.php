<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Hotel Resort And Day Tours">
    <meta name="author" content="Camaya INC.">

    <title>Camaya Coast</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,800italic,700italic,600italic,400italic,300italic,800,700,600' rel='stylesheet' type='text/css'>

    <!-- Custom CSS -->
    <link href="css/thumbnail-gallery.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link href="css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="css/panorama360.css" media="all" />
  
	<link href="css/ekko-lightbox.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body id = "main">
<!-- Page Content -->
<div class="container">

            
	<div class = "container">
		<div class = "row">
			<div class="panorama">
				<div class="preloader"></div>
				<div class="panorama-view">
					<div class="panorama-container">
						<img src="assets/panorama2.jpg" data-width="3074" data-height="800" alt="Panorama Alt">
					</div>
				</div>
				<a class="info" href="http://commons.wikimedia.org/wiki/File:View_from_Sky_Tower_Akl.jpg">Sky Tower Akl</a>
			</div>
		</div>
	</div>


    <!-- Footer -->

    <!-- /.container -->
</div>

<!-- jQuery -->
<?php include_once("inc/scripts.php");?>
	<script>
		$(function(){
			$('.panorama-view').panorama360({
				sliding_controls: true
			});
		});
	</script>
<!--footer-->
<?php include_once("inc/templates/footer.php");?>
