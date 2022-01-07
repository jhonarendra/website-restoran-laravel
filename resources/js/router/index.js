import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

const routes = [
	{ path: "/", name: "Home", component: () => import("../pages/Home.vue") },
];

const router = new VueRouter({
	mode: "history",
	// base: process.env.BASE_URL,
	base: "/app",
	routes
});

export default router;
