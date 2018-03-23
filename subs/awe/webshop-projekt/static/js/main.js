document.addEventListener('DOMContentLoaded', function(){ 
    $('#home').css({'color':'#f70025'});
    $('#register_container, #user_container').hide();
    $('#register').click(function(){
        $('#product_container, #shopping_cart').hide(300);
        $('#register_container').show(300);
        $('#user_container').hide(300);
        $('#register').css({'color':'#f70025'});
        $('#userpage, #home').css({'color':'#d0e1f9'});
    });
    $('#userpage').click(function(){
        $('#product_container, #shopping_cart').hide(300);
        $('#register_container').hide(300);
        $('#user_container').show(300);
        $('#userpage').css({'color':'#f70025'});
        $('#register, #home').css({'color':'#d0e1f9'});
    });
    $('#home').click(function(){
        $('#product_container, #shopping_cart').show(300);
        $('#register_container').hide(300);
        $('#user_container').hide(300);
        $('#home').css({'color':'#f70025'});
        $('#register, #userpage').css({'color':'#d0e1f9'});
    });
}, true);
