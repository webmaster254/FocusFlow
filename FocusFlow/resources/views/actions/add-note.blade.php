@extends('layouts.primary')
@section('content')


    <div class="card bg-gray-800">
        <div class="card-header bg-gray-800 text-green pb-0 px-3">

            {{__('Write Note')}}


        </div>
        <form action="/save-note" method="post">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body bg-gray-800">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label text-white">{{ __('Title') }}</label>
                    <input type="text" name="title" @if (!empty($note)) value="{{$note->title}}"@endif class="form-control bg-gray-700 text-white" id="exampleFormControlInput1" >
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label text-white"> {{ __('Topic/Subject') }}</label>
                    <input type="text" name="topic" @if (!empty($note)) value="{{$note->topic}}"@endif  class="form-control bg-gray-700 text-white" id="exampleFormControlInput1" >
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label text-white">{{ __('Write Notes') }}</label>
                    <textarea class="form-control" name="notes" id="notes" rows="20">@if (!empty($note)){!! $note->notes !!}@endif</textarea>
                </div>
                @csrf
                @if($note)
                    <input type="hidden" name="id" value="{{$note->id}}">
                @endif
                <button class="btn btn-success" type="submit">{{ __('Save') }}</button>
            </div>

        </form>


    </div>



@endsection


@section('script')
    <script>
        tinymce.init({
            selector: '#notes',


            plugins: [
                'insertdatetime media table paste code help wordcount'
            ],

            min_height: 500,
            max_height: 800,
            convert_newlines_to_brs: false,
            statusbar: false,
            relative_urls: false,
            remove_script_host: false,
            language: 'en',
            skin: 'oxide-dark',
            content_css : 'dark'




        });
    </script>
@endsection



