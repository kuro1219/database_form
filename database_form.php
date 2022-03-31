<?php
session_start(); //セッションの開始
//ログイン状態の確認
if(!isset($_SESSION['uname'])) {
	//echo "NO USER";
	//新しいセッションに切り替える
	session_regenerate_id();

	//ログインしていない(不正アクセス)のためログイン画面へ移動
	header("Location: http://{$_SERVER['SERVER_NAME']}:8888/chap6-3/login_form.php");
	exit();
}

$link = mysqli_init();

// MySQLに接続する。ユーザ名とパスワードは，自分がサーバに用意したものを書く
// 使用するデータベースを選択する
$db = mysqli_real_connect(
	$link, 'localhost:8889', 'kuromi', 'kuroharu1219', 'support_db', 8889);
if (! $db) {
	exit ('MySQLには接続できません．');
}
mysqli_set_charset($link, 'utf8'); // 教科書にはないが必要


//フォームに入力されているかどうか
$snum = "";
if(isset($_GET['snum'])){
	$snum = @trim($_GET['snum']);

	//SELECTコマンドを実行
	$query="select * from gakusei_t where snumber = $snum";
	$result = mysqli_query($link,$query);
			if(!$result){
					exit('コマンドを実行できません.');
			}
}
?>

	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
		  "http://www.w3.org/TR/html4/strict.dtd">
	<html>
	  <head>
	    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
	    <title>Webシステム(ログイン成功後のWebページ)</title>
	  </head>
	  <body>
	  	<h1>ログイン成功</h1>
	    <p>データベースを検索できます．</p>

    <form action="" method="GET">
    	<p>学籍番号：<input type="text" name="snum" value="
        <?php
			echo $snum
		?>
        "><input type="submit" value="送信する" />
        </p>
	</form>
    <p>
     <?php
	 if(isset($snum)!="" && is_numeric($snum) && mysqli_num_rows($result)==1){
	   $row = mysqli_fetch_array($result);
	   echo "<table border=\"1\">\n";
	   echo "<tr>\n";
	   echo "<th>学籍番号</th>\n";
	   echo "<th>氏名</th>\n";
	   echo "<th>出身</th>\n";
	   echo "<th>クラス</th>\n";
	   echo "</tr>\n";
	   echo "<tr>\n";
	   echo "<td align='right'>" . $row['snumber'] . "</td>\n";
	   echo "<td>" . $row['sname'] . "</td>\n";
	   echo "<td>" . $row['syusshin'] . "</td>\n";
	   echo "<td align='right'>" . $row['class'] . "</td>\n";
	   echo "</tr>\n";
	   echo "</table>";
	 }
 	?>
    </p>
     <p><a href="logout.php">[ログアウト]</a></p>
  </body>
</html>
