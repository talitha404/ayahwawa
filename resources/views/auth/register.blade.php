<x-guest-layout>
    <div class="mx-auto w-full max-w-md">
        <div class="text-center">
            <a href="/" class="inline-flex items-center justify-center rounded-3xl bg-red-50 px-4 py-3 text-red-700 shadow-sm shadow-red-500/10 ring-1 ring-red-100 transition hover:bg-red-100">
                <x-application-logo class="h-10 w-10 text-red-600" />
                <span class="ms-3 text-lg font-semibold tracking-tight text-slate-900">Waprofit</span>
            </a>
            <h1 class="mt-8 text-3xl font-semibold tracking-tight text-slate-900">Buat akun baru</h1>
            <p class="mt-3 text-sm leading-6 text-slate-500">Daftar company dan mulai membuat dokumen formal operasional Anda.</p>
        </div>

        <div class="mt-10 rounded-3xl border border-slate-200 bg-slate-50/80 px-6 py-8 shadow-lg shadow-slate-900/5 ring-1 ring-slate-900/5">
            <form method="POST" action="{{ route('register') }}" x-data="{ showPassword: false, isSubmitting: false }" @submit="isSubmitting = true" class="space-y-6">
                @csrf

                <div>
                    <x-input-label for="name" :value="__('Name')" class="text-sm font-medium text-slate-700" />
                    <x-text-input id="name" class="mt-2 block w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-slate-900 placeholder:text-slate-400 focus:border-red-500 focus:outline-none focus:ring-2 focus:ring-red-200 transition" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-600" />
                </div>

                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-sm font-medium text-slate-700" />
                    <x-text-input id="email" class="mt-2 block w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-slate-900 placeholder:text-slate-400 focus:border-red-500 focus:outline-none focus:ring-2 focus:ring-red-200 transition" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
                </div>

                <div>
                    <x-input-label for="company" :value="__('Company Name')" class="text-sm font-medium text-slate-700" />
                    <x-text-input id="company" class="mt-2 block w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-slate-900 placeholder:text-slate-400 focus:border-red-500 focus:outline-none focus:ring-2 focus:ring-red-200 transition" type="text" name="company" :value="old('company')" required autocomplete="organization" />
                    <x-input-error :messages="$errors->get('company')" class="mt-2 text-sm text-red-600" />
                </div>

                <div>
                    <x-input-label for="password" :value="__('Password')" class="text-sm font-medium text-slate-700" />
                    <div class="relative mt-2">
                        <x-text-input id="password" class="block w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 pr-14 text-slate-900 placeholder:text-slate-400 focus:border-red-500 focus:outline-none focus:ring-2 focus:ring-red-200 transition" type="password" x-bind:type="showPassword ? 'text' : 'password'" name="password" placeholder="Minimal 8 karakter" required autocomplete="new-password" />
                        <button type="button" @click="showPassword = !showPassword" :aria-label="showPassword ? 'Sembunyikan password' : 'Tampilkan password'" class="absolute inset-y-0 end-0 inline-flex items-center rounded-r-2xl px-4 text-slate-500 hover:text-slate-900 focus:outline-none">
                            <svg x-show="!showPassword" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12s3.75-6.75 9.75-6.75S21.75 12 21.75 12 18 18.75 12 18.75 2.25 12 2.25 12Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 14.25a2.25 2.25 0 1 0 0-4.5 2.25 2.25 0 0 0 0 4.5Z" />
                            </svg>
                            <svg x-show="showPassword" x-cloak class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m3.98 8.223 1.803-1.803M3.98 8.223A10.477 10.477 0 0 0 2.25 12s3.75 6.75 9.75 6.75c1.993 0 3.68-.568 5.058-1.357M3.98 8.223l3.308 3.308m10.077 3.542 2.654 2.654M17.365 15.073l-3.308-3.308m3.308 3.308A10.449 10.449 0 0 0 21.75 12s-3.75-6.75-9.75-6.75a9.895 9.895 0 0 0-2.588.342m4.646 6.16a2.25 2.25 0 0 0-3.182-3.182" />
                            </svg>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
                </div>

                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-sm font-medium text-slate-700" />
                    <x-text-input id="password_confirmation" class="mt-2 block w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-slate-900 placeholder:text-slate-400 focus:border-red-500 focus:outline-none focus:ring-2 focus:ring-red-200 transition" type="password" x-bind:type="showPassword ? 'text' : 'password'" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-600" />
                </div>

                <button type="submit" :disabled="isSubmitting" class="inline-flex w-full items-center justify-center rounded-2xl bg-gradient-to-r from-red-600 to-red-700 px-4 py-3 text-sm font-semibold text-white shadow-lg shadow-red-500/20 transition hover:from-red-700 hover:to-red-800 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-70">
                    <span x-show="!isSubmitting">{{ __('Register') }}</span>
                    <span x-show="isSubmitting">{{ __('Mendaftar...') }}</span>
                </button>

                <div class="text-center text-sm text-slate-500">
                    <span>Sudah terdaftar?</span>
                    <a href="{{ route('login') }}" class="font-medium text-red-600 hover:text-red-800 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 rounded-lg">Masuk</a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
