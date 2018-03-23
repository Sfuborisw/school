<!DOCTYPE html>
<?php
   ob_start();
   session_start();
?>
<head>
   <title>*Der* webshop</title>
   <link rel="stylesheet" type="text/css" href="static/style/main.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="static/js/main.js"></script>
   <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700" rel="stylesheet">
   <meta charset="utf-8">
</head>
<body>
   <div id="head_container">
      <div id="head_content">
         <a href="./index.php"><h1><span class="w700">Der</span> webshop</h1></a>
      </div>


      <div id="nav">
      <div id="nav_content">
         <div id='home' class='jq_link nav_stuff'>Home</div>
         <div id='userpage' class='jq_link nav_stuff'>Userpage
             <div id='userpage_dropdown'>
                <div id='history'>Letzte Bestellungen</div>
                <div id='logout'>Logout</div>
             </div>
         </div>
         <div id='register' class='jq_link nav_stuff'>Registrieren</div>
         <form class="form_signin" id="login_container" role="form" 
            action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
               ?>" method = "post">
                <div id="login_mail">
               <input type="text" class="form-control nav_stuff" 
                  name="email"
                  placeholder="email" 
                  required>
                </div>
                <div id="login_pass">
               <input type="password" class="form-control nav_stuff"
                  name="password" placeholder="password" required>
                </div>
               <button id="login" class="nav_stuff" type="submit" 
                  name="login">Login</button>
         </form>
    </div>
    </div>
      </div>

       <div id = "log_in_logic">
          <?php
         if (isset($_POST['login']) && !empty($_POST['email']) 
            && !empty($_POST['password'])) {
                $db = new SQLite3('static/db/webshop.db');
                $results = $db->query('SELECT * FROM customers WHERE email="'.$_POST['email'].'"');
                while ($row = $results->fetchArray()) {
                    $uname = $row['fname'];
                    $umail = $row['email'];
                    $uhash = $row['pass_hash'];
                }
            if (md5($_POST['password']) == $uhash) {
               $_SESSION['valid'] = true;
               $_SESSION['timeout'] = time();
               $_SESSION['email'] = 'user';
               $logged_in = True;
            }
            else {
               echo 'Incorrect email/pass-combination!';
               $umail = False;
               $logged_in = False;
            }
         }
         ?>
    </div>

   </div>
   <div id="body_container">




      <div id="body_content">


         <div id="product_container">
            <ul id="product_list">
                <?php
                $db = new SQLite3('static/db/webshop.db');
                $results = $db->query('SELECT id, image, name, price FROM products;');
                while ($row = $results->fetchArray()){
                    echo "<div class='product'>"
                        ."<form method='post' action='index.php?action=add&code=".$row['id'].">\n"
                    ."<div class='product'>"
                    ."<img src='data:image/png;base64,".base64_encode($row['image'])
                    ."' width='100px' height='100px'></img><br>"
                    .$row['name'].", "
                    .$row['price']."<br>"
                    .'<input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Add to cart" class="btnAddAction" />'
                    ."<br>\n</form>\n</div>\n<br>";
                }
               ?>
            </ul>
         </div>
         
        <div id="shopping_cart">
            <h3>Einkaufswagen</h3>
            <ul id="selection_list">
               <li>selected example-product</li>
            </ul>
         </div>

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
               <input type="password"
               class="form-control"
               name="pass"
               placeholder="Passwort"
               required>
               <br>
               <button class="btn_register" type="submit" 
                  name="register">Registrieren</button><br>
         </form>
      </div>


      <div id="user_container">
        <div id="user_content">
            <?php
            if ($umail){
                $db = new SQLite3('static/db/webshop.db');
                $results = $db->query("SELECT * FROM customers WHERE email ='".$umail."';");
                while ($row = $results->fetchArray()){
                    $fname = $row['fname'];
                    $lname = $row['lname'];
                    $email = $row['email'];
                    echo "<h2>Hallo, ".$fname.'.</h2>'
                        .'<h3>Deine mailaddresse ist:<br>'
                        .$email.".</h3>";
                }
            }
            else{
                echo "not logged in";
            }
            ?>
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

                $fname = "'".SQLite3::escapeString($_POST['fname'])."'";
                $lname = "'".SQLite3::escapeString($_POST['lname'])."'";
                $birth_date ="'". SQLite3::escapeString($_POST['birth_date'])."'";
                $umail = "'".SQLite3::escapeString($_POST['email'])."'";
                $pass_hash = "'".SQLite3::escapeString(md5($_POST['pass']))."'";

                $db = new SQLite3('static/db/webshop.db');
                $cmd = "INSERT INTO customers
                    (fname, lname, birth_date, email, pass_hash)
                    VALUES ("
                    .$fname.", ".$lname.", ".$birth_date.", ".$umail.", ".$pass_hash
                    .");";
                $result = $db->query($cmd);
                if(! $result){
                    die('db-error: '.$db->lastErrorMsg());
                }
                else{
                    echo 'Registrierung erfolgreich!';
                };
           };
      ?>
      </div>
      </div>
   </div>
   <div id="footer_container">
      <div id="footer_content">
         <p>ITF16b 2018<p>
      </div>
   </div>
<?php
       echo "<script type=text/javascript>$('#userpage').hide();</script>";
       if ($logged_in == True){
           echo "<script type=text/javascript>$('#userpage').html('".$uname."');</script>";
           echo "<script type=text/javascript>$('#login_container, #register').hide(1200);</script>";
           echo "<script type=text/javascript>$('#userpage').show(600);</script>";
           echo "<script type=text/javascript>$('#nav').css('border-bottom', '3px solid #00c4ff');</script>";
       };
?>
</body>
