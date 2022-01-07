<template>
  <div
    id="hidangan"
    class="background-image"
    style="background-image: url('/images/wood_1.png'); overflow: hidden"
  >
    <div class="container">
      <h3 class="text-center display-4 text-white py-5">Menu Favorit</h3>
      <div class="row">
        <div v-for="(h, i) in hidangan" :key="h.id_hidangan" class="col-md-6">
          <div class="row">
            <div
              class="col-md-6"
              :style="`height: 200px;background-image: url('/images/hidangan/${h.foto_hidangan}')`"
            />
            <div
              class="col-md-6"
              :style="`height: 200px; background: ${
                [0, 3, 4].includes(i) ? '#f5f5f5' : '#faebcd'
              } ;padding: 30px 20px`"
            >
              <div
                :style="`position:absolute;height:1px;width:1px;border:15px solid transparent;border-right: 15px solid ${
                  [0, 3, 4].includes(i) ? '#f5f5f5' : '#faebcd'
                };left:-30px;top:80px`"
              />
              <h3 style="text-align: center; color: #444; line-height: 200%">
                <span style="border-bottom: 2px solid #fb6e14">{{
                  h.nama_hidangan
                }}</span>
              </h3>
              <p
                class="display-4"
                style="
                  margin-top: 30px;
                  font-size: 40px;
                  text-align: center;
                  color: #5e493a;
                "
              >
                IDR {{ h.harga_hidangan }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data () {
    return {
      hidangan: [ 
        { 
          id_hidangan:1,
          nama_hidangan:"Spageti",
          jenis_hidangan:"Makanan",
          harga_hidangan:45000,
          foto_hidangan:"spageti.jpg",
          created_at:"2018-05-20 07:49:08",
          updated_at:"2018-05-20 07:49:08"
        },
        { 
          id_hidangan:2,
          nama_hidangan:"Salad",
          jenis_hidangan:"Makanan",
          harga_hidangan:27500,
          foto_hidangan:"salad.jpeg",
          created_at:"2018-05-20 07:49:08",
          updated_at:"2018-05-20 07:49:08"
        },
        { 
          id_hidangan:3,
          nama_hidangan:"Spageti",
          jenis_hidangan:"Makanan",
          harga_hidangan:45000,
          foto_hidangan:"spageti.jpg",
          created_at:"2018-05-20 07:49:08",
          updated_at:"2018-05-20 07:49:08"
        },
        { 
          id_hidangan:4,
          nama_hidangan:"Pinneaple Juice",
          jenis_hidangan:"Minuman",
          harga_hidangan:12500,
          foto_hidangan:"pinepple.jpg",
          created_at:"2018-05-20 07:49:09",
          updated_at:"2018-05-20 07:49:09"
        },
        { 
          id_hidangan:5,
          nama_hidangan:"Strawberry Juice",
          jenis_hidangan:"Minuman",
          harga_hidangan:15000,
          foto_hidangan:"heart.jpg",
          created_at:"2018-05-20 07:49:09",
          updated_at:"2018-05-20 07:49:09"
        },
        { 
          id_hidangan:6,
          nama_hidangan:"Tropical Juice",
          jenis_hidangan:"Minuman",
          harga_hidangan:20000,
          foto_hidangan:"tropical.jpg",
          created_at:"2018-05-20 07:49:09",
          updated_at:"2018-05-20 07:49:09"
        }
      ]
    }
  }
}
</script>

<style scoped>
  #hidangan.background-image {
    height: auto;
    min-height: 100vh;
    padding: 50px 0;
  }
</style>