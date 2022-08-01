<!DOCTYPE html>
<html>

<?php include_once __DIR__ . '/_head.php' ?>

<body>
    <?php include_once __DIR__ . '/_header.php' ?> <div class="contact-form">
        <p class="form_title">お問合せ</p>

        <form action="thanks.php" method="post">
        <!-- </form> -->
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

    <?php include_once __DIR__ . '/_footer.php' ?>
</body>

</html>
