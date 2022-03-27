let loaded = () => {
    if (window.matchMedia && window.matchMedia("(prefers-color-scheme: dark)").matches) {
        document.body.classList.toggle("dark");
        document.body.classList.toggle("light");
    }
}

let expand = () => {
    document.getElementById("sidebar").classList.toggle("ex");
    document.getElementById("content").classList.toggle("ex");
    document.getElementById("postdiv").classList.toggle("ex");
}