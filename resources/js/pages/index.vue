<template>
  <div>
    <!-- slider -->
    <SliderComp />

    <!-- nav -->
    <NavbarComp />

    <!-- about section -->
    <AboutComp />

    <!-- testimoni -->
    <TestimoniComp />

    <!-- menu -->
    <HidanganComp />


    <!-- reservasi -->
    <ReservasiComponent />



    <FooterComp />
  </div>
</template>

<script>
import NavbarComp from '../components/index/NavbarComp'
import SliderComp from '../components/index/SliderComp'
import AboutComp from '../components/index/AboutComp'
import TestimoniComp from '../components/index/TestimoniComp'
import HidanganComp from '../components/index/HidanganComp'
import ReservasiComp from '../components/index/ReservasiComp'
import FooterComp from '../components/index/FooterComp'

export default {
  components: {
    NavbarComp, SliderComp, AboutComp, TestimoniComp, HidanganComp, ReservasiComp, FooterComp
  },
  data () {
    return {

    }
  },
  mounted () {
    const nav = document.querySelector('nav')
    let sticky = nav.offsetTop
    window.onscroll = () => onScroll()
    function onScroll () {
      if (window.pageYOffset > sticky) {
        nav.classList.add('fixed-top')
      } else if (window.pageYOffset < sticky) {
        console.log('remove')
        nav.classList.remove('fixed-top')
      }
    }
  }
}
</script>

<style>
  nav.fixed-top + #about-section .background-image {
    padding-top: 56px;
  }
</style>
