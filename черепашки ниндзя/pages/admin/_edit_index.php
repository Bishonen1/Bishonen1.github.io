<div class="s-bk-lf">
	<div class="acc-title">Главная страница</div>
</div>
<div class="silver-bk"><div class="clr"></div>	
<?PHP

	if(isset($_POST["tx"])){
	
		$fid = fopen("cache/pages/index.txt", "w+");
		fwrite($fid, $_POST["tx"]);
		fclose($fid);
		
	}

?>

<form action="" method="post">
<textarea name="tx" cols="78" rows="25"><?=@file_get_contents("cache/pages/index.txt"); ?></textarea>
<BR /><BR />
<center><input type="submit" value="Сохранить" /></center>
</form>
</div>
<div class="clr"></div>	