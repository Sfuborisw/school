<!DOCTYPE html>
<?php
   ob_start();
   session_start();
?>
<head>
   <title>*Der* Webshop</title>
   <link rel="stylesheet" type="text/css" href="static/style/main.css">
   <script src="static/js/main.js"></script>
   <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
   <meta charset="utf-8">
</head>
<body>
   <div id="head_container">
      <div id="head_content">
         <h1>*Der* Webshop</h1>
      </div>


      <div id="login_container">
         <form class="form-signin" role="form" 
            action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
               ?>" method = "post">
            <div id="login_left">
               <input type="text" class="form-control" 
                  name="email"
                  placeholder="email" 
                  required><br>
               <input type="password" class="form-control"
                  name="password" placeholder="password" required><br>
            </div>
            <div id="login_right">
               <button class="btn_login" type="submit" 
                  name="login">Login</button><br>
            </div>
         </form>
      </div>


   </div>
   <div id="body_container">


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
               echo 'Eingeloggt als '.$uname.'!';
            }else {
               echo 'Incorrect email/pass-combination!';
            }
         }
         ?>


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
                    ."<img src='data:image/jpeg;base64,".base64_encode($row['image'])
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


      </div>
   </div>
   <div id="footer_container">
      <div id="footer_content">
         <p>ITF16b 2018<p>
         <p><a href="register.php">registrieren</a></p>
      </div>
   </div>
</body>
