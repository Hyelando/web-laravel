<?php

use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

new class extends Component
{
    public Model $heartable;

    public function toggle(){
        if ($this->heartable->isHearted()){
            $this->heartable->unheart();
        }else{
            $this->heartable->heart();
        }
    }

    public function render(){
        return view('components.⚡heart');
    }
};
?>


<div>
    @auth
    <a wire:click="toggle" class="cursor-pointer group inline-flex items-center transition transform active:scale-90">
        @if ($heartable->isHearted())
            <svg class="w-6 h-6 text-orange-500 fill-current drop-shadow-[0_0_8px_rgba(249,115,22,0.5)] transition" viewBox="0 0 24 24">
                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
            </svg>
        @else
            <svg class="w-6 h-6 text-purple-300/70 group-hover:text-orange-400 fill-none stroke-current stroke-2 transition" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
            </svg>
        @endif
    </a>
    @else
    <a href="{{ route('login') }}" class="cursor-pointer inline-flex items-center">
        <svg class="w-6 h-6 text-purple-400/40 fill-none stroke-current stroke-2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
        </svg>
    </a>
    @endauth
</div>