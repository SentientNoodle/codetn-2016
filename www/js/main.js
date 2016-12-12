/*index.js*/
function startAutoIndexSlide() {
    var indexsse = 1;
    autoIndexSlide();
}

function autoIndexSlide() {
    if (indexsse == 1) {
        document.getElementById("indexsse1").style.display = 'inline-block';
        document.getElementById("indexsse2").style.display = 'none';
        document.getElementById("indexsse3").style.display = 'none';
        indexsse = 2;
    }
    else if (indexsse == 2) {
        document.getElementById("indexsse1").style.display = 'none';
        document.getElementById("indexsse2").style.display = 'inline-block';
        document.getElementById("indexsse3").style.display = 'none';
        indexsse = 3;
    }
    else if (indexsse == 3) {
        document.getElementById("indexsse1").style.display = 'none';
        document.getElementById("indexsse2").style.display = 'none';
        document.getElementById("indexsse3").style.display = 'inline-block';
        indexsse = 1;
    }
    else {
    }
    setTimeout(autoIndexSlide, 5000);
}
function indexsse1() {
    indexsse = 2;
    document.getElementById("indexsse1").style.display = 'inline-block';
    document.getElementById("indexsse2").style.display = 'none';
    document.getElementById("indexsse3").style.display = 'none';
}
function indexsse2() {
    indexsse = 3;
    document.getElementById("indexsse1").style.display = 'none';
    document.getElementById("indexsse2").style.display = 'inline-block';
    document.getElementById("indexsse3").style.display = 'none';
}
function indexsse3() {
    indexsse = 1;
    document.getElementById("indexsse1").style.display = 'none';
    document.getElementById("indexsse2").style.display = 'none';
    document.getElementById("indexsse3").style.display = 'inline-block';
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
function send(value) {
    $.ajax({
        url: "../../php/pvp.php",
        type: "POST",
        data: {ability: value}
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