// apps/backend/server.js
const express = require('express');
const dotenv = require('dotenv');
dotenv.config();
const cors = require('cors');
const helmet = require('helmet');
const compression = require('compression');
const path = require('path');

const connectDB = require('./config/db');

const app = express();

// ====== Variables ======
const PORT = process.env.PORT || 3000;
const ORIGIN = process.env.CORS_ORIGIN || 'http://localhost:5173';
const MONGO = process.env.MONGO_URI || process.env.MONGODB_URI;

// ====== Checks iniciales ======
if (!process.env.GOOGLE_APPLICATION_CREDENTIALS) {
  console.warn('ADVERTENCIA: GOOGLE_APPLICATION_CREDENTIALS no está configurada. Las rutas protegidas fallarán.');
}
if (!MONGO) {
  console.warn('ADVERTENCIA: MONGO_URI/MONGODB_URI no configurada. No se conectará a MongoDB.');
} else {
  connectDB(MONGO);
}

// ====== Middlewares base ======
app.use(helmet({ crossOriginResourcePolicy: { policy: 'cross-origin' } }));
app.use(compression());

// CORS + preflight (sin patrones raros que rompan path-to-regexp)
app.use((req, res, next) => {
  res.header('Access-Control-Allow-Origin', ORIGIN);
  res.header('Access-Control-Allow-Methods', 'GET,POST,PUT,PATCH,DELETE,OPTIONS');
  res.header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
  if (req.method === 'OPTIONS') return res.sendStatus(204);
  next();
});
app.use(cors({ origin: ORIGIN }));

app.use(express.json({ limit: '2mb' }));
app.use('/uploads', express.static(path.join(__dirname, 'uploads')));

// ====== Rutas API ======
app.use('/api/usuarios', require('./rutas/usuarioRutas'));
app.use('/api/grupos', require('./rutas/grupoRutas'));

// ====== Health & raíz ======
app.get('/api/health', (_req, res) => res.json({ ok: true, time: new Date().toISOString() }));
app.get('/', (_req, res) => res.send('API AcademiRed OK'));

// ====== Arranque ======
app.listen(PORT, () => console.log(`Servidor en puerto ${PORT}`));
