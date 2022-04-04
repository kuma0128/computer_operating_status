<?php
  $fst = $_POST['fst'];
  $last = $_POST['last'];
  $cluster = $_POST['clus'];
  $dsn = "mysql:dbname=XXXX;host=localhost";
  $user = "guest";
  $password = "";
  try{
  $dbh = new PDO($dsn, $user, $password);
  } catch (PDOException $e) {
      print("Error:".$e->getMessage());
      die();
  }

  $table = "XXXX";
  $sql = $dbh->prepare("select time,$cluster from $table where time between '$fst' and '$last'");
  $sql->execute();
  $ary1 = array();
  while($row = $sql->fetch(PDO::FETCH_ASSOC)){
    $ary1[] = array(
      0  => $row['time'],
      1  => (float)$row[$cluster]
    );
  }

  echo json_encode($ary1);
  $dbh = null;
  $sql = null;
?>
