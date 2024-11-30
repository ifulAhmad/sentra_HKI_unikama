@extends('guest.partials.main')

@section('content')
    @if (session()->has('error'))
        <div
            class="notif-error fixed end-3 top-28 min-w-[400px] text-sm rounded-md bg-red-100 text-red-600 border border-red-400">
            <div class="relative p-4 flex justify-between gap-2">
                <p class="flex items-center gap-2"><i class="bi bi-exclamation-circle-fill"></i>
                    {{ session()->get('error') }}
                </p>
                <button type="button" id="notif-error" class="text-xl absolute right-2 text-red-400 bottom-7"><i
                        class="bi bi-x"></i></button>
            </div>
        </div>
    @endif
    <div class="flex justify-center items-center min-h-96 py-10 text-gray-800">
        <div class="border border-gray-300 w-full md:w-[40%] rounded-md p-8 overflow-hidden shadow bg-white">
            <h1 class="text-center mb-4 text-xl font-bold">Login</h1>
            <form class="w-full" method="post" action="{{ route('authenticate') }}">
                @csrf
                <div class="mb-3">
                    <label for="username" class="block mb-2 text-sm font-medium">User</label>
                    <input type="text" name="username" id="username"
                        class="w-full p-2.5 rounded-lg outline-0 border border-gray-300 @error('username') border-red-600 @enderror focus:border-indigo-600"
                        placeholder="User" required autofocus>
                    @error('username')
                        <div class="text-red-600 text-sm mt-1 ms-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                    <div class="relative flex items-center rounded-lg">
                        <input type="password" name="password" id="password" placeholder="*******"
                            class=" flex-1 w-full p-2.5 rounded-lg outline-0 border border-gray-300 focus:border-indigo-600"
                            required>
                        <button type="button" id="eye-btn" class="absolute right-2"><i
                                class="bi bi-eye-fill"></i></button>
                    </div>
                </div>
                <button type="submit"
                    class="w-full bg-indigo-600 px-4 py-2 rounded-lg text-white duration-200 font-semibold hover:bg-indigo-700">Login</button>
                <div class="flex items-center gap-2">
                    <hr class="w-full">
                    <p class="text-center my-3">or</p>
                    <hr class="w-full">
                </div>
            </form>
            <a href="{{ route('auth.google') }}"
                class="block flex justify-center items-center gap-3 border border-indigo-600 px-4 py-2 rounded-lg duration-200 font-semibold duration-200 hover:bg-indigo-600 hover:text-white">
                <img src="{{ asset('assets/images/google.png') }}" alt="google-logo" width="20px">Login
                With Google</a>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            setTimeout(() => {
                $('.notif-error').fadeOut();
            }, 5000);
            $('#notif-error').click(function() {
                $('.notif-error').addClass('hidden');
            });

            $('#eye-btn').click(function() {
                const isPassword = $('#password').attr('type') === 'password';
                $('#password').attr('type', isPassword ? 'text' : 'password');
                $(this).html(isPassword ? '<i class="bi bi-eye-slash-fill"></i>' :
                    '<i class="bi bi-eye-fill"></i>');
            });
        });
    </script>
@endsection
