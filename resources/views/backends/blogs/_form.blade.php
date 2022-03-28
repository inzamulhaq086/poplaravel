<div class="w-full  bg-gray-50 px-12 py-12">
    <input type="text" placeholder="Write your title" value="{{$blog->title}}" name="title" class="my-3 w-full border-gray-300" />
    @error('title')
        <div class="text-red-600">{{ $message }}</div>
    @enderror
    <textarea name="discription" placeholder="Discription" class="w-full border-gray-300">{{$blog->discription}}</textarea>
    @error('discription')
        <div class="text-red-600">{{ $message }}</div>
    @enderror
    <div class="w-full my-4">
        <label for="formFile" class="form-label inline-block mb-2 text-gray-700">Select Your Blog Image</label>
        <input
            class="form-control block w-full px-3 py-2 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300"
            type="file" name="images" id="formFile">
            <img src="{{ asset('storage/' . $blog->images) }}" alt="" srcset="">
        @error('images')
            <div class="text-red-600">{{ $message }}</div>
        @enderror
    </div>
    <button
        class="w-full   bg-blue-500 py-3 font-bold text-white hover:bg-blue-400 active:translate-y-[0.125rem] active:border-b-blue-400">
        {{ $button }}
    </button>
