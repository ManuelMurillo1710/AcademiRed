// src/api/authService.js
import {
  createUserWithEmailAndPassword,
  signInWithEmailAndPassword,
  updateProfile,
  signOut,
} from "firebase/auth";
import { auth } from "./firebase";
import { api } from "./axios";

/**
 * Registra en Firebase y sincroniza con backend:
 *  - Crea usuario Firebase
 *  - Actualiza displayName
 *  - Obtiene ID token
 *  - POST /api/usuarios/sync con Authorization: Bearer <token>
 */
export async function registerAndSync({ nombre, email, password }) {
  // 1) Firebase sign-up
  const cred = await createUserWithEmailAndPassword(auth, email, password);

  // 2) Optional: set displayName
  if (nombre && auth.currentUser) {
    await updateProfile(auth.currentUser, { displayName: nombre });
  }

  // 3) ID token
  const idToken = await cred.user.getIdToken(/* forceRefresh? */ true);

  // 4) Backend sync
  const { data } = await api.post(
    "/api/usuarios/sync",
    {
      email,
      nombre: nombre || cred.user.displayName || "",
      firebaseUid: cred.user.uid,
    },
    { headers: { Authorization: `Bearer ${idToken}` } }
  );

  return data; // {usuario, token? ...}
}

/**
 * Inicia sesión en Firebase y sincroniza con backend.
 */
export async function loginAndSync({ email, password }) {
  const cred = await signInWithEmailAndPassword(auth, email, password);
  const idToken = await cred.user.getIdToken(true);

  const { data } = await api.post(
    "/api/usuarios/sync",
    {
      email,
      nombre: cred.user.displayName || "",
      firebaseUid: cred.user.uid,
    },
    { headers: { Authorization: `Bearer ${idToken}` } }
  );

  return data;
}

/** Cerrar sesión Firebase */
export async function logout() {
  await signOut(auth);
}
