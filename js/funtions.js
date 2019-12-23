$(document).ready(function(){
var doc = $('.doc').val();
$('#famDocType option[value="'+doc+'"]').attr('selected',true);
var Rela = $('.Rela').val();
$('#relation option[value="'+Rela+'"]').attr('selected',true);
var marStat = $('.marStat').val();
$('#smart option[value="'+marStat+'"]').attr('selected',true);
});

function hidd() {
    var hidden= $('.business').val();
    if (hidden==1){
        $('.hidd').css('display', "none");
    }
    else{
        if(hidden==2){
            $('.hidd').css('display', "block");
        }
    }
}

function display(){
    $('.bodyModel').css('display','block');
}
function displayNone() {
    $('.bodyModel').css('display','none');
}