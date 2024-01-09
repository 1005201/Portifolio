<?php 

include "connection.php"; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cheese Sopranos</title> 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <table class="table table-dark table-striped">
    <thead>
      <tr>
        <th>Cheesename</th>
        <th>Price</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = 'SELECT * FROM product';
      $stmt = $conn->query($sql);
      $stmt->execute();
      $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
      foreach ($data as $product) {
          $id = $product['id'];
          echo '<tr>';
          echo '<td>' . $product['cheesename'] . '</td>';
          echo '<td>' . $product['price'] . '</td>';
          echo "<td><a style='text-decoration: none;' href='wijzigen.php?id=" .
                $product['id'] .
                "'>&#9989;</a></td>";
          echo "<td><a style='text-decoration: none;'  href='verwijderen.php?id=" .
                $product['id'] .
                "'>&#10062;</a></td>";
          
        }
      ?>
    </tbody>
  </table>
  <script>
    function confirmationDelete(anchor){
        var conf = confirm('Are you sure want to delete this cheese?');
        if(conf)
            window.location=anchor.attr("href");
    }
</script>
<?php echo "<td><a style='text-decoration: none;'  href='toevoegen.php?id=" .
                $product['id'] .
                "'><button>&#x2719; Add cheese</button></a></td>";?>
</body>
</html>
