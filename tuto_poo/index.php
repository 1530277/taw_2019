<?php
	include_once('database.php');

	$clientes =  new Database();#Inicializa objeto con las funciones de la bd
	if(isset($_POST['login'])){
		#Trae los camppos con esos nombres dentro del formulario y los inicializa en variables php
		$username=$_REQUEST['username'];
		$password=$_REQUEST['password'];
		$usuario=$clientes->valida_usuario($username,$password);#Función que retorna una consulta de una fila que coincida con los datos recibidos como parámetro
		if(!empty($usuario)){#Valida que la variable contenga algo, de ser así asigna una sesión con el nombre del usuario para validar que si existe dentro de la bd
			session_start();
			$_SESSION['usuario']=$username;
			header("Location:dtable.php");
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Home</title>
	<link rel="stylesheet" href="assets/styles/style.min.css">
	<!-- Waves Effect -->
	<link rel="stylesheet" href="assets/plugin/waves/waves.min.css">
</head>

<body>

<div id="single-wrapper">
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="frm-single">
		<div class="inside">
			<div class="title"><strong>Ninja</strong>Admin</div>
			<!-- /.title -->
			<div class="frm-title">Login</div>
			<!-- /.frm-title -->
			<div class="frm-input"><input required name="username" type="text" placeholder="Username" class="frm-inp"><i class="fa fa-user frm-ico"></i></div>
			<!-- /.frm-input -->
			<div class="frm-input"><input required name="password" type="password" placeholder="Password" class="frm-inp"><i class="fa fa-lock frm-ico"></i></div>
			<!-- /.frm-input -->
			<div class="clearfix margin-bottom-20">
				<div class="pull-left">
					<div class="checkbox primary"><input type="checkbox" id="rememberme"><label for="rememberme">Remember me</label></div>
					<!-- /.checkbox -->
				</div>
				<!-- /.pull-left -->
				<div class="pull-right"><a href="#" class="a-link"><i class="fa fa-unlock-alt"></i>Forgot password?</a></div>
				<!-- /.pull-right -->
			</div>
			<!-- /.clearfix -->
			<button type="submit" name="login" class="frm-submit">Login<i class="fa fa-arrow-circle-right"></i></button>
			<div class="frm-footer">NinjaAdmin © 2016.</div>
			<!-- /.footer -->
		</div>
		<!-- .inside -->
	</form>
	<!-- /.frm-single -->
</div><!--/#single-wrapper -->

	<script src="assets/scripts/jquery.min.js"></script>
	<script src="assets/scripts/modernizr.min.js"></script>
	<script src="assets/plugin/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/plugin/nprogress/nprogress.js"></script>
	<script src="assets/plugin/waves/waves.min.js"></script>

	<script src="assets/scripts/main.min.js"></script>
</body>
</html>