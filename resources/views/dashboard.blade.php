@extends('layouts.app')

@section('content')

<div x-data="{ sidebarOpen: true }" class="min-h-screen flex">

    <aside class="text-white h-screen fixed left-0 top-0 transition-all duration-300"
           :class="sidebarOpen ? 'w-64' : 'w-0 overflow-hidden'">

        @include('layouts.sidebar')

    </aside>

    <div class="flex-1 h-screen overflow-y-auto transition-all duration-300"
         :class="sidebarOpen ? 'ml-64' : 'ml-0'">

        <button @click="sidebarOpen = !sidebarOpen"
                class="fixed top-1/4 z-50 bg-white px-2 py-2 rounded-full transition-all duration-300 border border-gray-300"
                :class="sidebarOpen ? 'left-60' : 'left-1'">
            <
        </button>

        @include('layouts.navigation')

        <main class="p-6">
            @yield('dashboard')
        </main>

    </div>

</div>

@endsection