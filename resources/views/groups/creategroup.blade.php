<form action="{{ route('groups.store') }}" method="POST">
    @csrf
    <label for="">name groupe</label>
    <input type="text" name="name">
    <button type="submit">add group</button>
</form>
