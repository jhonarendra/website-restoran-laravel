<template>
  <div class="card" @click="$emit('handleShow', data)">
    <div class="card-body" style="position: relative">
      <h4>{{ data.nama_pesanan }}</h4>
      <p>{{ data.alamat}}</p>
      <input
        v-model="checked"
        :value="data.id_pesanan"
        name="cbPesanan"
        type="checkbox"
        style="position: absolute; right: 20px; bottom: 10px;"
        @click="$emit('checkItem', data.id_pesanan)"
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
    if (this.tableDataChecked.includes(this.data.id_pesanan)) {
      this.checked.push(this.data.id_pesanan)
    } else {
      this.checked = []
    }
  }
}
</script>