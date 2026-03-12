const http = require('http');
const { Server } = require('socket.io');
const amqp = require('amqplib');
const express = require('express');
// const db = require('./db');

const app = express();
const server = http.createServer(app);

const io = new Server(server, {
    cors: {
        origin: "http://localhost:5173", 
        methods: ["GET", "POST"]
    }
});

const RABBIT_URL = "amqp://rabbitmq:5672";
const QUEUE_NAME = "competition_events";

let channel;

io.on('connection', socket => {
    console.log("Client connected:", socket.id);

    socket.on("disconnect", () => {
        console.log("Client disconnected:", socket.id);
    });
});

async function connectRabbit() {
    try {
        const conn = await amqp.connect(RABBIT_URL);

        conn.on("error", err => {
            console.error("RabbitMQ error:", err.message);
        });

        conn.on("close", () => {
            console.log("RabbitMQ connection closed. Reconnecting...");
            setTimeout(connectRabbit, 5000);
        });

        channel = await conn.createChannel();

        await channel.assertQueue(QUEUE_NAME, { durable: true });
        console.log(`Listening for messages on queue: ${QUEUE_NAME}`);

        channel.consume(QUEUE_NAME, msg => {
            if (!msg) return;

            const data = JSON.parse(msg.content.toString());

            console.log("Rabbit event:", data.event);

            switch (data.event) {
                case "competition_created":
                    io.emit("competitionCreated", data.payload);
                    break;
                default:
                    console.warn("Unknown event:", data.event);
            }

            channel.ack(msg);

        });
    } catch (err) {
        console.error("RabbitMQ connection failed:", err.message);
        setTimeout(startRabbit, 5000); // retry
    }
}

connectRabbit();

const PORT = process.env.PORT || 4000;

server.listen(PORT, () => {
    console.log(`Node server running on port ${PORT}`);
});