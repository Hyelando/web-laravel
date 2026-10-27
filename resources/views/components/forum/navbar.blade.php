<nav class="flex items-center justify-between h-16 font-sans text-purple-100">
    <div>
        <a href="{{ route('home') }}" class="flex items-center gap-2">
            <x-forum.logo />
        </a>
    </div>
    
    <div class="flex items-center gap-6">
        <a href="{{ route('questions.index') }}" class="text-sm font-semibold text-purple-200 hover:text-orange-400 transition">Foro</a>
        <a href="#" class="text-sm font-semibold text-purple-300/80 hover:text-orange-400 transition">Blog</a>
    </div>

    <div class="flex items-center gap-4">
        @auth
            <span class="text-sm font-semibold text-purple-200">Welcome, <span class="text-orange-400">{{ auth()->user()->name }}</span></span>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="rounded-lg bg-orange-600 hover:bg-orange-500 px-3 py-1.5 text-xs font-semibold text-white shadow-md shadow-orange-600/20 cursor-pointer transition">
                    Log out
                </button>
            </form>
        @else      
            <a href="{{ route('login') }}" class="text-sm font-semibold text-purple-200 hover:text-orange-400 transition">
                Log in &rarr;
            </a>
        @endauth
    </div>
</nav>