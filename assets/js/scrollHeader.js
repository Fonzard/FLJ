let prevScrollpos = window.pageYOffset;

window.onscroll = function() {
    let currentScrollPos = window.pageYOffset;

    if (prevScrollpos > currentScrollPos) {
        document.getElementById("main-header").classList.remove("scroll");
    } else {
        document.getElementById("main-header").classList.add("scroll");
    }

    prevScrollpos = currentScrollPos;
};