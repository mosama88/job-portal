@extends('frontend.layouts.master')
@section('content')
    <div class="bg-homepage1"></div>


    @include('frontend.sections.hero_section')

    <div class="mt-100"></div>

    @include('frontend.sections.category_section')



    @include('frontend.sections.futured_jobs')




    @include('frontend.sections.why_choose')




    @include('frontend.sections.find_job')



    @include('frontend.sections.counter')




    @include('frontend.sections.recruiters')



    @include('frontend.sections.pricing')



    @include('frontend.sections.jobs_location')



    @include('frontend.sections.what_say_our_clients')


    @include('frontend.sections.news_blogs')
@endsection
