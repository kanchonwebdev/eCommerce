let calcScrollValue = () => {
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
    scrollProgress.style.background = `conic-gradient(gray ${scrollValue}%, #d7d7d7 ${scrollValue}%)`;
};

function custom_scroll_top(){
    document.documentElement.scrollTop = 0;
    document.getElementById("progress").style.transform = "translateY(100px)";
}

window.onscroll = calcScrollValue;
window.onload = custom_scroll_top();
