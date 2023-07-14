@extends('layouts.primary')
@section('content')
    <div class="container-fluid my-3 py-3">
        <div class="row mb-5">


            <div class="col-lg-8 mt-lg-0 ">
                <!-- Card Profile -->

                <!-- Card Basic Info -->





                <div class="card bg-gray-800" id="basic-info">
                    <div class="card-header bg-gray-800">

                        <div class="float-end">
                            <a  href="/goals" type="button" class="btn btn-sm bg-gradient-dark mt-4">
                                {{__('Goal List')}}
                            </a>

                        </div>
                        <h5 class="mt-4 text-white">{{$goal->name}}</h5>



                    </div>
                    <div class="card-body">
                        <div class="card-body pt-0">
                            <div class="row">

                                <div class="col text-white">
                                    <h6 class="text-white opacity-7">{{__('Date Created')}}</h6>
                                    <span>
                                            <div class="ms-auto">
                            <span class="badge badge-sm bg-gradient-dark">{{$goal->created_at->format(config('app.date_format'))}}</span>
                        </div>

                                        </span>
                                </div>
                                <div class="col">
                                    <h6 class="text-white opacity-7">{{__('Estimate Due Date')}}</h6>
                                    <span>
                                            <div class="ms-auto">
                            <span class="badge badge-sm bg-gradient-primary">{{$goal->date->format(config('app.date_format'))}}</span>
                        </div>

                                        </span>
                                </div>


                            </div>
                            <h6 class="mt-4 text-white opacity-7">{{__('Description')}}</h6>
                            <div class="d-flex bg-gray-700 border-radius-lg p-3 mb-4 text-white opacity-7">
                                <p class="my-auto text-white">
                                    <span class="text-white text-sm me-1">{!! $goal->description !!}</span>
                                </p>

                            </div>

                        </div>

                    </div>





                    </form>



                </div>


            </div>
            <div class="col-md-4">
                <div class="card bg-gray-800" id="additional_settings">
                    <div class="card-header bg-gray-800">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="mb-0 text-white">{{__('Goal Todo List')}}</h6>

                            </div>



                            <div class="col-md-6 d-flex justify-content-end ">
                                <a  href="/add-task?for=goal" type="button" class="btn btn-sm bg-gradient-dark mt-4">{{__('Add To-dos')}}</a>

                            </div>

                        </div>
                        <hr class="horizontal dark mb-0">
                    </div>
                    <div class="card-body p-3 pt-0">
                        <ul class="list-group list-group-flush" data-toggle="checklist">
                            @foreach($todos_goals as $todo)


                                <li class="list-group-item border-0 flex-column align-items-start ps-0 py-0 mb-3">
                                    <div class="checklist-item checklist-item-primary ps-2 ms-3">
                                        <div class="d-flex align-items-center">
                                            <div class="form-check">
                                                <input class="form-check-input todo_checkbox" type="checkbox"
                                                       data-id="{{$todo->id}}"

                                                       @if($todo->completed) checked @endif

                                                >
                                            </div>
                                            <h6 class="mb-0 text-dark font-weight-bold text-sm">{{$todo->title}}</h6>  <div class="float-end">

                                                <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="/delete/today-todo/{{$todo->id}}"><i class="far fa-trash-alt me-2"></i></a>
                                                <a class="btn btn-link text-dark px-3 mb-0" href="/add-task/?id={{$todo->id}}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i></a>
                                                </a>

                                            </div>

                                        </div>
                                        <div class="d-flex align-items-center ms-4 mt-3 ps-1">
                                            <div>
                                                <p class="text-xs mb-0 text-secondary font-weight-bold">{{__('Date')}}</p>
                                                <span class="text-xs font-weight-bolder">{{$todo->date}}</span>
                                            </div>

                                        </div>
                                    </div>

                                    <hr class="horizontal dark mt-4 mb-0">
                                </li>

                            @endforeach



                        </ul>
                    </div>
                </div>
            </div>

        </div>

        @endsection

        @section('script')


            <script>
                "use strict"
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
