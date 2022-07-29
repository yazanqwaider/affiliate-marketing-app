
<div class="modal fade" id="edit{{$category->id}}Modal" tabindex="-1" aria-labelledby="edit{{$category->id}}ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit{{$category->id}}ModalLabel">Edit Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="post" id="updateCategory{{$category->id}}">
                    @csrf
                    @method('PUT')
            
                    <div>
                        <label for="name{{$category->id}}">Name</label>
                        <input type="text" name="name" id="name{{$category->id}}" placeholder="Name" value="{{ $category->name }}" class="form-control" required>
                    </div>
            
                    <div>
                        <label for="type{{$category->id}}">Type</label>
                        <select name="type" id="type{{$category->id}}" class="form-control" required>
                            <option value="income" {{ ($category->type == 'income')? 'selected':'' }}>Income</option>
                            <option value="expenses" {{ ($category->type == 'expenses')? 'selected':'' }}>Expenses</option>
                        </select>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" form="updateCategory{{$category->id}}">Save</button>
            </div>
        </div>
    </div>
</div>