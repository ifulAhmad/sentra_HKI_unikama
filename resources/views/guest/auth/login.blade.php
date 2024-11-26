@extends('guest.partials.main')

@section('content')
    <div class="flex justify-center items-center min-h-96 py-10 text-gray-800">
        <div class="border border-gray-300 w-full md:w-[40%] rounded-md p-8 overflow-hidden shadow bg-white">

            <div class="flex items-center border-b border-gray-300 gap-4 pb-4 mb-4">
                <button type="button" id="login-btn"
                    class="w-full bg-indigo-600 text-white px-4 py-2 rounded-3xl font-semibold">Login</button>
                <button type="button" id="register-btn"
                    class="w-full bg-white px-4 py-2 rounded-3xl font-semibold">Register</button>
            </div>

            <div class="block" id="login-form">
                <h1 class="text-center my-4 text-lg font-semibold">Login Form</h1>
                <form class="w-full" action="#" class="w-full">
                    <div class="mb-3">
                        <label for="usernameOrEmail" class="block mb-2 text-sm font-medium">Username or Email</label>
                        <input type="text" name="usernameOrEmail" id="usernameOrEmail"
                            class="w-full p-2.5 rounded-lg outline-0 border border-gray-300 focus:border-indigo-600"
                            placeholder="Username or Email" required autofocus>
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
                    <a href="{{ route('auth.google') }}"
                        class="block flex justify-center items-center gap-3 border border-gray-300 px-4 py-2 rounded-lg duration-200 font-semibold duration-200 hover:bg-gray-100">
                        <img src="{{ asset('assets/images/google.png') }}" alt="google-logo" width="20px"> Login
                        With Google</a>
                </form>
            </div>
            <div class="hidden" id="register-form">
                <h1 class="text-center my-4 text-lg font-semibold">Register Form</h1>
                <form class="w-full" action="#" class="w-full">
                    <div class="mb-3">
                        <label for="usernameOrEmail" class="block mb-2 text-sm font-medium">Username or Email</label>
                        <input type="text" name="usernameOrEmail" id="usernameOrEmail"
                            class="w-full p-2.5 rounded-lg outline-0 border border-gray-300 focus:border-indigo-600"
                            placeholder="Username or Email" required>
                    </div>
                    <div class="mb-3">
                        <label for="r-password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                        <div class="relative flex items-center rounded-lg">
                            <input type="password" name="password" id="r-password" placeholder="*******"
                                class=" flex-1 w-full p-2.5 rounded-lg outline-0 border border-gray-300 focus:border-indigo-600"
                                required>
                            <button type="button" id="r-eye-btn" class="absolute right-2"><i
                                    class="bi bi-eye-fill"></i></button>
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900">Konfirmasi
                                Password</label>
                            <div class="relative flex items-center rounded-lg">
                                <input type="password" name="password" id="confirm_password" placeholder="*******"
                                    class=" flex-1 w-full p-2.5 rounded-lg outline-0 border border-gray-300 focus:border-indigo-600"
                                    required>
                                <button type="button" id="confirm-eye-btn" class="absolute right-2"><i
                                        class="bi bi-eye-fill"></i></button>
                            </div>
                        </div>
                        <button type="submit"
                            class="w-full bg-indigo-600 px-4 py-2 rounded-lg text-white duration-200 font-semibold hover:bg-indigo-700">Register</button>
                        <div class="flex items-center gap-2">
                            <hr class="w-full">
                            <p class="text-center my-3">or</p>
                            <hr class="w-full">
                        </div>
                        <a href="{{ route('auth.google') }}"
                            class="block flex justify-center items-center gap-3 border border-gray-300 px-4 py-2 rounded-lg duration-200 font-semibold duration-200 hover:bg-gray-100">
                            <img src="{{ asset('assets/images/google.png') }}" alt="google-logo" width="20px"> Login
                            With Google</a>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#login-btn').click(function() {
                $('#login-form').removeClass('hidden').addClass('block');
                $('#register-form').removeClass('block').addClass('hidden');
                $('#login-btn').addClass('bg-indigo-600 text-white').removeClass('bg-white');
                $('#register-btn').addClass('bg-white').removeClass('bg-indigo-600 text-white');
            })
            $('#register-btn').click(function() {
                $('#register-form').removeClass('hidden').addClass('block');
                $('#login-form').removeClass('block').addClass('hidden');
                $('#register-btn').addClass('bg-indigo-600 text-white').removeClass('bg-white');
                $('#login-btn').addClass('bg-white').removeClass('bg-indigo-600 text-white');
            })

            $('#eye-btn').click(function() {
                const isPassword = $('#password').attr('type') === 'password';
                $('#password').attr('type', isPassword ? 'text' : 'password');
                $(this).html(isPassword ? '<i class="bi bi-eye-slash-fill"></i>' :
                    '<i class="bi bi-eye-fill"></i>');
            });
            $('#r-eye-btn').click(function() {
                const isPassword = $('#r-password').attr('type') === 'password';
                $('#r-password').attr('type', isPassword ? 'text' : 'password');
                $(this).html(isPassword ? '<i class="bi bi-eye-slash-fill"></i>' :
                    '<i class="bi bi-eye-fill"></i>');
            });
            $('#confirm-eye-btn').click(function() {
                const isPassword = $('#confirm_password').attr('type') === 'password';
                $('#confirm_password').attr('type', isPassword ? 'text' : 'password');
                $(this).html(isPassword ? '<i class="bi bi-eye-slash-fill"></i>' :
                    '<i class="bi bi-eye-fill"></i>');
            });
        });
    </script>
@endsection
