// src/api/http.js
import axios from "axios";

const http = axios.create({
  baseURL: import.meta.env.VITE_API_BASE || "http://localhost:3000",
  headers: { "Content-Type": "application/json" },
});

export default http;
