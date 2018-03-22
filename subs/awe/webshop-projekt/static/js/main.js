document.addEventListener('DOMContentLoaded', function(){ 
    console.log('This site uses cookies.');
    $.fn.extend({
        toggleText: function(a, b){
                return this.text(this.text() == b ? a : b);
            }
    });
    $('#register_container, #user_container, #userpage').hide();
    $('#register').click(function(){
        $('#product_container, #shopping_cart').hide(300);
        $('#register_container').show(300);
        $('#user_container').hide();
        if ( "<?php echo $_SESSION['valid'] ?>" == 'true'){
            console.log('yes');
        };
    });
    $('#login').click(function(){
        console.log('login clicked');
    });
    $('#userpage').click(function(){
        $('#product_container, #shopping_cart').hide(300);
        $('#register_container').hide(300);
        $('#user_container').show(300);
    });
    $('#home').click(function(){
        $('#product_container, #shopping_cart').show(300);
        $('#register_container').hide(300);
        $('#user_container').hide(300);
    });
}, true);
