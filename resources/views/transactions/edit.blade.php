<div class="modal fade" id="updateTransaction{{ $transaction->id }}Modal" tabindex="-1" aria-labelledby="updateTransaction{{ $transaction->id }}ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateTransaction{{ $transaction->id }}Modal">Update Transaction</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('transactions.update', ['transaction' => $transaction->id]) }}" method="post" id="updateTransaction{{ $transaction->id }}Form">
                    @csrf
                    @method('PUT')
            
                    <div>
                        <label for="cateogry_id">Category *</label>
                        <select name="category_id" id="category_id" class="form-control" required>
                            @foreach (Auth::user()->categories as $category)
                                <option value="{{ $category->id }}" {{ ($transaction->category_id == $category->id)? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="amount">Amount *</label>
                        <input type="number" min="1" step="0.1" name="amount" id="amount" placeholder="Amount" value="{{ $transaction->amount }}" class="form-control" required>
                    </div>

                    <div>
                        <label for="note">Note</label>
                        <textarea name="note" id="note" cols="30" rows="2" class="form-control">{{ $transaction->note }}</textarea>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" form="updateTransaction{{ $transaction->id }}Form">Save</button>
            </div>
        </div>
    </div>
</div>