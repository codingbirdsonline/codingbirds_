
function validateEmailSendForm() {
   var name = $("#name").val();
   var email = $("#email").val();
   var subject = $("#subject").val();
   var message = $("#message").val();
   var attachment = $("#attachment").val();

   if (name == ""){
       $("#nameError").show();
       $("#nameError").html("Please enter your name");
       $("#nameError").fadeOut(4000);
       $("#name").focus();
       return false;
   }else  if (email == ""){
       $("#emailError").show();
       $("#emailError").html("Please enter your email");
       $("#emailError").fadeOut(4000);
       $("#email").focus();
       return false;
   }else  if (!validateEmail(email)){
       $("#emailError").show();
       $("#emailError").html("Please enter valid email");
       $("#emailError").fadeOut(4000);
       $("#email").focus();
       return false;
   }else  if (subject == ""){
       $("#subjectError").show();
       $("#subjectError").html("Please enter subject");
       $("#subjectError").fadeOut(4000);
       $("#subject").focus();
       return false;
   }else if (message == ""){
       $("#messageError").show();
       $("#messageError").html("Please enter some message");
       $("#messageError").fadeOut(4000);
       $("#message").focus();
       return false;
   }else if (attachment == ""){
       $("#attachmentError").show();
       $("#attachmentError").html("Please select a attachment");
       $("#attachmentError").fadeOut(4000);
       $("#attachment").focus();
       return false;
   }else{
       return true;
   }

    function validateEmail(inputText) {
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if(inputText.match(mailformat)) {
            return true;
        } else{
            return false;
        }
    }
}
