@foreach ($athletes as $athlete)
    {{-- start the marathon or jump off the plane... --}}
    {{ $loop->iteration }} {{-- Starts with 1 --}}
@endforeach
