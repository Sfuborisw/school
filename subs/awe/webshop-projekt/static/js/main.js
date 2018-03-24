document.addEventListener('DOMContentLoaded', function(){ 
    $('#home').css({'text-decoration': ' underline #2f313e'});
    $('#register_container, #user_container, #userpage_dropdown').hide();
    $('#product_container, #shopping_cart, #head_container, #footer_container').fadeIn();
    $('#register').click(function(){
        $('#product_container, #shopping_cart').hide(0);
        $('#register_container').show(0);
        $('#user_container').hide(0);
        $('#register').css({'text-decoration': ' underline #2f313e'});
        $('#userpage, #home').css({'text-decoration':'none'});
    });
    $('#userpage').click(function(){
        $('#userpage_drowdown').toggle();
        $('#product_container, #shopping_cart').hide(0);
        $('#register_container').hide(0);
        $('#user_container').show(0);
        $('#userpage').css({'text-decoration': ' underline #2f313e'});
        $('#register, #home').css({'text-decoration':'none'});
    });
    $('#home').click(function(){
        $('#product_container, #shopping_cart').show(0);
        $('#register_container').hide(0);
        $('#user_container').hide(0);
        $('#home').css({'text-decoration': ' underline #2f313e'});
        $('#register, #userpage').css({'text-decoration':'none'});
    });
}, true);
