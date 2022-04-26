window.onload = function() {
    render();
};

function render() {
    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
    recaptchaVerifier.render();
}

function phoneAuth() {
    //get the number
    var number = document.getElementById('number').value;
    // alert(number);
    //it takes two parameter first one is number and second one is recaptcha
    firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function(confirmationResult) {
        //s is in lowercase
        window.confirmationResult = confirmationResult;
        coderesult = confirmationResult;
        console.log(coderesult);
        alert("Message sent");
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
        
    }).catch(function(error) {
        alert(error.message);
    });
}


function codeverify() {
    
    var code = document.getElementById('verificationCode').value;
    var phoneuser = document.getElementById('phoneUser').value;


    coderesult.confirm(code).then(function(result) {
        
        var user = result.user;
        console.log(user);
        location.href = "http://localhost/cobiene/token/" + phoneuser;
    }).catch(function(error) {
        alert(error.message);
    });
}