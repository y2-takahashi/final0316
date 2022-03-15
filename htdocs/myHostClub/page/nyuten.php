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
<h1>ここに話題のホスト"ひろし"がいるらしい。私もホストデビューしてみようかしら。</h1>
<div class=mainvisual></div>
<button class="btn" id="nyuten">入店する</button>
<script src="jquery-2.1.3.min.js"></script>
<script>
    $('#nyuten').click(function(){
        location = 'http://localhost/myHostClub/page/main.php';
    });
</script>
</body>
</html>