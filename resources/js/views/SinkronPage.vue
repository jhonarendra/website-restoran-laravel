<template>
	<div id="sinkron_page">
		<NavBar
			brandType="svg"
			pageTitle="Sinkron Data"
			brandAction="router-link"
			brandLink="profil"
		 />
		<div class="container sinkron-content">
			<div class="row pb-3 m-0">
				<div
					class="col text-center nav-item"
					:class="{'active':tab === 'riwayat'}"
					@click="setTab('riwayat')">
					Riwayat
				</div>
				<div
					class="col text-center nav-item"
					:class="{'active':tab === 'data'}"
					@click="setTab('data')">
					Data belum sinkron
				</div>
			</div>
			<div v-if="tab === 'riwayat'">
                <div class="list-group mt-3" v-if="isLoading">
                    <a class="
                        list-group-item
                        list-group-item-action p-2">
                        <div class="row" style="width:calc(100% + 10px)">
                            <div class="col-sm-4">
                                <b class="content-loader">Loading</b>
                            </div>
                            <div class="col-sm-4">
                                <small class="content-loader">Loading</small>
                            </div>
                            <div class="col-sm-4 text-right pr-0">
                                
                            </div>
                        </div>
                    </a>
                </div>
                <div v-if="riwayat.length === 0 && !isLoading" class="mt-3">
                    <p class="text-center"><b>Belum ada data sinkronisasi</b></p>
                </div>
                <div v-if="riwayat.length && !isLoading" class="mt-3">
                    <div class="list-group mt-3">
                        <a class="
                            list-group-item
                            list-group-item-action p-2"
                            v-for="r in riwayat"
                            :key="r.id_sinkron">
                            <div class="row" style="width:calc(100% + 10px)">
                                <div class="col-sm-4">
                                    <b>{{r.strTanggal}}</b>
                                </div>
                                <div class="col-sm-4">
                                    <small>{{r.strCountData}}</small>
                                </div>
                                <div class="col-sm-4 text-right pr-0">
                                    <svg class="svg-check-circle svg-fill-success" viewBox="0 0 24 24"><path d=""></path></svg>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
			</div>
			<div v-if="tab === 'data'">
                <div class="mt-3" v-if="!keuangan.length && !dompet.length && !kategori.length && !anggaran.length">
                    <p class="text-center">
                        <b>Semua data telah disinkron ke cloud</b>
                    </p>
                </div>
                <div v-if="keuangan.length" class="mt-3">
                    <p><b>Transaksi</b></p>
                    <div class="list-group mt-3" style="max-height: 300px;overflow: auto">
                        <a class="
                            list-group-item
                            list-group-item-action p-2"
                            v-for="k in keuangan"
                            :key="k.id_keuangan">
                            <div class="row" style="width:calc(100% + 10px)">
                                <div class="col-6">
                                    <b>{{k.kategori.nama}}</b><br />
                                    {{k.uraian}}<br />
                                    {{k.tanggan}}<br />
                                    <small><i>{{k.created_at}}</i></small>
                                </div>
                                <div class="col-2 text-center">
                                    {{(k.debet > 0) ? 'D' : 'K'}}
                                </div>
                                <div class="col-4 pr-0 text-right">
                                    {{(k.debet > 0) ? Number((k.debet).toFixed(2)).toLocaleString() : Number((k.kredit).toFixed(2)).toLocaleString()}}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div v-if="dompet.length" class="mt-3">
                    <p><b>Dompet</b></p>
                    <div class="list-group mt-3" style="max-height: 300px;overflow: auto">
                        <a class="
                            list-group-item
                            list-group-item-action p-2"
                            v-for="d in dompet"
                            :key="d.id_dompet">
                            {{d.nama}}<br />
                            <small><i>{{d.created_at}}</i></small>
                        </a>
                    </div>
                </div>
                <div v-if="kategori.length" class="mt-3">
                    <p><b>Kategori</b></p>
                    <div class="list-group mt-3" style="max-height: 300px;overflow: auto">
                        <a class="
                            list-group-item
                            list-group-item-action p-2"
                            v-for="k in kategori"
                            :key="k.id_kategori">
                            {{k.nama}}<br />
                            <small><i>{{k.created_at}}</i></small>
                        </a>
                    </div>
                </div>
                <div v-if="anggaran.length" class="mt-3">
                    <p><b>Anggaran</b></p>
                    <div class="list-group mt-3" style="max-height: 300px;overflow: auto">
                        <a class="
                            list-group-item
                            list-group-item-action p-2"
                            v-for="a in anggaran"
                            :key="a.id_anggaran">
                            <div class="row" style="width:calc(100% + 10px)">
                                <div class="col-4">
                                    <b>{{a.kategori.nama}}</b><br />
                                    {{(a.tahun != 0) ? (a.bulan != 0) ? 'Anggaran Bulan' : 'Anggaran Tahun' : 'Anggaran Semua'}}<br />
                                    <small><i>{{a.created_at}}</i></small>
                                </div>
                                <div class="col-4 text-center">
                                    {{(a.tahun != 0) ? (a.bulan != 0) ? a.bulan + ' ' + a.tahun : a.tahun : ''}}
                                </div>
                                <div class="col-4 pr-0 text-right">
                                    {{Number((a.nominal).toFixed(2)).toLocaleString()}}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="mt-3 text-center" v-if="keuangan.length || dompet.length || kategori.length || anggaran.length">
                    <button class="btn btn-sm btn-purple" @click="sinkron">Sinkron Data ke Cloud</button>
                </div>
			</div>
		</div>
	</div>
</template>
<style scoped="">
	#sinkron_page {
		width: 100%;
		animation: slideIn .5s;
	}
	.sinkron-content {
		font-size: .8em;
	}

	.nav-item {
		border-bottom: 2px solid transparent;
		padding: 10px;
		cursor: pointer;
		transition: all .3s;
	}
	.nav-item.active, .nav-item:hover {
		border-bottom: 2px solid #673AB7;
	}
</style>
<script>
import NavBar from './../components/NavBar.vue'

export default {
	data(){
		return {
			isLoading: true,
			tab: 'riwayat',
            keuangan: [],
            dompet: [],
            kategori: [],
            anggaran: [],
            riwayat: []
		}
	},
	components: {
		NavBar
	},
	methods: {
		setTab(val){
			this.tab = val
		},
        sinkron(){
            let data = {
                keuangan: this.keuangan,
                dompet: this.dompet,
                kategori: this.kategori,
                anggaran: this.anggaran
            }
            data = JSON.stringify(data)

            let form = new FormData()
            form.append('data', data)

            this.$store.dispatch('sinkronData', form).then(res => {
                if(res.data.status){
                    this.$store.dispatch('updateLocalData').then(e => {
                        if(e.status){
                            alert(e.msg)
                            window.location = '/app/sinkron_data'
                        } else {
                            console.log(e.msg)
                        }
                    })
                } else {
                    console.log(res.data.msg)
                }
            })
        },
        getRiwayat(){
            this.$store.dispatch('fetchDataSinkron').then(res => {
                if(res.data.status){
                    let riwayat = []
                    res.data.data.forEach(e => {
                        let jsonData = JSON.parse(e.data)
                        let strCountData = ''
                        strCountData += (jsonData.keuangan.length) ? jsonData.keuangan.length + ' transaksi, ' : ''
                        strCountData += (jsonData.dompet.length) ? jsonData.dompet.length + ' dompet, ' : ''
                        strCountData += (jsonData.kategori.length) ? jsonData.kategori.length + ' kategori, ' : ''
                        strCountData += (jsonData.anggaran.length) ? jsonData.anggaran.length + ' anggaran, ' : ''
                        
                        let dateTanggal = new Date(e.created_at)
                        let strTanggal = dateTanggal.toLocaleDateString('id-ID', {year: 'numeric', month: 'long', day: 'numeric'})
                        strTanggal += ' '
                        strTanggal += (dateTanggal.getHours() < 10) ? '0' + dateTanggal.getHours() : dateTanggal.getHours()
                        strTanggal += ':'
                        strTanggal += (dateTanggal.getMinutes() < 10) ? '0' + dateTanggal.getMinutes() : dateTanggal.getMinutes()
                        strTanggal += ':'
                        strTanggal += (dateTanggal.getSeconds() < 10) ? '0' + dateTanggal.getSeconds() : dateTanggal.getSeconds()
                        riwayat.push({
                            id_sinkron: e.id_sinkron,
                            id_user: e.id_user,
                            created_at: e.created_at,
                            strTanggal: strTanggal,
                            data: jsonData,
                            strCountData: strCountData
                        })
                    })
                    this.riwayat = riwayat

                    this.isLoading = false

                } else {
                    console.log(res.data.msg)
                }
            })
        },
        getBelumSinkron(){
            this.$store.dispatch('fetchDataBelumSinkron').then(res => {
                if(res.status){
                    // console.log(res.data)
                    this.keuangan = res.data.transaksi
                    this.dompet = res.data.dompet
                    this.kategori = res.data.kategori
                    this.anggaran = res.data.anggaran
                } else {
                    console.log(res.msg)
                }
            })
        }
	},
	created(){
        this.getRiwayat()
        this.getBelumSinkron()
	}
}
</script>