<link rel="shortcut icon" href="../favicon.ico">
<link rel="stylesheet" type="text/css" href="/css/normalize.css" />
<link rel="stylesheet" type="text/css" href="/css/vicons-font.css" />
<link rel="stylesheet" type="text/css" href="/css/base.css" />
<link rel="stylesheet" type="text/css" href="/css/buttons.css" />
<link rel="stylesheet" type="text/css" href="/assets/css/styles.css" />
<link rel="stylesheet" type="text/css" href="/style/style.css" />
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

<style>


.ttb td {
background: #33A049;
color: #FFFFFF;
border: 1px solid #33A049;
}
.ltb {
background: #E1FFC4;
border-bottom: 1px solid #33A049;
}
.ltb td {
border: 1px solid #33A049;
}
</style>

<div class="s-bk-lf">
	<div class="acc-title">Чат для свободного общения.</div>
</div>
<div class="silver-bk">	 <div class="clr"></div>
<script type="text/javascript" src="http://yandex.st/jquery/1.6.2/jquery.min.js"></script>
<script LANGUAGE="JavaScript1.1">
document.oncontextmenu = function(){return false;};
</script>


	

<?php
$_OPTIMIZATION["title"] = "Аккаунт - Чат";
if(!isset($_SESSION["user"]))
	return;

header("Content-type: text/html; charset=windows-1251");
$db->query("SET NAMES cp1251");
?>
<script type="text/javascript" src="/js/cookies.js" ></script>

<script type="text/javascript" src="/js/jqu.js" ></script>
<script type="text/javascript">
function insert_comm(open, close, no_focus)
{
  msgfield = (document.all) ? document.all.forma_com : document.forms['form_com']['comment'];
  if (document.selection && document.selection.createRange)
  {
    if (no_focus != '1' ) msgfield.focus();
	sel = document.selection.createRange();
	sel.text = open + sel.text + close;
	if (no_focus != '1' ) msgfield.focus();
	}else if (msgfield.selectionStart || msgfield.selectionStart == '0'){
	  var startPos = msgfield.selectionStart;
	  var endPos = msgfield.selectionEnd;
	  msgfield.value = msgfield.value.substring(0, startPos) + open + msgfield.value.substring(startPos, endPos) + close + msgfield.value.substring(endPos, msgfield.value.length);
	  msgfield.selectionStart = msgfield.selectionEnd = endPos + open.length + close.length;
	  if (no_focus != '1' ) msgfield.focus();
	    }else{
		msgfield.value += open + close;
		if (no_focus != '1' ) msgfield.focus();
		}return;}

		function reset_chat(){
			$.ajax({
				type: "POST",
				url: "/ajax/chat.php?p=get",
				data: "",
				success: function(result){
					if($("#chat #chat_scroll").html() != result)
						$("#chat #chat_scroll").html(result);
						$("#chat #chat_scroll").scrollTo(9999);
				}
			});
		}

    function reset_online(){
			$.ajax({
				type: "POST",
				url: "/ajax/chat.php?p=online",
				data: "",
				success: function(result){

						$("#chat #chat-online").html(result);

        }
			});
		}

		function reset_warning(){
			$("#chat .bbcode #warnings").text('');
		}

		function swich_close(){
			$('body').css('padding-bottom', '7px');
			$('#chat').css('bottom', '-150px');
			$.cookie('swich', 'close');
		}

		function swich_open(){
			$('body').css('padding-bottom', '157px');
			$('#chat').css('bottom', '-0px');
			$.cookie('swich', 'open');
		}

		$(function(){

			reset_chat();
      reset_online();

			setInterval(reset_chat, 17000);
      setInterval(reset_online, 15000);
			setInterval(reset_warning, 19000);

			$('#chat #form_com').submit(function(e){
				e.preventDefault();
				$.ajax({
					type: "POST",
					url: "/ajax/chat.php?p=send",
					data: $('#chat #form_com').serialize(),
					success: function(result){
						$("#chat .bbcode #warnings").html(result);
						if(result == '<span style="color:#0f0">Сообщение отправлено</span>'){
							$('#chat .message input[name="comment"]').val('');
							reset_chat();
						}
					}
				});

			});

			$('#chat #chat_scroll .user').click(function(){

				$('#chat .message input[name="comment"]').val($(this).text() + $('#chat .message input[name="comment"]').val());
			});

      $('#chat #chat-online .user').click(function(){

				$('#chat .message input[name="comment"]').val($(this).text() + $('#chat .message input[name="comment"]').val());
			});

		});
</script>
<style type="text/css" href="/style/style.css">

#chat{position:relative;
bottom:<?php
if(!isset($_SESSION['chathide']))
	$_SESSION["chathide"] = false;

if(isset($_GET['chats'])){
	if($_SESSION['chathide'] == false)
		$_SESSION["chathide"] = true;
	else
		$_SESSION["chathide"] = false;
}

echo $_SESSION['chathide'] == false?'10':'-155';
?>px; margin:0 auto; height:680px; width:815px; z-index:1; background:#7777; border:1px solid #777; border-radius:5px; outline:1px solid #b8ddb5; box-shadow: #000 0px 0px 3px 0px; margin-top:30px;}
#chat #chat_scroll{height:500px; width: 670px; display: inline-block; border-bottom:1px solid #fff; font-size:14px; padding:2px; overflow: auto; line-height:20px;}
#chat .swich{position:absolute; display:block; right:-2px; top:-31px; cursor:pointer; height:33px; width:155px; background:url(/img/chat/swich.png); text-align:center; line-height:33px;}
#chat #chat_scroll .user{font-weight:900; color:00f; text-decoration:underline; cursor:pointer;}
#chat #chat-online .user{font-weight:900; color:00f; text-decoration:underline; cursor:pointer;}
#chat #chat_scroll .user:hover{text-decoration:none;}
#chat #chat-online .user:hover{text-decoration:none;}
#chat #chat_scroll .to{background:#a4c5a3;}
#chat #chat_scroll .private{color:#f00;}
#chat #chat_scroll .time{color:#999;}
#chat #chat_scroll img{vertical-align:middle;}
#chat .bbcode, #chat .message{height:36px; line-height:25px; border-bottom:1px solid #fff;}
#chat .bbcode{padding:0 10px; color:#fff;}
#chat .bbcode img{padding:0 1px; vertical-align:middle; cursor:pointer;}
#chat .bbcode #warnings{font-weight:900;}
#chat .bbcode,{color=red;}
#chat .message input[name="comment"]{height:28px; width:400px; padding:0; margin:4px 10px; font-size:15px;}
#chat .message input[name="message_sub"]{height:28px; width:106px; border:1px solid #FF0000;}
#chat-online {
 width: 120px;
 display: inline-block;
 float: right;
 border-left: 1px solid #fff;
 border-bottom:1px solid #fff;
 height:500px;
 padding:4px 0px 0px 5px;
 overflow: auto;

}
</style>
<div id="chat">

	<div id="chat_scroll">loading...</div>
  <div id="chat-online">loading...</div>
  <div id="clear: both;"></div>
	 <div class="bbcode">
          <img onclick="insert_comm('','[b\] [/b]')" src="/img/chat/bb/b.gif" alt="" />
 <img onclick="insert_comm('','[i\] [/i]')" src="/img/chat/bb/i.gif" alt="" />
<img onclick="insert_comm('','[u\] [/u]')" src="/img/chat/bb/u.gif" alt="" />
<img onclick="insert_comm('','[s\] [/s]')" src="/img/chat/bb/s.gif" alt="" />
<select id="id-color" style="width: 80px; height: 28px; padding: 0; margin: 0;" onchange='insert_comm("","[color="+$("#id-color").val()+"\] [/color]");'>
  <option value="black" selected>Цвет</option>
  <option style="color: #0000FF;" value="blue">Голубой</option>
  <option style="color: #00008B;" value="darkblue">Темно-синий</option>
  <option style="color: #8309D7;" value="violet">Фиолетовый</option>
  <option style="color: #F9023F;" value="red">Красный</option>
  <option style="color: #00FF00;" value="green">Зеленый</option>
  <option style="color: #000000;" value="black">Черный</option>
  <option style="color: #FFFF00;" value="yellow">Желтый</option>
 </select>





		<span id="warnings"></span>
	</div>
	<div class="message">
		<form id="form_com" action="#form_com" method="post">
			<input type="text" id="comment" name="comment" value="" maxlength="255" />
			<input type="hidden" name="to" />
			 <input type="submit" name="message_sub" value="Отправить" />
<hr><center>
<b>Смайлы:</b>
<div class="bbcode">
<img onclick="insert_comm('','*stop*')" src="/img/chat/smile/stop.gif" alt="" />
         <img onclick="insert_comm('','*shoot2*')" src="/img/chat/smile/shoot2.gif" alt="" />
		<img onclick="insert_comm('','*unsmile*')" src="/img/chat/smile/unsmile.gif" alt="" />
		<img onclick="insert_comm('','*smoke*')" src="/img/chat/smile/smoke.gif" alt="" />
		<img onclick="insert_comm('','*inlove*')" src="/img/chat/smile/inlove.gif" alt="" />
		<img onclick="insert_comm('','*tup*')" src="/img/chat/smile/tup.gif" alt="" />
<img onclick="insert_comm('','*rofl*')" src="/img/chat/smile/rofl.gif" alt="" />
<img onclick="insert_comm('','*devil*')" src="/img/chat/smile/devil.gif" alt="" />
<img onclick="insert_comm('','*boyan*')" src="/img/chat/smile/boyan.gif" alt="" />
<img onclick="insert_comm('','*helpless*')" src="/img/chat/smile/helpless.gif" alt="" />
<img onclick="insert_comm('','*burumburum*')" src="/img/chat/smile/burumburum.gif" alt="" />
<img onclick="insert_comm('','*spasibo*')" src="/img/chat/smile/spasibo.gif" alt="" />
<img onclick="insert_comm('','*draznilka*')" src="/img/chat/smile/draznilka.gif" alt="" />
<img onclick="insert_comm('','*popa*')" src="/img/chat/smile/popa.gif" alt="" />
<img onclick="insert_comm('','*smutili*')" src="/img/chat/smile/smutili.gif" alt="" />
<img onclick="insert_comm('','*mmmm*')" src="/img/chat/smile/mmmm.gif" alt="" />
<img onclick="insert_comm('','*yazyk*')" src="/img/chat/smile/yazyk.gif" alt="" />
<img onclick="insert_comm('','*beer3*')" src="/img/chat/smile/beer3.gif" alt="" />
<img onclick="insert_comm('','*prostite*')" src="/img/chat/smile/prostite.gif" alt="" />
<img onclick="insert_comm('','*beat*')" src="/img/chat/smile/beat.gif" alt="" />
<img onclick="insert_comm('','*clap*')" src="/img/chat/smile/clap.gif" alt="" />
<img onclick="insert_comm('','*music*')" src="/img/chat/smile/music.gif" alt="" />
<img onclick="insert_comm('','*bye*')" src="/img/chat/smile/bye.gif" alt="" />
<img onclick="insert_comm('','*kiss*')" src="/img/chat/smile/kiss.gif" alt="" />
<img onclick="insert_comm('','*lol*')" src="/img/chat/smile/lol.gif" alt="" />
<img onclick="insert_comm('','*pissed*')" src="/img/chat/smile/pissed.gif" alt="" />
<img onclick="insert_comm('','*hilarious*')" src="/img/chat/smile/hilarious.gif" alt="" />
</div>
</center>
			 <br>
</div>
</div>
		</form>
	 <div class="clr"></div>
</div>