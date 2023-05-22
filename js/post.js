const buttonPublish = document.getElementById("btnPublish")
const like = document.querySelectorAll(".like")
const comment = document.getElementById("comment")
const share = document.getElementById("share")
const card = document.getElementById("card")
const error = document.getElementById("error")
const file = document.getElementById("file")
const imagepost = document.getElementById("imagepost")
const formComment = document.querySelector(".formComment")

let countComment = 0


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
buttonPublish.onclick = () => {
    buttonPublish.style.background = "rgb(150, 58, 237)"
    buttonPublish.style.color = "white"
}
for (const click of like){
    let countLike = 0
    click.onclick = () => {
        countLike += 1
        if (countLike >1){
            click.src = "./imageAnimation/heartnoclick.png"
            countLike = 0
        }else if (countLike === 1){
            click.src = "./imageAnimation/heartclick.png"
        }
    
    
    }

}

comment.onclick = () => {
    formComment.style.display = "flex"
    
}
