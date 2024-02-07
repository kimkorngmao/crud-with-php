<?php
    include("helpers/server.php");
    $query = "SELECT * FROM blog ORDER BY created_at DESC";
    $result = $connection->query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('components/head.php') ?>
    <title>CRUD-PHP</title>
</head>

<body>
    <?php include('components/header.php') ?>
    <!-- Blog Post Content -->
    <div class="container" id="blog-content">
        <?php
        // Check if there are any blog posts
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="row">
                    <div class="col-md-7 p-3 rounded mx-auto offset-md-2 border mb-3">
                        <h1 class="h5"><?php echo htmlspecialchars($row['title']); ?></h1>
                        <p><?php echo htmlspecialchars($row['content']); ?></p>
                        <p class="mb-0"><?php echo htmlspecialchars($row['content']); ?></p>
                        <div><small class="text-secondary"><span>By <?php echo $row['author']; ?></span> - <?php echo htmlspecialchars($row['created_at']); ?></small></div>
                        <div class="btn-group mt-3">
                            <!-- Replace '#' with the actual update and delete URLs -->
                            <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Update</a>
                            <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            // Display a message if no blog posts are found
            echo "<p>No blog posts found.</p>";
        }
        ?>
    </div>
    <!-- Bootstrap JS (Optional: if you need Bootstrap JavaScript features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
