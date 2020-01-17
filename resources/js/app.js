require('./bootstrap');

console.log(document.querySelector('#sidebar-button'));

document.querySelector('#sidebar-button').addEventListener('click', toggleSidebar)

function toggleSidebar() {
    document.querySelector('#sidebar-button').classList.toggle('open-button')
    document.querySelector('#sidebar').classList.toggle('open-sidebar')
}
