function page(nb) {
    for (let i3 = 0; i3 < document.getElementsByClassName("inscription").length; i3++) {
        if (i3 == nb) {
            document.getElementsByClassName("inscription")[i3].removeAttribute('style');
        } else {
            document.getElementsByClassName("inscription")[i3].style.display = "none";
        }
    }
}
for (let i = 0; i < document.getElementsByClassName("inscription").length; i++) {
    document.getElementsByClassName("select")[i * (document.getElementsByClassName("inscription").length + 1)].style.backgroundColor = "#FCED8A";
    if (i !== 0) {
        document.getElementsByClassName("inscription")[i].style.display = "none"
    }
    for (let i2 = 0; i2 < document.getElementsByClassName('page' + i).length; i2++) {
        document.getElementsByClassName("page" + i)[i2].addEventListener("click", (event) => {
            page(i);
            event.preventDefault();
        });
    }
}
for (var i = 0; i < document.getElementsByClassName("suivent").length; i++) {
    document.getElementsByClassName("suivent")[i].addEventListener("click", (event) => {
        event.preventDefault();
        if (event.target.value == 1) {
            if (document.getElementById("pseudo").value === '') return;
            if (document.getElementById("password").value === '') return;
            if (document.getElementById("email").value === '') return;
            res = true;
            for (let i2 = 0; i2 < document.getElementsByName("sexe").length; i2++) {
                if (document.getElementsByName("sexe")[i2].checked) {
                    res = false
                }
            }
            if (res) return;
        }
        page(event.target.value);
    })
}

document.getElementById("valider").addEventListener("click", () => {

});