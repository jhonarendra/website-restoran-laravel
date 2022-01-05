<template>
	<div>
		<!-- TIDAK DIPAKAI -->
		<div id="filter-bar">
			<div class="row my-2">
				<div class="col-1">
					<button type="button" class="btn">&lt;</button>
				</div>
				<div class="col-10">
					<span class="badge badge-pill badge-secondary">Jan</span>
					<span class="badge badge-pill badge-secondary">Feb</span>
					<span class="badge badge-pill badge-secondary">Mar</span>
					<span class="badge badge-pill badge-secondary">Apr</span>
					<span class="badge badge-pill badge-primary">May</span>
				</div>
				<div class="col-1 text-right">
					<button type="button" class="btn">&gt;</button>
				</div>
			</div>
			<div class="row my-2">
				<div class="col-2">
					<button type="button" class="btn">Filter</button>
				</div>
				<div class="col-2 offset-8 text-right">
					<button type="button" class="btn">#</button>
				</div>
			</div>
		</div>

		<hr />

		<div id="filter-modal">
			<div>
				<p>Waktu</p>
				<span class="badge badge-pill badge-primary">Bulan</span>
				<span class="badge badge-pill badge-secondary">Tahun</span>
				<span class="badge badge-pill badge-secondary">Semua</span>
			</div>
			<div class="mt-3">
				<p>Dompet</p>
				<span class="badge badge-pill badge-secondary">Kas</span>
				<span class="badge badge-pill badge-secondary">Bank BNI</span>
				<span class="badge badge-pill badge-primary">Semua</span>
			</div>
			<div class="mt-3">
				<p>Kategori</p>
				<span class="badge badge-pill badge-secondary">Makan</span>
				<span class="badge badge-pill badge-secondary">Transport</span>
				<span class="badge badge-pill badge-primary">Semua</span>
			</div>
			<div class="mt-3">
				<button type="button" class="btn btn-primary btn-sm btn-block">Terapkan Filter</button>
			</div>
		</div>
		<hr />
	</div>
</template>

<style type="text/css">
	#filter-bar {
	}

</style>

<script>
export default {
	data(){
		return {

		}
	}
}
</script>