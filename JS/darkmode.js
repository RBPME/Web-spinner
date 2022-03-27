var loaded = function () {
    if (window.matchMedia && window.matchMedia("(prefers-color-scheme: dark)").matches) {
        document.body.classList.toggle("dark");
        document.body.classList.toggle("light");
    }
};
var expand = function () {
    document.getElementById("sidebar").classList.toggle("ex");
    document.getElementById("content").classList.toggle("ex");
    document.getElementById("postdiv").classList.toggle("ex");
};
