<template>
  <form action="" method="POST" @submit="onSubmit">
    <div v-if="aksi === 'buat'" class="alert alert-primary">
      Pilih restoran, masukkan jumlah tamu dan tanggal reservasi
    </div>
    <div>
      <h4 class="font-weight-300 py-3">Data Pelanggan</h4>
      <!--
        Jika aksi buat, identitas user ambil dari user login
        Jika aksi lihat dan edit, identtas ambil dari reservasi (relasi)
        -->
      <div>
        <table
          class="table table-sm table-striped"
          :class="(!userLogin) ? 'd-none' : ''"
        >
          <tbody>
            <tr>
              <td>Nama</td>
              <td>
                {{ (aksi === 'buat') ? (userLogin) ? userLogin.nama_user : '' : (aksi === 'lihat' || 'edit') ? (reservasi) ? reservasi.pelanggan.nama_user : '' : '' }}
              </td>
            </tr>
            <tr>
              <td>Email</td>
              <td>{{ (aksi === 'buat') ? (userLogin) ? userLogin.email : '' : (aksi === 'lihat' || 'edit') ? (reservasi) ? reservasi.pelanggan.email : '' : '' }}</td>
            </tr>
            <tr>
              <td>Username</td>
              <td>{{ (aksi === 'buat') ? (userLogin) ? userLogin.username : '' : (aksi === 'lihat' || 'edit') ? (reservasi) ? reservasi.pelanggan.username : '' : '' }}</td>
            </tr>
            <tr>
              <td>Nomor HP</td>
              <td>{{ (aksi === 'buat') ? (userLogin) ? userLogin.no_hp : '' : (aksi === 'lihat' || 'edit') ? (reservasi) ? reservasi.pelanggan.no_hp : '' : '' }}</td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td>{{ (aksi === 'buat') ? (userLogin) ? userLogin.alamat : '' : (aksi === 'lihat' || 'edit') ? (reservasi) ? reservasi.pelanggan.alamat : '' : '' }}</td>
            </tr>
            <tr>
              <td>Foto</td>
              <td>
                <img src="/images/hidangan/spageti.jpg" class="circle mr-2" width="100" height="100">
              </td>
            </tr>
          </tbody>
        </table>
        <div v-if="!userLogin && aksi === 'buat'" class="spinner-container">
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
              <td>Restoran <span class="text-danger">*</span></td>
              <td v-if="aksi === 'buat' || aksi === 'edit'">
                <select v-model="form.id_restoran" class="form-control">
                  <option
                    v-for="r in restoran"
                    :key="r.id_restoran"
                    :value="r.id_restoran"
                  >
                    {{ r.nama_restoran }}
                  </option>
                </select>
              </td>
              <td v-if="aksi === 'lihat'">
                {{ reservasi.restoran.nama_restoran }}
              </td>
            </tr>
            <tr>
              <td>Alamat Restoran</td>
              <td>
                {{ 
                  (aksi === 'buat' || aksi === 'edit')
                    ?
                    (restoran.find(e => e.id_restoran === form.id_restoran ))
                      ? 
                        restoran.find(e => e.id_restoran === form.id_restoran ).alamat
                      :
                        ''
                    :
                      (aksi === 'lihat')
                        ?
                          reservasi.restoran.alamat
                        :
                          ''
                }}
              </td>
            </tr>
            <tr>
              <td>Jumlah Tamu <span class="text-danger">*</span></td>
              <td v-if="aksi === 'buat' || aksi === 'edit'">
                <input v-model="form.jumlah_tamu" type="number" class="form-control">
              </td>
              <td v-if="aksi === 'lihat'">
                {{ reservasi.jumlah_tamu }} orang
              </td>
            </tr>
            <tr v-if="aksi === 'lihat' || aksi === 'edit'">
              <td>Nomor Meja</td>
              <td v-if="aksi === 'edit'">
                <input v-model="form.no_meja" type="text" class="form-control">
              </td>
              <td v-if="aksi === 'lihat'">
                {{ reservasi.no_meja }} orang
              </td>
            </tr>
            <tr v-if="aksi === 'lihat' || aksi === 'edit'">
              <td>Pegawai</td>
              <td v-if="aksi === 'edit'">
                <select v-model="form.id_pegawai" class="form-control">
                  <option
                    v-for="p in pegawai"
                    :key="p.id_user"
                    :value="p.id_user"
                  >
                    {{ p.nama_user }}
                  </option>
                </select>
              </td>
              <td v-if="aksi === 'lihat'">
                {{ reservasi.pegawai.nama_user }}
              </td>
            </tr>
            <tr>
              <td>Tanggal Reservasi <span class="text-danger">*</span></td>
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
                <select v-model="form.status" class="form-control">
                  <option :value="0">Menunggu Dikonfirmasi</option>
                  <option :value="1">Dikonfirmasi</option>
                  <option :value="2">Sedang Berlangsung</option>
                  <option :value="3">Batal</option>
                  <option :value="4">Selesai</option>
                </select>
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
                <textarea v-model="form.keterangan_pelanggan" class="form-control"></textarea>
              </td>
              <td v-if="aksi === 'lihat'">{{ reservasi.keterangan_pelanggan }}</td>
            </tr>
            <tr v-if="aksi === 'edit' || aksi === 'lihat'">
              <td>Keterangan Pegawai</td>
              <td v-if="aksi === 'edit'">
                <textarea v-model="form.keterangan_pegawai" class="form-control"></textarea>
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
    <div class="text-right">
      <slot name="btn-edit" />
      <button
        v-if="aksi !== 'lihat'"
        type="submit"
        class="btn btn-primary"
      >
        <i class="pr-2" :class="(aksi === 'buat') ? 'fa fa-paper-plane' : 'fa fa-save'" />
        {{ (aksi === 'buat') ? 'Buat Reservasi' : 'Simpan' }}
      </button>
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
    userLogin () {
      return this.$store.state.user.userLogin
    },
    restoran () {
      return this.$store.state.restoran.restoran
    }
  },
  data () {
    return {
      form: {
        no_reservasi: '',
        id_restoran: 0,
        id_pelanggan: 0,
        id_pegawai: 0,
        jumlah_tamu: 0,
        tanggal_reservasi: '',
        keterangan_pelanggan: '',
        keterangan_pegawai: '',
        no_meja: '',
        status: 0 // 0=belum dikonfirmasi, 1=dikonfirmasi, 2=sedang berlangsung, 3=batal, 4=selesai
      },
      pegawai: []
    }
  },
  mounted () {
    if (!this.userLogin) {
      this.fetchUserLogin()
    }
    if (this.restoran.length === 0) {
      this.fetchRestoran()
    }
    this.fetchPegawai()

    if (this.reservasi) {
      this.setForm(this.reservasi)
    }
  },
  methods: {
    setForm (data) {
      let key = Object.keys(data)
      key.forEach((e) => {
        this.form[e] = data[e]
      })
    },
    onSubmit (e) {
      e.preventDefault()
      console.log('submit')
    },
    fetchUserLogin () {
      this.$store.dispatch('fetchUserLogin').then((res) => {
        if (res.data.status) {
          this.$store.commit('setUserLogin', res.data.data)
        }
      })
    },
    fetchRestoran () {
      this.$store.dispatch('fetchRestoran').then((res) => {
        if (res.data.status) {
          this.$store.commit('setRestoran', res.data.data)
        }
      })
    },
    fetchPegawai () {
      this.$store.dispatch('fetchUser', { tipe: 2}).then((res) => {
        if (res.data.status) {
          this.pegawai = res.data.data
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