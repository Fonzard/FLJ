let prevScrollpos = window.scrollY;

window.onscroll = function() {
    let currentScrollPos = window.scrollY;

    if (prevScrollpos < currentScrollPos && currentScrollPos > 0) {
        document.getElementById("main-header").classList.remove("scroll");
    } else {
        document.getElementById("main-header").classList.add("scroll");
    }

    if (currentScrollPos === 0) {
        document.getElementById("main-header").classList.remove("scroll");
    }
    prevScrollpos = currentScrollPos;
};