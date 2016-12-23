/*index.js*/
function autoIndexSlide() {
    if (indexsseextended == 1) {
        slideShowTimer = 15000;
        indexsseextended = 0;
    }
    else if (indexsseextended == 0) {
        if (indexsse == 1) {
        document.getElementById("slideName").innerHTML = "[Website Name]";
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
    document.getElementById("slideName").innerHTML = "[Website Name]";
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
    document.getElementById("positionFeatures").style.display = 'inline-block';
    document.getElementById("positionAboutWeb").style.display = 'none';
    document.getElementById("positionAboutUs").style.display = 'none';
}
function showAboutWeb () {
    document.getElementById("positionFeatures").style.display = 'none';
    document.getElementById("positionAboutWeb").style.display = 'inline-block';
    document.getElementById("positionAboutUs").style.display = 'none';
}
function showAboutUs() {
    document.getElementById("positionFeatures").style.display = 'none';
    document.getElementById("positionAboutWeb").style.display = 'none';
    document.getElementById("positionAboutUs").style.display = 'inline-block';
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
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
function showItems() { 
    //show items (using php to get from database what items user has)
}
function showAbilities() {
    //show abilities (using php...)
}
function showClothes() {
    //show clothes (using php...)
}
function showCharacter() {
    document.getElementById("characterbackground").style.display = 'inline-block';
    document.getElementById("userinfo").style.display = 'none';
    document.getElementById("stuffbackground").style.display = 'none';
}
function showStats() {
    document.getElementById("characterbackground").style.display = 'none';
    document.getElementById("userinfo").style.display = 'inline-block';
    document.getElementById("stuffbackground").style.display = 'none';
}
function showStuff() {
    document.getElementById("characterbackground").style.display = 'none';
    document.getElementById("userinfo").style.display = 'none';
    document.getElementById("stuffbackground").style.display = 'inline-block';
}

/*market.js*/
function showMarket() {
    document.getElementById("marketitems").style.display = 'inline-block';
    document.getElementById("marketactive").style.display = 'none';
    document.getElementById("stuffbackground").style.display = 'none';
}
function showSellItems() {
    document.getElementById("marketitems").style.display = 'none';
    document.getElementById("marketactive").style.display = 'none';
    document.getElementById("stuffbackground").style.display = 'inline-block';
}
function showActive() {
    document.getElementById("marketitems").style.display = 'none';
    document.getElementById("marketactive").style.display = 'inline-block';
    document.getElementById("stuffbackground").style.display = 'none';
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
/*
emotes = document.getElementsByClassName("emote");
for (var i=0; i<emotes.length(); i++) {
    emotes[i].style.display = "none";
}
document.getElementById("emotebeingshown").style.display = "inline-block";
*/
function emoteShow() {
    document.getElementById("emoteHello").style.display = 'inline-block';
    document.getElementById("emoteWellPlayed").style.display = 'inline-block';
    document.getElementById("emoteWow").style.display = 'inline-block';
    document.getElementById("emoteHaha").style.display = 'inline-block';
    document.getElementById("emoteSorry").style.display = 'inline-block';
    document.getElementById("emoteUhhhhh").style.display = 'inline-block';
    document.getElementById("emoteOops").style.display = 'inline-block';
    document.getElementById("emoteCustom").style.display = 'inline-block';
    document.getElementById("emoteBack").style.display = 'inline-block';
    document.getElementById("emoteEmotes").style.display = 'none';
}
function emoteHide() {
    document.getElementById("emoteHello").style.display = 'none';
    document.getElementById("emoteWellPlayed").style.display = 'none';
    document.getElementById("emoteWow").style.display = 'none';
    document.getElementById("emoteHaha").style.display = 'none';
    document.getElementById("emoteSorry").style.display = 'none';
    document.getElementById("emoteUhhhhh").style.display = 'none';
    document.getElementById("emoteOops").style.display = 'none';
    document.getElementById("emoteCustom").style.display = 'none';
    document.getElementById("emoteBack").style.display = 'none';
    document.getElementById("emoteEmotes").style.display = 'inline-block';
}
function emoteReset() {
    document.getElementById("youEmoteBubble").style.display = 'none';
    document.getElementById("youEmoteBubble").style.opacity = 1;
    document.getElementById("emoteEmotes").style.display = 'inline-block';
}
function emoteHello() { //Hello emote
    //Hiding emote options
    document.getElementById("emoteHello").style.display = 'none';
    document.getElementById("emoteWellPlayed").style.display = 'none';
    document.getElementById("emoteWow").style.display = 'none';
    document.getElementById("emoteHaha").style.display = 'none';
    document.getElementById("emoteSorry").style.display = 'none';
    document.getElementById("emoteUhhhhh").style.display = 'none';
    document.getElementById("emoteOops").style.display = 'none';
    document.getElementById("emoteCustom").style.display = 'none';
    document.getElementById("emoteBack").style.display = 'none';
    document.getElementById("emoteEmotes").style.display = 'none';
    //Showing the emote
    document.getElementById("youEmoteBubble").style.display = 'inline-block';
    var hello = null;
    var emoteRandomizer = Math.floor((Math.random() * 3) + 1);
    if (emoteRandomizer == 1) {
        hello = "Hello.";
    }
    else if (emoteRandomizer == 2) {
        hello = "Hi there!";
    }
    else if (emoteRandomizer == 3) {
        hello = "Hey...";
    }
    else {
        hello = "null";
    }
    document.getElementById("emoteText").innerHTML = hello;
    setTimeout(function(){document.getElementById("youEmoteBubble").style.opacity = 0;}, 4600);
    setTimeout(emoteReset, 5000);

}
function emoteWellPlayed() {
    //Hiding emote options
    document.getElementById("emoteHello").style.display = 'none';
    document.getElementById("emoteWellPlayed").style.display = 'none';
    document.getElementById("emoteWow").style.display = 'none';
    document.getElementById("emoteHaha").style.display = 'none';
    document.getElementById("emoteSorry").style.display = 'none';
    document.getElementById("emoteUhhhhh").style.display = 'none';
    document.getElementById("emoteOops").style.display = 'none';
    document.getElementById("emoteCustom").style.display = 'none';
    document.getElementById("emoteBack").style.display = 'none';
    document.getElementById("emoteEmotes").style.display = 'none';
    //Showing the emote
    document.getElementById("youEmoteBubble").style.display = 'inline-block';
    var WellPlayed = null;
    var emoteRandomizer = Math.floor((Math.random() * 3) + 1);
    if (emoteRandomizer == 1) {
        WellPlayed = "Well Played.";
    }
    else if (emoteRandomizer == 2) {
        WellPlayed = "What a play!";
    }
    else if (emoteRandomizer == 3) {
        WellPlayed = "Nice Decision...";
    }
    else {
        WellPlayed = "null";
    }
    document.getElementById("emoteText").innerHTML = WellPlayed;
    setTimeout(function(){document.getElementById("youEmoteBubble").style.opacity = 0;}, 4600);
    setTimeout(emoteReset, 5000);
}
function emoteWow() {
    //Hiding emote options
    document.getElementById("emoteHello").style.display = 'none';
    document.getElementById("emoteWellPlayed").style.display = 'none';
    document.getElementById("emoteWow").style.display = 'none';
    document.getElementById("emoteHaha").style.display = 'none';
    document.getElementById("emoteSorry").style.display = 'none';
    document.getElementById("emoteUhhhhh").style.display = 'none';
    document.getElementById("emoteOops").style.display = 'none';
    document.getElementById("emoteCustom").style.display = 'none';
    document.getElementById("emoteBack").style.display = 'none';
    document.getElementById("emoteEmotes").style.display = 'none';
    //Showing the emote
    document.getElementById("youEmoteBubble").style.display = 'inline-block';
    var Wow = null;
    var emoteRandomizer = Math.floor((Math.random() * 3) + 1);
    if (emoteRandomizer == 1) {
        Wow = "Wow!";
    }
    else if (emoteRandomizer == 2) {
        Wow = "Amazing.";
    }
    else if (emoteRandomizer == 3) {
        Wow = "Incredible...";
    }
    else {
        Wow = "null";
    }
    document.getElementById("emoteText").innerHTML = Wow;
    setTimeout(function(){document.getElementById("youEmoteBubble").style.opacity = 0;}, 4600);
    setTimeout(emoteReset, 5000);
}
function emoteHaha() {
    //Hiding emote options
    document.getElementById("emoteHello").style.display = 'none';
    document.getElementById("emoteWellPlayed").style.display = 'none';
    document.getElementById("emoteWow").style.display = 'none';
    document.getElementById("emoteHaha").style.display = 'none';
    document.getElementById("emoteSorry").style.display = 'none';
    document.getElementById("emoteUhhhhh").style.display = 'none';
    document.getElementById("emoteOops").style.display = 'none';
    document.getElementById("emoteCustom").style.display = 'none';
    document.getElementById("emoteBack").style.display = 'none';
    document.getElementById("emoteEmotes").style.display = 'none';
    //Showing the emote
    document.getElementById("youEmoteBubble").style.display = 'inline-block';
    var Haha = null;
    var emoteRandomizer = Math.floor((Math.random() * 3) + 1);
    if (emoteRandomizer == 1) {
        Haha = "HAHA!";
    }
    else if (emoteRandomizer == 2) {
        Haha = "Hilarious...";
    }
    else if (emoteRandomizer == 3) {
        Haha = "Lol.";
    }
    else {
        Haha = "null";
    }
    document.getElementById("emoteText").innerHTML = Haha;
    setTimeout(function(){document.getElementById("youEmoteBubble").style.opacity = 0;}, 4600);
    setTimeout(emoteReset, 5000);
}
function emoteSorry() {
    //Hiding emote options
    document.getElementById("emoteHello").style.display = 'none';
    document.getElementById("emoteWellPlayed").style.display = 'none';
    document.getElementById("emoteWow").style.display = 'none';
    document.getElementById("emoteHaha").style.display = 'none';
    document.getElementById("emoteSorry").style.display = 'none';
    document.getElementById("emoteUhhhhh").style.display = 'none';
    document.getElementById("emoteOops").style.display = 'none';
    document.getElementById("emoteCustom").style.display = 'none';
    document.getElementById("emoteBack").style.display = 'none';
    document.getElementById("emoteEmotes").style.display = 'none';
    //Showing the emote
    document.getElementById("youEmoteBubble").style.display = 'inline-block';
    var Sorry = null;
    var emoteRandomizer = Math.floor((Math.random() * 3) + 1);
    if (emoteRandomizer == 1) {
        Sorry = "Sorry...";
    }
    else if (emoteRandomizer == 2) {
        Sorry = "I apologize.";
    }
    else if (emoteRandomizer == 3) {
        Sorry = "My apologies.";
    }
    else {
        Sorry = "null";
    }
    document.getElementById("emoteText").innerHTML = Sorry;
    setTimeout(function(){document.getElementById("youEmoteBubble").style.opacity = 0;}, 4600);
    setTimeout(emoteReset, 5000);
}
function emoteUhhhhh() {
    //Hiding emote options
    document.getElementById("emoteHello").style.display = 'none';
    document.getElementById("emoteWellPlayed").style.display = 'none';
    document.getElementById("emoteWow").style.display = 'none';
    document.getElementById("emoteHaha").style.display = 'none';
    document.getElementById("emoteSorry").style.display = 'none';
    document.getElementById("emoteUhhhhh").style.display = 'none';
    document.getElementById("emoteOops").style.display = 'none';
    document.getElementById("emoteCustom").style.display = 'none';
    document.getElementById("emoteBack").style.display = 'none';
    document.getElementById("emoteEmotes").style.display = 'none';
    //Showing the emote
    document.getElementById("youEmoteBubble").style.display = 'inline-block';
    var Uhhhhh = null;
    var emoteRandomizer = Math.floor((Math.random() * 3) + 1);
    if (emoteRandomizer == 1) {
        Uhhhhh = "Uhhhhh...";
    }
    else if (emoteRandomizer == 2) {
        Uhhhhh = "...";
    }
    else if (emoteRandomizer == 3) {
        Uhhhhh = "*cricket *cricket*";
    }
    else {
        Uhhhhh = "null";
    }
    document.getElementById("emoteText").innerHTML = Uhhhhh;
    setTimeout(function(){document.getElementById("youEmoteBubble").style.opacity = 0;}, 4600);
    setTimeout(emoteReset, 5000);
}
function emoteOops() {
    //Hiding emote options
    document.getElementById("emoteHello").style.display = 'none';
    document.getElementById("emoteWellPlayed").style.display = 'none';
    document.getElementById("emoteWow").style.display = 'none';
    document.getElementById("emoteHaha").style.display = 'none';
    document.getElementById("emoteSorry").style.display = 'none';
    document.getElementById("emoteUhhhhh").style.display = 'none';
    document.getElementById("emoteOops").style.display = 'none';
    document.getElementById("emoteCustom").style.display = 'none';
    document.getElementById("emoteBack").style.display = 'none';
    document.getElementById("emoteEmotes").style.display = 'none';
    //Showing the emote
    document.getElementById("youEmoteBubble").style.display = 'inline-block';
    var Oops = null;
    var emoteRandomizer = Math.floor((Math.random() * 3) + 1);
    if (emoteRandomizer == 1) {
        Oops = "Oops...";
    }
    else if (emoteRandomizer == 2) {
        Oops = "Mistakes were made.";
    }
    else if (emoteRandomizer == 3) {
        Oops = "My bad.";
    }
    else {
        Oops = "null";
    }
    document.getElementById("emoteText").innerHTML = Oops;
    setTimeout(function(){document.getElementById("youEmoteBubble").style.opacity = 0;}, 4600);
    setTimeout(emoteReset, 5000);
}
function emoteCustom() {
    //Hiding emote options
    document.getElementById("emoteHello").style.display = 'none';
    document.getElementById("emoteWellPlayed").style.display = 'none';
    document.getElementById("emoteWow").style.display = 'none';
    document.getElementById("emoteHaha").style.display = 'none';
    document.getElementById("emoteSorry").style.display = 'none';
    document.getElementById("emoteUhhhhh").style.display = 'none';
    document.getElementById("emoteOops").style.display = 'none';
    document.getElementById("emoteCustom").style.display = 'none';
    document.getElementById("emoteBack").style.display = 'none';
    document.getElementById("emoteEmotes").style.display = 'none';
    //Showing the emote
    document.getElementById("youEmoteBubble").style.display = 'inline-block';
    document.getElementById("emoteText").innerHTML = /*PHP GET CUSTOM TEXT HERE */"[Custom]";
    setTimeout(function(){document.getElementById("youEmoteBubble").style.opacity = 0;}, 4600);
    setTimeout(emoteReset, 5000);
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