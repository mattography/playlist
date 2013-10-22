<html>
<head>
<title>Summer 2013 Playlist</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" ></script>
    <link href="http://twitter.github.io/bootstrap/assets/css/bootstrap.css" rel="stylesheet">
    
    <script>
      //loads form submission container with fade effect
      $(function(){
        $('.container').hide().fadeIn('slow');
      });
    </script>

    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
    <link href="http://twitter.github.io/bootstrap/assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->
</head>
<body>
<?php
if(isset($_POST['add']))
{
$dbhost = 'db466153122.db.1and1.com';
$dbuser = 'dbo466153122';
$dbpass = 'nikonn70';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}

if(! get_magic_quotes_gpc() )
{
   $artist = addslashes ($_POST['artist']);
   $song = addslashes ($_POST['song']);
   $date = addslashes ($_POST['date']);
}
else
{
   $artist = $_POST['artist'];
   $song = $_POST['song'];
   $date = $_POST['date'];
}


$sql = "INSERT INTO songs ".
       "(artist,song,date) ".
       "VALUES('$artist','$song', NOW())";
mysql_select_db('db466153122');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}
echo "<center><h1>Thanks for adding to the collection!</h1></center>\n";
mysql_close($conn);
}
else
{
?>
 <div class="container">

      <form class="form-signin" method="post" action="<?php $_PHP_SELF ?>">
        <h3 class="form-signin-heading">Add An Artist & Song</h3>
        <input type="text" class="input-block-level" name="artist" id="artist" placeholder="Artist Name">
        <input type="text" class="input-block-level" name="song" id="song" placeholder="Song Title">
      <button class="btn btn-large btn-primary" name="add" type="submit" id="add" value="Add Song">Add</button>
      </form>
    </div> <!-- /container -->
  
<?php
}
?>
</body>
</html>