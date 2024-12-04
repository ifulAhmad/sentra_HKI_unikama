@extends('guest.partials.main')

@section('content')
<div class="container">
    <div class="md:flex-row flex items-center justify-center flex-col gap-8 mb-8">
        <div class="text-center flex-1">
            <div class="w-full h-auto rounded-3xl overflow-hidden">
                <img src="{{ asset('assets/images/hero-hki-sementara-2.jpg') }}" alt="hero-image.jpg" width="100%">
            </div>
        </div>
        <div class="text-start w-full flex-1">
            <div class="rounded-lg p-3">
                <h1 class="text-5xl font-bold text-gray-800 flex flex-col gap-2">
                    <span>Ajukan</span>
                    <span>Kekayaan Intelektualmu!</span>
                </h1>
                <div class="bg-gray-800 h-[4px] rounded my-10"></div>
                <a href="{{ route('submission.index') }}"
                    class="px-5 py-3 rounded-2xl border-2 border-amber-600 text-lg text-gray-700 font-bold duration-200 hover:bg-amber-600 hover:text-white">Ajukan
                    &raquo;</a>
            </div>
        </div>
    </div>

    <div class="mb-3 md:px-16">
        <div class=" mx-3">
            <h1 class="font-bold text-2xl">FAQs</h1>
            <div class="bg-amber-600 w-28 h-[4px] rounded my-3"></div>
        </div>
        <div class="max-w-full mx-auto bg-white p-4 rounded-lg shadow-md">
            <!-- Item -->
            <div class="border-b border-gray-200">
                <button
                    class="w-full text-left py-4 text-lg font-medium text-gray-700 hover:text-amber-600 focus:outline-none flex justify-between items-center accordion-header">
                    <span>question 1</span>
                    <svg class="w-5 h-5 transform transition-transform duration-200 accordion-icon"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="accordion-content hidden p-4 text-gray-600">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laboriosam, est ex ut debitis at sunt
                    deleniti ea aspernatur sapiente laborum?
                </div>
            </div>
            <div class="border-b border-gray-200">
                <button
                    class="w-full text-left py-4 text-lg font-medium text-gray-700 hover:text-amber-600 focus:outline-none flex justify-between items-center accordion-header">
                    <span>question 2</span>
                    <svg class="w-5 h-5 transform transition-transform duration-200 accordion-icon"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="accordion-content hidden p-4 text-gray-600">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt sapiente placeat aperiam optio sit
                    delectus hic deleniti laboriosam, velit esse consectetur beatae praesentium quae perferendis illum
                    dignissimos aliquam enim odio veritatis corrupti, quia mollitia. Ipsam dolorum minus beatae, ipsa
                    delectus velit, distinctio quidem saepe, praesentium sed natus qui expedita odit!
                </div>
            </div>
            <div class="border-b border-gray-200">
                <button
                    class="w-full text-left py-4 text-lg font-medium text-gray-700 hover:text-amber-600 focus:outline-none flex justify-between items-center accordion-header">
                    <span>question 3</span>
                    <svg class="w-5 h-5 transform transition-transform duration-200 accordion-icon"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="accordion-content hidden p-4 text-gray-600">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi excepturi illo dolores harum
                    consectetur ea consequuntur.
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(".accordion-header").click(function() {
            $(this).next(".accordion-content").slideToggle(200);
            $(this).find(".accordion-icon").toggleClass("transform rotate-180");
        });
    });
</script>
@endsection