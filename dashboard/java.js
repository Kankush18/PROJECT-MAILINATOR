let file=document.querySelectorAll(".recent");

let btn=document.querySelectorAll(".action");




for(let i=0;i<file.length;i++){
    file[i].addEventListener('mouseover',function(){
        btn[i*2].style.opacity="1";
        btn[(i*2)+1].style.opacity="1";
        
            console.log(btn);
        })
        file[i].addEventListener('mouseout',function(){
            btn[i*2].style.opacity="0";
            btn[(i*2)+1].style.opacity="0";
            
                console.log(btn);
            })
}