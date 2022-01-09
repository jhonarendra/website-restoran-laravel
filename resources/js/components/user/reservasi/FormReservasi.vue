<template>
  <form action="" method="POST">
    <div>
      <h4 class="font-weight-300 py-3">Data Pelanggan</h4>
      <!--
        Jika aksi buat, identitas user ambil dari user login
        Jika aksi lihat dan edit, identtas ambil dari reservasi (relasi)
        -->
      <div>
        <table
          class="table table-sm table-striped"
          :class="(!user) ? 'd-none' : ''"
        >
          <tbody>
            <tr>
              <td>Nama</td>
              <td>
                {{ (aksi === 'buat') ? (user) ? user.nama_user : '' : (aksi === 'lihat' || 'edit') ? (reservasi) ? reservasi.pelanggan.nama_user : '' : '' }}
              </td>
            </tr>
            <tr>
              <td>Email</td>
              <td>{{ (aksi === 'buat') ? (user) ? user.email : '' : (aksi === 'lihat' || 'edit') ? (reservasi) ? reservasi.pelanggan.email : '' : '' }}</td>
            </tr>
            <tr>
              <td>Username</td>
              <td>{{ (aksi === 'buat') ? (user) ? user.username : '' : (aksi === 'lihat' || 'edit') ? (reservasi) ? reservasi.pelanggan.username : '' : '' }}</td>
            </tr>
            <tr>
              <td>Nomor HP</td>
              <td>{{ (aksi === 'buat') ? (user) ? user.no_hp : '' : (aksi === 'lihat' || 'edit') ? (reservasi) ? reservasi.pelanggan.no_hp : '' : '' }}</td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td>{{ (aksi === 'buat') ? (user) ? user.alamat : '' : (aksi === 'lihat' || 'edit') ? (reservasi) ? reservasi.pelanggan.alamat : '' : '' }}</td>
            </tr>
            <tr>
              <td>Foto</td>
              <td>
                <img src="/images/hidangan/spageti.jpg" class="circle mr-2" width="100" height="100">
              </td>
            </tr>
          </tbody>
        </table>
        <div v-if="!user && aksi === 'buat'" class="spinner-container">
          <div
            class="spinner"
            style="background-image: url('/images/spinner-primary.svg')"
          />
        </div>
      </div>
      <h4 class="font-weight-300 py-3">Data Reservasi</h4>
      <div>
        <table class="table table-sm table-striped">
          <tbody>
            <tr>
              <td>Restoran</td>
              <td v-if="aksi === 'buat' || aksi === 'edit'">
                <select class="form-control">
                  <option>Restoran 1</option>
                  <option>Restoran 2</option>
                </select>
              </td>
              <td v-if="aksi === 'lihat'">
                {{ reservasi.restoran.nama_restoran }}
              </td>
            </tr>
            <tr>
              <td>Alamat Restoran</td>
              <td>
                {{ (aksi === 'buat') ? '' : (aksi === 'lihat' || aksi === 'edit') ? (reservasi) ? reservasi.restoran.alamat_restoran : '' : '' }}
              </td>
            </tr>
            <tr>
              <td>Jumlah Tamu</td>
              <td v-if="aksi === 'buat' || aksi === 'edit'">
                <input type="text" class="form-control">
              </td>
              <td v-if="aksi === 'lihat'">
                {{ reservasi.jumlah_tamu }} orang
              </td>
            </tr>
            <tr v-if="aksi === 'lihat' || aksi === 'edit'">
              <td>Nomor Meja</td>
              <td v-if="aksi === 'edit'">
                <input type="text" class="form-control">
              </td>
              <td v-if="aksi === 'lihat'">
                {{ reservasi.jumlah_tamu }} orang
              </td>
            </tr>
            <tr v-if="aksi === 'lihat' || aksi === 'edit'">
              <td>Pegawai</td>
              <td v-if="aksi === 'edit'">
                <input type="text" class="form-control">
              </td>
              <td v-if="aksi === 'lihat'">
                {{ reservasi.pegawai.nama_user }}
              </td>
            </tr>
            <tr>
              <td>Tanggal Reservasi</td>
              <td v-if="aksi === 'buat' || aksi === 'edit'">
                <input type="date" class="form-control">
              </td>
              <td v-if="aksi === 'lihat'">
                {{ $helpers.dateFormat(reservasi.tanggal_reservasi) }}
              </td>
            </tr>
            <tr v-if="aksi === 'edit' || aksi === 'lihat'">
              <td>Status</td>
              <td v-if="aksi === 'edit'">
                edit
              </td>
              <td v-if="aksi === 'lihat'">
                <span
                  class="badge"
                  :class="getBadgeStatus(reservasi.status).class"
                >
                  {{ getBadgeStatus(reservasi.status).text }}
                </span>
              </td>
            </tr>
            <tr>
              <td>Keterangan {{ (aksi === 'buat') ? '' : 'Pelanggan' }}</td>
              <td v-if="aksi === 'buat' || aksi === 'edit'">
                <textarea class="form-control"></textarea>
              </td>
              <td v-if="aksi === 'lihat'">{{ reservasi.keterangan_pelanggan }}</td>
            </tr>
            <tr v-if="aksi === 'edit' || aksi === 'lihat'">
              <td>Keterangan Pegawai</td>
              <td v-if="aksi === 'edit'">
                <textarea class="form-control"></textarea>
              </td>
              <td v-if="aksi === 'lihat'">{{ reservasi.keterangan_pegawai }}</td>
            </tr>
            <tr v-if="aksi === 'edit' || aksi === 'lihat'">
              <td>Timestamp</td>
              <td class="small">Dibuat pada {{ $helpers.dateFormat(reservasi.created_at) }}, Terakhir diubah {{ $helpers.dateFormat(reservasi.updated_at) }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </form>
</template>

<script>
export default {
  props: {
    reservasi: {
      type: Object,
      default: () => null
    },
    aksi: {
      type: String,
      default: () => null
    }
  },
  computed: {
    user () {
      return this.$store.state.user.user
    }
  },
  data () {
    return {
      
    }
  },
  mounted () {
    this.fetchUser()
  },
  methods: {
    fetchUser () {
      this.$store.dispatch('fetchUser').then((res) => {
        if (res.data.status) {
          this.$store.commit('setUser', res.data.data)
        }
      })
    },
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