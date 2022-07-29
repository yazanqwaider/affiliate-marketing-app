@extends('layouts.master')

@section('content')
    <div>
      <section>
        <div>
          <p class="m-1">Go to <a href="{{ $user->referral_link }}" target="_blank">referral link</a></p>
          <button class="btn btn-outline-info btn-sm copy-link-btn" data-link="{{ $user->referral_link }}">copy link</button>
        </div>

        <div class="d-flex flex-wrap justify-content-around my-3">
          <div class="total-item" title="registered users through the user referral link">
              <h4>Referral Registrations</h4>
              <h3>{{ $user->referral_registrations }}</h3>
          </div>

          <div class="total-item" title="visitors that view the user registration page">
              <h4>Referral Views</h4>
              <h3>{{ $user->referral_views }}</h3>
          </div>

          <div class="total-item" title="wallet balance">
              <h4>Wallet Balance</h4>
              <h3>{{ $user->balance }}</h3>
          </div>
          
          <div class="total-item" title="wallet balance">
              <h4>Total Expenses</h4>
              <h3>{{ $user->expenses_transactions->sum('amount') }}</h3>
          </div>
          
          <div class="total-item" title="wallet balance">
              <h4>Total Income</h4>
              <h3>{{ $user->income_transactions->sum('amount') }}</h3>
          </div>
        </div>
      </section>
  
      <section class="my-3">
        <h3>Referred Users</h3>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($user->referred_users as $referred_user)
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
      </section>

      <section class="my-3">
        <h3>Transactions</h3>

        @include('transactions.index')
      </section>

      <section class="my-3">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h3>Statistics</h3>
          <p class="text-secondary mb-2 mb-md-0">Last 14 days (about two weeks)</p>
        </div>

        <canvas class="my-4" id="myChart" width="900" height="380"></canvas>
      </section> 
    </div>
@endsection

@push('script')
  <script src="{{ asset('js/chart.js') }}"></script>

  <script>
    var ctx = document.getElementById("myChart");
    let labels = @json(array_keys($transactions));
    let values = @json(array_values($transactions));

    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: labels,
        datasets: [{
          label: 'Registered Users',
          data: values,
          lineTension: 0,
          backgroundColor: 'transparent',
          borderColor: '#007bff',
          borderWidth: 4,
          pointBackgroundColor: '#007bff'
        }]
      },
      options: {
        scales: {
          y: {
            ticks: {
              stepSize: 1,
              beginAtZero: false
            }
          }
        },
        legend: {
          display: false,
        }
      }
    });


    $('.copy-link-btn').on('click', function() {
      var tempInput = $("<input>");
      $("body").append(tempInput);
      tempInput.val($(this).attr('data-link')).select();
      document.execCommand("copy");
      tempInput.remove();
    });
  </script>
@endpush