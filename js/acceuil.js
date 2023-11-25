    // NEEDED VARIABLES
var navButtons = document.querySelectorAll('aside button');
    navButtons[0].style.cssText = `
        background-color: #999966;
        color: #fff;
    `;

    function focusNavbar (arg) {
        if (arg != navButtons.length - 1 ) { 
            navButtons[arg].onclick = () => {
                navButtons[arg].style.cssText = `
                    background-color: #999966;
                    color: #fff;
                `;
                for (let index = 0; index < navButtons.length; index++) {
                    if(index != arg) {
                        navButtons[index].style.cssText = `
                        background-color: #fff;
                        color: #000;
                    `;
                    }
                }
            }
        }
    };
    
    focusNavbar(0);
    focusNavbar(1);
    focusNavbar(2);
    

var menuBtns = document.querySelectorAll('.Menu button');
var myCSS = new Object();
    var myCSS = {
        L3adi: `background-color: #fff; color: #000`,
        Lclick: `background-color: #3CA55C; color: #fff`,
        Lhover: `background-color: #3CA55C; color: #fff; font-size: 1rem; transition: all .7s;`,
        Lover: `background-color: #fff; color: #000; font-size: 0.9rem; transition: all .3s;`
    };

    const myIframe = document.querySelector('iframe');

    var index;
    

    function menuContent (index) {
        switch (index) {
            case 0:
                return '../frontal/envoyer_courrier.php';
                break;

            case 1:
                return '../frontal/courriers_recues.php';
                break;

            case 2:
                return '../frontal/chercher_courrier.php';
                break;
                
            case 3:
                return '../frontal/ajout_utilisateur.php';
                break;
        }
    }

    for(let i = 0; i<menuBtns.length ; i++) {
        menuBtns[0].style.cssText = myCSS.Lclick;
        menuBtns[i].addEventListener('click', () => {
            myIframe.src = menuContent(i);
            menuBtns[i].style.cssText = myCSS.Lclick;
            for(let index = 0; index <menuBtns.length; index ++) {
                if(index != i) {
                    menuBtns[index].style.cssText = myCSS.L3adi;
                }
            }
        });  
    }

    // IMPORTANT 
    navButtons[0].onclick = () => {
        myIframe.src = 'envoyer_courrier.php';
        setTimeout(() => {
            window.location.reload();
        }, 50);
    };


var Menu = document.querySelector('.Menu');
    navButtons[1].onclick = () => {
        myIframe.src = 'mon_compte.php';
        Menu.style.visibility = 'hidden';
        navButtons[0].style.cssText = myCSS.L3adi;
        navButtons[1].style.cssText = myCSS.Lclick;
    };


var I = document.querySelector('.fa-arrow-right-from-bracket');
    var Déconnexion = document.querySelector('.déco');

        Déconnexion.onmouseover = () => {
            I.classList.add('fa-bounce');
        }
        Déconnexion.onmouseleave = () => {
            I.classList.remove('fa-bounce');
        }

var Menu = document.querySelector('.Menu');
var navButtons = document.querySelectorAll('aside button');
    navButtons[1].onclick = () => {
        myIframe.src = 'mon_compte.php';
        navButtons[0].style.cssText = myCSS.L3adi;
        Menu.style.visibility = 'hidden';
        navButtons[1].style.cssText = `
            background-color: #999966;
            color: #fff;
            `; 
        };