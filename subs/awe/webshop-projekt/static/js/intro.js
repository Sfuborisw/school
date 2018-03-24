$(document).ready(function(){
$('#welcome_msg').hide();
$('#welcome_msg').fadeIn(2500);
$('#welcome_msg').fadeOut(700);
setTimeout(function(){
window.location.replace("shop.php");
}, 3200);
});
