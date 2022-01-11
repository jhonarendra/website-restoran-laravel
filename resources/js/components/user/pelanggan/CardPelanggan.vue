<template>
  <div class="card" @click="$emit('handleShow', data)">
    <div class="card-body" style="position: relative">
      <h4>{{ data.nama_pelanggan }}</h4>
      <p>{{ data.alamat}}</p>
      <input
        v-model="checked"
        :value="data.id_pelanggan"
        name="cbPelanggan"
        type="checkbox"
        style="position: absolute; right: 20px; bottom: 10px;"
        @click="$emit('checkItem', data.id_pelanggan)"
      >
    </div>
  </div>
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
    if (this.tableDataChecked.includes(this.data.id_pelanggan)) {
      this.checked.push(this.data.id_pelanggan)
    } else {
      this.checked = []
    }
  }
}
</script>