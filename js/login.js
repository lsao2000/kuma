const body = document.querySelector("body");
const kuma = document.getElementById("kuma");
const username = document.getElementById("username");
let count = 0;

function animation(){
    window.requestAnimationFrame(animation)
    if (count >= 1){
        count = 0;
    }else{
        count += 0.001;
    }
    if (count >= 0.6 || count <= 0.1){
        kuma.style.color = "blueviolet"
    }else{
            kuma.style.color = "white"
    }
    body.style.background = `linear-gradient(${count}turn,blueviolet,white)`
}
animation()