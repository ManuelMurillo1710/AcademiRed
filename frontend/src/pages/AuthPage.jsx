import React, { useState } from "react";
import { registerAndSync, loginAndSync } from "../api/authService";
import "../styles/Auth.css";

export default function AuthPage() {
  const [tab, setTab] = useState("register"); // 'login' | 'register'
  const [nombre, setNombre] = useState("");
  const [email, setEmail] = useState("");
  const [pass, setPass] = useState("");
  const [loading, setLoading] = useState(false);
  const [msg, setMsg] = useState({ type: "", text: "" });

  const onSubmit = async (e) => {
    e.preventDefault();
    setMsg({ type: "", text: "" });
    setLoading(true);
    try {
      if (tab === "login") {
        await loginAndSync({ email, password: pass });
        setMsg({ type: "ok", text: "Sesión iniciada correctamente." });
      } else {
        await registerAndSync({ nombre, email, password: pass });
        setMsg({ type: "ok", text: "Cuenta creada y sincronizada." });
      }
    } catch (err) {
      const txt = err?.message || "Ocurrió un error.";
      setMsg({ type: "error", text: txt });
    } finally {
      setLoading(false);
    }
  };

  return (
    <div className="auth-wrap">
      <div className="auth-card">
        <h1 className="auth-title">{tab === "login" ? "Iniciar sesión" : "Registrarse"}</h1>

        <div className="auth-tabs">
          <button
            className={`auth-tab ${tab === "login" ? "active" : ""}`}
            onClick={() => setTab("login")}
            type="button"
          >
            Iniciar sesión
          </button>
          <button
            className={`auth-tab ${tab === "register" ? "active" : ""}`}
            onClick={() => setTab("register")}
            type="button"
          >
            Registrarse
          </button>
        </div>

        <form className="auth-form" onSubmit={onSubmit}>
          {tab === "register" && (
            <>
              <label className="auth-label" htmlFor="nombre">Nombre</label>
              <input
                id="nombre"
                className="auth-input"
                placeholder="Tu nombre"
                value={nombre}
                onChange={(e) => setNombre(e.target.value)}
                autoComplete="name"
              />
            </>
          )}

          <label className="auth-label" htmlFor="email">Correo</label>
          <input
            id="email"
            type="email"
            className="auth-input"
            placeholder="tucorreo@dominio.com"
            value={email}
            onChange={(e) => setEmail(e.target.value)}
            autoComplete="email"
            required
          />

          <label className="auth-label" htmlFor="pass">Contraseña</label>
          <input
            id="pass"
            type="password"
            className="auth-input"
            placeholder="••••••••"
            value={pass}
            onChange={(e) => setPass(e.target.value)}
            autoComplete={tab === "login" ? "current-password" : "new-password"}
            required
          />

          {msg.text && (
            <div className={`auth-msg ${msg.type === "error" ? "error" : "ok"}`}>
              {msg.text}
            </div>
          )}

          <button className="auth-btn" disabled={loading}>
            {loading ? "Procesando…" : tab === "login" ? "Entrar" : "Crear cuenta"}
          </button>

          {/* Si necesitas un botón secundario (opcional), déjalo así: */}
          {/* <button type="button" className="auth-btn secondary">Cerrar sesión</button> */}
        </form>

        <div className="auth-foot">
          AcademiRed • {new Date().getFullYear()}
        </div>
      </div>
    </div>
  );
}
