<?PHP
$tfstats = time() - 60*60*24;
$db->Query("SELECT 
(SELECT COUNT(*) FROM db_users_a) all_users,
(SELECT SUM(insert_sum) FROM db_users_b) all_insert, 
(SELECT SUM(payment_sum) FROM db_users_b) all_payment, 
(SELECT COUNT(*) FROM db_users_a WHERE date_reg > '$tfstats') new_users");
$stats_data = $db->FetchArray();

?>
	
