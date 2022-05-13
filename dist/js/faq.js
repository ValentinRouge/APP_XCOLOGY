window.addEventListener("DOMContentLoaded", (event)=> {
const questions = document.querySelectorAll('.question-answer');
 
    questions.forEach(function(question){
        console.log(question ); 
        const btn = question.querySelector('.faq-button');
        console.log(btn);
        btn.addEventListener("click",function(){
    
            question.classList.toggle("show-text");
            
        })
    })
})  



