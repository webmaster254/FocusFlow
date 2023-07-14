
@extends('layouts.primary')


@section('content')
    <div class="card bg-gray-800">
        <div class="card-header bg-gray-800 text-white">
            {{__('Plan Your Week')}}

        </div>



        <div class="card-body">
            <form action="/save-weeklyplan" method="post">
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
                    <label for="example-text-input" class="form-control-label text-white opacity-7">{{__('Title')}} </label><span class="text-danger">*</span>
                    <input class="form-control bg-gray-700 text-white" type="text" name="title" id="example-text-input"
                           @if (!empty($plan)) value="{{$plan->title}}" @endif>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-date-input" class="form-control-label text-white opacity-7">
                                {{__('From Date')}}

                            </label>
                            <input class="form-control  text-white bg-gray-700"  name="from_date" type="date"  id="fromdate"
                                   @if(!empty($plan))
                                   value="{{$plan->from_date}}"
                                   @else
                                   value="{{date('Y-m-d')}}"
                                @endif>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-date-input" class="form-control-label text-white opacity-7">
                               {{__('To Date')}}

                            </label>
                            <input class="form-control bg-gray-700 text-white" name="to_date" type="date" id="todate"
                                   @if(!empty($plan))
                                   value="{{$plan->to_date}}"
                                   @else
                                   value="{{date('Y-m-d')}}"
                                @endif>
                        </div>

                    </div>
                </div>




                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group text-white">
                            <label for="exampleFormControlTextarea1 " class="text-white opacity-7">
                                {{__('Monday')}}

                            </label>
                            <textarea class="form-control" name="monday" id="monday" rows="10">@if(!empty($plan)) {{$plan->monday}}@endif</textarea>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1" class="text-white opacity-7">{{__('Tuesday')}}</label>
                            <textarea class="form-control" name="tuesday" id="tuesday" rows="10">
                                @if(!empty($plan)){{$plan->tuesday}}@endif</textarea>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1 " class="text-white opacity-7">{{__('Wednesday')}}</label>
                            <textarea class="form-control" name="wednesday" id="wednesday" rows="10">
                                @if(!empty($plan)){{$plan->wednesday}}@endif</textarea>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1" class="text-white opacity-7">{{__('Thursday')}}</label>
                            <textarea class="form-control" name="thursday" id="thursday" rows="10">
                                @if(!empty($plan)){{$plan->thursday}}@endif
                            </textarea>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1" class="text-white opacity-7">{{__('Friday')}}</label>
                            <textarea class="form-control" name="friday" id="friday" rows="10">
                                @if(!empty($plan)){{$plan->friday}}@endif
                            </textarea>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1" class="text-white opacity-7">{{__('Saturday')}}</label>
                            <textarea class="form-control" name="saturday" id="saturday" rows="10">
                                @if(!empty($plan)){{$plan->saturday}}@endif
                            </textarea>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1" class="text-white opacity-7">{{__('Sunday')}}</label>
                            <textarea class="form-control" name="sunday" id="sunday" rows="10">
                                @if(!empty($plan)){{$plan->sunday}}@endif
                            </textarea>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1" class="text-white opacity-7">{{__('Notes')}}</label>
                            <textarea class="form-control" name="notes" id="notes" rows="10"></textarea>
                        </div>

                    </div>
                </div>


                @if($plan)
                    <input type="hidden" name="id" value="{{$plan->id}}">
                @endif

                @csrf
                <button type="submit" class="btn bg-green">{{__('Save')}}</button>
                <a href="/weekly-plans" type="button" class="btn bg-gradient-secondary">{{__('Close')}}</a>
            </form>


        </div>


    </div>

@endsection


@section('script')

    <script>
        "use strict";
        $(function () {


            flatpickr("#fromdate", {

                dateFormat: "Y-m-d",
            });
            flatpickr("#todate", {

                dateFormat: "Y-m-d",
            });



        });


    </script>
    <script>

        tinymce.init({
            selector: '#grateful',

            plugins: 'lists,table',
            toolbar: 'numlist bullist',
            lists_indent_on_tab: false,
            skin: 'oxide-dark',
            content_css : 'dark'


        });
        tinymce.init({
            selector: '#saturday',

            plugins: 'lists,table',
            toolbar: 'numlist bullist',
            lists_indent_on_tab: false,
            skin: 'oxide-dark',
            content_css : 'dark'


        });
        tinymce.init({
            selector: '#sunday',

            plugins: 'lists,table',
            toolbar: 'numlist bullist',
            lists_indent_on_tab: false,
            skin: 'oxide-dark',
            content_css : 'dark'


        });
        tinymce.init({
            selector: '#monday',

            plugins: 'lists,table',
            toolbar: 'numlist bullist',
            lists_indent_on_tab: false,
            skin: 'oxide-dark',
            content_css : 'dark'


        });
        tinymce.init({
            selector: '#tuesday',

            plugins: 'lists,table',
            toolbar: 'numlist bullist',
            lists_indent_on_tab: false,
            skin: 'oxide-dark',
            content_css : 'dark'


        });
        tinymce.init({
            selector: '#wednesday',

            plugins: 'lists,table',
            toolbar: 'numlist bullist',
            lists_indent_on_tab: false,
            skin: 'oxide-dark',
            content_css : 'dark'


        });
        tinymce.init({
            selector: '#thursday',

            plugins: 'lists,table',
            toolbar: 'numlist bullist',
            lists_indent_on_tab: false,
            skin: 'oxide-dark',
            content_css : 'dark'


        });
        tinymce.init({
            selector: '#friday',

            plugins: 'lists,table',
            toolbar: 'numlist bullist',
            lists_indent_on_tab: false,
            skin: 'oxide-dark',
            content_css : 'dark'


        });
        tinymce.init({
            selector: '#notes',

            plugins: 'lists,table',
            toolbar: 'numlist bullist',
            lists_indent_on_tab: false,
            skin: 'oxide-dark',
            content_css : 'dark'


        });
    </script>

@endsection











