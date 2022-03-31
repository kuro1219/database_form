<?php
   	//セッションの開始
	session_start();	
	
	//スーパーグローバル変数にセッションIDを格納
	$sess_id=session_id();
	$_SESSION['sessid'] = $sess_id;
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
	  "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <title>システム(ログイン画面)</title>
  </head>
  <body>
  	<h1>ログイン画面</h1>
  	<p>ユーザー名とパスワードを入力し、ログインして下さい.</p>
    <form action="login.php" method="POST">
    <p>
    <input type="hidden" name="sessid" value="
    	<?php
			echo $sess_id
		?>
     "/>
     ユーザー名：<input type="text" name="uname" value=""><br/>
     パスワード：<input type="password" name="passwd" value="">
     </p>
     <input type="submit" value="ログイン" />
     </form>
  </body>
  
</html>  
