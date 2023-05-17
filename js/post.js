const buttonPublish = document.getElementById("btnPublish")
const like = document.getElementById("like")
const comment = document.getElementById("comment")
const share = document.getElementById("share")
const card = document.getElementById("card")
const error = document.getElementById("error")
const file = document.getElementById("file")
const imagepost = document.getElementById("imagepost")
let countLike = 0

buttonPublish.onclick = () => {
    buttonPublish.style.background = "rgb(150, 58, 237)"
    buttonPublish.style.color = "white"
}

like.onclick = () => {
    count += 1
    if (count >1){
        like.src = "./imageAnimation/heartnoclick.png"
        count = 0
    }else if (count === 1){
        like.src = "./imageAnimation/heartclick.png"
    }


}

comment.onclick = () => {
    const formComment = document.createElement("form")
    const inputComment = document.createElement("input")
    const submitComment = document.createElement("input")
    submitComment.classList = "mt-2 ms-2"
    formComment.classList = "d-flex"
    inputComment.classList = "form-control w-75"
    formComment.method = "post"
    submitComment.type = "submit"
    submitComment.value = ""
    submitComment.style.width = "30px"
    submitComment.style.border = "none"
    submitComment.style.background = "url(./imageAnimation/send.png) no-repeat"
    formComment.appendChild(inputComment)
    formComment.appendChild(submitComment)
    card.appendChild(formComment)
    
}

file.addEventListener('change',function (event){
    const file = event.target.files[0];
    if (file){
        const reader = new FileReader();
        reader.onload = function(e){
            imagepost.src = e.target.result;
        };
        reader.readAsDataURL(file)
    }
})