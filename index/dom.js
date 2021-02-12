// ----- navigation bar --------- 
console.log('work');
var bar = document.querySelector('.bar');
var menuItems = document.querySelector('.menuItems');
var navbar = document.getElementsByTagName('nav')[0];
// menuItems.style.maxHeight = '0px';
bar.addEventListener('click', () => {
    menuItems.classList.toggle('mxHeight');
});

console.log(navbar.offsetHeight);
window.addEventListener('scroll', () => {
    var scrollHeight = window.pageYOffset;
    console.log(scrollHeight);
    if(scrollHeight > navbar.offsetHeight) {
        navbar.style.opacity = 0.5;
    }
    else {
        navbar.style.opacity = 1;
    }
});