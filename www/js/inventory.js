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