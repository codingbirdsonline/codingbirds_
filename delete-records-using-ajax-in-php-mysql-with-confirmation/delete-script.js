/**
 * Load all the records on page load
 */
$(function () {
   getAllRecords();
});

/**
 * This function loads all the records from database
 */
function getAllRecords() {
    $.ajax({
        url:"api.php",
        method:"POST",
        data:{
            apiName:"getData"
        },
        success:function (response) {
            let srNo = 1;
            let tableData = ``;
            let finalResponse = JSON.parse(response);
            if (finalResponse.status == 1){
                $.each(finalResponse.data,function (key,value) {
                    tableData += `<tr>
                                <td>`+srNo+`</td>
                                <td>`+value.name+`</td>
                                <td>`+value.class+`</td>
                                <td>`+value.marks+`</td>
                                <td><button type="button" class="btn btn-danger btn-sm" onclick="deleteRecord(`+value.id+`)"><i class="fa fa-trash"></i></button></td>
                        </tr>`;
                    srNo++;
                });
                $("#table-data").html(tableData);
            }
        },
        error:function (errorResponse) {
            console.log(errorResponse);
        }
    });
}

/**
 * Delete the record, using an API
 * @param id
 */
function deleteRecord(id) {
    Swal.fire({
        title: "Delete",
        text: "Are you sure to delete this record ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Yes Delete it"
    }).then((result) => {
        if (result.value) {
            let urlPath = 'api.php';
            $.ajax({
                url: urlPath,
                method: 'POST',
                data: {
                    id: id,
                    apiName:"deleteData"
                },
                success: function (response) {
                    let finalResponse = JSON.parse(response);
                    if (finalResponse.status == 1){
                        Swal.fire('Record deleted', finalResponse.message, 'success')
                        getAllRecords();
                    }else{
                        Swal.fire('Error', finalResponse.message, 'error')
                    }
                },
                error:function (errorResponse) {
                  console.log(errorResponse);
                }
            });
        }
    });
}
