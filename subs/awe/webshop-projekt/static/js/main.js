document.addEventListener('DOMContentLoaded', function(){ 
    $('#register_container, #user_container').hide();
    $('#register').click(function(){
        $('#product_container, #shopping_cart').hide(300);
        $('#register_container').show(300);
        $('#user_container').hide(300);
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
