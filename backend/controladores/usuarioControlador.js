const Usuario = require('../modelos/Usuario');

/**
 * Sincroniza/crea el perfil de usuario en Mongo basándose en el ID Token de Firebase.
 * Body opcional: { nombre, avatarUrl, bio }
 */
async function syncPerfil(req, res) {
  const { uid, email, name, picture } = req.firebaseUser;
  const { nombre, avatarUrl, bio } = req.body || {};

  const up = {
    uid,
    email: email || '',
    nombre: (nombre ?? name ?? '').trim(),
    avatarUrl: (avatarUrl ?? picture ?? '').trim(),
    bio: (bio ?? '').trim(),
  };

  const user = await Usuario.findOneAndUpdate({ uid }, up, {
    new: true,
    upsert: true,
    setDefaultsOnInsert: true,
  });

  res.json(user);
}

async function obtenerMiPerfil(req, res) {
  const uid = req.firebaseUser.uid;
  const user = await Usuario.findOne({ uid });
  if (!user) return res.status(404).json({ error: 'Perfil no encontrado' });
  res.json(user);
}

async function actualizarMiPerfil(req, res) {
  const uid = req.firebaseUser.uid;
  const { nombre, avatarUrl, bio } = req.body || {};
  const user = await Usuario.findOneAndUpdate(
    { uid },
    { nombre, avatarUrl, bio },
    { new: true }
  );
  res.json(user);
}

module.exports = {
  syncPerfil,
  obtenerMiPerfil,
  actualizarMiPerfil,
};
