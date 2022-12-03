<?php
session_start();
if( !isset($_SESSION['email']) ) {
	header("Location: fixed.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Supershop!  </title>

   <!-- <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>

    <!-- Custom Theme Style --> 
    <link href="build/css/custom.min.css" rel="stylesheet"> 
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a  class="site_title"><i class="fa fa-paw"></i> <span>Supershop!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="user.png" alt="not image" class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Shajid</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
					<li><a href="product.php">Product </a></li>
					<li><a href="productpurchase.php">Product purchase</a></li>
					<li><a href="productsell.php">Product sell</a></li>
					<li><a href="stock.php">Stock</a></li>
                </ul>
              </div>
             

            </div>
            
          </div>
        </div>

        <!-- top navigation -->
       <?php include('top_navigation.php'); ?>
        <!-- /top navigation -->

        <!-- page content -->
         <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> <small>  <strong></strong></small></h3>
              </div>
			   <form action="" method="POST">
			<div class="container">
				<div class ="row">
					<div class="col-md-8">
						<div class="form-group">
							<label for="exampleInputname1">Name</label>
							<input type="text" class="form-control" name="Name" placeholder="">
						</div>
					</div>
				</div>
				<div class ="row">
					<div class="col-md-8">
						<div class="form-group">
							<label for="exampleInputname1">Brand</label>
							<input type="text" class="form-control" name="Brand" placeholder="">
						</div>
					</div>
				</div>
				<div class ="row">
					<div class="col-md-8">
						<div class="form-group">
							<label for="exampleInputname1">Price</label>
							<input type="text" class="form-control"  name="Price" placeholder="">
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-offset-3 col-md-2 col-md-offset-3">
						<div class="form-group">
							<label for="exampleInputEmail1"></label>
							<input type="submit" class="form-control btn btn-primary" name="submit" value="submit">
						</div>
					</div>
				</div>
			</div>
		</form>
		<?php
$link= mysqli_connect("localhost","root","","supershop");

	if(isset($_POST['submit'])){
		$id= '';
		$Name=$_POST['Name'];
		$Brand=$_POST['Brand'];
		$Price=$_POST['Price'];
		
		$query= mysqli_query($link,"INSERT INTO product(Name,Brand,Price)
		VALUES('".$Name."','".$Brand."','".$Price."')");
		if($query){
			echo '<p class="alert alert-success">successfuly inserted </p>';
		} else{
			echo mysqli_error($link);
		}
		
	}
	$query_result= mysqli_query($link,"SELECT * FROM product");
?>
<!-- /page content -->

        <!-- footer content -->
        <footer>
         
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- jQuery custom content scroller -->
    <script src="vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
  </body>
</html>