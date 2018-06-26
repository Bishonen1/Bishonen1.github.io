<?PHP
$_OPTIMIZATION["title"] = "Серфинг";
$usid = $_SESSION["user_id"];
$uname = $_SESSION["user"];



?>
<div class="s-bk-lf">
	<div class="acc-title">Добавить сайт в серфинг</div>
</div>
<div class="silver-bk">
<div class="clr"></div>
	

<BR />

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

define('TIME', time());

define('SERF_PRICE', 5); //минимальная стоимость просмотра
define('SERF_PRICE_TIMER', 0.4); //стоимость таймера
define('SERF_PRICE_MOVE', 1); //стоимость последующего перехода на сайт
define('SERF_PRICE_HIGH', 1); //стоимость выделения ссылки

$msg = '';

$db->Query("SELECT * FROM db_users_b WHERE id = '".$_SESSION['user_id']."'");
$users_info = $db->FetchArray();
?>




<font style="color:#FF0000;"><b>Серфинг</b></font>  - прекрасное решение, чтобы повысить посещаемость своего сайта.<br>
Мы предлагаем Вам следующие преимущества:<br>
просмотры <font style="color:#FF0000;"><b>ТОЛЬКО</b></font> с <font style="color:#FF0000;"><b>УНИКАЛЬНЫХ IP</b></font> в течение <font style="color:#FF0000;"><b>24 часов</b></font>;<br>
Подтверждение просмотра: капча (выбор картинки);<br>
Отличная защита от автокликеров, которую мы совершенствуем постоянно.<br><br>

<style>
#good {
border-color: #489E12;
}
#error {
    border-color: #EC5E0B;
}
.alert {
    color: #650202;
    margin: 5px 0;
    padding: 8px 35px 8px 14px;
    text-shadow: 0px 1px 0px rgba(255, 255, 255, 0.5);
    background-color: #F5CE9D;
    border: 2px solid #3Aa73D;
    border-radius: 2px;
}

</style>



<script>
$(document).ready(function() { // вся мaгия пoсле зaгрузки стрaницы
	$('a#go').click( function(event){ // лoвим клик пo ссылки с id="go"
		event.preventDefault(); // выключaем стaндaртную рoль элементa
		$('#overlay').fadeIn(400, // снaчaлa плaвнo пoкaзывaем темную пoдлoжку
		 	function(){ // пoсле выпoлнения предъидущей aнимaции
				$('#modal_form') 
					.css('display', 'block') // убирaем у мoдaльнoгo oкнa display: none;
					.animate({opacity: 1, top: '50%'}, 200); // плaвнo прибaвляем прoзрaчнoсть oднoвременнo сo съезжaнием вниз
		});
	});
	/* Зaкрытие мoдaльнoгo oкнa, тут делaем тo же сaмoе нo в oбрaтнoм пoрядке */
	$('#modal_close, #overlay').click( function(){ // лoвим клик пo крестику или пoдлoжке
		$('#modal_form')
			.animate({opacity: 0, top: '45%'}, 200,  // плaвнo меняем прoзрaчнoсть нa 0 и oднoвременнo двигaем oкнo вверх
				function(){ // пoсле aнимaции
					$(this).css('display', 'none'); // делaем ему display: none;
					$('#overlay').fadeOut(400); // скрывaем пoдлoжку
				}
			);
	});
});
</script>

<style>
#modal_form {
    width: 300px;
    height: 300px;
    border-radius: 5px;
    background: #2F2F2F;
    position: fixed;
    top: 30%;
    left: 50%;
	border: 2px #C5A572 solid;
    margin-top: -270px;
    margin-left: -150px;
    display: none;
    opacity: 0;
    z-index: 5;
    padding: 20px 10px;
}

#modal_form #modal_close {
    width: 21px;
    height: 21px;
    position: absolute;
    top: 10px;
    right: 45px;
    cursor: pointer;
    display: block;
}
</style>

<link rel="stylesheet" href="/style/main.css" type="text/css" />
<?php

//Данные для формы (по умолчанию)
$title = '';
$desc = '';
$url = 'http://';
$timer = 20;
$move = 0;
$high = 0;
$speed = 1;
$baner = 0;
$baner_url = '';
$crev = 0;

$advedit = isset($_GET['advedit']) ? (int)$_GET['advedit'] : 0;

$user_name = $_SESSION['user'];

if (!$advedit && isset($_POST['ask_editcode'])) { $advedit = (int)$_POST['ask_editcode']; }

//print_r($_GET);

if ($advedit)
{  
if (isset($_SESSION['admin'])) 
{
$db->query("SELECT * FROM  db_serfing WHERE id = '".$advedit."' LIMIT 1");
} 
else
{ 
$db->query("SELECT * FROM  db_serfing WHERE id = '".$advedit."' and user_name = '".$user_name."' LIMIT 1");
}
    
if ($db->NumRows())
{
$result = $db->FetchArray();    

//Подставляем данные из БД для формы редактирования
$title = $result['title'] ? $result['title'] : '';
$desc = $result['desc'] ? $result['desc'] : '';
$url = $result['url'] ? $result['url'] : '';   
$timer = $result['timer'] ? $result['timer'] : 20;
$move = $result['move'] ? $result['move'] : 0;
$high = $result['high'] ? $result['high'] : 0;
$speed = $result['speed'] ? $result['speed'] : 1;
$baner = $result['baner'] ? $result['baner'] : 0;
$baner_url = $result['url'] ? $result['baner_url'] : '';   
$crev = $result['crev'] ? $result['crev'] : 0;
$status = $result['status'];

} 
else 
{
exit();
}
} 

if (isset($_POST['ask_title']))
{
  //Заголовок ссылки
  $title = filter_var(mb_substr(trim($_POST['ask_title']), 0, 55), FILTER_SANITIZE_STRING);
  
  //Краткое описание ссылки
  $desc = filter_var(mb_substr(trim($_POST['ask_desc']),0 ,55), FILTER_SANITIZE_STRING);
  
  //URL сайта
  $url = isset($_POST['ask_url']) ? trim($_POST['ask_url']) : ''; 
  if (!filter_var($url, FILTER_VALIDATE_URL)) { echo '<span class="msgbox-error">Неверный адрес сайта</span>'; return; }
  
  //Время просмотра ссылки
  $timer = isset($_POST['ask_timer']) ? (int)$_POST['ask_timer'] : 20;
  $timer_arr = array('20' => 20, '30' => 30, '40' => 40, '50' => 50, '60' => 60);
  if (!isset($timer_arr[$timer])) { echo '<span class="msgbox-error">Ошибка данных</span>'; return; }
  
  //Последующий переход на сайт
  $move = isset($_POST['ask_move']) ? (int)$_POST['ask_move'] : 0;
  if ($move > 1 || $move < 0) { echo '<span class="msgbox-error">Ошибка данных</span>'; return; }
  
  //Выделить ссылку
  $high = isset($_POST['ask_high']) ? (int)$_POST['ask_high'] : 0;
  if ($high > 1 || $high < 0) { echo '<span class="msgbox-error">Ошибка данных</span>'; return; }
  
  //Баннер
  $baner = isset($_POST['ask_baner']) ? (int)$_POST['ask_baner'] : 0;
  if ($baner > 1 || $baner < 0) { echo '<span class="msgbox-error">Ошибка данных</span>'; return; }
  
  //URL сайта
  $baner_url = isset($_POST['ask_baner_url']) ? trim($_POST['ask_baner_url']) : ''; 
  if (!filter_var($baner_url, FILTER_VALIDATE_URL) AND ($baner > 1 || $baner < 0)) { echo '<span class="msgbox-error">Неверный адрес url баннера</span>'; return; }
  
  //Аудитория смотрящих
  $speed = isset($_POST['ask_speed']) ? (int)$_POST['ask_speed'] : 0;
  if ($speed > 7 || $speed < 1) { echo '<span class="msgbox-error">Ошибка данных</span>'; return; }

$crev = isset($_POST['ask_crev']) ? (int)$_POST['ask_crev'] : 0;
  
if ($crev > 1 || $crev < 0) { echo '<span class="msgbox-error">Ошибка данных</span>'; return; }
  
//Если не заполнены основные поля
if ($title == '' || $desc == '' || $url == '') { echo '<span class="msgbox-error">Заполнены не все поля</span>'; return; }
  
//Расчёт стоимости просмотра
$price = SERF_PRICE; 
  
if ($move == 1) {$price += SERF_PRICE_MOVE; }
  
if ($high == 1) { $price += SERF_PRICE_HIGH; }
  
if ($timer == 30) { $price += SERF_PRICE_TIMER; } 
else if ($timer == 40) { $price += (SERF_PRICE_TIMER * 2); } 
else if ($timer == 50) { $price += (SERF_PRICE_TIMER * 3); } 
else if ($timer == 60) { $price += (SERF_PRICE_TIMER * 4); }

$price = number_format($price, 2, '.', '');
  
if ($advedit) 
{
	  
if (!isset($_SESSION['admin']))
{

if ($result['title'] != $title || $result['desc'] != $desc || $result['url'] != $url)
{
$status = 0;      
}
}  
   
$db->query("UPDATE db_serfing SET `title` = '".$title."', `desc` = '".$desc."', `url` = '".$url."', `timer` = '".$timer."', `move` = '".$move."', `high` = '".$high."', `speed` = '".$speed."',  `baner` = '".$baner."', `crev` = '".$crev."', `price` = '".$price."', `status` = '".$status."' WHERE id = '".$advedit."'");
    
if (isset($_SESSION['admin'])) 
{
header('Location: /account/serfing/moder'); 
} 
else
{
header('Location: /account/serfing/cabinet'); 
}
exit();
}
else
{

if (isset($_SESSION['admin']))
{
$status = '3';
}
else
{
$status = '0';
}

$rules = isset($_POST["rules"]) ? true : false;

if($rules){
$db->query("INSERT INTO db_serfing
(
`user_name`,
`time_add`,	    
`title`,
`desc`,
`url`,         
`timer`,
`move`,
`high`,
`speed`,
`baner`,
`baner_url`,
`crev`,
`price`,
`status`
)
VALUES
(
'".$_SESSION['user']."',
'".TIME."',
'".$title."',
'".$desc."',
'".$url."', 
'".$timer."',
'".$move."', 
'".$high."',
'".$speed."', 
'".$baner."', 
'".$baner_url."', 
'".$crev."',
'".$price."',
'".$status."'
)");

//echo '<span class="msgbox-success">Ссылка добавлена</span>';
header('Location: /account/serfing/cabinet'); exit();
} else echo '<div class="alert" id="error"><b style="font-size: 14px;">Вы не подтвердили правила</b></div>';
}
}
//end:
?>

<script>
function SbmForm() {

if (document.forms['surforder'].ask_title.value == '') {
alert('Вы не указали заголовок ссылки');
document.forms['surforder'].ask_title.focus();
return false;
}

if (document.forms['surforder'].ask_desc.value == '') {
alert('Вы не указали краткое описание ссылки');
document.forms['surforder'].ask_desc.focus();
return false;
}

if ((document.forms['surforder'].ask_url.value == '')|(document.forms['surforder'].ask_url.value == 'http://')) {
alert('Вы не указали URL-адрес ссылки');
document.forms['surforder'].ask_url.focus();
return false;
}

document.forms['surforder'].submit();
return true;
}
 
function PlanChange(frm)
{ 
lprice = serf_price;

if (frm.ask_move.value == 1) {
lprice += serf_price_move;
}

if (frm.ask_high.value == 1) {
lprice += serf_price_high;
}

if (frm.ask_timer.value == 30) {
lprice += serf_price_timer;
} else

if (frm.ask_timer.value == 40) {
lprice += (serf_price_timer * 2);
} else

if (frm.ask_timer.value == 50) {
lprice += (serf_price_timer * 3);
} else

if (frm.ask_timer.value == 60) {
lprice += (serf_price_timer * 4);
}

frm.linkprice.value = number_format(lprice, 2, '.', '');
//money = lprice * $('input[name=ask_kolvo]').val();
//frm.money.value = number_format(money, 2, '.', '');
}

function number_format(number, decimals, dec_point, thousands_sep) {
var i, j, kw, kd, km;
if (isNaN(decimals = Math.abs(decimals))) {
decimals = 2;
}

if (dec_point == undefined) {
dec_point = ",";
}

if (thousands_sep == undefined) {
thousands_sep = ".";
}
i = parseInt(number = (+number || 0).toFixed(decimals)) + "";

if ((j = i.length) > 3) {
j = j % 3;
} else {
j = 0;
}

km = (j ? i.substr(0, j) + thousands_sep : "");
kw = i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands_sep);
kd = (decimals ? dec_point + Math.abs(number - i).toFixed(decimals).replace(/-/, 0).slice(2) : "");
return km + kw + kd;
}

function showhide(bid) {
if (document.getElementById('cattitle'+bid).className == 'cattitle-open')
document.getElementById('cattitle'+bid).className = 'cattitle-close'; else
document.getElementById('cattitle'+bid).className = 'cattitle-open';
$('#catblock'+bid).slideToggle('fast');
}

var serf_price = <?php echo SERF_PRICE; ?>;
var serf_price_timer = <?php echo SERF_PRICE_TIMER; ?>;
var serf_price_move = <?php echo SERF_PRICE_MOVE; ?>;
var serf_price_high = <?php echo SERF_PRICE_HIGH; ?>;

function ClearForm()
{
document.forms['surforder'].ask_timer.value = <?php echo $timer; ?>;
document.forms['surforder'].ask_move.value = <?php echo $move; ?>;
document.forms['surforder'].ask_high.value = <?php echo $high; ?>;
document.forms['surforder'].ask_speed.value = <?php echo $speed; ?>;
document.forms['surforder'].ask_crev.value = '<?php echo $crev; ?>';
PlanChange(document.forms['surforder']);
}

$(document).ready(function() { ClearForm(); });
</script> 

<div class="silver-bk">

<div id="entermsg"><?php if (!empty($msg)) { echo $msg; } ?></div>
<form name="surforder" method="post" action="/account/serfing/add" onsubmit="return SbmForm(); return false;">
<div id="catblock2">
<input type="hidden" name="ask_editcode" value="<?php echo $advedit; ?>" />

<table class='profile' style='margin-bottom: 0;'>
<thead>
<tr>
<th align='center' width='44%' nowrap='nowrap'>Параметр</th>
<th align='center' nowrap='nowrap'>Значение</th>
<th></th>
</tr>
</thead>
<tbody>

<tr>
<td><b>Заголовок ссылки</b></td>
<td class="value">
<input class="val" style="border-radius: 5px; font-size:15px;float: right;" type="text" name="ask_title" maxlength="55" value="<?php echo $title; ?>" />
</td>
<td class="service"></td>
</tr>

<tr>
<td><b>Краткое описание ссылки</b></td>
<td class="value"><input class="val" style="border-radius: 5px; font-size:15px;float: right;" type="text" name="ask_desc" maxlength="55" value="<?php echo $desc; ?>" /></td>
<td class="service"></td>
</tr>

<tr>
<td><b>URL сайта</b> (включая http://)</td>
<td class="value"><input class="val" style="border-radius: 5px; font-size:15px;float: right;" type="text" name="ask_url" maxlength="300" value="<?php echo $url; ?>" /></td>
<td class="service"></td>
</tr>
<tr>

<td>Баннер(468х60)</td>
<td class="value">
<select class="val" style="border-radius: 5px; font-size:15px;float: right;" name="ask_baner">
<option value="0">Нет</option>
<option value="1">Да</option>
</select>
</td>
<td class="service"></td>
</tr>

<tr>
<td>URL картинки баннера (включая http://)</td>
<td class="value"><input class="val" style="border-radius: 5px; font-size:15px;float: right;" type="text" name="ask_baner_url" maxlength="250" value="<?php echo $baner_url; ?>" /></td>
<td class="service"></td>
</tr>
<tr>

<tr>
<td>Время просмотра ссылки</td>
<td class="value">
<select class="val" style="border-radius: 5px; font-size:15px;float: right;" name="ask_timer" onChange="PlanChange(this.form); return false;">
<option value="20">20 секунд</option>
<option value="30">30 секунд&nbsp;&nbsp;(+ <?php echo SERF_PRICE_TIMER; ?> золото)</option>
<option value="40">40 секунд&nbsp;&nbsp;(+ <?php echo SERF_PRICE_TIMER*2; ?> золото)</option>
<option value="50">50 секунд&nbsp;&nbsp;(+ <?php echo SERF_PRICE_TIMER*3; ?> золото)</option>
<option value="60">60 секунд&nbsp;&nbsp;(+ <?php echo SERF_PRICE_TIMER*4; ?> золото)</option>
</select>
</td>
<td class="service"></td>
</tr>

<tr>
<td>Выделить ссылку</td>
<td class="value">
<select class="val" style="border-radius: 5px; font-size:15px;float: right;" name="ask_high" onChange="PlanChange(this.form); return false;">
<option value="0">Нет</option>
<option value="1">Да&nbsp;&nbsp;(+ <?php echo SERF_PRICE_HIGH; ?> золото)</option>
</select>
</td>
<td class="service"></td>
</tr>

<tr>
<td>Последующий переход на сайт</td>
<td class="value">
<select class="val" style="border-radius: 5px; font-size:15px;float: right;" name="ask_move" onChange="PlanChange(this.form); return false;">
<option value="0">Нет</option>
<option value="1">Да&nbsp;&nbsp;(+ <?php echo SERF_PRICE_MOVE; ?> золото)</option>
</select>
</td>
<td class="service"></td>
</tr>

<tr>
<td>Аудитория смотрящих</td>
<td class="value">
<select class="val" style="border-radius: 5px; font-size:15px;float: right;" name="ask_speed">
<option value="1">Все пользователи проекта</option>
<option value="2">1/2 пользователей</option>
<option value="3">1/3 пользователей</option>
<option value="4">1/4 пользователей</option>
<option value="5">Очень медленный серфинг</option>
<option value="6">Супер медленный серфинг</option>
<option value="7">Черепаший серфинг</option>
</select>
</td>
<td class="service"></td>
</tr>

<tr>
<td>Стоимость одного просмотра</td>
<td class="price" colspan="2">
<input type="text" name="linkprice" maxlength="5" value="5.00" readonly="readonly" /> золото.
</td>
</tr>

<tr>
<td colspan="2">
<input name="rules" type="checkbox">
<span style="margin-top: 1px;">
<a href="#" id="go"><font color="red">Правила </font></a>нажмите для прочтения, за нарушение БАН аккаунта</span>
</td>
<td class="service"></td>
</tr>

</tbody>
</table>
</div>
  
<?php
if ($advedit)
{
?>

<center>
<br>                              
<input class="button" type="submit" title="Принять изменения" value="Сохранить" onclick="SbmForm();">
</center>

<?php
} 
else
{
?>

<center>
<br>             
<input class="button" type="submit" title="Разместить рекламу" value="Добавить" onclick="SbmForm();">
</center>

<?php
} 
?>
</form>

<div id="modal_form" style="width: 600px; height: 500px; display: none; opacity: 1; top: 30%;">
<!-- Сaмo oкнo --> 

<span id="modal_close">Закрыть</span>
<!-- Кнoпкa зaкрыть --> 

<div style="padding:50px;">
1. <font style="color:#EC6161;">Содержащие вирусы и фишинговые сайты/ссылки<br></font>
2. <font style="color:#EC6161;">Сайты с редиректом на другие сайты, включая редирект сайта-источника<br></font>
3. <font style="color:#EC6161;">Разрушающие фрейм с таймером (для серфинга и оплачиваемых писем)<br></font>
4. <font style="color:#EC6161;">Содержащие порнографию или обилие эротических материалов<br></font>
5. <font style="color:#EC6161;">Содержащие нецензурную и ненормативную лексику<br></font>
6. <font style="color:#EC6161;">Секс-шопы и доски знакомств типа "на одну ночь"<br></font>
7. <font style="color:#EC6161;">Сообщества нетрадиционной сексуальной ориентации<br></font>
8. <font style="color:#EC6161;">Призывающие к насилию, расизму, национализму, аморальному поведению<br></font>
9. <font style="color:#EC6161;">Политические и религиозные ресурсы<br></font>
10. <font style="color:#EC6161;">Ресурсы для сбора пожертвований, кроме официальных фондов и центров помощи<br></font>
11. <font style="color:#EC6161;">Ресурсы с элементами магии, спиритизма, оккультизма<br></font>
12. <font style="color:#EC6161;">Ресурсы, с явно выраженным обманом<br></font>
13. <font style="color:#EC6161;">Ресурсы, созданные "не для людей", т.е. набитые множеством партнёрок, всплывающих pop-up и т.д.<br></font>
14. <font style="color:#EC6161;">Ресурсы, требующие отправку платных СМС-сообщений<br></font>
15. <font style="color:#EC6161;">Сайты, которые неоправданно долго загружаются, вследствие слабого хостинга или обилия скрытых партнёрок<br></font>
16. <font style="color:#EC6161;">Ресурсы, нарушающие законодательство РФ и Украины<br><br><br></font>
<center><font style="font-size: 20px; color:#EC6161;">За нарушение любого правила БАН аккаунта на проекте!<br></font></center>
</div>

<div id="overlay" style="display: none;"></div>

<?

?>
</div>