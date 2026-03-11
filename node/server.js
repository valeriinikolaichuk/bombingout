const express = require('express');
const http = require('http');
const { Server } = require('socket.io');
//const db = require('./db');
const amqp = require('amqplib');

const app = express();
const server = http.createServer(app);

const io = new Server(server, {
    cors: {
        origin: "http://localhost:5173", 
        methods: ["GET", "POST"]
    }
});

const RABBIT_URL = "amqp://rabbitmq:5672";
const QUEUE_NAME = "competition_created";

const clients = new Map();

io.on('connection', socket => {
    console.log("Client connected:", socket.id);

    socket.on("disconnect", () => {
        console.log("Client disconnected:", socket.id);
        clients.delete(socket.id);
    });
});

async function startRabbit() {
    try {
        const conn = await amqp.connect(RABBIT_URL);
        const channel = await conn.createChannel();

        await channel.assertQueue(QUEUE_NAME, { durable: true });
        console.log(`Listening for messages on queue: ${QUEUE_NAME}`);

        channel.consume(QUEUE_NAME, msg => {
            if (msg !== null) {
                const data = JSON.parse(msg.content.toString());
                console.log("Received from RabbitMQ:", data);

                // send to all WebSocket clients
                io.emit("competitionCreated", data);

                channel.ack(msg);
            }
        });
    } catch (err) {
        console.error("RabbitMQ connection error, retry in 5s:", err);
        setTimeout(startRabbit, 5000); // retry
    }
}

startRabbit();

const PORT = process.env.PORT || 4000;
server.listen(PORT, () => {
    console.log(`Node server running on port ${PORT}`);
});