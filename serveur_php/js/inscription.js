for (let i = 0; i < document.getElementsByClassName("inscription").length; i++) {
    if (i !== 0) {
        document.getElementsByClassName("inscription")[i].style.display = "none"
    }
    for (let i2 = 0; i2 < document.getElementsByClassName('page' + i).length; i2++) {
        document.getElementsByClassName("page" + i)[i2].addEventListener("click", () => {
            for (let i3 = 0; i3 < document.getElementsByClassName("inscription").length; i3++) {
                if (i3 === i) {
                    document.getElementsByClassName("inscription")[i3].removeAttribute('style');
                } else {
                    document.getElementsByClassName("inscription")[i3].style.display = "none";
                }
            }
        });
    }
}