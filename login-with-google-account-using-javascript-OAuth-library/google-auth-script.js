
function renderButton() {
    gapi.signin2.render('g-signin2', {
        'scope': 'profile email',
        'width': 250,
        'height': 40,
        'longtitle': true,
        'theme': 'dark',
        'onsuccess': onSignIn,
        'onfailure': onFailure
    });
}

function onSignIn(googleUser) {

    var profile = googleUser.getBasicProfile();

    console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
    console.log('Name: ' + profile.getName());
    console.log('Image URL: ' + profile.getImageUrl());
    console.log('Email: ' + profile.getEmail());

    var googleTockenId = profile.getId();
    var name = profile.getName();
    var email = profile.getEmail();
    var profile = profile.getImageUrl();

    $("#loaderIcon").show('fast');
    $("#g-signin2").hide('fast');

    saveUserData(googleTockenId,name,email,profile); // save data to our database for reference
}

// Sign-in failure callback
function onFailure(error) {
    alert(error);
}

// Sign out the user
function signOut() {
    if(confirm("Are you sure to signout?")){
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function () {
            $("#loginDetails").hide();
            $("#loaderIcon").hide('fast');
            $("#g-signin2").show('fast');
        });

        auth2.disconnect();
    }
}

function saveUserData(googleTockenId,name,email,profile) {
    $.post("script.php",{authProvider:"Google",googleTockenId:googleTockenId,name:name,email:email,profile:profile},
        function (response) {
        var data = response.split('^');
        if (data[1] == "loggedIn"){
            $("#loaderIcon").hide('fast');
            $("#g-signin2").hide('fast');

            $("#profileLabel").attr('src',profile);
            $("#nameLabel").html(name);
            $("#emailLabel").html(email);
            $("#googleIdLabel").html(googleTockenId);

            $("#loginDetails").show();
        }
    });
}
