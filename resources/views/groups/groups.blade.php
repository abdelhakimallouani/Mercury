@foreach($groups as $group)
    <p>{{ $group->name }}</p>
    <ul>
        @foreach($group->contacts as $contact)
            <li>{{ $contact->name }} - {{ $contact->email }} - {{ $contact->phone }}</li>
        @endforeach
    </ul>
@endforeach