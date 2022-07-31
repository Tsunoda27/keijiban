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
                    <li><a href="keijiban.php">ログイン</a></li>
                    <li><a href="form2.php">問い合わせ</a></li>
                </ul>
            </nav>
        </header>
    </div>
    <?php
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");
    $to = $_POST['to'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    if (mb_send_mail($to, $title, $content)) {
        echo "メールを送信しました";
    } else {
        echo "メールの送信に失敗しました";
    };
    ?>
</body>

</html>
