<?php
    include("helpers/server.php");
    function getRecord($conn, $id){
        $query = "SELECT * FROM blog where id=$id";

        $result = $conn->query($query);

        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            return $row;
        }

        return null;
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $record = getRecord($connection, $id);
        if(isset($record)){
            $title = $record['title'];
            $content = $record['content'];
            $author = $record['author'];
        }
    }

    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $author = $_POST['author'];

        $query = "UPDATE Blog SET title='$title', content='$content', author='$author' WHERE id=$id";
        $isSuccess = $connection->query($query);

        if($isSuccess){
            header("Location: index.php");
            exit();
        }else{
            echo "Sorry, something when wrong!";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('components/head.php') ?>
    <title>Update | CRUD-PHP</title>
</head>

<body>
	<?php include('components/header.php') ?>
    <!-- Blog Post Content -->
    <div class="container" id="blog-content">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>Update Record</h2>
                <form method="POST">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?= $title ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control" id="content" name="content" rows="5" required><?= $content ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="author" class="form-label">Author Name</label>
                        <input type="text" class="form-control" id="author" name="author" value="<?= $author ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="update">Update</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS (Optional: if you need Bootstrap JavaScript features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>