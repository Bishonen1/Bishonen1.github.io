<div class="s-bk-lf">
	<div class="acc-title">Покупка персонажей</div>
</div>
<div class="silver-bk">
	В этом разделе вы можете купить понравившегося Вам персонажа. Сразу после оплаты, Вам будут доступны купленные Вами персонажи. После покупки персонажей, они начнут приносить вам доход (от 30% до 80% в месяц). <br><br>

<center><br><b>
<span style="color: #FF6600; font-family: cyrillichover; font-size: 15pt;text-shadow: #000 0 1px 1px;"><strong>Персонажи - ЧЕРЕПАШКИ НИНДЗЯ! </strong></span></center></b>
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
$_OPTIMIZATION["title"] = "Покупка персонажей";
$usid = $_SESSION["user_id"];
$refid = $_SESSION["referer_id"];
$usname = $_SESSION["user"];

$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
$user_data = $db->FetchArray();

$db->Query("SELECT * FROM db_config WHERE id = '1' LIMIT 1");
$sonfig_site = $db->FetchArray();

# Покупка нового персонажа
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
				# Добавляем персонаж и списываем деньги
				$db->Query("UPDATE db_users_b SET money_b = money_b - $need_money, $citem = $citem + 1,
				last_sbor = IF(last_sbor > 0, last_sbor, '".time()."') WHERE id = '$usid'");

				# Вносим запись о покупке
				$db->Query("INSERT INTO db_stats_btree (user_id, user, tree_name, amount, date_add, date_del)
				VALUES ('$usid','$usname','".$array_name[$item]."','$need_money','".time()."','".(time()+60*60*24*15)."')");

				echo "<center><font color = 'green'><b>Вы успешно купили персонажа</b></font></center><BR />";

				$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
				$user_data = $db->FetchArray();

			}else echo "<center><font color = 'red'><b>Перед тем как докупить персонаж следует собрать победы!</b></font></center><BR />";

		}else echo "<center><font color = 'red'><b>Недостаточно серебра для покупки</b></font></center><BR />";

	}else echo 222;

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

<div class="fr-te-gr"><b>Цена:</b> <font color="#000000"><?=$sonfig_site["amount_a_t"]; ?> <img src="/img/fruit/serebro.png" width="15" height="15"></font></div>
		
<div class="fr-te-gr"><b>Прибыль: </b><font color="#000000"><?=$sonfig_site["a_in_h"]; ?> <img src="/img/fruit/egg.png" width="15"> в час</font></div>

		<div class="fr-te-gr"><b>Куплено: </b><font color="#000000"> <?=$user_data["a_t"]; ?> <img src="/img/fruit/bober.png" width="17" height="17"></font></div><form action="" method="post">
		<input type="hidden" name="item" value="1" />
		<input type="submit" value="Купить" style="height: 30px; margin-top:10px;" class="btn_8" />	</div>
	</form>
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

<div class="fr-te-gr"><b>Цена:</b> <font color="#000000"><?=$sonfig_site["amount_b_t"]; ?> <img src="/img/fruit/serebro.png" width="15" height="15"></font></div>

		<div class="fr-te-gr"><b>Прибыль: </b><font color="#000000"><?=$sonfig_site["b_in_h"]; ?> <img src="/img/fruit/egg.png" width="15"> в час</font></div>
		

		<div class="fr-te-gr"><b>Куплено:</b><font color="#000000"> <?=$user_data["b_t"]; ?> <img src="/img/fruit/kot.png" width="17" height="17"></font></div><form action="" method="post">
		<input type="hidden" name="item" value="2" />
		<input type="submit" value="Купить" style="height: 30px; margin-top:10px;"class="btn_8">	</div>
	</form>
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
		
		<div class="fr-te-gr"><b>Цена:</b> <font color="#000000"><?=$sonfig_site["amount_c_t"]; ?> <img src="/img/fruit/serebro.png" width="15" height="15"></font></div>

<div class="fr-te-gr"><b>Прибыль: </b><font color="#000000"><?=$sonfig_site["c_in_h"]; ?> <img src="/img/fruit/egg.png" width="15"> в час</font></div>

		<div class="fr-te-gr"><b>Куплено:</b><font color="#000000"> <?=$user_data["c_t"]; ?> <img src="/img/fruit/begemot.png" width="17" height="17"></font></div><form action="" method="post">
		<input type="hidden" name="item" value="3" />
		<input type="submit" value="Купить" style="height: 30px; margin-top:10px;"class="btn_8">	</div>
	</form>
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
		
		<div class="fr-te-gr"><b>Цена:</b> <font color="#000000"><?=$sonfig_site["amount_d_t"]; ?> <img src="/img/fruit/serebro.png" width="15" height="15"></font></div>

<div class="fr-te-gr"><b>Прибыль: </b><font color="#000000"><?=$sonfig_site["d_in_h"]; ?> <img src="/img/fruit/egg.png" width="15"> в час</font></div>

		<div class="fr-te-gr"><b>Куплено:</b><font color="#000000"> <?=$user_data["d_t"]; ?> <img src="/img/fruit/zajac.png" width="17" height="17"></font></div><form action="" method="post">
		<input type="hidden" name="item" value="4" />
		<input type="submit" value="Купить" style="height: 30px; margin-top:10px;"class="btn_8">	</div>
	</form>
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

<div class="fr-te-gr"><b>Цена:</b> <font color="#000000"><?=$sonfig_site["amount_e_t"]; ?> <img src="/img/fruit/serebro.png" width="15" height="15"></font></div>

<div class="fr-te-gr"><b>Прибыль: </b><font color="#000000"><?=$sonfig_site["e_in_h"]; ?> <img src="/img/fruit/egg.png" width="15"> в час</font></div>
		<div class="fr-te-gr"><b>Куплено: </b><font color="#000000"> <?=$user_data["e_t"]; ?> <img src="/img/fruit/volk.png" width="17" height="17"></font></div><form action="" method="post">
 <input type="hidden" name="item" value="5" />
		<input type="submit" value="Купить" style="height: 30px; margin-top:10px;"class="btn_8">	</div>
	</form>
</center>
<!--</div>-->


</td>
<!----><!---->

</tr>
</table>
 </div>




</div>
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
						