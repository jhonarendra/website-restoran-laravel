<template>
    <canvas id="chart-day"></canvas>
</template>

<style scoped>

</style>

<script>
import Chart from 'chart.js/auto'
import { LineController } from 'chart.js'
export default {
    data(){
        return {
            configChartWaktu:{
				data: {
					labels: [],
					datasets: [
					{
						label: 'Saldo',
						data: [],
						fill: false,
						borderColor: 'rgb(103, 58, 183)',
						// backgroundColor: 'white',
						tension: 0,
						pointRadius: 0,
						borderWidth: 2
					},
					{
						label: 'Debet',
						data: [],
						fill: false,
						borderColor: 'rgb(40, 167, 69)',
						// backgroundColor: 'white',
						tension: 0,
						pointRadius: 0,
						borderWidth: 2
					},
					{
						label: 'Kredit',
						data: [],
						fill: false,
						borderColor: 'rgb(220, 53, 69)',
						// backgroundColor: 'white',
						tension: 0,
						pointRadius: 0,
						borderWidth: 2
					}
					// ,
					// {
					// 	label: 'Pendapatan',
					// 	data: [],
					// 	fill: false,
					// 	borderColor: 'rgb(76, 175, 80)',
					// 	tension: 0.2,
					// 	pointRadius: 0.9
					// },
					// {
					// 	label: 'Pengeluaran',
					// 	data: [],
					// 	fill: false,
					// 	borderColor: 'rgb(244, 67, 54)',
					// 	tension: 0.2,
					// 	pointRadius: 0.9
					// }
					],
				},
				config: {
					type: 'lineWithLine',
					data: null,
					options: {
						scales: {
							y: {
								ticks: {
									font: {
										size: 10
									},
									color: '#aaa',
				                }
							},
							x: {
								ticks:{
									maxRotation: 0,
									minRotation: 0,
									font: {
										size: 10
									},
									color: '#aaa',
									autoSkip: true,
									stepSize: 6,
								}
							}
						},
						plugins: {
							tooltip: {
								mode: 'index',
								intersect: false
							}
						},
						responsive: true
					}
				},
				chart: null
			}
        }
    },
	props: {
		chartWaktu: {
			type: Array,
			default: () => {}
		}
    },
    methods: {
        renderChart(){
            let data = this.chartWaktu
            let chartWaktuLabel = []
			data.forEach((e, i) => {
				chartWaktuLabel.push(e.label)
			})
			this.configChartWaktu.data.labels = chartWaktuLabel

			let chartWaktuDataNeraca = []
			let chartWaktuDataSaldo = []
			let chartWaktuDataDebet = []
			let chartWaktuDataKredit = []
			data.forEach(e => {
				chartWaktuDataNeraca.push(e.neraca)
				chartWaktuDataSaldo.push(e.saldo)
				chartWaktuDataDebet.push(e.debet)
				chartWaktuDataKredit.push(e.kredit)
			})
			
			this.configChartWaktu.data.datasets[0].data = chartWaktuDataSaldo
			this.configChartWaktu.data.datasets[1].data = chartWaktuDataDebet
			this.configChartWaktu.data.datasets[2].data = chartWaktuDataKredit

			this.configChartWaktu.config.data = this.configChartWaktu.data

			this.configChartWaktu.config.options.scales.y.ticks.callback = (label, index, labels) => {
				if(Math.max.apply(null, chartWaktuDataSaldo) < 1000){
					return Number(label).toLocaleString()
				} else if(Math.max.apply(null, chartWaktuDataSaldo) < 1000000){
					return Number(parseInt(label/1000)).toLocaleString() + ' rb'
				} else {
					return Number(parseInt(label/1000000)).toLocaleString() + ' jt'
				}
			}
			this.configChartWaktu.chart.update()
        }
    },
    mounted(){
        if(window.innerWidth <= 768){
			document.querySelector('#chart-day').setAttribute('width', '500')
			document.querySelector('#chart-day').setAttribute('height', '500')
		}
		class LineWithLine extends LineController {
			draw(ease){
				super.draw(arguments)
				const ctx = this.chart.ctx

				if (this.chart.tooltip._active && this.chart.tooltip._active.length) {
					let activePoint = this.chart.tooltip._active[0]
					
					let xPos = activePoint.element.x
					let yPos = activePoint.element.y
					let topY = this.chart.legend.bottom
					let topX = 0
					let bottomY = this.chart.chartArea.bottom
					let bottomX = this.chart.chartArea.right

					ctx.save();
					ctx.beginPath();
					ctx.moveTo(xPos, topY);
					ctx.lineTo(xPos, bottomY);
					ctx.lineWidth = 1;
					ctx.strokeStyle = '#673AB744';
					ctx.stroke();
					ctx.restore()

					ctx.save();
					ctx.beginPath();
					ctx.moveTo(topX, yPos);
					ctx.lineTo(bottomX, yPos);
					ctx.lineWidth = 1;
					ctx.strokeStyle = '#673AB744';
					ctx.stroke();
					ctx.restore()
				}
			}
		}
		LineWithLine.id = 'lineWithLine'
		LineWithLine.defaults = LineController.defaults
		Chart.register(LineWithLine)

        this.configChartWaktu.config.data = this.configChartWaktu.data
		this.configChartWaktu.chart =  new Chart(
			document.getElementById('chart-day'),
			this.configChartWaktu.config
		)
    },
    watch: {
        chartWaktu(newVal, oldVal){
            if(newVal.length){
                this.renderChart()
            }
        }
    }
}
</script>