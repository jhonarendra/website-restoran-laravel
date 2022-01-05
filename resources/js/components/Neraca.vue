<template>
	<div class="neraca container">
		<div class="row mx-1 my-2">
			<div class="col-4 text-center py-3 col-border col-border-right-none">
				<p class="text-muted mb-1">Pendapatan</p>
				<span v-if="!isLoading">
					Rp<b>{{ Number((neraca.debet).toFixed(2)).toLocaleString() }}</b>
					<span v-if="neraca.debet_rasio > 0" class="text-success">(+{{ neraca.debet_rasio }}%)</span>
					<span v-else class="text-danger">({{ neraca.debet_rasio }}%)</span>
				</span>
				<span v-else class="content-loader">Rp 99,999</span>
			</div>
			<div class="col-4 text-center py-3 col-border">
				<p class="text-muted mb-1">Neraca</p>
				<span v-if="!isLoading">
					Rp<b>{{ Number((neraca.neraca).toFixed(2)).toLocaleString() }}</b>
					<span v-if="neraca.neraca_rasio > 0" class="text-success">(+{{ neraca.neraca_rasio }}%)</span>
					<span v-else class="text-danger">({{ neraca.neraca_rasio }}%)</span>
				</span>
				<span v-else class="content-loader">Rp 99,999</span>
			</div>
			<div class="col-4 text-center py-3 col-border col-border-left-none">
				<p class="text-muted mb-1">Pengeluaran</p>
				<span v-if="!isLoading">
					Rp<b>{{ Number((neraca.kredit).toFixed(2)).toLocaleString() }}</b>
					<span v-if="neraca.kredit_rasio > 0" class="text-danger">(+{{ neraca.kredit_rasio }}%)</span>
					<span v-else class="text-success">({{ neraca.kredit_rasio }}%)</span>
				</span>
				<span v-else class="content-loader">Rp 99,999</span>
			</div>
		</div>
	</div>
	
</template>

<style scoped="">
	.neraca {
		font-size: .8rem;
	}
</style>

<script>
export default {
	data(){
		return {

		}
	},
	props: {
		neraca: {
			type: Object,
			default: () => {}
		},
		isLoading: {
			type: Boolean,
			default: () => {}
		}
	},
	watch: {
		neraca(newVal, oldVal){
			
		}
	}
}
</script>