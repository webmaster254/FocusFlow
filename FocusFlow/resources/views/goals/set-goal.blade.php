@extends('layouts.primary')


@section('content')

    <div class="card bg-gray-800">
        <div class="card-header bg-gray-800 text-white">
            {{__('Set Your Goal')}}

        </div>
        <div class="card-body">
            <form action="/save-goal" method="post">

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
                       {{__('Whats your Goal/ Title')}}
                    </label><span class="text-danger">*</span>
                    <input class="form-control bg-gray-700 text-white "  type="text" name="name" @if (!empty($goal)) value="{{$goal->name}}" @endif id="name" >
                </div>

                <div class="form-group">
                    <label for="example-date-input" class="form-control-label  text-white ">
                        {{__('By when you want to achieve it')}}

                    </label><span class="text-danger">*</span>
                    <input class="form-control  bg-gray-700 text-white " name="date" id="date"

                           @if(!empty($goal))
                        value="{{$goal->date}}"
                    @else
                        value="{{date('Y-m-d')}}"
                        @endif>
                </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class=" text-white ">
                           {{__('Describe why its your goal')}}
                        </label>
                        <span class="text-danger">*</span>
                        <textarea class="form-control" name="description" id="description" rows="3">@if (!empty($goal)) {{$goal->description}}@endif  </textarea>
                    </div>


                    @if($goal)
                        <input type="hidden" name="id" value="{{$goal->id}}">
                    @endif
                    @csrf
                    <button type="submit" class="btn bg-gradient-secondary">
                        {{__('Save')}}

                    </button>
                <a href="/goals" type="button" class="btn bg-gradient-secondary">
                    {{__('Close')}}

</a>
            </form>


        </div>

    </div>





@endsection

@section('script')

    <script>
        "use strict"
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



