const express = require('express');
const http = require('http');
const { Server } = require('socket.io');
const mysql = require('mysql2');

const app = express();
const server = http.createServer(app);
const io = new Server(server, {
    cors: {
        origin: "http://localhost", 
        methods: ["GET", "POST"]
    }
});

const db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'powerlifting'
});

const clients = new Map();

io.on('connection', socket => {
    const id_status = socket.handshake.query.id_status;
    clients.set(socket.id, id_status);
    console.log('Client connected:', id_status);

    let lastUpdate = null;
    const checkInterval = setInterval(() => {
        db.query(
            'SELECT MAX(realtime) AS last_update FROM computer_status WHERE id_status = ?',
            [id_status],
            (err, results) => {
                if (err) return console.error(err);
                const newUpdate = results[0].last_update;
                if (lastUpdate && newUpdate && newUpdate.toString() !== lastUpdate.toString()) {
                    console.log(`Table updated for id_status ${id_status}`);
                    socket.emit('tableUpdated');
                }
                lastUpdate = newUpdate;
            }
        );
    }, 1500);

    socket.on('disconnect', () => {
        clearInterval(checkInterval);
        clients.delete(socket.id);
        console.log('Client disconnected:', id_status);
    });
});

server.listen(3000, () => console.log('Server running on http://localhost:3000'));