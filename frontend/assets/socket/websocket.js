import { io } from "socket.io-client";
import { eventRouter } from "./eventRouter.js";

const socket = io("http://localhost:4000");

socket.on("competitionCreated", async (payload) => {
  if (eventRouter["competition_created"]) {
    await eventRouter["competition_created"](payload);
  }
});

/*
socket.on("tableUpdated", async (payload) => {
  if (eventRouter["table_updated"]) {
    await eventRouter["table_updated"](payload);
  }
});
*/

export default socket;