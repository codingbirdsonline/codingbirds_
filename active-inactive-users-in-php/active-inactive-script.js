$(document).ready(function () {
   $.post("script.php",{key:"getAllUsers"},function (response) {
        $("#tableBodyData").html(response);
   })
});

function activeInactive(recordId,status) {
    var message = ((status == 0?" inactive ":" Active "));
    if (confirm("Are you sure to"+ message+ "the user")){
        $.post("script.php",{key:"activeInactive",status:status,recordId:recordId},function (response) {
            if (response == "success"){
                if (status == 0){
                    $('#activeBtn'+recordId).show();
                    $('#inactiveBtn'+recordId).hide();
                }else if (status == 1){
                    $('#inactiveBtn'+recordId).show();
                    $('#activeBtn'+recordId).hide();
                }
                alert("User is "+ message +"now");
            }
        });
    }
}
