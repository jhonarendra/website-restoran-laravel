import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

const routes = [
	{ path: "/", name: "index", component: () => import("../pages/index.vue") },
	{ path: "/login", name: "login", component: () => import("../pages/login.vue") },
	{ path: "/register", name: "register", component: () => import("../pages/register.vue") },

	
	{ path: "/user", name: "user", component: () => import("../pages/user/index.vue") },
	{ path: "/user/reservasi", name: "user-reservasi", component: () => import("../pages/user/reservasi/index.vue") },
	{ path: "/example", name: "Example", component: () => import("../pages/example.vue") },
];

const router = new VueRouter({
	mode: "history",
	// base: process.env.BASE_URL,
	base: "/",
	routes
});

export default router;
