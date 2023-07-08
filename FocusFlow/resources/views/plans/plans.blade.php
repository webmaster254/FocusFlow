@extends('layouts.primary')
@section('content')


    <div class="page-header mb-4 border-radius-xl">
        <span class="mask bg-gradient-dark"></span>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 my-auto">

                    <h5 class="text-white fadeIn2 fadeInBottom mt-4">{{__('“A dream without a plan is just a wish.”')}}
                    </h5>
                    <p class="text-white opacity-8 fadeIn3 fadeInBottom">{{__('— Katherine Paterson')}} </p>
                    <p class="text-white">{{__('Our actions and decisions today will shape the way we will be living in the future.')}} </p>

                </div>
            </div>

            <a href="/goal-plans" type="button" class="btn bg-gradient-light">{{__('Plan for your goals')}}</a>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">{{__('Your Plans')}}</h6>
                </div>
                <div class="card-body pt-4 p-3">
                    <ul class="list-group">

                        @foreach($plans as $plan)

                            <li class="list-group-item border-0 d-flex p-4 mb-2 mt-3 bg-gray-100 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="mb-3 ">{{$plan->title}}</h6>

                                    <span class="mb-2 "><h6>{{__('Goal Name:')}}  @if(isset($goals[$plan->goal_id]))
                                                {{$goals[$plan->goal_id]->name}}
                                            @endif</h6>



                                         <span class="text-dark font-weight-bold ms-sm-2"></span></span>

                                    <span class="text-xs">{{__('Date:')}} <span class="text-dark ms-sm-2 font-weight-bold">{{$plan->date->format(config('app.date_format'))}}</span></span>
                                </div>
                                <div class="ms-auto text-end">
                                    <a class="btn btn-link text-dark px-3 mb-0" href="/view-plan?id={{$plan->id}}"><i class="fas fa-file-alt text-dark me-2" aria-hidden="true"></i>{{__('View')}}</a>


                                    <a class="btn btn-link text-dark px-3 mb-0" href="/goal-plans?id={{$plan->id}}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>   {{__('Edit')}}
                                        </a>
                                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="/delete/goal-plan/{{$plan->id}}"><i class="far fa-trash-alt me-2"></i>
                                        {{__('Delete')}}

                                    </a>
                                </div>
                            </li>
                        @endforeach




                    </ul>
                </div>
            </div>
        </div>

    </div>


@endsection
