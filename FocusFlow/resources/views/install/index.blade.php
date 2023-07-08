@extends('install.base')
@section('content')


    <h3>{{__('Focus Installation')}}</h3>
    <p>
        {{__('We need the following information to install.')}}
    </p>

    <ul>
        <li>{{__('Database Name')}}</li>
        <li>{{__('Database Username')}}</li>
        <li>{{__('Database Password')}}</li>
        <li>{{__('Database Host')}}</li>
    </ul>

    <p>{{__('The system will also check the necessary file write permissions.')}}</p>

    <a class="btn btn-primary mt-3" href="{{route('step1')}}">
        {{__('Continue')}}

    </a>


@endsection
