<?php
    include("db.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM task WHERE id=$id";
        
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result)==1) {
            $row = mysqli_fetch_array($result);
            $description = $row['description'];
            $title = $row['title'];
        }
    }

    if (isset($_POST['update'])) {
        $id = $_GET['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $query = "UPDATE task SET title='$title', description='$description' WHERE id=$id";
        
        $result = mysqli_query($conn, $query);
        $_SESSION['message'] = "Tarea actualizada correctamente";
        $_SESSION['message_type'] = 'info'; 
        header("Location: index.php");
    }
?>

<?php include("includes/header.php");?>
<div class="container p-4">
    <div class="col-md-4 mx-auto">
        <div class="card card-body">
            <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                <div class="form-group">
                    <input type="text" name="title" class="form-control" value = "<?php echo $title; ?>" placeholder="Actualizar el titulo" autofocus>
                </div>
                <div class="form-group">
                    <textarea name="description" class="form-control" placeholder="Actualizar descripccion" style="height: 10rem;"><?php echo $description; ?></textarea>
                </div>
                <input type="submit" class="btn btn-success btn-block" name="update" value="Actualizar Tarea">
            </form>
        </div>
    </div>
</div>
<?php include("includes/footer.php");?>