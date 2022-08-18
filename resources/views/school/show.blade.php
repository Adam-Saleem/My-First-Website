@extends('Layouts.layout')

@section('contact')
    <div class="content">
        <div class="card">
            <div class="card-body">
                <div class="author text-center">
                    <h5 class="title ">{{$school->name}}</h5>
                    <p class="description">{{$school->address}}</p>
                </div>
                <div>
                    <canvas id="myChart" width="200" height="200"></canvas>
                </div>
                <div class="text-right">
                    <a href="{{ url("school/$school->id/edit") }}"><button class="btn btn-primary">Edit info</button></a>
                </div>
            </div>
        </div>
          </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script>
        let ctx = document.getElementById('myChart').getContext('2d');

        let data = <?php echo json_encode($data); ?>;
        let labels = <?php echo json_encode($labels); ?>;
        let colorHex = ['#FB3640', '#EFCA08', '#43AA8B', '#253D5B'];
        let myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                datasets: [{
                    data: data,
                    backgroundColor: colorHex
                }],
                labels: labels
            },
            options: {
                responsive: true,
                legend: {
                    position: 'bottom'
                },
                plugins: {
                    datalabels: {
                        color: '#fff',
                        anchor: 'end',
                        align: 'start',
                        offset: -10,
                        borderWidth: 2,
                        borderColor: '#fff',
                        borderRadius: 25,
                        backgroundColor: (context) => {
                            return context.dataset.backgroundColor;
                        },
                        font: {
                            weight: 'bold',
                            size: '10'
                        },
                        formatter: (value) => {
                            return value + ' %';
                        }
                    }
                }
            }
        })
    </script>
@endsection
