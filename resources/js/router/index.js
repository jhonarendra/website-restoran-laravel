import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

const routes = [
	{ path: "/", name: "Home", component: () => import("../pages/index.vue") },
	{ path: "/login", name: "Login", component: () => import("../pages/login.vue") },
	{ path: "/example", name: "Example", component: () => import("../pages/example.vue") },
];

const router = new VueRouter({
	mode: "history",
	// base: process.env.BASE_URL,
	base: "/",
	routes
});

export default router;
