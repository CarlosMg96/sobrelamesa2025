import authRoutes from './routes/auth.routes';
import express from 'express';
const app = express();
const port = process.env.PORT || 3000;

app.use(express.json());

app.use("/auth", authRoutes);

app.get('/', (req, res) => {
  res.send('Hello World soy yo de nuevo!');
});

app.listen(port, () => {
  return console.log(`Express is listening at http://localhost:${port}`);
});