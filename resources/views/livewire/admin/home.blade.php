<div>
    <div class="row">
        <div class="col-md-6">
            <div class="bg-white p-3 shadow rounded">
                <canvas id="myChart"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="bg-white p-3 shadow rounded">
                <canvas id="emprestimosDay"></canvas>
            </div>
        </div>

        <div class="col-md-6 mt-3">
            <div class="bg-white p-3 shadow rounded">
                <canvas id="graficoEmprestimos"></canvas>
            </div>
        </div>

        <div class="col-md-6 mt-3">
            <div class="bg-white p-3 shadow rounded">
                <canvas id="graficoPeriod"></canvas>
            </div>
        </div>

    </div>
    
    <script src="{{asset("chart.js")}}"></script>
    
<script>
    const ctx = document.getElementById('myChart').getContext('2d');
        
        var labels = @json($labels);
        var data = @json($data);

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Empréstimos por Status',
                    data: data,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                        stepSize: 1 // Mostra apenas números inteiros
                    }
                    }
                }
            }
        });
</script>

<script>
    const grafico = document.getElementById('emprestimosDay').getContext('2d');

    var labelsDay = @json($titleDay); // Datas dos empréstimos
    var dataDay = @json($dataDay); // Quantidade de empréstimos por dia

    new Chart(grafico, {
        type: 'line', // Tipo de gráfico (pode ser 'bar', 'line', etc.)
        data: {
            labels: labelsDay,
            datasets: [{
                label: 'Empréstimos por Dia',
                data: dataDay,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 2,
                fill: true,
                tension: 0.3 // Deixa a linha mais curva
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1 // Mostra apenas números inteiros
                    }
                },
                x: {
                    ticks: {
                        autoSkip: true, // Evita que as datas fiquem sobrepostas
                        //maxRotation: 45, // Inclina as datas para melhor visualização
                        //minRotation: 30
                    }
                }
            }
        }
    });
</script>

<script>
    const ctxK = document.getElementById('graficoEmprestimos').getContext('2d');

    var labelsR = @json($plus);
    var dataR = @json($dataPlus);

    new Chart(ctxK, {  // Corrigido para usar 'ctx' ao invés de 'start'
        type: 'bar',
        data: {
            labels: labelsR, // Corrigido de 'labelsE' para 'labelsR'
            datasets: [{
                label: 'Empréstimos por Curso',
                data: dataR,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<script>
    const ctxPeriod= document.getElementById('graficoPeriod').getContext('2d');

    var labelsPeriod = @json($periodTitle);
    var dataPeriod = @json($periodNumber);

    new Chart(ctxPeriod, {  // Corrigido para usar 'ctx' ao invés de 'start'
        type: 'bar',
        data: {
            labels: labelsPeriod, // Corrigido de 'labelsE' para 'labelsR'
            datasets: [{
                label: 'Empréstimos por Turno',
                data: dataPeriod,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
   
</div>