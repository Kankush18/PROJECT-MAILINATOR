let file=document.querySelectorAll(".recent");
let del=document.querySelectorAll(".delete");
for(let i=0;i<6;i++){
    del[i].addEventListener('click',function(){
        file[i].remove();
    })
}
let box=document.querySelector("#none");
box.style.display="none";
let empty=document.querySelector("#none");
if(file.length==0){
box.style.display='block';
console.log('hi');
}