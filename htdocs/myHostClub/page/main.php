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
<h1>久しぶりだね。来てくれたんだ。ずっと待ってたよ。あの時は本当に楽しかった。</h1>
<h2>え・・・！？　初対面のはずだけど・・・　どうしよう。</h2>
<div class=nasio></div>
    <label>君の名前は・・・<input id="name" action="text" value=""/><br>
    <label>思い出の場所：<input id="place" action="text" value=""/><br>
    <button class="btn" id ="infoBtn">話を合わせる</button>




<script src="jquery-2.1.3.min.js"></script>
<script>
    $('#infoBtn').click(function(){
        let name = $('#name').val();
        let place = $('#place').val();
        // console.log(name,place);//あとで消す
        localStorage.setItem('name',name);
        localStorage.setItem('place',place);
        location.href = 'http://localhost/myHostClub/page/kanpai.php';
    });
</script>
</body>
</html>