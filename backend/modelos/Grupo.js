const { Schema, model, Types } = require('mongoose');

const GrupoSchema = new Schema(
  {
    nombre: { type: String, required: true, index: true },
    descripcion: { type: String, default: '' },
    creadorUid: { type: String, required: true }, // UID creador (Firebase)
    miembrosUids: [{ type: String, index: true }], // UIDs de Firebase
  },
  { timestamps: true }
);

module.exports = model('Grupo', GrupoSchema);
