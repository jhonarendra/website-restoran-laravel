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
                {{ (aksi === 'buat') ? (userLogin) ? userLogin.pelanggan.nama : '' : (aksi === 'lihat' || 'edit') ? (reservasi) ? reservasi.pelanggan.nama : '' : '' }}
              </td>
            </tr>
            <tr>
              <td>Email</td>
              <td>{{ (aksi === 'buat') ? (userLogin) ? userLogin.email : '' : (aksi === 'lihat' || 'edit') ? (reservasi) ? reservasi.pelanggan.user.email : '' : '' }}</td>
            </tr>
            <tr>
              <td>Nomor HP</td>
              <td>{{ (aksi === 'buat') ? (userLogin) ? userLogin.pelanggan.no_hp : '' : (aksi === 'lihat' || 'edit') ? (reservasi) ? reservasi.pelanggan.no_hp : '' : '' }}</td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td>{{ (aksi === 'buat') ? (userLogin) ? userLogin.pelanggan.alamat : '' : (aksi === 'lihat' || 'edit') ? (reservasi) ? reservasi.pelanggan.alamat : '' : '' }}</td>
            </tr>
            <tr>
              <td>Foto</td>
              <td>
                <img :src="fotoUser" class="circle mr-2" width="100" height="100">
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
                <select
                  v-model="form.id_restoran"
                  class="form-control"
                  required
                >
                  <option
                    v-for="r in restoran"
                    :key="r.id_restoran"
                    :value="r.id_restoran"
                  >
                    {{ r.nama }}
                  </option>
                </select>
              </td>
              <td v-if="aksi === 'lihat'">
                {{ reservasi.restoran.nama }}
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
                <input
                  v-model="form.jumlah_tamu"
                  type="number"
                  min="1"
                  max="999"
                  class="form-control"
                  required
                >
              </td>
              <td v-if="aksi === 'lihat'">
                {{ reservasi.jumlah_tamu }} orang
              </td>
            </tr>
            <tr v-if="aksi === 'lihat' || aksi === 'edit'">
              <td>Nomor Meja</td>
              <td v-if="aksi === 'edit'">
                <input
                  v-model="form.no_meja"
                  type="text"
                  class="form-control"
                  required
                >
              </td>
              <td v-if="aksi === 'lihat'">
                {{ (reservasi.no_meja) ? reservasi.no_meja : 'Belum diatur' }}
              </td>
            </tr>
            <tr v-if="aksi === 'lihat' || aksi === 'edit'">
              <td>Pegawai</td>
              <td v-if="aksi === 'edit'">
                <select
                  v-model="form.id_pegawai"
                  class="form-control"
                  required
                >
                  <option
                    v-for="p in pegawai"
                    :key="p.id_user"
                    :value="p.id_user"
                  >
                    {{ p.nama }}
                  </option>
                </select>
              </td>
              <td v-if="aksi === 'lihat'">
                {{ (reservasi.pegawai) ? reservasi.pegawai.nama : 'Belum diatur' }}
              </td>
            </tr>
            <tr>
              <td>Tanggal Reservasi <span class="text-danger">*</span></td>
              <td v-if="aksi === 'buat' || aksi === 'edit'">
                <input
                  v-model="form.tanggal_reservasi"
                  type="date"
                  class="form-control"
                  required
                >
                <small class="text-secondary">Reservasi paling lambat 1 hari sebelum acara</small>
              </td>
              <td v-if="aksi === 'lihat'">
                {{ $helpers.dateFormat(reservasi.tanggal_reservasi) }}
              </td>
            </tr>
            <tr v-if="aksi === 'edit' || aksi === 'lihat'">
              <td>Status</td>
              <td v-if="aksi === 'edit'">
                <select
                  v-model="form.status"
                  class="form-control"
                  required
                >
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
                <small class="text-secondary">Dapat dikosongkan</small>
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
        :disabled="submitLoading"
      >
        <i
          v-if="!submitLoading"
          class="pr-2"
          :class="(aksi === 'buat') ? 'fa fa-paper-plane' : 'fa fa-save'"
        />
        <i
          v-else
          class="fa fa-spinner fa-spin"
        />
        {{ (aksi === 'buat') ? 'Buat Reservasi' : 'Simpan' }}
      </button>
    </div>
  </form>
</template>

<script>
import swal from 'sweetalert'

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
    fotoUser () {
      let foto = '/images/avatar-1.png'
      if (this.userLogin) {
        if (this.userLogin.pelanggan) {
          if (this.userLogin.pelanggan.foto) {
            foto = '/api/file/' + this.userLogin.pelanggan.foto
          }
        } else if (this.userLogin.pegawai) {
          if (this.userLogin.pegawai.foto) {
            foto = '/api/file/' + this.userLogin.pegawai.foto
          }
        }
      }
      return foto
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
      pegawai: [],
      submitLoading: false
    }
  },
  mounted () {
    if (!this.userLogin) {
      this.fetchUserLogin()
    } else {
      if (this.aksi === 'buat') {
        this.form.id_pelanggan = this.userLogin.pelanggan.id_pelanggan
      }
    }
    if (this.restoran.length === 0) {
      this.fetchRestoran()
    } else {
      if (this.aksi === 'buat') {
        this.form.id_restoran = this.restoran[0].id_restoran
      }
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
      
      if (this.form.jumlah_tamu <= 0) {
        return false
      }
      
      this.submitLoading = true
      const formData = new FormData()
      formData.append('id_pelanggan', this.form.id_pelanggan)
      formData.append('id_restoran', this.form.id_restoran)
      formData.append('jumlah_tamu', this.form.jumlah_tamu)
      formData.append('tanggal_reservasi', this.form.tanggal_reservasi)
      formData.append('keterangan_pelanggan', this.form.keterangan_pelanggan)

      this.$store.dispatch('storeReservasi', formData).then((res) => {
        if (res.data.status) {
          // update reservasi, supaya ketika balik ke index tidak perlu klik load
          this.$store.dispatch('fetchReservasi').then((r) => {
            if (r.data.status) {
              this.$store.commit('setReservasi', res.data.data)
              swal({
                title: 'Berhasil',
                text: res.data.message,
                icon: 'success',
                buttons: 'Ok'
              })
                .then((val) => {
                  this.$router.push({ path: '/user/reservasi' })
                })
            }
          })
        }
      })
    },
    fetchUserLogin () {
      this.$store.dispatch('fetchUserLogin').then((res) => {
        if (res.data.status) {
          this.$store.commit('setUserLogin', res.data.data)
          if (this.aksi === 'buat') {
            this.form.id_pelanggan = res.data.data.pelanggan.id_pelanggan
          }
        }
      })
    },
    fetchRestoran () {
      this.$store.dispatch('fetchRestoran').then((res) => {
        if (res.data.status) {
          this.$store.commit('setRestoran', res.data.data)
          if (this.aksi === 'buat') {
            this.form.id_restoran = res.data.data[0].id_restoran
          }
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