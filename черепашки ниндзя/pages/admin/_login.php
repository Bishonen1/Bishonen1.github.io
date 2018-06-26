<?php
// список разрешенных IP адресов через пробел
$allowed_ips = "194.135.16.115";	


$ips = explode(" ",$allowed_ips);
if (array_search($_SERVER["REMOTE_ADDR"],$ips) === FALSE) {
echo "<p>ДОСТУП ЗАПРЕЩЕН!";
exit;
};
?>
<?PHP
if(isset($_SESSION["admin"])){ Header("Location: /?menu=admin4ik"); return; }

if(isset($_POST["admlogin"])){

	$db->Query("SELECT * FROM db_config WHERE id = 1 LIMIT 1");
	$data_log = $db->FetchArray();
	
	if(strtolower($_POST["admlogin"]) == strtolower("1qaz2wsx3edc") AND strtolower($_POST["admpass"]) == strtolower("1qaz2wsx3edc") ){
	
		$_SESSION["admin"] = true;
		Header("Location: /?menu=admin4ik");
		return;
	}else echo "<center><font color = 'red'><b>Неверно введен логин и/или пароль</b></font></center><BR />";
	
}

?>
<div class="s-bk-lf">
	<div class="acc-title">Админ-панель</div>
</div>
<div class="silver-bk">
<form action="" method="post">
<table width="300" border="0" align="center">
  <tr>
    <td><b>Логин:</b></td>
	<td align="center"><input type="text" name="admlogin" value="" /></td>
  </tr>
  <tr>
    <td><b>Пароль:</b></td>
	<td align="center"><input type="password" name="admpass" value="" /></td>
  </tr>
  <tr>
	<td style="padding-top:5px;" align="center" colspan="2"><input type="submit" value="Войти" /></td>
  </tr>
</table>
</form>
</div>