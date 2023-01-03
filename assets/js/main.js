/* ----------------
PRODUCT FILTER MENU
-----------------*/
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


/* ---------------
NAV OVERLAY MOTION
----------------*/
var t1 = gsap.timeline({ paused: true });

t1.to("#nav-overlay", 0.5, {
    "left": "0%"
});

t1.from("#nav-overlay .nav-menu .menu-link .nav-link", 0.5, {
    y: "100%",
    stagger: 0.05,
});

t1.to("#nav-overlay .line", 0.5, {
    "transform": "scaleY(1)",
    "transform-origin": "bottom",
});

t1.from("#nav-overlay .nav-address .address-block .nav-menu", 0.5, {
    y: "100%",
    stagger: 0.05,
});

t1.reverse();


/*------------ 
HAMBURGER MENU
----------- */
document.getElementById("ham-icon").addEventListener("click", function () {
    t1.reversed(!t1.reversed());
    this.classList.toggle('active');
});


/* -------------------
NAVBAR POSITION TOGGLE
------------------- */
var navbar = document.getElementById("nav-container");
var topHeight = document.getElementById('topbar').offsetHeight;

window.onscroll = function () {
    /* ---------------
    BACK TO TOP SCRIPT
    --------------- */
    let scrollProgress = document.getElementById("progress");
    let pos = document.documentElement.scrollTop;
    let calcHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    let scrollValue = Math.round((pos * 100) / calcHeight);
    if (pos > 100) {
        scrollProgress.style.transform = "translateY(0px)";
    } else {
        scrollProgress.style.transform = "translateY(100px)";
    }
    scrollProgress.addEventListener("click", () => {
        document.documentElement.scrollTop = 0;
    });
    scrollProgress.style.background = `conic-gradient(#222 ${scrollValue}%, #d7d7d7 ${scrollValue}%)`;



    /* -----------
    FIX NAV SCRIPT
    ----------- */
    if (window.pageYOffset >= 100) {
        navbar.classList.add("active-position");
        navbar.style.top = "-" + topHeight + "px";
    } else {
        navbar.classList.remove("active-position");
        navbar.style.top = "0px";
    }
};


/* ---------------
BACK TO TOP SCRIPT
--------------- */
function custom_scroll_top() {
    document.documentElement.scrollTop = 0;
    document.getElementById("progress").style.transform = "translateY(100px)";
}
window.onload = custom_scroll_top();



