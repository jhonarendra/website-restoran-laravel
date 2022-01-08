<template>
  <router-link :to="`/user/reservasi/${data.id_reservasi}`" class="card-link">
    <div class="card">
      <div class="card-header d-flex p-2">
        <span class="small">Nomor: <b>{{ data.no_reservasi }}</b></span>
        <span
          class="badge"
          :class="getBadgeStatus(data.status).class"
          style="margin-left: auto"
        >
          {{ getBadgeStatus(data.status).text }}
        </span>
      </div>
      <div class="card-body p-2">
        <div>
          <div class="row">
            <div class="col-md-6">Pelanggan</div>
            <div class="col-md-6">
              <img src="/images/hidangan/spageti.jpg" class="circle" width="30" height="30">
              {{ data.nama_pelanggan}}
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-6">Pegawai</div>
            <div class="col-md-6">
              <img src="/images/hidangan/spageti.jpg" class="circle" width="30" height="30">
              {{ data.nama_pegawai}}
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-6">Restoran</div>
            <div class="col-md-6">
              <img src="/images/hidangan/spageti.jpg" class="circle" width="30" height="30">
              {{ data.nama_restoran}}
            </div>
          </div>
        </div>
        
      </div>
      <div class="card-footer p-2" style="position: relative">
        <p class="small mb-0">Tanggal reservasi: {{ data.created_at }}</p>
        <input
          v-model="checked"
          :value="data.id_reservasi"
          name="cbReservasi"
          type="checkbox"
          style="position: absolute; right: 20px; bottom: 10px;"
          @click="$emit('checkItem', data.id_reservasi)"
        >
      </div>
    </div>
  </router-link>
</template>

<script>
export default {
  props: {
    data: {
      type: Object,
      default: () => null
    },
    tableDataChecked: {
      type: Array,
      default: () => []
    }
  },
  data () {
    return {
      checked: []
    }
  },
  mounted () {
    if (this.tableDataChecked.includes(this.data.id_reservasi)) {
      this.checked.push(this.data.id_reservasi)
    } else {
      this.checked = []
    }
  },
  methods: {
    getBadgeStatus (status) {
      // 0=belum dikonfirmasi, 1=dikonfirmasi, 2=sedang berlangsung, 3=batal, 4=selesai
      switch (status) {
        case 0:
          return {
            class: 'badge-secondary',
            text: 'Menunggu konfirmasi'
          }
        case 1:
          return {
            class: 'badge-primary',
            text: 'Dikonfirmasi'
          }
        case 2:
          return {
            class: 'badge-warning',
            text: 'Sedang Berlangsung'
          }
        case 3:
          return {
            class: 'badge-danger',
            text: 'Batal'
          }
        case 4:
          return {
            class: 'badge-success',
            text: 'Selesai'
          }
        default:
          return {
            class: 'badge-warning',
            text: 'Belum Dikonfirmasi'
          }
      }
    }
  }
}
</script>