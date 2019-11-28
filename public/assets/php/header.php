<?php
function isActive($url) {
    $query = $_SERVER['PHP_SELF'];
    $path = pathinfo($query);
    $base = $path['basename'];
    if($url === $base) {
        echo "active";
    } else if($url . ".php" === $base) {
        echo "active";
    } else {
        echo "";
    }
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/index.php">Ardeos</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?php isActive("index"); ?>">
        <a class="nav-link" href="/index.php">Home</a>
      </li>
      <li class="nav-item <?php isActive("popular"); ?>">
        <a class="nav-link" href="/popular.php">Popular</a>
      </li>
      <li class="nav-item <?php isActive("upload"); ?>">
        <a class="nav-link" href="/upload.php">Upload</a>
      </li>
    </ul>
    <button class="btn btn-outline-success my-2 my-sm-0" onclick="location.href = 'account.php'" >My account</button>
  </div>
</nav>