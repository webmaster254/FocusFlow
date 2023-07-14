@extends('layouts.primary')
@section('content')

    <div class="container-fluid py-4">
        <div class="col-lg-9 mx-auto">
            <div class="card card-body bg-gray-800 ">

                <div class="page-header mb-4 border-radius-xl">
                    <span class="mask bg-gradient-dark"></span>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 mt-6 mb-6 text-center my-auto">

                                <h3 class="text-green">
                                    {{$plan->company_name}}
                                </h3>

                                <h2 class="text-white fadeIn2 fadeInBottom mt-4">{{__('Business Plan')}}</h2>
                                <h5 class="text-white opacity-7 fadeIn2 fadeInBottom">{{$plan->date}}</h5>

                            </div>

                        </div>

                    </div>
                </div>

                <div class="mt-4 text-center mt-8 mb-7">

                    <h5 class=" text-green fadeIn2 fadeInBottom">{{__('Prepared By')}}</h5>
                    <h3 class="text-white opacity-7">{{$plan->name}}</h3>

                    <h6 class="text-white opacity-7">{{$plan->email}}</h6>
                </div>


                    @if($plan->ex_summary)

                    <div class="text-center text-white mt-8">
                        <h6 class="text-white opacity-7">{{__('Executive Summary')}}</h6>


                    </div>
                    <div>
                        {!! $plan->ex_summary !!}



                    </div>
                @endif


                 @if($plan->description)
                    <div class="text-center mt-4">
                        <h6 class="text-white ">{{__('Company description')}}</h6>
                    </div>
                    {!! $plan->description !!}

                @endif




                @if($plan->m_analysis)

                    <div class="text-center mt-4">
                        <h6 class="text-white ">{{__('Market Analysis')}}</h6>
                    </div>
                    {!! $plan->m_analysis !!}

                @endif


                @if($plan->management)

                    <div class="text-center mt-4">
                        <h6 class="text-white ">{{__('Organization & Management')}}</h6>
                    </div>
                    {!! $plan->management !!}


                @endif


                @if($plan->product)

                    <div class="text-center mt-4">
                        <h6 class="text-white ">{{__('Service or product')}}</h6>
                    </div>
                    {!! $plan->product !!}


                @endif


                @if($plan->marketing)

                    <div class="text-center mt-4">
                        <h6 class="text-white ">{{__('Marketing and sales')}}</h6>
                    </div>
                    {!! $plan->marketing !!}

                @endif



                @if($plan->budget)
                    <div class="text-center mt-4">
                        <h6 class="text-white ">{{__('Budget')}}</h6>
                    </div>
                    {!! $plan->budget !!}

                @endif


                @if( $plan->investment )


                    <div class="text-center mt-4">
                        <h6 class="text-white ">{{__('Investment/Funding request')}}</h6>
                    </div>
                    {!! $plan->investment !!}



                @endif



                @if($plan->finance)

                    <div class="text-center mt-4">
                        <h6 class="text-white ">{{__('Financial projections')}}</h6>
                    </div>
                    {!! $plan->finance !!}


                @endif

                @if($plan->appendix)

                    <div class="text-center mt-4">
                        <h6 class="text-white ">{{__('Appendix')}}</h6>
                    </div>
                    {!! $plan->appendix !!}

                @endif



                </div>



            </div>

        </div>


    </div>



@endsection
