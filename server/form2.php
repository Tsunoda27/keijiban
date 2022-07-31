<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>問い合わせ</title>
    <meta name="description" content="テキストテキストテキストテキストテキストテキストテキストテキスト">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div>
        <header id="header" class="wrapper">
            <h1 class="site-title"><a href="index.php"><img src="img/logo.png" alt="私とみんなの目標掲示板"></a></h1>
            <nav>
                <ul>
                    <li><a href="index.php#about">コンセプト</a></li>
                    <li><a href="index.php#service">サービス</a></li>
                    <li><a href="keijiban.php">掲示板</a></li>
                    <li><a href="login.php">ログイン</a></li>
                    <li><a href="form2.php">問い合わせ</a></li>
                </ul>
            </nav>
        </header>
    </div>
    <div class="contact-form">
        <p class="title">お問合せ</p>

        <form action="kyoiku.chikara@gmail.com" method="post"></form>
        <div class="item">
            <label class="formlabel">ニックネーム</label><br>
            <input type="text" class="inputs" name="name" required>
        </div>

        <div class="item">
            <label class="formlabel">メールアドレス</label><br>
            <input type="email" class="inputs" name="email" required>
        </div>

        <div class="item">
            <label class="formlabel">ご質問・ご要望等</label><br>
            <textarea class="inputs" placeholder="ご質問・ご要望はこちら" required></textarea>
        </div>

        <div class="button-area">
            <input type="submit" value="問い合わせる">
            <input type="reset" value="リセット">
        </div>
    </div>
    </form>
</body>

</html>
