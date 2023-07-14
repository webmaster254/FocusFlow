@extends('layouts.primary')
@section('content')


    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="multisteps-form mb-5">
                    <!--progress bar-->

                    <!--form panels-->
                    <div class="row">
                        <div class="col-12 col-lg-8 m-auto">
                            <form action="/user-post"  method="post" class="multisteps-form__form mb-8">
                                <!--single form panel-->

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="list-unstyled">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="card multisteps-form__panel p-3 border-radius-xl bg-gray-800 js-active" data-animation="FadeIn">
                                    <h5 class="font-weight-bolder mb-0 text-green">
                                        {{__('Add New User')}}

                                    </h5>

                                    <div class="multisteps-form__content">
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6">
                                                <label class="text-white">{{__('First Name')}}</label>
                                                <input name="first_name"class="multisteps-form__input form-control bg-gray-700 text-white" type="text" @if (!empty($selected_user)) value="{{$selected_user->first_name}}" @endif />
                                            </div>
                                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                <label class="text-white">{{__('Last Name')}}</label>
                                                <input name="last_name"class="multisteps-form__input form-control bg-gray-700 text-white" type="text" @if (!empty($selected_user)) value="{{$selected_user->last_name}}" @endif />
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <label class="text-white">{{__('Username/Email')}}</label>
                                                <input name="email" class="multisteps-form__input form-control bg-gray-700 text-white" type="email" @if (!empty($selected_user)) value="{{$selected_user->email}}" @endif  />
                                            </div>

                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <label class="text-white">{{__('Password')}}</label>

                                                <input name="password"  type="password" class="multisteps-form__input form-control bg-gray-700 text-white" @if (!empty($selected_user)) value="{{$selected_user->password}}" @endif/>
                                                <p class="text-xs text-white opacity-7">
                                                    {{__('Keep blank if you do not want to change Password')}}
                                                    </p>

                                            </div>

                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                <label class="text-white">{{__('Mobile Phone')}}</label>
                                                <input name="mobile_number" class="multisteps-form__input form-control bg-gray-700 text-white" @if(!empty($selected_user)) value="{{$selected_user->mobile_number}}" @endif >
                                            </div>
                                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                <label class="text-white">{{__('Telephone')}}</label>
                                                <input name="phone_number"class="multisteps-form__input form-control bg-gray-700 text-white"  @if(!empty($selected_user)) value="{{$selected_user->phone_number}}" @endif  />
                                            </div>


                                        </div>


                                    </div>
                                </div>



                                <div class="card mt-4 multisteps-form__panel p-3 border-radius-xl bg-gray-800" data-animation="FadeIn">
                                    <h5 class="font-weight-bolder text-green">{{__('Socials')}}</h5>
                                    <div class="multisteps-form__content">
                                        <div class="row mt-3">
                                            <div class="col-12">
                                                <label class="text-white">{{__('Twitter Handle')}}</label>
                                                <input  name="twitter" class="multisteps-form__input form-control bg-gray-700 text-white" type="text" @if(!empty($selected_user)) value="{{$selected_user->twitter}}" @endif />
                                            </div>
                                            <div class="col-12 mt-3">
                                                <label class="text-white">{{__('Facebook Account')}}</label>
                                                <input name="facebook" class="multisteps-form__input form-control bg-gray-700 text-white" type="text" @if(!empty($selected_user)) value="{{$selected_user->facebook}}" @endif />
                                            </div>
                                            <div class="col-12 mt-3">
                                                <label class="text-white">{{__('Linkedin Account')}}</label>
                                                <input name="linkedin" class="multisteps-form__input form-control bg-gray-700 text-white" @if(!empty($selected_user)) value="{{$selected_user->linkedin}}" @endif />
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!--single form panel-->
                                @csrf

                                @if (!empty($selected_user))
                                    <input type="hidden" name="id" value="{{$selected_user->id}}">
                                @endif
                                <div class="button-row text-left mt-4">
                                    <button class="btn bg-gradient-success ms-auto mb-0 js-btn-next" type="submit" title="Next">{{__('Submit')}}</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection



