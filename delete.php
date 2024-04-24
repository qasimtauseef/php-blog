<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $db->prepare("DELETE FROM posts WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    echo "Post deleted successfully!";
}
?>
