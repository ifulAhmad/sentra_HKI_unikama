@extends('admins.partials.main')

@section('admin-content')
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
    <div class="p-4 min-h-64">
        <h1 class="text-lg font-semibold">Masukkan password untuk akses lebih lanjut</h1>
        <div class="bg-amber-600 h-[3px] rounded w-28 mt-2 mb-4"></div>
        <form action="" method="POST" class="flex justify-center md:mt-10">
            @csrf
            <div class="w-full md:w-[60%]">
                <div class="mb-3">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                    <div class="relative flex items-center rounded-lg">
                        <input type="password" name="password" id="password" placeholder="*******"
                            class=" flex-1 w-full p-2.5 rounded-lg outline-0 border border-gray-300 focus:border-indigo-600"
                            required>
                        <button type="button" id="eye-btn" class="absolute right-2"><i
                                class="bi bi-eye-fill"></i></button>
                    </div>
                    @error('password')
                        <div class="text-red-600 text-sm mt-1 ms-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="text-end">
                    <button
                        class="py-2 px-4 rounded-lg bg-indigo-600 text-white duration-100 hover:bg-indigo-700">Submit</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            setTimeout(() => {
                $('.notif-error').fadeOut();
            }, 10000);
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
