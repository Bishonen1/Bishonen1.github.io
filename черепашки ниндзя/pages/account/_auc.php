<?
$_OPTIMIZATION["title"] = "Аукцион";
$usid = $_SESSION["user_id"];
$refid = $_SESSION["referer_id"];
$usname = $_SESSION["user"];

$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
$user_data = $db->FetchArray();

$db->Query("SELECT * FROM db_config WHERE id = '1' LIMIT 1");
$sonfig_site = $db->FetchArray();


////* а тут мы проверяем время и делаем победителём игрока!
$db->Query("SELECT * FROM tb_aukcion_game ORDER BY id DESC LIMIT 1");

if($db->NumRows() > 0)
{
$winer = $db->FetchArray();

$time=date(time());

$wintime = date($winer["timers"]);

if($time > $wintime)
{

///* считаем общее количество бабок выиграных в аукционе!


$db->Query("SELECT sum(among) FROM tb_aukcion_game");
$dengi= $db->FetchRow();


$amongs = $dengi*1;





///* перекидуем победителя в статистику! 1. перекидуем 2.очищаем полностю табличку!

$db->Query("INSERT INTO tb_aukcion_game_stats (user,among,date) VALUES ('".$winer["user"]."','$amongs','".time()."')");

///* а тут мы передаём пользователю-победителю!!!!
$db->Query("UPDATE db_users_b SET money_b = money_b + '$amongs' WHERE user = '".$winer["user"]."'") or die(mysql_error());

///* полностю очищаем аукцион!
$db->Query("TRUNCATE TABLE tb_aukcion_game");

}

}
?>

<?

////* делается ставка!
if(isset($_POST["sum"]))
{
$sum_insert = round(floatval($_POST["sum"]),2);

///* приравнюем суму ставки к 0.01 числу ,если меньше - отказ в ставке
if($sum_insert >= 5.00)
{

////* тут мы запрещаем ставку меньшу чем сделал соперник
$db->Query("SELECT * FROM tb_aukcion_game ORDER BY id DESC LIMIT 1");
$kkk = $db->FetchArray();
$sum_sop = $kkk["among"];


///* тут мы добавляем 5 минут к общему времени!!!!

//////////* тут мы проверяем первая это ставка или нет!

if(($zzz) >= 0) { $timers = $kkk["timers"] +(6*6); }

if(($zzz) <= 0) { $timers = time() +(6*6*9); }

///////////* закончили проверять первую ставку!!!

if($sum_sop <= $sum_insert)
{

$user_balance = $user_data["money_b"];

///* приравнюем баланс к переменной!
if(floatval($user_balance) >= $sum_insert)
{

$insert_user = $_SESSION["user"];

$db->Query("INSERT INTO tb_aukcion_game (user, among, date , timers) VALUES ('$insert_user','$sum_insert','".time()."' , '$timers')");

///* после експорта данных , уменьшаем суму пользователя !!!!
if($db)
{

$db->Query("UPDATE db_users_b SET money_b = money_b - $sum_insert WHERE user = '".$_SESSION["user"]."'");

echo "<center><font color = 'green'>Ваша ставка принята</font></center><BR />";

?>
<script type="text/javascript">
				location.replace("/account/auc");
				</script>
				<noscript>
				<meta http-equiv="refresh" content="0; url=/account/auc">
				</noscript>
<?

}

else echo "<center><font color = 'red'>Недостаточно средств на балансе для ставки в {$sum_insert}.</font></center><BR />";


?>
<script type="text/javascript">
				location.replace("/account/auc");
				</script>
				<noscript>
				<meta http-equiv="refresh" content="0; url=/account/auc">
				</noscript>
<?

}

else echo "<center><font color = 'red'>Минимальная сумма ставки 0.01</font></center><BR />";


?>
<script type="text/javascript">
				location.replace("/account/auc");
				</script>
				<noscript>
				<meta http-equiv="refresh" content="0; url=/account/auc">
				</noscript>
<?

}


else echo "<center><font color = 'red'>Вы не можете сделать ставку меньшу чем сделал соперник!</font></center><BR />";


?>
<script type="text/javascript">
				location.replace("/account/auc");
				</script>
				<noscript>
				<meta http-equiv="refresh" content="0; url=/account/auc">
				</noscript>
<?

}

}

////* сделали ставку!

?>
<div class="s-bk-lf">
<div class="acc-title">Аукцион ставок</div>
</div>
<div class="silver-bk"><div class="clr"></div>

<center>
<form action="" method="post" style="margin:0; padding:0;">
<table width="350" align="center" border="0" cellpadding="0" cellspacing="0" >

<?

$db->Query("SELECT * FROM tb_aukcion_game ORDER BY id DESC LIMIT 1");

  	if($db->NumRows() > 0)
	{
	$lidermen = $db->FetchArray();


$db->Query("SELECT sum(among) FROM tb_aukcion_game");
$dengi= $db->FetchRow();


$crok1 = date(time());
$crok2 = date($lidermen["timers"] + (0));
$cr=date("H:i",$crok2);
$os = $crok2 - $crok1 - (3);
$ost= date("H:i:s",$os);


?>

<tr >
<td class="m-tb" align="center" colspan="2" style="padding:1px;">

<b><font size="+1" color="red">Лидер аукциона <font color="blue"><?=$lidermen["user"];?></font></b></font>
<br>
<b>
<b><font size="+1" color="red">Таймер обновляется каждые 20 секунд!<font color="blue"><?=$lidermen["user"];?></font></b></font>

<br>


Осталось до победы - <span style="color:red;"><?=$ost;?></span>

<br>
Может выиграть <font style="color:black;"><?=$dengi*1;?></font>
<br>
Сделал ставку в <font style="color:#aa66ff;"><?=$lidermen["among"];?></font>
</b>
</td>
</tr>
<br />

<?
}
?>

<tr bgcolor="#A9F5F2">
    <td align="center" colspan="2" style="padding:1px;"><b>Перебить ставку</b></td>
  </tr>
  <tr>
    <td class="m-tb" style="padding:1px;"><b>&nbsp;&nbsp;&nbsp;Сумма ставки:</b></td>
    <td class="m-tb" align="center" style="padding:1px;">
	<input type="text" name="sum" value="     <?=$lidermen["among"]+5;?>" size="10" style="border:2px solid #d0f0c0;"/></td>
  </tr>
  <tr>
    <td align="center" colspan="2" style="padding:1px;border-bottom:3px solid #f7f7f7;">
	<input type="submit" class="btn_9" value="Сделать ставку"  size="10"/></td>
  </tr>
</table>
</form>
</center>
<a href="javascript:window.location.reload()">Обновить страницу</a>

<meta http-equiv="refresh" content="20" /> 



<br>
<hr>
<br>

<table cellpadding='3' cellspacing='0' border='0' bordercolor='#336633' align='center' width="80%">
  <tr>
    <td colspan="5" align="center"><h4>Последние ставки</h4></td>
    </tr>
  <tr>
    <td align="center" class="m-tb">Пользователь</td>
    <td align="center" class="m-tb">Сумма</td>
	<td align="center" class="m-tb">Дата ставки</td>
  </tr>
<?
//////*тут мы ищем или сделаные отображаем ставки!

  $db->Query("SELECT * FROM tb_aukcion_game ORDER BY id DESC LIMIT 10");

 if($db->NumRows() > 0)
	{
	$games = $db->FetchArray();
do{

echo"
<tr class='htt'>
    		<td align='center'>  ".$games["user"]."  </td>
    		<td align='center'>   ".$games["among"]."  </td>
			<td align='center'>  ".date( "d-m-Y в H:i:s" ,$games["date"])."  </td>
 </tr>";

}while($games = $db->FetchArray());
}else{
?>

<tr class='htt'>
<td align='center'><b>Идущих игр нет</b></td>
</tr>
<?
}
?>
</table>
<br>
<table cellpadding='3' cellspacing='0' border='0' bordercolor='#336633' align='center' width="80%">
 <tr>
    <td colspan="5" align="center"><h4>Последние 10 игр</h4></td>
    </tr>
  <tr>
    <td align="center" class="m-tb">Пользователь</td>
    <td align="center" class="m-tb">Сумма выигрыша</td>
	<td align="center" class="m-tb">Дата</td>
  </tr>
<?
//////*тут мы ищем или сделаные отображаем ставки!

 $db->Query("SELECT * FROM tb_aukcion_game_stats ORDER BY id DESC LIMIT 10");
  	if($db->NumRows() > 0)
	{
	$games2 = $db->FetchArray();
do{
echo"
<tr class='htt'>
    		<td align='center'>  ".$games2["user"]."  </td>
    		<td align='center'>   ".$games2["among"]."  </td>
			<td align='center'>  ".date( "d-m-Y в H:i:s" ,$games2["date"])." </td>
 </tr>";

}while($games2 = $db->FetchArray());

}else{
?>

<tr class='htt'>
<td align='center'><b>На аукционе побед пока нет!</b></td>
</tr>
<?
}
?>
</table>
</div>
<div class="clr"></div>