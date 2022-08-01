<?php

// 関数ファイルを読み込む
require_once __DIR__ . '/common/functions.php';

// データベースに接続
$dbh = connect_db();
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
    </main>

    <?php include_once __DIR__ . '/_footer.php' ?>

</body>

</html>
