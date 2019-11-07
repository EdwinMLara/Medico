<?php

// define('LBROOT',getcwd()); // LegoBox Root ... the server root
// include("core/controller/Database.php");

if(Session::getUID()=="") {
$user = $_POST['mail'];
$pass = $_POST["password"];

$base = new Database();
$con = $base->connect();
$sql = "SELECT * FROM usuarios WHERE (username = '".$user."' or email = '".$user."') and is_active = 1";
//print $sql;
$query = $con->query($sql);
$found = false;
$userid = null;
$is_inventario = 0;

while($r = $query->fetch_array()){
	if (password_verify($pass, $r['password'])){
		$found = true;
		$userid = $r['id'];
		$is_inventario = $r['is_inventario'];
	}
}

if($is_inventario == 1){
	require_once("farmacia_sistem/config/db.php");
	require_once("farmacia_sistem/classes/Login.php");
	
	$login = new Login($user,$pass);
	$aux_login = $login->isUserLoggedIn();
	echo "<script>alert('$pass');</script>";

	if ( $aux_login == true) {
   		header("location: farmacia_sistem/facturas.php");
   		die();
	}
}

if($found==true) {
	//session_start();
//	print $userid;
	$_SESSION['user_id']=$userid ;
//	setcookie('userid',$userid);
//	print $_SESSION['userid'];
	print "Cargando ... $user";
	print "<script>window.location='index.php?view=home';</script>";
}else {
	//print "<script>window.location='index.php?view=login';</script>";
}

}else{
	print "<script>window.location='index.php?view=home';</script>";
	
}

?>