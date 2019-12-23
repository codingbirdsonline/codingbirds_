function validateForm() {
    var count_checked = $("[name='recordsCheckBox[]']:checked").length;
    if (count_checked == 0) {
        alert("Please check at least one checkbox");
        return false;
    }else{
        return true;
    }
}
