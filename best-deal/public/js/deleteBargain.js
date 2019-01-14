$(document).ready(function(){});


function deleteBargain(id) {
    if (!confirm('Do you want to delete this bargain?')) {
        return;
    }
    const apiUrl = "http://localhost:8080";

    $.ajax({
        url : apiUrl + '/?page=delete_bargain',
        method : "POST",
        data : {
            id : id
        },
        success: function() {
            alert('Selected bargain successfully deleted from database!');
            location.href = apiUrl + '/?page=index';
        }
    });
    
}

function deleteComment(id) {
    if (!confirm('Do you want to delete this comment?')) {
        return;
    }
    const apiUrl = "http://localhost:8080";

    $.ajax({
        url : apiUrl + '/?page=delete_comment',
        method : "POST",
        data : {
            id : id
        },
        success: function() {
            alert('Selected comment successfully deleted from database!');
            location.reload();
        }
    });
}
