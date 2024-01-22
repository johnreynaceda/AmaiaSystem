<div>
    <div class="fixed bg-gray-800 top-0 left-0 bottom-0  right-0">
        @if ($data->count() > 0)
            <img src="{{ Storage::url($data->first()->background_path) }}" class="h-full w-full opacity-50 object-cover"
                alt="">
        @else
            <img src="{{ asset('images/page_bg.jpg') }}" class="h-full w-full opacity-50 object-cover" alt="">
        @endif
    </div>
    <div>
        <div class="p-5 relative flex justify-center items-center 2xl:hidden">
            @if ($data->count() > 0)
                <img src="{{ Storage::url($data->first()->logo_path) }}" class="xl:h-24 h-20 relative z-10"
                    alt="">
            @else
                <img src="{{ asset('images/amaia_logo.png') }}" class="xl:h-24 h-20 relative z-10" alt="">
            @endif
        </div>

        <div class="p-5 relative  2xl:block hidden">
            @if ($data->count() > 0)
                <img src="{{ Storage::url($data->first()->logo_path) }}" class="xl:h-24 h-20 relative z-10"
                    alt="">
            @else
                <img src="{{ asset('images/amaia_logo.png') }}" class="xl:h-24 h-20 relative z-10" alt="">
            @endif
        </div>

        <section>
            <div class="2xl:py-24 py-10 bg-white">
                <div class="relative px-8">
                    <div class="max-w-3xl text-center lg:text-left">
                        <div class="max-w-xl mx-auto text-center lg:p-10 lg:text-left">
                            <div>
                                <p class="text-2xl font-black tracking-tight text-white sm:text-4xl">
                                    Hello,
                                </p>
                                <p class="text-2xl font-black tracking-tight text-white sm:text-5xl">
                                    Welcome Back!
                                </p>
                            </div>
                            <div
                                class="flex flex-col items-center mb-5 justify-center gap-3 mt-10 2xl:mt-16 lg:flex-row lg:justify-start">
                                <p class="text-gray-300">Please enter your {{ $data->first()->project_name ?? '' }}
                                    account.</p>

                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="flex flex-col space-y-5">
                                    <x-input class="2xl:h-12 " icon="user" placeholder="Email address" name="email"
                                        :value="old('email')" required autofocus autocomplete="username" />
                                    <x-inputs.password class="2xl:h-12 " icon="key" placeholder="Password"
                                        name="password" required autocomplete="current-password" />

                                </div>

                                <div class="flex justify-between items-center">
                                    <x-primary-button class="my-5">
                                        {{ __('Sign In') }}
                                    </x-primary-button>
                                    @if (Route::has('password.request'))
                                        <a class="underline text-sm text-white hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                            href="{{ route('password.request') }}">
                                            {{ __('Forgot your password?') }}
                                        </a>
                                    @endif
                                </div>

                            </form>
                            <div class="relative">
                                <div class="absolute inset-0 flex items-center">
                                    <div class="w-full border-t-2 border-gray-300"></div>
                                </div>
                            </div>
                            <div class="text-right my-5">
                                <span class="text-sm 2xl:text-md">Don't Have an Account? <a
                                        href="{{ route('register') }}"
                                        class="text-white hover:text-cyan-500 2xl:hover:text-main">Register
                                        here.</a></span>
                            </div>

                            <div class="text-left">
                                <span class="text-sm text-gray-200 2xl:text-md">Visiting? Please select and Fill up
                                    the form
                                    provided.</span>
                                <div class="mt-3 flex space-x-3 justify-center 2xl:justify-start items-center">
                                    <livewire:pass-request />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
