/*index.js*/
function autoIndexSlide() {
    if (indexsseextended == 1) {
        slideShowTimer = 15000;
        indexsseextended = 0;
    }
    else if (indexsseextended == 0) {
        if (indexsse == 1) {
        document.getElementById("slideName").innerHTML = "Scholarly Fisticuffs";
        document.getElementById("slideInfo").innerHTML = document.getElementById("slideInfo1").innerHTML;
        document.getElementById("dot1").style.backgroundColor = "black";
        document.getElementById("dot2").style.backgroundColor = "#bbb";
        document.getElementById("dot3").style.backgroundColor = "#bbb";
        slideShowTimer = 5000;
        indexsse = 2;
        }
        else if (indexsse == 2) {
        document.getElementById("slideName").innerHTML = "Features";
        document.getElementById("slideInfo").innerHTML = document.getElementById("slideInfo2").innerHTML;
        document.getElementById("dot2").style.backgroundColor = "black";
        document.getElementById("dot3").style.backgroundColor = "#bbb";
        document.getElementById("dot1").style.backgroundColor = "#bbb";
        slideShowTimer = 5000;
        indexsse = 3;
        }
        else if (indexsse == 3) {
        document.getElementById("slideName").innerHTML = "Sign Up Now!";
        document.getElementById("slideInfo").innerHTML = document.getElementById("slideInfo3").innerHTML;
        document.getElementById("dot3").style.backgroundColor = "black";
        document.getElementById("dot2").style.backgroundColor = "#bbb";
        document.getElementById("dot1").style.backgroundColor = "#bbb";
        slideShowTimer = 5000;
        indexsse = 1;
        }
        else {
        document.getElementById("slideName").innerHTML = "ERROR";
        document.getElementById("slideInfo").innerHTML = "ERROR";
        }
    }
    
    setTimeout(autoIndexSlide, slideShowTimer);
}
function indexsse1() {
    indexsse = 2;
    document.getElementById("slideName").innerHTML = "Scholarly Fisticuffs";
    document.getElementById("slideInfo").innerHTML = document.getElementById("slideInfo1").innerHTML;
    document.getElementById("dot1").style.backgroundColor = "black";
    document.getElementById("dot2").style.backgroundColor = "#bbb";
    document.getElementById("dot3").style.backgroundColor = "#bbb";
}
function indexsse2() {
    indexsse = 3;
    document.getElementById("slideName").innerHTML = "Features";
    document.getElementById("slideInfo").innerHTML = document.getElementById("slideInfo2").innerHTML;
    document.getElementById("dot2").style.backgroundColor = "black";
    document.getElementById("dot3").style.backgroundColor = "#bbb";
    document.getElementById("dot1").style.backgroundColor = "#bbb";
}
function indexsse3() {
    indexsse = 1;
    document.getElementById("slideName").innerHTML = "Sign Up Now!";
    document.getElementById("slideInfo").innerHTML = document.getElementById("slideInfo3").innerHTML;
    document.getElementById("dot3").style.backgroundColor = "black";
    document.getElementById("dot2").style.backgroundColor = "#bbb";
    document.getElementById("dot1").style.backgroundColor = "#bbb";
}
/*about.js*/
function showFeatures() {
    document.getElementById("aboutFeatures").style.display = 'inline-block';
    document.getElementById("aboutWeb").style.display = 'none';
    document.getElementById("aboutUs").style.display = 'none';
    document.getElementById("aboutType").innerHTML = 'Features';
}
function showAboutWeb () {
    document.getElementById("aboutFeatures").style.display = 'none';
    document.getElementById("aboutWeb").style.display = 'inline-block';
    document.getElementById("aboutUs").style.display = 'none';
    document.getElementById("aboutType").innerHTML = 'About "Scholarly Fisticuffs"';
}
function showAboutUs() {
    document.getElementById("aboutFeatures").style.display = 'none';
    document.getElementById("aboutWeb").style.display = 'none';
    document.getElementById("aboutUs").style.display = 'inline-block';
    document.getElementById("aboutType").innerHTML = 'About Us';
}

/*findgame.js*/
function check() {
    $.ajax({
        url: "../ajax/checkRequests.php",
        type: "POST",
        success: function(data) {
            window.location = "http://codetn-2016-sentientnoodle.c9users.io/pvp.php";
        },
        error: function(data) {
            setTimeout(check, 3000);
        },
        async: true,
    });
};

function showRequestBattleMain() {
    document.getElementById("backbutton").style.display = 'none';
    document.getElementById("requestabattlebutton").style.display = 'inline-block';
    document.getElementById("battlenotificationsbutton").style.display = 'inline-block';
    document.getElementsByClassName("users")[0].style.display = 'none';
    document.getElementsByClassName("requests")[0].style.display = 'none';
}
function showRequestABattle() {
    document.getElementById("backbutton").style.display = 'inline-block';
    document.getElementById("requestabattlebutton").style.display = 'none';
    document.getElementById("battlenotificationsbutton").style.display = 'none';
    document.getElementsByClassName("users")[0].style.display = 'inline-block';
}
function showBattleNotifications() {
    document.getElementById("backbutton").style.display = 'inline-block';
    document.getElementById("requestabattlebutton").style.display = 'none';
    document.getElementById("battlenotificationsbutton").style.display = 'none';
    document.getElementsByClassName("requests")[0].style.display = 'inline-block';
}

/*inventory.js*/
function toggleNav() {
    sidenav = document.getElementById("sidenav");
    arrow = document.getElementById("arrow");
    if (sidenav.style.width == "250px") {
        sidenav.style.display = "none";
        sidenav.style.width = "0px";
        arrow.style.right = "0px";
        arrow.innerHTML = "❮";
    } else {
        sidenav.style.display = "inline";
        sidenav.style.width = "250px";
        arrow.style.right = "250px";
        arrow.innerHTML = "❯";
    }
}
// function closeNav() {
//     document.getElementById("mySidenav").style.width = "0px";
//     document.getElementById("arrow").style.right = "0px";
// }
function showAbilitiesItems() { 
    document.getElementById("inventoryAbilitiesItems").style.display = 'inline-block';
    document.getElementById("inventoryClothes").style.display = 'none';
    document.getElementById("inventoryType").innerHTML = 'Abilities & Items';
}
function showClothes() {
    document.getElementById("inventoryAbilitiesItems").style.display = 'none';
    document.getElementById("inventoryClothes").style.display = 'inline-block';
    document.getElementById("inventoryType").innerHTML = 'Clothes';
}

/*market.js*/
function showMarket() {
    document.getElementById("marketitems").style.display = 'inline-block';
    document.getElementById("marketactive").style.display = 'none';
    document.getElementById("inventoryitems").style.display = 'none';
    document.getElementById("marketType").innerHTML = 'Market Items';
}
function showSellItems() {
    document.getElementById("marketitems").style.display = 'none';
    document.getElementById("marketactive").style.display = 'none';
    document.getElementById("inventoryitems").style.display = 'inline-block';
    document.getElementById("marketType").innerHTML = 'Sell An Item';
}
function showActive() {
    document.getElementById("marketitems").style.display = 'none';
    document.getElementById("marketactive").style.display = 'inline-block';
    document.getElementById("inventoryitems").style.display = 'none';
    document.getElementById("marketType").innerHTML = 'Your Active Market Items';
}
/*pvp.js*/
function timer(t) {
    setTimeout(function(){timer(t);}, 100);
    // JavaScript's time is in miliseconds and is one second fast of PHP's
    t.innerHTML = startTime - Math.floor(Date.now() / 1000 - 1) + 60;
    if (t.innerHTML <= 0) {
        checkTurn();
    }
}

function checkTurn() {
    $.ajax({
        url: "../ajax/checkTurn.php",
        type: "post",
        success: function(data) {
            if (data == "reload") {
                window.location.href = "pvp.php?reload=1";
            } else if (data == "redirect") {
                window.location.href = "index.php";
            }
        },
        error: function(data) {
            setTimeout(checkTurn(), 3000);
        },
        async: true
    });
}
/*signup.js*/
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

/* changepassword.js */
function validateChanged() {
    var password = document.getElementById("newpassword");
    var password2 = document.getElementById("confirmnewpassword");
    
    if (password.value != password2.value) {
        password2.setCustomValidity("Passwords don't match!");
        return false;
    } else {
        password2.setCustomValidity("");
        return true;
    }
}

function getChangedPassStrength() {
    var pass = document.getElementById("newpassword").value;
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

/*win.js*/
function firework4() {
    document.getElementById("firework4").style.backgroundColor = 'red';
    setTimeout(firework3, 1000);
}
function firework3() {
    document.getElementById("firework4").style.backgroundColor = 'black';
    document.getElementById("firework3").style.backgroundColor = 'red';
    setTimeout(firework2, 1000);
}
function firework2() {
    document.getElementById("firework3").style.backgroundColor = 'black';
    document.getElementById("firework2").style.backgroundColor = 'red';
    setTimeout(firework1, 1000);
}
function firework1() {
    document.getElementById("firework2").style.backgroundColor = 'black';
    document.getElementById("firework1").style.backgroundColor = 'red';
    setTimeout(fireworkExplosionStage1, 1000);
}
function fireworkExplosionStage1() {
    document.getElementById("firework1").style.backgroundColor = 'black';
    document.getElementById("fireworkExplosionStage1").style.backgroundColor = 'red';
    setTimeout(fireworkExplosionStage2, 1000);
}
function fireworkExplosionStage2() {
    document.getElementById("fireworkExplosionStage2").style.backgroundColor = 'orange';
    setTimeout(fireworkExplosionStage3, 1000);
}
function fireworkExplosionStage3() {
    document.getElementById("fireworkExplosionStage3").style.backgroundColor = "yellow";
    setTimeout(endFirework, 1000);
}
function endFirework() {
    document.getElementById("fireworkExplosionStage1").style.backgroundColor = 'black';
    document.getElementById("fireworkExplosionStage2").style.backgroundColor = 'black';
    document.getElementById("fireworkExplosionStage3").style.backgroundColor = 'black';
    document.getElementById("youWin").innerHTML = 'You Win!';
}