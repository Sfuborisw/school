document.addEventListener('DOMContentLoaded', function(){ 
    $('#home').css({'text-decoration': ' underline #00c4ff'});
    $('#register_container, #user_container, #userpage_dropdown').hide();
    $('#register').click(function(){
        $('#product_container, #shopping_cart').hide(0);
        $('#register_container').show(0);
        $('#user_container').hide(0);
        $('#register').css({'text-decoration': ' underline #00c4ff'});
        $('#userpage, #home').css({'text-decoration':'underline'});
    });
    $('#userpage').click(function(){
        $('#userpage_drowdown').toggle();
        $('#product_container, #shopping_cart').hide(0);
        $('#register_container').hide(0);
        $('#user_container').show(0);
        $('#userpage').css({'text-decoration': ' underline #00c4ff'});
        $('#register, #home').css({'text-decoration':'underline'});
    });
    $('#home').click(function(){
        $('#product_container, #shopping_cart').show(0);
        $('#register_container').hide(0);
        $('#user_container').hide(0);
        $('#home').css({'text-decoration': ' underline #00c4ff'});
        $('#register, #userpage').css({'text-decoration':'underline'});
    });
}, true);
