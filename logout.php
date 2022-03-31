<?php
    	//セッションの開始
		session_start();	
		
		//スーパーグローバル変数からログイン状態などを削除
		$_SESSION['sessid'] = FALSE;
		$_SESSION['uname'] = FALSE;
		$_SESSION = array();
		
		//新しいセッションに切り替える
		session_regenerate_id();
		
		//ログイン画面へ移動
		header("Location: http://{$_SERVER['SERVER_NAME']}:8888/chap6-3/login_form.php");
		exit();
	?>
