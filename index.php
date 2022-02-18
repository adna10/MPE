<?php
    include"connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <title>Document</title>
</head>
<body>
<div class="col-md-10 mx-auto" >
<table class="table  table-dark table-striped">
  <thead>
    <tr>
      <th>Id</th>
      <th>Nom</th>
      <th>Prénom</th>
      <th>Date de naissance</th>
      <th>Département</th>
      <th>Salaire</th>
      <th>Fonction</th>
      <th>Photo</th>
      <th>Modifie ou Supprimer</th>
    </tr>
  </thead>
  <tbody>
      <?php
        $sql = "SELECT * FROM employe";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
       ?>
        <tr>
          <td><?php echo $row["matricule"] ?></td>
          <td><?php echo $row["Nom"] ?></td>
          <td><?php echo $row["Prénom"] ?></td>
          <td><?php echo $row["Date_de_naissance"] ?></td>
          <td><?php echo $row["Département"] ?></td>
          <td><?php echo $row["Salaire"] ?></td>
           <td><?php echo $row["Fonction"] ?></td>
           <td><img style="width: 100PX;" src="image/<?php echo $row["Photo"] ?>" alt=""> </td>
           <td><a class ="btn btn-primary" href =" index.php?delet=<?php echo $row["matricule"] ?>">supremie</a>
           <a class ="btn btn-primary" href =" index.php?delet=<?php echo $row["matricule"] ?>">modifier</a></td>
        </tr> 
      <?php
      // $conn->close();

      }
        } else {
          echo "0 results";
        }
      ?>
  </tbody>
</table>
</div>
</body>
</html>


<?php 
 if (isset($_GET["delet"])) {
   $idd = $_GET["delet"];
   $delet = "DELETE FROM `employe` WHERE matricule='$idd'";
   $resulte = $conn->query($delet);

    //  $resulte->fetch_assoc();
     $conn->close();
   header("Location: index.php/");
   }
   
   
    


 
?>