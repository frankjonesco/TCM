import './bootstrap';




/**************************************/
/* SHOW/HIDE MAIN MENU AND SEARCH BAR */
/**************************************/


// CONSTANTS


    // BUTTONS

    const openMainMenuIcon = document.querySelector('#openMainMenuIcon');
    const closeMainMenuIcon = document.querySelector('#closeMainMenuIcon');
    const toggleSearchBar = document.querySelector('#toggleSearchBar');


    // BLOCKS

    const blackout = document.querySelector('#blackout');
    const mainMenu = document.querySelector('#mainMenu');
    const navSearchBar = document.querySelector('#navSearchBar');
    const navSearchInput = document.querySelector('#navSearchInput');




// ICON CLICKS


    // OPEN MAIN MENU

    openMainMenuIcon.onclick = function(e) {
        e.preventDefault();
        mainMenu.classList.replace('-translate-x-full', 'translate-x-0');
        if(navSearchBar.classList.contains('translate-y-20')){
            navSearchBar.classList.toggle('translate-y-20');
        }
    }


    // CLOSE MAIN MENU

    closeMainMenuIcon.onclick = function(e) {
        e.preventDefault();
        mainMenu.classList.replace('translate-x-0', '-translate-x-full');
        blackout.classList.add('hidden');
    }


    // TOGGLE SEARCH BACK AND BLACKOUT

    toggleSearchBar.onclick = function(e) {
        e.preventDefault();
        blackout.classList.toggle('hidden');
        navSearchBar.classList.toggle('translate-y-20');
        navSearchInput.focus();    
    }


    // CLOSE BLACKOUT 

    blackout.onclick = function(e) {
        e.preventDefault();
        navSearchBar.classList.remove('translate-y-20')
        blackout.classList.add('hidden');
    }




/**************************************/
/* DATA REPLACE FOR SWITCHING CLASSES */
/**************************************/


// EVENT LISTENER

document.addEventListener("DOMContentLoaded", function(){


    // TIMEOUT

    setTimeout(function(){


        var replacers = document.querySelectorAll('[data-replace]');


        for( var i = 0; i < replacers.length; i++){

            let replaceClasses = JSON.parse(replacers[i].dataset.replace.replace(/'/g, '"'));

            Object.keys(replaceClasses).forEach(function(key){
                replacers[i].classList.remove(key);
                replacers[i].classList.add(replaceClasses[key]);
            });

        }


    }, 0 );


    // TIMEOUT

    setTimeout(function(){


        var replacers = document.querySelectorAll('[data-replace]');


        for(var i=0; i<replacers.length; i++){

            let replaceClasses = JSON.parse(replacers[i].dataset.replace.replace(/'/g, '"'));

            Object.keys(replaceClasses).forEach(function(key) {
                replacers[i].classList.add(key);
                replacers[i].classList.remove(replaceClasses[key]);
            });

        }


    }, 2000 );


});