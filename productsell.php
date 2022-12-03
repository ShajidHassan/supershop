<?php
session_start();
if( !isset($_SESSION['email']) ) {
	header("Location: login.php");
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
							<label for="exampleInputname1">product name</label>
							<!--<input type="text" class="form-control" name="product_name" placeholder="">-->
							<?php
							$link= mysqli_connect("localhost","root","","supershop");
	
	$query_result= mysqli_query($link,"SELECT * FROM product");
?>
							<select class="form-control" name="product_id">
							<option>--Select A Product--</option>
							<?php
							 $i = 1;
	while($row = mysqli_fetch_array($query_result)) {
		?>
		<option value="<?php echo $row['id'];?>"><?php echo $row['Name']; ?>
				
		</option>
		<?php
		$i++;
	}
							?>
							</select>
							
						</div>
					</div>
				</div>
				
				<div class ="row">
					<div class="col-md-8">
						<div class="form-group">
							<label for="exampleInputname1">Brand</label>
							<!--<input type="text" class="form-control" name="quentity" placeholder="">-->
							<?php
							$link= mysqli_connect("localhost","root","","supershop");
	
								$query_result= mysqli_query($link,"SELECT * FROM product");
							?>
							<select class="form-control" name="Brand">
							<option>--Select A Brand--</option>
							<?php
							 $i = 1;
								while($row = mysqli_fetch_array($query_result)) {
							?>
							<option value="<?php echo $row['id'];?>"><?php echo $row['Brand']; ?>
				
							</option>
				<?php
					$i++;
	}
						?> 		
							</select>
						</div>
					</div>
				</div>
				
				<div class ="row">
					<div class="col-md-8">
						<div class="form-group">
							<label for="exampleInputname1">quantity</label>
							<input type="text" class="form-control" name="quantity" placeholder="">
						</div>
					</div>
				</div>
				<div class ="row">
					<div class="col-md-8">
						<div class="form-group">
							<label for="exampleInputname1">date</label>
							<input type="text" class="form-control"  name="date" placeholder="">
						</div>
					</div>
				</div>
				<div class ="row">
					<div class="col-md-8">
						<div class="form-group">
							<label for="exampleInputname1">price</label>
							<input type="text" class="form-control"  name="price" placeholder="">
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
		$id_product_sell= '';
		$product_name=$_POST['product_id'];
		$quantity=$_POST['quantity'];
		$date=$_POST['date'];
		$price=$_POST['price'];
		
		
		
		$query= mysqli_query($link,"INSERT INTO product_sell(id_product_sell,product_id,quantity,date,price)
		VALUES('".$id_product_sell."','".$product_name."','".$quantity."','".$date."','".$price."')");
		if($query){
			echo '<p class="alert alert-success">successfuly inserted </p>';
		} else{
			echo mysqli_error($link);
		}
		
		$query_result_st= mysqli_query($link,"SELECT * FROM stock WHERE product_id='".$product_name."'");
		$row_st = mysqli_fetch_array($query_result_st);
		if($row_st>0)
		{
		$query= mysqli_query($link,"update stock set quantity = quantity - '".$quantity."' where product_id = '".$product_name."'");
		
		}
		else{
			$query= mysqli_query($link,"INSERT INTO stock(product_id,quantity)
		VALUES('".$product_name."','".$quantity."')");
		}
		
	}
	$query_result= mysqli_query($link,"SELECT product_sell.quantity,product_sell.price,product_sell.date,product.Name FROM product_sell,product where product.id=product_sell.product_id");
?>
<table class="table table-bordered">
		<tr>
			<th>Serial No</th>
			
			<th>Product Name</th>
			<th>Quantity</th>
			<th>Price</th>
			<th>Date</th>
			
		</tr>
	<?php
	 $i = 1;
	while($row = mysqli_fetch_array($query_result)) {
		?>
		<tr>
			<td><?php echo $i; ?></td>
			
			<td><?php echo $row['Name']; ?></td>
			<td><?php echo $row['quantity']; ?></td>
			<td><?php echo $row['price']; ?></td>
			<td><?php echo $row['date']; ?></td>
		
			
		</tr>
		<?php
		$i++;
	}
	?>
	</table>
            </div>
			
          </div>
        </div>
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