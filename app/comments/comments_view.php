<?php
require_once 'comments.php';
?>

<section>
    <h1>Оставьте свой комментарий</h1>

    <form method="POST" class="comment-form">
        <div class="form-group">
            <label for="username">Ваше имя:</label>
            <input type="text" id="username" name="username" required>
        </div>

        <div class="form-group">
            <label for="comment">Комментарий:</label>
            <textarea id="comment" name="comment" required></textarea>
        </div>

        <button type="submit" class="submit-button">Добавить</button>
    </form>

    <h2>Комментарии</h2>

    <?php if (!empty($comments)): ?>
        <ul class="comment-list">
            <?php foreach ($comments as $comment): ?>
                <li class="comment-item">
                    <div class="comment-header">
                        <strong class="username">
                            <?= htmlspecialchars($comment['username'], ENT_QUOTES, 'UTF-8') ?>
                        </strong>
                        <span class="timestamp">
                            (<?= date('d.m.Y H:i', strtotime($comment['created_at'])) ?>)
                        </span>
                    </div>
                    <div class="comment-body">
                        <?= nl2br(htmlspecialchars($comment['comment'], ENT_QUOTES, 'UTF-8')) ?>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p class="no-comments">Пока нет комментариев. Будьте первым!</p>
    <?php endif; ?>
</section>
