<div class="s-bk-lf">
	<div class="acc-title">Сбор и продажа</div>
</div>
<div class="silver-bk">
В этом разделе вы можете собрать и продать все накопленные победы. 
<br>Под кнопками "Собрать" и "Продать" Вы увидите курс и статистику накопленных побед. <br><br>
<?PHP
$_OPTIMIZATION["title"] = "Сбор и продажа";
$usid = $_SESSION["user_id"];

$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
$user_data = $db->FetchArray();

$db->Query("SELECT * FROM db_config WHERE id = '1' LIMIT 1");
$sonfig_site = $db->FetchArray();

	if(isset($_POST["sbor"])){

		if($user_data["last_sbor"] < (time() - 600) ){

			$tomat_s = $func->SumCalc($sonfig_site["a_in_h"], $user_data["a_t"], $user_data["last_sbor"]);
			$straw_s = $func->SumCalc($sonfig_site["b_in_h"], $user_data["b_t"], $user_data["last_sbor"]);
			$pump_s = $func->SumCalc($sonfig_site["c_in_h"], $user_data["c_t"], $user_data["last_sbor"]);
			$peas_s = $func->SumCalc($sonfig_site["d_in_h"], $user_data["d_t"], $user_data["last_sbor"]);
			$pean_s = $func->SumCalc($sonfig_site["e_in_h"], $user_data["e_t"], $user_data["last_sbor"]);

			$db->Query("UPDATE db_users_b SET
			a_b = a_b + '$tomat_s',
			b_b = b_b + '$straw_s',
			c_b = c_b + '$pump_s',
			d_b = d_b + '$peas_s',
			e_b = e_b + '$pean_s',
			all_time_a = all_time_a + '$tomat_s',
			all_time_b = all_time_b + '$straw_s',
			all_time_c = all_time_c + '$pump_s',
			all_time_d = all_time_d + '$peas_s',
			all_time_e = all_time_e + '$pean_s',
			last_sbor = '".time()."'
			WHERE id = '$usid' LIMIT 1");

			echo "<center><font color = 'green'><b>Вы собрали все яйца</b></font></center><BR />";

			$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
			$user_data = $db->FetchArray();

		}else echo "<center><font color = 'red'><b>Победы можно собирать не чаще 1го раза за 10 минут</b></font></center><BR />";

	}



?>
<center><br><b>
<span style="color: #FF6600; font-family: cyrillichover; font-size: 15pt;text-shadow: #000 0 1px 1px;"><strong>Доход Ваших персонажей </strong></span></center></b>
<br>

<script type="text/javascript" src="https://yourjavascript.com/21139232152/bxslider.min.js"></script>
<script type="text/javascript" src="https://yourjavascript.com/11225442391/common.js"></script>
<script type="text/javascript">
  jQuery(document).ready(function(){
    jQuery('#slider1').bxSlider({
  auto: true,           // true, false - автоматическая смена слайдов
  speed: 1000,      // целое число - в милисекундах, скорость смены слайдов
 pause: 55000,  // целое число - в милисекундах, период между сменами слайдов
    });
  });
</script>
<?PHP
$_OPTIMIZATION["title"] = "Сбор и продажа";
$usid = $_SESSION["user_id"];
$refid = $_SESSION["referer_id"];
$usname = $_SESSION["user"];

$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
$user_data = $db->FetchArray();

$db->Query("SELECT * FROM db_config WHERE id = '1' LIMIT 1");
$sonfig_site = $db->FetchArray();

# Покупка нового дерева
if(isset($_POST["item"])){

$array_items = array(1 => "a_t", 2 => "b_t", 3 => "c_t", 4 => "d_t", 5 => "e_t");
$array_name = array(1 => "Бобер", 2 => "Кот", 3 => "Бегемот", 4 => "Заяц", 5 => "Волк");
$item = intval($_POST["item"]);
$citem = $array_items[$item];

	if(strlen($citem) >= 3){

		# Проверяем средства пользователя
		$need_money = $sonfig_site["amount_".$citem];
		if($need_money <= $user_data["money_b"]){

			if($user_data["last_sbor"] == 0 OR $user_data["last_sbor"] > ( time() - 60*20) ){

				$to_referer = $need_money * 0.1;
				# Добавляем дерево и списываем деньги
				$db->Query("UPDATE db_users_b SET money_b = money_b - $need_money, $citem = $citem + 1,
				last_sbor = IF(last_sbor > 0, last_sbor, '".time()."') WHERE id = '$usid'");

				# Вносим запись о покупке
				$db->Query("INSERT INTO db_stats_btree (user_id, user, tree_name, amount, date_add, date_del)
				VALUES ('$usid','$usname','".$array_name[$item]."','$need_money','".time()."','".(time()+60*60*24*15)."')");

				echo "<center><font color = 'green'><b>Вы успешно купили персонаж</b></font></center><BR />";

				$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
				$user_data = $db->FetchArray();

			}else echo "<center><font color = 'red'><b>Перед тем как докупить персонаж следует собрать победы!</b></font></center><BR />";

		}else echo "<center><font color = 'red'><b>Недостаточно серебра для покупки</b></font></center><BR />";

	}else echo 222;

}

?>
<?PHP
# Продажа
if(isset($_POST["sell"])){

$all_items = $user_data["a_b"] + $user_data["b_b"] + $user_data["c_b"] + $user_data["d_b"] + $user_data["e_b"];

	if($all_items > 0){
	
		$money_add = $func->SellItems($all_items, $sonfig_site["items_per_coin"]);
		
		$tomat_b = $user_data["a_b"];
		$straw_b = $user_data["b_b"];
		$pump_b = $user_data["c_b"];
		$pean_b = $user_data["d_b"];
		$peas_b = $user_data["e_b"];
		
		$money_b = ( (100 - $sonfig_site["percent_sell"]) / 100) * $money_add;
		$money_p = ( ($sonfig_site["percent_sell"]) / 100) * $money_add;
		
		# Обновляем юзверя
		$db->Query("UPDATE db_users_b SET money_b = money_b + '$money_b', money_p = money_p + '$money_p', a_b = 0, b_b = 0, c_b = 0, d_b = 0, e_b = 0 
		WHERE id = '$usid'");
		
		$da = time();
		$dd = $da + 60*60*24*15;
		
		# Вставляем запись в статистику
		$db->Query("INSERT INTO db_sell_items (user, user_id, a_s, b_s, c_s, d_s, e_s, amount, all_sell, date_add, date_del) VALUES 
		('$usname','$usid','$tomat_b','$straw_b','$pump_b','$pean_b','$peas_b','$money_add','$all_items','$da','$dd')");
		
		echo "<center><font color = 'green'><b>Вы продали {$all_items} яиц, на сумму {$money_add} серебра</b></font></center><BR />";
		
		$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
		$user_data = $db->FetchArray();
		
	}else echo "<center><font color = 'red'><b>Вам нечего продавать!</b></font></center><BR />";

}
?>
<div id="slider_cont">
<div id="slider1">

<div>

<!----><!---->
<center>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<!----><!---->
<td align="center">
<div class="fr-block3">
<div class="fr-te-gr-title"> <font color="#000000"; ><b>1) Микеланджело</b></font></div>
<div colspan="3"><img src="/img/fruit/bober.png" name="slide_show"></div>

<!--<div id="example3" style=" display: none; ">-->
<center>

<div class="fr-te-gr"><b>Микеланджело:</b> <font color="#000000"><?=$user_data["a_t"]; ?> шт</font></div>
		
<div class="fr-te-gr"><b>Для сбора: </b><font color="#000000"><?=$func->SumCalc($sonfig_site["a_in_h"], $user_data["a_t"], $user_data["last_sbor"]);?> </font></div>

		<div class="fr-te-gr"><b>Для продажи: </b><font color="#000000"> <?=$func->SellItems($user_data["a_b"], $sonfig_site["items_per_coin"]); ?> </font></div>
</center>
<!--</div>-->


</td>
<!----><!---->

<!----><!---->
<td align="center">
<div class="fr-block3">
<div class="fr-te-gr-title"><font color="#000000"><b>2) Рафаэль</b></font></div>

<div colspan="3"><img src="/img/fruit/kot.png" name="slide_show2"></div>

<!--<div id="example4" style=" display: none; ">-->
<center>

<div class="fr-te-gr"><b>Рафаэль:</b> <font color="#000000"><?=$user_data["b_t"]; ?> шт</font></div>

		<div class="fr-te-gr"><b>Для сбора: </b><font color="#000000"><?=$func->SumCalc($sonfig_site["b_in_h"], $user_data["b_t"], $user_data["last_sbor"]);?> </font></div>
		

		<div class="fr-te-gr"><b>Для продажи:</b><font color="#000000"> <?=$func->SellItems($user_data["b_b"], $sonfig_site["items_per_coin"]); ?> </font></div>	</div>

</center>
<!--</div>-->

</td>
<!----><!---->


<!----><!---->
<td align="center">
<div class="fr-block3">
<div class="fr-te-gr-title"><font color="#000000"><b>3) Леонардо</b></font></div>
<div colspan="3"><img src="/img/fruit/begemot.png" name="slide_show2"></div>

<!--<div id="example4" style=" display: none; ">-->
<center>
		
		<div class="fr-te-gr"><b>Леонардо:</b> <font color="#000000"><?=$user_data["c_t"]; ?> шт</font></div>

<div class="fr-te-gr"><b>Для сбора: </b><font color="#000000"><?=$func->SumCalc($sonfig_site["c_in_h"], $user_data["c_t"], $user_data["last_sbor"]);?> </font></div>

		<div class="fr-te-gr"><b>Для продажи:</b><font color="#000000"> <?=$func->SellItems($user_data["c_b"], $sonfig_site["items_per_coin"]); ?> </font></div>	</div>

</center>
<!--</div>-->

</td>
<!----><!---->


<!----><!---->
<td align="center">
<div class="fr-block3">
<div class="fr-te-gr-title"><font color="#000000"><b>4) Донателло</b></font></div>
<div colspan="3"><img src="/img/fruit/zajac.png" name="slide_show2"></div>

<!--<div id="example4" style=" display: none; ">-->
<center>
		
		<div class="fr-te-gr"><b>Донателло:</b> <font color="#000000"><?=$user_data["d_t"]; ?> шт</font></div>

<div class="fr-te-gr"><b>Для сбора: </b><font color="#000000"><?=$func->SumCalc($sonfig_site["d_in_h"], $user_data["d_t"], $user_data["last_sbor"]);?> </font></div>

		<div class="fr-te-gr"><b>Для продажи:</b><font color="#000000"> <?=$func->SellItems($user_data["d_b"], $sonfig_site["items_per_coin"]); ?> </font></div>	</div>

</center>
<!--</div>-->


</td>
<!----><!----> 
</tr>
</table>
 </div>




<div>

<!----><!---->
<center>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<!----><!---->
<td align="center">
<div class="fr-block3">
<div class="fr-te-gr-title"> <font color="#000000"; ><b>5) Сплинтер</b></font></div>
<div colspan="3"><img src="/img/fruit/volk.png" name="slide_show"></div>

<!--<div id="example3" style=" display: none; ">-->
<center>

<div class="fr-te-gr"><b>Сплинтер:</b> <font color="#000000"><?=$user_data["e_t"]; ?> шт</font></div>

<div class="fr-te-gr"><b>Для сбора: </b><font color="#000000"><?=$func->SumCalc($sonfig_site["e_in_h"], $user_data["e_t"], $user_data["last_sbor"]);?> </font></div>
		<div class="fr-te-gr"><b>Для продажи: </b><font color="#000000"> <?=$func->SellItems($user_data["e_b"], $sonfig_site["items_per_coin"]); ?> </font></div>	</div>

</center>
<!--</div>-->


</td>
<!----><!---->

</tr>
</table>
 </div>




</div>

<center>
<table><tr><td>
<form action="" method="post">
		<input type="hidden" name="sbor" value="1" />
		<input type="submit" value="Собрать все" style="height: 30px; margin-top:10px;" class="btn_8" />	
	</form>
	</td><td>
	<form action="" method="post">
		<input type="hidden" name="sell" value="1" />
		<input type="submit" value="Продать все" style="height: 30px; margin-top:10px;" class="btn_8" />	
	</form></td></tr></table></center>
	
	
	Вырученное с продажи серебро распределяется между двумя счетами (счет для покупок и счет 
для вывода) в пропорциях: <?=100-$sonfig_site["percent_sell"]; ?>% на счет для покупок и <?=$sonfig_site["percent_sell"]; ?>% на вывод.<br /><br />
<b>Курс продажи побед: <font color="#ffffff"><?=$sonfig_site["items_per_coin"]; ?> яиц = 1 серебро.</font></b>
<p>
<b>Накоплено для сбора: <font color="#ffffff"><?=$func->SumCalc($sonfig_site["a_in_h"], $user_data["a_t"], $user_data["last_sbor"])+$func->SumCalc($sonfig_site["b_in_h"], $user_data["b_t"], $user_data["last_sbor"])+$func->SumCalc($sonfig_site["c_in_h"], $user_data["c_t"], $user_data["last_sbor"])+$func->SumCalc($sonfig_site["d_in_h"], $user_data["d_t"], $user_data["last_sbor"])+$func->SumCalc($sonfig_site["e_in_h"], $user_data["e_t"], $user_data["last_sbor"])?> побед</font></b>
<p>
<b>Накоплено для продажи: <font color="#ffffff"><?=$user_data

["a_b"]+$user_data["b_b"]+$user_data["c_b"]+$user_data["d_b"]+

$user_data["e_b"];?> побед</font></b>
</div><style>
/* оформление и размер блока */
#slider_cont {
    border: 0px solid #006699;
    margin: 0px;
    width: 900px!important;
    padding: 0px;
}

/* кнопка следующее изображение */
.bx-prev {
position:absolute;
top:39%;
left:-10px;
width:40px;
height:61px;;
text-indent:-999999px;
background:url(/img/prev.png) no-repeat  0 0px;
}

/* кнопка предыдущее изображение */
.bx-next {
position:absolute;
top:39%;
right:-10px;
width:40px;
height:61px;
text-indent:-999999px;
background:url(/img/next.png) no-repeat 0 0px;
}

/* для кнопок при наведении курсора */
.bx-next:hover {
background:url(/img/next1.png) no-repeat 0 0px;
border:0; 
}
/* для кнопок при наведении курсора */
.bx-prev:hover {
background:url(/img/prev1.png) no-repeat  0 0px;
border:0;
}
</style>





<div class="clr"></div>
</div>



<div class="clr"></div>


							<div class="clr"></div>