
@extends('frontend.main')
@section('main-section')
    <link rel="stylesheet" href="{{ asset('css/style_new.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/premium.css') }}" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div class="container">
        <canvas id="myChart"></canvas>
    </div>
    <script>
        const labels = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'july',
            'august',
            'september',
            'october','november','december'
        ];

        const data = {
            labels: labels,
            datasets: [{
                label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [0, 10, 5, 2, 20, 30, 245],
            }]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>


    <section class="bg-gradient-light padding">
        <div class="bg-image-08 dark margin-bottom max-width-l overlay padding padding-bottom padding-top rounded">
            <div class="center max-width-m">
                <h2>Welcome Our Premium Member</h2>
                <p class="paragraph">You arew enjoying our exclusive features.</p>
            </div>
        </div>
        <div class="row center margin-bottom max-width-l min-two-columns">
            <div class="col-one-fourth">
                <i class="feature-icons material-icons">format_shapes</i>
                <h6>Unlimited Products Upload</h6>
                <p class="muted paragraph">Sed ut perspiciatis unde omnis iste natus.</p>
            </div>
            <div class="col-one-fourth">
                <i class="feature-icons material-icons">network_check</i>
                <h6>Sponsored Post</h6>
                <p class="muted paragraph">Sed ut perspiciatis unde omnis iste natus.</p>
            </div>
            <div class="col-one-fourth">
                <i class="feature-icons material-icons">line_style</i>
                <h6>80% Selling response</h6>
                <p class="muted paragraph">Sed ut perspiciatis unde omnis iste natus.</p>
            </div>
            <div class="col-one-fourth">
                <i class="feature-icons material-icons">chrome_reader_mode</i>
                <h6>24/7 Customer Service</h6>
                <p class="muted paragraph">Sed ut perspiciatis unde omnis iste natus.</p>
            </div>
        </div>

    </section>



@endsection
