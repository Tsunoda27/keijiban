  <?php
    // 関数ファイルを読み込む
    require_once __DIR__ . '/common/functions.php';

    // セッション開始
    session_start();

    $current_user = '';

    // パラメータが渡されていなければ一覧画面に戻す
    if (empty($_GET['user_id'])) {
        header('Location: index.php');
        exit;
    }

    if (isset($_SESSION['current_user'])) {
        $current_user = $_SESSION['current_user'];
    }

    $user_id = filter_input(INPUT_GET, 'user_id');

    // idを基にデータを取得
    $id = find_mydata($user_id);
    ?>

  <!DOCTYPE html>
  <html lang="ja">
  <?php include_once __DIR__ . '/_head.php' ?>

  <body>
      <?php include_once __DIR__ . '/_header.php' ?>

      <section class="main_content wrapper">
          <div class="content">
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
              <?php if (!empty($current_user) && $current_user['id'] == $id['user_id']) : ?>
                  <div class="button">
                      <a href="edit.php" class="edit_button">編 集</a>
                      <button class="delete_button" onclick="if (!confirm('本当に削除してよろしいですか？')) {return false};location.href='delete.php?photo_id=<?= h($photo['id']) ?>'">削 除</button>
                  </div>
              <?php endif; ?>
          </div>
          <hr class="kugirisen1">
          <hr class="kugirisen2">
      </section>

      <?php include_once __DIR__ . '/_footer.php' ?>
  </body>

  </html>
