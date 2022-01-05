<template>
	<div>
		<vue-horizontal-list
			:items="dompet"
			:options="dompetOption"
		>
			<template v-slot:default="{ item }">
				<ItemDompet
					:dompet="item"
					:isLoading="isLoading"
					:actionButton="actionButton"
					:itemClass="itemClass"
					@fetchDataDompet="$emit('fetchDataDompet')"
				/>
			</template>
		</vue-horizontal-list>

		<!-- ini belum bisa dimasukin di vue horizontal list -->
		<!-- <div
			v-if="showAddDompet && !isLoading"
			class="card-add-dompet"
			:class="itemClass"
			data-toggle="modal"
			data-target="#formDompet"
			@click="$store.dispatch('setDompetTambah')"
		>
			<div class="card ml-2">
				<div class="card-header border-0">
				</div>
				<div class="card-body text-center">
					<svg class="svg-plus mt-3" viewBox="0 0 24 24"><path d=""></path></svg>
					<p>Tambah Dompet</p>
				</div>
				<div class="card-footer p-0">
				</div>
			</div>
		</div> -->
	</div>
</template>

<style scoped="">
	.card-add-dompet {
		display: inline-block;
		cursor: pointer;
		font-size: .8rem;
	}
	.card-add-dompet.fixedWidth {
		width: 300px;
	}
	.card-add-dompet.relativeWidth {
		width: 24%;
	}
	.card-add-dompet .card {
		height: 190px;
	}

	@media (max-width: 992px){
		.card-add-dompet.relativeWidth {
			width: 50%;
		}
	}
	@media (max-width: 576px){
		.card-add-dompet.relativeWidth {
			width: 100%;
		}
	}
</style>

<script>
import VueHorizontalList from 'vue-horizontal-list'
import ItemDompet from './../components/ItemDompet.vue'

export default {
	data(){
		return {
			dompetOption: {
				responsive: [
					{ end: 576, size: 1 },
					{ start: 576, end: 768, size: 2 },
					{ start: 768, end: 1100, size: 3 },
					{ size: 4 },
				],
				position: {
					start: 1
				}
			}
		}
	},
	components: {
		ItemDompet, VueHorizontalList
	},
	props: {
		dompet: {
			type: Array,
			default: () => {}
		},
		isLoading: {
			type: Boolean,
			default: () => {}
		},
		showAddDompet: {
			type: Boolean,
			default: () => {}
		},
		actionButton: {
			type: String,
			default: () => {}
		},
		itemClass: {
			type: String,
			default: () => {}
		}
	},
	methods: {

	}
}
</script>