<?php session_start();
ob_start();
if( isset( $_REQUEST['act'] ) && $_REQUEST['act'] == "logout" )
{
	
		unset( $_SESSION['secure_ddlc'] );
	
}
require_once( "condb.php" );
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DDCL Company | Finance</title>

    <!-- Bootstrap core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/icheck/flat/green.css" rel="stylesheet">


    <script src="js/jquery.min.js"></script>

    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body style="background:#F7F7F7;">
    <?php
	      $result = mysql_query("SELECT username,password FROM nar_set limit 1");
		  $row = mysql_fetch_array( $result );
		  $cls = "alert alert-danger alert-dismissible fade in";
if (isset( $_POST['un'] )  && isset( $_POST['pw'] ) ) {		  
if ($_POST['un'] == "".$row['username']."" && $_POST['pw'] == "".$row['password']."") {
			$_SESSION['secure_ddlc']	=	"admin";
			if (isset($_SESSION['user_add'])) { unset($_SESSION['user_add']);}
			if (isset($_SESSION['secure_user_id'])) { unset($_SESSION['secure_user_id']);}
			if (isset($_SESSION['user_list'])) { unset($_SESSION['user_list']);}
			if (isset($_SESSION['add_prop'])) { unset($_SESSION['add_prop']);}
			if (isset($_SESSION['list_prop'])) { unset($_SESSION['list_prop']);}
			if (isset($_SESSION['add_renter'])) { unset($_SESSION['add_renter']);}
			if (isset($_SESSION['list_renter'])) { unset($_SESSION['list_renter']);}
			if (isset($_SESSION['lend_money'])) { unset($_SESSION['lend_money']);}
			if (isset($_SESSION['lend_money_list'])) { unset($_SESSION['lend_money_list']);}
			if (isset($_SESSION['exp_add'])) { unset($_SESSION['exp_add']);}
			if (isset($_SESSION['exp_list'])) { unset($_SESSION['exp_list']);}
			if (isset($_SESSION['rent_add'])) { unset($_SESSION['rent_add']);}
			if (isset($_SESSION['rent_list'])) { unset($_SESSION['rent_list']);}
			if (isset($_SESSION['mrec'])) { unset($_SESSION['mrec']);}
			if (isset($_SESSION['chand'])) { unset($_SESSION['chand']);}
			if (isset($_SESSION['due_emi_list'])) { unset($_SESSION['due_emi_list']);}
			if (isset($_SESSION['due_rent_list'])) { unset($_SESSION['due_rent_list']);}
			if (isset($_SESSION['reml'])) { unset($_SESSION['reml']);}
			header( 'location:index.php' );
}else{ 
	$qer = "SELECT uid,uname,upassword,user_add,user_list,add_prop,list_prop,add_renter,list_renter,lend_money,lend_money_list,rent_add,rent_list,exp_add,exp_list,mrec,chand,due_emi_list,due_rent_list,reml FROM nar_user where uname='".$_POST['un']."' AND upassword ='".$_POST['pw']."'limit 1";
	$result = mysql_query($qer);
	$row = mysql_fetch_array( $result );
	if (is_array($row) && count($row)>0) {
		$_SESSION['secure_ddlc']	=	"user";
		$_SESSION['secure_user_id']	=	$row['uid'];
		$_SESSION['secure_ddlc_user']	=	$_POST['un'];
		$_SESSION['secure_ddlc_pass']	=	$_POST['pw'];
		$_SESSION['user_add']	=	$row['user_add'];
		$_SESSION['user_list']	=	$row['user_list'];
		$_SESSION['add_prop']	=	$row['add_prop'];
		$_SESSION['list_prop']	=	$row['list_prop'];
		$_SESSION['add_renter']	=	$row['add_renter'];
		$_SESSION['list_renter']=	$row['list_renter'];
		$_SESSION['lend_money']=	$row['lend_money'];
		$_SESSION['lend_money_list']=$row['lend_money_list'];
		$_SESSION['exp_add']=	$row['exp_add'];
		$_SESSION['exp_list']=	$row['exp_list'];
		$_SESSION['rent_add']=	$row['rent_add'];
		$_SESSION['rent_list']=	$row['rent_list'];
		$_SESSION['mrec']=	$row['mrec'];
		$_SESSION['chand']=	$row['chand'];
		$_SESSION['due_emi_list']=	$row['due_emi_list'];
		$_SESSION['due_rent_list']=	$row['due_rent_list'];
		$_SESSION['reml']=	$row['reml'];
		header( 'location:index.php' );
	}else {

	
	
?>
			<div class="<?php echo $cls; ?>" role="alert">
				username and password do not match.
			</div>
<?php
	}
}
}
?>
<div class="">
        <a class="hiddenanchor" id="toregister"></a>
        <a class="hiddenanchor" id="tologin"></a>

        <div id="wrapper">
            <div id="login" class="animate form">
                <section class="login_content">
                    <form method="post" action="login.php">
                        <h1>Secure Login</h1>
                        <div>
                            <input type="text" class="form-control col-md-7 col-xs-12" placeholder="username" name="un" required="" />
                        </div>
                        <div>
                            <input type="password" class="form-control col-md-7 col-xs-12" placeholder="Password" name="pw" required="" />
                        </div>
                        <div>
							<input type="submit" class="btn btn-default submit" value="Login">
                                                  </div>
                        <div class="clearfix"></div>
                        <div class="separator">

                            
                            <div class="clearfix"></div>
                            <br />
                            <div>
                                <h1><i class="fa fa-bullseye" style="font-size: 20px;"></i>DDCL Company | Finance<sub>(Admin)</sub> </h1>

                                <p>©<?php echo date("Y"); ?> All Rights Reserved.</p>
                            </div>
                        </div>
                    </form>
                    <!-- form -->
                </section>
                <!-- content -->
            </div>
        </div>
    </div>

</body>

</html>