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


$user_id = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users_a, db_users_b WHERE db_users_a.id = db_users_b.id AND db_users_a.id = '$user_id'");

$prof_data = $db->FetchArray();
	
?>

<div style="font-size:24px;font-weight: bold;margin: 10px 0px 0px 0px;"><font color="#328426">На балансе <?=sprintf("%.2f",$prof_data["money_b"]); ?> серебра.</font></div>