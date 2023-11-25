    // Variables
var formParagraph = document.querySelector('.Typewriter');
var formParagraphTextContent = formParagraph.textContent;
var i = 1 ;
formParagraph.innerHTML = formParagraphTextContent[0];
    // Typewriter
function repeatTypewriter () {
    if (formParagraphTextContent = "Pour Avoir Plus d'Informations Veuillez Connecter à Votre Compte"){
        const Typewriter = setInterval(() => {
            formParagraph.innerHTML += formParagraphTextContent[i];
            formParagraph.style.textTransform = "uppercase";
            i += 1 ;
            if(i  == formParagraphTextContent.length + 1) {
                clearInterval(Typewriter);
                formParagraph.innerHTML = formParagraphTextContent;
                setTimeout(() => {
                    formParagraph.innerHTML = formParagraphTextContent[0];
                    i = 1;
                }, 2000)
                setTimeout(() => {
                    repeatTypewriter();
                }, 2000);
            }
        }, 200);
    }
    
}
repeatTypewriter();

