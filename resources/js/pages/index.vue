<template>
  <div>
    <SliderComp />

    <NavbarComp />

    <AboutComp />

    <TestimoniComp />

    <HidanganComp />

    <ReservasiComp />

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
      nav: null,
      menuNav: null,
      stickyNav: null
    }
  },
  mounted () {
    this.nav = document.querySelector('nav')
    this.menuNav = document.querySelectorAll('nav li a')
    this.stickyNav = this.nav.offsetTop

    window.addEventListener('scroll', this.onScroll)
  },
  methods: {
    onScroll () {
      let pos = window.pageYOffset
      if (pos > this.stickyNav) {
        this.nav.classList.add('fixed-top')
      } else if (pos < this.stickyNav) {
        this.nav.classList.remove('fixed-top')
      }

      this.menuNav.forEach((e) => {
        let elId = e.getAttribute('href')
        let el = null
        if (elId === '#') {
          el = document.querySelector('#slider')
        } else {
          el = document.querySelector(elId)
        }
        if (pos < el.offsetTop && pos + el.offsetHeight > el.offsetTop) {
          e.classList.add('active')
        } else {
          e.classList.remove('active')
        }
      })
    }
  },
  beforeDestroy () {
    window.removeEventListener('scroll', this.onScroll)
  }
}
</script>

<style>
  nav.fixed-top + #about .background-image {
    padding-top: 56px;
  }
</style>
