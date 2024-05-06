@extends('layout.layout')

@section('title', 'F1Racing - Constructors')

@section('links')
<link rel="stylesheet" href="{{ asset('css/driver_show.css') }}">
@endsection

@section('scripts')

@endsection

@section('main')
<div class="about">
	<div class="image">
		<img src="{{ url('storage/driver/'.$driver->imgDriver) }}" alt="{{$driver->imgDriver}}">
	</div>
	<div class="info">
		<div class="name">
			<h2>{{$driver->firstName}}</h2>
			<h1>{{$driver->lastName}}</h1>
		</div>
		<div class="team_country">
			<div class="team">
				<h3>Team</h3>
				<p>{{$driver->team->fullName}}</p>
			</div>
			<div class="country">
				<h3>Team</h3>
				<p>{{$driver->country}}</p>
			</div>
		</div>
		<div class="podium_points">
			<div class="podium">
				<h3>Podiums</h3>
				<p>{{$driver->podiums}}</p>
			</div>
			<div class="points">
				<h3>Points</h3>
				@foreach ($points as $point)
				@if ($point->idDriver == $driver->idDriver)
				<p>{{ $point->totalPoints }}</p>
				@endif
				@endforeach
			</div>
		</div>
		<div class="grandPrix">
			<h3>Grands Prix entered</h3>
			<p>{{$driver->grandPrix}}</p>
		</div>
		<div class="birth_born">
			<div class="birth">
				<h3>Birthday</h3>
				<p>{{$driver->birth}}</p>
			</div>
			<div class="born">
				<h3>Born</h3>
				<p>{{$driver->placeBirth}}</p>
			</div>
		</div>

	</div>
</div>
<div style="width:75%; margin-top: 35px;">
	<div class="chartjs-size-monitor">
		<div class="chartjs-size-monitor-expand">
			<div class=""></div>
		</div>
		<div class="chartjs-size-monitor-shrink">
			<div class=""></div>
		</div>
	</div>
	<canvas id="canvas" style="display: block; width: 1379px; height: 689px;" width="1379" height="689" class="chartjs-render-monitor"></canvas>
</div>

@endsection

@push('scripts')
<script>
	var config = {
        type: 'line',
        data: {
            labels: {!! json_encode($labels) !!},
            datasets: {!! json_encode($datasetsFormatted) !!}
        },
        options: {
            responsive: true,
            title: {
                display: false
            },
            scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: false,
                    },
                    ticks: {
                        autoSkip: false, // Evita que as labels sejam cortadas
                        maxRotation: 70, // Rotaciona as labels para melhor visualização
                        minRotation: 70
                    }
                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Position'
                    },
                    ticks: {
                        min: 0,
                        max: 20,
                        stepSize: 2
                    }
                }]
            },
            tooltips: {
                callbacks: {
                    label: function(tooltipItem, data) {
                        var label = data.datasets[tooltipItem.datasetIndex].label || '';
                        if (label) {
                            label += ': ';
                        }
                        label += tooltipItem.yLabel;
                        return label;
                    },
                    title: function(tooltipItem, data) {
                        var year = data.labels[tooltipItem[0].index];
                        return year;
                    },
                    afterLabel: function(tooltipItem, data) {
                        var year = data.labels[tooltipItem.index];
                        var index = tooltipItem.index;
                        var pista = data.labels[year][index]; // Pegar o nome da pista correspondente ao ano
                        return 'Pista: ' + pista;
                    }
                }
            }
        }
    };

    window.onload = function() {
        var ctx = document.getElementById('canvas').getContext('2d');
        window.myLine = new Chart(ctx, config);
    };
</script>
@endpush