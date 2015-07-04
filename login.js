function sondur(){
    $('#btn').attr('disabled',true);
    yukleniyor();
    gonder();
}
function kontrol(){
    ad=$.trim($('#user').val());
    soyad=$.trim($('#password').val());
    if((ad!="" && ad!="user") && (soyad!="" && soyad!="pass")){
        sondur();
    }else{
        $('#yaz').html('Alemin akıllısı sen misin?');
    }
}
function gonder(){
    $.ajax({
        type:'POST',
        url:'admin.php',
        data:$('#form1').serialize(),
        success: function (msg) {
            $('#yaz').html(msg);
            $('#btn').removeAttr('disabled');
        }
    });
}
 
function yukleniyor(){
    $("#yaz").ajaxStart(function(){
        $(this).html('<center><img src="loading.gif" width="50" height="50"/></center>');
    });
}

function onay(id){
    var r = confirm("Silmek istediğinize emin misiniz?");
    if (r == true) {
        window.location.href("admin.php?s=sil&id="+id);
    }
}