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
$user = intval($_POST["text"]);
$stavka = intval($_POST['stavka']);
# Настройки цены игры
$cenaigri = 100;
	
	$db->Query("SELECT * FROM db_users_b WHERE id = '$user' LIMIT 1");
	$us_data = $db->FetchArray();
	$log = $us_data['user'];
	$dat = time();
    if($user == $_SESSION['user_id']) {
	if($us_data['money_b'] >= $cenaigri ) {
	
	$rand = rand(1, 5);

	}else echo "<center><img src='/orelreshka/stoped/stoped.gif' name='example_img' style='width: 550px;'><img src='/orelreshka/netdeneg.png' style='margin-top: -396px; margin-left: 135px;'></center>";


	}else echo "<center><img src='/orelreshka/stoped/stoped.gif' name='example_img' style='width: 550px;'><img src='/orelreshka/mislstoped.png' style='margin-top: -396px; margin-left: 135px;'></center>";

$lsb = time();

		if($rand == 1) {
			$win = 1;
			$cenaigri;
			echo "<center><img src='/orelreshka/stoped/tarvigr.gif' name='example_img' style='width: 550px;'><img src='/orelreshka/mislvigr.png' style='margin-top: -396px; margin-left: 135px;'></center>";	
			$db->Query("UPDATE db_users_b SET money_b = money_b - '$cenaigri' WHERE id = '$user'");
			$db->Query("UPDATE db_users_b SET money_b = money_b + '200' WHERE id = '$user'");
			$db->Query("INSERT INTO db_penny (login, sum, date, win) VALUES ('$log', '200 Серебро', '$dat', '$win')");
			
					
		}elseif($rand == 2) { 
		    $win = 0;
			$cenaigri;
			echo "<center><img src='/orelreshka/stoped/mekprogr.gif' name='example_img' style='width: 550px;'><img src='/orelreshka/mislprogr.png' style='margin-top: -396px; margin-left: 135px;'></center>";	
			$db->Query("UPDATE db_users_b SET money_b = money_b - '$cenaigri' WHERE id = '$user'");
            $db->Query("INSERT INTO db_penny (login, sum, date, win) VALUES ('$log', '$cenaigri Серебро', '$dat', '$win')");
			
			
		}elseif($rand == 3) { 
			$win = 1;
			$cenaigri;
			echo "<center><img src='/orelreshka/stoped/tarvigr.gif' name='example_img' style='width: 550px;'><img src='/orelreshka/mislvigr2.png' style='margin-top: -396px; margin-left: 135px;'></center>";	
			$db->Query("UPDATE db_users_b SET money_b = money_b - '$cenaigri' WHERE id = '$user'");
			$db->Query("UPDATE db_users_b SET money_b = money_b + '200' WHERE id = '$user'");
			$db->Query("INSERT INTO db_penny (login, sum, date, win) VALUES ('$log', '200 Серебро', '$dat', '$win')");
			
			
		}elseif($rand == 4) { 
		    $win = 0;
			$cenaigri;
			echo "<center><img src='/orelreshka/stoped/mekprogr.gif' name='example_img' style='width: 550px;'><img src='/orelreshka/mislprogr2.png' style='margin-top: -396px; margin-left: 135px;'></center>";	
			$db->Query("UPDATE db_users_b SET money_b = money_b - '$cenaigri' WHERE id = '$user'");
            $db->Query("INSERT INTO db_penny (login, sum, date, win) VALUES ('$log', '$cenaigri Серебро', '$dat', '$win')");
			
			
		}elseif($rand == 5) { 
		    $win = 0;
			$cenaigri;
			echo "<center><img src='/orelreshka/stoped/mekprogr.gif' name='example_img' style='width: 550px;'><img src='/orelreshka/mislprogr2.png' style='margin-top: -396px; margin-left: 135px;'></center>";	
			$db->Query("UPDATE db_users_b SET money_b = money_b - '$cenaigri' WHERE id = '$user'");
            $db->Query("INSERT INTO db_penny (login, sum, date, win) VALUES ('$log', '$cenaigri Серебро', '$dat', '$win')");
			
			
		}
		
	
?>
