<?php
 
$current_month = date('M', time());
$last_month = date('M',strtotime("first day of -1 month"));
$last_to_last_month = date('M',strtotime("first day of -2 month"));
$last_to_last_month_two = date('M',strtotime("first day of -3 month"));
$last_to_last_month_three = date('M',strtotime("first day of -4 month"));
$last_to_last_month_four = date('M',strtotime("first day of -5 month"));

 $dataPoints = array(
	$last_month_but_four_users,
    $last_month_but_three_users,
    $last_month_but_two_users,
    $last_month_but_one_users,
	$last_month_users,
	$current_month_users	
);

$labels = array($last_to_last_month_four, $last_to_last_month_three, $last_to_last_month_two, $last_to_last_month, $last_month, $current_month);
 
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
                    <h3><i class="fa fa-user-circle"></i> <strong>Users Charts</strong></h3>
                    <p>
                        <b><a href="{{ route('welcome') }}">
                            Home</a></b> <i class="fa fa-chevron-right fa-sm"></i>
                        <b>All Charts</b>
                    </p>
                </div>

                <div class="card-body"> 
                    <div class="row">
                        <div class="col-12 table-responsive">
							<canvas id="myChart" style="height: 300px; width: 100%;"></canvas>
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
        type: 'line',
        data: {
            labels: <?php echo json_encode($labels, JSON_NUMERIC_CHECK); ?>,
            datasets: [{
                label: 'New Users',
                data: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>,
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    position: 'top',
                    align: 'start',
                    font: {weight: 'bold'},
                    text: 'New Users (Last 6 Months)'
                }
            },
            scales: {
                y: {
                    ticks: {
                        stepSize: 1.0
                    },
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection