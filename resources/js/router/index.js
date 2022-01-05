import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

const routes = [
	{path: "/", name: "Home", component: () => import("../views/Home.vue")},
	{path: "/index.html", name: "HomeIndex", component: () => import("../views/Home.vue")},
	{path: "/transaksi", name: "Transaksi", component: () => import("../views/Transaksi.vue")},
	{path: "/anggaran", name: "Anggaran", component: () => import("../views/Anggaran.vue")},
	{path: "/profil", name: "Profil", component: () => import("../views/Profil.vue")},
	{path: "/master_profil", name: "MasterProfil", component: () => import("../views/MasterProfil.vue")},
	{path: "/master_dompet", name: "MasterDompet", component: () => import("../views/MasterDompet.vue")},
	{path: "/master_kategori", name: "MasterKategori", component: () => import("../views/MasterKategori.vue")},
	{path: "/sinkron_data", name: "SinkronPage", component: () => import("../views/SinkronPage.vue")},
	{path: "*", name: "404", component: () => import("../views/404.vue")},
	{path: "/500", name: "500", component: () => import("../views/500.vue")}
];

const router = new VueRouter({
	mode: "history",
	// base: process.env.BASE_URL,
	base: "/app",
	routes
});

export default router;
