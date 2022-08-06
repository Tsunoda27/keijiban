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
    // $lists = search_list($keyword_param); $listを更新してしまっているためDESC効かなかった
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

    <h2 class="keijiban_title">わたしとみんなの目標掲示板</h2>

    <form action="keijiban.php" method="get">
        <span>みんなの目標を検索:</span>
        <input type="search" name="keyword" placeholder="検索ワードの入力">
        <input type="submit" value="検索"><br>
    </form>

    <?php foreach ($lists as $list) : ?>
        <br>
        <p class="keijiban_label">ニックネーム</p>
        <p class="keijiban_answer"><?= h($list['name']) ?></p><br>
        <p class="keijiban_label">私の生きる目的</p>
        <p class="keijiban_answer"> <?= h($list['goal']) ?></p><br>
        <p class="keijiban_label">目的を達成するための目標</p>
        <p class="keijiban_answer"><?= h($list['target']) ?></p><br>
        <p class="keijiban_label">目標を達成するためのアクション</p>
        <p class="keijiban_answer"><?= h($list['action']) ?></p><br>
        <p class="keijiban_label">目的達成における不安要素</p>
        <p class="keijiban_answer"><?= h($list['anxiety']) ?></p><br>
        <p class="keijiban_label">私の性格特性</p>
        <p class="keijiban_answer"><?= h($list['personality']) ?></p><br>
        <p class="keijiban_label">目標達成の期日</p> 
        <p class="keijiban_answer"><?= h($list['deadline']) ?></p><br>
        <!-- <p>< '投稿日時' . PHP_EOL . h($list['creared_at']) ?></p> -->
        <hr class="kugirisen1">
        <hr class="kugirisen2">
    <?php endforeach; ?>

    </main>

    <?php include_once __DIR__ . '/_footer.php' ?>

</body>

</html>
