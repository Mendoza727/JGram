<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LikePost extends Component
{
    public $posts;
    public $isLiked;
    public $likes;

    public function mount($posts)
    {
        $this->isLiked = $posts->checkLike(auth()->user());
        $this->likes= $posts->like()->count();
    }

    public function like()
    {
        if($this->posts->checkLike(auth()->user())){
            $this->posts->like()->where('post_id', $this->posts->id)->delete(); 
            $this->isLiked = false;
            $this->likes--;
        } else {
            $this->posts->like()->create([
                'user_id' => auth()->user()->id
            ]);
            $this->isLiked = true;
            $this->likes++;
        }
    }

    public function render()
    {
        return view('livewire.like-post');
    }
}
