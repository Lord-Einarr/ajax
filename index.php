<?php

require 'data.php';

// die(var_dump($countries));
// die(var_dump($regions));

if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['country'])) {
    $country = $_GET['country'];
    header('Content-type: application/json');
    if(!empty($regions[$country])) {
        echo json_encode($regions[$country]);
        die();
    }
    echo json_encode([]);
    die();
}
?>
<!DOCTYPE html>
<html lang="en-nz">
<head>
  <meta charset="utf-8">

  <title>Untitled</title>

  <link rel="stylesheet" href="">
</head>
<body>

<form>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="country">Country</label>
    <select class="form-control" id="country" onchange="getRegions()">
    <option value="" selected disabled>Select a country...</option>
    <?php foreach ($countries as $key => $country): ?>
      <option value="<?=$country['code'];?>"><?=$country['name'];?></option>
    <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <label for="country">Region</label>
    <select class="form-control" id="region">
      <option disabled selected>Select a country...</option>
    </select>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>

<script src="js/script.js"></script>
</body>
</html>
