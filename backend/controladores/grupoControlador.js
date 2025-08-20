const Grupo = require('../modelos/Grupo');

async function listarGrupos(_req, res) {
  const grupos = await Grupo.find().sort({ createdAt: -1 });
  res.json(grupos);
}

async function crearGrupo(req, res) {
  const { nombre, descripcion } = req.body || {};
  if (!nombre) return res.status(400).json({ error: 'nombre es requerido' });

  const grupo = await Grupo.create({
    nombre,
    descripcion: descripcion || '',
    creadorUid: req.firebaseUser.uid,
    miembrosUids: [req.firebaseUser.uid],
  });

  res.status(201).json(grupo);
}

async function unirmeAGrupo(req, res) {
  const uid = req.firebaseUser.uid;
  const { id } = req.params;
  const grupo = await Grupo.findById(id);
  if (!grupo) return res.status(404).json({ error: 'Grupo no encontrado' });

  if (!grupo.miembrosUids.includes(uid)) {
    grupo.miembrosUids.push(uid);
    await grupo.save();
  }
  res.json(grupo);
}

async function salirDeGrupo(req, res) {
  const uid = req.firebaseUser.uid;
  const { id } = req.params;
  const grupo = await Grupo.findById(id);
  if (!grupo) return res.status(404).json({ error: 'Grupo no encontrado' });

  grupo.miembrosUids = grupo.miembrosUids.filter(u => u !== uid);
  await grupo.save();
  res.json(grupo);
}

module.exports = {
  listarGrupos,
  crearGrupo,
  unirmeAGrupo,
  salirDeGrupo,
};
