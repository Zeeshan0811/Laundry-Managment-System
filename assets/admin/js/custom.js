// ajax post request
function ajaxPost(url,data) {
    $.ajax({
        type: "POST",
        url: url,
        data: data,
        dataType: "html",
        success: function(data) {
            return data;
        },
        error: function() {
            alert('Error occured');
        }
    });
}