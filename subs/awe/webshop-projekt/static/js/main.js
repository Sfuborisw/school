document.addEventListener('DOMContentLoaded', function(){ 
    $('#register_container, #user_container').hide();
    $('#register').click(function(){
        $('#product_container, #shopping_cart').hide(300);
        $('#register_container').show(300);
        $('#user_container').hide(300);
        $('#register').css({'color':'#00c5ff'});
        $('#userpage, #home').css({'color':'white'});
    });
    $('#userpage').click(function(){
        $('#product_container, #shopping_cart').hide(300);
        $('#register_container').hide(300);
        $('#user_container').show(300);
        $('#userpage').css({'color':'#00c5ff'});
        $('#register, #home').css({'color':'white'});
    });
    $('#home').click(function(){
        $('#product_container, #shopping_cart').show(300);
        $('#register_container').hide(300);
        $('#user_container').hide(300);
        $('#home').css({'color':'#00c5ff'});
        $('#register, #userpage').css({'color':'white'});
    });
}, true);
