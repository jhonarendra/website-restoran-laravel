import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

const routes = [
  { path: "/", name: "index", component: () => import("../pages/index.vue") },
  { path: "/login", name: "login", component: () => import("../pages/login.vue") },
  { path: "/register", name: "register", component: () => import("../pages/register.vue") },

  
  { path: "/user", name: "user", component: () => import("../pages/user/index.vue") },
  { path: "/user/reservasi", name: "user-reservasi", component: () => import("../pages/user/reservasi/index.vue") },
  { path: "/user/reservasi/buat", name: "user-reservasi-buat", component: () => import("../pages/user/reservasi/buat.vue") },
  { path: "/user/reservasi/:id", name: "user-reservasi-id", component: () => import("../pages/user/reservasi/_id.vue") },
  { path: "/example", name: "Example", component: () => import("../pages/example.vue") },

  
  { path: "/error/:code/:message/:redirect", name: "error-code-message-redirect", component: () => import("../pages/error.vue") },
  { path: "/*", name: "error", component: () => import("../pages/error.vue") },
  
];

const router = new VueRouter({
  mode: "history",
  // base: process.env.BASE_URL,
  base: "/",
  routes
});

export default router;
