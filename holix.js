function gen(length=72, charset="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!\"#$%&'()*+,-./:;<=>?@[\]^_`{|}~") {
    let password = new Array(length).fill(null).map(()=> charset.charAt(Math.floor(Math.random() * charset.length))).join('');
    document.getElementById("89263").value = password;
    document.getElementById("77614").value = password;
    let retarded = document.getElementById("6316")
    retarded.textContent = "";
    retarded.style.color = ''
    let retarded2 = document.getElementById("6311")
    retarded2.textContent = ""
}
function user(length=20, charset="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789") {
    let user = new Array(length).fill(null).map(()=> charset.charAt(Math.floor(Math.random() * charset.length))).join('');
    document.getElementById("25662").value = user;
}
function copy() {
    var textBox = document.getElementById("89263");
    textBox.select();
    document.execCommand("copy");
}
var password = document.getElementById("89263")
var password2 = document.getElementById("77614")
function checkshit() {
    let text = document.getElementById("89263").value
    let text222222222322222 = document.getElementById("77614").value
    let retarded = document.getElementById("6316")
    let retarded2 = document.getElementById("6311")
    let upper = /[A-Z]/
    let lower = /[a-z]/
    let numbers = /[0-9]/
    let chars = /[^\w]/
    if (text.match(chars) && text.match(lower) && text.match(numbers) && text.match(upper) && text.length>=72) {
        retarded.textContent = ""
        retarded.style.color = ''
        } else {
            retarded.textContent = "Password is weak"
            retarded.style.color = '#ba414b'
        }
    if (text222222222322222!=text) {
        retarded2.textContent = "Passwords don't match!"
        retarded2.style.color = '#ba414b'
    }    else {
            retarded2.textContent = ""
            retarded2.style.color = ''
    }
}
kYCZE3TyTsIbhMoc
cIIcELgDra7Zqm5ySki9

VqYfW9P8JM2On
Nb4xtvsKwvUOVNiGNGb5Vxe
