<div>
    <h1>Support Tickets</h1>
    @foreach($tickets as $ticket)
        <div class="border shadow p-3 my-2 rounded">

            <p class="text-gray-800">{{$ticket->question}}</p>

        </div>
    @endforeach
    {{$tickets->links('pagination-links')}}
</div>
