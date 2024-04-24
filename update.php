<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $db->prepare("SELECT * FROM posts WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $post = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<form action="update.php" method="post">
    <input type="hidden" name="id" value="<?= $post['id'] ?>">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" value="<?= $post['title'] ?>"><br>
    <label for="content">Content:</label><br>
    <textarea id="content" name="content"><?= $post['content'] ?></textarea><br>
    <input type="submit" value="Update Post">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $stmt = $db->prepare("UPDATE posts SET title = :title, content = :content WHERE id = :id");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    echo "Post updated successfully!";
}
?>
