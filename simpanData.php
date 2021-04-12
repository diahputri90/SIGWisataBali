<?php

  $conn = new mysqli('localhost', 'root', '', 'db_sig');
  
  $conn->query("INSERT INTO marker VALUES (0,'$_POST[nama]','$_POST[katagori]','$_POST[deskripsi]','$_POST[lat]','$_POST[lng]')");

  echo "Berhasil disimpan pada Database!";

 ?>

  
