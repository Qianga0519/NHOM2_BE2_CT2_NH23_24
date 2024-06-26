@extends('layout.site')
@section('js')
<script src="{{url('site')}}/js/contact_custom"></script>
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{url('site')}}/styles/contact_responsive.css">
<link rel="stylesheet" type="text/css" href="{{url('site')}}/styles/contact_styles.css">

@endsection


@section('main')

<!-- Contact Info -->

<div class="contact_info">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="contact_info_container d-flex flex-lg-row flex-column justify-content-between align-items-between">

                    <!-- Contact Item -->
                    <div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
                        <div class="contact_info_image"><img src="images/contact_1.png" alt=""></div>
                        <div class="contact_info_content">
                            <div class="contact_info_title">Phone</div>
                            <div class="contact_info_text">+38 068 005 3570</div>
                        </div>
                    </div>

                    <!-- Contact Item -->
                    <div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
                        <div class="contact_info_image"><img src="images/contact_2.png" alt=""></div>
                        <div class="contact_info_content">
                            <div class="contact_info_title">Email</div>
                            <div class="contact_info_text">fastsales@gmail.com</div>
                        </div>
                    </div>

                    <!-- Contact Item -->
                    <div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
                        <div class="contact_info_image"><img src="images/contact_3.png" alt=""></div>
                        <div class="contact_info_content">
                            <div class="contact_info_title">Address</div>
                            <div class="contact_info_text">10 Suffolk at Soho, London, UK</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contact Form -->

<div class="contact_form">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="contact_form_container">
                    <div class="contact_form_title">Get in Touch</div>

                    <form action="{{route('contact.store')}}" id="contact_form" method="POST">
                        @csrf
						 <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                            <input type="text" id="contact_form_name" class="contact_form_name input_field" placeholder="Your name" name="name" required="required" value="{{old('name')}}" data-error="Name is required.">
                            <input type="text" id="contact_form_email" class="contact_form_email input_field" placeholder="Your email" name="email" required="required" data-error="Email is required.">
                            <input type="text" id="contact_form_subject" class="contact_form_subject input_field" name="subject" placeholder="Your subject">
                        </div>
                        <div class="contact_form_text">
                            <textarea id="contact_form_message" class="text_field contact_form_message" name="message" rows="4" placeholder="Message" required="required" data-error="Please, write us a message."></textarea>
                        </div>
                        <div class="contact_form_button">
                            <button type="submit" class="button contact_submit_button">Send Message</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="panel"></div>
</div>

<!-- Map -->

<div class="contact_map">
    <div id="google_map" class="google_map">
        <div class="map_container">
            <div id="map"></div>
        </div>
    </div>
</div>
@endsection
