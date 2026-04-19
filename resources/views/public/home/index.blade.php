@extends('app')

@section('content')

@include('public.home.modals.register')

<section>

  @include('public.home.partials.banner')

  <div class="max-w-300 p-10 flex flex-col gap-10 mx-auto "
    id="body">

    @include('public.home.partials.features')

    @include('public.home.partials.categories')

    @include('public.home.partials.services')

    @include('public.home.partials.blogs')

  </div>

</section>

@endsection