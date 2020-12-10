<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DB連携型todoリスト（入力画面）</title>
  <link rel="stylesheet" href="css/input.css">
</head>

<body>

  <button><a href="read.php">一覧画面</a></button>
  <br>
  <br>

  <form action="create.php" method="POST">

    <div class="form-wrapper">

      <div class=form-box1>
        <div class="form">
          nickname : <input type="text" name="nickname">
        </div>
        <div class="form">
          e-mail : <input type="text" name="mail">
        </div>
        <div class="form">
          <div class="radio-bt">
            分野 :
            <ul>
              <li><input type="radio" name="field" value="ファッション"> ファッション </li>
              <li><input type="radio" name="field" value="音楽"> 音楽</li>
              <li><input type="radio" name="field" value="アート"> アート</li>
              <li><input type="radio" name="field" value="社会福祉"> 社会福祉</li>
              <li><input type="radio" name="field" value="マンガ・ゲーム"> マンガ・ゲーム</li>
            </ul>
          </div>
        </div>
        <div class="form">
          自由ワード検索 : <input type="text" name="field_text">
        </div>

        <br>
        <div class="form-bt">
          <button>submit</button>
        </div>
        <br>

      </div>

      <div class=form-box2>
        <img class="img" src="img/hukyu.png" alt="">
      </div>

    </div>
    </div>
  </form>


  </div>




  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
</body>

</html>