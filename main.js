function addEventListeners(){
    document.getElementById('responsive-menu-bar').addEventListener('click',()=>{
        document.getElementById('responsive-menu').style.display='block';
    });
    document.getElementById('menu-close-bar').addEventListener('click',()=>{
        document.getElementById('responsive-menu').style.display='none';
    });
}

addEventListeners();