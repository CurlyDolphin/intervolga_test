<?php

require_once 'db_config.php';

function addComment(string $username, string $comment): bool
{
    global $pdo;

    $query = "INSERT INTO comments (username, comment) VALUES (:username, :comment)";
    $statement = $pdo->prepare($query);

    $statement->bindValue(':username', $username, PDO::PARAM_STR);
    $statement->bindValue(':comment', $comment, PDO::PARAM_STR);

    return $statement->execute();
}

function fetchAllComments(): array
{
    global $pdo;

    $query = "SELECT * FROM comments ORDER BY created_at DESC";
    return $pdo->query($query)->fetchAll();
}

function sanitizeInput(string $input): string
{
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = !empty($_POST['username']) ? sanitizeInput($_POST['username']) : null;
    $comment = !empty($_POST['comment']) ? sanitizeInput($_POST['comment']) : null;

    if ($username && $comment) {
        $success = addComment($username, $comment);
        if (!$success) {
            error_log('Не удалось добавить комментарий.');
        }
    }
}

$comments = fetchAllComments();
