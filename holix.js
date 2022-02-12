function gen(length=72, charset="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!\"#$%&'()*+,-./:;<=>?@[\]^_`{|}~") {
    let password = new Array(length).fill(null).map(()=> charset.charAt(Math.floor(Math.random() * charset.length))).join('');
    document.getElementById("89263").value = password;
    document.getElementById("77614").value = password;
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