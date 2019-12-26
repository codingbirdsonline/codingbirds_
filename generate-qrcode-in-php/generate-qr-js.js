$("form#generateQrForm").on("submit",function (e) {
    e.preventDefault();
   var qrText = $("#qrText").val();
   $.post("generate-qr-script.php",{generateQr:'generateQr',qrText:qrText},function (response) {
        var data = response.split('^');
        var generateQrImgPath = data[1];
        $("#generatedQrImg").attr("src",generateQrImgPath);
   })
});
