<script>
  import { Bar } from 'vue-chartjs'

  export default {
    extends: Bar,
      props: ['chartdata'],
    data() {
      return {
        // chartData: {
        //   labels: ["enero", "febrero", "marzo", "abrir", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre",
        //     "diciembre"
        //   ],
        //   datasets: [
        //       {
        //           label: 'Ingresos',
        //           backgroundColor: '#1ab394',
        //           pointBackgroundColor: 'white',
        //           borderWidth: 1,
        //           pointBorderColor: '#249EBF',
        //           data: [40, 20, 30, 50, 90, 10, 20, 40, 50, 70, 90, 100]
        //       },
        //       {
        //           label: 'Egresos',
        //           backgroundColor: '#ed5565',
        //           pointBackgroundColor: 'white',
        //           borderWidth: 1,
        //           pointBorderColor: '#249EBF',
        //           data: [40, 20, 30, 50, 90, 10, 20, 40, 50, 70, 90, 100]
        //       },
        //   ]
        // },
          chartData: this.chartdata,
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              },
              gridLines: {
                display: true
              }
            }],
            xAxes: [{
              gridLines: {
                display: false
              }
            }]
          },
          legend: {
            display: true
          },
          responsive: true,
          maintainAspectRatio: false
        }
      }
    },
    mounted() {
      this.renderChart(this.chartData, this.options)
    }
  }
</script>
