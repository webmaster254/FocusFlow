@extends('layouts.primary')
@section('content')


    <div class="col-md-12 col-12 mt-4 mt-lg-0">
        <div class="card bg-gray-800">
            <div class="card-header bg-gray-800 pb-0 p-3">
                <div class="row mb-4">
                    <div class="col-6 d-flex align-items-center">
                        <h6 class="mb-0 text-green">{{$todo->title}}</h6>
                    </div>
                    <div class="col-6 text-end">
                        <a href="/add-task?id={{$todo->id}}" class="btn btn-success btn-sm mb-0">{{__('Edit')}}
                        </a>


                    </div>
                </div>
            </div>

            <div class="card-body bg-gray-800">
                <div class="d-flex bg-gray-700  text-white border-radius-lg p-3 mb-4">
                    <h4 class="my-auto text-white">
                        <span class="text-white text-sm me-1"></span>{{$todo->title}}<span class="text-white text-sm ms-1"></span>
                    </h4>

                </div>
                <div class=" text-white opacity-7">
                    {!! $todo->description !!}

                </div>

            </div>



        </div>
    </div>


@endsection
