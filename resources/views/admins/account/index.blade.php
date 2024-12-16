@extends('admins.partials.main')

@section('admin-content')
    @if (session()->has('success'))
        <div
            class="notif-success z-[999] fixed end-3 top-20 min-w-[400px] text-sm rounded-md text-green-600 bg-green-100 border border-green-400">
            <div class="relative p-4 flex justify-between gap-2">
                <p class="flex items-center gap-2"><i class="bi bi-check-circle-fill"></i> {{ session()->get('success') }}</p>
                <button type="button" id="notif-success" class="text-xl absolute right-2 text-green-400 bottom-7"><i
                        class="bi bi-x"></i></button>
            </div>
        </div>
    @endif
    @if (session()->has('error'))
        <div
            class="notif-error fixed end-3 top-20 min-w-[400px] text-sm rounded-md bg-red-100 text-red-600 border border-red-400">
            <div class="relative p-4 flex justify-between gap-2">
                <p class="flex items-center gap-2"><i class="bi bi-exclamation-circle-fill"></i>
                    {{ session()->get('error') }}
                </p>
                <button type="button" id="notif-error" class="text-xl absolute right-2 text-red-400 bottom-7"><i
                        class="bi bi-x"></i></button>
            </div>
        </div>
    @endif
    <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Ubah Password</h2>
        <form method="POST" action="{{ route('admin.change.account.update', $user->id) }}" class="flex flex-col gap-4">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="current_password" class="block mb-2 text-sm font-medium text-gray-900">Password Lama</label>
                <div class="relative flex items-center rounded-lg">
                    <input type="password" name="current_password" id="current_password" placeholder="*******"
                        class="flex-1 w-full p-2.5 rounded-lg outline-0 border border-gray-300 focus:border-indigo-600"
                        required>
                    <button type="button" id="eye-btn-current" class="absolute right-2">
                        <i class="bi bi-eye-fill"></i>
                    </button>
                </div>
            </div>
            <div class="mb-3">
                <label for="new_password" class="block mb-2 text-sm font-medium text-gray-900">Password Baru</label>
                <div class="relative flex items-center rounded-lg">
                    <input type="password" name="new_password" id="new_password" placeholder="*******"
                        class="flex-1 w-full p-2.5 rounded-lg outline-0 border border-gray-300 focus:border-indigo-600"
                        required>
                    <button type="button" id="eye-btn-new" class="absolute right-2">
                        <i class="bi bi-eye-fill"></i>
                    </button>
                </div>
            </div>
            <div class="mb-3">
                <label for="new_password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">Konfirmasi
                    Password Baru</label>
                <div class="relative flex items-center rounded-lg">
                    <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                        placeholder="*******"
                        class="flex-1 w-full p-2.5 rounded-lg outline-0 border border-gray-300 focus:border-indigo-600"
                        required>
                    <button type="button" id="eye-btn-confirm" class="absolute right-2">
                        <i class="bi bi-eye-fill"></i>
                    </button>
                </div>
            </div>
            <div class="flex justify-end">
                <button type="submit"
                    class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            setTimeout(() => {
                $('.notif-success').fadeOut();
            }, 5000);
            $('#notif-success').click(function() {
                $('.notif-success').addClass('hidden');
            });
            setTimeout(() => {
                $('.notif-error').fadeOut();
            }, 5000);
            $('#notif-error').click(function() {
                $('.notif-error').addClass('hidden');
            });


            function togglePassword(inputId, eyeBtnId) {
                var inputField = $(inputId);
                var eyeBtn = $(eyeBtnId);
                var type = inputField.attr('type');
                if (type === 'password') {
                    inputField.attr('type', 'text');
                    eyeBtn.html('<i class="bi bi-eye-slash-fill"></i>');
                } else {
                    inputField.attr('type', 'password');
                    eyeBtn.html('<i class="bi bi-eye-fill"></i>');
                }
            }
            $('#eye-btn-current').on('click', function() {
                togglePassword('#current_password', '#eye-btn-current');
            });
            $('#eye-btn-new').on('click', function() {
                togglePassword('#new_password', '#eye-btn-new');
            });
            $('#eye-btn-confirm').on('click', function() {
                togglePassword('#new_password_confirmation', '#eye-btn-confirm');
            });
        });
    </script>
@endsection
