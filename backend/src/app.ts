import authModule from "./modules/auth";
import express from 'express';
const app = express();
const port = process.env.PORT || 3000;

app.use(express.json());

app.use("/api/auth", authModule.routes);

export default app;