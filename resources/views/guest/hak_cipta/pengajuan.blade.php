@extends('guest.partials.main')

@section('content')
    <div class="flex justify-center items-center min-h-96 ">
        <div class="bg-gradient-to-b from-yellow-500 to-orange-600 w-[70%] h-80 rounded-3xl overflow-hidden shadow-xl">
            <div class="flex justify-center items-center gap-8 flex-col w-full h-full bg-white bg-opacity-25">
                <a href="#" class="text-white hover:underline">
                    <h1 class="text-4xl md:text-7xl font-extrabold" style="text-shadow: 2px 2px 4px rgba(41, 35, 19, 0.5);">
                        Login Now &raquo;
                    </h1>
                </a>


                <div class="flex items-center gap-8">
                    <a href="#"
                        class="px-5 py-2 rounded-xl text-blue-700 font-semibold border-2 border-blue-700 hover:bg-blue-700 hover:text-white">&laquo;
                        ADMIN</a>
                    <a href="{{ route('profile.index') }}"
                        class="px-5 py-2 rounded-xl text-green-700 font-semibold border-2 border-green-700 hover:bg-green-700 hover:text-white">USERS
                        &raquo;</a>
                </div>
            </div>
        </div>
    </div>
@endsection
