<!DOCTYPE html>
<?php
   ob_start();
   session_start();
?>
<head>
   <title>Supercooler Webshop 30000</title>
   <link rel="stylesheet" type="text/css" href="static/style/main.css">
   <script src="static/js/main.js"></script>
   <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
   <meta charset="utf-8">
</head>
<body>
   <div id="head_container">
      <div id="head_content">
         <h1>webshop "hell yeah"</h1>
      </div>
   </div>
   <div id="body_container">
      <div id="body_content">
      <div id="register_container">
         <form class="form-signin" role="form" 
            action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
               ?>" method = "post">
               <input type="text"
               class="form-control"
               name="email"
               placeholder="Email"
               required>
               <br>
               <input type="text"
               class="form-control"
               name="fname"
               placeholder="Vorname"
               required>
               <br>
               <input type="text"
               class="form-control"
               name="lname"
               placeholder="Nachname"
               required>
               <br>
               <input type="text"
               class="form-control"
               name="birth_date"
               placeholder="Geburtsdatum YYYY-D-M"
               required>
               <br>
               <input type="text"
               class="form-control"
               name="pass"
               placeholder="Passwort"
               required>
               <br>
               <button class="btn_register" type="submit" 
                  name="register">Registrieren</button><br>
         </form>
      </div>
   </div>
   <div id = "register_logic">
      <?php
   if (isset($_POST['register'])
            && !empty($_POST['email']) 
            && !empty($_POST['pass'])
            && !empty($_POST['fname'])
            && !empty($_POST['lname'])
            && !empty($_POST['birth_date'])
            && !empty($_POST['email'])) {
                $fname = "'".$_POST['fname']."'";
                $lname = "'".$_POST['lname']."'";
                $birth_date = "'".$_POST['birth_date']."'";
                $umail = "'".$_POST['email']."'";
                $pass_hash = "'".md5($_POST['pass'])."'";
                $db = new SQLite3('static/db/webshop.db');
                $cmd = "INSERT INTO customers
                    (fname, lname, birth_date, email, pass_hash)
                    VALUES ("
                    .$fname.", ".$lname.", ".$birth_date.", ".$umail.", ".$pass_hash
                    .");";
                echo $cmd."<br>";
                $result = $db->query($cmd);
                if(! $result){
                    die('could not insert data '.$db->lastErrorMsg());
                }
                else{
                    echo 'Versuchen Sie, sich einzuloggen';
                };
   };
             ?>
      </div>
   </div>
   <div id="footer_container">
      <div id="footer_content">
         <h2>Wlan-Kabel für den Profi mit Standards!</h2>
         <p>©Maximilian Middeke 2018</p>
      </div>
   </div>
</body>