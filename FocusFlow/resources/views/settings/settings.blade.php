@extends('layouts.primary')
@section('content')


    <div class="container-fluid my-3 py-3">
        <div class="row mb-5">
            <div class="col-lg-3">
                <div class="card position-sticky top-1">
                    <ul class="nav flex-column bg-white border-radius-lg p-3">

                        <li class="nav-item pt-2">
                            <a class="nav-link text-body" data-scroll="" href="#basic-info">
                                <div class="icon me-2">
                                    <svg class="text-dark mb-1" width="16px" height="16px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                                <g transform="translate(1716.000000, 291.000000)">
                                                    <g transform="translate(154.000000, 300.000000)">
                                                        <path class="color-background" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z" opacity="0.603585379"></path>
                                                        <path class="color-background" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                                <span class="text-sm">{{__('General Settings')}}</span>
                            </a>
                        </li>










                    </ul>
                </div>
            </div>
            <div class="col-lg-9 mt-lg-0 mt-4">
                <!-- Card Profile -->

                <!-- Card Basic Info -->

                <form enctype="multipart/form-data" action="/settings" method="post">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card mt-4" id="basic-info">
                        <div class="card-header">
                            <h5>{{__('General Settings')}}</h5>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <label class="form-label">{{__('WorkSpace Name')}}</label>
                                <p class="text-sm">
                                    {{__('Give a workspace name to show on the naviagtion. For example,')}} {{$user->first_name}}'{{__('s Desk')}}</p>
                                <div class="input-group">
                                    <input id="firstName" name="company_name" value="{{$settings['company_name']}}" class="form-control" type="text" required="required">
                                </div>

                            </div>



                            <div class="row">

                                <div class="col-md-12 align-self-center">
                                    <div>
                                        <label  for="logo_file" class="form-label mt-4">{{__('Upload Logo')}}</label>
                                        <input class="form-control" name="logo" type="file" id="logo_file">
                                    </div>
                                </div>

                            </div>
                            @csrf
                            <button class="btn bg-gradient-dark btn-sm float-left mt-4 mb-0">{{__('Update')}} </button>
                        </div>
                    </div>
                </form>
















            </div>
        </div>

    </div>

@endsection
