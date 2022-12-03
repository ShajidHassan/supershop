<?php
session_start();
$link=mysqli_connect("localhost","root","","supershop");
$warning = '';
	if(isset($_POST['login'])){
		$email = $_POST['email'];
		$password = $_POST['password'];
		$query = mysqli_query($link, "SELECT * FROM user WHERE email = '".$email."' AND password='".$password."'");
		$num_of_user = mysqli_num_rows($query);
		if( $num_of_user > 0 ) {
			$_SESSION['email'] = $email;
			header("Location: fixed.php");
		}else{
			$warning = '<p class="alert alert-danger">Email Or Password maybe wrong! please try again.</p>';
		}
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

    <title>Supershop | </title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
    <img src ="pic.PNG"height="180"width="1380"align="Middle"/>
  </head>
  

  

  <body class="login">
  	<img src ="new.JPG"height="520"width="1380"align="Left"/>

  
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

         
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="" method="POST">
              <h1>Login Form</h1>
				<div class="form-group">
					<label for="exampleInputname1">Email</label>
					<input type="text" class="form-control" name="email" placeholder="">
				</div>
				<div class="form-group">
					<label for="exampleInputname1">password</label>
					<input type="password" class="form-control"  name="password" placeholder="">
				</div>
              <div>
                <div class="form-group">
					<div class="col-md-offset-2 col-md-4 col-md-offset-4">
						<label for="exampleInputEmail1"></label>
						<input type="submit" class="form-control btn btn-success" name="login" value="Process">
					</div>	
				</div>
               
              </div>

              <div class="clearfix"></div>

              <div class="separator">
               
                  <a href="#signup" class="to_register"> Create Account </a>
               

                <div class="clearfix"></div>
                <br />

               
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form action="" method="POST">
              <h1>Create Account</h1>
				<div class="form-group">
							<label for="exampleInputname1">full_name</label>
							<input type="text" class="form-control" name="full_name" placeholder="">
				</div>
             
				<div class="form-group">
							<label for="exampleInputname1">email</label>
							<input type="email" class="form-control" name="email" placeholder="">
				</div>
             

				<div class="form-group">
							<label for="exampleInputname1">password</label>
							<input type="password" class="form-control"  name="password" placeholder="">
				</div>
				
				
				
						<div class="clearfix"></div>

              <div class="separator">
				<div class="col-md-offset-2 col-md-4 col-md-offset-4">
               
					<div class="form-group">
							<label for="exampleInputEmail1"></label>
							<input type="submit" class="form-control btn btn-primary" name="submit" value="submit">
					</div>
				</div>	
				<div class="separator">
               
                  <a href="#signin" class="longin"> Log in </a>
						

                <div class="clearfix"></div>
                <br />

               
              </div>
               

                <div class="clearfix"></div>
                <br />
                 
                
              </div>
            </form>
          </section>
		  <?php
$link=mysqli_connect("localhost","root","","supershop");
	if(isset($_POST['submit'])){
		$id_user='';
		$full_name=$_POST['full_name'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$link=mysqli_connect("localhost","root","","supershop");
		
		$query=mysqli_query($link,"INSERT INTO user(id_user,full_name,email,password)
		VALUES('".$id_user."','".$full_name."','".$email."','".$password."')");
		if($query){
			echo 'successfully inserted';

	} else{
		echo mysqli_error($link);
	}

	}
	$query_result=mysqli_query($link,"SELECT * FROM user" );
?>
        </div>
      </div>
    </div>
  </body>
</html>
