$(document).ready(function() {

    $('button.glyphicon-thumbs-up').click(function () {

        var id = this.id.startsWith('like') ? this.id.substr('like'.length) : this.id;
        var form = $('#rate'+ id);

        likeFunction(id, form, 1);
        $('#like' + id).attr("disabled", "disabled");
        $('#dislike'+id).prop("disabled", false).removeAttr("disabled");

    });

    $('button.glyphicon-thumbs-down').click(function () {
        var id = this.id.startsWith('dislike') ? this.id.substr('dislike'.length) : this.id;
        var form = $('#rate'+ id);


        likeFunction(id, form, -1);
        $('#dislike' + id).attr("disabled", "disabled");
        $('#like'+id).prop("disabled", false).removeAttr("disabled");
    });


});

function likeFunction(id_bargain, form, rate) {

    $.ajax({
        method: "POST",
        url: "http://localhost:8080/?page=set_rate",
        data : {
            id_user: sessionId,
            rate: rate,
            id_bargain : id_bargain,
        },
        success: function (response) {
            alert(response);
            $(form).fadeOut(300, function(){
                form.html(response).fadeIn().delay(100);
            });

        }
    });
}