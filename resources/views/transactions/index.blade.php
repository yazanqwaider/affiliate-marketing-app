<div>
    <div>
        <button type="button" class="btn btn-outline-success btn-sm my-1" data-toggle="modal" data-target="#createNewTransactionModal">
            Add new transaction
        </button>

        @include('transactions.create')
    </div>

    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Category</th>
                <th>Amount</th>
                <th>Note</th>
                <th>Created At</th>
                <th>Balance</th>
                <th>Operations</th>
            </tr>
        </thead>

        <tbody>
            @php $balance = 0; @endphp
            @forelse (Auth::user()->transactions as $transaction)
                @php $balance+= $transaction->amount_with_sign; @endphp

                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $transaction->category->name }}</td>
                    <td>{{ $transaction->amount }}</td>
                    <td>{{ $transaction->note?? '---' }}</td>
                    <td>{{ $transaction->created_at }}</td>
                    <td>{{ $balance }}</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#updateTransaction{{$transaction->id}}Modal">
                            Edit
                        </button>
                    </td>
                </tr>

                @include('transactions.edit', ['transaction' => $transaction])
            @empty
                <tr>
                    <td colspan="100%">No Transactions Yet !</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>