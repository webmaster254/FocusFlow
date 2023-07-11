@extends('layouts.primary')

@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-7">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show position-relative active height-400 border-radius-lg" id="cam1" role="tabpanel" aria-labelledby="cam1">
                        <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100">
                            <span class="mask bg-gradient-dark"></span>
                            <div class=" position-relative z-index-1 d-flex flex-column h-100 p-3">
                                <h5 class="text-white font-weight-bolder mb-4 pt-2">{{__('Todays to-do')}}<span class="float-end"><a  href="/add-task" class="btn btn-outline-white rounded-circle p-2 mx-2 mb-0" type="button">
                                                <i class="fas fa-plus p-2"></i>
                                            </a></span></h5>
                                <ul class="list-group list-group-flush" data-toggle="checklist">
                                    @foreach($todos as $todo)


                                        <div class="checklist-item checklist-item-primary ps-2 ms-3 mb-3">
                                            <div class="d-flex align-items-center">
                                                <div class="form-check">
                                                    <input class="form-check-input  todo_checkbox" type="checkbox"
                                                           data-id="{{$todo->id}}"

                                                           @if($todo->completed) checked @endif

                                                    >
                                                </div>
                                                <h6 class="mb-0 text-white font-weight-bold text-sm">{{$todo->title}}</h6>

                                            </div>

                                        </div>

                                    @endforeach

                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 ms-auto mt-xl-0 mt-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card bg-gray-800">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="numbers">
                                        <p class="text-white text-sm mb-0 text-capitalize font-weight-bold opacity-7"></p>
                                        <h6 class="text-green font-weight-bolder mb-0">
                                            {{$today->format(config('app.date_time_format'))}}
                                        </h6>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6 ">
                        <div class="card bg-gray-800">
                            <div class="card-body text-center">
                                <h1 class="text-white"><span id="status1" countto="21">{{$total_goals}}</span> </h1>
                                <h6 class="mb-0 font-weight-bolder text-white">{{__('Goals')}}</h6>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-md-0 mt-4">
                        <div class="card bg-gray-800">
                            <div class="card-body text-center">
                                <h1 class="text-white"> <span id="status2" countto="44">{{$total_plans}}</span></h1>
                                <h6 class="text-white mb-0 font-weight-bolder">{{__('Plans')}}</h6>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="card bg-gray-800">
                            <div class="card-body text-center">
                                <h1 class="text-white"><span id="status3" countto="87">{{$total_notes}}</span></h1>
                                <h6 class="text-white mb-0 font-weight-bolder">{{__('Notes')}}</h6>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-md-0 mt-4">
                        <div class="card bg-gray-800">
                            <div class="card-body text-center">
                                <h1 class="text-white"><span id="status4" countto="417">{{$total_projects}}</span></h1>
                                <h6 class="text-white mb-0 font-weight-bolder">{{__('Projects')}}</h6>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card bg-gray-800 mt-4">
            <div class="card-header bg-gray-800 pb-0 p-3">
                <div class="d-flex  align-items-center">
                    <h6 class="text-white font-weight-bold mb-0">{{__('Recent Projects')}}</h6>

                </div>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead>
                    <tr>
                        <th class="text-uppercase text-white text-xs font-weight-bolder opacity-7">
                            {{__('Project Name')}}

                        </th>
                        <th class="text-uppercase  text-white text-center text-xs font-weight-bolder opacity-7">
                            {{__('Start Date')}}

                        </th>

                        <th class="text-center text-uppercase text-white text-xs font-weight-bolder opacity-7">{{__('End Date')}}</th>
                        <th></th>

                    </tr>
                    </thead>
                    <tbody>

                    @foreach($recent_projects as $project)
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="avatar avatar-sm me-3 bg-gradient-dark border-radius-md p-2">
                                        <h6 class="text-white">{{$project->title['0']}}</h6>
                                    </div>
                                    <a href="/view-project?id={{$project->id}}" class="d-flex flex-column justify-content-center">
                                        <h6 class="text-white mb-0 text-sm">{{$project->title}}</h6>


                                    </a>
                                </div>
                            </td>

                            <td class="align-middle text-center text-sm">
                                <span class="badge bg-blue font-weight-bold">@if(!empty($project->start_date))
                                        {{$project->start_date->format(config('app.date_format'))}}
                                    @endif</span>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <span class="badge bg-red font-weight-bold">@if(!empty($project->end_date))
                                        {{$project->end_date->format(config('app.date_format'))}}
                                    @endif</span>
                            </td>
                            <td>
                                <a class="btn btn-link text-dark float-end px-3 mb-0" href="/view-project?id={{$project->id}}"><i class="fas fa-file-alt text-dark me-2" aria-hidden="true"></i>{{__('View')}}</a>

                            </td>



                        </tr>



                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-5 ms-auto">
                <div class="card bg-gray-800">
                    <div class="card-header bg-gray-800 pb-0 p-3">
                        <div class="d-flex align-items-center">
                            <h6 class="text-white mb-0">{{__('Recent Events')}}</h6>

                        </div>
                    </div>

                    <div class="card">

                        <div class="card-body bg-gray-800 border-radius-lg p-3">

                            @foreach($recent_events as $event)

                                <div class="d-flex mt-4">
                                    <div>
                                        <div class="icon icon-shape bg-green shadow text-center border-radius-md shadow-none">
                                            <i class="ni ni-bell-55 text-lg text-dark  opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <div class="numbers">
                                            <h6 class="mb-1 text-white text-sm">{{$event->title}}</h6>

                                            <span class="text-sm text-white opacity-7">{{$event->start_date->format(config('app.date_time_format'))}}---
                                                <span class="text-sm text-white opacity-7">{{$event->end_date->format(config('app.date_time_format'))}}</span></span>




                                        </div>


                                    </div>


                                </div>

                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 ">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-header bg-gray-800 pb-0">
                                <h6 class="text-white">{{__('Goals')}}</h6>
                            </div>
                            <div class="card-body bg-gray-800 px-0 pt-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                        <tr>
                                            <th class="text-uppercase text-white text-xxs font-weight-bolder opacity-7">{{__('Name')}}</th>
                                            <th class="text-uppercase text-white text-xxs font-weight-bolder opacity-7 ps-2">{{__('Estimate Date to finish')}}</th>
                                            <th class="text-center float-end text-uppercase text-white text-xxs font-weight-bolder opacity-7">{{__('Completed?')}}</th>



                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($goals as $goal)
                                            <tr>
                                                <td>
                                                    <div class="text-white d-flex px-2 py-1">

                                                        <div class="d-flex text-white flex-column justify-content-center">
                                                            <h6 class="text-green mb-0 text-sm"><a href="/set-goal?id={{$goal->id}}">{{$goal->name}}</a></h6>

                                                        </div>
                                                    </div>
                                                </td>
                                                <td>

                                                    <span class="text-xs text-white font-weight-bold opacity-7">{{$goal->date->format(config('app.date_format'))}}</span>

                                                </td>

                                                <td class="align-right text-white text-sm">
                                                    <div class="form-check float-end ">
                                                        <input class="form-check-input goal_checkbox" type="checkbox"
                                                               data-id="{{$goal->id}}"

                                                               @if($goal->completed) checked @endif

                                                        >

                                                    </div>
                                                </td>


                                            </tr>
                                        @endforeach



                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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
    <script>

        $(function () {
            $('.goal_checkbox').on('change',function () {
                let that = $(this);
                if(this.checked)
                {
                    $.post('/goals/change-status',{
                        id: that.attr('data-id'),
                        status: 'Completed',
                        _token: '{{csrf_token()}}',
                    });
                }
                else{
                    $.post('/goals/change-status',{
                        id: that.attr('data-id'),
                        status: 'Not Completed',
                        _token: '{{csrf_token()}}',
                    });
                }
            });
        });
    </script>


@endsection



