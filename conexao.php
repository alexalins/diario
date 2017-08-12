<?php
  function open_database() {
      try {
          $db = mysqli_connect('localhost', 'root','', 'diario');
          return $db;
      } catch (Exception $e) {
          echo $e->getMessage();
          return null;
      }
  }
  function close_database($conn) {
      try {
          mysqli_close($db);
      } catch (Exception $e) {
          echo $e->getMessage();
      }
  }
?>