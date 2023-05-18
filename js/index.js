const card1 = document.getElementById("card1")


window.addEventListener("scroll",function(){
    if (window.scrollY >= 1250){
        card1.style.opacity = "1"
    }
    else{
        card1.style.opacity = "0"
    }
})
