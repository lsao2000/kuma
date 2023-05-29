const homePost = document.getElementById("homePost")
const homeFreind = document.getElementById("homeFreind")
const homeMessage = document.getElementById("homeMessage")
const PostUser = document.getElementById("post")
const freindUser = document.getElementById("freind")
const MESSAGE_USER = document.getElementById("divMessageParent")
const like = document.querySelectorAll(".like")
const FREINDS = document.querySelectorAll(".freind")
const CHATFREIND = document.querySelectorAll(".chatFreind")
const SendMessage = document.getElementById("Sendmessage")
const chatBody = document.getElementById("chatBody")
const checkIsFreind = document.getElementById("checkIsFreind")
const btnLike = document.querySelectorAll(".btnLike")
const POST_ID = document.querySelectorAll(".POST_ID")
const USER_ID = document.querySelectorAll(".USER_ID")
let AreFreind = false

function animation (){
    window.requestAnimationFrame(animation)
    if(AreFreind){
        Getmessage()
    } 
    homeMessage.addEventListener("click",function(){
        PostUser.style.display = "none"
        freindUser.style.display = "none"
        MESSAGE_USER.style.display = "block"
        homeMessage.style.background = "url(./imageAnimation/chatclick.png) no-repeat"
        homeFreind.style.background = "url(./imageAnimation/people.png) no-repeat"
        homePost.style.background = "url(./imageAnimation/blog.png) no-repeat"
        homeFreind.style.marginTop = "3px"
        homeFreind.style.height = "32px"
    })
    homeFreind.addEventListener("click",function(){
        freindUser.style.display = "block"
        PostUser.style.display = "none"
        MESSAGE_USER.style.display = "none"
        homeFreind.style.background = "url(./imageAnimation/peopleclick.png) no-repeat"
        homePost.style.background = "url(./imageAnimation/blog.png) no-repeat"
        homeMessage.style.background = "url(./imageAnimation/chat.png) no-repeat"
        homeFreind.style.marginTop = "8px"
        homeFreind.style.height = "30px"
    })
    homePost.addEventListener("click",function(){
        freindUser.style.display = "none"
        PostUser.style.display = "block"
        MESSAGE_USER.style.display = "none"
        homePost.style.background = "url(./imageAnimation/blogclick.png) no-repeat"
        homeFreind.style.background = "url(./imageAnimation/people.png) no-repeat"
        homeMessage.style.background = "url(./imageAnimation/chat.png) no-repeat"
        homeFreind.style.marginTop = "3px"
        homeFreind.style.height = "32px"
    })
}
function Sendmessage(e){ 
    e.preventDefault()
    const xhr = new XMLHttpRequest();
    xhr.open("POST","SFM.php",true)
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded")
    const freindId = document.getElementById("freindid").value
    const senderId = document.getElementById("senderId").value
    let textmessage = document.getElementById("textmessage").value
    const sendername = document.getElementById("sendername").value
    const params = `freindid=${freindId}&senderId=${senderId}&textMessage=${textmessage}&sendername=${sendername}`
    xhr.onload = function(){
        if (this.status === 200){
            document.getElementById("textmessage").value = ""
            chatBody.scrollTop = chatBody.scrollHeight
            console.log(this.responseText)
        }
    }
    xhr.send(params)
}
function Getmessage(){
    const xhr = new XMLHttpRequest();
    const freindId = document.getElementById("freindid").value
    const senderId = document.getElementById("senderId").value
    const sendername = document.getElementById("sendername").value
    xhr.open("GET",`GFM.php?freindid=${freindId}&senderId=${senderId}&sendername=${sendername}`,true)
    xhr.onload = function(){
        if (this.status === 200){
            chatBody.innerHTML = this.responseText
            // console.log(this.responseText)
        }
    }
    xhr.send()
}
function likePost(postid,userid,click){
    const xhr = new XMLHttpRequest();
    xhr.open('POST','LRPU.php',true)
    xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded")
    const paramsLike = `POST_ID=${postid}&USER_ID=${userid}`
    xhr.onload = function(){
        if (this.status === 200){
            if (this.responseText === "we add the row"){
                like[click].src = "./imageAnimation/heartclick.png"
            }else if (this.responseText === "now we delete row"){
                like[click].src = "./imageAnimation/heartnoclick.png"
            }
        }
    }
    xhr.send(paramsLike)
}


for (const click in btnLike){
    btnLike[click].onclick = () =>{
          likePost(POST_ID[click].value,USER_ID[click].value,click)
    }
}
for (const freind in FREINDS ){
    FREINDS[freind].onclick = () =>{
        for (const chatFreind of CHATFREIND){
            chatFreind.style.display = "none"
        }
        CHATFREIND[freind].style.display = "flex"
        chatBody.scrollTop = chatBody.scrollHeight
    }
}

// displayLikePost(POST_ID,USER_ID)
animation() // i made this just for display the changing automaticlly

if (checkIsFreind.textContent == "freind"){
    SendMessage.addEventListener("submit",Sendmessage)
    AreFreind = true
}else{

}
