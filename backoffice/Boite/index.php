<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="./../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="./../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
        <a href="../index.php" class="btn btn-danger">Retour</a>
<h1>TOP</h1>
<table class="table table-stripped table-bordered">
    <thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Type</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    require_once "../connection.php";
    $request = 'SELECT
             `id`,
              `image`,
              `image1`,
              `image2`,
              `image3`,
              `image4`,
              `image5`
                FROM
                  `Boite`
    ;';
    $stmt = $connection->prepare($request);
    $stmt->execute();
    while (false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
        <td><?=$row["id"]?></td>
        <td><?=$row["image"]?></td>
        <td><?=$row["image1"]?></td>
    <td><a href="show.php?id=<?=$row['id']?>" class="btn btn-default"><span class="glyphicon glyphicon-eye-open"></span>Voir </a>
        <a href="edit.php?id=<?=$row['id']?>" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>Edit </a>
        <a href="delete.php?id=<?=$row['id']?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>Delete </a></td>
        </tbody>
    <?php endwhile;?>
</table>
<a href="add.php"><h2 class="btn btn-success"><strong>Ajouter un article</strong></h2></a>
    </div>
</div>
</body>