@extends('admin.admin-layout')
@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Dashboard</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Blog</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-7 mx-auto">
            <h6 class="mb-0 text-uppercase">Edit Blog</h6>
            <hr>
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div>
                        </div>
                        <h5 class="mb-0 text-primary">Blog Details</h5>
                    </div>
                    <hr>
                    @include('components.validatation')
                    <form class="row g-3" method="POST" action="{{ route('admin-blogs.update',$blog->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-12">
                            <label for="title" class="form-label">Title*</label>
                            <input type="text" name="title" placeholder="Enter Title" class="form-control"
                                id="title" value="{{ old('title', $blog->title) }}">
                        </div>
                        <div class="col-md-12">
                            <label for="description" class="form-label">Description*</label>
                            <textarea type="text" name="description" placeholder="Enter Description" class="form-control" id="description">{{ old('description', $blog->description) }}</textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="short_description" class="form-label">Short Description</label>
                            <textarea type="text" name="short_description" placeholder="Enter Short Description" class="form-control"
                                id="short_description">{{ old('short_description', $blog->short_description) }}</textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="thumbnail" class="form-label">Thumbnail</label>
                            <input type="file" name="thumbnail" class="form-control" id="thumbnail"
                                value="{{ old('thumbnail') }}" accept="image/*">

                            @if (!empty($blog->thumbnail))
                                <img src="{{ $blog->thumbnail }}" alt="{{ $blog->title }}" style="width:120px;margin-top:10px">
                            @else
                                <img src="{{ asset('admin/assets/images/placeholder.jpg') }}" alt="{{ $blog->title }}"
                                    style="width:120px;margin-top:10px">
                            @endif
                        </div>

                        <div class="col-md-12">
                            <label for="category_id" class="form-label">Blog Category*</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">Select Blog Category</option>
                                @foreach ($categories as $category)
                                    <option @if (old('category_id', $blog->category_id) == $category->id) selected @endif value="{{ $category->id }}">
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label for="status" class="form-label">Status*</label>
                            <select name="status" id="status" class="form-control">
                                <option value="">Select Status</option>
                                <option @if($blog->status == 'active')  selected @endif value="active">Active</option>
                                <option @if($blog->status == 'inactive')  selected @endif value="inactive">Inactive</option>
                            </select>
                        </div>


                        <div class="col-12">
                            <button type="submit" class="btn btn-primary px-5">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
