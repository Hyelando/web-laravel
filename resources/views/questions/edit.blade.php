<x-forum.layouts.app>

    <div class="max-w-2xl mx-auto my-8 bg-purple-950/40 p-6 rounded-xl font-sans text-purple-50">
        <form action="{{ route('questions.update', $question) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <h1 class="text-2xl font-bold tracking-tight text-purple-100 mb-4">Editar Pregunta</h1>

            @include('questions._form')

            <button type="submit" class="rounded-md bg-orange-600 hover:bg-orange-500 px-4 py-2 text-xs font-semibold text-white cursor-pointer transition">
                Actualizar
            </button>
        </form>
    </div>

</x-forum.layouts.app>