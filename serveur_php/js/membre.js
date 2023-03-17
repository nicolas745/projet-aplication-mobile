function message() {

}
let action = function () {
    alert("erreur");
};
var params = new URLSearchParams(location.search);
if (typeof io !== 'undefined') {
    var socket = io('http://localhost:3000');
    socket.on("message", message);
    action = function () {
        if (document.getElementById("text").value !== "") {
            text = document.createElement("p");
            text.append(document.getElementById("text").value);

            document.getElementById("convers").append(text);
            socket.emit("message", {
                "key": key,
                "id_ami": parseInt(params.get('id')),
                "id_my": my,
                "message": document.getElementById("text").value
            });
        }
    }
} else {

}

document.getElementById("message").addEventListener("click", (e) => {
    e.preventDefault();
    action();
})