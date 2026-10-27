<x-forum.layouts.app>
    <br>
    <div class="bg-purple-950/40 p-6 rounded-xl font-sans text-purple-50">
        
        <div class="flex items-center gap-3 w-full mb-6">
            <livewire:heart :heartable="$question" />

            <div class="w-full">
                <h2 class="text-2xl font-bold md:text-3xl tracking-tight text-purple-100">
                    {{ $question->title }}
                </h2>

                <div class="flex justify-between items-center mt-1">
                    <p class="text-xs text-purple-300">
                        <span class="font-semibold text-purple-200">{{ $question->user->name }}</span> 
                        <span class="text-orange-400 font-medium">· {{ $question->category->name }}</span> 
                        · {{ $question->created_at->diffForHumans() }}
                    </p>

                    @auth
                    <div class="flex items-center gap-2">
                        @can('update',$question)
                        <a href="{{ route('questions.edit', $question) }}" class="text-xs font-semibold text-orange-400 hover:text-orange-300">
                            Editar
                        </a>
                        @endcan
                        
                        @can('delete',$question)
                        <form action="{{ route('questions.destroy', $question) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta pregunta?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="rounded bg-red-600/80 hover:bg-red-600 px-2 py-1 text-xs font-semibold text-white cursor-pointer">
                                Eliminar
                            </button>
                        </form>
                        @endcan
                    </div>
                    @endauth
                </div>
            </div>
        </div>

        <div class="my-4 space-y-4">
            <p class="text-purple-100 text-sm leading-relaxed">
                {{ $question->description }}
            </p>

            <livewire:comment :commentable="$question" />
        </div>
        
        <!-- Lista de Respuestas -->
        <ul class="space-y-4 my-6">
            @foreach ($question->answers as $answer)
            <li>
                <div class="flex items-start gap-3 pt-3 border-t border-purple-800/40">
                    <livewire:heart :heartable="$answer" wire:key="heart-answer-{{ $answer->id }}"/>
                    
                    <div class="w-full space-y-1">
                        <p class="text-sm text-purple-100">
                            {{ $answer->content }}
                        </p>
                        <p class="text-xs text-purple-300">
                            <span class="font-semibold text-purple-200">{{ $answer->user->name }}</span> · {{ $answer->created_at->diffForHumans() }}
                        </p>
                        
                        <!-- Comentarios de la Respuesta -->
                        <livewire:comment :commentable="$answer" wire:key="answer-comments-{{ $answer->id }}"/>
                    </div>
                </div>  
            </li>
            @endforeach
        </ul>

        <div class="mt-8 pt-4 border-t border-purple-800/40">
            @auth
            <h3 class="text-base font-semibold text-purple-200 mb-2">Tu Respuesta...</h3>

            <form action="{{ route('answer.store', $question) }}" method="POST">
                @csrf

                <div class="mb-3">
                    <textarea name="content" rows="4" class="w-full p-3 bg-purple-900/30 border border-purple-700/50 rounded-md text-sm text-purple-100 focus:outline-none focus:border-orange-500 placeholder-purple-400" placeholder="Escribe tu respuesta..." required></textarea>
                    @error('content')<span class="block text-orange-400 text-xs mt-1">{{ $message }}</span>@enderror
                </div>

                <button type="submit" class="rounded bg-orange-600 hover:bg-orange-500 px-4 py-2 text-xs font-semibold text-white cursor-pointer">
                    Enviar Respuesta
                </button>
            </form>
            @endauth
        </div>

    </div>

</x-forum.layouts.app>