import { Request, Response } from "express";
import bcrypt from "bcryptjs";
import { signToken } from "../../../config/jwt";
import { User } from "../interfaces/user";


// Ejemplo temporal (debería venir de DB)
const fakeUser: User = {
  id: 1,
  email: "test@test.com",
  password: bcrypt.hashSync("123456", 10),
};

export const login = async (req: Request, res: Response) => {
  const { email, password } = req.body;

  if (email !== fakeUser.email) {
    return res.status(400).json({ message: "Usuario no encontrado" });
  }

  const isMatch = await bcrypt.compare(password, fakeUser.password);

  if (!isMatch) {
    return res.status(400).json({ message: "Contraseña incorrecta" });
  }

  const token = signToken({ id: fakeUser.id, email: fakeUser.email });

  return res.json({
    message: "Login exitoso",
    token,
  });
};
