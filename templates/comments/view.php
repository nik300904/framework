<?php include __DIR__ . '/../header.php'; ?>
    <h1><?= $article->getName() ?></h1>
    <p><?= $article->getText() ?></p>
    <p>Автор: <?= $article->getAuthor()->getNickname() ?></p>
    <?php
        $pattern = '~articles/(\d+)comments~';
        preg_match($pattern, $_GET['route'], $matches);
        $i = 1;
    ?>
    <?php foreach ($comments as $comment): ?>
       <?php if ($comment->getArticleId() == $matches[1]): ?>
        <p>
            Комментарий: <?= $comment->getText() ?>
        <form action="/framework/www/articles/<?= $i ?>/comments/edit" method="post">
            <label><input type="text" name="text"></label>

            <br><br>

            <input type="submit" value="Редактировать">
        </form>
<!--            <button onClick='location.href="http://localhost/framework/www/articles/--><?php //= $i ?><!--/comments/edit"' style="margin-left: 20px">Редактировать</button>-->
        </p>
        <?php
//            if (!empty($_POST["text"])) {
//                header("Location: http://localhost/framework/www/articles/$matches[1]/comments");
//            }
        ?>
        <?php endif; ?>
        <?php $i++ ?>
    <?php endforeach; ?>
<?php include __DIR__ . '/../footer.php'; ?>