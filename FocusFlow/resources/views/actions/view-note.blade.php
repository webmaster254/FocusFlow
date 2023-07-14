@extends('layouts.primary')
@section('content')



    <div class="col-lg-12 col-12 mt-4 mt-lg-0">
        <div class="card bg-gray-800">
            <div class="card-header bg-gray-800 pb-0 p-3">
                <div class="row mb-4">
                    <div class="col-6 d-flex align-items-center">
                        <h6 class="mb-0 text-green">{{$note->topic}}</h6>
                    </div>
                    <div class="col-6 text-end">
                        <a href="/add-note?id={{$note->id}}" class="btn btn-outline-success btn-sm mb-0">{{__('Edit')}}
                        </a>
                        <a href="/notes" class="btn btn-outline-success btn-sm mb-0">
                            {{__('List Notes')}}
                        </a>

                    </div>
                </div>
            </div>

            <div class="card-body bg-gray-800">
                <div class="d-flex bg-gray-700 border-radius-lg p-3 mb-4">
                    <h4 class="my-auto text-white">
                        <span class="text-white text-sm me-1"></span>{{$note->title}}<span class="text-white text-sm ms-1"></span>
                    </h4>

                </div>
                <div class="text-white opacity-7">
                    {!! $note->notes !!}

                </div>

            </div>



        </div>
    </div>







@endsection
