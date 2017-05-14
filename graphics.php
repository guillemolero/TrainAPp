<!DOCTYPE html>
<html>
    <head>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <title>Gráfico de muestra</title>
    </head>
    <body>
        <div id = "container" style="min-width: 540px; height:590px; margin: 0 auto"></div>
        <script>
            Highcharts.chart('container', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Progresión en ejercicios del usuario'
    },
    subtitle: {
        text: 'Zona: pectoral'
    },
    xAxis: {
        categories: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']
    },
    yAxis: {
        title: {
            text: 'Peso levantado (Kgs)'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: 'Apertura Mancuernas',
        data: [5.0, 7.5, 8.5, 9, 11, 12.5, 12.5, 15, 16, 16, 18, 18.5]
    }, {
        name: 'Press Banca plano',
        data: [8, 10, 11.5, 11.75, 11.75, 13, 13.5, 14, 15, 16.5, 18, 20]
    }, {
        name: 'Press Banca inclinado',
        data: [6, 8.5, 9, 9, 10.75, 11, 12, 12.5, 14, 14, 15, 16]
    },{
        name: 'Pull Over',
        data: [7.5, 7.5, 10, 12.5, 15, 15, 17.5, 17.5, 20, 20, 20, 22.5]
    },]
});
        </script>
    </body>