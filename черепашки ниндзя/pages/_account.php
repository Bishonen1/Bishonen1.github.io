<?PHP
$_OPTIMIZATION["title"] = "Аккаунт";
$_OPTIMIZATION["description"] = "Аккаунт пользователя";
$_OPTIMIZATION["keywords"] = "Аккаунт, личный кабинет, пользователь";

# Блокировка сессии
if(!isset($_SESSION["user_id"])){ Header("Location: /"); return; }

if(isset($_GET["sel"])){
		
	$smenu = strval($_GET["sel"]);
			
	switch($smenu){
		
		case "404": include("pages/_404.php"); break; // Страница ошибки
		case "stats": include("pages/account/_story.php"); break; // Статистика
		case "kamikadze2": include("pages/account/_kamikadze2.php"); break; // kamikadze
		case "penny": include("pages/account/_penny.php"); break; // penny
		case "auc": include("pages/account/_auc.php"); break; //Аукцион
		case "igrun": include("pages/account/_igrun.php"); break; // Игрун
		case "referals": include("pages/account/_referals.php"); break; // Игрун
		case "farm": include("pages/account/_farm.php"); break; // Моя ферма
		case "store": include("pages/account/_store.php"); break; // Склад
		case "swap": include("pages/account/_swap.php"); break; // Обменный пункт
		case "market": include("pages/account/_market.php"); break; // Рынок
		case "payment": include("pages/account/_payment.php"); break; // Выплата WM
		case "payment_qiwi": include("pages/account/_payment_qiwi.php"); break; // Выплата QIWI
		case "insert": include("pages/account/_insert.php"); break; // Пополнение баланса
		case "config": include("pages/account/_config.php"); break; // Настройки
		case "bonus": include("pages/account/_bonus.php"); break; // Ежедневный бонус
		case "lottery": include("pages/account/_lottery.php"); break; // Лотерея
		case "serfing": include("pages/account/_serfing.php"); break; // Серфинг
		case "serfing_add": include("pages/account/_serfing_add.php"); break; // Добавление
		case "serfing_cabinet": include("pages/account/_serfing_cabinet.php"); break; // Мои ссылки
		case "serfing_moder": include("pages/account/_serfing_moder.php"); break; // Модераторская
		case "chat": include("pages/account/_chat.php"); break; // ЧАТ
		case "exit": @session_destroy(); Header("Location: /"); return; break; // Выход
				
	# Страница ошибки
	default: @include("pages/_404.php"); break;
			
	}
			
}else @include("pages/account/_user_account.php");

?>