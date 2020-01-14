
$( document ).ready(function() {
    getAllData();
    console.log( "ready!" );
});
$("form#crudAppForm").on("submit",function (e) {
    e.preventDefault();
    var name = $("#name").val();
    var email = $("#email").val();
    var contact = $("#contact").val();
    var editId = $("#editId").val();
    if (name == ""){
        alert("Please enter name");
        $("#name").focus();
    }else if (email == "") {
        alert("Please enter email");
        $("#email").focus();
    }else if (contact == "") {
        alert("Please enter contact");
        $("#contact").focus();
    }else{
        $("#buttonLabel").html("Saving...");
        $("#spinnerLoader").show('fast');
        $.post("crud-script.php",{
            crudOperation:"saveData",
            name:name,
            email:email,
            contact:contact,
            editId:editId,
        },function (response) {
            if (response == "saved") {
                $("#buttonLabel").html("Save");
                $("#spinnerLoader").hide('fast');
                $("#myModal").modal('hide');
                $("form#crudAppForm").each(function () {
                    this.reset();
                });
                getAllData();
            }
        });
    }
});

function getAllData() {
    $.post("crud-script.php",{crudOperation:"getData"},function (allData) {
        $("#crudData").html(allData);
    });
}

function editData(editId,name,email,contact) {
    $("#editId").val(editId);
    $("#name").val(name);
    $("#email").val(email);
    $("#contact").val(contact);
    $("#myModal").modal('show');
}

function deleteData(deleteId) {
    if(confirm("Are you sure to delete this ?")){
        $('#deleteSpinner'+deleteId).show('fast');
        $.post("crud-script.php",{crudOperation:"deleteData",deleteId:deleteId},function (response) {
            if (response == "deleted") {
                $('#deleteSpinner'+deleteId).hide('fast');
                getAllData();
            }
        });
    }
}
