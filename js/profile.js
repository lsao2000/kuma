const toggle = document.getElementById("toggle");
const navbarLeft = document.getElementById("navbarleft");
const navbar = document.querySelector("nav")
let count = 0

toggle.onclick = ()=>{
    count += 1
    if (count > 1){
        navbar.style.filter = "blur(0)"
        navbarLeft.style.display = "none"
        count = 0
    }
    else if (count === 1){
        navbar.style.filter = "blur(1px)"
        navbarLeft.style.display = "flex"
    }
}