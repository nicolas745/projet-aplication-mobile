const app = require('express')();
const http = require('http').createServer(app);
const key = "f7d6a14b9bbe67750ddae579a8ee0136071159e2f80da6e09ead3ecc3795405e";
const io = require('socket.io')(http, {
    cors: {
        origin: "*", // Autorise toutes les origines
        methods: ["GET", "POST"],
        allowedHeaders: ["my-custom-header"],
        credentials: true
    }
});

app.get('/status', (req, res) => {
    res.send({ message: 'Server is running' });
});
app.get('/', (req, res) => {
    res.sendFile(__dirname + '/index.html');
});
io.on('connection', (socket) => {
    console.log("user est connectr")
    socket.on("message", (data) => {
    });
    socket.on("user", (key) => {
        console.log(key);
    })
});

http.listen(3000, () => {
    console.log('listening on *:3000');
});