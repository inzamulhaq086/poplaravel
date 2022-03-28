@extends('backends.layouts.app')
@section('content')
    <section>
        <!-- Section Hero -->
        <div class="bg-green-100 py-14">
            <h3 class="text-2xl tracking-widest text-green-600 text-center">FEATURES</h3>
            <h1 class="mt-8 text-center text-5xl text-green-600 font-bold">Our Features & Services.</h1>

            <!-- Box -->
            <div class="md:flex md:justify-center md:space-x-8 md:px-14">
                @forelse ($blogs as $blog)
                    <!-- box-1 -->
                    <div
                        class="mt-16 py-4 px-4 w-1/3 bg-white rounded-xl shadow-lg hover:shadow-xl transform hover:scale-110 transition duration-500 mx-auto md:mx-0">
                        <div class="w-sm">
                            <img class="w-64" src="{{ asset('storage/' . $blog->images) }}" alt="" />
                            <div class="mt-4 text-green-600 text-center">
                                <h1 class="text-xl font-bold">{{ $blog->title }}</h1>
                                <p class="mt-4 text-gray-600">{{ $blog->discription }}</p>
                                <button
                                    class="mt-8 mb-4 py-2 px-14 rounded-full bg-green-600 text-white tracking-widest hover:bg-green-500 transition duration-200">MORE</button>
                                    <a href="{{route('blog.edit',$blog->id)}}" class="">Edit</a>
                                    <a href="{{route('blog.copypost',$blog->id)}}" class="">Copy</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="">No Data Found</div>
                @endforelse                
            </div>
            <div class="flex justify-center py-12">
              {{ $blogs->links() }}
          </div>
          <h4 class="text-center font-thin text-xl mt-14">Create Your Own Blog : <a
                  href="{{ route('blog.create') }}" class="underline text-gray-600 cursor-pointer">Click Here</a>
          </h4>
    </section>
@endsection
