const router = require('express').Router();
const authFirebase = require('../middleware/authFirebase');
const {
  syncPerfil,
  obtenerMiPerfil,
  actualizarMiPerfil,
} = require('../controladores/usuarioControlador');

// Todas requieren Firebase ID Token
router.post('/sync', authFirebase, syncPerfil);
router.get('/me', authFirebase, obtenerMiPerfil);
router.patch('/me', authFirebase, actualizarMiPerfil);

module.exports = router;
