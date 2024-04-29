$(document).ready(function(){
    /* To populate the cart list, if applicable */
    $.get('/cart/current', function(res){
        $('#order').html(res);
    });

    /* This will re-populate the cart list when any form or button is clicked,
        and also serves to populate the cart when the app is launched */
    $(document).on('submit', 'form', function(){
        $.post($(this).attr('action'), $(this).serialize(), function(res){
            $('#order').html(res);
        });
        return false;
    });
    /* This will auto-submit the form (and thus immediately update the item's quantity in the cart)
        whenever the quantity is changed. */
    $(document).on('change', '.qty form input', function(){
        $(this).parent().submit(); // submits the form with update action
    })

    $(document).on('click', 'form p', function(){
        var details = $(this).html();
        $(this).parent().html("<input type='number' name='qty' min='1' value='" + details + "'>");
    });

    /* For the dialog box (for adding a new product) */
    $('#inventory button').on('click', function(){
        $.get($(this).attr('data-link'), function(res){
            $('#popup').css('display', 'block');
            $('#popup').html(res);
        });
    });

    /* The below will hide the dialog box... */
    function hidePopup(){
        if($('#popup').css('display') == 'block'){
            $('#popup').css('display', 'none');
        }
    }
    /* ... if the user presses their Escape key */
    $(document).on('keydown', function(event){
        if(event.keyCode == 27){
            hidePopup();
        }
    });

    /* ... if the user mouse-clicks anywhere outside the dialog box */
    // work in progress
    // $(document).on('click', function(event){
    //     // console.log(event);
    //     // console.log(event.target.parentElement);
    //     console.log(event.target.parentElement == $('div#popup'));
    //     if(event.target.parentElement != $('div#popup') || event.target.parentElement != $('td')){
    //         hidePopup();
    //     }
    // });

    /* This populates the datalist with the search results. */
    $('#search-bar').on('input', function(){
        $.get('/items/search/' + $(this).val(), function(res){
            $('datalist').html(res);
        });
    });

    /* Same as above, but this will also force a
    change when the search box is cleared. */
    $('#search-bar').on('change', function(){
        $.get('/items/search/' + $(this).val(), function(res){
            $('datalist').html(res);
        });
    });
})