<?php

// 関数ファイルを読み込む
require_once __DIR__ . '/common/functions.php';

// データベースに接続
$dbh = connect_db();

// セッション開始
session_start();

$current_user = '';

if (isset($_SESSION['current_user'])) {
    $current_user = $_SESSION['current_user'];
}

?>

<!DOCTYPE html>
<html lang="ja">
<?php include_once __DIR__ . '/_head.php' ?>

<body>
    <?php include_once __DIR__ . '/_header.php' ?>
    <?php if (!empty($current_user)) : ?>
        <a href="keijiban_kakikomi.php" class="add_button">
            <i class="fa-solid fa-plus"></i>
        </a>
    <?php endif; ?>
    <main>
        <div id="mainvisual">
            <img src="img/mainvisual.jpg" alt="mainvisual">
        </div>

        <section id="about" class="wrapper">
            <h2 class="section-title">コンセプト</h2>
            <div class="content">
                <img src="img/about.png" alt="about">
                <div class="text">
                    <h3 class="content-title">目標掲示板とは</h3>
                    <p>
                        目標管理は、人生設計だと私は思う。<br>
                        今日やることに追われると、人生の目的を見失うことがある。<br>
                        自分の人生を設計し、そのゴールに向かって今日を過ごそう。<br>
                        自分で考えること、そして人の目標から学ぶこと。<br>
                        目標掲示板を使えば、なりたいあなたに一歩近づく。<br>
                        さぁ、自分の人生を考える一歩を、今踏み出そう。<br>
                    </p>
                </div>
            </div>
        </section>

        <section id="service" class="wrapper">
            <h2 class="section-title">サービス</h2>
            <ul>
                <li>
                    <a href="keijiban.php"><img src="img/service1.png" alt="service1"></a>
                    <h3 class="content-title">私の目標管理</h3>
                    <p>
                        •自分の目標を設定する<br>
                        •自分自身を振り返る<br>
                        •新しい目標を立てる<br>
                        あなたの目標が、みんなの人生を変える<br>
                    </p>
                </li>
                <li>
                    <a href="keijiban.php"><img src="img/service2.png" alt="service2"></a>
                    <h3 class="content-title">みんなの目標管理</h3>
                    <p>
                        •みんなの目標を見て勇気をもらう<br>
                        •多様な価値観に触れる<br>
                        •ステキなところを参考に!<br>
                        •私の人生を見直す機会に!<br>
                    </p>
                </li>
                <li>
                    <a href="form.php"><img src="img/service3.png" alt="service3"></a>
                    <h3 class="content-title">管理人へ問合せ</h3>
                    <p>ITスキルの低い管理人が、<br>
                        一生懸命対応します。<br>
                    </p>
                </li>
            </ul>
        </section>
    </main>

    <?php include_once __DIR__ . '/_footer.php' ?>

</body>

</html>
