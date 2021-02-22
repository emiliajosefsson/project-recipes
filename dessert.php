<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header">
        <h1>Recept</h1>
    </header>
    <h3 class="page-header">Efterrätt:</h3>
    <div class="sidenav">
        <h3 class="sidenav-h">Recept:</h3>
        <a href="firstcourse.php">Förrätter</a>
        <a href="maincourse.php">Huvudrätter</a>
        <a href="dessert.php">Efterrätter</a>
        <a href="add.php">Lägg till nytt recept</a>
      </div>
      
<?php 
$dsn = "mysql:host=localhost;dbname=recipes_site";
$user = "root";
$password = "";
$pdo = new PDO($dsn, $user, $password);
$stm = $pdo->query("SELECT title, ingredients, steps, category FROM recipes");



while($row = $stm->fetch()):
    if($row['category'] == "dessert"){?>
        <h3 class="title_header"> <?=$row['title']?> </h3> <p class="middle"> <?=$row['category']?><p class="middle"> <?=$row['ingredients']?> </p>  <p class="middle"> <?=$row['steps']?> </p>  <br />
     
        <?php } endwhile;

        ?>
    

    
</body>
</html>