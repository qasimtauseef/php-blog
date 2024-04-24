<?php
$stmt = $db->query("SELECT * FROM posts ORDER BY created_at DESC");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<h2>{$row['title']}</h2>";
    echo "<p>{$row['content']}</p>";
    echo "<p>Created at: {$row['created_at']}</p>";
    echo "<a href='update.php?id={$row['id']}'>Edit</a> | ";
    echo "<a href='delete.php?id={$row['id']}'>Delete</a><hr>";
}
?>
