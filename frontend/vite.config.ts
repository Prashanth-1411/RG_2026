import { defineConfig } from 'vite';
import react from '@vitejs/plugin-react';

const isVercel = process.env.VERCEL === '1';

export default defineConfig({
  base: isVercel ? '/' : '/R.G.-Ambulance-master/public/frontend/',
  plugins: [react()],
  build: {
    outDir: isVercel ? 'dist' : '../public/frontend',
    emptyOutDir: true,
  },
  server: {
    port: 5173,
    host: true,
    proxy: {
      '/api': {
        target: 'http://localhost:5000',
        changeOrigin: true,
        secure: false,
      },
      '/uploads': {
        target: 'http://localhost:5000',
        changeOrigin: true,
        secure: false,
      },
    },
  },
});
