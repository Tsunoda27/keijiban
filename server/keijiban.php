<?php

// 関数ファイルを読み込む
require_once __DIR__ . '/common/functions.php';

// データベースに接続
$dbh = connect_db();

$lists = display_list();
$keyword = '';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $keyword = filter_input(INPUT_GET, 'keyword');
    $keyword_param = '%' . $keyword . '%';
    $lists = search_list($keyword_param);
}

?>

<!DOCTYPE html>
<html lang="ja">
<?php include_once __DIR__ . '/_head.php' ?>

<body>
    <?php include_once __DIR__ . '/_header.php' ?>

    <main>
        <section class="kakikomilink">
            <a href="keijiban_kakikomi.php" class="add_button">
                <i class="fa-solid fa-plus"></i>
            </a>
        </section>

    <h2>わたしとみんなの目標掲示板</h2>

    <form action="keijiban.php" method="get">
        <span>キーワード:</span>
        <input type="search" name="keyword" placeholder="キーワードの入力">
        <input type="submit" value="検索"><br>
    </form>

    <?php foreach ($lists as $list) : ?>
        <br>
        <p><?= 'ニックネーム' . PHP_EOL . h($list['name']) ?></p>
        <p><?= '私の生きる目的' . PHP_EOL . h($list['goal']) ?></p>
        <p><?= '目的を達成するための目標' . PHP_EOL . h($list['target']) ?></p>
        <p><?= '目標を達成するためのアクション' . PHP_EOL . h($list['action']) ?></p>
        <p><?= '目的達成における不安要素' . PHP_EOL . h($list['anxiety']) ?></p>
        <p><?= '私の性格特性' . PHP_EOL . h($list['personality']) ?></p>
        <p><?= '目標達成の期日' . PHP_EOL . h($list['deadline']) ?></p>
        <p><?= '投稿日時' . PHP_EOL . h($list['creared_at']) ?></p>
        <br>
        <hr>
    <?php endforeach; ?>

    </main>

    <?php include_once __DIR__ . '/_footer.php' ?>

</body>

</html>
