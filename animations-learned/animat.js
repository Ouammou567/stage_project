    // Typewriter Animation
var Paragraph = document.querySelector('.Typewriter');
var pargTextContent = Paragraph.textContent;
var i = 0 ;

function TypeWriter(arg) {
    Content = arg.textContent;
    arg.innerHTML = "";
    const TYPEWRITER = setInterval(() => { 
        arg.innerHTML += Content[i];
        i += 1;
        if(arg.innerHTML == Content) {
            console.log("hello");
            clearInterval(TYPEWRITER);
            setTimeout(() => {
                TypeWriter(arg);
                i = 0 ;
            }, 2000);
        }
    }, 200);
    
    
}    

TypeWriter(Paragraph);


    // Underline Mouse (Over and Leave) => function
function underlineEffect(text, effect_place) {
    for (let index = 0; index < text.length; index++) {
        text[index].onmouseover = () => {  
            effect_place[index].style.cssText = `
                width: 100%;
                transition: all 1s;
            `;
        };
        text[index].onmouseleave = () => {  
            effect_place[index].style.cssText = `
                width: 0%;
                transition: all 1.5s;
                `;
        };
    }
}


underlineEffect(document.querySelectorAll('.Texts'), document.querySelectorAll('.underlineStyles'));


    

