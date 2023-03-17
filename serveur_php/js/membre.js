function message() {

}
if (typeof io !== 'undefined') {
    var socket = io('http://localhost:3000');
    socket.on("message", message);
} else {

}

document.getElementById("message");