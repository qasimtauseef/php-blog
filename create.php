<form action="create.php" method="post">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title"><br>
    <label for="content">Content:</label><br>
    <textarea id="content" name="content"></textarea><br>
    <input type="submit" value="Create Post">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $stmt = $db->prepare("INSERT INTO posts (title, content) VALUES (:title, :content)");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':content', $content);
    $stmt->execute();
    echo "Post created successfully!";
}
?>
