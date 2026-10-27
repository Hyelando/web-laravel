<nav class="flex items-center justify-between h-16">
    <div>
        <a href="{{ route('home') }}">
            <x-forum.logo />
        </a>
    </div>
    
    <div class="flex gap-4">
        <a href="{{ route('questions.index') }}" class="text-sm font-semibold">Foro</a>
        <a href="#" class="text-sm font-semibold">Blog</a>
    </div>
    

    <div class="flex items-center gap-4">
        @auth
            <span class="text-sm font-semibold">Welcome, {{ auth()->user()->name }}</span>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="rounded-full bg-gray-950 px-2 py-1 text-sm font-medium text-white ">Log out</button>
            </form>
        @else		
            <a href="{{ route('login') }}" class="text-sm font-semibold">Log in &rarr;</a>
        @endauth
    </div>
</nav>