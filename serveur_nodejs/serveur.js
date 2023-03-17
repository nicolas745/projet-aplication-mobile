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
const crypto = require('crypto-browserify');

class Chiffrement {
    constructor(key) {
        this.key = crypto.createHash('sha256').update(key).digest();
    }

    encrypt(data) {
        const iv = crypto.randomBytes(16);
        const cipher = crypto.createCipheriv('aes-256-cbc', this.key, iv);
        const encrypted = Buffer.concat([cipher.update(data, 'utf8'), cipher.final()]);
        const ciphertext = Buffer.concat([iv, encrypted]).toString('base64');
        return ciphertext;
    }

    decrypt(ciphertext) {
        const data = Buffer.from(ciphertext, 'base64');
        const iv = data.slice(0, 16);
        const encrypted = data.slice(16);
        const decipher = crypto.createDecipheriv('aes-256-cbc', this.key, iv);
        const decrypted = Buffer.concat([decipher.update(encrypted), decipher.final()]);
        return decrypted.toString('utf8');
    }
}

app.get('/status', (req, res) => {
    res.send({ message: 'Server is running' });
});
app.get('/', (req, res) => {
    res.sendFile(__dirname + '/index.html');
});
function fillKey(key) {
    const keyBuffer = Buffer.from(key);
    const result = Buffer.alloc(32);
    keyBuffer.copy(result);
    return result;
}

const filledKey = fillKey(key); // Clé de chiffrement remplie avec des octets nuls jusqu'à une longueur de 32 octets
io.on('connection', (socket) => {
    socket.on("message", (data) => {
        console.log(data);
        //res = chif.decrypt(data.key, fillKey(key));
        //console.log(res);
    })
});

http.listen(3000, () => {
    console.log('listening on *:3000');
});