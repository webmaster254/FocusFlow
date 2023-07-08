@extends('layouts.primary')
@section('content')

    <div class="col-lg-12 col-12 mt-4 mt-lg-0">
        <div class="card">
            <div class="card-header pb-0 p-3">
                <div class="row mb-4">
                    <div class="col-6 d-flex align-items-center">
                        <h6 class="mb-0">{{$plan->title}}</h6>
                    </div>
                    <div class="col-6 text-end">
                        <a href="/goal-plans?id={{$plan->id}}" class="btn btn-primary btn-sm mb-0">{{__('Edit')}}
                        </a>
                        <a href="/plans" class="btn btn-secondary btn-sm mb-0">
                            {{__('Plans')}}
                        </a>

                    </div>
                </div>
            </div>

            <div class="card-body">
                <h6 class="mt-4">{{__('Plan Title')}}</h6>
                <div class="d-flex bg-gray-100 border-radius-lg p-3 mb-4">
                    <h4 class="my-auto">
                        <span class="text-secondary text-sm me-1"></span>{{$plan->title}}
                    </h4>


                </div>
                <h6 class="mt-4">{{__('Goal Name')}}</h6>
                <div class="d-flex bg-secondary border-radius-lg p-3 mb-4">
                    <h6 class="my-auto text-white">
                        @if(isset($goals[$plan->goal_id]))
                            {{$goals[$plan->goal_id]->name}}
                        @endif
                    </h6>

                </div>

                <div class="">
                    {!! $plan->description !!}

                </div>

            </div>



        </div>
    </div>


@endsection
