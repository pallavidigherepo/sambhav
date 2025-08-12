import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import path from "path";

// https://vite.dev/config/
export default defineConfig({
  plugins: [
    vue({
      template: {
        compilerOptions: {
          isCustomElement: (tag) => ['FormSwitch'].includes(tag)
        }
      }
    }),
  ],
  build: {
    commonjsOptions: {
      include: ["tailwind.config.js", "node_modules/**"],
    },
    target: "esnext" // or "es2019",
  },
  optimizeDeps: {
    include: ["tailwind-config"],
  },
  resolve: {
    alias: {
      "tailwind-config": path.resolve(__dirname, "./tailwind.config.js"),
      "@": path.resolve(__dirname, "./src"),
    },
  },
})
