@extends('layouts.master')

@section('content')
    <div>
        <a href="{{ Auth::user()->referral_link }}">referral link</a>

        <div>
            <div>
                <h4>Referral Registrations</h4>
                <h3>{{ Auth::user()->referral_registrations }}</h3>
            </div>

            <div>
                <h4>Referral Views</h4>
                <h3>{{ Auth::user()->referral_views }}</h3>
            </div>
        </div>

        <h2>Referred Users</h2>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Crreate At</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse (Auth::user()->referred_users as $referred_user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $referred_user->name }}</td>
                            <td>{{ $referred_user->created_at }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="100%">No referred users yet !</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>


        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
            <p class="text-secondary mb-2 mb-md-0">Last 14 days (about two weeks)</p>
          </div>

          <canvas class="my-4" id="myChart" width="900" height="380"></canvas>
          

          <!-- Graphs -->
          <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
          <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
              type: 'line',
              data: {
                labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                datasets: [{
                  data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
                  lineTension: 0,
                  backgroundColor: 'transparent',
                  borderColor: '#007bff',
                  borderWidth: 4,
                  pointBackgroundColor: '#007bff'
                }]
              },
              options: {
                scales: {
                  yAxes: [{
                    ticks: {
                      beginAtZero: false
                    }
                  }]
                },
                legend: {
                  display: false,
                }
              }
            });
          </script>      
    </div>
@endsection