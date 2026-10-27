<x-layouts::auth :title="__('Iniciar sesión')">
    <div class="fixed inset-0 bg-purple-950 text-purple-100 flex items-center justify-center p-4 z-50 overflow-y-auto">
        <div class="max-w-md w-full flex flex-col gap-6 bg-purple-900/40 p-8 rounded-2xl border border-purple-800/60 shadow-2xl backdrop-blur-md my-auto">
            
            <div class="text-center space-y-2">
                <h1 class="text-2xl font-bold text-white">Inicia sesión en tu cuenta</h1>
                <p class="text-sm text-purple-300">Introduce tu correo electrónico y contraseña para continuar</p>
            </div>

            <!-- Estado de la sesión -->
            <x-auth-session-status class="text-center text-orange-400" :status="session('status')" />

            @if ($teamInvitation)
                <x-team-invitation-alert :invitation="$teamInvitation" :action="__('Iniciar sesión')" />
            @endif

            <form method="POST" action="{{ route('login.store') }}" class="flex flex-col gap-6">
                @csrf

                <!-- Correo electrónico -->
                <div class="flex flex-col gap-1.5">
                    <label class="text-sm font-medium text-white">Correo electrónico</label>
                    <flux:input
                        name="email"
                        :value="old('email')"
                        type="email"
                        required
                        autofocus
                        autocomplete="email"
                        placeholder="correo@ejemplo.com"
                    />
                </div>

                <!-- Contraseña -->
                <div class="relative flex flex-col gap-1.5">
                    <div class="flex justify-between items-center">
                        <label class="text-sm font-medium text-white">Contraseña</label>
                        @if (Route::has('password.request'))
                            <flux:link class="text-sm text-orange-400 hover:text-orange-300 transition" :href="route('password.request')" wire:navigate>
                                {{ __('¿Olvidaste tu contraseña?') }}
                            </flux:link>
                        @endif
                    </div>
                    <flux:input
                        name="password"
                        type="password"
                        required
                        autocomplete="current-password"
                        :placeholder="__('Contraseña')"
                        viewable
                    />
                </div>

                <!-- Recuérdame -->
                <div class="flex items-center gap-2">
                    <flux:checkbox name="remember" :checked="old('remember')" />
                    <span class="text-sm text-purple-200">Recuérdame</span>
                </div>

                <div class="flex items-center justify-end">
                    <flux:button variant="primary" type="submit" class="w-full bg-orange-600 hover:bg-orange-500 text-white font-semibold shadow-lg shadow-orange-600/20 transition cursor-pointer py-2.5 rounded-lg" data-test="login-button">
                        {{ __('Iniciar sesión') }}
                    </flux:button>
                </div>
            </form>

            <div class="space-x-1 text-sm text-center rtl:space-x-reverse text-purple-300 pt-2 border-t border-purple-800/60">
                <span>{{ __('¿No tienes una cuenta?') }}</span>
                <flux:link
                    :href="$teamInvitation ? route('register', ['invitation' => $teamInvitation['code']]) : route('register')"
                    data-test="register-link"
                    wire:navigate
                    class="text-orange-400 font-semibold hover:text-orange-300 transition"
                >
                    {{ __('Regístrate') }}
                </flux:link>
            </div>

        </div>
    </div>
</x-layouts::auth>