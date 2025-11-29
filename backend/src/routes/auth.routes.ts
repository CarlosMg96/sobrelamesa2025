import { Router } from "express";
import { login } from "../modules/auth/controllers/auth.controller";
import { authMiddleware } from "../middlewares/auth";

const router = Router();

router.post("/login", login);
router.get("/profile", authMiddleware, (req, res) => {
  return res.json({
    message: "Ruta protegida",
    user: (req as any).user,
  });
});

export default router;
