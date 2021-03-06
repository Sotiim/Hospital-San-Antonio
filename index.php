<?php  include("db.php") ?>

<?php $page='Paciente'; include("includes/header.php") ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      
    <!-- MESSAGES -->
      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>


      <div class="card card-body">
        <form action="save.php" method="POST">
          <div class="form-group">
            <input type="text" name="nombre"  class="form-control" placeholder="Nombre" required></input>
          </div>
          <div class="form-group">
          <div>Selecciona Enfermedad: <select name="Enfermedad" class="form-control" required >

          <?php
          $query = "SELECT * FROM enfermedades";
          $result_tasks = mysqli_query($conn, $query);    

          foreach($result_tasks as $row) { ?>

            <option value="<?php echo $row['nombreE']; ?>"><?php echo $row['nombreE']; ?></option>
            
          <?php } ?>

          </select>
            </div>

            </div>
          <div class="form-group">
            <input type="text" name="Edad" class="form-control" placeholder="Edad" required></input>
          </div>
          <input type="submit" name="save" class="btn btn-success btn-block" value="Añadir Paciente">          
        </form>
        <br>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Identificador</th>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Enfermedades</th>
            <th>Explicación de la Enfermedad</th>
            <th>Actualizar</th>
            <th>Eliminar</th>

          </tr>
        </thead>
        <tbody>
    
        <?php
          $query = "SELECT * FROM paciente";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['Edad']; ?></td>
            <td><?php echo $row['Enfermedad']; ?></td>
            <td><?php echo $row['ExplicacionE']; ?></td>

            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-warning">
                <i class="fas fa-marker"></i>
              </a>
            </td>
            <td>
              <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="fas fa-eraser"></i>
              </a>
            </td>
          </tr>
          <?php } ?>

        </tbody>
      </table>
    </div>
  </div>
</main>







<?php include('includes/footer.php'); ?>



