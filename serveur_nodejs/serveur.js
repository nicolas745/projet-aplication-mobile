const app = require('express')();
const http = require('http').createServer(app);
const mysql = require('mysql');
const connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'nuntius_game'
});
const io = require('socket.io')(http, {
    cors: {
        origin: "*",
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
    socket.on("message", (data) => {
        if (socket.userId) {
            console.log(`L'utilisateur avec l'id ${socket.userId} a envoyé le message suivant : ${data.message}`);
            connection.query(`SELECT * FROM listamie WHERE (id_ami1 = ? AND id_ami2 = ?) OR (id_ami1 = ? AND id_ami2 = ?)`, [socket.userId, data.id_ami, data.id_ami, socket.userId], function (error, results, fields) {
                if (error) throw error;
                if (results.length > 0) {
                    const id_receveur = data.id_ami;
                    io.to(`user_${id_receveur}`).emit("message", {
                        message: data.message,
                        id_emetteur: socket.userId
                    });
                    const jour = new Date().toISOString().slice(0, 19).replace('T', ' ');
                    const id_emetteur = socket.userId;
                    const message = data.message;
                    connection.query(`INSERT INTO messages (text, jour, id_envoyeur, id_receveur) VALUES (?, ?, ?, ?)`, [message, jour, id_emetteur, id_receveur], function (error, results, fields) {
                        if (error) throw error;
                        console.log(`Le message a été enregistré dans la base de données.`);
                    });
                }
            });
        } else {
            console.log("L'utilisateur n'est pas authentifié.");
        }
    });
    socket.on("user", (userkey) => {
        connection.query(`SELECT id_user FROM keypriver WHERE userkey = ?`, [userkey], function (error, results, fields) {
            if (error) throw error;

            if (results.length > 0) {
                const iduser = results[0].id_user;
                console.log(`L'utilisateur avec l'id ${iduser} s'est connecté.`);
                socket.userId = iduser;
                socket.join(`user_${iduser}`);
            } else {
                console.log("La clé utilisateur est invalide.");
            }
        });
    });

});

http.listen(3000, () => {
    console.log('listening on *:3000');
});