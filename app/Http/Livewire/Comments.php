<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class Comments extends Component
{
    use WithPagination;
    use withFileUploads;
    public $newComment;
    public $image;
    public $tickedId=1;


    protected $listeners=['fileUpload'=>'handleFileUpload'];


    public function handleFileUpload($imageData)
    {
        $this->image=$imageData;
    }

    public function storeImage()
    {
        if(!$this->image) {
            return null;
        }
        $img= ImageManagerStatic::make($this->image)->encode('jpg');
        $name=Str::random().'.jpg';
        Storage::disk('public')->put($name,$img);
        return $name;
    }

    public function addComment()
    {
        $this->validate([ 'newComment'=>'required|max:255']);
        $image=$this->storeImage();
        $createdComment=Comment::create([
            'body'=>$this->newComment,
            'user_id'=>1,
            'image'=>$image,
            'support_ticket_id'=>$this->tickedId
        ]);
        $this->newComment="";
        $this->image="";
        session()->flash('message','Comment added successfully  😅');
    }
    public function updated($field)
    {
        $this->validateOnly($field,[ 'newComment'=>'required|max:255']);
    }

    public function remove($commentId)
    {
        $comment=Comment::find($commentId);
        Storage::disk('public')->delete($comment->image);
        $comment->delete();
        session()->flash('message','Comment deleted  successfully  😊');

    }
    public function render()
    {
        return view('livewire.comments',[
            'comments'=>Comment::latest()->paginate(2)
        ]);
    }

}
