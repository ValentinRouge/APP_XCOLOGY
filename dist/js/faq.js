const questions = document.querySelectorAll('.question-answer');
 
questions.forEach(function(question){
    console.log(question ); 
    const btn = question.querySelector('.faq-button');
    console.log(btn);
    btn.addEventListener("click",function(item){

        question.classList.toggle("show-text");
        
    })
})
