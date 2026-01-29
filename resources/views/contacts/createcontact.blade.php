<form action="{{ route('contacts.store') }}" method="POST">
    @csrf
    <label for="">name</label>
    <input type="text" name="name">
    <label for="">email</label>
    <input type="email" name="email">
    <label for="">phone</label>
    <input type="text" name="phone">
    <label for="">group_id</label>
    <select name="group_id">
        @foreach ($groups as $group)
            <option value="{{ $group->id }}">{{ $group->name }}</option>
        @endforeach
    </select>
    <button type="submit">add conatact</button>
</form>