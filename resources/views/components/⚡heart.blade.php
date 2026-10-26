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
    <div>
        <a wire:click="toggle" class="cursor-pointer">
            @if ($heartable->isHearted())
                
            <span class="text-red-600">&hearts;</span>
            @else
            <span class="text-gray-600">&hearts;</span>
            @endif
        </a>
    </div>

<!-- https://heroicons.dev/ (opcional): Heart -->
</div>