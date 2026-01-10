import { defineConfig } from 'vite'
import react from '@vitejs/plugin-react'
import path from 'path';
import { fileURLToPath } from 'url';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

// https://vite.dev/config/
export default defineConfig({
  plugins: [
    react(),
  ],

  build: {
    outDir: '../backend/public/build',  // ← Symfony public/build
    emptyOutDir: true,
    manifest: true,
  },

  server: {
      host: true,   // Docker
      port: 5173,
      strictPort: true,
  },

  resolve: {
    alias: {
      '@': path.resolve(__dirname, 'src'),
    },
  },
})