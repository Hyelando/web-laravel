<x-forum.layouts.app>

    <div class="bg-purple-950/40 p-6 rounded-xl font-sans text-purple-50 my-8">
        
        <div class="space-y-4">
            @foreach ($questions as $question)
                <div class="pb-4 border-b border-purple-800/40 last:border-0 last:pb-0">
                    <h2 class="text-xl font-bold text-purple-100 hover:text-orange-400 transition">
                        <a href="{{ route('questions.show', $question) }}">
                            {{ $question->title }}
                        </a>
                    </h2>
                    
                    <div class="flex gap-2 mt-1">
                        <p class="text-xs text-purple-300">
                            <span class="font-semibold text-purple-200">{{ $question->user->name }}</span> · 
                            <span class="text-orange-400 font-medium">{{ $question->category->name }}</span> · 
                            {{ $question->created_at->diffForHumans() }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        @if($questions->hasPages())
            <div class="mt-6 pt-4 border-t border-purple-800/40">
                {{ $questions->links() }}
            </div>
        @endif

    </div>

</x-forum.layouts.app>