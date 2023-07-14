@extends('layouts.primary')
@section('content')


    <div class="card bg-gray-800">

        <div class="card-header bg-gray-800">
            <h3 class="text-white">Write your Business plan</h3>
        </div>
        <div class="card-body">
            <form action="/business-plan-post" method="post">
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
                    <label for="example-text-input" class="form-control-label text-white opacity-7">{{__('Business Name')}}</label>
                    <input class="form-control bg-gray-700 text-white" type="text"  name="company_name" @if(!empty($plan))value="{{$plan->company_name}}"@endif>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-search-input" class="form-control-label text-white opacity-7">{{__('Your Name')}}</label>
                            <input class="form-control bg-gray-700 text-white" name="name" type="text" @if(!empty($plan))value="{{$plan->name}}"@endif>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-search-input" class="form-control-label text-white opacity-7">{{__('Date')}}</label>
                            <input class="form-control bg-gray-700 text-white" name="date" id="date" @if(!empty($plan))
                            value="{{$plan->date}}"
                                   @else
                                   value="{{date('Y-m-d')}}"
                                @endif >
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-email-input" class="form-control-label text-white opacity-700">{{__('Email')}}</label>
                            <input class="form-control bg-gray-700 text-white" type="email" name="email" @if(!empty($plan))value="{{$plan->email}}"@endif>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-tel-input" class="form-control-label text-white opacity-7">{{__('Phone')}}</label>
                            <input class="form-control bg-gray-700 text-white" type="tel" name="phone"
                                   @if(!empty($plan))value="{{$plan->phone}}"@endif>
                        </div>

                    </div>
                </div>



                <div class="form-group">
                    <label for="example-url-input" class="form-control-label text-white opacity-7">{{__('Website')}}</label>
                    <input class="form-control bg-gray-700 text-white" name="website"
                           @if(!empty($plan))value="{{$plan->website}}"@endif>
                </div>
                <div class="form-group ">
                    <label for="exampleFormControlTextarea1" class="text-white ">
                        {{__('Executive Summary')}}

                    </label>
                    <p class="form-text text-white opacity-7 text-xs ms-1">
                        {{__('A snapshot of your business')}}
                    </p>
                    <textarea class="form-control" name="ex_summary" id="ex_summary" rows="10">@if (!empty($plan)){{$plan->ex_summary}}@endif</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1" class="text-white ">
                        {{__('Company description')}}

                    </label>
                    <p class="form-text text-white opacity-7 text-xs ms-1">
                        {{__('Describe what you do')}}
                    </p>
                    <textarea class="form-control" name="description" id="com_description" rows="10">@if(!empty($plan)){{$plan->description}}@endif</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1" class="text-white ">
                        {{__('Market Analysis')}}

                    </label>
                    <p class="form-text text-white opacity-7 text-xs ms-1">
                        {{__('Rsesearch on your industry, market and competitors')}}
                    </p>
                    <textarea class="form-control" name="m_analysis" id="market_analysis" rows="10">@if(!empty($plan)){{$plan->m_analysis}}@endif</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1" class="text-white ">
                        {{__('Organization & Management')}}

                    </label>
                    <p class="form-text text-white opacity-7 text-xs ms-1">
                        {{__('Your business and management structure')}}
                    </p>
                    <textarea class="form-control" name="management" id="organization" rows="10">@if(!empty($plan)){{$plan->management}}@endif</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1" class="text-white ">
                        {{__('Service or product')}}

                    </label>
                    <p class="form-text text-white opacity-7 text-xs ms-1">
                        {{__('The products or services you’re offering')}}
                    </p>
                    <textarea class="form-control" name="product" id="service_product" rows="10">@if(!empty($plan)){{$plan->product}}@endif</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1" class="text-white ">
                        {{__('Marketing and sales')}}

                    </label>
                    <p class="form-text text-white opacity-7 text-xs ms-1">
                        {{__('How you’ll market your business and your sales strategy')}}
                    </p>
                    <textarea class="form-control" name="marketing" id="marketing_sale" rows="10">@if(!empty($plan)){{$plan->marketing}}@endif</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1" class="text-white ">
                        {{__('Budget')}}

                    </label>
                    <p class="form-text text-white opacity-7 text-xs ms-1">
                        {{__('Budget of your company for next 2 years with source of the moneys')}}
                    </p>
                    <textarea class="form-control" name="budget" id="budget" rows="10">@if(!empty($plan)){{$plan->budget}}@endif</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1" class="text-white ">
                        {{__('Investment/Funding request')}}

                    </label>
                    <p class="form-text text-white opacity-7 text-xs ms-1">
                        {{__('How much money you’ll need for next 3 to 5 years')}}
                    </p>
                    <textarea class="form-control" name="investment" id="investment" rows="10">@if(!empty($plan)){{$plan->investment}}@endif</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1" class="text-white ">
                        {{__('Financial projections')}}

                    </label>
                    <p class="form-text text-white opacity-7 text-xs ms-1">
                        {{__('Supply information like balance sheets')}}
                    </p>
                    <textarea class="form-control" name="finance" id="financial_projections" rows="10">@if(!empty($plan)){{$plan->finance}}@endif</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1" class="text-white ">
                        {{__('Appendix')}}

                    </label>
                    <p class="form-text text-white opacity-7 text-xs ms-1">
                        {{__('An optional section that includes resumes and permits')}}
                    </p>
                    <textarea class="form-control" name="appendix" id="appendix" rows="10">@if(!empty($plan)){{$plan->appendix}}@endif</textarea>
                </div>

                    @csrf
                    @if($plan)
                        <input type="hidden" name="id" value="{{$plan->id}}">
                    @endif
                <button type="submit" class="btn bg-green">Save</button>
                <a  href="/business-plans" type="button" class="btn bg-gradient-secondary">
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
            selector: '#ex_summary',
            skin: 'oxide-dark',
            content_css : 'dark',
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
               







        });
        tinymce.init({
            selector: '#com_description',

            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
                skin: 'oxide-dark',
            content_css : 'dark',



        });
        tinymce.init({
            selector: '#market_analysis',

            plugins: [
                'advlist autolink lists link image charmap print preview anchor',

                'insertdatetime media table paste code  wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
                skin: 'oxide-dark',
            content_css : 'dark',



        });
        tinymce.init({
            selector: '#organization',

            plugins: [
                'advlist autolink lists link image charmap print preview anchor',

                'insertdatetime media table paste code  wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
                skin: 'oxide-dark',
            content_css : 'dark',


        });
        tinymce.init({
            selector: '#service_product',

            plugins: [
                'advlist autolink lists link image charmap print preview anchor',

                'insertdatetime media table paste code  wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
                skin: 'oxide-dark',
            content_css : 'dark',


        });
        tinymce.init({
            selector: '#marketing_sale',

            plugins: [
                'advlist autolink lists link image charmap print preview anchor',

                'insertdatetime media table paste code  wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
                skin: 'oxide-dark',
            content_css : 'dark',


        });
        tinymce.init({
            selector: '#budget',

            plugins: [
                'advlist autolink lists link image charmap print preview anchor',

                'insertdatetime media table paste code  wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
                skin: 'oxide-dark',
            content_css : 'dark',



        });
        tinymce.init({
            selector: '#investment',

            plugins: [
                'advlist autolink lists link image charmap print preview anchor',

                'insertdatetime media table paste code  wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
                skin: 'oxide-dark',
            content_css : 'dark',


        });
        tinymce.init({
            selector: '#financial_projections',

            plugins: [
                'advlist autolink lists link image charmap print preview anchor',

                'insertdatetime media table paste code  wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
                skin: 'oxide-dark',
            content_css : 'dark',



        });
        tinymce.init({
            selector: '#appendix',
            skin: 'oxide-dark',
            content_css : 'dark',
            plugins: 'lists,table',
            toolbar: 'numlist bullist',
            lists_indent_on_tab: false
           


        });
    </script>

@endsection












