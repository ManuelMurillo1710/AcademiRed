// Verifica el ID Token de Firebase en Authorization: Bearer <token>
const admin = require('firebase-admin');

module.exports = async function authFirebase(req, res, next) {
  try {
    const header = req.headers.authorization || '';
    const token = header.startsWith('Bearer ') ? header.slice(7) : null;
    if (!token) return res.status(401).json({ error: 'Falta token' });

    const decoded = await admin.auth().verifyIdToken(token);
    // adjuntamos info útil al request
    req.firebaseUser = {
      uid: decoded.uid,
      email: decoded.email || null,
      name: decoded.name || null,
      picture: decoded.picture || null,
    };
    next();
  } catch (err) {
    console.error('authFirebase error:', err.message);
    res.status(401).json({ error: 'Token inválido' });
  }
};
