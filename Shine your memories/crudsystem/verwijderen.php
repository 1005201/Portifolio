<?php 

include "connection.php";

  $sql = 'DELETE FROM product WHERE id = ?';
  $stmt = $conn->prepare($sql);
  try {
      $stmt->execute([$_GET['id']]);
      echo "<script>alert('Cheese is deleted');
          location.href='index.php';</script>";
  } catch (PDOException $e) {
      echo $e->getMessage();
  }   
?>
