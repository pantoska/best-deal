$(document).ready(function() {
    $('.like').click(function () {
        likeFunction(this.id);
    });
    $('.glyphicon-thumbs-down').click(function () { dislikeFunction(this.id);});

});

function likeFunction(id) {

    $.ajax({
        method: "POST",
        url: "http://localhost:8080/?page=set_rate",
        data : {
            rate: 1,
            id : id
        },
        success: function () {
            location.reload();
        }
    });
}
function dislikeFunction(id) {
    $.ajax({
        method: "POST",
        url: "http://localhost:8080/?page=set_rate",
        data : {
            rate: -1,
            id : id
        },
        success: function () {
            location.reload();
        }
    });
}