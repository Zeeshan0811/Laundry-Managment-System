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


function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
}