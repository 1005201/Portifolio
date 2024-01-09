<?php 

include "connection.php";

  if(isset($_POST["submit"])){
    try {
        $sql = 'INSERT INTO product (id, cheesename, price)
                VALUES (NULL, :cheesename, :price)';
        $stmt = $conn->prepare($sql);
        
        $stmt->bindParam(':cheesename', $cheesename);
        $stmt->bindParam(':price', $price);
        
        $cheesename = $_POST["cheesename"];
        $price = $_POST["price"];

        $stmt->execute();
  } catch (PDOException $e) {
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
  }
}
  
?>
  

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="stylen.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Cheese Sopranos</title> 
</head>
<body>
  <form action="" method="post">
    <label>Cheesename</label>
    <input type="text" name="cheesename" id="" >
    <label>Price</label>
    <input type="text" name="price" id="" >
    <input type="submit" name="submit" value="Add Cheesename">
  </form>
</body>
</html>
