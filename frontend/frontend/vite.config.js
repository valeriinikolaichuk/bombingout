import { defineConfig } from 'vite'
import react from '@vitejs/plugin-react'

// https://vite.dev/config/
export default defineConfig({
  plugins: [
    react({
      babel: {
        plugins: [['babel-plugin-react-compiler']],
      },
    }),
  ],

  root: './src',

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