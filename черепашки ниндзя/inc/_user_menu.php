	<div class="example2"></div>
<div class="example4"><div class="paneli">
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>

    <td align="center"><a href="/account/insert">Пополнить баланс</a></td>
    <td align="center"><a href="/account/payment">Вывести на кошелек</a></td>
  </tr>

  <tr>


    <td align="center"><a href="#" id="linkp">

<div class="pokup1"><a href="/account/insert"><span style="color:#FFF;
    
    font-size:18px;text-shadow: #000 0 0 3px; 
    ">{!BALANCE_B!} </a></span></div><div class="pokup"><img src="/img/serebro.png" width="40" height="40"></div></a></td>


    <td align="center"><a href="#" id="links">

<div class="svin1"><a href="/account/payment"><span style="color:#FFF;
    
    font-size:18px;text-shadow: #000 0 0 3px; 
    ">{!BALANCE_P!} </a></span></div><div class="svin"><img src="/img/zoloto.png" width="40" height="40"></div></a></td>
  </tr>
</table>

</div>
	</div>
	<div class="example5">
	<a href="/account"><div class="menu">Кабинет<img src="/img/ofis.png" width="40" height="40"></div></a>
	<a href="/account/farm"><div class="menu">Персонажи<img src="/img/cart_n.png" width="45" height="40"></div></a>
	<a href="/account/store"><div class="menu">Доход<img src="/img/11.png" width="40" height="40"></div></a>
	<a href="/account/bonus"><div class="menu">Бонус<img src="/img/bonus.png" width="35" height="35"></div></a>
        <a href="/account/igrun"><div class="menu">Игры<img src="/img/idey.png" width="40" height="38"></div></a>
<a href="/account/chat"><div class="menu">Чат<img src="/img/chat-2-plus.png" width="40" height="38"></div></a>
        <a href="/account/serfing"><div class="menu">Серфинг<img src="/img/serf.png" width="40" height="38"></div></a>
        <a href="/account/swap"><div class="menu">Обменник<img src="/img/imageproxy.png" width="40" height="38"></div></a>
	<a href="/account/exit"><div class="menu">Выход<img src="/img/exit.png" width="35" height="35"></div></a>
	
<?php
if (isset($_SESSION['admin']))
{ 
$db->Query("SELECT * FROM db_serfing WHERE status = '1' ORDER BY time_add DESC"); 
?>
<div class="field-gr"><a href="/account/serfing/moder">Модераторская <font color="red">(<?php echo $db->NumRows(); ?>)</font></a></div>
<?php
}
?>	
	

</div>