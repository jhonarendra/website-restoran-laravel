<template>
  <div>
    <div class="row p-4">
      <div class="col-lg-6 d-flex my-1">
        <div style="flex: 1">
          <form action="" method="" @submit="setSearch">
            <div class="input-group mb-2 mb-sm-0">
              <div class="input-group-addon"><i class="fa fa-search" /></div>
              <input v-model="filter.search" type="text" class="form-control" placeholder="Search">
            </div>
          </form>
        </div>
        <div>
          <div>
            <button
              title="Tampilkan Per Halaman"
              class="btn btn-light"
              @click="showPerPageMenu = !showPerPageMenu"
            >
              <i class="fa fa-filter" />
            </button>
          </div>
          <div
            class="list-group mt-3"
            style="position: absolute; z-index: 9"
            :class="showPerPageMenu ? 'd-block' : 'd-none'"
          >
            <button
              v-for="i in [5, 10, 20, 50, 100]"
              :key="'per-' + i"
              type="button"
              title="Mode View"
              class="list-group-item list-group-item-action bg-white"
              @click="setPerPage(i)"
            >
              Tampilkan tiap {{ i }} data
            </button>
          </div>
        </div>
        <div v-if="showToggleView">
          <button
            type="button"
            title="Mode View"
            class="btn btn-light"
            @click="setViewMode"
          >
            <i :class="(view === 'table') ? 'fa fa-table' : 'fa fa-columns'" />
          </button>
        </div>
        <div>
          <slot name="checkbox_action" />
        </div>
      </div>
      <div class="col-lg-6 my-1">
        <slot name="table-action" />
      </div>
    </div>
    <!-- slot alert -->
    <div>
      <slot name="table-alert" />
    </div>

    <!-- end slot alert -->
    <div
      v-if="!loading"
    >
      <div v-if="view === 'table'" class="table-responsive">
        <table class="table">
          <thead class="thead">
            <tr>
              <th
                v-for="c in columns"
                :key="c.field"
                @click="setSort(c)"
              >
                <input
                  v-if="c.field === 'checkbox'"
                  v-model="checkbox"
                  :value="1"
                  type="checkbox"
                >
                <span v-else>{{ c.label }}</span>
                <span v-if="c.sortable">
                  <span
                    v-if="
                      filter.sortKey === c.field && filter.sortOrder === 'asc'
                    "
                    class="dark:text-gray-200"
                  >
                    <i class="fa fa-caret-up" />
                  </span>
                  <span
                    v-else-if="
                      filter.sortKey === c.struct && filter.sortOrder === 'asc'
                    "
                    class="dark:text-gray-200"
                  >
                    <i class="fa fa-caret-up" />
                  </span>
                  <span
                    v-else-if="
                      filter.sortKey === c.field && filter.sortOrder === 'desc'
                    "
                    class="dark:text-gray-200"
                  >
                    <i class="fa fa-caret-down" />
                  </span>
                  <span
                    v-else-if="
                      filter.sortKey === c.struct && filter.sortOrder === 'desc'
                    "
                    class="dark:text-gray-200"
                  >
                    <i class="fa fa-caret-down" />
                  </span>
                </span>
              </th>
            </tr>
          </thead>
          <tbody
            v-if="tableData.length > 0"
          >
            <tr v-for="(d, i) in tableData" :key="'row-' + i">
              <td
                v-for="(c, j) in columns"
                :key="'rd-' + j"
                class="td"
              >
                <slot :name="c.field" :row="d">
                  {{ d[c.field] }}
                </slot>
              </td>
            </tr>
          </tbody>
          <tbody v-else class="tbody">
            <tr>
              <td :colspan="columns.length" class="text-center p-4">
                Tidak ada data
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div v-else-if="view === 'card'" class="mx-4">
        <div v-if="cardGrid === 1">
          <div v-for="(d, i) in tableData" :key="'row-' + i">
            <slot name="cardview" :row="d" />
          </div>
        </div>
        <div v-if="cardGrid === 2" class="row">
          <div v-for="(d, i) in tableData" :key="'row-' + i" class="col-lg-6 my-3">
            <slot name="cardview" :row="d" />
          </div>
        </div>
      </div>
    </div>
    <div
      v-if="!loading"
    >
      <div class="show-md">
        <div class="d-flex p-4">
          <button
            class="btn btn-secondary m-1"
            @click="setPage(filter.curPage - 1 > 0 ? filter.curPage - 1 : 1)"
          >
            Sebelum
          </button>
          <button
            class="btn btn-secondary m-1"
            @click="
              setPage(
                filter.curPage + 1 > meta.numPage
                  ? meta.numPage
                  : filter.curPage + 1
              )
            "
          >
            Selanjutnya
          </button>
        </div>
      </div>
      <div class="hide-md">
        <div class="row p-4">
          <div class="col-md-6">
            <p>
              Menampilkan
              {{ " " }}
              <span>{{ meta.from }}</span>
              {{ " " }}
              sampai
              {{ " " }}
              <span>{{ meta.to }}</span>
              {{ " " }}
              dari
              {{ " " }}
              <span>{{ meta.total }}</span>
              {{ " " }}
              data
            </p>
          </div>
          <div class="col-md-6">
            <nav
              aria-label="Pagination"
              class="text-right"
            >
              <button
                class="btn btn-secondary d-inline"
                @click="setPage(filter.curPage - 1 > 0 ? filter.curPage - 1 : 1)"
              >
                <i class="fa fa-angle-left" />
              </button>
              <div v-if="meta.numPage <= 5" class="d-inline">
                <button
                  v-for="i in meta.numPage"
                  :key="'pg-' + i"
                  type="button"
                  class="btn"
                  :class="
                    i === filter.curPage
                      ? 'btn-primary'
                      : 'btn-secondary'
                  "
                  @click="setPage(i)"
                >
                  {{ i }}
                </button>
              </div>
              <div v-else class="d-inline">
                <button
                  v-for="i in firstPage"
                  :key="'pg-' + i"
                  type="button"
                  class="btn"
                  :class="
                    i === filter.curPage
                      ? 'btn-primary'
                      : 'btn-secondary'
                  "
                  @click="setPage(i)"
                >
                  {{ i }}
                </button>
                <span
                  v-if="curPage.length !== 0"
                >
                  ...
                </span>
                <button
                  v-for="i in curPage"
                  :key="'pg-' + i"
                  type="button"
                  class="btn"
                  :class="
                    i === filter.curPage
                      ? 'btn-primary'
                      : 'btn-secondary'
                  "
                  @click="setPage(i)"
                >
                  {{ i }}
                </button>
                <span
                >
                  ...
                </span>
                <button
                  v-for="i in lastPage"
                  :key="'pg-' + i"
                  type="button"
                  class="btn"
                  :class="
                    i === filter.curPage
                      ? 'btn-primary'
                      : 'btn-secondary'
                  "
                  @click="setPage(i)"
                >
                  {{ i }}
                </button>
              </div>
              <button
                class="btn btn-secondary d-inline"
                @click="
                  setPage(
                    filter.curPage + 1 > meta.numPage
                      ? meta.numPage
                      : filter.curPage + 1
                  )
                "
              >
                <i class="fa fa-angle-right" />
              </button>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <div
      v-if="loading"
      class="table-responsive"
    >
      <table
        v-if="view === 'table'"
        class="table"
      >
        <thead>
          <tr>
            <th
              v-for="c in columns"
              :key="c.field"
              @click="setSort(c)"
            >
              {{ c.label }}
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td :colspan="columns.length" class="text-center">
              <div class="spinner-container">
                <div
                  class="spinner"
                  style="background-image: url('/images/spinner-primary.svg')"
                />
              </div>
            </td>
          </tr>
        </tbody>
      </table>
      <div v-else>
        <div class="spinner-container">
          <div class="spinner" style="background-image: url('/images/spinner-primary.svg')" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    columns: {
      type: Array,
      default: () => null
    },
    items: {
      type: Array,
      default: () => null
    },
    loading: {
      type: Boolean,
      default: () => null
    },
    mode: {
      type: String, // ajax atau frontend
      default: 'frontend'
    },
    ajaxFilter: {
      type: Object,
      default: () => null // kalau ajax, filter nya dari parent
    },
    ajaxMeta: {
      type: Object,
      default: () => null // kalau ajax, ambil meta dari backend
    },
    view: {
      type: String,
      default: 'table'
    },
    showToggleView: {
      type: Boolean,
      default: false
    },
    cardGrid: {
      type: Number,
      default: 1
    }
  },
  data () {
    return {
      filter: {
        sortKey: '',
        sortOrder: '',
        curPage: 1,
        perPage: 10,
        search: ''
      },
      tableData: [],
      meta: {
        from: 1,
        to: 0,
        numPage: 0,
        total: 0
      },
      showPerPageMenu: false,
      checkbox: []
    }
  },
  computed: {
    firstPage () {
      let tfp = [1, 2] // kalau cur page != 2
      if (this.filter.curPage === 2) {
        tfp = [1, 2, 3]
      }
      return tfp
    },
    curPage () {
      let tcp = []
      if (this.filter.curPage === 3) {
        tcp = [3, 4, 5]
      } else if (this.filter.curPage >= 4 && this.filter.curPage <= this.meta.numPage - 3) {
        tcp = [this.filter.curPage - 1, this.filter.curPage, this.filter.curPage + 1]
      } else if (this.filter.curPage === this.meta.numPage - 2) {
        tcp = [this.filter.curPage - 1, this.filter.curPage]
      }
      return tcp
    },
    lastPage () {
      let lcp = [this.meta.numPage - 1, this.meta.numPage]
      if (this.filter.curPage === this.meta.numPage - 1) {
        lcp = [this.filter.curPage - 1, this.filter.curPage, this.filter.curPage + 1]
      }
      return lcp
    }
  },
  watch: {
    items (newVal, oldVal) {
      this.loadTableData()
    },
    'filter.search' (newVal) {
      if (this.mode === 'frontend') {
        this.filter.curPage = 1
        this.checkbox = []
        this.loadTableData()
      }
    },
    'ajaxFilter.sortKey' (newVal) {
      this.filter.sortKey = newVal
    },
    'ajaxFilter.sortOrder' (newVal) {
      this.filter.sortOrder = newVal
    },
    'ajaxFilter.curPage' (newVal) {
      this.filter.curPage = newVal
    },
    'ajaxFilter.perPage' (newVal) {
      this.filter.perPage = newVal
    },
    'ajaxFilter.search' (newVal) {
      this.filter.search = newVal
    },
    'ajaxMeta.from' (newVal) {
      this.meta.from = newVal
    },
    'ajaxMeta.to' (newVal) {
      this.meta.to = newVal
    },
    'ajaxMeta.numPage' (newVal) {
      this.meta.numPage = newVal
    },
    'ajaxMeta.total' (newVal) {
      this.meta.total = newVal
    },
    checkbox (newVal) {
      this.$emit('handleCheckbox', (newVal.length === 1))
    }
  },
  mounted () {
    this.loadTableData()
  },
  methods: {
    loadTableData () {
      if (this.mode === 'frontend') {
        let dataFiltered = []
        this.items.forEach((e) => {
          dataFiltered.push(e)
        })

        // Search
        // TODO: search by nested object
        if (this.filter.search) {
          const columnKey = Object.keys(this.items[0])
          const dataSearched = []
          columnKey.forEach((e) => {
            dataFiltered.forEach((f) => {
              const val = f[e] + ''
              if (val.toLowerCase().includes(this.filter.search)) {
                if (!dataSearched.find(g => g[e] === f[e])) {
                  dataSearched.push(f)
                }
              }
            })
          })
          dataFiltered = dataSearched
        }

        // Sort
        if (this.filter.sortKey && this.filter.sortOrder) {
          const compare = ({ key }) => {
            return (a, b) => {
              let result = 0
              let akey = null
              let bkey = null

              // check jika ada . (child object dipakai sort)
              if (!key.includes('.')) {
                akey = a[key]
                bkey = b[key]
              } else {
                const arrKey = key.split('.')
                let tempA = a
                let tempB = b
                for (let i = 0; i < arrKey.length; i++) {
                  const keyName = arrKey[i]
                  tempA = tempA[keyName]
                  tempB = tempB[keyName]
                }
                akey = tempA
                bkey = tempB
              }
              if (akey > bkey) {
                result = 1
              }
              if (akey < bkey) {
                result = -1
              }
              if (this.filter.sortOrder === 'desc') {
                return result * -1
              } else if (this.filter.sortOrder === 'asc') {
                return result
              }
            }
          }
          dataFiltered = dataFiltered.sort(compare({ key: this.filter.sortKey }))
        }

        // Perpage
        let numPage = parseInt(this.items.length / this.filter.perPage) + 1
        if (this.items.length % this.filter.perPage === 0) {
          numPage = numPage - 1
        }
        const from = (this.filter.curPage - 1) * this.filter.perPage
        const to = (from + this.filter.perPage > this.items.length) ? this.items.length : from + this.filter.perPage
        dataFiltered = dataFiltered.splice(from, this.filter.perPage)

        // Set meta
        this.meta.from = from + 1
        this.meta.to = to
        this.meta.numPage = numPage
        this.meta.total = this.items.length
        this.tableData = dataFiltered
      } else if (this.mode === 'ajax') {
        this.tableData = this.items
      }
    },
    setSort (c) {
      if (c.sortable) {
        // check apakah sortKey ada di data? kalau tidak, pakai struct columns
        const dataKey = Object.keys(this.items[0])
        const key = (dataKey.includes(c.field)) ? c.field : c.struct
        this.filter.sortKey = key
        this.filter.sortOrder = (this.filter.sortOrder) ? (this.filter.sortOrder === 'desc') ? 'asc' : 'desc' : 'asc'
        if (this.mode === 'frontend') {
          this.loadTableData()
        } else if (this.mode === 'ajax') {
          this.$emit('setFilter', this.filter)
        }
      }
    },
    setPage (i) {
      if (this.filter.curPage === i) {
        return false
      }
      if (i < 1 || i > this.meta.numPage) {
        return false
      }

      this.filter.curPage = i
      // this.checkbox = []
      if (this.mode === 'frontend') {
        this.loadTableData()
      } else if (this.mode === 'ajax') {
        if (!this.filter.sortKey) {
          this.filter.sortKey = 'created_at'
        }
        if (!this.filter.sortOrder) {
          this.filter.sortOrder = 'desc'
        }
        this.$emit('setFilter', this.filter)
      }
    },
    setSearch (e) {
      e.preventDefault()
      if (this.mode === 'ajax') {
        this.filter.curPage = 1
        this.checkbox = []
        this.$emit('setFilter', this.filter)
      }
    },
    setPerPage (val) {
      this.showPerPageMenu = false
      this.filter.perPage = val
      this.checkbox = []
      if (this.mode === 'frontend') {
        this.loadTableData()
      } else if (this.mode === 'ajax') {
        this.$emit('setFilter', this.filter)
      }
    },
    setViewMode () {
      this.$emit('setTableViewMode', (this.view === 'table') ? 'card' : 'table')
    }
  }
}
</script>

<style scoped>
  #search {
    padding-top: 10px;
    padding-bottom: 10px
  }
  @media screen and (max-width: 640px) {
    #search {
      padding-top: 8px;
      padding-bottom: 8px;
    }
  }
</style>
