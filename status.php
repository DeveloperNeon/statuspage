<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="15">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<title>Uptime Monitor</title>
<style>
.bd-example {
    position: relative;
    padding: 1rem;
    margin: 1rem -.75rem 0;
        margin-right: -0.75rem;
        margin-left: -0.75rem;
    border: solid #dee2e6;
        border-top-width: medium;
        border-right-width: medium;
        border-bottom-width: medium;
        border-left-width: medium;
    border-width: 1px 0 0;
}
.bd-example-row .row > .col, .bd-example-row .row > [class^="col-"] {';
    padding-top: .75rem;';
    padding-bottom: .75rem;';
    background-color: rgba(39,41,43,0.03);';
    border: 1px solid rgba(39,41,43,0.1);';
}
</style>
</head>
<body>
<div class="container-fluid">
<div class="alert alert-info alert-dismissible fade show" role="alert">
  This page refreshes every 15 seconds.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
</div> <!--This exits the container-fluid-->
<?php
$urls = array("http://0", "http://1", "https://2", "http://3"); //add more domains to your liking
$names = array("0", "1", "2", "3"); //add more domains to your liking
//$name = implode(" ",$names);
$addcsslines = '<div class="bd-example bd-example-row">';
print $addcsslines;
$htmlcn = '<div class="container">';
print $htmlcn;
$i = 0;
$allup = 0;

foreach ($urls as &$item) {

  // Initialize an URL to the variable
  $url = $item;
  //$customname = $names;
 
  // Use get_headers() function
  $headers = @get_headers($url);
  //echo($headers[0] . "<br>");
 
  // Use condition to check the existence of URL
  if($headers && strpos( $headers[0], '200')) {
    //$status = "URL Online<br>";  
    $status = true;
  }
  else {
    //$status = "URL Offline<br>";
    $status = false;
    $allup = $allup + 1;
  }

  $name = $names[$i];

  // Display result
  //echo($status);
  if ($status == true) {
    $htmlup = '<div class="row bd-example bd-example-row">';
    $htmlup .= '<div class="col-sm">';
    $htmlup .= $name;
    $htmlup .= '</div>';
    $htmlup .= '<div class="col-sm">';
    $htmlup .= 'Online';
    $htmlup .= '</div>';
    $htmlup .= '<div class="col-sm">';
    $htmlup .= '<div class="spinner-grow text-success" role="status">';
    $htmlup .= '  <span class="visually-hidden">Loading...</span>';
    $htmlup .= '</div>';
    $htmlup .= '</div>';
    $htmlup .= '</div>';
    print $htmlup;
  }
  else {
    $htmldn = '<div class="row bd-example bd-example-row">';
    $htmldn .= '<div class="col-sm">';
    $htmldn .= $name;
    $htmldn .= '</div>';
    $htmldn .= '<div class="col-sm">';
    $htmldn .= 'Offline';
    $htmldn .= '</div>';
    $htmldn .= '<div class="col-sm">';
    $htmldn .= '<div class="spinner-grow text-danger" role="status">';
    $htmldn .= '  <span class="visually-hidden">Loading...</span>';
    $htmldn .= '</div>';
    $htmldn .= '</div>';
    $htmldn .= '</div>';
    print $htmldn;
  }

  $i = $i + 1;

}
if ($allup == 0) {
  $allupalert = '<div class="alert alert-success" role="alert">';
  $allupalert .= 'All monitors online!';
  $allupalert .= '</div>';
  print $allupalert;
} elseif ($allup == 1) {
  $onlyonedn = '<div class="alert alert-warning" role="alert">';
  $onlyonedn .= 'One monitor is down!';
  $onlyonedn .= '</div>';
  print $onlyonedn;
}
else {
  $severaldn = '<div class="alert alert-danger" role="alert">';
  $severaldn .= $allup . ' monitors may be down!';
  $severaldn .= '</div>';
  print $severaldn; 
}
?>
</body>
</html>
