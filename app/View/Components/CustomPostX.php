<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Override;

class CustomPostX extends Component
{
    
    public $likescount = 0;
    public function __construct(public string $username, public string $userimage)
    {

    }

    public function AddLikeCount(){
        $this->likescount++;
    }
   
    public function render(): View|Closure|string
    {
        return view('components.custom-post-x');
    }
}
