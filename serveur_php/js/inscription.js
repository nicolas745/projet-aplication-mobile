for (let i = 0; i < document.getElementsByTagName("section").length; i++) {
    if (i !== 0) {
        document.getElementsByTagName("section")[i].style.display = "none"
    }
    for (let i2 = 0; i2 < document.getElementsByClassName('page' + i).length; i2++) {
        document.getElementsByClassName("page" + i)[i2].addEventListener("onclick", (event) => {
            for (let i3 = 0; i3 < document.getElementsByTagName("section").length; i3++) {
                if (i3 === i) {
                    document.getElementsByTagName("section")[i3].removeAttribute('style');
                } else {
                    document.getElementsByTagName("section")[i3].style.display = "none";
                }
            }
        });
    }
}