<div class="modal fade" id="createCategoryModal" tabindex="-1" aria-labelledby="createCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createCategoryModalLabel">Create Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('categories.store') }}" method="post" id="createCategoryForm">
                    @csrf
            
                    <div>
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" placeholder="Name" class="form-control" required>
                    </div>
            
                    <div>
                        <label for="type">Type</label>
                        <select name="type" id="type" class="form-control" required>
                            <option value="income">Income</option>
                            <option value="expenses">Expenses</option>
                        </select>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" form="createCategoryForm">Save</button>
            </div>
        </div>
    </div>
</div>