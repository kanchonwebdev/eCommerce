function open_tab(tab_title, active_tab) {
    var tab = document.getElementsByClassName('product-filter-block');
    var title = document.getElementsByClassName('p_title');

    for (let i = 0; i < tab.length; i++) {
        tab[i].classList.remove('active');
        title[i].classList.remove('active');
    }

    document.getElementById(active_tab).classList.add('active');
    tab_title.classList.add('active');
}