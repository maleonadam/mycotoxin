<?php

    // dd($products);
    $dataPoints = array(
        $products[0]['quantity_sold'],
        $products[1]['quantity_sold'],
        $products[2]['quantity_sold'],
        $products[3]['quantity_sold'],
        $products[4]['quantity_sold']
    );

    $labels = array(
        $products[0]['name'],
        $products[1]['name'],
        $products[2]['name'],
        $products[3]['name'],
        $products[4]['name']
    );
 
?>

@extends('layouts.other')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                @include('layouts.alerts')
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3><i class="fa fa-briefcase"></i> <strong>Services</strong></h3>
                        <p><b><a href="{{ route('welcome') }}">Home</a></b> <i class="fa fa-chevron-right fa-sm"></i>
                        <b>All Charts</b></p>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <canvas id="myChart" style="height: 200px; width: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.1/chart.min.js"></script>
@endsection

@section('javascript')
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: <?php echo json_encode($labels, JSON_NUMERIC_CHECK); ?>,
                datasets: [{
                    label: 'Orders Made',
                    data: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>,
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        position: 'top',
                        align: 'start',
                        font: {weight: 'bold'},
                        text: 'Most Ordered Services (Top 5)'
                    }
                }
            }
        });
    </script>
@endsection 