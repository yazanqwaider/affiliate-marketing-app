<div>
    <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="post">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Name" value="{{ $category->name }}" required>
        </div>

        <div>
            <label for="type">Type</label>
            <select name="type" id="type" required>
                <option value="income" {{ ($category->type == 'income')? 'selected':'' }}>Income</option>
                <option value="expenses" {{ ($category->type == 'expenses')? 'selected':'' }}>Expenses</option>
            </select>
        </div>

        <button>Update</button>
    </form>
</div>