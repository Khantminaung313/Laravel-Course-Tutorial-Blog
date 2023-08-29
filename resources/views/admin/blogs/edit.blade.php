<x-admin-layout>
    <h3 class="text-center my-2">Blog Edit Form</h3>

    <div class="container">
        <div class="mx-auto">
            <form action="/admin/blogs/{{$blog->slug}}/update" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <x-form.input name="title" value="{{$blog->title}}"/>
                <x-form.input name="intro" value="{{$blog->intro}}"/>
                <x-form.input name="slug" value="{{$blog->slug}}"/>
                <x-form.textarea name="body" value="{{$blog->body}}"/>
                <x-form.input name="thumbnail" type="file"/>
                <img src="/storage/{{$blog->thumbnail}}" width="200" height="100" alt="">

                <x-form.input-wrapper>
                    <x-form.label name="category" />
                    <select class="form-control" name="category_id" >
                        @foreach ($categories as $category)
                        <option {{$category->id == old('category_id', $blog->category->id) ? 'selected' : '' }} value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </x-form.input-wrapper>
                <x-errorMes name="category_id" />

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Post</button>
                </div>

            </form>
        </div>
    </div>
</x-admin-layout>