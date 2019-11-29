<?php
	if(Session::getUID()=="") {
		$user = $_POST['mail'];
		$pass = $_POST["password"];

		$base = new Database();
		$con = $base->connect();
		$sql = "SELECT * FROM usuarios WHERE (username = '".$user."' or email = '".$user."') and is_active = 1";
		
		$query = $con->query($sql);
		$found = false;
		$userid = null;
		$is_inventario = 0;

		while($r = $query->fetch_array()){
			if (password_verify($pass, $r['password'])){
				$found = true;
				$userid = $r['id'];
				$is_inventario = $r['is_inventario'];
				$medic_id = $r["medic_id"];
			}
		}

		if($is_inventario == 1){
			require_once("farmacia_sistem/config/db.php");
			require_once("farmacia_sistem/classes/Login.php");
			
			$login = new Login($user,$pass);
			$aux_login = $login->isUserLoggedIn();

			if ( $aux_login == true) {
				print "<script>window.location='/farmacia_sistem/facturas.php';</script>";
			}
		}

		if($found==true){
			$_SESSION['user_id']=$userid;
			$_SESSION['medic_id']=$medic_id;
			print "Cargando ... $user";
			print "<script>window.location='index.php?view=home';</script>";
		}else{
			print "<script>window.location='index.php?view=login';</script>";
		}
	}else{
		print "<script>window.location='index.php?view=login';</script>";
	}

?>