@extends('layouts.primary')
@section('content')



    <div class="row">
        <div class="col-md-5">
            <div class="card bg-gray-800">
                <div class="card-header bg-gray-800 text-green">
                    {{ __('  Add To-dos') }}
                    
                    <a href="/todos" type="submit" class="btn bg-gradient-secondary float-end">{{ __('Go to List') }}</a>
                </div>

                <div class="card-body bg-gray-800">
                    <form action="/save-todos" method="post">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="list-unstyled">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if($for === 'project')

                            <div class="mb-3">
                                <label class="text-white">Project</label>
                                <select class="form-select text-white bg-gray-700" name="project_id">
                                    <option value="">--</option>
                                    @foreach($projects as $project)

                                        <option value="{{$project->id}}">{{$project->title}}</option>

                                    @endforeach
                                </select>
                            </div>

                            @elseif($for === 'goal')
                                <label class="text-white ">Goal</label>
                                <select class="form-select bg-gray-700 text-white" name="goal_id">
                                    <option value="">--</option>
                                    @foreach($goals as $goal)

                                        <option value="{{$goal->id}}">{{$goal->name}}</option>

                                    @endforeach
                                </select>
                            @endif

                        <div class="form-group">
                            <label for="example-date-input" class="form-control-label text-white">{{ __('Date') }}</label>
                            <input class="form-control bg-gray-700 text-white" name="date" type="date" value="{{date('Y-m-d')}}" id="date">
                        </div>
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label text-white">{{ __('Task') }}</label><span class="text-danger">*</span>
                            <input class="form-control bg-gray-700 text-white"  name="title" type="text" id="title" @if (!empty($todo)) value="{{$todo->title}}"@endif>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="text-white">{{ __('Description') }}</label><span class="text-danger">*</span>
                            <textarea class="form-control" name="description" id="description" rows="3">@if (!empty($todo)) {{$todo->description}}@endif  </textarea>
                        </div>

                        @csrf
                        @if($todo)
                            <input type="hidden" name="id" value="{{$todo->id}}">
                        @endif
                        <button type="submit" class="btn bg-gradient-success">{{ __('Save') }}</button>
                        <button type="button" class="btn bg-gradient-secondary">{{ __('Close') }}</button>
                    </form>

                </div>

            </div>
        </div>




        @if($for === 'project')

            <div class="col-md-7">
                <div class="card bg-gray-80">
                    <div class="card-header bg-gray-800 p-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="mb-0 text-green">{{ __('Project Todo list') }}</h6>
                            </div>

                        </div>
                        <hr class="horizontal light mb-0">
                    </div>
                    <div class="card-body bg-gray-800 p-3 pt-0">
                        <ul class="list-group list-group-flush" data-toggle="checklist">
                            @foreach($todos_projects as $todo)


                                <li class="list-group-item border-0 flex-column align-items-start ps-0 py-0 mb-3 bg-gray-800">
                                    <div class="checklist-item checklist-item-primary ps-2 ms-3 bg-gray-800">
                                        <div class="d-flex align-items-center">


                                            <div class="form-check">
                                                <input class="form-check-input todo_checkbox" type="checkbox"
                                                       data-id="{{$todo->id}}"

                                                       @if($todo->completed) checked @endif

                                                >

                                            </div>
                                            <h6 class="mb-0 text-white font-weight-bold text-sm">{{$todo->title}}</h6>
                                            <div class="dropdown float-lg-end ms-auto pe-4">
                                                <a href="javascript:;" class="cursor-pointer" id="dropdownTable2" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="/delete/today-todo/{{$todo->id}}"><i class="far fa-trash-alt me-2"></i>{{__('Delete')}}</a>
                                                    <a class="btn btn-link text-white px-3 mb-0" href="/add-task/?id={{$todo->id}}"><i class="fas fa-pencil-alt text-white me-2" aria-hidden="true"></i>{{__('Edit')}}</a>
                                                    <a class="btn btn-link text-green px-3 mb-0" href="/view-todo/?id={{$todo->id}}"><i class="fas fa-file-alt text-green me-2" aria-hidden="true"></i>{{__('view')}}</a>
                                                </a>

                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center ms-4 mt-3 ps-1">
                                            <div>
                                                <p class="text-xs mb-0 text-white opacity-7 font-weight-bold">Date</p>
                                                <span class="text-xs font-weight-bolder">{{$todo->date->format(config('app.date_format'))}}</span>
                                            </div>

                                        </div>
                                    </div>
                                    <hr class="horizontal light mt-4 mb-0">
                                </li>

                            @endforeach



                        </ul>
                    </div>
                </div>

            </div>

        @elseif($for === 'goal')
            <div class="col-md-7">
                <div class="card bg-gray-800">
                    <div class="card-header bg-gray-800 p-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="mb-0 text-green">{{__('Goal Todo list')}}</h6>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end align-items-center">

                            </div>
                        </div>
                        <hr class="horizontal light mb-0" color="red" size="10">
                    </div>
                    <div class="card-body bg-gray-800 p-3 pt-0">
                        <ul class="list-group list-group-flush" data-toggle="checklist">
                            @foreach($todos_goals as $todo)


                                <li class="list-group-item border-0 flex-column align-items-start ps-0 py-0 mb-3 bg-gray-800">
                                    <div class="checklist-item checklist-item-primary ps-2 ms-3">
                                        <div class="d-flex align-items-center">
                                            <div class="form-check">
                                                <input class="form-check-input todo_checkbox" type="checkbox"
                                                       data-id="{{$todo->id}}"

                                                       @if($todo->completed) checked @endif
                                                >
                                            </div>
                                            <h6 class="mb-0 text-white font-weight-bold text-sm">{{$todo->title}}</h6>
                                            <div class="dropdown float-lg-end ms-auto pe-4">
                                                <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="/delete/today-todo/{{$todo->id}}"><i class="far fa-trash-alt me-2"></i>{{__('Delete')}}</a>
                                                <a class="btn btn-link text-white px-3 mb-0" href="/add-task/?id={{$todo->id}}"><i class="fas fa-pencil-alt text-white me-2" aria-hidden="true"></i>{{__('Edit')}}</a>
                                                <a class="btn btn-link text-green px-3 mb-0" href="/view-todo/?id={{$todo->id}}"><i class="fas fa-file-alt text-green me-2" aria-hidden="true"></i>{{__('view')}}</a>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center ms-4 mt-3 ps-1">
                                            <div>
                                                <p class="text-xs mb-0 text-secondary font-weight-bold">{{__('Date')}}</p>
                                                <span class="text-xs font-weight-bolder">{{$todo->date->format(config('app.date_format'))}}</span>
                                            </div>

                                        </div>

                                    </div>

                                    <hr class="horizontal light mt-4 mb-0">
                                </li>

                            @endforeach



                        </ul>
                    </div>
                </div>

            </div>


        @elseif($for === null)
            <div class="col-md-7">
                <div class="card bg-gray-800">
                    <div class="card-header bg-gray-800 p-3">
                        <h6 class="mb-0 text-green">{{__('To do list')}}</h6>
                        <hr class="horizontal light mb-0">
                    </div>
                    <div class="card-body bg-gray-800 p-3 pt-0">
                        <ul class="list-group list-group-flush" data-toggle="checklist">
                            @foreach($todos as $todo)


                                <li class="list-group-item border-0 flex-column align-items-start ps-0 py-0 mb-3 bg-gray-800">
                                    <div class="checklist-item checklist-item-primary ps-2 ms-3">
                                        <div class="d-flex align-items-center">
                                            <div class="form-check">
                                                <input class="form-check-input todo_checkbox" type="checkbox"
                                                data-id="{{$todo->id}}"

                                                       @if($todo->completed) checked @endif

                                                >
                                            </div>
                                            <h6 class="mb-0 text-white font-weight-bold text-sm">{{$todo->title}}</h6>
                                            <div class="dropdown float-lg-end ms-auto pe-4">
                                                <a href="javascript:;" class="cursor-pointer" id="dropdownTable2" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="/delete/today-todo/{{$todo->id}}"><i class="far fa-trash-alt me-2"></i>{{__('Delete')}}</a>
                                                    <a class="btn btn-link text-white px-3 mb-0" href="/add-task/?id={{$todo->id}}"><i class="fas fa-pencil-alt text-white me-2" aria-hidden="true"></i>{{__('Edit')}}</a>
                                                    <a class="btn btn-link text-white px-3 mb-0" href="/view-todo/?id={{$todo->id}}"><i class="fas fa-file-alt text-success me-2" aria-hidden="true"></i>{{__('view')}}</a>
                                                </a>

                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center ms-4 mt-3 ps-1">
                                            <div>
                                                <p class="text-xs mb-0 text-secondary font-weight-bold">{{__('Date')}}</p>
                                                <span class="text-xs font-weight-bolder">{{$todo->date->format(config('app.date_format'))}}</span>
                                            </div>

                                        </div>
                                    </div>
                                    <hr class="horizontal light mt-4 mb-0">
                                </li>

                            @endforeach



                        </ul>
                    </div>
                </div>

            </div>





        @endif



    </div>






@endsection


@section('script')


    <script>
        "use strict";
        $(function () {


            flatpickr("#date", {

                dateFormat: "Y-m-d",
            });



        });




    </script>

    <script>
        tinymce.init({
            selector: '#description',


            plugins: 'table,code',
            skin: 'oxide-dark',
            content_css : 'dark'


        });
    </script>
    <script>
        $(function () {
            $('.todo_checkbox').on('change',function () {
                let that = $(this);
                if(this.checked)
                {
                   $.post('/todos/change-status',{
                       id: that.attr('data-id'),
                       status: 'Completed',
                       _token: '{{csrf_token()}}',
                   });
                }
                else{
                    $.post('/todos/change-status',{
                        id: that.attr('data-id'),
                        status: 'Not Completed',
                        _token: '{{csrf_token()}}',
                    });
                }
            });
        });
    </script>


@endsection




