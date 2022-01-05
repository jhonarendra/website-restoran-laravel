<template>
	<div id="app">
		<router-view/>
		<nav v-if="showNav">
			<div class="container">
				<div class="row">
					<router-link to="/" class="col-3 text-center pt-2 pb-3">
						<svg class="svg-home" viewBox="0 0 24 24"><path d=""></path></svg>
					</router-link>
					<router-link to="/transaksi" class="col-3 text-center pt-2 pb-3">
						<svg class="svg-format-list-numbers" viewBox="0 0 24 24"><path d=""></path></svg>
					</router-link>
					<router-link to="/anggaran" class="col-3 text-center pt-2 pb-3">
						<svg class="svg-ticket-percent" viewBox="0 0 24 24"><path d=""></path></svg>
					</router-link>
					<router-link to="/profil" class="col-3 text-center pt-2 pb-3">
						<svg class="svg-account" viewBox="0 0 24 24"><path d=""></path></svg>
					</router-link>
				</div>
			</div>
		</nav>
	</div>
</template>

<style>
	@import '../../node_modules/bootstrap/dist/css/bootstrap.min.css';
	/*@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@300;400;700&display=swap');*/
	/*@import url('https://fonts.googleapis.com/css2?family=Rubik&display=swap');*/
	/*@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap');*/
	/*@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap');*/
	@import url('https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;700&display=swap');
	body {
		/* noto sans paling bagus */
		/*font-family: 'Noto Sans TC', sans-serif;*/
		/*font-family: 'Roboto', sans-serif;*/
		/*font-family: 'Open Sans', sans-serif;*/
		font-family: 'Raleway', sans-serif;
		font-weight: 400;
		/*font-family: 'Rubik', sans-serif;*/
	}
	#app {
		padding-bottom: 100px;
		overflow: hidden;
		min-height: 100vh;
	}
	#app.dark,
	#app.dark .card,
	#app.dark .card .card-header,
	#app.dark .transaksi-header,
	#app.dark .anggaran-header,
	#app.dark #dompet-area,
	#app.dark nav.navbar,
	#app.dark #filter-bar,
	#app.dark nav,
	#app.dark nav.navbar-light .navbar-brand,
	#app.dark #filter-bar .btn.btn-light,
	#app.dark .modal-content,
	#app.dark .list-group-item,
	#app.dark nav a:hover,
	#app.dark #transaksi .card,
	#app.dark #transaksi .card .card-header,
	#app.dark #transaksi .card-collapse .card-header:hover,
	#app.dark .alert-light{
		background: #0D1117; /* cari warna kayak github tu */
		color: white;
	}
	#app.dark .item-transaksi:hover{
		background: #0D1117;
	}
	#app.dark .item-kategori:hover {
		background: #21262d;
	}
	#app #dompet-area,
	#app .item-transaksi:hover,
	#app .item-kategori:hover {
		background: #eeeeee
	}
	
	#app.dark .card,
	#app.dark .list-group-item {
		border: 1px solid #30363d;
	}
	#app.dark nav {
		border-top: 1px solid #30363d;
	}
	
	#app.dark nav.navbar {
		border-top:none
	}
	#app.dark .card.card-collapse {
		border:none
	}
	#app.dark #filter-bar {
		border-bottom: 1px solid #30363d;
	}
	#app.dark .modal-footer {
		border: 1px solid transparent;
	}
	#app.dark .form-control {
		background: #21262d;
		color: #58a6ff;
		border: 1px solid #30363d;
	}

	
	#app.dark .dompet-item .card-footer .btn-light {
		background: #21262d;
		color: #58a6ff
	}

	#app.dark .modal-footer .btn-light {
		background: transparent;
	}

	
	#app.dark #filter-bar .btn.btn-light
	{
		border: 1px solid transparent;
	}
	#app.dark .transaksi-header .btn.btn-light {
		background: #0D1117;
		border: 1px solid transparent;
	}

	#app.dark .btn {
		border: 1px solid #30363d
	}

	#app.dark svg path {
		fill: white
	}
	#app.dark svg.svg-fill-purple path {
		fill: #673AB7
	}


	#app.dark .badge-purple-100,
	#app.dark .badge-purple-100-noborder
	{
		background:#673AB7 !important;

	}
	#app.dark .badge-light-gray {
		background: #21262d !important;
		border:1px solid #30363d;
	}

	
	/* vue horizontal list */

	#app.dark .vue-horizontal-list .vhl-btn-right,
	#app.dark .vue-horizontal-list .vhl-btn-left {
		background: #0D1117;
	}







	#app .transaksi-header,
	#app .anggaran-header,
	#app .alert-light{
		background: white
	}


	.alert {
		font-size: .8em;
	}
	#app.dark .alert-light {
		border:1px solid rgba(255,255,255,.125)
	}
	#app .alert-light {
		border:1px solid rgba(0,0,0,.125)
	}

	

	.btn:focus, .btn-light:focus, .btn:active, .btn-light:active {
		box-shadow: none;
	}


	nav {
		position: fixed;
		background: white;
		bottom: 0;
		z-index: 99;
		width: 100%;
	}
	svg {
		width: 24px;
		height: 24px;
	}
	svg.svg-small {
		width: 12px;
		height: 12px;
	}
	ul li {
		/* display: inline; */
	}
	.fade-leave-active { /* lagi menghilang */
		animation: fadeOut .2s;
	}
	.fade-enter-active {/* lagi muncul */
		opacity: 0;
		animation: fadeIn .2s;
		animation-delay: .2s;
	}
	@keyframes fadeIn{0%{opacity:.2}100%{opacity:1}}
	@keyframes fadeOut{0%{opacity:1}100%{opacity:.2}}


	@keyframes slideIn{0%{margin-left:20px}100%{margin-left: 0px}}
	/*@keyframes fadeOut{0%{opacity:1}100%{opacity:.2}}*/



	svg.svg-check-circle path {
		d: path("M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M11,16.5L18,9.5L16.59,8.09L11,13.67L7.91,10.59L6.5,12L11,16.5Z");
	}
	svg.svg-coin path {
		d: path("M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4M11,17V16H9V14H13V13H10A1,1 0 0,1 9,12V9A1,1 0 0,1 10,8H11V7H13V8H15V10H11V11H14A1,1 0 0,1 15,12V15A1,1 0 0,1 14,16H13V17H11Z");
	}
	svg.svg-chevron-left path {
		d: path("M15.41,16.58L10.83,12L15.41,7.41L14,6L8,12L14,18L15.41,16.58Z");
	}
	svg.svg-chevron-right path {
		d: path("M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z");
	}
	svg.svg-chevron-up path {
		d: path("M7.41,15.41L12,10.83L16.59,15.41L18,14L12,8L6,14L7.41,15.41Z");
	}
	svg.svg-chevron-down path {
		d: path("M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z");
	}
	svg.svg-filter path {
		d: path("M3,2H21V2H21V4H20.92L14,10.92V22.91L10,18.91V10.91L3.09,4H3V2Z");
	}
	svg.svg-filter-outline path {
		d: path("M3,2H21V2H21V4H20.92L15,9.92V22.91L9,16.91V9.91L3.09,4H3V2M11,16.08L13,18.08V9H13.09L18.09,4H5.92L10.92,9H11V16.08Z");
	}
	svg.svg-sort-variant path {
		d: path("M3,13H15V11H3M3,6V8H21V6M3,18H9V16H3V18Z");
	}
	svg.svg-calendar path {
		d: path("M19,19H5V8H19M16,1V3H8V1H6V3H5C3.89,3 3,3.89 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3H18V1M17,12H12V17H17V12Z");
	}
	svg.svg-format-list-bulleted-type path {
		d: path("M5,9.5L7.5,14H2.5L5,9.5M3,4H7V8H3V4M5,20A2,2 0 0,0 7,18A2,2 0 0,0 5,16A2,2 0 0,0 3,18A2,2 0 0,0 5,20M9,5V7H21V5H9M9,19H21V17H9V19M9,13H21V11H9V13Z");
	}
	svg.svg-book path {
		d: path("M18,22A2,2 0 0,0 20,20V4C20,2.89 19.1,2 18,2H12V9L9.5,7.5L7,9V2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18Z");
	}
	svg.svg-swap-horizontal path {
		d: path("M21,9L17,5V8H10V10H17V13M7,11L3,15L7,19V16H14V14H7V11Z");
	}
	svg.svg-home path {
		d: path("M10,20V14H14V20H19V12H22L12,3L2,12H5V20H10Z");
	}
	svg.svg-format-list-numbers path {
		d: path("M7,13H21V11H7M7,19H21V17H7M7,7H21V5H7M2,11H3.8L2,13.1V14H5V13H3.2L5,10.9V10H2M3,8H4V4H2V5H3M2,17H4V17.5H3V18.5H4V19H2V20H5V16H2V17Z");
	}
	svg.svg-ticket-percent path {
		d: path("M4,4A2,2 0 0,0 2,6V10C3.11,10 4,10.9 4,12A2,2 0 0,1 2,14V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V14A2,2 0 0,1 20,12C20,10.89 20.9,10 22,10V6C22,4.89 21.1,4 20,4H4M15.5,7L17,8.5L8.5,17L7,15.5L15.5,7M8.81,7.04C9.79,7.04 10.58,7.83 10.58,8.81A1.77,1.77 0 0,1 8.81,10.58C7.83,10.58 7.04,9.79 7.04,8.81A1.77,1.77 0 0,1 8.81,7.04M15.19,13.42C16.17,13.42 16.96,14.21 16.96,15.19A1.77,1.77 0 0,1 15.19,16.96C14.21,16.96 13.42,16.17 13.42,15.19A1.77,1.77 0 0,1 15.19,13.42Z");
	}
	svg.svg-account path {
		d: path("M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z");
	}
	svg.svg-plus path {
		d: path("M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z");
	}
	svg.svg-plus-one path {
		d: path("M10,8V12H14V14H10V18H8V14H4V12H8V8H10M14.5,6.08L19,5V18H17V7.4L14.5,7.9V6.08Z");
	}
	svg.svg-information-outline path {
		d: path("M11,9H13V7H11M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M11,17H13V11H11V17Z");
	}
	svg.svg-cart path {
		d: path("M17,18C15.89,18 15,18.89 15,20A2,2 0 0,0 17,22A2,2 0 0,0 19,20C19,18.89 18.1,18 17,18M1,2V4H3L6.6,11.59L5.24,14.04C5.09,14.32 5,14.65 5,15A2,2 0 0,0 7,17H19V15H7.42A0.25,0.25 0 0,1 7.17,14.75C7.17,14.7 7.18,14.66 7.2,14.63L8.1,13H15.55C16.3,13 16.96,12.58 17.3,11.97L20.88,5.5C20.95,5.34 21,5.17 21,5A1,1 0 0,0 20,4H5.21L4.27,2M7,18C5.89,18 5,18.89 5,20A2,2 0 0,0 7,22A2,2 0 0,0 9,20C9,18.89 8.1,18 7,18Z");
	}
	svg.svg-human-male-female path {
		d: path("M7.5,2A2,2 0 0,1 9.5,4A2,2 0 0,1 7.5,6A2,2 0 0,1 5.5,4A2,2 0 0,1 7.5,2M6,7H9A2,2 0 0,1 11,9V14.5H9.5V22H5.5V14.5H4V9A2,2 0 0,1 6,7M16.5,2A2,2 0 0,1 18.5,4A2,2 0 0,1 16.5,6A2,2 0 0,1 14.5,4A2,2 0 0,1 16.5,2M15,22V16H12L14.59,8.41C14.84,7.59 15.6,7 16.5,7C17.4,7 18.16,7.59 18.41,8.41L21,16H18V22H15Z");
	}
	svg.svg-book-secure path {
		d: path("M18,2H12V9L9.5,7.5L7,9V2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V4A2,2 0 0,0 18,2M18,20H10V16H11V15A3,3 0 0,1 14,12A3,3 0 0,1 17,15V16H18V20M15,15V16H13V15A1,1 0 0,1 14,14A1,1 0 0,1 15,15Z");
	}
	svg.svg-human path {
		d: path("M21,9H15V22H13V16H11V22H9V9H3V7H21M12,2A2,2 0 0,1 14,4A2,2 0 0,1 12,6C10.89,6 10,5.1 10,4C10,2.89 10.89,2 12,2Z");
	}


	/*

	kelas icon nantinya
	account-card-details, airplane, archive, book-open, briefcase, cash-100, cash-usd, 
	coin, bank, credit-card, credit-card-multiple, home, locker, newspaper, 

	kelas kategori: 
	baby-buggy, battery-charging-90, bike, car, cellphone, 
	fuel, gas-station, gamepad, gift, headphones, onedrive, phone, piano, pill, playstation, printer, radio,
	responsive, rice, run, school, server, silverware, sim, soccer, tablet-ipad, taxi, terrain, tshirt-crew,

	

	color: ;
	red, pink, dll mdcolorpalt



	*/


	svg.svg-account-card-details path {
		d: path("M2,3H22C23.05,3 24,3.95 24,5V19C24,20.05 23.05,21 22,21H2C0.95,21 0,20.05 0,19V5C0,3.95 0.95,3 2,3M14,6V7H22V6H14M14,8V9H21.5L22,9V8H14M14,10V11H21V10H14M8,13.91C6,13.91 2,15 2,17V18H14V17C14,15 10,13.91 8,13.91M8,6A3,3 0 0,0 5,9A3,3 0 0,0 8,12A3,3 0 0,0 11,9A3,3 0 0,0 8,6Z");
	}
	svg.svg-airplane path {
		d: path("");
	}
	svg.svg-archive path {
		d: path("");
	}
	svg.svg-book-open path {
		d: path("");
	}
	svg.svg-bank path {
		d: path("M11.5,1L2,6V8H21V6M16,10V17H19V10M2,22H21V19H2M10,10V17H13V10M4,10V17H7V10H4Z");
	}
	svg.svg-credit-card path {
		d: path("M20,8H4V6H20M20,18H4V12H20M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4Z");
	}
	svg.svg-locker path {
		d: path("M8,2H16A2,2 0 0,1 18,4V20A2,2 0 0,1 16,22H8A2,2 0 0,1 6,20V4A2,2 0 0,1 8,2M8,4V20H16V4H8M10,13H12V17H10V13M10,6H14V7.5H10V6M10,9H14V10.5H10V9Z");
	}
	svg.svg-silverware path {
		d: path("M8.1,13.34L3.91,9.16C2.35,7.59 2.35,5.06 3.91,3.5L10.93,10.5L8.1,13.34M14.88,11.53L13.41,13L20.29,19.88L18.88,21.29L12,14.41L5.12,21.29L3.71,19.88L13.47,10.12C12.76,8.59 13.26,6.44 14.85,4.85C16.76,2.93 19.5,2.57 20.96,4.03C22.43,5.5 22.07,8.24 20.15,10.15C18.56,11.74 16.41,12.24 14.88,11.53Z");
	}
	svg.svg-email-outline path {
		d: path("M4,4H20A2,2 0 0,1 22,6V18A2,2 0 0,1 20,20H4C2.89,20 2,19.1 2,18V6C2,4.89 2.89,4 4,4M12,11L20,6H4L12,11M4,18H20V8.37L12,13.36L4,8.37V18Z");
	}
	svg.svg-gas-station path {
		d: path("M18,10A1,1 0 0,1 17,9A1,1 0 0,1 18,8A1,1 0 0,1 19,9A1,1 0 0,1 18,10M12,10H6V5H12M19.77,7.23L19.78,7.22L16.06,3.5L15,4.56L17.11,6.67C16.17,7 15.5,7.93 15.5,9A2.5,2.5 0 0,0 18,11.5C18.36,11.5 18.69,11.42 19,11.29V18.5A1,1 0 0,1 18,19.5A1,1 0 0,1 17,18.5V14C17,12.89 16.1,12 15,12H14V5C14,3.89 13.1,3 12,3H6C4.89,3 4,3.89 4,5V21H14V13.5H15.5V18.5A2.5,2.5 0 0,0 18,21A2.5,2.5 0 0,0 20.5,18.5V9C20.5,8.31 20.22,7.68 19.77,7.23Z");
	}
	svg.svg-gift path {
		d: path("M22,12V20A2,2 0 0,1 20,22H4A2,2 0 0,1 2,20V12A1,1 0 0,1 1,11V8A2,2 0 0,1 3,6H6.17C6.06,5.69 6,5.35 6,5A3,3 0 0,1 9,2C10,2 10.88,2.5 11.43,3.24V3.23L12,4L12.57,3.23V3.24C13.12,2.5 14,2 15,2A3,3 0 0,1 18,5C18,5.35 17.94,5.69 17.83,6H21A2,2 0 0,1 23,8V11A1,1 0 0,1 22,12M4,20H11V12H4V20M20,20V12H13V20H20M9,4A1,1 0 0,0 8,5A1,1 0 0,0 9,6A1,1 0 0,0 10,5A1,1 0 0,0 9,4M15,4A1,1 0 0,0 14,5A1,1 0 0,0 15,6A1,1 0 0,0 16,5A1,1 0 0,0 15,4M3,8V10H11V8H3M13,8V10H21V8H13Z");
	}
	svg.svg-cellphone-iphone path {
		d: path("M16,18H7V4H16M11.5,22A1.5,1.5 0 0,1 10,20.5A1.5,1.5 0 0,1 11.5,19A1.5,1.5 0 0,1 13,20.5A1.5,1.5 0 0,1 11.5,22M15.5,1H7.5A2.5,2.5 0 0,0 5,3.5V20.5A2.5,2.5 0 0,0 7.5,23H15.5A2.5,2.5 0 0,0 18,20.5V3.5A2.5,2.5 0 0,0 15.5,1Z");
	}
	svg.svg-gamepad path {
		d: path("M16.5,9L13.5,12L16.5,15H22V9M9,16.5V22H15V16.5L12,13.5M7.5,9H2V15H7.5L10.5,12M15,7.5V2H9V7.5L12,10.5L15,7.5Z");
	}
	svg.svg-battery-charging-20 path {
		d: path("M23.05,11H20.05V4L15.05,14H18.05V22M12.05,17H4.05V6H12.05M12.72,4H11.05V2H5.05V4H3.38A1.33,1.33 0 0,0 2.05,5.33V20.67C2.05,21.4 2.65,22 3.38,22H12.72C13.45,22 14.05,21.4 14.05,20.67V5.33A1.33,1.33 0 0,0 12.72,4Z");
	}
	svg.svg-printer path {
		d: path("M18,3H6V7H18M19,12A1,1 0 0,1 18,11A1,1 0 0,1 19,10A1,1 0 0,1 20,11A1,1 0 0,1 19,12M16,19H8V14H16M19,8H5A3,3 0 0,0 2,11V17H6V21H18V17H22V11A3,3 0 0,0 19,8Z");
	}
	svg.svg-minus path {
		d: path("M19,13H5V11H19V13Z");
	}
	svg.svg-toggle-switch-off path {
		d: path("M7,7A5,5 0 0,1 12,12A5,5 0 0,1 7,17A5,5 0 0,1 2,12A5,5 0 0,1 7,7M20,14H14V10H20A2,2 0 0,1 22,12A2,2 0 0,1 20,14M7,9A3,3 0 0,0 4,12A3,3 0 0,0 7,15A3,3 0 0,0 10,12A3,3 0 0,0 7,9Z");
	}
	svg.svg-toggle-switch path {
		d: path("M17,7A5,5 0 0,1 22,12A5,5 0 0,1 17,17A5,5 0 0,1 12,12A5,5 0 0,1 17,7M4,14A2,2 0 0,1 2,12A2,2 0 0,1 4,10H10V14H4Z");
	}
	svg.svg-flower path {
		d: path("M3,13A9,9 0 0,0 12,22C12,17 7.97,13 3,13M12,5.5A2.5,2.5 0 0,1 14.5,8A2.5,2.5 0 0,1 12,10.5A2.5,2.5 0 0,1 9.5,8A2.5,2.5 0 0,1 12,5.5M5.6,10.25A2.5,2.5 0 0,0 8.1,12.75C8.63,12.75 9.12,12.58 9.5,12.31C9.5,12.37 9.5,12.43 9.5,12.5A2.5,2.5 0 0,0 12,15A2.5,2.5 0 0,0 14.5,12.5C14.5,12.43 14.5,12.37 14.5,12.31C14.88,12.58 15.37,12.75 15.9,12.75C17.28,12.75 18.4,11.63 18.4,10.25C18.4,9.25 17.81,8.4 16.97,8C17.81,7.6 18.4,6.74 18.4,5.75C18.4,4.37 17.28,3.25 15.9,3.25C15.37,3.25 14.88,3.41 14.5,3.69C14.5,3.63 14.5,3.56 14.5,3.5A2.5,2.5 0 0,0 12,1A2.5,2.5 0 0,0 9.5,3.5C9.5,3.56 9.5,3.63 9.5,3.69C9.12,3.41 8.63,3.25 8.1,3.25A2.5,2.5 0 0,0 5.6,5.75C5.6,6.74 6.19,7.6 7.03,8C6.19,8.4 5.6,9.25 5.6,10.25M12,22A9,9 0 0,0 21,13C16,13 12,17 12,22Z");
	}
	svg.svg- path {
		d: path("");
	}
	svg.svg- path {
		d: path("");
	}
	svg.svg- path {
		d: path("");
	}
	svg.svg- path {
		d: path("");
	}
	svg.svg- path {
		d: path("");
	}
	



	svg.svg-toggle-switch-off, svg.svg-toggle-switch {
		cursor:pointer
	}




	svg.svg-fill-purple path {
		fill: #673AB7;
	}
	svg.svg-fill-light-gray path {
		fill: #999;
	}
	svg.svg-fill-success path {
		fill: #28a745!important;
	}





	.text-purple {
		color: #673AB7 !important;
	}






	.btn-light {
		background: white;
		border-color: white;
	}	
	.btn-purple {
		background: #673AB7 !important;
		color: white !important;
	}
	.btn-purple svg path{
		fill: white;
	}


	.bg-light-gray {
		background: #eee !important;
	}
	.bg-purple-100 {
		background: #D1C4E9 !important;
	}
	.bg-purple-500 {
		background: #673AB7 !important;
	}
	.bg-purple-700 {
		background: #512DA8 !important;
	}
	.bg-light-purple {
		background: #D1C4E9 !important;
	}
	.bg-light-orange {
		background: #FFE0B2 !important;
	}
	.bg-light-green {
		background: #C8E6C9 !important;
	}
	.bg-light-gray {
		background: #EEEEEE !important;
	}
	.bg-light-indigo {
		background: #C5CAE9 !important;
	}
	.bg-light-red {
		background: #FFCDD2 !important
	}

	.bg-light-purple svg path{
		fill: #673AB7 !important;
	}
	.bg-light-orange svg path{
		fill: #FF9800 !important;
	}
	.bg-light-green svg path{
		fill: #4CAF50 !important;
	}
	.bg-light-gray svg path{
		fill: #9E9E9E !important;
	}
	.bg-light-indigo svg path{
		fill: #3F51B5 !important;
	}
	.bg-light-red svg path{
		fill: #F44336 !important;
	}






	.list-group-item {
		cursor: pointer;
	}



	.btn-circle {
		padding: 10px;
		border: 0;
		border-radius: 30px;
	}




	.badge {
		padding-right: 15px;
		padding-left: 15px;
		padding-top: 5px;
		padding-bottom: 5px;
		margin: 2px;
		cursor: pointer;
	}
	.badge:hover {
	}
	.badge-light-gray {
		background: #eee !important;
		border: 1px solid #eee;
	}
	.badge-light-gray:hover {
		background: #D1C4E9 !important;
	}
	.badge-purple-100 {
		background: #D1C4E9 !important;
		border: 1px solid #673AB7;
	}
	.badge-purple-100-noborder {
		background: #D1C4E9 !important;
	}
	.badge-purple-500 {
		background: #673AB7 !important;
		color: white;
	}

	.card-header{
		background: white;
	}




	.modal-header {
		border-bottom: 0;
	}





	#app .row .col-border {
		border:1px solid rgba(0,0,0,.125);
	}
	#app.dark .row .col-border {
		border:1px solid rgba(255,255,255,.125);
	}
	.row .col-border-right-none {
		border-right: none;
	}
	.row .col-border-left-none {
		border-left: none;
	}


	



	nav svg path{
		fill: #6c757d!important;
	}
	nav .router-link-exact-active.router-link-active svg path {
		fill: #673AB7!important;
	}
	nav a {
		transition: all .2s;
	}
	nav a:hover{
		background: #eee;
	}
	nav a:hover > svg path {
		fill: #673AB7!important;
	}

	/* form dompet */
	.icon-preview {
		width: 100px;
		height: 100px;
		border-radius: 50%;
		text-align: center;
	}
	.icon-preview svg {
		margin-top:24px;
		width: 48px;
		height: 48px;
	}
	.icon-list, .color-list {
		width:20px;
		height: 20px;
		border-radius: 50%;
		float:left;
		margin: 5px 5px 0 0;
		cursor:pointer;
	}
	.icon-list {
		width:50px;
		height: 50px;
		background: #D1C4E9;
		text-align: center;
	}
	.icon-list svg {
		margin-top:12px
	}

	
	@media screen and (max-width: 320px) {
		.icon-preview {
			width: 50px;
			height: 50px;
		}
		.icon-preview svg {
			margin-top:12px;
			width: 24px;
			height: 24px;
		}
		.icon-list {
			width:30px;
			height: 30px;
			background: #D1C4E9;
			text-align: center;
		}
		.icon-list svg {
			margin-top:3px;
		}
	}





	.content-loader{
		/*background: #eee;
		background-image: linear-gradient(to bottom right, red, yellow);*/
		/*background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);*/
		background: linear-gradient(-45deg, #eee, #ddd, #eee);
		background-size: 400% 400%;
		color: transparent;
		border-radius: 30px;
		padding: 0 10px;
		animation: contentLoader 1s infinite;
	}

	@keyframes contentLoader{
		0% {
			background-position: 0% 50%;
			/*background-image: linear-gradient(to bottom right, red, yellow);*/
		}
		50% {
			background-position: 100% 50%;
		}
		100% {
			background-position: 0% 50%;
			/*background-image: linear-gradient(to bottom right, yellow, red);*/
		}
	}


	#btnAddTransaksi {
		position: fixed;
		bottom: 60px;
		right: 10px;
		z-index: 999;
	}

/* 
	.splash-screen {
		position: fixed;
		width: 100%;
		height: 100%;
		background: white;
		z-index: 9999;
	}
	.splash-screen img {
		margin-top:40vh
	} */



</style>

<script>
export default {
	data(){
		return {
			showNav: true
		}
	},
	computed: {
		darkMode(){
			return this.$store.getters.getDarkMode
		}
	},
	created(){
		if(!this.$store.getters.checkIsInit){
			this.$store.dispatch('initData')
		}
	},
	methods: {
		toggleDarkMode(){
			let elApp = document.querySelector('#app')
			if(this.darkMode){
				elApp.classList.add('dark')
			} else {
				elApp.classList.remove('dark')
			}
		},
		keyDownMenuListener(e){
			switch(e.key){
				case 'a':
					this.$router.push({path: '/'})
					break

				case 's':
					this.$router.push({path: '/transaksi'})
					break
					
				case 'd':
					this.$router.push({path: '/anggaran'})
					break
					
				case 'f':
					this.$router.push({path: '/profil'})
					break
					
				default:
					break
			}
		}
	},
	mounted(){
		// window.addEventListener('keydown', this.keyDownMenuListener)
	},
	watch: {
		darkMode(newVal, oldVal){
			this.toggleDarkMode()
		},
		$route(){
			if(this.$route.name === '404' || this.$route.name === '500'){
				this.showNav = false
			} else {
				this.showNav = true
			}
		}
	}

}
</script>