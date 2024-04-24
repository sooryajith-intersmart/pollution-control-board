@extends('frontend::layouts.app')
@section('title', '500 - Internal Server Error')
@section('content')
<div id="pageWrapper">
    <section>
        <div class="container">
            <div class="row">
                <div class="page_cntnt">
                    <h1 class="head_one">500</h1>
                    <h3 class="head_two">OOPS! SOMETHING WENT WRONG.</h3>
                    <h4 class="head_three">WE WILL WORK ON FIXING THAT RIGHT AWAY.</h4>
                    <a href="{{ route('screen-1') }}" class="btn hoveranim">
                        <span>Back to homepage</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection