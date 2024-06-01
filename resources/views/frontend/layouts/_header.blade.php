@php
    use Rajurayhan\Bndatetime\BnDateTimeConverter;
    $dateConverter = new BnDateTimeConverter();
    $mytime = Carbon\Carbon::now();
    $date = $mytime->toDateTimeString();
@endphp
<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-2x fa-angle-up"></i></button>
<div class="top_header_bg">
    <div class="custom_container top_header_container">
        <div class="logo_part">
            <a href="{{ URL('/') }}"><img width="251" height="70" src="{{ asset(settings()->logo) }}"
                    alt=""></a>
        </div>

        <div class="time_part">
            <i class="fas fa-map-marker-alt"></i>
            <small class="time_date">ঢাকা<i style="margin: 0px 10px;"
                    class="far fa-calendar"></i>{{ $dateConverter->getConvertedDateTime($date, 'BnEn', '') }}</small>
        </div>
        <div class="social_part">
            <ul class="social">

                @foreach (socials() as $social)
                    <li><a target="_blank" href="{{ $social->url }}"><i class="{{ $social->icon_code }}"></i></a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>







{{-- <div class="-mid-bar">

    <div class="container">
        <div class="row align-items-center">
            <div class="col-sm-3 col-lg-2">
                <div class="-logo">
                    <a href="{{ URL('/') }}"><img src="{{ asset(settings()->logo) }} " alt="logo"></a>
                </div>
            </div>
            <div class="col-sm-8 offset-sm-1 offset-lg-2">
                <div class="-header-adds">
                    @if (advertisement())
                        {!! advertisement()->header_ads !!}
                    @else
                        <a href="  https://www.google.com/ " target="_blank">
                            <img src=" {{ asset('public/frontend/img/header-adds/adds.jpg') }} "
                                alt="{{ asset('public/frontend/img/header-adds/adds.jpg') }}">
                        </a>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div> --}}
