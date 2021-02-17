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
        <h1 id="h1">Recept</h1>
    </header>
    <div class="sidenav">
        <h3 class="sidenav-h">Recept:</h3>
        <a href="firstcourse.php">Förrätter</a>
        <a href="maincourse.php">Huvudrätter</a>
        <a href="dessert.php">Efterrätter</a>
        <a href="add.php">Lägg till nytt recept</a>
      </div>
<h2>Lägg till recept:</h2>
<div class="container-add-form">
<div class="container">
  <form action="" method="POST" class="addform">
  <div class="row">
    <div class="col-25">
      <label for="category">Välj:</label>
    </div>
    <div class="col-75">
      <select id="category" name="category">
        <option value="firstcourse">Förrätt</option>
        <option value="maincourse">Huvudrätt</option>
        <option value="dessert">Efterrät</option>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="title">Receptetsnamn</label>
    </div>
    <div class="col-75">
    <input type="text" placeholder="Skriv in namnet på rätten..." name="title" id=title>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="ingredients">Ingredienser</label>
    </div>
    <div class="col-75">
    <input type="text" placeholder="Skriv in ingredienserna" name="ingredients" id="ingredients">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="steps">Beskrivning</label>
    </div>
    <div class="col-75">
      <textarea id="steps" name="steps" placeholder="Beskriv stegen..." style="height:200px"></textarea>
    </div>
  </div>
  <div class="row">
    <input type="submit" name="submit" value="Lägg till">
  </div>
  </form>
</div>
</div>
</body>
</html>



<?php 
$dsn = "mysql:host=localhost;dbname=recipes_site";
$user = "root";
$password = "";
$pdo = new PDO($dsn, $user, $password);


if(!isset($_POST['submit'])){
die;
}

$title = $_POST['title'];
$ingredients = $_POST['ingredients'];
$steps = $_POST['steps'];
$category = $_POST['category'];


$sql = "INSERT INTO recipes (title, ingredients , steps, category) VALUES(:title_IN, :ingredients_IN, :steps_IN, :category_IN)";
$stm = $pdo->prepare($sql);
$stm->bindParam(':title_IN', $title);
$stm->bindParam(':ingredients_IN', $ingredients);
$stm->bindParam(':steps_IN', $steps);
$stm->bindParam(':category_IN', $category);


if($stm->execute()) { 
  while ($row = $stm->fetch()) {
    echo $row['title'] . ": " . $row['ingredients'] . "<br />" . $row['steps'] . "<br />";}
  }
  else {echo "Något gick fel!";}
  
?>

