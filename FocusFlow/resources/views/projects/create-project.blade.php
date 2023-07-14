@extends('layouts.primary')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <form action="/save-project" method="post">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="col-lg-9 col-12 mx-auto">
                    <div class="card card-body bg-gray-800 mt-4">
                        <h6 class="mb-0 text-green">{{__('New Project')}}</h6>
                        <p class="text-sm mb-0 text-white opacity-7">{{__('Create new project')}}</p>
                        <hr class="horizontal dark my-3">


                        <label for="projectName" class="form-label text-white ">{{__('Project Name')}}</label>
                        <input type="text"@if (!empty($project)) value="{{$project->title}}"@endif   name="title" class="form-control bg-gray-700 text-white" id="projectName">

                        <label class="mt-4 text-sm mb-0 text-white">{{__('Project Summary')}}</label>
                        <p class="form-text text-white opacity-7 text-xs ms-1 ">
                            {{__('Write a short summary of the project.Within 225 words')}}
                        </p>

                        <div class="form-group">


                            <textarea name="summary" class="form-control bg-gray-700 text-white" rows="4" id="editor" name="budget">@if (!empty($project)){{$project->summary}}@endif</textarea>
                        </div>

                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label text-white">
                                {{__('Status')}}

                            </label><span class="text-danger">*</span>

                            <select class="form-select bg-gray-700 text-white opacity-7" aria-label="Default select example" name="status">


                                <option value="Pending"
                                @if(($project->status ?? null) === 'Pending') selected @endif>{{__('Pending')}}</option>
                                <option value="Started"
                                        @if(($project->status ?? null) === 'Started') selected @endif>{{__('Started')}}</option>
                                <option value="Finished"
                                        @if(($project->status ?? null) === 'Finished') selected @endif>{{__('Finished')}}</option>
                            </select>
                        </div>


                        <div class="row mt-4">
                            <div class="col-6">
                                <label class="form-label text-white opacity-7">{{__('Start Date')}}</label>
                                <input class="form-control bg-gray-700 text-white " name="start_date" id="start_date" @if(!empty($project))value="{{$project->start_date}}"
                                       @else
                                       value="{{date('Y-m-d')}}"
                                    @endif>
                            </div>
                            <div class="col-6">
                                <label class="form-label text-white">{{__('End Date')}}</label>
                                <input class="form-control bg-gray-700 text-white opacity-7" name="end_date"  id="end_date"  @if(!empty($project))
                                value="{{$project->end_date}}"
                                       @else
                                       value="{{date('Y-m-d')}}"
                                    @endif>
                            </div>
                        </div>




                        <label class="mt-4 text-sm mb-0 text-white">{{__('Project Description')}}</label>
                        <p class="form-text text-white opacity-7 text-xs ms-1">
                            {{__('Write a well organised description of the project.')}}
                        </p>

                        <div class="form-group">
                            <textarea class="form-control" rows="10" id="description" name="description">@if (!empty($project)){{$project->description}}@endif
                            </textarea>
                        </div>
                    @csrf
                        @if($project)
                            <input type="hidden" name="id" value="{{$project->id}}">
                        @endif

                        <div class="d-flex  mt-4">

                            <button type="submit" name="button" class="btn bg-green m-0 ">
                                {{__('Save')}}
                            </button>
                            <a href="/projects" type="button" class="btn bg-gradient-secondary m-0">
                    {{__('Close')}}

</a>
                        </div>
                    </div>
                </div>

            </form>

        </div>

    </div>
@endsection

@section('script')

    <script>
        "use strict";
        $(function () {


            flatpickr("#start_date", {

                dateFormat: "Y-m-d",
            });

            flatpickr("#end_date", {

                dateFormat: "Y-m-d",
            });


            tinymce.init({
                selector: '#description',


                plugins: 'table,code',
                skin: 'oxide-dark',
            content_css : 'dark'


            });

        });


    </script>

@endsection

