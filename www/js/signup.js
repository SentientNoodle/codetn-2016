function validate() {
    var password = document.getElementById("password");
    var password2 = document.getElementById("password2");
    
    if (password.value != password2.value) {
        password2.setCustomValidity("Passwords don't match!");
        return false;
    } else {
        password2.setCustomValidity("");
        return true;
    }
}

function getPassStrength() {
    var pass = document.getElementById("password").value;
    var meter = document.getElementById("strengthMeter");
    var display = document.getElementById("strengthText");
    
    var strength = zxcvbn(pass).score;
    meter.value = strength;
    
    var scores = ["Very Bad","Bad","Weak","Good", "Strong"];
    if (pass === "") {
        display.innerHTML = "";
        meter.style.display = "none";
    } else {
        display.innerHTML = "Strength: " + scores[strength];
        meter.style.display = "inline-block";
    }
}