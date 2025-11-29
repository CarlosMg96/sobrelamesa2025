import jwt, { SignOptions } from "jsonwebtoken";

const JWT_SECRET = process.env.JWT_SECRET || "secret_key_change_this";
const EXPIRES_IN = process.env.EXPIRES_IN || "1h";

const options = { expiresIn: EXPIRES_IN } as unknown as SignOptions;

export const signToken = (payload: object) => {
  return jwt.sign(payload, JWT_SECRET, options);
};

export const verifyToken = (token: string) => {
  return jwt.verify(token, JWT_SECRET);
};
