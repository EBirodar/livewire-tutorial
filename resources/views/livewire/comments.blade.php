<div class=" flex justify-center  ">
    <div class="w-6/12 mt-5">
        <h1 class="my-10 text-3xl">Comments</h1>
        @error('newComment')<span class="text-red-500 text-xs">{{$message}}</span>@enderror
        <div>
            @if (session()->has('message'))
                <div class="p-3 bg-green-300 text-green-800 rounded shadow-sm" >
                    {{ session('message') }}

                </div>
            @endif
        </div>
        <form wire:submit.prevent="addComment" class="my-4 flex">
            <input type="text" class="w-full rounded border shadow mr-2 p-2  my-2"  placeholder="what's in your mind." wire:model.debounce.500ms="newComment">
            <div class="py-2  " >
                <button class="p-2 bg-blue-500 w-20 rounded shadow text-white" style="border: none; "type="submit">ADD</button>
            </div>
        </form>
        @foreach($comments as $comment)
        <div class="border shadow p-3 my-2 rounded">
            <div class="flex justify-between">
                <div class="d-flex justify-content-start my-2">
                    <p class="font-bold text-lg">{{$comment->creator->name}}</p>
                    <p class="mx-3 py-1 text-gray font-semibold " style="color: gray;font-size: small">{{$comment->created_at->diffForHumans()}}</p>
                </div>
                <i class="fas fa-times text-red-200 hover:text-red-600 cursor-pointer" wire:click="remove({{$comment->id}})"></i>
            </div>

            <p class="text-gray-800">{{$comment->body}}</p>
        </div>
        @endforeach
        {{$comments->links('pagination-links')}}
    </div>
</div>
