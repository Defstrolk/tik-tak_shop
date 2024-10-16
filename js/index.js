const menu_open = document.querySelector('.menu_open');
const menu_close = document.querySelector('.menu_close');
const menuLi = document.querySelector('.menuLi');

menu_open.addEventListener('click', () => {
    menuLi.classList.toggle('Open');
})



menu_close.addEventListener('click', () => {
    menuLi.classList.remove('Open');
})

