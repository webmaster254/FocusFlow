@extends('layouts.primary')
@section('content')

    <div class="page-header mb-4 border-radius-xl">
        <span class="mask bg-gradient-dark"></span>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 my-auto">

                    <h5 class="text-white fadeIn2 fadeInBottom mt-4">
                        {{__('Turn Your Idea into Real Business.')}}

                    </h5>
                    <p class="text-white opacity-8 fadeIn3 fadeInBottom">
                        {{__('Plan for your Dream Business ')}}

                    </p>
                </div>
            </div>
            <a  href="/write-business-plan" type="button" class="btn bg-gradient-light">
                {{__('Write your Business Plan')}}

            </a>

        </div>
    </div>

    <div class="row">

        @foreach($plans as $plan)
            <div class="col-md-4 mb-4">
                <div class="card card-pricing">
                    <div class="card-header bg-gradient-light text-center pt-4 pb-5 position-relative">
                        <div class="z-index-1 position-relative ">
                            <h5 class="mt-6"> {{$settings['company_name']}}</h5>
                            <h3 class=" text-muted mt-2 mb-0">
                                {{__('Business Plan')}}</h3>
                            <h6 class="text-muted">{{$plan->date->format(config('app.date_format'))}}</h6>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <p class="text-muted">{{__('Prepared by')}}</p>
                        <h5>{{$plan->name}}</h5>
                        <h6 class="text-muted">{{$plan->email}}</h6>

                    </div>

                    <div class="card-body text-center">

                        <a href="/view-business-plan?id={{$plan->id}}" type="button" class="btn bg-gradient-dark mb-3">
                            {{__('Read')}}
                        </a>
                        <a class="btn bg-gradient-secondary mb-3" href="/write-business-plan?id={{$plan->id}}">{{__('Edit')}}</a>
                        <a href="/delete/business-plan/{{$plan->id}}" type="button" class="btn bg-gradient-warning">{{__('Delete')}}</a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>


@endsection
