<!DOCTYPE html>
<?php
   ob_start();
   session_start();
   $lang = "de";
   if(isset($_GET['lang'])){ 
        $lang = $_GET['lang']; 
    } 
    $db = new SQLite3('static/db/webshop.db');
    $results = $db->query('SELECT * FROM lang_dict');
    while ($row = $results->fetchArray()) {
        $web_title = $row[$lang.'_web_title'];
        $welcome_msg = $row[$lang.'_welcome_msg'];
    };
    ?>
<head>
    <title><?php echo $web_title; ?></title>
   <link rel="stylesheet" type="text/css" href="static/style/main.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="static/js/intro.js"></script>
    <link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">
   <meta charset="utf-8">
</head>
<body>
<div id="body_content">
<div id="welcome_msg"><h1><?php echo $welcome_msg; ?></h1></div>
</div>
</body>
