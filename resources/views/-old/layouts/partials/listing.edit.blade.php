@php
    use App\Models\Listing;use MarcReichel\IGDBLaravel\Models\Game;if ($data->getGame->enter == 'api') {
        $game = Game::find($data->getGame->igdb_game_id);
    }
    Listing::where('id', $data->id)->increment('clicks')
@endphp
@extends('layouts.frontend')


@section('og_sharer')
    <meta property="og:title" content="{{ $data->name }}">
    <meta property="og:image" content="{{ $data->getGame->cover }}">
@endsection
@if(isset($data->seo_title))
@section('title')
    {{$data->seo_title}}
@endsection
@elseif($data->getGame->seo_title)
@section('title')
    {{$data->getGame->seo_title}}
@endsection

@endif

@if(isset($data->seo_keywords))
@section('meta_keywords')
    {{$data->seo_keywords}}
@endsection
@elseif($data->getGame->seo_keywords)
@section('meta_keywords')
    {{$data->getGame->seo_keywords}}
@endsection
@endif

@if(isset($data->seo_meta))
@section('meta_description')
    {{$data->seo_meta}}
@endsection
@elseif($data->getGame->seo_meta)
@section('meta_description')
    {{$data->getGame->seo_meta}}
@endsection
@endif



@section('content')
    <style type="text/css">
        .product-overview a.message-button.btn-dark.flex-center-space {
            background: #424242;
            border-radius: 50px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            text-align: center;
            margin-bottom: 20px;
        }

        .product-overview a.message-button i {
            background-color: rgba(0, 0, 0, 0.15);
            padding: 10px;
            padding-left: 13px;
            border-radius: 50px 0px 0px 50px;
            width: 50px;
        }

        div#NewMessage .modal-dialog.user-dialog {
            max-width: 600px;
            width: auto;
            margin: 30px auto;
        }

        div#NewMessage .modal-dialog.user-dialog .modal-header {
            display: block;
        }

        div#NewMessage .modal-dialog.user-dialog button.close {
            float: right;
            padding: 0;
            cursor: pointer;
            border: 0;
            background: 0 0;
            -webkit-appearance: none;
            color: #fff;
            font-size: 25px;
        }

        div#NewMessage .modal-dialog.user-dialog h4.modal-title {
            text-transform: capitalize;
        }

        div#selected-user img.img-circle {
            width: 100%;
            max-width: 100%;
            height: auto;
            border: 0 none;
        }

        div#selected-user span.avatar.m-r-10 {
            position: relative;
            display: inline-block;
            width: 60px;
            margin-right: 10px;
            border-radius: 50%;
        }

        div#selected-user .selected-user-info {
            text-transform: capitalize;
            font-weight: 700;
            background: #302f2f;
            border-radius: 5px;
            color: #fff;
            padding: 10px;
            width: 100%;
            display: flex;
            align-items: center;
        }

        div#user-selected textarea#tempmsg {
            background: #4e4d4d;
            border: none;
            color: #fff;
            height: auto;
            font-size: 1rem;
            line-height: 1.5;
            display: block;
            width: 100%;
            padding: .429rem .929rem;
            margin-top: 10px;
        }

        .iframe-container {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%;
            height: 0;
        }

        .iframe-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }


        .product-overview a.message-button.btn-dark.flex-center-space {
            margin: 3em 0px;
        }

        .site-action {
            position: fixed;
            right: 32px;
            bottom: 55px;
            z-index: 1290;
            -webkit-animation-duration: 3s;
            -o-animation-duration: 3s;
            animation-duration: 3s;
        }

        .site-action .btn {
            -webkit-box-shadow: 0 10px 10px 0 rgb(60 60 60 / 10%);
            box-shadow: 0 10px 10px 0 rgb(60 60 60 / 10%);
        }

        .animation-scale-up {
            -webkit-animation-name: fade-scale-02;
            -o-animation-name: fade-scale-02;
            animation-name: fade-scale-02;
        }

        .btn-floating i {
            position: relative;
            top: 0;
        }

        .btn-floating {
            font-size: 1.415rem;
            width: 3.5rem;
            height: 3.5rem;
            margin: 0;
            padding: 0;
            text-align: center;
            border-radius: 100%;
            -webkit-box-shadow: 0 6px 10px rgb(0 0 0 / 15%);
            box-shadow: 0 6px 10px rgb(0 0 0 / 15%);
        }

        .btn-orange:hover {
            color: #fff !important;
            background-color: #F2A654 !important;
        }

        .btn-raised {
            transition: box-shadow .25s cubic-bezier(.4, 0, .2, 1);
        }

        .banner {
            width: 187px;
            height: 96px;
            background-image: linear-gradient(to right top, #051937, #004d7a, #008793, #00bf72, #a8eb12);
            box-sizing: border-box;
            padding: 10px;
            border-radius: 10px;
            font-style: italic;
        }

        .bannerText {
            color: rgb(255, 255, 255);
            font-weight: bold;
            text-align: center;
            width: 100%;
            height: 100%;
            font-family: serif;
            justify-content: center;
            font-size: 22px;

        }

        @media only screen and (max-width: 366px) {

            .bannerText {
                justify-content: center;
                font-size: 18px !important;
                padding: 0px;
            }
        }

        @media only screen and (max-width: 767px) {

            .mobile-button {
                width: 67%;
                border: 0px solid grey;
                border-radius: 10px;
            }

            .mobile-button1 {
                width: 27%;
                border: 0px solid grey;
                border-radius: 10px;
            }


        }


        /*Modal*/
        .badge-modal .modal-content {
            background: #1c1c1c;
            color: white;
        }

        .badge-modal .modal-body {
            position: relative;
        }

        .badge-modal .modal-close {
            position: absolute;
            top: 7px;
            right: 15px;
            color: white;
            background: transparent;
            border: none;
            width: fit-content;
        }

        .unlock-img-wrap {
            text-align: center;
        }

        .unlock-img-wrap img {
            width: 100%;
            max-width: 500px;
        }

        .reward-img-wrap {
            text-align: center;
        }

        .reward-img-wrap img {
            width: 100%;
            max-width: 200px;
        }

        .reward-text h4 {
            background-image: linear-gradient(70deg, #fc9800 0%, #ffea00 100%);
            text-align: center;
            line-height: initial;
            margin-top: 20px;
            padding: 7px;
            border-radius: 10px;
        }

        .reward-text h5 {
            line-height: initial;
            margin-top: 20px;
            text-align: center;
        }

        .rewards-list ul {
            list-style-type: none;
            padding: 0;
        }

        .rewards-list {
            margin-top: 10px;
            text-align: center;
        }

        @media only screen and (min-width: 767px) {
            .desktop-mode {
                display: none;
            }

        }

        @media only screen and (max-width: 766px) {
            .left {
                display: none;
            }

            .mobile-mode {
                display: none;
            }
        }

    </style>


    @php

        $user=$data->getUser
    @endphp


    <section class="product">
        <div class="blur-bg" style="background: linear-gradient(
            0deg
            , #191818 30%, rgba(25,24,24,0) 80%),url({{ $data->getGame->cover }}) center center no-repeat;
            background-size: cover;
            height: 500px;
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
            -webkit-filter: blur(12px);
            filter: blur(12px);
            z-index: 1;"></div>
        <div class="bg-color"></div>
        <div class="container" style="position: relative;">
            <div class="product-overview">

                <div class="desktop-mode w-100">
                    <div class="game-image">

                        @php $digital_data = App\Models\Digital::where('id', $data->digital)->first() @endphp
                        @if (!empty($digital_data))
                            @if($data->getGame->getPlatform!=null)
                                @if($data->getGame->getPlatform->name == 'PC (Microsoft Windows)')
                                    {{--      @if($digital_data->name == 'Steam')
                                          <div class="download" style="margin-top: 40px;">
                                              <img src="https://upload.wikimedia.org/wikipedia/commons/8/83/Steam_icon_logo.svg" alt="" style="height:35px; "/>
                                          </div>
                                          @elseif($digital_data->name == 'Uplay')
                                          <div class="download" style="margin-top: 40px">
                                              <img src="{{ asset('frontend_assets/assets/images/uplay.png') }}"style="height:35px; ">
                                          </div>
                                          @elseif($digital_data->name == 'Epic')
                                          <div class="download" style="margin-top: 40px">
                                              <img src="https://synth.agency/wp-content/uploads/2017/03/Apps-EpicGameLauncher.png" style="height:35px; ">
                                          </div>
                                          @elseif($digital_data->name == 'GOG')
                                          <div class="download" style="margin-top: 40px">
                                              <img src="{{ asset('frontend_assets/assets/images/gog.png') }}" style="height:35px; ">
                                          </div>

                                          @elseif($digital_data->name == 'Battle.net')
                                          <div class="download" style="margin-top: 40px">
                                              <img src="{{ asset('frontend_assets/assets/images/battle.png') }}" style="height:35px; ">
                                          </div>

                                          @elseif($digital_data->name == 'Windows 10')
                                          <div class="download" style="margin-top: 40px">
                                              <img src="{{ asset('frontend_assets/assets/images/10w.png') }}" style="height:35px; ">
                                          </div>

                                          @elseif($digital_data->name == 'Origin')
                                          <div class="download" style="margin-top: 40px">
                                              <img src="https://icons.iconarchive.com/icons/blackvariant/button-ui-app-pack-one/1024/Origin-icon.png" style="height:35px; ">
                                          </div>
                                          @endif --}}
                                @endif
                            @endif
                        @endif
                        <img width="100%" src="{{ $data->getGame->cover }}" alt=""/>


                        @php

                            $rating= floor($game->rating ?? 0)/20

                        @endphp


                        <p>
                        <!--<div class="placeholder" style="color: green;">
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            <span class="small">({{ $rating }})</span>
        </div>-->


                        <!-- <div class="overlay" style="position: relative;top: -23px; color: green;">

            @while($rating>0)
                            @if($rating >0.5)
                                <i class="fas fa-star"></i>
@else
                                <i class="fas fa-star-half"></i>
@endif
                            @php $rating-- @endphp
                        @endwhile

                            </div> -->
                        </p>
                    </div>

                    <br>
                    <div class="container">
                        <div class="text-dark text-center row p-3 bg-white"
                             style="border:0px solid grey; border-radius:30px; margin-top:-120px;position:relative;">
                            <div class="col-12">
                         <span
                             class="d-flex justify-content-center"> <h5>{{ str_replace('-', ' ', ucfirst($data->slug)) }}</h5> <br>&nbsp;&nbsp;
                            </div>
                            <br>
                            <div class="col-12 d-flex justify-content-center">
                                <div class="yotpo bottomLine"
                                     data-yotpo-product-id="{{$data->id}}">
                                </div>
                            </div>
                            <br>
                            <center>
                                <hr style="width:70%;">
                            </center>
                            <br>
                            <h1 align="center" class="fs-1" style="margin-right:-20px;">
                                <b>{{session('exchange')? session('exchange')['symb'].' '. number_format(getCurrency( $data->original_price ),2): '€'.$data->original_price }}</b>
                                <center>
                                    <hr style="width:70%;">
                                </center>
                            </h1>
                            <br><br>


                            <span class="d-flex justify-content-center"><h5>Sold by </h5>

                     <a href="{{ route('frontend.userprofile', ['id' => $data->getUser->id, 'name' => $data->getUser->name]) }}">

                     <b> &nbsp;{{ $user->name }}</b>



                     <img style="width:30px;height:30px;margin-top:-5px;border:0px solid grey;border-radius:20px;"
                          src="{{ asset('uploads/users/') }}/{{ $data->getUser->profile_photo_path }}"
                          class="img-circle">

                    <span class="rating-percent text-center float-left">
                        <!--<img width="20" height="20" src="https://vbrae.com/uploads/gamingconsoles/happy32.png">-->
                        @if (\App\Models\UserRating::where('buyer_id', $data->getUser->id)->exists())
                            <span class="badge bg-success"> {{ round((positive($data->getUser->id)->count() / totalrating($data->getUser->id)->count()) * 100) }}%</span>
                        @else
                            <span class="badge bg-success"> 100%</span>
                        @endif
                    </span>
                    </a>

                     </span>

                            <br> </span>
                            <center>
                                <hr style="width:70%;">
                            </center>
                            <br>

                            <div class="col-12 text-center">

                                @if($data->getGame->getPlatform->name != 'Battle.net Gift Card')
                                    <h5 class="@if($data->region == 'Global') text-success @else text-danger @endif mb-0">
                                        <small><i
                                                class="@if($data->region == 'Global') fas fa-check @else fas fa-ban @endif"></i>{{ $data->region == 'Global' ? ' This key can be activated in any country !' : ' This is a restricted key and it can be activated only in ' . $data->region . '!' }}
                                        </small>
                                    </h5>
                                @endif
                                @if($data->getGame->getPlatform->name == 'Battle.net Gift Card')
                                    <h5 class="text-danger"><i class="fas fa-ban me-2"></i>Key is valid ONLY
                                        for {{ $data->region }} accounts</h5>
                                @endif
                                <center>
                                    <hr style="width:70%;">
                                </center>
                                <br>&nbsp;
                            </div>

                            <div class="col-12 text-center">
                            @if($data->platform_id == 3 || $data->platform_id == 21)
                                @if($data->region == "ARGENTINA" || $data->region == "TURKEY" || $data->region == "BRAZIL")

                                    <!--<h4 style="color:;">How do i reedem the code if im from US or EU?</h4>-->
                                        <iframe width="100%" height="200"
                                                src="https://www.youtube.com/embed/f2r3QpFDJm8"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe> <br>
                                    @endif
                                @endif

                                <button href="" class="btn btn-info mt-1 mb-1" data-bs-trigger="focus"
                                        data-bs-container="body"
                                        data-bs-toggle="popover" data-bs-placement="top"
                                        @if($data->deliver_type == 0)
                                        @if($data->presale && $data->presale_end && \Carbon\Carbon::make($data->presale_end)->isPast()==false)

                                        data-bs-content="Key will be sent on {{\Carbon\Carbon::make($data->presale_end)->format('d M Y')}}"
                                        @else
                                        data-bs-content="Key is sent within 24 hours"
                                        @endif
                                        @else
                                        data-bs-content="Receive the key INSTANT"

                                @endif


                                <i class="fas fa-check-circle text-light"></i>
                                @if($data->deliver_type == 0)
                                    @if($data->presale && $data->presale_end && \Carbon\Carbon::make($data->presale_end)->isPast()==false)

                                        Pre Order
                                    @else
                                        Manually Delivery
                                    @endif
                                @else
                                    Instant Delivery

                                    @endif

                                    </button>
                                    <button href="#" class="btn btn-primary mt-1 mb-1" data-bs-trigger="focus"
                                            data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top"
                                            data-bs-content="Stripe & Paypal">
                                        <i class="fas fa-check-circle text-light"></i> Secure Payment
                                    </button>
                                    <button href="#" class="btn btn-success mt-1 mb-1" data-bs-trigger="focus"
                                            data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top"
                                            data-bs-content="
                                        @if(isset($cashback_bonus))
                                            @if($cashback_bonus)
                                            @foreach($cashback_bonus as $cb_bonus)
                                            @if($cb_bonus->bonus>0)
                                            {{$cb_bonus->banner_text}}
                                            @endif
                                            @endforeach

                                            @else
                                                No Cashback Available
@endif
                                            @endif
                                                ">
                                        <i class="fas fa-check-circle text-light"></i> Get Cashback
                                    </button>
                                    <br>&nbsp;
                            </div>
                            @auth
                                @if($data->deliver_type === 0 && $data->game_key_manual_count < 1)
                                    <div class="btn btn-info round col-12" style="cursor: unset;float:left;">
                                        <span class="price">Out of Stock</span>
                                    </div>
                                @elseif($data->deliver_type === 1 && $data->availableKeys->count() === 0)
                                    <div class="btn btn-info round col-12" style="cursor: unset;float:left;">
                                        <span class="price">Out of Stock</span>
                                    </div>
                                @else
                                    <div class="btn btn-info round col-12 p-4"
                                         style="border:0px solid grey; border-radius:20px" data-bs-toggle="modal"
                                         data-bs-target="#buy">
                                        <span class="icon"><i class="fas fa-shopping-basket"></i>&nbsp;&nbsp;</span>
                                        <span class="price">

                                           @if($data->presale && $data->presale_end && \Carbon\Carbon::make($data->presale_end)->isPast()==false)
                                                Pre Order
                                            @else
                                                Buy Now
                                            @endif

                                        </span>
                                    </div>
                                @endif
                            @endauth
                            @guest
                                <div class="btn btn-info round col-12 p-4" data-bs-toggle="modal" data-bs-target="#buy"
                                     style="float:left;border:0px solid grey; border-radius:20px">
                                    <span class="icon"><i class="fas fa-shopping-basket"></i>&nbsp;&nbsp;</span>
                                    <span class="price">
                                         @if($data->presale && $data->presale_end && \Carbon\Carbon::make($data->presale_end)->isPast()==false)
                                            Pre Order
                                        @else
                                            Buy Now
                                        @endif
                                    </span>
                                </div>
                            @endguest

                            <div class="mb-4 mt-4" style="text-align:left;">
                                @php
                                    $otherPlatforms = explode('-', $data->other_platforms);
                                    $count = count($otherPlatforms)
                                @endphp
                                @if($data->other_platforms)
                                    <h6 class="d-inline">Playable on:</h6>
                                @else
                                    <h6 class="d-inline">Other Genre:</h6>
                                @endif

                                @forelse($otherPlatforms as $items)
                                    @if($items)
                                        <span class="bg-secondary p-2 mb-4 text-white"
                                              style="border:0px solid grey; border-radius:20px;">{{$items}}</span>
                                    @endif
                                @empty
                                @endforelse

                                <br><br>

                                <h6 class="d-inline text-white">Other Genre:</h6>

                                @foreach($genreList as $genre)

                                    <span class="bg-secondary p-2 mb-4 text-white"
                                          style="border:0px solid grey; border-radius:20px;">{{$genre->name}}</span>

                                @endforeach

                            </div>
                            <div class="fixed-bottom d-flex justify-content-center bg-dark p-2">
                                @if(Auth::check())
                                    <div class="m-t-10 col-4 text-center"
                                         style="float:left;margin-right:5px;margin-left:10px;">
                                        <a class="btn btn-success round w-100" href="javascript:void(0)"
                                           data-bs-toggle="modal" data-bs-target="#NewMessage"><i
                                                class="icon fas fa-envelope-open m-r-5"></i>&nbsp;&nbsp;Chat<span></span></a>
                                    </div>
                                @else
                                    <div class="m-t-10 col-4" style="float:left;margin-right:5px;">
                                        <a class="btn btn-success round w-100" data-bs-toggle="modal"
                                           data-bs-target="#signin" href="javascript:void(0)"><i
                                                class="icon fas fa-envelope-open m-r-5"></i>&nbsp;&nbsp;Chat<span></span></a>
                                    </div>
                                @endif
                                @auth
                                    @if($data->deliver_type === 0 && $data->game_key_manual_count < 1)
                                        <div class="btn btn-info round col-7" style="cursor: unset;float:left;">
                                            <span class="price">Out of Stock</span>
                                        </div>
                                    @elseif($data->deliver_type === 1 && $data->availableKeys->count() === 0)
                                        <div class="btn btn-info round col-7" style="cursor: unset;float:left;">
                                            <span class="price">Out of Stock</span>
                                        </div>
                                    @else
                                        <div class="btn btn-info round col-7" data-bs-toggle="modal"
                                             data-bs-target="#buy">
                                            <span class="icon"><i class="fas fa-shopping-basket"></i>&nbsp;&nbsp;</span>
                                            <span class="price">
                                                  @if($data->presale && $data->presale_end && \Carbon\Carbon::make($data->presale_end)->isPast()==false)
                                                    Pre Order
                                                @else

                                                    Buy Now
                                                @endif</span>
                                        </div>
                                    @endif
                                @endauth
                                @guest
                                    <div class="btn btn-info round col-7" data-bs-toggle="modal" data-bs-target="#buy"
                                         style="float:left;">
                                        <span class="icon"><i class="fas fa-shopping-basket"></i>&nbsp;&nbsp;</span>
                                        <span class="price">  @if($data->presale && $data->presale_end && \Carbon\Carbon::make($data->presale_end)->isPast()==false)
                                                Pre Order
                                            @else

                                                Buy Now
                                            @endif</span>
                                    </div>
                                @endguest
                            </div>

                        </div>
                    </div>
                    {{--   <br>

                     @if(isset($cashback_bonus))
                     @if($cashback_bonus)
                     @foreach($cashback_bonus as $cb_bonus)
                     @if($cb_bonus->bonus>0)
                     <div class="m-t-10" align="center">
                       <!--  <a class="message-button btn-dark flex-center-space" data-bs-toggle="modal" data-bs-target="#signin" href="javascript:void(0)" ><i class="icon fas fa-envelope-open m-r-5"></i>Send message<span></span></a>-->
                         <div class="banner">
                             <p class="bannerText">{{$cb_bonus->banner_text}}</p>
                         </div>
                     </div>
                     @endif
                     @endforeach

                     @else
                     <div class="m-t-10" align="center">
                         <a class="message-button btn-dark flex-center-space" data-bs-toggle="modal" data-bs-target="#signin" href="javascript:void(0)" ><i class="icon fas fa-envelope-open m-r-5"></i>Send message<span></span></a>
                         <div class="banner">
                             <p class="bannerText">{{ $cashback_bonus }}</p>
                         </div>
                     </div>
                     @endif
                     @endif --}}
                </div>

                <div class="left">
                    <div class="game-image">
                        @if($data->getGame->getPlatform)
                            <div class="game-platform"
                                 style="background-color: {{ $data->getGame->getPlatform->color }}">
                                {{ $data->getGame->getPlatform->name }}
                            </div>
                        @endif
                        <div class="download"><i class="fas fa-download"></i></div>
                        @php $digital_data = App\Models\Digital::where('id', $data->digital)->first() @endphp
                        @if (!empty($digital_data))
                            @if($data->getGame->getPlatform!=null)
                                @if($data->getGame->getPlatform->name == 'PC (Microsoft Windows)')
                                    @if($digital_data->name == 'Steam')
                                        <div class="download" style="margin-top: 40px;">
                                            <img
                                                src="https://upload.wikimedia.org/wikipedia/commons/8/83/Steam_icon_logo.svg"
                                                alt="" style="height:35px; "/>
                                        </div>
                                    @elseif($digital_data->name == 'Uplay')
                                        <div class="download" style="margin-top: 40px">
                                            <img src="{{ asset('frontend_assets/assets/images/uplay.png') }}"
                                                 style="height:35px; ">
                                        </div>
                                    @elseif($digital_data->name == 'Epic')
                                        <div class="download" style="margin-top: 40px">
                                            <img
                                                src="https://synth.agency/wp-content/uploads/2017/03/Apps-EpicGameLauncher.png"
                                                style="height:35px; ">
                                        </div>
                                    @elseif($digital_data->name == 'GOG')
                                        <div class="download" style="margin-top: 40px">
                                            <img src="{{ asset('frontend_assets/assets/images/gog.png') }}"
                                                 style="height:35px; ">
                                        </div>

                                    @elseif($digital_data->name == 'Battle.net')
                                        <div class="download" style="margin-top: 40px">
                                            <img src="{{ asset('frontend_assets/assets/images/battle.png') }}"
                                                 style="height:35px; ">
                                        </div>

                                    @elseif($digital_data->name == 'Windows 10')
                                        <div class="download" style="margin-top: 40px">
                                            <img src="{{ asset('frontend_assets/assets/images/10w.png') }}"
                                                 style="height:35px; ">
                                        </div>

                                    @elseif($digital_data->name == 'Origin')
                                        <div class="download" style="margin-top: 40px">
                                            <img
                                                src="https://icons.iconarchive.com/icons/blackvariant/button-ui-app-pack-one/1024/Origin-icon.png"
                                                style="height:35px; ">
                                        </div>
                                    @endif
                                @endif
                            @endif
                        @endif
                        <img src="{{ $data->getGame->cover }}" alt=""/>
                    <!--<a class="score" href="{{ $game->url ?? '#' }}"-->
                    <!--    target="_blank">{{ floor($game->total_rating ?? 0) }}</a>-->


                        @php

                            $rating= floor($game->rating ?? 0)/20

                        @endphp

                        <p>
                        <!--<div class="placeholder" style="color: green;">
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            <span class="small">({{ $rating }})</span>
        </div>-->
                        <div class="yotpo bottomLine"
                             data-yotpo-product-id="{{$data->id}}">
                        </div>

                    <!-- <div class="overlay" style="position: relative;top: -23px; color: green;">

            @while($rating>0)
                        @if($rating >0.5)
                            <i class="fas fa-star"></i>
@else
                            <i class="fas fa-star-half"></i>
@endif
                        @php $rating-- @endphp
                    @endwhile

                        </div> -->
                        </p>


                    </div>
                    @if($data->deliver_type === 0 && $data->game_key_manual_count < 1)
                        <div class="buy-btn" style="cursor: unset">
                            <span class="price"
                                  style="border-radius: 2rem 2rem 2rem 2rem;width:100%">Out of Stock</span>
                        </div>
                    @elseif($data->deliver_type === 1 && $data->availableKeys->count() === 0)
                        <div class="buy-btn" style="cursor: unset">
                            <span class="price"
                                  style="border-radius: 2rem 2rem 2rem 2rem;width:100%">Out of Stock</span>
                        </div>
                    @else
                        <div class="buy-btn" data-bs-toggle="modal" data-bs-target="#buy">
                            <span class="icon"><i class="fas fa-shopping-basket"></i></span>
                            <span
                                class="price"> {{session('exchange')? session('exchange')['symb'].' '. number_format(getCurrency( $data->original_price ),2): '€'.$data->original_price }}</span>
                        </div>
                    @endif

                    @if(Auth::check())
                        <div class="m-t-10">
                            <a class="message-button btn-dark flex-center-space" href="javascript:void(0)"
                               data-bs-toggle="modal" data-bs-target="#NewMessage"><i
                                    class="icon fas fa-envelope-open m-r-5"></i>Send message<span></span></a>
                        </div>
                    @else
                        <div class="m-t-10">
                            <a class="message-button btn-dark flex-center-space" data-bs-toggle="modal"
                               data-bs-target="#signin" href="javascript:void(0)"><i
                                    class="icon fas fa-envelope-open m-r-5"></i>Send message<span></span></a>
                        </div>
                    @endif


                    @if(isset($cashback_bonus))
                        @if($cashback_bonus)
                            @foreach($cashback_bonus as $cb_bonus)
                                @if($cb_bonus->bonus>0)
                                    <div class="m-t-10">
                                        <!--  <a class="message-button btn-dark flex-center-space" data-bs-toggle="modal" data-bs-target="#signin" href="javascript:void(0)" ><i class="icon fas fa-envelope-open m-r-5"></i>Send message<span></span></a>-->
                                        <div class="banner">
                                            <p class="bannerText">{{$cb_bonus->banner_text}}</p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                        @else
                            <div class="m-t-10">
                                <a class="message-button btn-dark flex-center-space" data-bs-toggle="modal"
                                   data-bs-target="#signin" href="javascript:void(0)"><i
                                        class="icon fas fa-envelope-open m-r-5"></i>Send message<span></span></a> --}}
                                <div class="banner">
                                    <p class="bannerText">{{ $cashback_bonus }}</p>
                                </div>
                            </div>
                        @endif
                    @endif


                </div>

                <div class="right mobile-mode">
                    <div class="game-detail">
                        <h3 class="title"><strong>{{ str_replace('-', ' ', ucfirst($data->slug)) }}</strong></h3>
                        <div class="game-btns align-items-center">
                            @auth

                                @if (\App\Models\WishList::where('game_id', $data->getGame->id)->where('listing_id', $data->id)->where('user_id', Auth::id())->doesntExist())
                                    <span title="Add to wishlist" data-bs-toggle="modal" data-bs-target="#wishlist"><i
                                            class="fas fa-heart"></i><span class="d-none d-md-inline ms-2">Add to
                                            wishlist</span>
                                    </span>
                                @else
                                    <span title="On your wishlist"><i class="fas fa-heart"></i><span
                                            class="d-none d-md-inline ms-2">On your wishlist</span>
                                    </span>
                                @endif

                            @endauth

                            <a href="{{ route('frontend.overview', $data->game_id) }}" title="Go to Gameoverview"><i
                                    class="fas fa-gamepad"></i><span class="d-none d-md-inline ms-2">
                                    Go to Gameoverview</span></a></span>
                            <div class="social d-none sm">
                                @php
                                    session('excahnge')?
                                        $socialShareMsg = "$data->name with only session('exchange')['symb'].' '. number_format(getCurrency( $data->original_price ),2) on " . config('app.name'):
                                        $socialShareMsg = "$data->name with only € .' '. $data->original_price  on " . config('app.name')
                                @endphp
                                <a class="social-single"
                                   href="https://www.facebook.com/sharer.php?u={{ Request::url() }}"
                                   style="background-color: #3b5998;">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a class="social-single"
                                   href="https://twitter.com/share?url={{ Request::url() }}&text='{{ $socialShareMsg }}'"
                                   style="background-color: #55acee;">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a class="social-single"
                                   href="https://pinterest.com/pin/create/bookmarklet/?media={{ $data->getGame->cover }}&url={{ Request::url() }}&description={{$socialShareMsg}}"
                                   style="cursor:pointer; background-color: #cf1414;">
                                    <i class="fab fa-pinterest"></i>
                                </a>
                            </div>

                        </div>
                        @if($data->deliver_type === 0 && $data->game_key_manual_count < 1)
                            <div class="buy-btn" style="cursor: unset">
                                <span class="price"
                                      style="border-radius: 2rem 2rem 2rem 2rem;width:100%">Out of Stock</span>
                            </div>
                        @elseif($data->deliver_type === 1 && $data->availableKeys->count() === 0)
                            <div class="buy-btn" style="cursor: unset">
                                <span class="price"
                                      style="border-radius: 2rem 2rem 2rem 2rem;width:100%">Out of Stock</span>
                            </div>
                        @else
                            <div class="buy-btn" data-bs-toggle="modal" data-bs-target="#buy">
                                <span class="icon"><i class="fas fa-shopping-basket"></i></span>
                                <span
                                    class="price">{{session('exchange')? session('exchange')['symb'].' '. number_format(getCurrency( $data->original_price ),2): '€'.$data->original_price }}</span>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="right w-md-100">
                    <div class="game-content">
                        <div class="content-tab d-flex flex-column flex-sm-row">
                            <div class="d-flex">
                                <span data-target="#details" class="active me-2 d-block tab-btn"><i
                                        class="fas fa-tags me-2"></i>Details</span>
                                <span data-target="#media" class="d-block tab-btn"><i class="fas fa-images me-2"></i>Media</span>
                            </div>

                            <div class="social mt-4">
                                @php
                                    session('excahnge')?
                                   $socialShareMsg = "$data->name with only session('exchange')['symb'].' '. number_format(getCurrency( $data->original_price ),2) on " . config('app.name'):
                                   $socialShareMsg = "Buy Now $data->name for only €$data->original_price on " . config('app.name')
                                @endphp
                                <a class="social-single"
                                   href="https://www.facebook.com/sharer.php?u={{ Request::url() }}"
                                   style="background-color: #3b5998;">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a class="social-single"
                                   href="https://twitter.com/share?url={{ Request::url() }}&text='{{ $socialShareMsg }}'"
                                   style="background-color: #55acee;">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a class="social-single"
                                   href="https://pinterest.com/pin/create/bookmarklet/?media={{ $data->getGame->cover }}&url={{ Request::url() }}&description={{$socialShareMsg}}"
                                   style="cursor:pointer; background-color: #cf1414;">
                                    <i class="fab fa-pinterest"></i>
                                </a>
                            </div>
                        </div>
                        <div class="content">
                            <div id="details">
                                <div class="mb-4 mobile-mode">
                                    @php
                                        $otherPlatforms = explode('-', $data->other_platforms);
                                        $count = count($otherPlatforms)
                                    @endphp
                                    @if($data->other_platforms)
                                        <h6 class="d-inline">Playable on: </h6>
                                    @endif
                                    @forelse($otherPlatforms as $items)

                                        <span class="badge bg-primary">{{$items}}</span>

                                    @empty
                                    @endforelse

                                    &nbsp;&nbsp;

                                    <h6 class="d-inline mt-3">Other Genre: </h6>

                                    @foreach($genreList as $genre)

                                        <span class="badge bg-primary mt-3">{{$genre->name}}</span>

                                    @endforeach


                                </div>
                                <div class="details-btn mobile-mode">
                                    <span class="mobile-mode"><i class="fas fa-download"></i></span>
                                    <span class="mobile-mode">

                                         @if($data->deliver_type == 0)
                                            @if($data->presale && $data->presale_end && \Carbon\Carbon::make($data->presale_end)->isPast()==false)

                                                Pre Order
                                            @else
                                                Manually Delivery
                                            @endif
                                        @else
                                            Instant Delivery

                                        @endif

                                        <i
                                            class="fas mobile-mode fa-check-circle text-success"></i></span>
                                    <span class="mobile-mode">Secure Payment <span class="icon d-none d-sm-inline"><i
                                                class="fas mobile-mode fa-shield-alt"></i></span></span>


                                </div>
                                <div class="page-content">
                                    <div class="content-header mobile-mode">
                                        @if($data->getGame->getPlatform->name != 'Battle.net Gift Card')
                                            <small
                                                class="@if($data->region == 'Global') text-success @else text-danger @endif"><i
                                                    class="@if($data->region == 'Global') fas fa-check @else fas fa-ban @endif me-2"></i>{{ $data->region == 'Global' ? 'GLOBAL can be activated in any country !' : ' This is a restricted key and it can be activated only in ' . $data->region . '' }}
                                            </small>
                                        @endif
                                        @if($data->getGame->getPlatform->name == 'Battle.net Gift Card')
                                            <p class="text-danger"><i class="fas fa-ban me-2"></i>Key is valid ONLY
                                                for {{ $data->region }} accounts</p>
                                        @endif
                                    </div>

                                    <div class="content-body">
                                        <div class="mobile-mode">
                                            @if($data->platform_id == 3 || $data->platform_id == 21)
                                                @if($data->region == "ARGENTINA" || $data->region == "TURKEY" || $data->region == "BRAZIL")
                                                    <h4 style="color: #fff;">How do i reedem the code if im from US or
                                                        EU?</h4>
                                                    <iframe width="100%" height="400"
                                                            src="https://www.youtube.com/embed/f2r3QpFDJm8"
                                                            title="YouTube video player" frameborder="0"
                                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                            allowfullscreen></iframe>
                                                @endif
                                            @endif
                                        </div>
                                        <p>{{ $data->getGame->description }} </p>
                                    </div>

                                    <div class="content-footer mobile-mode">
                                        <span><i class="far fa-calendar-plus"></i> Created
                                            {{ $data->created_at->diffForHumans() }}</span>
                                        <span><i class="far fa-chart-bar"></i> {{ $data->clicks }} Views</span>
                                    </div>

                                </div>

                                <div class="page-content">
                                    <div class="mobile-mode">
                                        <div class="content-header user">

                                            <div class="mobile-mode">
                                                @if($data->getUser->profile_photo_path)
                                                    <img
                                                        src="{{ asset('uploads/users') }}/{{ $data->getUser->profile_photo_path }}"
                                                        alt="">

                                                @else
                                                    <img src="{{ asset('uploads/users') }}/avater{{rand(1, 11)}}.png"
                                                         alt="">
                                                @endif
                                                <a
                                                    href="{{ route('frontend.userprofile', ['id' => $data->getUser->id, 'name' => $data->getUser->name]) }}">

                                                    <h4>{{ $user->name }} &nbsp;</h4>
                                                    <div class="rating-percent">
                                                        <!--<img width="20" height="20" src="https://vbrae.com/uploads/gamingconsoles/happy32.png">-->
                                                        @if (\App\Models\UserRating::where('buyer_id', $data->getUser->id)->exists())
                                                            <span class="badge bg-success"> {{ round((positive($data->getUser->id)->count() / totalrating($data->getUser->id)->count()) * 100) }}%</span>
                                                        @else
                                                            <span class="badge bg-success"> 100%</span>
                                                        @endif
                                                    </div>


                                                </a>

                                                <div class=" d-flex mb-2">

                                                    @include('includes.listing-badge')
                                                </div>

                                            <!-- <div class="rating-percent mt-2">
												    <img width="20" height="20" src="https://dev.vbrae.com/uploads/gamingconsoles/happy32.png">
                                                    @if (\App\Models\UserRating::where('buyer_id', $data->getUser->id)->exists())
                                                {{ round((positive($data->getUser->id)->count() / totalrating($data->getUser->id)->count()) * 100) }}%
                                                    @else
                                                NA
@endif
                                                </div>
                                               -->
                                            </div>

                                        </div>

                                        {{-- <div class="rate">
                        <h4><i class="fas fa-thumbs-up text-success me-2"></i>100%</h4>
                        <small>
                          <span class="text-danger"><i class="fas fa-thumbs-down"></i> 0</span>
                          <span class="mx-2">- 0</span>
                          <span class="text-success"><i class="fas fa-thumbs-up"></i> 24</span>
                        </small>
                      </div> --}}

                                    </div>


                                    <div class="yotpo yotpo-main-widget"
                                         data-product-id="{{$data->id}}"
                                         data-price="{{session('exchange')? number_format(getCurrency( $data->original_price ),2):$data->original_price }}"
                                         data-currency="USD"
                                         data-name="{{$data->slug}}"
                                         data-url="https://dev.vbrae.com/listing/{{$data->id}}/{{$data->slug}}"
                                         data-image-url="{{ $data->getGame->cover }}">
                                    </div>
                                </div>
                                <div class="site-action">
                                    @if(Auth::check()  )
                                        @if(Auth::check() && Auth::user()->status == "1")
                                            <button type="button"
                                                    onclick="location.href='{{ route('frontend.listingForm', $data->game_id ) }}'"
                                                    class="site-action-toggle btn-raised btn btn-orange btn-floating animation-scale-up">
                                                <i class="front-icon fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                        @else
                                            <button data-bs-toggle="modal" data-bs-target="#verify-modal"
                                                    class="site-action-toggle btn-raised btn btn-orange btn-floating animation-scale-up">
                                                <i class="front-icon fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                        @endif
                                    @else
                                    <!--<button data-bs-toggle="modal" data-bs-target="#signin" class="site-action-toggle btn-raised btn btn-orange btn-floating animation-scale-up">-->
                                        <!--       <i class="front-icon fa fa-plus" aria-hidden="true"></i>-->
                                        <!--   </button>-->
                                    @endif
                                </div>
                            </div>
                            <div id="media" class="d-none">
                                @if ($data->getGame->enter == 'api')
                                    @if ($game->screenshots)
                                        @foreach ($game->screenshots as $item)
                                            <div class="media-item"
                                                 data-image="{{ str_replace('t_thumb', 't_screenshot_med_2x', \MarcReichel\IGDBLaravel\Models\Screenshot::find($item)->url) }}">
                                                <img
                                                    src="{{ str_replace('t_thumb', 't_screenshot_med_2x', \MarcReichel\IGDBLaravel\Models\Screenshot::find($item)->url) }}"
                                                    alt="">
                                                <i class="fas fa-image"></i>
                                            </div>
                                        @endforeach
                                    @endif
                                    @if ($game->videos)
                                        @foreach ($game->videos as $item)
                                            <div class="media-item"
                                                 data-video='<iframe width="560" height="315" src="https://www.youtube.com/embed/{{ \MarcReichel\IGDBLaravel\Models\GameVideo::find($item)->video_id }}?start=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'>
                                                <img
                                                    src="https://img.youtube.com/vi/{{ \MarcReichel\IGDBLaravel\Models\GameVideo::find($item)->video_id }}/mqdefault.jpg"
                                                    alt="">
                                                <i class="fas fa-play-circle"></i>
                                            </div>
                                        @endforeach
                                    @endif
                                @else
                                    <p>This game is added manually. And doesnt exist on IGDB</p>
                                @endif
                            </div>
                            @auth
                                @if (Auth::id() == $data->user_id || Auth::user()->role=="admin")
                                    <div class="my-3">
                                        <a href="{{ route('listings.deleteFromFrontend', $data->id) }}"
                                           class="btn btn-sm btn-danger"><i
                                                class="fas fa-trash"></i> Delete</a>
                                        <a href="{{ route('frontend.listingEditForm', $data->id) }}"
                                           class="btn btn-sm btn-secondary"><i class="fas fa-edit"></i> Edit</a>
                                    </div>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- image and video modal -->
    <div class="media-modal d-none"></div>
    <div class="media-overlay d-none"></div>

    <!-- buy modal  -->
    <div class="modal fade" id="buy" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content buy">
                <div class="modal-bg"></div>
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-shopping-basket me-2"></i>Buy {{ $data->getGame->name }}
                    </h5>
                    <div class="d-flex flex-row-reverse align-items-center">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                </div>
                <div class="modal-body p-0">
                    <div class="game">
                        <img src="{{ $data->getGame->cover }}" alt="">
                        <div>
                            <h5>
                                @if($data->platform_id == 3 || $data->platform_id == 21)
                                    @if($data->region == "ARGENTINA" || $data->region == "TURKEY" || $data->region == "BRAZIL")
                                        {{ str_replace('-', ' ', ucfirst($data->slug)) }}

                                    @endif
                                @else
                                    {{ $data->getGame->name }}
                                @endif
                                <small>{{ \Carbon\Carbon::parse($data->getGame->release_date)->format('Y') }}</small>
                            </h5>
                            <small>{{ $data->getGame->getPlatform->name }}</small>
                        </div>
                    </div>
                    <div class="buy-section">
                        <h4>  @if($data->deliver_type == 0)
                                @if($data->presale && $data->presale_end && \Carbon\Carbon::make($data->presale_end)->isPast()==false)

                                    Pre Order
                                @else
                                    Manually Delivery
                                @endif
                            @else
                                Instant Delivery

                            @endif <i
                                class="fas fa-check-circle text-success ms-2"></i></h4>
                        <button class="btn text-white">Secure <i class="fas fa-shield-alt"></i></button>
                        <div class="payment-gateways">
                            <span><i class="fab fa-stripe"></i></span>
                            {{-- <span><i class="fab fa-bitcoin"></i></span> --}}
                            <span><i class="fab fa-cc-mastercard"></i></span>
                            <span><i class="fab fa-cc-visa"></i></span>
                            {{-- <span><i class="fab fa-paypal"></i></span> --}}
                        </div>
                        @if($data->getGame->getPlatform->name != 'Battle.net Gift Card')
                            <p class="@if($data->region == 'Global') text-success @else text-danger @endif mb-0"><small><i
                                        class="@if($data->region == 'Global') fas fa-check @else fas fa-ban @endif"></i>{{ $data->region == 'Global' ? ' This key can be activated in any country !' : ' This is a restricted key and it can be activated only in ' . $data->region . '!' }}
                                </small>
                            </p>
                        @endif
                        @if($data->getGame->getPlatform->name == 'Battle.net Gift Card')
                            <p class="text-danger"><i class="fas fa-ban me-2"></i>Key is valid ONLY
                                for {{ $data->region }} accounts</p>
                        @endif
                        <p class="text-danger"><small><i class="fas fa-ban"></i> This is not refundable!</small></p>

                        @if($data->platform_id == 3 || $data->platform_id == 21)
                            @if($data->region == "ARGENTINA" || $data->region == "TURKEY" || $data->region == "BRAZIL")
                                <p class="text-info"><i class="fas fa-check"></i> You are required to use a vpn to
                                    redeem the code.
                            @endif
                        @endif
                        @if ($data->deliver_type != 1)
                            <p class="text-success"><i
                                    class="fas fa-check"></i>
                                <small>
                                    @if($data->presale && $data->presale_end && \Carbon\Carbon::make($data->presale_end)->isPast()==false)
                                        This is a pre order key will be available at release date
                                    @else
                                        Seller has 24 hours to send you the order
                                    @endif</small>
                            </p>
                        @endif
                        <div class="form-check">
                            <form action="{{ route('frontend.buy', $data->id) }}" method="GET">
                                <input id="agree" class="form-check-input" type="checkbox" value="" required>
                                <label class="form-check-label" for="agree">I agree</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer mobile-center">
                    <button class="btn btn-secondary mobile-button1 round" data-bs-dismiss="modal" aria-label="Close">
                        Close
                    </button>
                    @auth
                        @if ($data->user_id == Auth::id())
                            <button type="button" class="btn btn-animation btn-info mobile-button round">
                                <span class="icon"><i class="fas fa-shopping-basket"></i></span>
                                <span class="text">Your listing</span>
                            </button>
                        @else
                            <button type="submit" class="btn btn-animation btn-info mobile-button round">
                                <span class="icon"><i class="fas fa-shopping-basket"></i></span>
                                <span class="text">

                                    @if($data->presale && $data->presale_end && \Carbon\Carbon::make($data->presale_end)->isPast()==false)

                                        Pre Order
                                    @else




                                        Buy Now
                                    @endif
                                </span>
                            </button>
                        @endif
                    @endauth
                    @guest
                        <button type="submit" class="btn btn-animation btn-info mobile-button round">
                            <span class="icon"><i class="fas fa-shopping-basket"></i></span>
                            <span class="text">  @if($data->presale && $data->presale_end && \Carbon\Carbon::make($data->presale_end)->isPast()==false)

                                    Pre Order
                                @else




                                    Buy Now
                                @endif</span>
                        </button>
                        @endguest

                        </form>
                </div>
            </div>
        </div>
    </div>
    <!-- wishlist modal  -->
    <div class="modal fade" id="wishlist" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content wishlist">
                <div class="modal-bg"></div>
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-heart me-2"></i> Add to Wishlist
                    </h5>
                    <div class="d-flex flex-row-reverse align-items-center">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                </div>
                <div class="modal-body p-0">
                    <div class="game">
                        <img src="{{ $data->getGame->cover }}" alt="">
                        <div>
                            <h5>{{ $data->getGame->name }}
                                <small>{{ \Carbon\Carbon::parse($data->getGame->release_date)->format('Y') }}</small>
                            </h5>
                            <small>{{ $data->getGame->getPlatform->name }}</small>
                        </div>
                    </div>
                    <form method="post" action="{{ route('wishlist.store') }}">
                        @csrf
                        <div class="p-3" style="background-color: #1b1b1b;">
                            <div class="form-check">
                                <input id="price-input" name="notification" class="form-check-input" type="checkbox"
                                       value="yes">
                                <label class="form-check-label" for="price-input">
                                    <i class="fas fa-bell me-2"></i> Send notifications
                                </label>
                            </div>
                            <div id="price">
                                <div class="form-group">
                                    <label for="maximum">Maximum Price</label>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="basic-addon1">€</span>
                                        <input type="text" name="price" class="form-control" placeholder="">
                                    </div>
                                    <small><i class="fas fa-info-circle me-1"></i>Leave blank if you want to get a
                                        notification for each {{ $data->getGame->name }} listing.</small>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Close</button>

                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                    <input type="hidden" name="game_id" value="{{ $data->getGame->id }}">
                    <input type="hidden" name="listing_id" value="{{ $data->id }}">
                    <button type="submit" class="btn btn-animation btn-danger mb-2">
                        <span class="icon"><i class="fas fa-heart"></i></span>
                        <span class="text">Add Wishlist</span>
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    {{-- Start Modal for new messages --}}
    <div class="modal fade modal-fade-in-scale-up modal-primary" id="NewMessage" tabindex="-1" role="dialog">
        <div class="modal-dialog user-dialog">
            <div class="modal-content">

                {{-- Modal Header --}}
                <div class="modal-header">
                    {{-- Background pattern --}}
                    <div class="background-pattern"
                         style="background-image: url('{{ asset('/img/game_pattern.png') }}');"></div>
                    {{-- Background color --}}
                    <div class="background-color"></div>
                    {{-- Modal title --}}
                    <div class="title">
                        {{-- Close button --}}
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span><span
                                class="sr-only">{{ trans('listings.modal.close') }}</span>
                        </button>
                        {{-- Title --}}
                        <h4 class="modal-title">
                            <i class="fas fa-envelope-open m-r-5"></i>
                            <strong>New_message</strong>
                        </h4>
                    </div>
                </div>

                {{-- Open new form for adding a new message --}}
                <form method="POST" id="sendMsgToSeller2" action="" role="form">

                    <div class="modal-body">

                        {{-- Show selected user --}}
                        <div class="selected-user {{ !isset($data->getUser) ? 'hidden' : 'flex-center-space' }}"
                             id="selected-user">
                            {{-- User infos (avatar and name) --}}
                            <div class="selected-user-info">
              <span class="avatar  m-r-10" style="vertical-align: inherit !important;">
                <img src="{{ asset('uploads/users/') }}/{{ $data->getUser->profile_photo_path }}"
                     class="img-circle"><i></i></span><input name="recipient" type="hidden"
                                                             value="{{ $data->getUser->id }}"> {{ $data->getUser->name }}
                            </div>
                        </div>


                        <!-- Start  Main Content -->
                        <div class="main-content">

                            {{-- Check if user is already defined --}}


                            <div id="user-selected" class="{{ isset($user) ? '' : 'hidden'}}">
                                {{-- Textare for message input --}}
                                <textarea id="tempmsg" autocomplete="off" class="form-control input m-t-10" rows="5"
                                          name="message" placeholder="Enter your message..."></textarea>
                            </div>

                        </div>
                        <!-- End Main Content -->
                        @csrf
                        <input type="hidden" name="type" value="user">
                        <input type="hidden" name="room_id" id="room_id" value="{{$room_id}}">
                        <input type="hidden" name="temporaryMsgId" value="temp_{{ Auth::id() }}">
                        <input type="hidden" name="to_id" value="{{$data->user_id}}">
                        <input type="hidden" name="from_id" value="{{Auth::id()}}">

                    </div>

                    {{-- Close new form for adding a new message --}}

                    <div class="modal-footer" id="search_footer">

                        {{-- Close button --}}
                        <a href="javascript:void(0)" data-bs-dismiss="modal" aria-label="Close" data-bjax
                           class="btn btn-dark btn-lg">close</a>

                        {{-- Submit button --}}
                        <button id="send-message" class="btn btn-primary btn-animate btn-animate-vertical btn-lg"
                                type="submit">
          <span>
            <i class="icon fas fa-paper-plane" aria-hidden="true"></i>
          </span>
                        </button>

                    </div>
                </form>


            </div>
        </div>
    </div>
    {{-- End Modal for for new messages --}}




    @php

        $userType=['bronze','silver','gold','diamond'];
        $cashbackParam=['2','4','6','8'];



                         $buyParameter=[10,30,70,150];
                   $parameter=[50,100,1000,3500];
                   $sellerName=['Munifex ','Imaginifer ','Primus Pilus ','Legatus Legionis'];
                   $buyerrName=['Plebeian ','Patrician ','Equestrian ','Senator'];
                   $sCommission=['0.5','1','1.5','3']
    @endphp

    @foreach($userType as $key=>$type)


        <div class="modal fade modal-fade-in-scale-up badge-modal modal-primary" id="reward-modal{{$key}}" tabindex="-1"
             role="dialog" aria-labelledby="reward-modal{{$key}}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body p-5">
                        <div class="reward-img-wrap">
                            <img src="{{ asset('uploads/badge') }}/{{$type}}_buyer.webp" width="120" alt="not-found">

                        </div>
                        <div class="reward-text">
                            <h4>WHAT IT GIVES</h4>
                            <div class="rewards-list text-left">
                                <ul>
                                    <li> {{$cashbackParam[$key]}}% Cashback</li>
                                    <!--<li>- Cashback</li>-->
                                    <li>Complete {{$buyParameter[$key]}} purchase to unlock this Level</li>

                                </ul>
                            </div>
                        </div>
                        <button type="button" class="close modal-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @foreach($userType as $key=>$type)


        <div class="modal fade modal-fade-in-scale-up badge-modal modal-primary" id="reward-modal{{$key}}-seller"
             tabindex="-1" role="dialog" aria-labelledby="reward-modal{{$key}}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body p-5">
                        <div class="reward-img-wrap">
                            <img src="{{ asset('uploads/badge') }}/{{$type}}_seller.webp" width="120" alt="not-found">

                        </div>
                        <div class="reward-text">
                            <h4>WHAT IT GIVES</h4>
                            <div class="rewards-list text-left">
                                <ul>
                                    <li> Reduce {{$sCommission[$key]}}% Sale Commission</li>
                                    <!--<li>- Cashback</li>-->
                                    <li>Complete {{$parameter[$key]}} Sale to unlock this Level</li>

                                </ul>
                            </div>
                        </div>
                        <button type="button" class="close modal-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection

@php

    $badge=App\Models\User::badge($user)
@endphp

@section('js')

    <script>
        const tabBtns = document.querySelectorAll('.tab-btn')
        const contentSections = document.querySelectorAll('.content > div')
        tabBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                contentSections.forEach(content => content.classList.add('d-none'))
                document.querySelector(btn.getAttribute('data-target')).classList.remove('d-none')
            })
        })

        const socialBtns = $(".social-single");
        socialBtns.on("click", function (e) {
            e.preventDefault();
            const target = $(this).attr("href");
            window.open(target, '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');
        })
        const buyBtnModal = $("#{{$badge['k_buy']}}");
        buyBtnModal.on("click", function (e) {

            console.log("Hello Mazharul");
        })
    </script>

    <script type="text/javascript">

        const sendMsgToSeller2 = document.getElementById('sendMsgToSeller2');
        sendMsgToSeller2.addEventListener('submit', function (e) {
            e.preventDefault();
            var options = {
                method: 'post',
                url: '/send-message',
                data: new FormData(this)
            }
            axios(options).then(function (response) {
                console.log(response);
                if (response.data.success == true) {
                    alert('Message send to seller.');
                    document.getElementById('tempmsg').value = '';
                    location.reload();
                }


            });


        });

    </script>

    <script>
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
    </script>
    <script>
        var popover = new bootstrap.Popover(document.querySelector('.popover-dismiss'), {
            trigger: 'focus'
        })
    </script>
@endsection
