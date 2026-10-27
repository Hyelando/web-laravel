<x-forum.layouts.home>

    <div class="bg-purple-950/100 p-6 rounded-xl font-sans text-purple-50 my-8">
        <ul class="divide-y divide-purple-800/30">
            @foreach ($questions as $question)
            <li class="flex justify-between items-center gap-4 py-4 first:pt-0 last:pb-0">
                <div class="flex items-center gap-3">
                    <div class="w-3 h-3 rounded-full shrink-0 shadow-sm" style="background-color: {{ $question->category->color }};"></div>
                    
                    <div class="space-y-0.5">
                        <p class="text-sm font-semibold text-purple-100">
                            <a href="{{ route('questions.show', $question) }}" class="hover:text-orange-400 transition">
                                {{ $question->title }}
                            </a>
                        </p>
                        <p class="text-xs text-purple-300/70">{{ $question->user->name }}</p>
                    </div>
                </div>
        
                <div class="hidden sm:flex sm:flex-col sm:items-end text-right">
                    <span class="text-xs font-medium text-orange-400 bg-orange-950/30 px-2.5 py-0.5 rounded-full border border-orange-800/20">
                        {{ $question->category->name }}
                    </span>
                    <p class="mt-1 text-xs text-purple-300/60">{{ $question->created_at->diffForHumans() }}</p>
                </div>
            </li>
            @endforeach
        </ul>
    </div>

</x-forum.layouts.home>