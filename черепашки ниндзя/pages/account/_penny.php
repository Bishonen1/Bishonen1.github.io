<embed src="/orelreshka/fon.mp3" type="audio/mpeg" hidden="true" autostart="true" loop="true"></embed>

<body onload="setInterval('pennystats();pennyblc()', 1000);"></body>

<?
$usid = $_SESSION["user_id"];
$refid = $_SESSION["referer_id"];
$usname = $_SESSION["user"];

?>
<div class="s-bk-lf">
	<div class="acc-title">Орел или решка</div>
</div>
<div class="silver-bk">


  <style type="text/css">
    .tooltip {
    background:#fff;
    border:1px solid #ccc;
    font-size:11px;
    color:#323232;
    padding:2px 2px;
    position:absolute;
}

  </style>




<center>Правила: Старинная игра, известная во многих странах.</center>
<center>Вам необходимо угадать какая из сторон монеты выпадет !</center>
<center>В случае выигрыша ваша ставка увеличивается в 2 раза !</center>

<center><p> </p></center>






<script>
function fun1(){
test1=document.getElementById('test1');

if(btn.value=='100'){
  
  test1.innerHTML='<input onclick="stikoltar1();this.disabled=true;btnnnerik2.disabled=true;" id="btnnnerik" class="btn_3d456" readonly="">';
  test2.innerHTML='<input onclick="stikolmek1();this.disabled=true;btnnnerik.disabled=true;" id="btnnnerik2" class="btn_3d4562" style="margin-left: -4px;" readonly="">';
   
   // btn.value='exit';
}
}
</script>

<script>
function fun2(){
test1=document.getElementById('test1');

if(btn.value=='100'){
  
  test1.innerHTML='<input onclick="stikoltar2();this.disabled=true;btnnnerik2.disabled=true;" id="btnnnerik" class="btn_3d456" readonly="">';
  test2.innerHTML='<input onclick="stikolmek2();this.disabled=true;btnnnerik.disabled=true;" id="btnnnerik2" class="btn_3d4562" style="margin-left: -4px;" readonly="">';
   
   // btn.value='exit';
}
}
</script>

<script>
function fun3(){
test1=document.getElementById('test1');

if(btn.value=='100'){
  
  test1.innerHTML='<input onclick="stikoltar3();this.disabled=true;btnnnerik2.disabled=true;" id="btnnnerik" class="btn_3d456" readonly="">';
  test2.innerHTML='<input onclick="stikolmek3();this.disabled=true;btnnnerik.disabled=true;" id="btnnnerik2" class="btn_3d4562" style="margin-left: -4px;" readonly="">';
   
   // btn.value='exit';
}
}
</script>

<script>
function fun4(){
test1=document.getElementById('test1');

if(btn.value=='100'){
  
  test1.innerHTML='<input onclick="stikoltar4();this.disabled=true;btnnnerik2.disabled=true;" id="btnnnerik" class="btn_3d456" readonly="">';
  test2.innerHTML='<input onclick="stikolmek4();this.disabled=true;btnnnerik.disabled=true;" id="btnnnerik2" class="btn_3d4562" style="margin-left: -4px;" readonly="">';
   
   // btn.value='exit';
}
}
</script>

<script>
function fun5(){
test1=document.getElementById('test1');

if(btn.value=='100'){
  
  test1.innerHTML='<input onclick="stikoltar5();this.disabled=true;btnnnerik2.disabled=true;" id="btnnnerik" class="btn_3d456" readonly="">';
  test2.innerHTML='<input onclick="stikolmek5();this.disabled=true;btnnnerik.disabled=true;" id="btnnnerik2" class="btn_3d4562" style="margin-left: -4px;" readonly="">';
   
   // btn.value='exit';
}
}
</script>




<script type="text/javascript">
function sendtar1()
{
//Получаем параметры
var text = $('#text').val()
 // Отсылаем паметры
 $.ajax({
 type: "POST",
 url: "/pennytar1.php",
 data: "text="+text,
 //При удачном завершение запроса - выводим то, что нам вернул PHP
 success: function(html) {
 //предварительно очищаем нужный элемент страницы
 $("#response").empty();
//и выводим ответ php скрипта
 $("#response").append(html);
 }
 });

}

function sendmek1()
{
//Получаем параметры
var text = $('#text').val()
 // Отсылаем паметры
 $.ajax({
 type: "POST",
 url: "/pennymek1.php",
 data: "text="+text,
 //При удачном завершение запроса - выводим то, что нам вернул PHP
 success: function(html) {
 //предварительно очищаем нужный элемент страницы
 $("#response").empty();
//и выводим ответ php скрипта
 $("#response").append(html);
 }
 });

}

function sendtar2()
{
//Получаем параметры
var text = $('#text').val()
 // Отсылаем паметры
 $.ajax({
 type: "POST",
 url: "/pennytar2.php",
 data: "text="+text,
 //При удачном завершение запроса - выводим то, что нам вернул PHP
 success: function(html) {
 //предварительно очищаем нужный элемент страницы
 $("#response").empty();
//и выводим ответ php скрипта
 $("#response").append(html);
 }
 });

}

function sendmek2()
{
//Получаем параметры
var text = $('#text').val()
 // Отсылаем паметры
 $.ajax({
 type: "POST",
 url: "/pennymek2.php",
 data: "text="+text,
 //При удачном завершение запроса - выводим то, что нам вернул PHP
 success: function(html) {
 //предварительно очищаем нужный элемент страницы
 $("#response").empty();
//и выводим ответ php скрипта
 $("#response").append(html);
 }
 });

}


function sendtar3()
{
//Получаем параметры
var text = $('#text').val()
 // Отсылаем паметры
 $.ajax({
 type: "POST",
 url: "/pennytar3.php",
 data: "text="+text,
 //При удачном завершение запроса - выводим то, что нам вернул PHP
 success: function(html) {
 //предварительно очищаем нужный элемент страницы
 $("#response").empty();
//и выводим ответ php скрипта
 $("#response").append(html);
 }
 });

}

function sendmek3()
{
//Получаем параметры
var text = $('#text').val()
 // Отсылаем паметры
 $.ajax({
 type: "POST",
 url: "/pennymek3.php",
 data: "text="+text,
 //При удачном завершение запроса - выводим то, что нам вернул PHP
 success: function(html) {
 //предварительно очищаем нужный элемент страницы
 $("#response").empty();
//и выводим ответ php скрипта
 $("#response").append(html);
 }
 });

}

function sendtar4()
{
//Получаем параметры
var text = $('#text').val()
 // Отсылаем паметры
 $.ajax({
 type: "POST",
 url: "/pennytar4.php",
 data: "text="+text,
 //При удачном завершение запроса - выводим то, что нам вернул PHP
 success: function(html) {
 //предварительно очищаем нужный элемент страницы
 $("#response").empty();
//и выводим ответ php скрипта
 $("#response").append(html);
 }
 });

}

function sendmek4()
{
//Получаем параметры
var text = $('#text').val()
 // Отсылаем паметры
 $.ajax({
 type: "POST",
 url: "/pennymek4.php",
 data: "text="+text,
 //При удачном завершение запроса - выводим то, что нам вернул PHP
 success: function(html) {
 //предварительно очищаем нужный элемент страницы
 $("#response").empty();
//и выводим ответ php скрипта
 $("#response").append(html);
 }
 });

}

function sendtar5()
{
//Получаем параметры
var text = $('#text').val()
 // Отсылаем паметры
 $.ajax({
 type: "POST",
 url: "/pennytar5.php",
 data: "text="+text,
 //При удачном завершение запроса - выводим то, что нам вернул PHP
 success: function(html) {
 //предварительно очищаем нужный элемент страницы
 $("#response").empty();
//и выводим ответ php скрипта
 $("#response").append(html);
 }
 });

}

function sendmek5()
{
//Получаем параметры
var text = $('#text').val()
 // Отсылаем паметры
 $.ajax({
 type: "POST",
 url: "/pennymek5.php",
 data: "text="+text,
 //При удачном завершение запроса - выводим то, что нам вернул PHP
 success: function(html) {
 //предварительно очищаем нужный элемент страницы
 $("#response").empty();
//и выводим ответ php скрипта
 $("#response").append(html);
 }
 });

}
//--------------------------------
{
//Получаем параметры
var text = $('#text').val()
 // Отсылаем паметры
 $.ajax({
 type: "POST",
 url: "/penny.php",
 data: "text="+text,
 //При удачном завершение запроса - выводим то, что нам вернул PHP
 success: function(html) {
 //предварительно очищаем нужный элемент страницы
 $("#response").empty();
//и выводим ответ php скрипта
 $("#response").append(html);
 }
 });

}
</script>
<style>
.silver-knopka {
background: #f7f7f7;
border: 1px solid #B3D3B1;
width: 235px;
border-radius: 0px;
color: #7ea57b;
font-weight: bold;
text-shadow: #fff 0 2px 9px;
height: 235px;
margin-top: -10px;
}

.silver-knopkasdf {
background: url(/orelreshka/stoped/fonik.png) no-repeat;
background-size: 550px Auto;
border: 3px solid #6BAF7C;
width: 550px;
height: 401px;
border-radius: 0px;
color: #7ea57b;
font-weight: bold;
text-shadow: #fff 0 2px 9px;
}

.silver-knopkasdfsdfsdf {
background: #6BAF7C;
border: 3px solid #6BAF7C;
width: 471px;
border-radius: 0px;
color: #7ea57b;
font-weight: bold;
text-shadow: #fff 0 2px 9px;
margin-top: 22px;
height: 46px;
}

.silver-alkash {
background: #f7f7f7;
border: 1px solid #6BAF7C;
width: 235px;
border-radius: 0px;
color: #7ea57b;
font-weight: bold;
text-shadow: #fff 0 2px 9px;
height: 235px;
margin-top: -10px;
}


.silver-sfdsd415s4545dssd5s5f5s5fs655555 {
background: #E4F7D9;
border: 1px solid #dddddd;
width: 530px;
border-radius: 0px;
padding: 1px 12px 1px 12px;
color: #7ea57b;
font-weight: bold;
text-shadow: #fff 0 2px 9px;
margin-top: 5px;
height: 50px;
}

.line2144444 {
font-size: 20px;
margin: 9px 5px 11px 10px;
}

.dropdownyan {
width: 69px;
margin: 0px 10px 0px 0px;
text-decoration: none;
background: -webkit-gradient( linear, center bottom, center top, from(rgba(64, 195, 51, 0.39)), to(rgba(150, 236, 141, 0.23)) );
border-radius: 10px;
height: 27px;
color: #77AF1B;
font-weight: bold;
font-size: 18px;
border: 1px;
}

.dropdownyan:active {
margin: 0px 10px 0px 0px;
text-decoration: none;
background: -webkit-gradient( linear, center bottom, center top, from(rgba(21, 44, 8, 0.1)), to(rgba(224, 233, 223, 0.1)) );
border-radius: 10px;
cursor: pointer;
height: 27px;
border: 1px;
}

.dropdownyan:hover {
margin: 0px 10px 0px 0px;
text-decoration: none;
background: -webkit-gradient( linear, center bottom, center top, from(rgba(64, 195, 51, 0.63)), to(rgba(163, 222, 157, 0.24)) );
border-radius: 10px;
cursor: pointer;
height: 27px;
border: 1px;
}

.dropdownyan:disabled {
margin: 0px 10px 0px 0px;
text-decoration: none;
background: -webkit-gradient( linear, center bottom, center top, from(rgba(7, 100, 6, 0.19)), to(rgba(182, 233, 155, 0.17)) );
border-radius: 10px;
cursor: not-allowed;
height: 27px;
color: rgba(169, 188, 137, 1);
border: 1px;
}

.alertstart2 {
padding: 0px 0px 11px 0px;
margin-bottom: 8px;
text-shadow: -1 1px 0 rgba(255, 255, 255, 0.5);
background-color: #E4F7D9;
border: 1px solid #D8F1BC;
-webkit-border-radius: 2px;
-moz-border-radius: 4px;
border-radius: 1px;
width: 552px;
}

.silver-sfdsd415s4545dssd5s5f5s5fs655555sss {
background: #E4F7D9;
border: 1px solid #dddddd;
width: 554px;
border-radius: 0px;
color: #7ea57b;
font-weight: bold;
text-shadow: #fff 0 2px 9px;
margin-top: 0px;
height: 50px;
}
</style>

<style>
.btn_3d456:hover {
background: url("/orelreshka/btn/tar2.png") center no-repeat;
background-size: 172px Auto;
}

.btn_3d456:active {
background: url("/orelreshka/btn/tar3.png") center no-repeat;
background-size: 172px Auto;
}

.btn_3d456 {
background: url("/orelreshka/btn/tar.png") center no-repeat;
border: #7ea57b;
color: #FFF;
cursor: pointer;
width: 172px;
height: 49px;
background-size: 170px Auto;
}


.btn_3d456:disabled {
background: url("/orelreshka/btn/tar.png") center no-repeat;
border: #7ea57b;
color: #FFF;
cursor: not-allowed;
width: 172px;
height: 49px;
background-size: 170px Auto;
}

.btn_3d4562:hover {
background: url("/orelreshka/btn/mek2.png") center no-repeat;
background-size: 172px Auto;
}

.btn_3d4562:active {
background: url("/orelreshka/btn/mek3.png") center no-repeat;
background-size: 172px Auto;
}

.btn_3d4562 {
background: url("/orelreshka/btn/mek.png") center no-repeat;
border: #7ea57b;
color: #FFF;
cursor: pointer;
width: 172px;
height: 49px;
background-size: 170px Auto;
}

.btn_3d4562:disabled {
background: url("/orelreshka/btn/mek.png") center no-repeat;
border: #7ea57b;
color: #FFF;
cursor: not-allowed;
width: 172px;
height: 49px;
background-size: 170px Auto;
}

</style>
<center>
<div class="silver-sfdsd415s4545dssd5s5f5s5fs655555">


<table align="center">
<tr>
<td>
<div class="line2144444"><font color="#328426"><b>Ставка:</b></font></div>
</td>
<td>
<input type="button" id="btn" class="dropdownyan" disabled="" name="btn" value="100" onClick="fun1();this.disabled=true;btn2.disabled=false;btn3.disabled=false;btn4.disabled=false;btn5.disabled=false;"/>

</td>
<td>
<input type="button" id="btn2" class="dropdownyan" name="btn2" value="250" onClick="fun2();this.disabled=true;btn.disabled=false;btn3.disabled=false;btn4.disabled=false;btn5.disabled=false;"/>

</td>
<td>
<input type="button" id="btn3" class="dropdownyan" name="btn3" value="500" onClick="fun3();this.disabled=true;btn2.disabled=false;btn.disabled=false;btn4.disabled=false;btn5.disabled=false;"/>

</td>
<td>
<input type="button" id="btn4" class="dropdownyan" name="btn4" value="1000" onClick="fun4();this.disabled=true;btn2.disabled=false;btn3.disabled=false;btn.disabled=false;btn5.disabled=false;"/>

</td>
<td>
<input type="button" id="btn5" class="dropdownyan" name="btn5" value="2000" onClick="fun5();this.disabled=true;btn2.disabled=false;btn3.disabled=false;btn4.disabled=false;btn.disabled=false;"/>

</td>
</tr>
</table>

</div>
<div class="silver-knopkasdf">








<input id="text" value="<?=$usid; ?>" name="user" type="hidden">

<script>
function Sound() {
  var embed = document.createElement('EMBED');
   embed.src = '/orelreshka/zvuk.mp3';
  document.body.appendChild(embed);
}
</script>




<script type="text/javascript">
function l_image (a) {
 document.example_img.src=a
}
</script>



<div id="response"></div>



<table style="margin-top: -55px; margin-left: 198px;" align="center">
<tr>
<td><div onclick="l_image ('/orelreshka/start.gif');Sound();" id="test1"><input onclick="stikoltar1();this.disabled=true;btnnnerik2.disabled=true;" id="btnnnerik" class="btn_3d456" readonly=""></div><td>
<td><div onclick="l_image ('/orelreshka/start.gif');Sound();" id="test2"><input onclick="stikolmek1();this.disabled=true;btnnnerik.disabled=true;" id="btnnnerik2" class="btn_3d4562" style="margin-left: -4px;" readonly=""></div><td>
</tr>
</table>



<script language="JavaScript" type="text/javascript">
function stikoltar1() {	
	$(document).ready(function(){
		window.wait = 2.05;
		window.wait_timer = setInterval(function(){
			$('#download_waiter_remain').text(window.wait--);
			if (window.wait <= 0) {
				clearInterval(window.wait_timer);
				$('#no_download_timer').hide();
                setTimeout('sendtar1();btnnnerik.disabled=false;btnnnerik2.disabled=false;blc();')
			
			}	
		}, 1000);
	});
}	
</script>
<script language="JavaScript" type="text/javascript">
function stikoltar2() {	
	$(document).ready(function(){
		window.wait = 2.05;
		window.wait_timer = setInterval(function(){
			$('#download_waiter_remain').text(window.wait--);
			if (window.wait <= 0) {
				clearInterval(window.wait_timer);
				$('#no_download_timer').hide();
                setTimeout('sendtar2();btnnnerik.disabled=false;btnnnerik2.disabled=false;blc();')
			
			}	
		}, 1000);
	});
}	
</script>
<script language="JavaScript" type="text/javascript">
function stikoltar3() {	
	$(document).ready(function(){
		window.wait = 2.05;
		window.wait_timer = setInterval(function(){
			$('#download_waiter_remain').text(window.wait--);
			if (window.wait <= 0) {
				clearInterval(window.wait_timer);
				$('#no_download_timer').hide();
                setTimeout('sendtar3();btnnnerik.disabled=false;btnnnerik2.disabled=false;blc();')
			
			}	
		}, 1000);
	});
}	
</script>
<script language="JavaScript" type="text/javascript">
function stikoltar4() {	
	$(document).ready(function(){
		window.wait = 2.05;
		window.wait_timer = setInterval(function(){
			$('#download_waiter_remain').text(window.wait--);
			if (window.wait <= 0) {
				clearInterval(window.wait_timer);
				$('#no_download_timer').hide();
                setTimeout('sendtar4();btnnnerik.disabled=false;btnnnerik2.disabled=false;blc();')
			
			}	
		}, 1000);
	});
}	
</script>
<script language="JavaScript" type="text/javascript">
function stikoltar5() {	
	$(document).ready(function(){
		window.wait = 2.05;
		window.wait_timer = setInterval(function(){
			$('#download_waiter_remain').text(window.wait--);
			if (window.wait <= 0) {
				clearInterval(window.wait_timer);
				$('#no_download_timer').hide();
                setTimeout('sendtar5();btnnnerik.disabled=false;btnnnerik2.disabled=false;blc();')
			
			}	
		}, 1000);
	});
}	
</script>

<script language="JavaScript" type="text/javascript">
function stikolmek1() {	
	$(document).ready(function(){
		window.wait = 2.05;
		window.wait_timer = setInterval(function(){
			$('#download_waiter_remain').text(window.wait--);
			if (window.wait <= 0) {
				clearInterval(window.wait_timer);
				$('#no_download_timer').hide();
                setTimeout('sendmek1();btnnnerik.disabled=false;btnnnerik2.disabled=false;blc();')
			
			}	
		}, 1000);
	});
}	
</script>
<script language="JavaScript" type="text/javascript">
function stikolmek2() {	
	$(document).ready(function(){
		window.wait = 2.05;
		window.wait_timer = setInterval(function(){
			$('#download_waiter_remain').text(window.wait--);
			if (window.wait <= 0) {
				clearInterval(window.wait_timer);
				$('#no_download_timer').hide();
                setTimeout('sendmek2();btnnnerik.disabled=false;btnnnerik2.disabled=false;blc();')
			
			}	
		}, 1000);
	});
}	
</script>
<script language="JavaScript" type="text/javascript">
function stikolmek3() {	
	$(document).ready(function(){
		window.wait = 2.05;
		window.wait_timer = setInterval(function(){
			$('#download_waiter_remain').text(window.wait--);
			if (window.wait <= 0) {
				clearInterval(window.wait_timer);
				$('#no_download_timer').hide();
                setTimeout('sendmek3();btnnnerik.disabled=false;btnnnerik2.disabled=false;blc();')
			
			}	
		}, 1000);
	});
}	
</script>
<script language="JavaScript" type="text/javascript">
function stikolmek4() {	
	$(document).ready(function(){
		window.wait = 2.05;
		window.wait_timer = setInterval(function(){
			$('#download_waiter_remain').text(window.wait--);
			if (window.wait <= 0) {
				clearInterval(window.wait_timer);
				$('#no_download_timer').hide();
                setTimeout('sendmek4();btnnnerik.disabled=false;btnnnerik2.disabled=false;blc();')
			
			}	
		}, 1000);
	});
}	
</script>
<script language="JavaScript" type="text/javascript">
function stikolmek5() {	
	$(document).ready(function(){
		window.wait = 2.05;
		window.wait_timer = setInterval(function(){
			$('#download_waiter_remain').text(window.wait--);
			if (window.wait <= 0) {
				clearInterval(window.wait_timer);
				$('#no_download_timer').hide();
                setTimeout('sendmek5();btnnnerik.disabled=false;btnnnerik2.disabled=false;blc();')
			
			}	
		}, 1000);
	});
}	
</script>


</div>
<div class="silver-sfdsd415s4545dssd5s5f5s5fs655555sss">
<center>
<div class="alertstart2">
<div id="alikoblc">
<script>
//--------------------------------
//------------Баланс--------------
//--------------------------------

function pennyblc()
{
//Получаем параметры
var text = $('#text').val()
 // Отсылаем паметры
 $.ajax({
 type: "POST",
 url: "/pennyblc.php",
 data: "text="+text,
 //При удачном завершение запроса - выводим то, что нам вернул PHP
 success: function(html) {
 //предварительно очищаем нужный элемент страницы
 $("#alikoblc").empty();
//и выводим ответ php скрипта
 $("#alikoblc").append(html);
 }
 });

}


//--------------------------------
{
//Получаем параметры
var text = $('#text').val()
 // Отсылаем паметры
 $.ajax({
 type: "POST",
 url: "/pennyblc.php",
 data: "text="+text,
 //При удачном завершение запроса - выводим то, что нам вернул PHP
 success: function(html) {
 //предварительно очищаем нужный элемент страницы
 $("#alikoblc").empty();
//и выводим ответ php скрипта
 $("#alikoblc").append(html);
 }
 });

}
</script>
</div>
</div>
</center>
</div>
</center>



<center>
<center></br></center>
<div id="alikostats">
<script>
//--------------------------------
//------------alikostats--------------
//--------------------------------

function pennystats()
{
//Получаем параметры
var text = $('#text').val()
 // Отсылаем паметры
 $.ajax({
 type: "POST",
 url: "/pennystats.php",
 data: "text="+text,
 //При удачном завершение запроса - выводим то, что нам вернул PHP
 success: function(html) {
 //предварительно очищаем нужный элемент страницы
 $("#alikostats").empty();
//и выводим ответ php скрипта
 $("#alikostats").append(html);
 }
 });

}


//--------------------------------
{
//Получаем параметры
var text = $('#text').val()
 // Отсылаем паметры
 $.ajax({
 type: "POST",
 url: "/pennystats.php",
 data: "text="+text,
 //При удачном завершение запроса - выводим то, что нам вернул PHP
 success: function(html) {
 //предварительно очищаем нужный элемент страницы
 $("#alikostats").empty();
//и выводим ответ php скрипта
 $("#alikostats").append(html);
 }
 });

}
</script>
</div>

</center>






<div class="clr"></div>
</div>

							<div class="clr"></div>	