<?php

$msg = '';
$err_msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $msg = $_POST['message'];

    // バリデーション
    if (empty($msg)) {
        $err_msg = '未入力です';
    }
}
?>

<!DOCTYPE html>
<html lang="ja">

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

    <main>
        <h1 class="section-title">問い合わせ</h1>
        <form action="" method="POST">
            <div>
                ニックネーム<br />
                <input type="text" name="user_name" value="" /><br><br>
                連絡先メールアドレス<br>
                <input type="text" name="mail_address" value="" /><br><br>
                お問い合わせ内容<br>
                <textarea name=""></textarea><br /><br />
        </form>
        <?php if ($err_msg) : ?>
            <ul>
                <li><?= $err_msg ?></li>
            </ul>
        <?php endif; ?>
        </div>
        <div>
            <input type="submit" value="問い合わせる">
        </div>
        </form>
        <div>
            <?= htmlspecialchars($msg, ENT_QUOTES, 'UTF-8') ?>
        </div>
    </main>

    <footer id="footer">
        <p>&copy; 2022 私とみんなの目標掲示板</p>
    </footer>

</body>

</html>
