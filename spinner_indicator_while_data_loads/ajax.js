
$(document).ready(function () {
    $("#loader").show();
    $.post("script.php",{api:"getData"},function (response) {
        var data = response.split('^');
        $("#tbody").html(data[1]);
        $("#loader").hide();
    });
});
