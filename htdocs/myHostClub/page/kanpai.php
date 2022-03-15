<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>myHostClub</title>
</head>
<body>
<!-- HTML -->
<div class="contents">
    
    <div class="gazou"><div id="f">一目見た瞬間、視界に入ったんだよ</div></div>
    <div class="mozi">
        <div id="a">ディスティニーって運命だと思う。</div>
        <div id="b">君と初めて会った時のこと、今でも覚えてる。</div>
        <div id="c">予備校の自習室で隣になった君。</div>
        <div id="d">一目見た瞬間、視界に入ったんだよ</div>
        <div id="e"></div>
        <button class="btn">乾杯！！</button>
    </div>
</div>
<!-- HTML END -->

<!-- PHP -->
<?php
//1.DB接続
try {
    $pdo = new PDO('mysql:dbname=mypoem;charset=utf8;host=localhost','root','root');
    } catch (PDOException $e) {
    exit('DBConnectError:'.$e->getMessage());
}
//２．データ取得：SQL
// $stmt = $pdo->prepare("SELECT * FROM poem"); //select name   from purchases LIMIT 1;
$stmt = $pdo->prepare("SELECT a,b,c,d,e FROM poem ORDER BY RAND() LIMIT 1");
$status = $stmt->execute();
//３．データ表示
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
    }else{
    //「2.」で取得したデータの数だけ自動でループしてくれるwhile文
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
    while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    // var_dump($result['a']);
    // var_dump($result['b']);
    // var_dump($result['c']);
    // var_dump($result['d']);
    // var_dump($result['e']);
    $a = $result['a'];
    // echo '<br>';
    // echo $a;
    // echo '<br>';
    $ary = array($result['a'],$result['b'],$result['c'],$result['d'],$result['e'],);
    // var_dump($ary);
    // PHPの配列をJson形式にする
    $json_array = json_encode($ary);
    // echo $json_array;
    }
}
?>
<!-- PHP END -->
<script src="jquery-2.1.3.min.js"></script>
<script>
    // nameとplaceを引き継ぐ
    let name  = localStorage.getItem('name');
    let place = localStorage.getItem('place');
    console.log(name,place);//確認用
    // poemのnameとplaceを変換する
    const js_array = JSON.parse('<?php echo $json_array; ?>');
    console.log(js_array);
    for(let i = 0; i<js_array.length; i++){
        js_array[i]=js_array[i].replace(/name/g,name);
        js_array[i]=js_array[i].replace(/place/g,place);
        console.log(js_array[i]);
    }
    // HTMLを書き換える
    $('#a').text(js_array[0]);
    $('#b').text(js_array[1]);
    $('#c').text(js_array[2]);
    $('#d').text(js_array[3]);
    $('#e').text(js_array[4]);
    $('#f').text(js_array[4]);

    // 乾杯
    $('.btn').click(function(){
        location.href = 'http://localhost/myHostClub/page/nyuten.php';
    });




</script>
</body>
</html>