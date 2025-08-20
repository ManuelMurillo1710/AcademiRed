const { Schema, model } = require('mongoose');

const UsuarioSchema = new Schema(
  {
    uid: { type: String, required: true, unique: true, index: true }, // UID de Firebase
    nombre: { type: String, default: '' },
    email: { type: String, default: '', index: true },
    avatarUrl: { type: String, default: '' },
    bio: { type: String, default: '' },
  },
  { timestamps: true }
);

module.exports = model('Usuario', UsuarioSchema);
