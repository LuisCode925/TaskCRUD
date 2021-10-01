<?php include("db.php");?>
<?php include("includes/header.php");?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">

            <?php if (isset($_SESSION['message'])) { ?> 
                <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php session_unset(); } ?>

            
            <div class="card card-body">
                <form action="save_task.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" id="" placeholder="Titulo tarea" autofocus>
                    </div>
                    <div class="form-group">
                        <textarea name="description" class="form-control" placeholder="Descripccion..." style="height: 10rem;"> 
                        </textarea>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="save_task" value="Guardar">
                </form>
            </div>
        </div>

        <!-- Tabla -->
        <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Descripcion</th>
                            <th>Fecha Creacion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query ="SELECT * FROM task";
                            $result_tasks = mysqli_query($conn, $query); 

                            while ($row = mysqli_fetch_array($result_tasks)){?>
                                <tr>
                                    <td><?php echo $row['title'] ?></td>
                                    <td><?php echo $row['description'] ?></td>
                                    <td><?php echo $row['created_at'] ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="edit.php?id=<?php echo $row['id'];?>" class="btn btn-secondary btn-default">
                                                <i class="las la-pencil-alt"></i>
                                            </a>
                                            <a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger btn-default">
                                                <i class="las la-trash-alt"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                               
                            <?php } ?>
                    </tbody>
                </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php");?>