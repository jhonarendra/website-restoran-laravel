import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

const routes = [
	{ path: "/", name: "Home", component: () => import("../pages/index.vue") },
	{ path: "/example", name: "Example", component: () => import("../pages/example.vue") },
];

const router = new VueRouter({
	mode: "history",
	// base: process.env.BASE_URL,
	base: "/app",
	routes
});

export default router;
