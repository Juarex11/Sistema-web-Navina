@extends('admin.index')

@section('content')

<main class="px-8 py-7 flex flex-col flex-1 overflow-y-auto">

    <div class="">
        <div class="max-w-7xl space-y-6">
            <div class="p-4 sm:p-6 bg-white shadow-md rounded-lg border border-neutral-200">
                <div class="max-w-xl">
                    @include('admin.profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-6 bg-white shadow-md rounded-lg border border-neutral-200">
                <div class="max-w-xl">
                    @include('admin.profile.partials.update-password-form')
                </div>
            </div>
        </div>
    </div>

</main>

@endsection