<x-admin-layout>
    <h3 class="text-center my-2">Blog Create Form</h3>

    <div class="container">
        <div class="mx-auto">
            <form action="/admin/blogs/store" method="POST" enctype="multipart/form-data">
                @csrf
                <x-form.input name="title" />
                <x-form.input name="intro" />
                <x-form.input name="slug" />
                <x-form.textarea name="body"/>
                <x-form.input name="thumbnail" type="file"/>

                <x-form.input-wrapper>
                    <x-form.label name="category" />
                    <select class="form-control" name="category_id" >
                        @foreach ($categories as $category)
                        <option {{$category->id == old('category_id') ? 'selected' : '' }} value="{{$category->id}}">{{$category->name}}</option>
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