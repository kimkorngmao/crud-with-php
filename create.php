<?php
    include("helpers/server.php");

    if(isset($_POST['create'])){
        $title = mysqli_real_escape_string($_POST['title']);
        $content = mysqli_real_escape_string($_POST['content']);
        $author = mysqli_real_escape_string($_POST['author']);
        $query = "INSERT INTO blog(title, content, author) VALUES ('$title', '$content', '$author')";
        $isSuccess = $connection->query($query);

        if($isSuccess){
            header("Location: index.php");
            exit();
        }else{
            echo 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quam qui nesciunt totam quos. Hic harum corporis deserunt, cumque perferendis id et recusandae enim molestiae doloribus. Sunt minus ducimus cupiditate modi?';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('components/head.php') ?>
    <title>Create | CRUD-PHP</title>
</head>

<body>
	<?php include('components/header.php') ?>
    <!-- Blog Post Content -->
    <div class="container" id="blog-content">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>Create a New Record</h2>
                <form method="POST">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="author" class="form-label">Author Name</label>
                        <input type="text" class="form-control" id="author" name="author" required>
                    </div>
                    <button type="submit" name="create" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS (Optional: if you need Bootstrap JavaScript features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>