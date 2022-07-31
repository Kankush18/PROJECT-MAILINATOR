let view=document.querySelectorAll('.view');
let back=document.querySelectorAll('.b');
let file=document.querySelectorAll(".data-content");
let box=document.querySelector(".headings");
let allMails=document.querySelectorAll(".incoming_mail");

let subject=document.querySelectorAll(".subject");
let btn=document.querySelectorAll(".btn");

for(let i=0;i<view.length;i++){
    view[i].addEventListener('click',function(){
        file[i].style.display='block';
        box.classList.toggle('hidden');
        console.log(allMails);
       
        for(let j=0;j<allMails.length;j++){
            allMails[j].classList.toggle('hidden');
            subject[j].classList.toggle('hidden');
            btn[j].classList.toggle('hidden');
            
            console.log('hello');
        }
    })
    back[i].addEventListener('click',function(){
        box.classList.toggle('hidden');
        for(let j=0;j<allMails.length;j++){
            allMails[j].classList.toggle('hidden');
            subject[j].classList.toggle('hidden');
            btn[j].classList.toggle('hidden');
            
            console.log('hello');
        }
        file[i].style.display='none';
       
    })
}

  