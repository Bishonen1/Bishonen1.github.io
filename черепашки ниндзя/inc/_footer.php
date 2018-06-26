<BR />
<?PHP if(!isset($_GET["menu"]) OR $_GET["menu"] != "admin4ik"){ ?>
<?PHP } ?>

							<div class="clr"></div>
							</div>
						<div class="clr"></div>
						</div>

					<BR /> <BR />
<center><font style="text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black; color: #ddcca3;">© 2018  ВСЕ ПРАВА ЗАЩИЩЕНЫ</font></center>	
<center>
<div class="footer2">
<div id="templatemo_footer">
<a class="current" href="/"><font style="text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black; color: #ddcca3;">Главная</a> | <a href="/rules/"><font style="text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black; color: #ddcca3;">Соглашение</a> | <a href="/payments/"><font style="text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black; color: #ddcca3;">Выплаты</a>  <a href="/showthread.php?t=428685&page=1#post10324452" target="_blank"></a>  
		
 <br><br>
</div></div></center>
<center><table><tr><td><img src="/img/pa.png" width="40" height="40">
</td><td><img src="/img/qiwi-icon.png" width="40" height="40">
</td><td><!--LiveInternet counter--><script type="text/javascript"><!--
' "+
"target=_blank><img src='//counter.yadro.ru/hit?t21.6;r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";"+Math.random()+
"' alt='' title='LiveInternet: показано число просмотров за 24"+
" часа, посетителей за 24 часа и за сегодн¤' "+
"border='0' width='88' height='31'><\/a>")
//--></script><!--/LiveInternet-->
</td><td><img src="/img/ddos.png" width="40" height="40">
</td><td><img src="/img/ssl.png" width="40" height="40"></td></tr>
</table></center>
				<div class="footer">
					<center>
					
<div class="f1"><span style="color:#FFF;
    font-family: Lasco_Bold;
    font-size:16px;text-shadow: 1px 1px 0px #080808, 1px 1px 0px #707070;
    "><?=$stats_data["all_users"]; ?><BR />ЧЕЛОВЕК </a></span></div><div class="fu1"><img src="/img/f1.png" width="60" height="60"></div>

<div class="f2"><span style="color:#FFF;
    font-family: Lasco_Bold;
    font-size:16px;text-shadow: 1px 1px 0px #080808, 1px 1px 0px #707070;
    "> + <?=$stats_data["new_users"]; ?><BR />СЕГОДНЯ</a></span></div><div class="fu2"><img src="/img/t1.png" width="60" height="60"></div>

<div class="f3"><span style="color:#FFF;
    font-family: Lasco_Bold;
    font-size:16px;text-shadow: 1px 1px 0px #080808, 1px 1px 0px #707070; 
    "><?=sprintf("%.2f",$stats_data["all_insert"]); ?><BR />ПОПОЛНЕНО РУБЛЕЙ</a></span></div><div class="fu3"><img src="/img/f2.png" width="60" height="60"></div>

<div class="f4"><a href="/payments"><span style="color:#FFF;
    font-family: Lasco_Bold;
    font-size:16px;text-shadow: 1px 1px 0px #080808, 1px 1px 0px #707070; 
    "><?=sprintf("%.2f",$stats_data["all_payment"]); ?><BR />ВЫПЛАЧЕНО РУБЛЕЙ</a></span></div><div class="fu4"><img src="/img/f3.png" width="60" height="60"></div></a>

<div class="f5"><span style="color:#FFF;
    font-family: Lasco_Bold;
    font-size:16px;text-shadow: 1px 1px 0px #080808, 1px 1px 0px #707070; 
    "><font color="#FF4500"><?=intval(((time() - $config->SYSTEM_START_TIME) / 86400 ) +1); ?></font><BR />ДНЕЙ</span></div><div class="fu5"><img src="/img/f4.png" width="60" height="60"></div>

					</center>

				</div>
			
			
			
			
	</body>
</html>
