<?php
/**
 * Created by PhpStorm.
 * User: guillaume
 * Date: 05/05/2018
 * Time: 17:39
 */

require_once "../connection.php";

$request = "SELECT 
              `id`,
              `date`,
              `from`,
              `to`,
              `image`,
              `alt`,
              `price`
            FROM
              `Bon`
            WHERE 
              `id` = :id
;";
$stmt = $connection->prepare($request);
$stmt->bindParam(':id', $_GET['id']);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ($row === false) {
    header("Location: index.php?error=nodatatodetails");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="./../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="./../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
</head>
<body>
<div>
    <div class="container">
        <div class="row">
    <a style="font-size: 50px;" href="index.php">Retour vers l'admin</a>
            <table class="table table-stripped table-bordered">
                <thead>
                <tr>
                    <th class="name">ID</th>
                    <th class="name">date</th>
                    <th class="name">from</th>
                    <th class="name">to</th>
                    <th class="name">image</th>
                    <th class="name">alt</th>
                    <th class="name">price</th>
                </tr>
                </thead>
                <tr>
                    <td><?= $row['id']?></td>
                    <td><?= $row['date']?></td>
                    <td><?= $row['from']?></td>
                    <td><?= $row['to']?></td>
                    <td><?= $row['image']?></td>
                    <td><?= $row['alt']?></td>
                    <td><?= $row['price']?></td>
                </tr>

            </table>
<a href="edit.php?id=<?=$row['id']?>" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>Edit </a>
<a href="delete.php?id=<?=$row['id']?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>Delete </a>
    </div>
</div>
</body>
