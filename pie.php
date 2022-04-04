  <div class="explain">
   <p><?php echo $cluster."クラスタのディスク使用率"; ?></p>
  <p><?php echo "1時間に1度更新されます。"; ?></p>
  </div>
  <br />
<?php
  $dsn = "mysql:dbname=XXXX;host=localhost";
  $user = "guest";
  $password = "";
  try{
  $dbh = new PDO($dsn, $user, $password);
  } catch (PDOException $e) {
      print("Error:".$e->getMessage());
      die();
  }
  // $table = $cluster."disk";
  $table = "XXXX";

  $sql = $dbh->prepare("select User,$cluster from $table where $cluster > 50 order by $cluster DESC");
  $sql->execute();
  $ary = array();

  while($row = $sql->fetch(PDO::FETCH_ASSOC)){
    $ary[] = array(
      0  => $row['User'],
      1  => $row[$cluster]
    );
  }

  $table = "XXXX";

  $disk = "select * from $table where cluster = '$cluster'";
  $sql = $dbh->query($disk);
  $tot = $sql->fetchAll();

  $dbh = null;
  $sql = null;
?>
