import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

const routes = [
  { path: "/", name: "index", component: () => import("../pages/index.vue") },
  { path: "/login", name: "login", component: () => import("../pages/login.vue") },
  { path: "/register", name: "register", component: () => import("../pages/register.vue") },

  
  { path: "/user", name: "user", component: () => import("../pages/user/index.vue") },
  { path: "/user/restoran", name: "user-restoran", component: () => import("../pages/user/restoran/index.vue") },
  { path: "/user/hidangan", name: "user-hidangan", component: () => import("../pages/user/hidangan/index.vue") },
  { path: "/user/pegawai", name: "user-pegawai", component: () => import("../pages/user/pegawai/index.vue") },
  { path: "/user/pelanggan", name: "user-pelanggan", component: () => import("../pages/user/pelanggan/index.vue") },
  { path: "/user/pesanan", name: "user-pesanan", component: () => import("../pages/user/pesanan/index.vue") },

  { path: "/user/reservasi", name: "user-reservasi", component: () => import("../pages/user/reservasi/index.vue") },
  { path: "/user/reservasi/buat", name: "user-reservasi-buat", component: () => import("../pages/user/reservasi/buat.vue") },
  { path: "/user/reservasi/:id", name: "user-reservasi-id", component: () => import("../pages/user/reservasi/_id.vue") },
  { path: "/user/pengaturan", name: "user-pengaturan", component: () => import("../pages/user/pengaturan/index.vue") },
  
  { path: "/user/profile", name: "user-profile", component: () => import("../pages/user/profile/index.vue") },

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
