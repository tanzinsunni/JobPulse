@extends('company.company-layout')
@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Dashboard</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add new job</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-7 mx-auto">
            <h6 class="mb-0 text-uppercase">Create New Job</h6>
            <hr>
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div>
                        </div>
                        <h5 class="mb-0 text-primary">Job Details</h5>
                    </div>
                    <hr>
                    @include('components.validatation')
                    <form class="row g-3" method="POST" action="{{ route('jobs.store') }}">
                        @csrf
                        <div class="col-md-12">
                            <label for="title" class="form-label">Title*</label>
                            <input type="text" name="title" placeholder="Enter Title" class="form-control"
                                id="title" value="{{ old('title') }}">
                        </div>
                        <div class="col-md-12">
                            <label for="description" class="form-label">Description*</label>
                            <textarea type="text" name="description" placeholder="Enter Description" class="form-control" id="description">{{ old('description') }}</textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="requirements" class="form-label">Required Knowledge & Abilities*</label>
                            <textarea type="text" name="requirements" placeholder="Enter Requirements" class="form-control" id="requirements">{{ old('requirements') }}</textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="skills" class="form-label">Required Skills* (Comma seperated value)</label>
                            <textarea type="text" name="skills" placeholder="Enter Skills" class="form-control" id="skills">{{ old('skills') }}</textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="location" class="form-label">Office Location*</label>
                            <input type="text" name="location" placeholder="Enter Office Location" class="form-control"
                                id="location" value="{{ old('location') }}">
                        </div>
                        <div class="col-md-12">
                            <label for="salary" class="form-label">Salary*</label>
                            <input type="text" name="salary" placeholder="Enter Salary (Range Or Fixed)"
                                class="form-control" id="salary" value="{{ old('salary') }}">
                        </div>
                        <div class="col-md-12">
                            <label for="job_type" class="form-label">Job Type*</label>
                            <select name="job_type" id="job_type" class="form-control">
                                <option>Select Job Type</option>
                                <option @if (old('job_tyle') == 'Remote') selected @endif value="remote">Remote</option>
                                <option @if (old('job_tyle') == 'office ') selected @endif value="office">Office</option>
                                <option @if (old('job_tyle') == 'hybrid') selected @endif value="hybrid">Hybrid</option>
                            </select>
                        </div>


                        <div class="col-md-12">
                            <label for="vacancy" class="form-label">Vacancy</label>
                            <input type="text" name="vacancy" placeholder="Enter Vacancy" class="form-control"
                                id="vacancy" value="{{ old('vacancy') }}">
                        </div>

                        <div class="col-md-12">
                            <label for="job_nature" class="form-label">Job Nature*</label>
                            <select name="job_nature" id="job_nature" class="form-control">
                                <option>Select Job Nature</option>
                                <option @if (old('Full Time') == 'Remote') selected @endif value="Full Time">Full Time
                                </option>
                                <option @if (old('Part Time') == 'Remote') selected @endif value="Part Time">Part Time
                                </option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="deadline" class="form-label">Deadline*</label>
                            <input type="date" name="deadline" class="form-control" id="deadline"
                                value="{{ !empty(old('deadline')) ? date('Y-m-d', strtotime(old('deadline'))) : '' }}">
                        </div>

                        <div class="col-md-12">
                            <label for="category_id" class="form-label">Job Category*</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">Select Job Category</option>
                                @foreach ($job_categories as $job_category)
                                    <option @if (old('category_id') == $job_category->id) selected @endif
                                        value="{{ $job_category->id }}">{{ $job_category->name }}</option>
                                @endforeach
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
