<div class="autoriz">
	<form action="" method="post">
<table width="500" border="0" align="center">
  <tr>
    <td colspan="2"><input name="log_email" type="text" size="23" placeholder="E-mail" maxlength="35" class="lg"/></td>
  
    <td colspan="2"><input name="pass" type="password" size="23" placeholder="Пароль" maxlength="45" class="ps"/></td>
  
    <td align="center" valign="top"><input type="submit" value="Войти" class="btn_in"/></form></td>

<td align="center" valign="top">
<div class="btn_p" id="join_pop" style="
    width: 40px;
    height: 33px;
    
    cursor: pointer;
"onclick="location.href='#join_form';
">+</div>

</td>

    <td align="center" valign="top">
<div class="btn_p" id="login2_pop" style="
    width: 40px;
    height: 33px;
    
    cursor: pointer;
"onclick="location.href='#login2_form';
">?</div>

</td>
  </tr>
  
</table>

</div>
<?PHP

	if(isset($_POST["log_email"])){
	
	$lmail = $func->IsMail($_POST["log_email"]);
	
		if($lmail !== false){
		
			$db->Query("SELECT id, user, pass, referer_id, banned FROM db_users_a WHERE email = '$lmail'");
			if($db->NumRows() == 1){
			
			$log_data = $db->FetchArray();
			
				if(strtolower($log_data["pass"]) == strtolower($_POST["pass"])){
				
					if($log_data["banned"] == 0){
						
						# Считаем рефералов
						$db->Query("SELECT COUNT(*) FROM db_users_a WHERE referer_id = '".$log_data["id"]."'");
						$refs = $db->FetchRow();
						
						$db->Query("UPDATE db_users_a SET referals = '$refs', date_login = '".time()."', ip = INET_ATON('".$func->UserIP."') WHERE id = '".$log_data["id"]."'");
						
						$_SESSION["user_id"] = $log_data["id"];
						$_SESSION["user"] = $log_data["user"];
						$_SESSION["referer_id"] = $log_data["referer_id"];
						Header("Location: /account");
						
					}else echo "<div class='list1'><font color = 'red'><b>Аккаунт заблокирован</b></font><BR /></div>";
				
				}else echo "<div class='list1'><font color = 'red'><b>Email и/или Пароль указан неверно</b></font><BR /></div>";
			
			}else echo "<div class='list1'><font color = 'red'><b>Указанный Email не зарегистрирован в системе</b></font><BR /></div>";
			
		}else echo "<div class='list1'><font color = 'red'><b>Email указан неверно</b></font><BR /></div>";
	
	}

?>

<!-- popup form #2 -->
<a href="#x" class="overlay" id="join_form"></a>
<div class="popup">


<center>
<div class="h-title1">Регистрация нового игрока!</div></center>
<?PHP
	
	# Регистрация

	if(isset($_POST["login"])){

	$login = $func->IsLogin($_POST["login"]);
	$pass = $func->IsPassword($_POST["pass"]);
	$rules = isset($_POST["rules"]) ? true : false;
	$time = time();
	$ip = $func->UserIP;
	
	$email = $func->IsMail($_POST["email"]);
	$referer_id = (isset($_COOKIE["i"]) AND intval($_COOKIE["i"]) > 0 AND intval($_COOKIE["i"]) < 1000000) ? intval($_COOKIE["i"]) : 1;
	$referer_name = "";
	if($referer_id != 1){
		$db->Query("SELECT user FROM db_users_a WHERE id = '$referer_id' LIMIT 1");
		if($db->NumRows() > 0){$referer_name = $db->FetchRow();}
		else{ $referer_id = 1; $referer_name = "Admin"; }
	}else{ $referer_id = 1; $referer_name = "Admin"; }
	
		if($rules){

			if($email !== false){
		
			if($login !== false){
			
				if($pass !== false){
			
					if($pass == $_POST["repass"]){
						
						$db->Query("SELECT COUNT(*) FROM db_users_a WHERE user = '$login'");
						if($db->FetchRow() == 0){
						
						# Регаем пользователя
						$db->Query("INSERT INTO db_users_a (user, email, pass, referer, referer_id, date_reg, ip) 
						VALUES ('$login','{$email}','$pass','$referer_name','$referer_id','$time',INET_ATON('$ip'))");
						
						$lid = $db->LastInsert();
						
						$db->Query("INSERT INTO db_users_b (id, user, money_b, last_sbor) VALUES ('$lid','$login','5000', '".time()."')");
						
						# Вставляем статистику
						$db->Query("UPDATE db_stats SET all_users = all_users +1 WHERE id = '1'");
						
						echo "<div class='h-title2'><font color = 'white'>Вы успешно зарегистрировались.<br> Используйте форму слева для входа в аккаунт</font><BR /></div>";
						?>
						</div>
						<div class="clr"></div>	
						<?PHP
						return;
						}else echo "<div class='h-title2'><b><font color = 'red'>Указанный логин уже используется</font></b><BR /></div>";
						
					}else echo "<div class='h-title2'><b><font color = 'red'>Пароль и повтор пароля не совпадают</font></b><BR /></div>";
			
				}else echo "<div class='h-title2'><b><font color = 'red'>Пароль заполнен неверно</font></b><BR /></div>";
			
			}else echo "<div class='h-title2'><b><font color = 'red'>Логин заполнен неверно</font></b><BR /></div>";

		}else echo "<div class='h-title2'><b><font color = 'red'><b>Email имеет неверный формат</font></b><BR /></div>";

		}else echo "<div class='h-title2'><b><font color = 'red'>Вы не подтвердили правила</font></b><BR /></div>";

	}
	
	
?>
<center>

<BR /><BR />
<form action="" method="post">
<table width="188" border="0" cellspacing="0" cellpadding="0">
  


<tr>
    
    <td align="center" style="padding:3px;"><input name="login" type="text" placeholder="Пользователь (4-10 символов)" size="25" maxlength="10" class="lg" value=""/></td>
 
    </tr>

  
    
    <td align="center" style="padding:3px;"><input name="pass" placeholder="Пароль (6-20 символов)" class="lg" type="password" size="25" maxlength="20" /></td>
  </tr>
  
  <tr>
    <td align="center" style="padding:3px;"><input name="repass" placeholder="Подтвердить пароль" type="password" size="25" class="lg" maxlength="20" /></td>
  </tr>
	
		  <tr>

    <td align="center" style="padding:3px;"><input name="email" type="text"  placeholder="E-mail" size="25" class="lg" maxlength="50" /></td>
  </tr>
  <tr>
    
  
  
  <tr>
    <td colspan="2" align="center" style="margin-top: -3px;"><font color = 'white'><b>
	<a href="/rules" target="_blank" class="stn"><font color = '#00FF00'>Правила</font></a> принимаю: </b></font><input name="rules" type="checkbox" /></td>
  </tr>
  
  <tr>
    <td colspan="2" align="center" style="padding:3px;"><input name="registr" type="submit" value="Играть" style="height: 35px; width: 120px; border: 0; margin-top: 10px;" class="btn_reg"></td>
  </tr>
</table>

</form></center>




	

 <a class="close" href="#close"></a>
</div>
<div class="clr"></div>










<!-- popup form #3 -->
<a href="#x" class="overlay" id="login2_form"></a>
<div class="popup">


<center>
<div class="h-title1">Восстановление доступа!</div></center>
<?PHP

	if(isset($_POST["email"])){
		
		$email = $func->IsMail($_POST["email"]);
		$time = time();
		$tdel = $time + 60*15;
		
			if($email !== false){
				
				$db->Query("DELETE FROM db_recovery WHERE date_del < '$time'");
				$db->Query("SELECT COUNT(*) FROM db_recovery WHERE ip = INET_ATON('".$func->UserIP."') OR email = '$email'");
				if($db->FetchRow() == 0){
				
					$db->Query("SELECT id, user, email, pass FROM db_users_a WHERE email = '$email'");
					if($db->NumRows() == 1){
					$db_q = $db->FetchArray();
					
					# Вносим запись в БД
					$db->Query("INSERT INTO db_recovery (email, ip, date_add, date_del) VALUES ('$email',INET_ATON('".$func->UserIP."'),'$time','$tdel')");
					
					# Отправляем пароль
					$sender = new isender;
					$sender -> RecoveryPassword($db_q["email"], $db_q["pass"], $db_q["email"]);
					
					echo "<div class='h-title3'><font color = 'blue'><b>Данные для входа отправлены на Email</font></b><BR /></div>";
					?>
					</div>
					<div class="clr"></div>	
					<?PHP
					return; 
					
					}else echo "<div class='h-title3'><b><font color = 'red'><b>Пользователь с таким Email не зарегистрирован</font></b><BR /></div>";
				
				}else echo "<div class='h-title3'><b><font color = 'red'><b>Попробуйте немного позже</font></b><BR /></div>";
				
			}else echo "<div class='h-title3'><b><font color = 'red'><b>Email указан неверно</font></b><BR /></div>";
	
	}

?>
<center>
<BR />
<form action="" method="post"><BR />
<table width="188" border="0" cellspacing="0" cellpadding="0">
  <tr>
    
    <td align="left" width="250"><input name="email" type="text" placeholder="Email для отправки пароля" size="25" maxlength="50" style="height: 40px; margin-top:30px;" value=""/></td>
  </tr>
  <tr>
    
    <td colspan="2" align="center"><BR /><input type="submit"  value="Восстановить" style="height: 40px; margin-top:-10px; " class="btn_reg"></td>
  </tr>
</table>
</form>



    <a class="close" href="#close"></a>
</div>
<div class="clr"></div>