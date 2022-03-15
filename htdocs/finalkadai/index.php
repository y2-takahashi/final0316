<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>MyPoem</title>
</head>
<body>
<!-- HTML -->
    <form method="どの通信メソッドで" action="どこへ">
        <div class="jumbotron">
            <fieldset>
                <legend>あなたのことを教えてください</legend>
                <label>名前：<input type="text" name="name"></label><br>
                <label><textArea name="body" rows="1" cols="30"></textArea></label>
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
    <button id="btn">ボタン</button>
    <div class="contents">
        <div class="gazou">画像</div>
        <div class="mozi">文字</div>
    </div>
<!-- HTML END -->

<!-- PHP -->
<?php
//1.  DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=mypoem;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//２．SQL文を用意(データ取得：SELECT文)
$stmt = $pdo->prepare("SELECT * FROM poem");
$status = $stmt->execute();

//３．データ表示
$view="";//空っぽの変数viewを作成（ここにHTMLタグを追加していく）

if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //「2.」で取得したデータの数だけ自動でループしてくれるwhile文
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    var_dump($result['a']);
    var_dump($result['b']);
    var_dump($result['c']);
    var_dump($result['d']);
    var_dump($result['e']);
    $a = $result['a'];
    echo '<br>';
    echo $a;
    echo '<br>';
    $ary = array($result['a'],$result['b']);
    var_dump($ary);
    // PHPの配列をJson形式にする
    $json_array = json_encode($ary);
    echo $json_array;
    // $view .= "<div class='arrow_box'>";
    // $view .= $result['a'];
    // $view .= "<br>";
    // $view .= $result['b'];
    // $view .= "<br>";
    // $view .= $result['c'];
    // $view .= "<br>";
    // $view .= $result['d'];
    // $view .= "<br>";
    // $view .= $result['e'];
    // $view .= "</div>";
  }
}
?>
<!-- PHP END -->

<script src="jquery-2.1.3.min.js"></script>
<script>
  const js_array = JSON.parse('<?php echo $json_array; ?>');

  $('#btn').click(function(){
    console.log(js_array);
    $('.mozi').text(js_array[0]);
  });
</script>


<!-- チャット内容の表示エリア -->
<!-- <div class=" jumbotron"><?php echo $view ?></div> -->

</body>
</html>