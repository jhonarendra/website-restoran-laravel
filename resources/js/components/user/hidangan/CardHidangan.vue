<template>
  <div class="card" @click="$emit('handleShow', data)">
    <img class="card-img-top" src="/images/hidangan/spageti.jpg" alt="Card image cap">
    <div class="card-body" style="position: relative">
      <h4 class="card-title">{{ data.nama_hidangan }}</h4>
      <p class="card-text">{{ data.harga}}</p>
      <input
        v-model="checked"
        :value="data.id_hidangan"
        name="cbHidangan"
        type="checkbox"
        style="position: absolute; right: 20px; bottom: 10px;"
        @click="$emit('checkItem', data.id_hidangan)"
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
    if (this.tableDataChecked.includes(this.data.id_hidangan)) {
      this.checked.push(this.data.id_hidangan)
    } else {
      this.checked = []
    }
  }
}
</script>