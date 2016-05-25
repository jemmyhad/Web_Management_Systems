
<html>
<head>
<title>South Eastern Kenya University -Online Virtual Classroom</title>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
	jQuery(document).ready(function($) {
	  $('a[rel*=facebox]').facebox({
		loadingImage : 'src/loading.gif',
		closeImage   : 'src/closelabel.png'
	  })
	})
  </script>
<link rel="stylesheet" href="febe/style.css" type="text/css" media="screen" charset="utf-8">
<script src="argiepolicarpio.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>	
</head>
<body>        
<div id="mainwrapper" style="width:800px;"> 
  <h1> <a id="addq" href="library.php" title="click to enter library" style="background-image:url('images/out.png'); background-repeat:no-repeat; padding: 3px 12px 12px; margin-right: 10px;"></a> 
    <label for="filter">Filter</label>
    <input type="text" name="filter" value="" id="filter" />
  </h1>
  <table cellpadding="1" cellspacing="1" id="resultTable">
    <thead>
      <tr> 
        <th > Name </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td> 
          <?php
        $con = mysql_connect('localhost', 'root', '') or die(mysql_error());
        $db = mysql_select_db('bcc', $con);
        $query = "SELECT id, name FROM upload";
        $result = mysql_query($query) or die('Error, query failed');
        if (mysql_num_rows($result) == 0) {
            echo "Database is empty <br>";
        } else {
            while (list($id, $name) = mysql_fetch_array($result)) {
                ?>
          <a href="download.php?id=<?php echo urlencode($id); ?>"
                   ><?php echo urlencode($name); ?></a> <br> 
          <?php
            }
        }
        mysql_close();
        ?>
        </td>
      </tr>
    </tbody>
  </table>
</div>
 <script src="js/jquery.js"></script>

</body>
</html>



           <?php
           if (isset($_GET['id'])) {
               $con = mysql_connect('localhost', 'root', '') or die(mysql_error());
               $db = mysql_select_db('bcc', $con);
               $id = $_GET['id'];
               $query = "SELECT name, type, size, content " .
                       "FROM upload WHERE id = '$id'";
               $result = mysql_query($query) or die('Error, query failed');
               list($name, $type, $size, $content) = mysql_fetch_array($result);
               header("Content-length: $size");
               header("Content-type: $type");
               header("Content-Disposition: attachment; filename=$name");
               ob_clean();
               flush();
               echo $content;
               mysql_close();
               exit;
           }
           ?>