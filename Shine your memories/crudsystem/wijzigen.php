<?php 

include "connection.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Cheese Sopranos</title> 
</head>
<body>
   <?php
      $sql = 'SELECT * FROM product WHERE id = ?';
      $stmt = $conn->prepare ($sql);
      $stmt->execute([$_GET['id']]);
      $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
      foreach ($data as $product) {
    ?>
    
  <div class="container">
    <form class="form" action="" method="post">
        <h1 class="page-title uppercase"><span class="text-red center">E</span>dit cheese</h1>
        <br>
        <input type="hidden" name="id" id="id" value="<?php echo $product[
            'id'
        ]; ?>" />
        <div class="mb-3">
        <label for="cheesename" class="form-label">Cheesename:</label>
            <input type="text" class="form-control" id="cheesename" name="cheesename" value="<?php echo $product[
                'cheesename'
            ]; ?>" />
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price:</label>
            <input type="text" class="form-control" id="price" name="price"  value="<?php echo $product[
                'price'
            ]; ?>" />
        </div>
        <br>
        <button type="submit" name="submit" class="btn btn-dark">EDIT product</button>
        <span class="right"><a href="index.php?id=" class="text-red" style="text-decoration: none;">Back</a></span>
    </form>
</div>
<?php }
if (isset($_POST['submit'])) {
  $sql = 'UPDATE product SET cheesename=?, price=? WHERE ID=?';
  $stmt = $conn->prepare($sql);
  $stmt->execute([
      $_POST['cheesename'],
      $_POST['price'],
      $_POST['id'],
  ]);
  header('Location: index.php');
}
?>
</body>
</html>
