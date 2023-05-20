const left = document.getElementById("left")
const right = document.getElementById("right")
const image = document.querySelector(".card-img-top")
const titleCard = document.getElementById("title")
const paragraph = document.getElementById("paragraph")
const card1 = document.getElementById("card1")
const card2 = document.getElementById("card2")
const card3 = document.getElementById("card3")
const card4 = document.getElementById("card4")
const card5 = document.getElementById("card5")

function checkCardVisibility(card,rotation){
    var cardTop = card.getBoundingClientRect().top
    if(cardTop < window.innerHeight - 300){
        card.style.opacity = "1"
        card.style.transform = "translateX(0)"
    }else if (cardTop > window.innerHeight -250){
        card.style.opacity = "0"
        card.style.transform = `translateX(${rotation}%)`
    }
}
window.addEventListener('scroll',function(){
    checkCardVisibility(card1,-50)
    checkCardVisibility(card2,50)
    checkCardVisibility(card3,-50)
    checkCardVisibility(card4,50)
    checkCardVisibility(card5,-50)
})
