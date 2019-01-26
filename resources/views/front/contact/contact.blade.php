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

    @if(session()->has('message'))
        <center>
            <div class="col-3 alert alert-success text-center" style="padding-bottom: 20px">
                {{ session()->get('message') }}
            </div>
        </center>
    @endif

    <div class="touch-in white-bg row col-12 zoomInLeft animated" style="padding-bottom: 30px;">
        <div class="col-4 ">
            <div class="contact-box text-center slideInLeft animated">
                <i class="ti-map-alt theme-color"></i>
                <h5 class="uppercase mt-20">Address</h5>
                <p class="mt-20">Cite 20 Aout N12 IMAMA, Tlemcen</p>
            </div>
        </div>
        <div class="col-4 ">
            <div class="contact-box text-center ">
                <i class="ti-mobile theme-color"></i>
                <h5 class="uppercase mt-20">Phone</h5>
                <p class="mt-20"> +(213) 43-12-49</p>
            </div>
        </div>
        <div class="col-4 ">
            <div class="contact-box text-center">
                <i class="ti-email theme-color"></i>
                <h5 class="uppercase mt-20">Email</h5>
                <p class="mt-20">labo@gmail.com</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div id="formmessage"></div>
            <form class="form-horizontal" action="{{url('front/contact')}}" method="POST">

                <input type="hidden" name="_token" value="{{csrf_token()}}">
                {{csrf_field()}}

                <div class="contact-form clearfix ">
                    <div class="section-field has-error">
                        <input id="name" type="text" placeholder="Nom" class="form-control" name="nom"
                               value="{{old('nom')}}" required>
                        {!! $errors->first('nom','<center><span class="help-block text-danger"><strong>:message</strong></span></center>') !!}
                    </div>


                    <div class="section-field" style="padding-bottom: 7px">
                        <input type="email" placeholder="Email" class="form-control" value="{{old('email')}}"
                               name="email" required>
                        {!! $errors->first('email','<center><span class="help-block text-danger"><strong>:message</strong></span></center>') !!}
                    </div>


                    <div class="section-field" style="padding-bottom: 7px">
                        <input type="text" placeholder="Telphone" class="form-control" value="{{old('telephone')}}"
                               name="telephone" required>
                        {!! $errors->first('telephone','<center><span class="help-block text-danger"><strong>:message</strong></span></center>') !!}
                    </div>


                    <div class="section-field textarea" style="padding-bottom: 7px">
                            <textarea class="input-message form-control" placeholder="Votre message..." rows="7"
                                      name="message" required>{{old('message')}}</textarea>
                        {!! $errors->first('message','<center><span class="help-block text-danger"><strong>:message</strong></span></center>') !!}
                    </div>


                </div>
                <div class="section-field submit-button text-center" style="padding-top: 10px">
                    <button type="submit" class="button">
                        <span> Envoyer message </span>
                        <i class="fa fa-paper-plane"></i></button>
                </div>
        </div>
        </form>

    </div>
@stop