<?php
    include'connect.php';

    if(isset($_POST['submit'])){
    $matri = $_POST["matricule"];
    $nom = $_POST["Nom"];
    $pre = $_POST["Prénom"];
    $date = $_POST["Date_de_naissance"];
    $depar = $_POST["Département"];
    $sal = $_POST["Salaire"];
    $fonct = $_POST["Fonction"];
    $pho = $_FILES["Photo"]["name"];
    $tempName = $_FILES["Photo"]["tmp_name"];
    $folder = "image/" . $pho;
    $sql = "INSERT INTO employe VALUES(
        '$matri','$nom','$pre','$date',
        '$depar',$sal,'$fonct','$pho'
    )";
    move_uploaded_file($tempName, $folder);
    $conn->query($sql);
    // header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
 <form action="ajouter.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="matricule" placeholder="matricule">
    <input type="text" name="Nom" placeholder="Nom">
    <input type="text" name="Prénom" placeholder="Prénom">
    <input type="date" name="Date_de_naissance">
    <input type="text" name="Département" placeholder="Département">
    <input type="text" name="Salaire" placeholder="Salaire">
    <input type="text" name="Fonction" placeholder="Fonction">
    <input type="file" name="Photo">
    <input class="btn" type="submit" name="submit"  >
 </form>
</body>
</html>