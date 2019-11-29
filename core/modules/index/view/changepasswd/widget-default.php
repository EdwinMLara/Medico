<?php
	if(count($_POST)>0){
		$user_id = $_POST["user_id"];
		$newpassword = password_hash($_POST["newpassword"],PASSWORD_DEFAULT);

		$user = UserData::getByid($user_id);

		if (password_verify($_POST['password'],$user->password)){
			$user->password = $newpassword;
			$user->update();
			print "<script>
				alert('se actualizo su contraseña');
				window.location='index.php?view=home';
			</script>";

		}else{
			echo "<script> 
				alert('su contraseña actual es incorrecta');
				window.location='index.php?view=configuration';
			</script>";
		}

	}
?>