<?php

use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

new class extends Component
{
    public Model $commentable;
    public bool $showForm = false;
    public string $content = '';

    public function add(){
        $this->validate([
            'content' => 'required|string|max:255',
        ]);
        $this->commentable->comments()->create([
            'content' => $this->content,
            'user_id' => 1,
        ]);
        $this->reset('content','showForm');
    }

    public function render()
    {
        return view('components.⚡comment', [
            'comments' => $this->commentable->comments, 
        ]);
    }
    public function toggle(){
        $this->showForm = !$this->showForm;
    }
};
?>

<div>
    <ul class="my-4 space-y-2">
        @foreach ($comments as $comment)
        <li class="flex items-center gap-2">
            <p class="text-xs bg-white/10 p-4 rounded-md">
                <span class="text-gray-500">
                    {{ $comment->user->name }} | {{ $comment->created_at->diffForHumans() }}
                </span>
                <span class="text-gray-300">
                    {{ $comment->content }}
                </span>
            </p>
            <livewire:heart :heartable="$comment" wire:key="heart-comment-{{ $comment->id }}"/>
        </li>
        @endforeach
    </ul>

    @auth
        @if (!$showForm)
        <p class="text-gray-500">
            <a wire:click="toggle" class="rounded-md text-xs hover:underline cursor-pointer">
                Agregar comentario
            </a>
        </p>
        @else 
        <form wire:submit="add">
            <div class="flex gap-2">
                <input type="text" wire:model="content" class="w-full text-xs bg-gray-800 text-gray-200 border border-gray-700 rounded-md p-2 outline-none" placeholder="Escribe tu comentario aquí..." required autofocus>

                <button type="button" wire:click="toggle" class="text-xs text-gray-300 hover:underline cursor-pointer">Cancelar</button>
                <button type="submit" class="text-xs text-white bg-blue-600 hover:bg-blue-500 rounded-md px-2 py-1 cursor-pointer">
                    Comentar
                </button>
            </div>
            @error('content') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </form>
        @endif
            
    @endauth
</div>