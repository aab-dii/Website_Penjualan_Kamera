
var icon = document.getElementById("icon");
var cart = document.getElementById("cart");
var home = document.getElementById("home");

icon.addEventListener("click", function () {
    isDarkTheme = document.body.classList.contains("dark-theme");
    confirmMessage = isDarkTheme ? 'Switch to Light Mode?' : 'Switch to Dark Mode?';
    userConfirmed = window.confirm(confirmMessage);

    if (userConfirmed) {
        document.body.classList.toggle("dark-theme");
        if (document.body.classList.contains("dark-theme")) {
            icon.src = "../img/sun.png";
            cart.src = "../img/invcart.png";
            home.style.color = 'red'; 
        } else {
            icon.src = "../img/moon.png";
            cart.src = "../img/cart.png"; 
            home.style.color = 'white'; 
        }
    }
});


