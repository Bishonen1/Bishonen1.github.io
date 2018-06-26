<?php
# Старт сессии
@session_start();
# Константа для Include
define("CONST_RUFUS", true);

# Автоподгрузка классов
function __autoload($name){ include("classes/_class.".$name.".php");}

# Класс конфига 
$config = new config;

# Функции
$func = new func;

# База данных
$db = new db($config->HostDB, $config->UserDB, $config->PassDB, $config->BaseDB);
	
?>


<table cellpadding='3' cellspacing='0' border='0' bordercolor='#336633' align='center' width="99%">
  
 <tr>
    <td colspan="5" align="center"><h4>Список последних 20 игр</h4></td>
    </tr>
  <tr>
    <td align="center" width="100" class="m-tb">№</td>
    <td align="center" width="100" class="m-tb">Пользователь</td>
    <td align="center" width="100" class="m-tb">Сумма</td>
	<td align="center" width="100" class="m-tb">Дата</td>
	<td align="center" width="100" class="m-tb">Статус</td>
	
	
  </tr>
  <?PHP
  
  $db->Query("SELECT * FROM db_penny ORDER BY id DESC LIMIT 20");
  
	if($db->NumRows() > 0){
  
  	  	while($ref = $db->FetchArray()){
		if ($ref["win"] == 1) { 
		$winn = '<font color="green">Выиграл! :)</font>'; 
		}
       
	    if ($ref["win"] == 2) { 
		$winn = '<font color="blue">Возврат! :]</font>'; 
		}
	    
		if ($ref["win"] == 0) {
		$winn = '<font color="red">Проиграл! :( </font>'; 
		}
		
		$date = date('d-m-Y', $ref["date"]);
		?>
		<tr class="htt">
    		<td align="center"><?=$ref["id"]; ?></td>
    		<td align="center"><?=$ref['login']; ?></td>
    		<td align="center"><?=$ref['sum']; ?></td>
    		<td align="center"><?=$date; ?></td>
			<td align="center"><?=$winn; ?></td>
    		
  		</tr>
		<?PHP
		
		}
  
	}else echo '<tr><td align="center" colspan="5">Нет записей</td></tr>'
  
  ?>

 
</table>