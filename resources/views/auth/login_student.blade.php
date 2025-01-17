<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <!-- <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div> -->

        <!-- شماره دانشجویی -->
        <div class="mt-4">
            <x-input-label for="student_id" :value="__('شماره دانشجویی')" />
            <x-text-input id="student_id" class="block mt-1 w-full" type="number" name="student_id"
                :value="old('student_id')" required autofocus autocomplete="off" placeholder="شماره دانشجویی" min="0" />
            <x-input-error :messages="$errors->get('student_id')" class="mt-2" />
        </div>


        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('رمز عبور')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('منو به خاطر بسپار') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('رمزتو فراموش کردی دانشجو؟') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                <a href="{{ route('register', ['type' => 'student']) }}">

                    ثبت نام
                </a>

            </x-primary-button>
            <x-primary-button class="ms-3">
                {{ __('ورود') }}
            </x-primary-button>
        </div>
    </form>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const studentIdInput = document.getElementById('student_id');

            studentIdInput.addEventListener('input', () => {
                if (studentIdInput.value.length > 20) {
                    studentIdInput.value = studentIdInput.value.slice(0, 20);
                }
            });
        });
    </script>
</x-guest-layout>