<?php
   	//セッションの開始
	session_start();	
	
	//ログイン操作
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		//入力フォームの内容を取得する
		$uname=@trim($_POST['uname']);
		$passwd=@trim($_POST['passwd']);
		$sessid=@trim($_POST['sessid']);
		
		//セッションIDの確認
		if(!empty($sessid) && $sessid == $_SESSION['sessid']){
			//ユーザー名とパスワードの確認
			if($uname=="hattori" && $passwd == "akira"){
				//新しいセッションに切り替える
				session_regenerate_id();
				
				//スーパーグローバル変数にログイン状態(ユーザー名)を格納
				$_SESSION['uname']=$uname;
				
				//ログイン成功後のWebページへ遷移
				header("Location: http://{$_SERVER['SERVER_NAME']}:8888/chap6-3/database_form.php");
				exit();
			}
			
		}
	}
	//スーパーグローバル変数からログイン状態などを削除
	$_SESSION['sessid'] = FALSE;
	$_SESSION['uname'] = FALSE;
	$_SESSION = array();
	
	//新しいセッションに切り替える
	session_regenerate_id();
	
	//ログイン失敗のWebページへ移動
	header("Location: http://{$_SERVER['SERVER_NAME']}:8888/chap6-3/login_error.php");
?>
