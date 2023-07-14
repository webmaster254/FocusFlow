@extends('layouts.primary')


@section('content')


    <div class="page-header mb-4 border-radius-xl">
        <span class="mask bg-gradient-dark"></span>
        <div class="container">
            <div class="row">
                <p class="col-lg-6 my-auto">

                <h5 class="text-white fadeIn2 fadeInBottom mt-4">
                    {{__('Learn Something New')}}

                </h5>
                <p class=" text-white opacity-8 fadeIn3 fadeInBottom">
                    {{__('“Learning never exhausts the mind.”')}}

                </p>
                <p class=" text-white opacity-8 fadeIn3 fadeInBottom">{{__('– Leonardo da Vinci')}} </p>
                <p class="text-white opacity-8 fadeIn3 fadeInBottom">
                    {{__('“Want to earn more? Learn More”')}}

                </p>


            </div>
            <a href="/add-tolearn" type="button" class="btn bg-green">
                {{__('Add Things to Learn')}}

            </a>

        </div>


    </div>


    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card bg-gray-800">
                <div class="card-header bg-gray-800 pb-0 px-3">
                    <h6 class="mb-0 text-green">{{__('To Learn List')}}</h6>
                </div>
                <div class="card-body bg-gray-800 pt-4 p-3">
                    <ul class="list-group">

                        @foreach($to_learns as $to_learn)
                            <li class="list-group-item border-0 d-flex p-4 mb-2 mt-3 bg-gray-100 border-radius-lg bg-gray-800">
                                <div class="d-flex flex-column">
                                    <h6 class="mb-3 text-sm text-white">{{$to_learn->title}}</h6>
                                    <span class="text-xs mb-4 text-white opacity-7">{{__('Start Learning:')}} <span class="text-green opacity-10 ms-sm-2 font-weight-bold">
                                            @if($to_learn->start_date)
                                                {{$to_learn->start_date->format(config('app.date_format'))}}
                                            @endif

                                        </span></span>

                                    <span class="text-xs text-white opacity-7">{{__('Date to Finish:')}} <span class="text-green ms-sm-2 font-weight-bold">

                                             @if($to_learn->end_date)
                                                {{$to_learn->end_date->format(config('app.date_format'))}}
                                            @endif



                                        </span></span>
                                </div>
                                <div class="ms-auto text-end">

                                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="/delete/to-learn/{{$to_learn->id}}"><i class="far fa-trash-alt me-2"></i>{{__('Delete')}}</a>
                                    <a class="btn btn-link text-white px-3 mb-0" href="/add-tolearn?id={{$to_learn->id}}"><i class="fas fa-pencil-alt text-white me-2" aria-hidden="true"></i>{{__('Edit')}}</a>
                                </div>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>

    </div>


@endsection




