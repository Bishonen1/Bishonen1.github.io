<?PHP
$_OPTIMIZATION["title"] = "ТОП 20";
$user_id = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users_a, db_users_b WHERE db_users_a.id = db_users_b.id AND db_users_a.id = '$user_id'");
$prof_data = $db->FetchArray();
?>

<script type="text/javascript">
$(document).ready(function() { 
    $("#first-tab").addClass('buttonHover');
});

function navigate_tabs(container, tab)
{    
    $(".b").css('display' , 'none');
    $(".c").css('display' , 'none');
    $(".d").css('display' , 'none');
    $(".a").css('display' , 'none');
    
    
    $("#first-tab").removeClass('buttonHover');
    $("#second-tab").removeClass('buttonHover');
    $("#third-tab").removeClass('buttonHover');
    $("#forth-tab").removeClass('buttonHover');
    
    $("#"+tab).addClass('buttonHover');
    $("."+container).show('slow');
}
</script> 
<div id="wrap1" >
<div class="s-bk-lf">
	<div class="acc-title2"></div>
</div>
<center>

    <a href="javascript:navigate_tabs('a','first-tab');"  class="buttons" id="first-tab">ТОП-20 по вводу</a>  
    <a href="javascript:navigate_tabs('b','second-tab');" class="buttons" id="second-tab">ТОП-20 по выводу</a>
    <!--<a href="javascript:navigate_tabs('c','third-tab');" class="buttons" id="third-tab">Топ-20 по рейтингу</a>--> 
    <a href="javascript:navigate_tabs('d','forth-tab');" class="buttons" id="forth-tab">Топ-20 по рефералам</a>      
    <br clear="all" />
    <div id="body" align="center">
        



<div class="a">
 <?PHP

$num_p = (isset($_GET["page"]) AND intval($_GET["page"]) < 1000 AND intval($_GET["page"]) >= 1) ? (intval($_GET["page"]) -1) : 0;
$lim = $num_p * 100;

$db->Query("SELECT * FROM db_users_b ORDER BY insert_sum DESC LIMIT 20");

if($db->NumRows() > 0){

?>           	




<table cellpadding='3' cellspacing='0' border='0' bordercolor='#336633' align='center' width='98%'>
 <tr height='25' valign=top align=center>
    <td class="m-tb">Место</td>
    <td class="m-tb">Пользователь</td>
	<td class="m-tb">Пополнил</td>
  
  </tr>
  <?PHP
$i = 0;
	while($data = $db->FetchArray()){
	$i=$i+1;


	?>

	<tr class="htt">
    <td align="center"><?=$i; ?></td>
    <td align="center"><?=$data["user"]; ?></td>
	<td align="center"><?=$data["insert_sum"]; ?></td>
	
		
  	</tr>
	<?PHP
	
	}

?>
</table>
<BR />
 <?PHP

}
?>
        </div>
		
	<?PHP

$user_id = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users_a, db_users_b WHERE db_users_a.id = db_users_b.id AND db_users_a.id = '$user_id'");
$prof_data = $db->FetchArray();
?>
<?PHP

$num_p = (isset($_GET["page"]) AND intval($_GET["page"]) < 1000 AND intval($_GET["page"]) >= 1) ? (intval($_GET["page"]) -1) : 0;
$lim = $num_p * 100;

$db->Query("SELECT * FROM db_users_b ORDER BY payment_sum DESC LIMIT 20");

if($db->NumRows() > 0){

?>	
<div class="b">




<table cellpadding='3' cellspacing='0' border='0' bordercolor='#336633' align='center' width='98%'>
 <tr height='25' valign=top align=center>
    <td class="m-tb">Место</td>
    <td class="m-tb">Пользователь</td>
	<td class="m-tb">Вывел</td>
  
  </tr>
 
<?PHP
$i = 0;
	while($data = $db->FetchArray()){
	$i=$i+1;


	?> 

	<tr class="htt">
    <td align="center"><?=$i; ?></td>
    <td align="center"><?=$data["user"]; ?></td>
	<td align="center"><?=$data["payment_sum"]; ?></td>
	
		
  	</tr>	

	<?PHP
	
	}

?>
		
	</table>
<BR />
<?PHP

}
?>
</div>	

<?PHP

$user_id = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users_a, db_users_b WHERE db_users_a.id = db_users_b.id AND db_users_a.id = '$user_id'");
$prof_data = $db->FetchArray();
?>
<?PHP

$num_p = (isset($_GET["page"]) AND intval($_GET["page"]) < 1000 AND intval($_GET["page"]) >= 1) ? (intval($_GET["page"]) -1) : 0;
$lim = $num_p * 100;

$db->Query("SELECT * FROM db_users_a ORDER BY referals DESC LIMIT 20");

if($db->NumRows() > 0){

?>
		
<div class="d">




<table cellpadding='3' cellspacing='0' border='0' bordercolor='#336633' align='center' width='98%'>
 <tr height='25' valign=top align=center>
    <td class="m-tb">Место</td>
    <td class="m-tb">Пользователь</td>
	<td class="m-tb">Рефералов</td>
  
  </tr>
  
  <?PHP
$i = 0;
	while($data = $db->FetchArray()){
	$i=$i+1;


	?>

	<tr class="htt">
    <td align="center"><?=$i; ?></td>
    <td align="center"><?=$data["user"]; ?></td>
	<td align="center"><?=$data["referals"]; ?></td>
	
		
  	</tr>		
		
	<?PHP
	
	}

?>	

</table>
<BR />
<?PHP

}
?>
</div>
		
</div>  
</div>

</center>

								
							<div class="clr"></div>	

						<div class="clr"></div>
	
		
		
		
		
		