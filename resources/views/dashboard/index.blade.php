@extends('layouts.master')

@section('content')
    <div>
      <section class="my-3">
        <h3>Registered Users</h3>

        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th width="200">Registered Date</th>
                        <th>Referred Users Count</th>
                        <th>Total Income</th>
                        <th>Total Expenses</th>
                        <th>Wallet Balance</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>{{ $user->referral_registrations }}</td>
                            <td class="font-weight-bold text-success">{{ $user->income_transactions->sum('amount') }}</td>
                            <td class="font-weight-bold text-danger">{{ $user->expenses_transactions->sum('amount') }}</td>
                            <td class="font-weight-bold">{{ $user->balance }}</td>
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
    </div>
@endsection
