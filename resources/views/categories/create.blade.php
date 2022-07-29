<div>
    <form action="{{ route('categories.store') }}" method="post">
        @csrf

        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Name" required>
        </div>

        <div>
            <label for="type">Type</label>
            <select name="type" id="type" required>
                <option value="income">Income</option>
                <option value="expenses">Expenses</option>
            </select>
        </div>

        <button>Create</button>
    </form>
</div>