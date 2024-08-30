
function validatePassword() {
    var password = document.getElementById("password").value;
    if (/^\d{6}$/.test(password)) {
        return true;
    } else {
        alert("Password must be exactly 6 digits.");
        return false;
    }
}