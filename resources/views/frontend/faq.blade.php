@extends('layouts.homepage')

@section('title')
    Frequently Asked Questions
@stop

@section('content')
    <div class="body-wrap about faq">

        <div class="row">
            <div class="page-title">
                <h4>Faq</h4>
            </div>
            <div class="page-content">
                <ul class="accordion" data-accordion data-allow-all-closed="true" data-multi-expand="true">
                    @foreach($faqs as $faq)
                        <li class="accordion-item is-active" data-accordion-item>
                            <a href="#" class="accordion-title"><i class="fa fa-question-circle-o"></i> {{$faq->question}} </a>

                            <div class="accordion-content" data-tab-content>
                             {{ $faq->answer }}
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div> 

    </div>
@stop