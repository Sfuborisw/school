$cart_sum = 0; 
$cart_format[] = '<table>'; 
foreach ($contents as $id=>$quantity) { 
$sql = 'SELECT * FROM products WHERE id = '.$id; 
$result = $db->query($sql); 
$row = $result->fetch(); 
extract($row); 
$cart_format[] = '<tr>'; 
$cart_format[] = '<td><a href="main.php?action=delete&id='.$id.'" class="r">Löschen</a></td>'; 
$cart_format[] = '<td>'.$lang.'_'.$name.'</td>'; 
$cart_format[] = '<td>'.$price.',00€</td>'; 
$cart_format[] = '<td><input type="text" name="quantity'.$id.'" value="'.$quantity.'" size="3" maxlength="3" /></td>'; 
$cart_format[] = '<td>'.($price * $quantity).',00€</td>'; 
$cart_sum += $price * $quantity; 
$cart_format[] = '</tr>'; 
} 
$cart_format[] = '</table>'; 
$cart_format[] = '<p>Total: '.$cart_sum.'</p>';
