<?php
session_start();  	//セッションの開始
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
	  "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <title>セッションの管理(PHP)</title>
  </head>
  <body>
  	<h1>セッションを利用したカウンタ</h1>
    <p>
    <?php
		//session_start();  	//セッションの開始

		//出力
		echo "このページへのアクセスは, ";

		//セッションでカウンタが記録されているかどうか
		if(isset($_SESSION['counter'])){
			echo $_SESSION['counter'] . "回目です.";
		}else{
			$_SESSION['counter'] = 1;
			echo "はじめてです.";
		}

		//カウンタの更新
		$_SESSION['counter']++;
		//echo $_SESSION['counter'] . "回目です.";
	?>
    </p>
  </body>
</html>
