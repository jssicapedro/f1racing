@extends('layout.layout')

@section('title', 'F1Racing - Constructors')

@section('links')
<link rel="stylesheet" href="{{ asset('css/driver_show.css') }}">
@endsection

@section('script')

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
    

    <div>
    <div style="width:75%;">
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
</div>


</div>
@endsection

@push('scripts')
<script>
var config = {
		type: 'line',
		data: {
			labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
			datasets: [{
				label: 'APAC RE Index',
				backgroundColor: window.chartColors.red,
				borderColor: window.chartColors.red,
				fill: false,
				data: [
					10,
					20,
					30,
					40,
					100,
					50,
					150
					/*randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor()*/
				],
			}, {
				label: 'APAC PME',
				backgroundColor: window.chartColors.blue,
				borderColor: window.chartColors.blue,
				fill: false,
				data: [
					50,
					300,
					100,
					450,
					150,
					200,
					300
				],
		
			}]
		},
		options: {
			responsive: true,
			title: {
				display: true,
				text: 'Chart.js Line Chart - Logarithmic'
			},
			scales: {
				xAxes: [{
					display: true,
          scaleLabel: {
            display: true,
            labelString: 'Date'
          },
			
				}],
				yAxes: [{
					display: true,
					//type: 'logarithmic',
          scaleLabel: {
							display: true,
							labelString: 'Index Returns'
						},
						ticks: {
							min: 0,
							max: 500,

							// forces step size to be 5 units
							stepSize: 100
						}
				}]
			}
		}
	};

	window.onload = function() {
		var ctx = document.getElementById('canvas').getContext('2d');
		window.myLine = new Chart(ctx, config);
	};

	document.getElementById('randomizeData').addEventListener('click', function() {
		config.data.datasets.forEach(function(dataset) {
			dataset.data = dataset.data.map(function() {
				return randomScalingFactor();
			});

		});

		window.myLine.update();
	});

</script>
@endpush