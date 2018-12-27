@extends('layouts.front.master')
@section('title','LRI | Home')


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="section-title text-center">
                <h2>Contactez-nous!</h2>
                <p>Si vous avez des questions, n'hésitez pas !!</p>
            </div>
        </div>
    </div>

    <div class="touch-in white-bg row col-12" style="padding-bottom: 30px;">
        <div class="col-4">
            <div class="contact-box text-center">
                <i class="ti-map-alt theme-color"></i>
                <h5 class="uppercase mt-20">Address</h5>
                <p class="mt-20">Cite 20 Aout N12 IMAMA, Tlemcen</p>
            </div>
        </div>
        <div class="col-4">
            <div class="contact-box text-center">
                <i class="ti-mobile theme-color"></i>
                <h5 class="uppercase mt-20">Phone</h5>
                <p class="mt-20"> +(213) 43-12-49</p>
            </div>
        </div>
        <div class="col-4">
            <div class="contact-box text-center">
                <i class="ti-email theme-color"></i>
                <h5 class="uppercase mt-20">Email</h5>
                <p class="mt-20">labo@gmail.com</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div id="formmessage">Success/Error Message Goes Here</div>
            <form class="form-horizontal" id="contactform" action="{{route('contact_store')}}" role="form" method="POST">
                {{csrf_field()}}

                <div class="contact-form clearfix">
                    <div class="section-field">
                        <input id="name" type="text" placeholder="Nom*" class="form-control" name="nom">
                    </div>

                    <div class="section-field">
                        <input type="email" placeholder="Email*" class="form-control" name="email">
                    </div>
                    <div class="section-field">
                        <input type="text" placeholder="Telphone*" class="form-control" name="num">
                    </div>
                    <div class="section-field textarea">
                            <textarea class="input-message form-control" placeholder="Message*" rows="7"
                                      name="message"></textarea>
                    </div>
                </div>
                <div class="section-field submit-button text-center">
                    <button type="submit" class="button">
                        <span> Envoyer message </span>
                        <i class="fa fa-paper-plane"></i></button>
                </div>
        </div>
        </form>

    </div>
@stop