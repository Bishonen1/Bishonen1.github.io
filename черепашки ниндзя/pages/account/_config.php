<?PHP
$_OPTIMIZATION["title"] = "Аккаунт - Настройки";
$usid = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users_a WHERE id = '$usid'");
$user_data = $db->FetchArray();
?>
<div class="s-bk-lf">
	<div class="acc-title">Настройки</div>
</div>
<div class="silver-bk">
<div class="clr"></div>	
<?

if (isset($_FILES['file'])) {
    $f_err     = 0; //вспомогательная переменная
    $types     = array(
        '.jpg',
        '.JPG',
        '.jpeg',
        '.gif',
        '.png'
    ); //поддерживаемые форматы загружаемых файлов
    $max_size  = 502050; //максимальный размер загружаемого файла (5000-МБ)
    $path      = 'avatar/'; //директория для загрузки
    $path_mini = 'avatar/'; //директория для загрузки миниатюры
    $fname     = $_FILES['file']['name'];
	//$fname = md5($fname);
    $ext       = substr($fname, strpos($fname, '.'), strlen($fname) - 1); //определяем тип загружаемого файла

    //проверка на соответствие формата
    if (!in_array($ext, $types)) {
        $f_err++;
        $mess = '<p style="color:red;"><center>Загружаемый файл не является картинкой</center></p>';
    }

    //проверка размера файла
    if (filesize($_FILES['file']['tmp_name']) > $max_size) {
        $f_err++;
        $mess = '<p style="color:red;"><center>Размер загружаемой картинки превышает 5 Mb</center></p>';
    }

    //если файл успешно прошел проверку
    //перемещаем его в заданную директорию из временной
    if ($f_err == 0) {
        

        //путь к загруженному файлу
         $fname;

        //создаем путь и имя миниатюры
        $new_name     = md5($fname) . $ext;
        $resource_src = $path_mini . $new_name;

        //получаем параметры загруженного файла
        $params = getimagesize($source_src);

        switch ($params[2]) {
            case 1:
                $source = imagecreatefromgif($source_src);
                break;
            case 2:
                $source = imagecreatefromjpeg($source_src);
                break;
        }

        //если высота больше ширины
        //вычисляем новую ширину
        if ($params[1] > $params[0]) {
            $newheight = 150;
            $newwidth  = floor($newheight * $params[0] / $params[1]);
        }
        //если ширина больше высоты
        //вычисляем новую высоту
        if ($params[1] < $params[0]) {
            $newwidth  = 150;
            $newheight = floor($newwidth * $params[1] / $params[0]);
        }
		 //если они равны
        //вычисляем новую высоту
        if ($params[1] = $params[0]) {
            $newwidth  = 150;
    $newheight = 150;
            $newheight = floor($newwidth * $params[1] / $params[0]);
   $newwidth  = floor($newheight * $params[0] / $params[1]);
        }

        //создаем миниатюру загруженного изображения
        $resource = imagecreatetruecolor($newwidth, $newheight);
        imagecopyresampled($resource, $source, 0, 0, 0, 0, $newwidth, $newheight, $params[0], $params[1]);
        imagejpeg($resource, $resource_src, 80); //80 качество изображения

        //назначаем права доступа
        chmod("$source_src", 0644);
        chmod("$resource_src", 0644);

        //выводим сообщение
        $mess = '<center><br><p style="color:#FFFF00;"><center>Изображение загружено!</center></p></center>';
        $ok   = 1;
    }

//include("session.inc.php");
$file = str_replace($server['DOCUMENT_ROOT'], '/', $path_mini . $new_name); // получить путь вида '/img/avatars/15.jpg'
//mysql_query("UPDATE members SET avatar='$file' WHERE id='$userid';"); //Добавление в БД.
$db->Query("UPDATE db_users_a SET ava = '$file' WHERE id = '$usid'");

header('Refresh: 1;URL=/account/config/');


}



if(empty($user_data['ava'])) {
echo '<center><img src="/img/c50.gif"></center>';
}else{
echo '<center><img src="/'.$user_data['ava'].'"></center>';
}
?>





<h3 style="border-top: solid 1px #fff; padding-top: 10px;"></h3>

<center><h3><b>Смена пароля</b></h3></center>
<BR />
<?PHP
	if(isset($_POST["old"])){
	
	
		$old = $func->md5Password($_POST["old"]);
		$new = $func->md5Password($_POST["new"]);
		
			if($old !== false AND strtolower($old) == strtolower($user_data["pass"])){
			
				if($new !== false){
				
					if( strtolower($new) == strtolower($func->md5Password($_POST["re_new"]))){
					
						$db->Query("UPDATE db_users_a SET pass = '$new' WHERE id = '$usid'");
						
						echo "<center><div class='alert' id='good'>Новый пароль успешно установлен.</div></center>";
					
					}else echo "<center><div class='alert' id='error'>Пароль и повтор пароля не совпадают!</div></center>
";
				
				}else echo "<center><div class='alert' id='error'>Новый пароль имеет неверный формат!</div></center>
";
			
			}else echo "<center><div class='alert' id='error'>Старый пароль заполнен неверно!</div></center>
";
		
	}
?>


<form action="" method="post">
<table width="330" border="0" align="center">
  <tr>
    <td><b>Старый пароль:</b></td>
    <td align="center"><input type="password" name="old" /></td>
  </tr>
  <tr>
    <td><b>Новый пароль:</b></td>
    <td align="center"><input type="password" name="new" /></td>
  </tr>
  <tr>
    <td><b>Повтор пароля:</b></td>
    <td align="center"><input type="password" name="re_new" /></td>
  </tr>
  <tr>
    <td align="center" colspan="2"><BR /><input type="submit" value="Сменить пароль" class="btn_8"/></td>
  </tr>
</table>
</form>
<BR />
<div style="display: block;width: 100%;position: relative;margin: 20px auto 20px auto;height: 1px;background: rgb(244, 128, 0);border-radius: 1px;box-shadow: 0px 0px 2px 0px black;"></div>

<center><p style="font-weight: bold;">Если Вы хотите сменить номер кошелька , напишите нам с просьбой смены кошелька. <a style="font-family: time-new-roman;color: rgb(92, 125, 152);" href="/contacts" target="_blank">Наши контакты.</a></p></center>

<div style="display: block;width: 100%;position: relative;margin: 20px auto 20px auto;height: 1px;background: rgb(244, 128, 0);border-radius: 1px;box-shadow: 0px 0px 2px 0px black;"></div>


<br><br>
 <br><br>
<div class="clr"></div>		
</div>




