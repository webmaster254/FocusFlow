@extends('layouts.primary')


@section('content')

    <div class="card bg-gray-800">
        <div class="card-header bg-gray-800 text-white">
            {{__('Plan for your dreams/goals')}}
        </div>

        <div class="card-body text-white">
            <form action="/save-goal-plan" method="post">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    <label for="example-text-input" class="form-control-label text-white opacity-7">
                        {{__('Title')}}

                    </label><span class="text-danger">*</span>
                    <input class="form-control text-white bg-gray-700" name="title" type="text" id="example-text-input"  @if (!empty($plan)) value="{{$plan->title}}" @endif>
                </div>
                <div class="form-group">
                    <label for="example-text-input" class="form-control-label text-white opacity-7">
                        {{__('Choose the goal to plan for')}}

                    </label><span class="text-danger">*</span>

                    <select class="form-select bg-gray-700 text-white" aria-label="Default select example" name="goal_id">

                        @foreach ($goals as $goal)
                            <option value="{{$goal->id}}"
                                    @if (!empty($plan))
                                    @if ($plan->goal_id == $goal->id)
                                    selected
                                @endif
                                @endif
                            >{{$goal->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="example-date-input" class="form-control-label text-white opacity-7">{{__('Date')}}</label>
                    <input class="form-control bg-gray-700 text-white"  name="date" id="date"
                           @if(!empty($plan))
                           value="{{$plan->date}}"
                           @else
                           value="{{date('Y-m-d')}}"
                    @endif>
                </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="text-white opacity-7">{{__('Write a precise plan')}}</label><span class="text-danger">*</span>
                        <textarea class="form-control" name="description" id="description" rows="3">@if (!empty($plan)){{$plan->description}}@endif</textarea>
                    </div>

                    @if($plan)
                        <input type="hidden" name="id" value="{{$plan->id}}">
                    @endif
                @csrf
                <button type="submit" class="btn bg-green">
                    {{__('Save')}}

                </button>
                <a  href="/plans" type="button" class="btn bg-gradient-secondary">
                    {{__('Close')}}

</a>
            </form>

        </div>

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


@endsection








