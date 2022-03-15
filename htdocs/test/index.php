<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Test</title>
</head>
<body>
<input id="textBox" action="text" value=""/>
<button id ="btn">ボタン</button>
<button id ="seni">ページ遷移</button>

  <?php?>
  <script src="jquery-2.1.3.min.js"></script>
  <script>
  $('#btn').click(function(){
    let name = $('#textBox').val();
    console.log(name);
    let str = "こんにちは名前さん";
    console.log(str);
    let strChange=str.replace("名前",name);
    console.log(strChange);
  });
  $('#seni').click(function(){
    location.href = 'https://www.youtube.com/';
  });
// http://localhost/finalkadai/
  </script>
</body>
</html>