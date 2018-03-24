<!DOCTYPE html>
<?php
   ob_start();
   session_start();
   $fname_cookie = $_COOKIE['fname'];
   $umail_cookie = $_COOKIE['umail'];
   $lang_cookie = $_COOKIE['lang'];
   if (isset($_COOKIE['fname'], $_COOKIE['umail'], $_COOKIE['lang'])){
       $umail = $umail_cookie;
       $lang = $lang_cookie;
       $fname = $fname_cookie;
       $logged_in = True;
   }
   else{
       $umail = False;
       $fname = False;
       $lang = "de";
   }
   if ($lang != "en"){
    $lang = "de";
   };

   if(isset($_GET['lang'])){ 
        $lang = $_GET['lang']; 
    } 
    $db = new SQLite3('static/db/webshop.db');
    $results = $db->query('SELECT * FROM lang_dict');
    while ($row = $results->fetchArray()) {
        $city_name_input = $row[$lang.'_city_name_input'];
        $street_input = $row[$lang.'_street_input'];
        $placeholder = $row[$lang.'_placeholder'];
        $register_btn = $row[$lang.'_register_btn'];
        $birthdate_input = $row[$lang.'_birthdate_input'];
        $city_code_input = $row[$lang.'_city_code_input'];
        $web_title = $row[$lang.'_web_title'];
        $housenr_input = $row[$lang.'_housenr_input'];
        $add_to_cart_btn = $row[$lang.'_add_to_cart_btn'];
        $fname_input = $row[$lang.'_fname_input'];
        $lname_input = $row[$lang.'_lname_input'];
        $cart_title = $row[$lang.'_cart_title'];
        $pass_input = $row[$lang.'_pass_input'];
        $contact_data_title = $row[$lang.'_contact_data_title'];
        $post_title = $row[$lang.'_post_title'];
        $greeting = $row[$lang.'_greeting'];
        $head_title = $row[$lang.'_head_title'];
        $home_bt = $row[$lang.'_home_bt'];
        $login_bt = $row[$lang.'_login_bt'];
        $footer = $row[$lang.'_footer'];
        $email_placeholder = $row[$lang.'_email_placeholder'];
        $logout_bt = $row[$lang.'_logout_bt'];
        $de_lang_link = $row['de_lang_link'];
        $en_lang_link = $row['en_lang_link'];
        $salt = "1729";
    };
	switch ($_GET['action']){
	case "add":
    if (!empty($_POST['quantity'])){
		$query_cmd = "update cart_products set quantity_".$GET["code"]." = '".$_POST['quantity']."' where id = '".$_GET["code"]."';";
echo $query_cmd;
        $result = $db->query($query_cmd);
	}
case "remove":
	if(!empty($_SESSION["cart_item"])) {
		foreach($_SESSION["cart_item"] as $k => $v) {
			if($_GET["id"] == $k)	unset($_SESSION["cart_item"][$k]);				
			if(empty($_SESSION["cart_item"])) unset($_SESSION["cart_item"]);
		}
	}
case "empty":
	unset($_SESSION["cart_item"]);
break;
    };
    ?>
<head>
    <title><?php echo $web_title; ?></title>
   <link rel="stylesheet" type="text/css" href="static/style/main.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="static/js/main.js"></script>
    <link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">
   <meta charset="utf-8">
</head>
<body>
   <div id="head_container">
   <script type="text/javascript">
        $("#head_container").hide();
    </script>
      <div id="head_content">
      <a href="./index.php"><h1><?php echo $head_title; ?></h1></a>
      </div>


      <div id="nav">
      <div id="nav_content">
      <div id='home' class='jq_link nav_stuff'><?php echo $home_bt; ?></div>
         <div id='userpage' class='jq_link nav_stuff'>Userpage
             <div id='userpage_dropdown'>
                <div id="acc_mgmt">Account-management</div>
                <div id='history'>Letzte Bestellungen</div>
             </div>
         </div>
         <div id='register' class='jq_link nav_stuff'><?php echo $register_btn; ?></div>
<?php
       echo "<script type=text/javascript>$('#userpage').hide();</script>";
       if ($logged_in == True){
           echo "<script type=text/javascript>$('#userpage').html('".$fname."');</script>";
           echo "<script type=text/javascript>$('#login_container, #register').hide(0);</script>";
           echo "<script type=text/javascript>$('#userpage').show(0);</script>";
       };
?>
         <form class="form_signin" id="login_container" role="form" 
         action="<?php echo $_SERVER["PHP_SELF"] . '?'.http_build_query($_GET); ?>"
               method = "post">
                <div id="login_mail">
               <input type="text" class="form-control nav_stuff" 
                  name="email"
                  placeholder="<?php echo $email_placeholder; ?>" 
                  required>
                </div>
                <div id="login_pass">
               <input type="password" class="form-control nav_stuff"
               name="password" placeholder="<?php echo $pass_input; ?>" required>
                </div>
               <button id="login" class="nav_stuff" type="submit" 
               name="login"><?php echo $login_bt; ?></button>
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
            if (md5($salt.$_POST['password']) == $uhash) {
                echo "<script type=text/javascript>$('#register_container').hide();</script>";
               $_SESSION['valid'] = true;
               $_SESSION['timeout'] = time();
               $_SESSION['email'] = 'user';
               $logged_in = True;
               $_SESSION['email'] = $umail;
               setcookie('fname', $uname);
               setcookie('lang', $lang);
               setcookie('umail', $umail);
            }
            else {
               echo 'Incorrect email/pass-combination!';
               $logged_in = False;
            }
         }
         ?>
<?php
       echo "<script type=text/javascript>$('#userpage').hide();</script>";
       if ($logged_in == True){
           echo "<script type=text/javascript>$('#userpage').html('".$fname."');</script>";
           echo "<script type=text/javascript>$('#login_container, #register').hide(0);</script>";
           echo "<script type=text/javascript>$('#userpage').show(0);</script>";
       };
?>
    </div>

   </div>
   <div id="body_container">




      <div id="body_content">

         <div id="product_container">
   <script type="text/javascript">
        $("#product_container").hide();
    </script>
                <?php
                $db = new SQLite3('static/db/webshop.db');
                $results = $db->query('SELECT id, image, '.$lang.'_name, price FROM products;');
                while ($row = $results->fetchArray()){
                    echo "<div class='product'>"
                            ."<div class='product_content'>"
                                ."<form method='post' action='shop.php?action=add&code=".$row['id']."'>"
                                .'<h3>'.$row[$lang.'_name']."</h3><br>"
                                ."<img src='".($row['image'])."' width='100px' height='100px'></img><br>"
                            ."</div>"
                            .$row['price'].",00€<br>"
                            .'<div id="product_selector">'
                                .'<input type="text" name="quantity" value="1" size="2" />'
                                .'<input type="submit" value="'.$add_to_cart_btn.'" class="btnAddAction" />'
                            .'</div>'
                            ."</form>"
                        ."</div>";
                }
               ?>
         </div>
         
<div id="shopping_cart">
<div class="txt-heading">Shopping Cart <a id="btnEmpty" href="index.php?action=empty">Empty Cart</a></div>
<?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
?>	
<table cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;"><strong>Name</strong></th>
<th style="text-align:left;"><strong>Code</strong></th>
<th style="text-align:right;"><strong>Quantity</strong></th>
<th style="text-align:right;"><strong>Price</strong></th>
<th style="text-align:center;"><strong>Action</strong></th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
		?>
				<tr>
				<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><strong><?php echo $item[$lang."_name"]; ?></strong></td>
				<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><?php echo $item["id"]; ?></td>
				<td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo $item["quantity"]; ?></td>
				<td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo "$".$item["price"]; ?></td>
				<td style="text-align:center;border-bottom:#F0F0F0 1px solid;"><a href="index.php?action=remove&code=<?php echo $item["id"]; ?>" class="btnRemoveAction">Remove Item</a></td>
				</tr>
				<?php
        $item_total += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>
<td colspan="5" align=right><strong>Total:</strong> <?php echo "$".$item_total; ?></td>
</tr>
</tbody>
</table>		
  <?php
}
?>
</div>
</div>
         </div>

      <div id="register_container">
<?php echo "<script type=text/javascript>$('#register_container').hide();</script>"; ?>
         <form class="form-signin" role="form" 
            action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
               ?>" method = "post">
               <input type="email"
               class="form-control"
               name="email"
               placeholder="Email"
               required>
               <br>
               <input type="text"
               class="form-control"
               name="fname"
               placeholder="<?php echo $fname_input; ?>"
               required>
               <br>
               <input type="text"
               class="form-control"
               name="lname"
               placeholder="<?php echo $lname_input; ?>"
               required>
               <br>
               <input type="text"
               class="form-control"
               name="birth_date"
               placeholder="<?php echo $birthdate_input; ?>"
               required>
               <br>
               <input type="text"
               class="form-control"
               name="city_code"
               placeholder="<?php echo $city_code_input; ?>"
               required>
               <br>
               <input type="text"
               class="form-control"
               name="city"
               placeholder="<?php echo $city_name_input; ?>"
               required>
               <br>
               <input type="text"
               class="form-control"
               name="street"
               placeholder="<?php echo $street_input; ?>"
               required>
               <br>
               <input type="text"
               class="form-control"
               name="housenr"
               placeholder="<?php echo $housenr_input; ?>"
               required>
               <br>
               <input type="password"
               class="form-control"
               name="pass"
               placeholder="<?php echo $pass_input; ?>"
               required>
               <br>
               <button class="btn_register" type="submit" 
               name="register"><?php echo $register_btn; ?></button><br>
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
                    echo "<h2>".$greeting.", ".$fname.'.</h2>'
                        .'<b>'.$contact_data_title.'</b><br>'
                        .$fname.' '.$lname.'<br>'
                        .$row['email'].'<br>'
                        .'<br>'
                        .'<b>'.$post_title.'</b><br>'
                        .$row['street_name'].' '.$row['house_nr'].'<br>'
                        .$row['city_code'].' '.$row['city_name'].'<br>';

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
            && !empty($_POST['fname'])
            && !empty($_POST['lname'])
            && !empty($_POST['birth_date'])
            && !empty($_POST['city_code'])
            && !empty($_POST['city'])
            && !empty($_POST['street'])
            && !empty($_POST['housenr'])
            && !empty($_POST['pass'])){

                $fname = "'".SQLite3::escapeString($_POST['fname'])."'";
                $lname = "'".SQLite3::escapeString($_POST['lname'])."'";
                $birth_date ="'". SQLite3::escapeString($_POST['birth_date'])."'";
                $umail = "'".SQLite3::escapeString($_POST['email'])."'";
                $pass_hash = "'".SQLite3::escapeString(md5($salt.$_POST['pass']))."'";
                $city_code = "'".SQLite3::escapeString($_POST['city_code'])."'";
                $city_name = "'".SQLite3::escapeString($_POST['city'])."'";
                $street_name = "'".SQLite3::escapeString($_POST['street'])."'";
                $house_nr = "'".SQLite3::escapeString($_POST['housenr'])."'";

                $db = new SQLite3('static/db/webshop.db');
                $cmd = "INSERT INTO customers
                    (fname, lname, birth_date, email, pass_hash, city_code, city_name, street_name, house_nr)
                    VALUES ("
                    .$fname.", ".$lname.", ".$birth_date.", ".$umail.", ".$pass_hash
                    .", ".$city_code.", ".$city_name.", ".$street_name.", ".$house_nr.");";
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
      <p class="footer_el"><?php echo $footer; ?></p>
      <?php if($logged_in == True){
      echo '<p><a href="logout.php" class="footer_el" id="logout">'.$logout_bt.'</a></p>'; } ?>
<p>
<?php
        if ($lang == "de"){
            echo $en_lang_link;
        }
        else {
            echo $de_lang_link;
        };
       if ($logged_in == True){
           echo "<script type=text/javascript>$('#userpage').html('".$fname."');</script>";
           echo "<script type=text/javascript>$('#userpage').show(0);</script>";
       };?>
        </p>
      </div>
   </div>
</body>
