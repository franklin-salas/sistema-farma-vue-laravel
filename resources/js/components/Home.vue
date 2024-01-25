<template>
    <div>
        <div class="row wrapper border-bottom white-bg py-2">
            <div class="col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        cesa
                    </li>
                </ol>
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-title px-5">
                            <h5 style="position:absolute;">anual</h5>
                            <div class="text-center">
                                <button type="button" class="btn btn-sm btn-danger">
                                    Ingresos {{total_incomes}}
                                </button>
                                <button type="button" class="btn btn-sm btn-primary">
                                    Egresos {{total_egresses}}
                                </button>
                            </div>

                            <div class="ibox-tools">
                                <button type="button" class="btn btn-sm btn-danger">
                                    Saldo {{balance}}
                                </button>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <template v-if="load">
                                <bar-chart :chartdata="chartdata"></bar-chart>
                            </template>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>

    import BarChart from "./utils/BarChart.vue";

    export default {
        name: "Home",
        data: () => ({
            url: {
                get_incomes: '/income/year',
            },
            total_incomes: '',
            total_egresses: '',
            balance: '',
            load: false,
            chartdata: {
                labels: ["enero", "febrero", "marzo", "abrir", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre",
                    "diciembre"
                ],
                datasets: [
                    {
                        label: 'Ingresos',
                        backgroundColor: '#ed5565', ///'#1ab394'
                        pointBackgroundColor: 'white',
                        borderWidth: 1,
                        pointBorderColor: '#249EBF',
                        data: [40, 20, 30, 50, 90, 10, 20, 40, 50, 70, 90, 100]
                    },
                    {
                        label: 'Egresos',
                        backgroundColor: '#1ab394', //  '#ed5565'
                        pointBackgroundColor: 'white',
                        borderWidth: 1,
                        pointBorderColor: '#249EBF',
                        data: [40, 20, 30, 50, 90, 10, 20, 40, 50, 70, 90, 100]
                    },
                ]


            },
        }),
        mounted() {
            let me = this;
            me.get_incomes();
        },
        components: {
            BarChart
        },
        methods: {
            get_incomes() {
                let me = this;
                axios.get(me.url.get_incomes)
                    .then(function (response) {
                        me.chartdata.datasets[0].data = response.data.incomes;
                        me.chartdata.datasets[1].data = response.data.egresses;
                        me.total_incomes = response.data.total_incomes;
                        me.total_egresses = response.data.total_egresses;
                        me.balance = me.total_incomes - me.total_egresses;
                        me.load = true;
                    });
            },
        }
    }
</script>

<style scoped>

</style>
