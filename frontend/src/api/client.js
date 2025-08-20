import axios from "axios";
import { auth } from "../firebase/app";

const client = axios.create({
  baseURL: import.meta.env.VITE_API_URL || "http://localhost:3000",
});

// Adjunta el ID token de Firebase si el usuario está logueado
client.interceptors.request.use(async (config) => {
  const user = auth.currentUser;
  if (user) {
    const token = await user.getIdToken();
    config.headers.Authorization = `Bearer ${token}`;
  }
  return config;
});

export default client;
