@foreach ($contacts as $contact)
    <p>{{ $contact->name }} </p>
    <p> {{ $contact->email }} - {{ $contact->phone }} - Group: {{ $contact->group->name }}</p>
@endforeach
