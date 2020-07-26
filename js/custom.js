$(document).ready(function () {

    $(".dropdown").hover(function() {
        $('.dropdown-menu', this).stop( true, true ).fadeIn("fast");
        $(this).toggleClass('open');
    // $('b', this).toggleClass("caret caret-up");                
        },
    function() {
    $('.dropdown-menu', this).stop( true, true ).fadeOut("fast");
    $(this).toggleClass('open');
    // $('b', this).toggleClass("caret caret-up");                
});

//////////////
 var checker = document.getElementById('checkme');
 var sendbtn = document.getElementById('reg');
 var notize = document.getElementById('faze');
 // when unchecked or checked, run the function
 checker.onchange = function(){
if(this.checked){
    sendbtn.disabled = false;
     $(notize).fadeOut();
} else {
    sendbtn.disabled = true;
     $(notize).fadeIn();
}

}

//////////////////////////////

    $('#brand').change(function(e){
        alert();
        var xcard= $('#brand').val();
        if(xcard =='order'){
        $('#brand2').show();
        }else{$('#brand2').hide();}

        });
    //////////////////////////////

});