const menu = document.getElementById('top-menu')
const menuButton = document.getElementById('menu-button')
document.addEventListener('click', (e) => {
    if (menuButton.contains(e.target)) {
        menu.classList.toggle('hidden')
        menu.classList.toggle('top-menu-expanded')
    } else {
        if (menu.classList.contains('top-menu-expanded')) {
            menu.classList.toggle('hidden')
            menu.classList.toggle('top-menu-expanded')
        }
    }
})
const lis = document.querySelectorAll('li')
lis.forEach(li => {
    li.addEventListener('click', (e) => {
        li.classList.add('top-menu-item-active')
        lis.forEach(l => {
            if (l !== li) {
                l.classList.remove('top-menu-item-active')
            }
        })
    })
})