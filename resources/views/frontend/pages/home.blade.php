@extends('frontend.master')
@section('meta_content')
    <meta name="keywords" content="{{ seooptimization()->keywords }}">
    <meta name="title" content="{{ seooptimization()->meta_title }}">
    <meta name="description" content="{{ seooptimization()->meta_description }}">
    <meta name="author" content="{{ seooptimization()->author }}">

    <meta property="og:keywords" content="{{ seooptimization()->keywords }}">
    <meta property="og:title" content="{{ seooptimization()->meta_title }}">
    <meta property="og:description" content="{{ seooptimization()->meta_description }}">
    <meta property="og:author" content="{{ seooptimization()->author }}">
    <meta property="og:image" content="{{ asset(settings()->logo) }}" />
@endsection
@section('main_content')
@php
use Rajurayhan\Bndatetime\BnDateTimeConverter;
$dateConverter = new BnDateTimeConverter();
$mytime = Carbon\Carbon::now();
$date = $mytime->toDateTimeString();
@endphp
    <!--  Top News Section -->

    <div class="top-news-section">
        <div class="home_page_part_one_bg">
            <div class="container-fluid home_page_part_one">
                <div class="home_page_part_one_left home_page_part_one_left_left_flex">
                    <div class="home_page_part_one_left_left">
                        <div class="opinion-contents">
                            @if ($top_news3->isNotEmpty())

                                @foreach ($top_news3 as $top_news)
                                    @php
                                        $images = json_decode($top_news->image);
                                    @endphp
                                    <div class="leatest_three_post d-flex">
                                        @if ($images != '')
                                            @foreach ($images as $image)
                                                @if (File::exists($image))
                                                    <a
                                                        href="@if ($top_news->news_categoryslug) {{ route(strtolower($top_news->news_categoryslug) . '.details', ['id' => $top_news->id, 'slug' => \Illuminate\Support\Str::slug($top_news->title)]) }} @endif">
                                                        <img width="500" height="500" src="{{ asset($image) }}"
                                                            alt="top-news">
                                                    </a>
                                                    <h2 class="title ml-2"> <a
                                                            href="@if ($top_news->news_categoryslug) {{ route(strtolower($top_news->news_categoryslug) . '.details', ['id' => $top_news->id, 'slug' => \Illuminate\Support\Str::slug($top_news->title)]) }} @endif">{{ \Illuminate\Support\Str::limit($top_news->title, 60) }}</a>
                                                    </h2>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                @endforeach
                            @endif




                        </div>
                        @if ($ads->isNotEmpty())
                            @foreach ($ads as $ad)
                                @if ($ad->header_ads !== '' && !empty($ad->header_ads))
                                    <div class="custom_container home_page_ad">
                                        <img class="alignnone size-full wp-image-130312"
                                            src="{{ asset('public/public/header_ads/' . $ad->header_ads) }}"
                                            alt="Header Ads" width="878" height="476" />
                                    </div>
                                @endif
                            @endforeach
                        @endif

                    </div>
                    <div class="home_page_part_one_left_right home_page_pat_one_left_right_grid">

                        @if ($top_sliding_news3->isNotEmpty())

                            @foreach ($top_sliding_news3 as $top_sliding_news)
                                @php
                                    $images = json_decode($top_sliding_news->image);
                                @endphp
                                <div class="leatest_three_post">

                                    @if ($images != '')
                                        @foreach ($images as $image)
                                            @if (File::exists($image))
                                                <a
                                                    href="
                                    @if ($top_sliding_news->news_categoryslug) @if (Route::has(strtolower($top_sliding_news->news_categoryslug)))
                                        {{ route(strtolower($top_sliding_news->news_categoryslug) . '.details', ['id' => $top_sliding_news->id, 'slug' => \Illuminate\Support\Str::slug($top_sliding_news->title)]) }} @endif
                                        @endif
                                            ">
                                                    <img width="500" height="280" src="{{ asset($image) }}"
                                                        alt="{{ asset($image) }}">

                                                </a>
                                                <h2 class="title ml-2"> <a
                                                        href="@if ($top_sliding_news->news_categoryslug) @if (Route::has(strtolower($top_sliding_news->news_categoryslug)))
                                        {{ route(strtolower($top_sliding_news->news_categoryslug) . '.details', ['id' => $top_sliding_news->id, 'slug' => \Illuminate\Support\Str::slug($top_sliding_news->title)]) }} @endif
                                        @endif">{{ $top_sliding_news->title }}</a>
                                                </h2>

                                                </a>
                                                <p>{{ \Illuminate\Support\Str::limit($top_sliding_news->summary, 120) }}
                                                </p>
                                            @endif
                                        @endforeach
                                    @endif


                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>
                <div class="home_page_part_one_right">
                    <div class="home_sidebar_two_post">

                        @if ($top_rightside_news1->isNotEmpty())

                            @foreach ($top_rightside_news1 as $top_rightside_news)
                                <h2 class="home_sidebar_cat_title">
                                    <a
                                        href="@if ($top_rightside_news->news_categoryslug) {{ route(strtolower($top_rightside_news->news_categoryslug) . '.details', ['id' => $top_rightside_news->id, 'slug' => \Illuminate\Support\Str::slug($top_rightside_news->title)]) }} @endif">
                                        <strong>{{ $top_rightside_news->news_category }}</strong></a>
                                    <a href="@if ($top_rightside_news->news_categoryslug) {{ route(strtolower($top_rightside_news->news_categoryslug) . '.details', ['id' => $top_rightside_news->id, 'slug' => \Illuminate\Support\Str::slug($top_rightside_news->title)]) }} @endif"
                                        class="read-more d-flex justify-content-end align-items-center">
                                        <p>{{ __('আরও পড়ুন') }}</p>
                                        <p><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></p>
                                    </a>
                                </h2>

                                @php
                                    $images = json_decode($top_rightside_news->image);
                                @endphp
                                <div class="leatest_three_post d-flex">
                                    @if ($images != '')
                                        @foreach ($images as $image)
                                            @if (File::exists($image))
                                                <a class="home_sidebar_posts"
                                                    href="@if ($top_rightside_news->news_categoryslug) {{ route(strtolower($top_rightside_news->news_categoryslug) . '.details', ['id' => $top_rightside_news->id, 'slug' => \Illuminate\Support\Str::slug($top_rightside_news->title)]) }} @endif">
                                                    <img width="300" height="400" src="{{ asset($image) }}"
                                                        alt="top-rightside-news">
                                                    <div class="flex_inner">
                                                        <h2 class="title ml-2"> <a
                                                                href="@if ($top_rightside_news->news_categoryslug) {{ route(strtolower($top_rightside_news->news_categoryslug) . '.details', ['id' => $top_rightside_news->id, 'slug' => \Illuminate\Support\Str::slug($top_rightside_news->title)]) }} @endif">{{ \Illuminate\Support\Str::limit($top_rightside_news->title, 40) }}</a>
                                                        </h2>
                                                        {{-- <p style="margin-top: 5px;color: #696464;"> লায়ন মো. গনি মিয়া বাবুল </p> --}}
                                                    </div>
                                                </a>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            @endforeach
                        @endif




                    </div>

                    @if ($ads->isNotEmpty())
                        @foreach ($ads as $ad)
                            @if ($ad->sidebar_ads !== '' && !empty($ad->sidebar_ads))
                                <div class="custom_container home_page_ad">
                                    <img class="alignnone size-full wp-image-130312"
                                        src="{{ asset('public/public/sidebar_ads/' . $ad->sidebar_ads) }}" alt="Header Ads"
                                        width="878" height="476" />
                                </div>
                            @endif
                        @endforeach
                    @endif


                    @if ($ads->isNotEmpty())
                        @foreach ($ads as $ad)
                            @if ($ad->before_post_ads !== '' && !empty($ad->before_post_ads))
                                <div class="custom_container home_page_ad">
                                    <img class="alignnone size-full wp-image-130312"
                                        src="{{ asset('public/public/before_post_ads/' . $ad->before_post_ads) }}"
                                        alt="Header Ads" width="100%" height="100%" />
                                </div>
                            @endif
                        @endforeach
                    @endif




                </div>
            </div>
        </div>




        <div class="home_page_part_one_bg opinion-contents">
            <div class="container-fluid home_page_part_one">
                <div class="home_page_part_one_left">
                    <div class="leatest_posts">


                        @if ($latestnews12->isNotEmpty())

                            @foreach ($latestnews12 as $latestnews)
                                @php
                                    $images = json_decode($latestnews->image);
                                @endphp
                                <div class="leatest_twelve_post">
                                    @if ($images != '')
                                        @foreach ($images as $image)
                                            @if (File::exists($image))
                                                <a
                                                    href="@if ($latestnews->news_categoryslug) {{ route(strtolower($latestnews->news_categoryslug) . '.details', ['id' => $latestnews->id, 'slug' => \Illuminate\Support\Str::slug($latestnews->title)]) }} @endif">
                                                    <img width="500" height="280" src="{{ asset($image) }}"
                                                        alt="top-news">
                                                </a>
                                                <h2 class="title"> <a
                                                        href="@if ($latestnews->news_categoryslug) {{ route(strtolower($latestnews->news_categoryslug) . '.details', ['id' => $latestnews->id, 'slug' => \Illuminate\Support\Str::slug($latestnews->title)]) }} @endif">{{ \Illuminate\Support\Str::limit($latestnews->title, 60) }}</a>
                                                </h2>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            @endforeach
                        @endif


                    </div>
                </div>
                <div class="home_page_part_one_right">
                    <div class="leatest_popular_container">
                        <div class="button_group">
                            <button class="leatest_btn">{{ __('সর্বশেষ') }}</button>
                            <Button class="popular_btn">{{ __('পাঠকপ্রিয়') }}</Button>
                        </div>
                        <div class="fixed_height">
                            <ul class="first_item">

                                @if ($latestnews12->isNotEmpty())

                                    @foreach ($latestnews12 as $latestnews)
                                        @php
                                            $images = json_decode($latestnews->image);
                                        @endphp
                                        <div class="leatest_three_post d-flex">
                                            @if ($images != '')
                                                @foreach ($images as $image)
                                                    @if (File::exists($image))
                                                        <a
                                                            href="@if ($latestnews->news_categoryslug) {{ route(strtolower($latestnews->news_categoryslug) . '.details', ['id' => $latestnews->id, 'slug' => \Illuminate\Support\Str::slug($latestnews->title)]) }} @endif">
                                                            <img width="500" height="280" src="{{ asset($image) }}"
                                                                alt="top-news"> </a>

                                                        <p class="title ml-2"> <a
                                                                href="@if ($latestnews->news_categoryslug) {{ route(strtolower($latestnews->news_categoryslug) . '.details', ['id' => $latestnews->id, 'slug' => \Illuminate\Support\Str::slug($latestnews->title)]) }} @endif">{{ \Illuminate\Support\Str::limit($latestnews->title, 60) }}</a>
                                                        </p>
                                                        </a>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </div>
                                        <hr>
                                    @endforeach
                                @endif

                            </ul>

                            <ul class="second_item">

                                @if ($popularsnewsall->isNotEmpty())

                                    @foreach ($popularsnewsall as $popularnews)
                                        @php
                                            $images = json_decode($popularnews->image);
                                        @endphp
                                        <div class="leatest_three_post d-flex">
                                            @if ($images != '')
                                                @foreach ($images as $image)
                                                    @if (File::exists($image))
                                                        <a
                                                            href="@if ($popularnews->news_categoryslug) {{ route(strtolower($popularnews->news_categoryslug) . '.details', ['id' => $popularnews->id, 'slug' => \Illuminate\Support\Str::slug($popularnews->title)]) }} @endif">
                                                            <img width="500" height="280" src="{{ asset($image) }}"
                                                                alt="top-news"> </a>

                                                        <p class="title ml-2"> <a
                                                                href="@if ($popularnews->news_categoryslug) {{ route(strtolower($popularnews->news_categoryslug) . '.details', ['id' => $popularnews->id, 'slug' => \Illuminate\Support\Str::slug($popularnews->title)]) }} @endif">{{ \Illuminate\Support\Str::limit($popularnews->title, 60) }}</a>
                                                        </p>
                                                        </a>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </div>
                                        <hr>
                                    @endforeach
                                @endif

                            </ul>
                        </div>
                        <div class="allnews"><a href="{{ url('/') }}">{{ __('আজকের সর্বশেষ সবখবর') }}</a>
                        </div>
                    </div>

                    @if ($ads->isNotEmpty())
                        @foreach ($ads as $ad)
                            @if ($ad->before_post_ads !== '' && !empty($ad->before_post_ads))
                                <div class="custom_container home_page_ad">
                                    <img class="alignnone size-full wp-image-130312"
                                        src="{{ asset('public/public/before_post_ads/' . $ad->before_post_ads) }}"
                                        alt="Header Ads" width="100%" height="100%" />
                                </div>
                            @endif
                        @endforeach
                    @endif

                    @if ($ads->isNotEmpty())
                        @foreach ($ads as $ad)
                            @if ($ad->after_post_ads !== '' && !empty($ad->after_post_ads))
                                <div class="custom_container home_page_ad">
                                    <img class="alignnone size-full wp-image-130312"
                                        src="{{ asset('public/public/after_post_ads/' . $ad->after_post_ads) }}"
                                        alt="Header Ads" width="100%" height="100%" />
                                </div>
                            @endif
                        @endforeach
                    @endif


                </div>
            </div>
        </div>
    </div>
    <!--  Top News Section -->


    <!--  Categoriywise Post Start -->



    <!--  Category 1,5 -->
    <div class="home_page_part_one_bg">
        <div class="container-fluid home_page_part_one">
            <div class="home_page_part_one_left cs_border-right">
                @if ($category1 != '' && $category1 != null)
                    <h2 class="home_sidebar_cat_title">
                        <a
                            href="{{ url('/' . $category1->slug . '/' . $category1->slug) }}"><strong>{{ $category1->name }}</strong></a>
                        <a href="{{ url('/' . $category1->slug . '/' . $category1->slug) }}"
                            class="read-more d-flex justify-content-end align-items-center">
                            <p>{{ __('আরও পড়ুন') }}</p>
                            <p><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></p>
                        </a>
                    </h2>
                @endif
                <div class="home_page_part_one_left_left_flex">
                    <div class="home_page_part_one_left_right home_page_pat_one_left_right_grid">



                        @if ($category_id1_post4 != '' && $category_id1_post4 != null)

                            @foreach ($category_id1_post4 as $catpost1)
                                @if ($catpost1->image)
                                    @php
                                        $images = json_decode($catpost1->image);
                                    @endphp
                                    @if ($images != '')
                                        @foreach ($images as $image)
                                            <ul class="single_right_item">
                                                <a class="home_second_part_grid"
                                                    href="@if ($catpost1->news_categoryslug) {{ route(strtolower($catpost1->news_categoryslug) . '.details', ['id' => $catpost1->id, 'slug' => \Illuminate\Support\Str::slug($catpost1->title)]) }} @endif">
                                                    <img width="500" height="280" src="{{ asset($image) }}"
                                                        class="attachment-custom-size size-custom-size wp-post-image"
                                                        alt="{{ \Illuminate\Support\Str::slug($catpost1->title) }}" />
                                                    <li class="tab_post">{{ $catpost1->title }}</li>
                                                </a>
                                            </ul>
                                        @endforeach
                                    @endif
                                @endif
                            @endforeach

                        @endif




                    </div>
                    <div class="home_page_part_one_left_left">
                        <ul class="leatest_in_a_cat_postlopp">


                            @if ($category_id1_post7 != '' && $category_id1_post7 != null)

                                @foreach ($category_id1_post7 as $catpost7)
                                    <ul class="single_right_item">
                                        <li class="tab_post"><a
                                                href="@if ($catpost7->news_categoryslug) {{ route(strtolower($catpost7->news_categoryslug) . '.details', ['id' => $catpost7->id, 'slug' => \Illuminate\Support\Str::slug($catpost7->title)]) }} @endif">{{ \Illuminate\Support\Str::limit($catpost7->title, 40) }}</a>
                                        </li>
                                    </ul>
                                @endforeach

                            @endif


                        </ul>
                    </div>
                </div>

            </div>
            <div class="home_page_part_one_right">
                @if ($category5 != '' && $category5 != null)
                    <h2 class="home_sidebar_cat_title">
                        <a
                            href="{{ url('/' . $category5->slug . '/' . $category5->slug) }}"><strong>{{ $category5->name }}</strong></a>
                        <a href="{{ url('/' . $category5->slug . '/' . $category5->slug) }}"
                            class="read-more d-flex justify-content-end align-items-center">
                            <p>{{ __('আরও পড়ুন') }}</p>
                            <p><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></p>
                        </a>
                    </h2>
                @endif
                <ul class="leatest_in_a_cat_postlopp">


                    @if ($category_id5_post4 != '' && $category_id5_post4 != null)

                        @foreach ($category_id5_post4 as $catpost4)
                            @if ($catpost4->image)
                                @php
                                    $images = json_decode($catpost4->image);
                                @endphp
                                @if ($images != '')
                                    @foreach ($images as $image)
                                        <ul class="single_right_item">
                                            <a
                                                href="@if ($catpost4->news_categoryslug) {{ route(strtolower($catpost4->news_categoryslug) . '.details', ['id' => $catpost4->id, 'slug' => \Illuminate\Support\Str::slug($catpost4->title)]) }} @endif">
                                                <img width="500" height="280" src="{{ asset($image) }}"
                                                    class="attachment-custom-size size-custom-size wp-post-image"
                                                    alt="{{ \Illuminate\Support\Str::limit($catpost4->title, 40) }}" />

                                            </a>
                                            <li class="tab_post ml-2"><a
                                                    href="@if ($catpost4->news_categoryslug) {{ route(strtolower($catpost4->news_categoryslug) . '.details', ['id' => $catpost4->id, 'slug' => \Illuminate\Support\Str::slug($catpost4->title)]) }} @endif">{{ \Illuminate\Support\Str::limit($catpost4->title, 40) }}</a>
                                            </li>
                                        </ul>
                                    @endforeach
                                @endif
                            @endif
                        @endforeach

                    @endif




                </ul>
            </div>
        </div>
    </div>
    <!--  Category 1,5 end -->


    <!--  Category 2,3 -->
    <div class="home_page_part_one_bg opinion-contents">
        <div class="container-fluid home_page_part_one">
            <div class="home_page_part_one_left">
                @if ($category2 != '' && $category2 != null)
                    <h2 class="home_sidebar_cat_title">
                        <a
                            href="{{ url('/' . $category2->slug . '/' . $category2->slug) }}"><strong>{{ $category2->name }}</strong></a>
                        <a href="{{ url('/' . $category2->slug . '/' . $category2->slug) }}"
                            class="read-more d-flex justify-content-end align-items-center">
                            <p>{{ __('আরও পড়ুন') }}</p>
                            <p><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></p>
                        </a>
                    </h2>
                @endif
                <div class="home_page_part_one_left_left_flex">
                    <div class="home_page_part_one_left_right home_page_pat_one_left_right_grid">
                        @if ($category_id2_post4 != '' && $category_id2_post4 != null)

                            @foreach ($category_id2_post4 as $catpost1)
                                @if ($catpost1->image)
                                    @php
                                        $images = json_decode($catpost1->image);
                                    @endphp
                                    @if ($images != '')
                                        @foreach ($images as $image)
                                            <ul class="single_right_item">
                                                <a class="home_second_part_grid"
                                                    href="@if ($catpost1->news_categoryslug) {{ route(strtolower($catpost1->news_categoryslug) . '.details', ['id' => $catpost1->id, 'slug' => \Illuminate\Support\Str::slug($catpost1->title)]) }} @endif">
                                                    <img width="500" height="280" src="{{ asset($image) }}"
                                                        class="attachment-custom-size size-custom-size wp-post-image"
                                                        alt="{{ \Illuminate\Support\Str::slug($catpost1->title) }}" />
                                                    <li class="tab_post">{{ $catpost1->title }}</li>
                                                </a>
                                            </ul>
                                        @endforeach
                                    @endif
                                @endif
                            @endforeach

                        @endif






                    </div>
                    <div class="home_page_part_one_left_left">
                        <ul class="leatest_in_a_cat_postlopp">
                            @if ($category_id2_post7 != '' && $category_id2_post7 != null)

                                @foreach ($category_id2_post7 as $catpost7)
                                    <ul class="single_right_item">
                                        <li class="tab_post"><a
                                                href="@if ($catpost7->news_categoryslug) {{ route(strtolower($catpost7->news_categoryslug) . '.details', ['id' => $catpost7->id, 'slug' => \Illuminate\Support\Str::slug($catpost7->title)]) }} @endif">{{ \Illuminate\Support\Str::limit($catpost7->title, 50) }}</a>
                                        </li>
                                    </ul>
                                @endforeach

                            @endif


                        </ul>
                    </div>
                </div>
            </div>

            <div class="home_page_part_one_right">
                @if ($category3 != '' && $category3 != null)
                    <h2 class="home_sidebar_cat_title">
                        <a
                            href="{{ url('/' . $category3->slug . '/' . $category3->slug) }}"><strong>{{ $category3->name }}</strong></a>
                        <a href="{{ url('/' . $category3->slug . '/' . $category3->slug) }}"
                            class="read-more d-flex justify-content-end align-items-center">
                            <p>{{ __('আরও পড়ুন') }}</p>
                            <p><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></p>
                        </a>
                    </h2>
                @endif
                <ul class="leatest_in_a_cat_postlopp">

                    @if ($category_id3_post3 != '' && $category_id3_post3 != null)

                        @foreach ($category_id3_post3 as $catpost3)
                            @if ($catpost3->image)
                                @php
                                    $images = json_decode($catpost3->image);
                                @endphp
                                @if ($images != '')
                                    @foreach ($images as $image)
                                        <ul class="single_right_item flex_column">
                                            <a
                                                href="@if ($catpost3->news_categoryslug) {{ route(strtolower($catpost3->news_categoryslug) . '.details', ['id' => $catpost3->id, 'slug' => \Illuminate\Support\Str::slug($catpost3->title)]) }} @endif">
                                                <img width="500" height="280" src="{{ asset($image) }}"
                                                    class="attachment-custom-size size-custom-size wp-post-image"
                                                    alt="" />
                                            </a>
                                            <li class="tab_post"><a
                                                    href="@if ($catpost3->news_categoryslug) {{ route(strtolower($catpost3->news_categoryslug) . '.details', ['id' => $catpost3->id, 'slug' => \Illuminate\Support\Str::slug($catpost3->title)]) }} @endif">
                                                    {{ \Illuminate\Support\Str::limit($catpost3->title, 40) }}
                                                </a></li>
                                        </ul>
                                    @endforeach
                                @endif
                            @endif
                        @endforeach

                    @endif


                </ul>
            </div>
        </div>
    </div>
    <!--  Category 2,3 end -->



    <!--  Category 4 -->
    <div class="home_page_part_one_bg">
        <div class="container-fluid home_page_part_one">
            <div class="home_page_part_one_left cs_border-right">
                @if ($category4 != '' && $category4 != null)
                    <h2 class="home_sidebar_cat_title">
                        <a
                            href="{{ url('/' . $category4->slug . '/' . $category4->slug) }}"><strong>{{ $category4->name }}</strong></a>
                        <a href="{{ url('/' . $category4->slug . '/' . $category4->slug) }}"
                            class="read-more d-flex justify-content-end align-items-center">
                            <p>{{ __('আরও পড়ুন') }}</p>
                            <p><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></p>
                        </a>
                    </h2>
                @endif
                <div class="three_col_flex">
                    <div style="flex: 1;" class="three_firest">
                        <div class="row type-sect-three-left">


                            @if ($category_id4_post2 != '' && $category_id4_post2 != null)

                                @foreach ($category_id4_post2 as $catpost2)
                                    @if ($catpost2->image)
                                        @php
                                            $images = json_decode($catpost2->image);
                                        @endphp
                                        @if ($images != '')
                                            @foreach ($images as $image)
                                                <div class="col-12 col-md-6 col-lg-6 col-xl-12 box-news">
                                                    <a href="@if ($catpost2->news_categoryslug) {{ route(strtolower($catpost2->news_categoryslug) . '.details', ['id' => $catpost2->id, 'slug' => \Illuminate\Support\Str::slug($catpost2->title)]) }} @endif"
                                                        class="news-item news-item-box pt-2 m-pb-2">
                                                        <img width="500" height="280" src="{{ asset($image) }}"
                                                            class="attachment-custom-size size-custom-size wp-post-image"
                                                            alt="{{ $catpost2->title }}" />
                                                        <h2 class="title">{{ $catpost2->title }}</h2>
                                                    </a>
                                                </div>
                                            @endforeach
                                        @endif
                                    @endif
                                @endforeach

                            @endif





                        </div>
                    </div>
                    <div style="flex: 1;" class="img_hun_ten">
                        <div class="clk-list clk-center">
                            <ul class="leatest_in_a_cat_postlopp">

                                @if ($category_id3_post5 != '' && $category_id3_post5 != null)

                                    @foreach ($category_id3_post5 as $catpost5)
                                        @if ($catpost5->image)
                                            @php
                                                $images = json_decode($catpost5->image);
                                            @endphp
                                            @if ($images != '')
                                                @foreach ($images as $image)
                                                    <ul class="single_right_item">
                                                        <a
                                                            href="@if ($catpost5->news_categoryslug) {{ route(strtolower($catpost5->news_categoryslug) . '.details', ['id' => $catpost5->id, 'slug' => \Illuminate\Support\Str::slug($catpost5->title)]) }} @endif">
                                                            <img width="500" height="280" src="{{ asset($image) }}"
                                                                class="attachment-custom-size size-custom-size wp-post-image"
                                                                alt="{{ \Illuminate\Support\Str::limit($catpost5->title, 40) }}" />

                                                        </a>
                                                        <li class="tab_post ml-2"><a
                                                                href="@if ($catpost5->news_categoryslug) {{ route(strtolower($catpost5->news_categoryslug) . '.details', ['id' => $catpost5->id, 'slug' => \Illuminate\Support\Str::slug($catpost5->title)]) }} @endif">{{ \Illuminate\Support\Str::limit($catpost5->title, 50) }}</a>
                                                        </li>
                                                    </ul>
                                                @endforeach
                                            @endif
                                        @endif
                                    @endforeach

                                @endif
                            </ul>
                        </div>
                    </div>
                    <div style="flex: 1;" class="img_hun_ten">
                        <div class="clk-list clk-right">
                            <ul class="leatest_in_a_cat_postlopp">

                                @if ($category_id3_post5_2 != '' && $category_id3_post5_2 != null)

                                    @foreach ($category_id3_post5_2 as $catpost5)
                                        @if ($catpost5->image)
                                            @php
                                                $images = json_decode($catpost5->image);
                                            @endphp
                                            @if ($images != '')
                                                @foreach ($images as $image)
                                                    <ul class="single_right_item">
                                                        <a
                                                            href="@if ($catpost5->news_categoryslug) {{ route(strtolower($catpost5->news_categoryslug) . '.details', ['id' => $catpost5->id, 'slug' => \Illuminate\Support\Str::slug($catpost5->title)]) }} @endif">
                                                            <img width="500" height="280" src="{{ asset($image) }}"
                                                                class="attachment-custom-size size-custom-size wp-post-image"
                                                                alt="{{ \Illuminate\Support\Str::limit($catpost5->title, 40) }}" />

                                                        </a>
                                                        <li class="tab_post ml-2"><a
                                                                href="@if ($catpost5->news_categoryslug) {{ route(strtolower($catpost5->news_categoryslug) . '.details', ['id' => $catpost5->id, 'slug' => \Illuminate\Support\Str::slug($catpost5->title)]) }} @endif">{{ \Illuminate\Support\Str::limit($catpost5->title, 50) }}</a>
                                                        </li>
                                                    </ul>
                                                @endforeach
                                            @endif
                                        @endif
                                    @endforeach

                                @endif



                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <div class="home_page_part_one_right">
                <h2 class="home_sidebar_cat_title d-flex">
                    <a href="#">আপনার এলাকার খবর</a>
                </h2>
                <form>
                    <div class="form-group">
                        <div class="form_col">
                            <select class="form-control" name="bd_division" id="division">
                                <option>--বিভাগ--</option>
                            </select>
                        </div>
                        <div class="form_col">
                            <select class="form-control" name="bd_district" id="district">
                                <option value="" selected="">--জেলা--</option>
                            </select>
                        </div>
                        <div class="form_col">
                            <select class="form-control" name="bd_thana" id="upozilla">

                                <option value="" selected="">--উপজেলা--</option>

                            </select>
                        </div>
                        <div class="form_col">
                            <div class="btn btn-danger dist_news_srch w-100">খুঁজুন
                                <i class="fa fa-search ml-2" style="color: #FFF !important; height: 100%"></i>
                            </div>
                        </div>
                    </div>
                </form>
                @if ($ads->isNotEmpty())
                    @foreach ($ads as $ad)
                        @if ($ad->header_ads !== '' && !empty($ad->header_ads))
                            <div class="custom_container home_page_ad">
                                <img class="alignnone size-full wp-image-130312"
                                    src="{{ asset('public/public/header_ads/' . $ad->header_ads) }}" alt="Header Ads"
                                    width="878" height="476" />
                            </div>
                        @endif
                    @endforeach
                @endif

            </div>
        </div>
    </div>
    <!--  Category 4 end -->



    <!--  Category 6 -->
    <div class="home_page_part_one_bg">
        <div class="custom_container">
            @if ($category6 != '' && $category6 != null)
                <h2 class="home_sidebar_cat_title">
                    <a
                        href="{{ url('/' . $category6->slug . '/' . $category6->slug) }}"><strong>{{ $category6->name }}</strong></a>
                    <a href="{{ url('/' . $category6->slug . '/' . $category6->slug) }}"
                        class="read-more d-flex justify-content-end align-items-center">
                        <p>{{ __('আরও পড়ুন') }}</p>
                        <p><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></p>
                    </a>
                </h2>
            @endif
            <div class="home_page_part_one">

                <ul class="leatest_in_a_cat_postlopp">

                    @if ($category_id6_post5 != '' && $category_id6_post5 != null)

                        @foreach ($category_id6_post5 as $catpost3)
                            @if ($catpost3->image)
                                @php
                                    $images = json_decode($catpost3->image);
                                @endphp
                                @if ($images != '')
                                    @foreach ($images as $image)
                                        <ul class="single_right_item flex_column">
                                            <a
                                                href="@if ($catpost3->news_categoryslug) {{ route(strtolower($catpost3->news_categoryslug) . '.details', ['id' => $catpost3->id, 'slug' => \Illuminate\Support\Str::slug($catpost3->title)]) }} @endif">
                                                <img width="500" height="280" src="{{ asset($image) }}"
                                                    class="attachment-custom-size size-custom-size wp-post-image"
                                                    alt="" />
                                            </a>
                                            <li class="tab_post"><a
                                                    href="@if ($catpost3->news_categoryslug) {{ route(strtolower($catpost3->news_categoryslug) . '.details', ['id' => $catpost3->id, 'slug' => \Illuminate\Support\Str::slug($catpost3->title)]) }} @endif">
                                                    {{ \Illuminate\Support\Str::limit($catpost3->title, 40) }}
                                                </a></li>
                                        </ul>
                                    @endforeach
                                @endif
                            @endif
                        @endforeach

                    @endif


                </ul>




                <div class="home_page_pat_one_left_right_grid firest_item_two_column">



                    <ul class="leatest_in_a_cat_postlopp">

                        @if ($category_id6_post3 != '' && $category_id6_post3 != null)

                            @foreach ($category_id6_post3 as $catpost3)
                                @if ($catpost3->image)
                                    @php
                                        $images = json_decode($catpost3->image);
                                    @endphp
                                    @if ($images != '')
                                        @foreach ($images as $image)
                                            <ul class="single_right_item flex_column">
                                                <a
                                                    href="@if ($catpost3->news_categoryslug) {{ route(strtolower($catpost3->news_categoryslug) . '.details', ['id' => $catpost3->id, 'slug' => \Illuminate\Support\Str::slug($catpost3->title)]) }} @endif">
                                                    <img width="500" height="280" src="{{ asset($image) }}"
                                                        class="attachment-custom-size size-custom-size wp-post-image"
                                                        alt="" />
                                                </a>
                                                <li class="tab_post"><a
                                                        href="@if ($catpost3->news_categoryslug) {{ route(strtolower($catpost3->news_categoryslug) . '.details', ['id' => $catpost3->id, 'slug' => \Illuminate\Support\Str::slug($catpost3->title)]) }} @endif">
                                                        {{ \Illuminate\Support\Str::limit($catpost3->title, 40) }}
                                                    </a></li>
                                            </ul>
                                        @endforeach
                                    @endif
                                @endif
                            @endforeach

                        @endif


                    </ul>




                </div>
                <ul class="leatest_in_a_cat_postlopp">

                    @if ($category_id6_post5_2 != '' && $category_id6_post5_2 != null)

                        @foreach ($category_id6_post5_2 as $catpost3)
                            @if ($catpost3->image)
                                @php
                                    $images = json_decode($catpost3->image);
                                @endphp
                                @if ($images != '')
                                    @foreach ($images as $image)
                                        <ul class="single_right_item flex_column">
                                            <a
                                                href="@if ($catpost3->news_categoryslug) {{ route(strtolower($catpost3->news_categoryslug) . '.details', ['id' => $catpost3->id, 'slug' => \Illuminate\Support\Str::slug($catpost3->title)]) }} @endif">
                                                <img width="500" height="280" src="{{ asset($image) }}"
                                                    class="attachment-custom-size size-custom-size wp-post-image"
                                                    alt="" />
                                            </a>
                                            <li class="tab_post"><a
                                                    href="@if ($catpost3->news_categoryslug) {{ route(strtolower($catpost3->news_categoryslug) . '.details', ['id' => $catpost3->id, 'slug' => \Illuminate\Support\Str::slug($catpost3->title)]) }} @endif">
                                                    {{ \Illuminate\Support\Str::limit($catpost3->title, 40) }}
                                                </a></li>
                                        </ul>
                                    @endforeach
                                @endif
                            @endif
                        @endforeach

                    @endif


                </ul>
                </ul>
            </div>
        </div>
    </div>
    <!--  Category 6 end -->


    <!--  Category 7,10 -->
    <div class="home_page_part_one_bg">
        <div class="container-fluid home_page_part_one">
            <div class="home_page_part_one_left cs_border-right">
                @if ($category7 != '' && $category7 != null)
                    <h2 class="home_sidebar_cat_title">
                        <a
                            href="{{ url('/' . $category7->slug . '/' . $category7->slug) }}"><strong>{{ $category7->name }}</strong></a>
                        <a href="{{ url('/' . $category7->slug . '/' . $category7->slug) }}"
                            class="read-more d-flex justify-content-end align-items-center">
                            <p>{{ __('আরও পড়ুন') }}</p>
                            <p><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></p>
                        </a>
                    </h2>
                @endif
                <div class="home_page_part_one_left_left_flex">
                    <div class="home_page_part_one_left_right home_page_pat_one_left_right_grid">



                        @if ($category_id7_post4 != '' && $category_id7_post4 != null)

                            @foreach ($category_id7_post4 as $catpost1)
                                @if ($catpost1->image)
                                    @php
                                        $images = json_decode($catpost1->image);
                                    @endphp
                                    @if ($images != '')
                                        @foreach ($images as $image)
                                            <ul class="single_right_item">
                                                <a class="home_second_part_grid"
                                                    href="@if ($catpost1->news_categoryslug) {{ route(strtolower($catpost1->news_categoryslug) . '.details', ['id' => $catpost1->id, 'slug' => \Illuminate\Support\Str::slug($catpost1->title)]) }} @endif">
                                                    <img width="500" height="280" src="{{ asset($image) }}"
                                                        class="attachment-custom-size size-custom-size wp-post-image"
                                                        alt="{{ \Illuminate\Support\Str::slug($catpost1->title) }}" />
                                                    <li class="tab_post">{{ $catpost1->title }}</li>
                                                </a>
                                            </ul>
                                        @endforeach
                                    @endif
                                @endif
                            @endforeach

                        @endif




                    </div>
                    <div class="home_page_part_one_left_left">
                        <ul class="leatest_in_a_cat_postlopp">


                            @if ($category_id7_post7 != '' && $category_id7_post7 != null)

                                @foreach ($category_id7_post7 as $catpost7)
                                    <ul class="single_right_item">
                                        <li class="tab_post"><a
                                                href="@if ($catpost7->news_categoryslug) {{ route(strtolower($catpost7->news_categoryslug) . '.details', ['id' => $catpost7->id, 'slug' => \Illuminate\Support\Str::slug($catpost7->title)]) }} @endif">{{ \Illuminate\Support\Str::limit($catpost7->title, 40) }}</a>
                                        </li>
                                    </ul>
                                @endforeach

                            @endif


                        </ul>
                    </div>
                </div>

            </div>
            <div class="home_page_part_one_right">
                @if ($category10 != '' && $category10 != null)
                    <h2 class="home_sidebar_cat_title">
                        <a
                            href="{{ url('/' . $category10->slug . '/' . $category10->slug) }}"><strong>{{ $category10->name }}</strong></a>
                        <a href="{{ url('/' . $category10->slug . '/' . $category10->slug) }}"
                            class="read-more d-flex justify-content-end align-items-center">
                            <p>{{ __('আরও পড়ুন') }}</p>
                            <p><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></p>
                        </a>
                    </h2>
                @endif
                <ul class="leatest_in_a_cat_postlopp">


                    @if ($category_id10_post4 != '' && $category_id10_post4 != null)

                        @foreach ($category_id10_post4 as $catpost4)
                            @if ($catpost4->image)
                                @php
                                    $images = json_decode($catpost4->image);
                                @endphp
                                @if ($images != '')
                                    @foreach ($images as $image)
                                        <ul class="single_right_item">
                                            <a
                                                href="@if ($catpost4->news_categoryslug) {{ route(strtolower($catpost4->news_categoryslug) . '.details', ['id' => $catpost4->id, 'slug' => \Illuminate\Support\Str::slug($catpost4->title)]) }} @endif">
                                                <img width="500" height="280" src="{{ asset($image) }}"
                                                    class="attachment-custom-size size-custom-size wp-post-image"
                                                    alt="{{ \Illuminate\Support\Str::limit($catpost4->title, 40) }}" />

                                            </a>
                                            <li class="tab_post ml-2"><a
                                                    href="@if ($catpost4->news_categoryslug) {{ route(strtolower($catpost4->news_categoryslug) . '.details', ['id' => $catpost4->id, 'slug' => \Illuminate\Support\Str::slug($catpost4->title)]) }} @endif">{{ \Illuminate\Support\Str::limit($catpost4->title, 40) }}</a>
                                            </li>
                                        </ul>
                                    @endforeach
                                @endif
                            @endif
                        @endforeach

                    @endif




                </ul>
            </div>
        </div>
    </div>
    <!--  Category 7,10 end -->

    <!--  Categoriywise Post End -->





    <!--  Top Categories Start -->
    {{-- <section class="-top-categories-section -slide">
        <div class="container-fluid">
            <div class="-title-border-none">
                <div class="-title-text">
                    <h2>{{ __('Top Categories') }}</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($newscategories as $newscategory)
                    <div class="col-sm-6 col-lg-4 col-xl-3">
                        <div class="card -card-img">
                            <a class="topcategories-thumb"
                                href="  @if (Route::has(strtolower($newscategory->slug))) {{ route(strtolower($newscategory->slug), $newscategory->name) }} @endif">

                                <img src="{{ asset($newscategory->image) }}" alt="{{ $newscategory->name }}">

                            </a>
                            <div class="card-body -card-body">
                                <a
                                    href="  @if (Route::has(strtolower($newscategory->slug))) {{ route(strtolower($newscategory->slug), $newscategory->name) }} @endif">

                                    <span>{{ $newscategory->name }}</span>
                                    <span>{{ $newscategory->post_counter }} {{ __('Post') }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section> --}}
    <!--  Top Categories End -->
    <!-- Maan Most Popular Start -->
    <section class="maan-most-popular-section maan-slide-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="maan-title">
                        <div class="maan-title-text">
                            <h2>{{ __('জনপ্রিয়') }}</h2>
                        </div>
                    </div>
                    <div class="maan-slide">
                        @foreach ($popularsnews as $popularnews)
                            <div class="card maan-big-post">
                                <div class="maan-post-img">
                                    @if ($popularnews->image)
                                        @php
                                            $images = json_decode($popularnews->image);
                                        @endphp
                                        @if ($images != '')
                                            @foreach ($images as $image)
                                                @if (File::exists($image))
                                                    <a
                                                        href="@if ($popularnews->news_categoryslug) {{ route(strtolower($popularnews->news_categoryslug) . '.details', ['id' => $popularnews->id, 'slug' => \Illuminate\Support\Str::slug($popularnews->title)]) }} @endif">
                                                        <img src="{{ asset($image) }}" alt="top-news">
                                                    </a>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endif

                                    <span
                                        class="maan-tag-@if ($loop->iteration == 1) parpul @elseif($loop->iteration == 2)green @elseif($loop->iteration == 3)blue @elseif($loop->iteration == 4)red @endif">{{ $popularnews->news_category }}</span>
                                </div>
                                <div class="card-body maan-card-body pb-0">
                                    <div class="maan-text">
                                        <h4><a
                                                href="@if ($popularnews->news_categoryslug) {{ route(strtolower($popularnews->news_categoryslug) . '.details', ['id' => $popularnews->id, 'slug' => \Illuminate\Support\Str::slug($popularnews->title)]) }} @endif">{{ $popularnews->title }}</a>
                                        </h4>
                                        <ul>
                                            <li class="author">
                                                <span class="maan-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12.007"
                                                        height="13.414" viewBox="0 0 12.007 13.414">
                                                        <g transform="translate(-24.165)">
                                                            <g data-name="Group 466" transform="translate(26.687)">
                                                                <g data-name="Group 465" transform="translate(0)">
                                                                    <path data-name="Path 845"
                                                                        d="M114.274,0a3.483,3.483,0,1,0,3.483,3.483A3.492,3.492,0,0,0,114.274,0Z"
                                                                        transform="translate(-110.791)" fill="#888" />
                                                                </g>
                                                            </g>
                                                            <g data-name="Group 468" transform="translate(24.165 7.215)">
                                                                <g data-name="Group 467" transform="translate(0)">
                                                                    <path data-name="Path 846"
                                                                        d="M36.147,250.375a3.247,3.247,0,0,0-.35-.639,4.329,4.329,0,0,0-3-1.886.641.641,0,0,0-.441.106,3.712,3.712,0,0,1-4.38,0,.571.571,0,0,0-.441-.106,4.3,4.3,0,0,0-3,1.886,3.743,3.743,0,0,0-.35.639.323.323,0,0,0,.015.289,6.067,6.067,0,0,0,.411.608,5.778,5.778,0,0,0,.7.791,9.112,9.112,0,0,0,.7.608,6.936,6.936,0,0,0,8.274,0,6.685,6.685,0,0,0,.7-.608,7.021,7.021,0,0,0,.7-.791,5.329,5.329,0,0,0,.411-.608A.26.26,0,0,0,36.147,250.375Z"
                                                                        transform="translate(-24.165 -247.841)"
                                                                        fill="#888" />
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </svg>

                                                </span>
                                                <span class="maan-item-text"><a
                                                        href="#">{{ $popularnews->reporter_name }}</a></span>
                                            </li>
                                            <li class=author-date>
                                                <span class="maan-icon"><svg viewBox="0 0 512 512">
                                                        <path
                                                            d="M347.216,301.211l-71.387-53.54V138.609c0-10.966-8.864-19.83-19.83-19.83c-10.966,0-19.83,8.864-19.83,19.83v118.978 c0,6.246,2.935,12.136,7.932,15.864l79.318,59.489c3.569,2.677,7.734,3.966,11.878,3.966c6.048,0,11.997-2.717,15.884-7.952 C357.766,320.208,355.981,307.775,347.216,301.211z">
                                                        </path>
                                                        <path
                                                            d="M256,0C114.833,0,0,114.833,0,256s114.833,256,256,256s256-114.833,256-256S397.167,0,256,0z M256,472.341 c-119.275,0-216.341-97.066-216.341-216.341S136.725,39.659,256,39.659c119.295,0,216.341,97.066,216.341,216.341 S375.275,472.341,256,472.341z">
                                                        </path>
                                                    </svg></span>
                                                <span
                                                    class="maan-item-text">
                                                    {{ $dateConverter->getConvertedDateTime((new \Illuminate\Support\Carbon($popularnews->date))->format('d M, Y'), 'BnEn', '') }}
</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="news-tab">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="all-news-tab" data-bs-toggle="pill"
                                    data-bs-target="#all-news" type="button">সবগুলো</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="food-news-tab" data-bs-toggle="pill"
                                    data-bs-target="#world-news" type="button">{{ $category8->name }}</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="life-style-news-tab" data-bs-toggle="pill"
                                    data-bs-target="#life-style-news" type="button">{{ $category9->name }}</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="racing-news-tab" data-bs-toggle="pill"
                                    data-bs-target="#entertainment-news" type="button">{{ $category1->name }}</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="sports-news-tab" data-bs-toggle="pill"
                                    data-bs-target="#sports-news" type="button">{{ $category2->name }}</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="technology-news-tab" data-bs-toggle="pill"
                                    data-bs-target="#technology-news" type="button">{{ $category3->name }}</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="all-news">
                                <div class="maan-news-list">
                                    <ul>
                                        @foreach ($popularsnewsall as $popularnewsall)
                                            @if ($loop->iteration <= 3)
                                                <li>
                                                    <div class="maan-list-img">
                                                        @if ($popularnewsall->image)
                                                            @php
                                                                $images = json_decode($popularnewsall->image);
                                                            @endphp
                                                            @if ($images != '')
                                                                @foreach ($images as $image)
                                                                    @if (File::exists($image))
                                                                        <a
                                                                            href="@if ($popularnewsall->news_categoryslug) {{ route(strtolower($popularnewsall->news_categoryslug) . '.details', ['id' => $popularnewsall->id, 'slug' => \Illuminate\Support\Str::slug($popularnewsall->title)]) }} @endif">
                                                                            <img src="{{ asset($image) }}"
                                                                                alt="{{ asset($image) }}">
                                                                        </a>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        @endif

                                                    </div>
                                                    <div class="maan-list-text">
                                                        <span
                                                            class="maan-tag-@if ($loop->iteration == 1) green @elseif($loop->iteration == 2)red @elseif($loop->iteration == 3)blue @elseif($loop->iteration == 4)parpul @endif">{{ $popularnewsall->news_category }}</span>
                                                        <h4><a
                                                                href="@if ($popularnewsall->news_categoryslug) {{ route(strtolower($popularnewsall->news_categoryslug) . '.details', ['id' => $popularnewsall->id, 'slug' => \Illuminate\Support\Str::slug($popularnewsall->title)]) }} @endif">{{ $popularnewsall->title }}</a>
                                                        </h4>
                                                        <ul>
                                                            <li class="author">
                                                                <span class="maan-icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12.007"
                                                                        height="13.414" viewBox="0 0 12.007 13.414">
                                                                        <g transform="translate(-24.165)">
                                                                            <g data-name="Group 466"
                                                                                transform="translate(26.687)">
                                                                                <g data-name="Group 465"
                                                                                    transform="translate(0)">
                                                                                    <path data-name="Path 845"
                                                                                        d="M114.274,0a3.483,3.483,0,1,0,3.483,3.483A3.492,3.492,0,0,0,114.274,0Z"
                                                                                        transform="translate(-110.791)"
                                                                                        fill="#888" />
                                                                                </g>
                                                                            </g>
                                                                            <g data-name="Group 468"
                                                                                transform="translate(24.165 7.215)">
                                                                                <g data-name="Group 467"
                                                                                    transform="translate(0)">
                                                                                    <path data-name="Path 846"
                                                                                        d="M36.147,250.375a3.247,3.247,0,0,0-.35-.639,4.329,4.329,0,0,0-3-1.886.641.641,0,0,0-.441.106,3.712,3.712,0,0,1-4.38,0,.571.571,0,0,0-.441-.106,4.3,4.3,0,0,0-3,1.886,3.743,3.743,0,0,0-.35.639.323.323,0,0,0,.015.289,6.067,6.067,0,0,0,.411.608,5.778,5.778,0,0,0,.7.791,9.112,9.112,0,0,0,.7.608,6.936,6.936,0,0,0,8.274,0,6.685,6.685,0,0,0,.7-.608,7.021,7.021,0,0,0,.7-.791,5.329,5.329,0,0,0,.411-.608A.26.26,0,0,0,36.147,250.375Z"
                                                                                        transform="translate(-24.165 -247.841)"
                                                                                        fill="#888" />
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                    </svg>

                                                                </span>
                                                                <span class="maan-item-text"><a
                                                                        href="#">{{ $popularnewsall->reporter_name }}</a></span>
                                                            </li>
                                                            <li class="author-date">
                                                                <span class="maan-icon"><svg viewBox="0 0 512 512">
                                                                        <path
                                                                            d="M347.216,301.211l-71.387-53.54V138.609c0-10.966-8.864-19.83-19.83-19.83c-10.966,0-19.83,8.864-19.83,19.83v118.978 c0,6.246,2.935,12.136,7.932,15.864l79.318,59.489c3.569,2.677,7.734,3.966,11.878,3.966c6.048,0,11.997-2.717,15.884-7.952 C357.766,320.208,355.981,307.775,347.216,301.211z">
                                                                        </path>
                                                                        <path
                                                                            d="M256,0C114.833,0,0,114.833,0,256s114.833,256,256,256s256-114.833,256-256S397.167,0,256,0z M256,472.341 c-119.275,0-216.341-97.066-216.341-216.341S136.725,39.659,256,39.659c119.295,0,216.341,97.066,216.341,216.341 S375.275,472.341,256,472.341z">
                                                                        </path>
                                                                    </svg></span>
                                                                <span
                                                                    class="maan-item-text">
                                                                    
                                                                    {{ $dateConverter->getConvertedDateTime((new \Illuminate\Support\Carbon($popularnewsall->date))->format('d M, Y'), 'BnEn', '') }}
                                                                    
                                                                    </span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="world-news">
                                <div class="maan-news-list">
                                    <ul>
                                        @if ($popularsnewscat8 != '' && $popularsnewscat8 != null)
                                            @foreach ($popularsnewscat8 as $popularnews)
                                                <li>
                                                    <div class="maan-list-img">
                                                        @if ($popularnews->image)
                                                            @php
                                                                $images = json_decode($popularnews->image);
                                                            @endphp
                                                            @if ($images != '')
                                                                @foreach ($images as $image)
                                                                    @if (File::exists($image))
                                                                        <a
                                                                            href="@if ($popularnews->news_categoryslug) {{ route(strtolower($popularnews->news_categoryslug) . '.details', ['id' => $popularnews->id, 'slug' => \Illuminate\Support\Str::slug($popularnews->title)]) }} @endif">
                                                                            <img src="{{ asset($image) }}"
                                                                                alt="list-news-img">
                                                                        </a>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        @endif

                                                    </div>
                                                    <div class="maan-list-text">
                                                        <span
                                                            class="maan-tag-@if ($loop->iteration == 1) green @elseif($loop->iteration == 2)red @elseif($loop->iteration == 3)blue @elseif($loop->iteration == 4)parpul @endif">{{ $popularnews->news_category }}</span>
                                                        <h4><a
                                                                href="@if ($popularnews->news_categoryslug) {{ route(strtolower($popularnews->news_categoryslug) . '.details', ['id' => $popularnews->id, 'slug' => \Illuminate\Support\Str::slug($popularnews->title)]) }} @endif">{{ $popularnews->title }}</a>
                                                        </h4>
                                                        <ul>
                                                            <li class="author">
                                                                <span class="maan-icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12.007"
                                                                        height="13.414" viewBox="0 0 12.007 13.414">
                                                                        <g transform="translate(-24.165)">
                                                                            <g data-name="Group 466"
                                                                                transform="translate(26.687)">
                                                                                <g data-name="Group 465"
                                                                                    transform="translate(0)">
                                                                                    <path data-name="Path 845"
                                                                                        d="M114.274,0a3.483,3.483,0,1,0,3.483,3.483A3.492,3.492,0,0,0,114.274,0Z"
                                                                                        transform="translate(-110.791)"
                                                                                        fill="#888" />
                                                                                </g>
                                                                            </g>
                                                                            <g data-name="Group 468"
                                                                                transform="translate(24.165 7.215)">
                                                                                <g data-name="Group 467"
                                                                                    transform="translate(0)">
                                                                                    <path data-name="Path 846"
                                                                                        d="M36.147,250.375a3.247,3.247,0,0,0-.35-.639,4.329,4.329,0,0,0-3-1.886.641.641,0,0,0-.441.106,3.712,3.712,0,0,1-4.38,0,.571.571,0,0,0-.441-.106,4.3,4.3,0,0,0-3,1.886,3.743,3.743,0,0,0-.35.639.323.323,0,0,0,.015.289,6.067,6.067,0,0,0,.411.608,5.778,5.778,0,0,0,.7.791,9.112,9.112,0,0,0,.7.608,6.936,6.936,0,0,0,8.274,0,6.685,6.685,0,0,0,.7-.608,7.021,7.021,0,0,0,.7-.791,5.329,5.329,0,0,0,.411-.608A.26.26,0,0,0,36.147,250.375Z"
                                                                                        transform="translate(-24.165 -247.841)"
                                                                                        fill="#888" />
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                    </svg>


                                                                </span>
                                                                <span class="maan-item-text"><a
                                                                        href="#">{{ $popularnews->reporter_name }}</a></span>
                                                            </li>
                                                            <li class="author-date">
                                                                <span class="maan-icon"><svg viewBox="0 0 512 512">
                                                                        <path
                                                                            d="M347.216,301.211l-71.387-53.54V138.609c0-10.966-8.864-19.83-19.83-19.83c-10.966,0-19.83,8.864-19.83,19.83v118.978 c0,6.246,2.935,12.136,7.932,15.864l79.318,59.489c3.569,2.677,7.734,3.966,11.878,3.966c6.048,0,11.997-2.717,15.884-7.952 C357.766,320.208,355.981,307.775,347.216,301.211z">
                                                                        </path>
                                                                        <path
                                                                            d="M256,0C114.833,0,0,114.833,0,256s114.833,256,256,256s256-114.833,256-256S397.167,0,256,0z M256,472.341 c-119.275,0-216.341-97.066-216.341-216.341S136.725,39.659,256,39.659c119.295,0,216.341,97.066,216.341,216.341 S375.275,472.341,256,472.341z">
                                                                        </path>
                                                                    </svg></span>
                                                                <span
                                                                    class="maan-item-text">
                                                                    {{ $dateConverter->getConvertedDateTime((new \Illuminate\Support\Carbon($popularnews->date))->format('d M, Y'), 'BnEn', '') }}
                                                                  </span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            @endforeach
                                        @endif

                                    </ul>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="life-style-news">
                                <div class="maan-news-list">
                                    <ul>
                                        @if ($popularsnewscat9 != '' && $popularsnewscat9 != null)
                                            @foreach ($popularsnewscat9 as $popularnewslifestyle)
                                                <li>
                                                    <div class="maan-list-img">
                                                        @if ($popularnewslifestyle->image)
                                                            @php
                                                                $images = json_decode($popularnewslifestyle->image);
                                                            @endphp
                                                            @if ($images != '')
                                                                @foreach ($images as $image)
                                                                    @if (File::exists($image))
                                                                        <a
                                                                            href="@if ($popularnewslifestyle->news_categoryslug) {{ route(strtolower($popularnewslifestyle->news_categoryslug) . '.details', ['id' => $popularnewslifestyle->id, 'slug' => \Illuminate\Support\Str::slug($popularnewslifestyle->title)]) }} @endif">
                                                                            <img src="{{ asset($image) }}"
                                                                                alt="list-news-img">
                                                                        </a>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        @endif

                                                    </div>
                                                    <div class="maan-list-text">
                                                        <span
                                                            class="maan-tag-@if ($loop->iteration == 1) green @elseif($loop->iteration == 2)red @elseif($loop->iteration == 3)blue @elseif($loop->iteration == 4)parpul @endif">{{ $popularnewslifestyle->news_category }}</span>
                                                        <h4><a
                                                                href="@if ($popularnewslifestyle->news_categoryslug) {{ route(strtolower($popularnewslifestyle->news_categoryslug) . '.details', ['id' => $popularnewslifestyle->id, 'slug' => \Illuminate\Support\Str::slug($popularnewslifestyle->title)]) }} @endif">{{ $popularnewslifestyle->title }}</a>
                                                        </h4>
                                                        <ul>
                                                            <li class="author">
                                                                <span class="maan-icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12.007"
                                                                        height="13.414" viewBox="0 0 12.007 13.414">
                                                                        <g transform="translate(-24.165)">
                                                                            <g data-name="Group 466"
                                                                                transform="translate(26.687)">
                                                                                <g data-name="Group 465"
                                                                                    transform="translate(0)">
                                                                                    <path data-name="Path 845"
                                                                                        d="M114.274,0a3.483,3.483,0,1,0,3.483,3.483A3.492,3.492,0,0,0,114.274,0Z"
                                                                                        transform="translate(-110.791)"
                                                                                        fill="#888" />
                                                                                </g>
                                                                            </g>
                                                                            <g data-name="Group 468"
                                                                                transform="translate(24.165 7.215)">
                                                                                <g data-name="Group 467"
                                                                                    transform="translate(0)">
                                                                                    <path data-name="Path 846"
                                                                                        d="M36.147,250.375a3.247,3.247,0,0,0-.35-.639,4.329,4.329,0,0,0-3-1.886.641.641,0,0,0-.441.106,3.712,3.712,0,0,1-4.38,0,.571.571,0,0,0-.441-.106,4.3,4.3,0,0,0-3,1.886,3.743,3.743,0,0,0-.35.639.323.323,0,0,0,.015.289,6.067,6.067,0,0,0,.411.608,5.778,5.778,0,0,0,.7.791,9.112,9.112,0,0,0,.7.608,6.936,6.936,0,0,0,8.274,0,6.685,6.685,0,0,0,.7-.608,7.021,7.021,0,0,0,.7-.791,5.329,5.329,0,0,0,.411-.608A.26.26,0,0,0,36.147,250.375Z"
                                                                                        transform="translate(-24.165 -247.841)"
                                                                                        fill="#888" />
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                    </svg>


                                                                </span>
                                                                <span class="maan-item-text"><a
                                                                        href="#">{{ $popularnewslifestyle->reporter_name }}</a></span>
                                                            </li>
                                                            <li class=author-date>
                                                                <span class="maan-icon"><svg viewBox="0 0 512 512">
                                                                        <path
                                                                            d="M347.216,301.211l-71.387-53.54V138.609c0-10.966-8.864-19.83-19.83-19.83c-10.966,0-19.83,8.864-19.83,19.83v118.978 c0,6.246,2.935,12.136,7.932,15.864l79.318,59.489c3.569,2.677,7.734,3.966,11.878,3.966c6.048,0,11.997-2.717,15.884-7.952 C357.766,320.208,355.981,307.775,347.216,301.211z">
                                                                        </path>
                                                                        <path
                                                                            d="M256,0C114.833,0,0,114.833,0,256s114.833,256,256,256s256-114.833,256-256S397.167,0,256,0z M256,472.341 c-119.275,0-216.341-97.066-216.341-216.341S136.725,39.659,256,39.659c119.295,0,216.341,97.066,216.341,216.341 S375.275,472.341,256,472.341z">
                                                                        </path>
                                                                    </svg></span>
                                                                <span
                                                                    class="maan-item-text">
                                                                    {{ $dateConverter->getConvertedDateTime((new \Illuminate\Support\Carbon($popularnewslifestyle->date))->format('d M, Y'), 'BnEn', '') }}
                                                     </span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="entertainment-news">
                                <div class="maan-news-list">
                                    <ul>
                                        @if ($popularsnewscat1 != '' && $popularsnewscat1 != null)
                                            @foreach ($popularsnewscat1 as $popularnewsentertainment)
                                                <li>
                                                    <div class="maan-list-img">
                                                        @if ($popularnewsentertainment->image)
                                                            @php
                                                                $images = json_decode($popularnewsentertainment->image);
                                                            @endphp
                                                            @if ($images != '')
                                                                @foreach ($images as $image)
                                                                    @if (File::exists($image))
                                                                        <a
                                                                            href="@if ($popularnewsentertainment->news_categoryslug) {{ route(strtolower($popularnewsentertainment->news_categoryslug) . '.details', ['id' => $popularnewsentertainment->id, 'slug' => \Illuminate\Support\Str::slug($popularnewsentertainment->title)]) }} @endif">

                                                                            <img src="{{ asset($image) }}"
                                                                                alt="list-news-img">
                                                                        </a>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        @endif

                                                    </div>
                                                    <div class="maan-list-text">
                                                        <span
                                                            class="maan-tag-@if ($loop->iteration == 1) green @elseif($loop->iteration == 2)red @elseif($loop->iteration == 3)blue @elseif($loop->iteration == 4)parpul @endif">{{ $popularnewsentertainment->news_category }}</span>
                                                        <h4><a
                                                                href="@if ($popularnewsentertainment->news_categoryslug) {{ route(strtolower($popularnewsentertainment->news_categoryslug) . '.details', ['id' => $popularnewsentertainment->id, 'slug' => \Illuminate\Support\Str::slug($popularnewsentertainment->title)]) }} @endif">{{ $popularnewsentertainment->title }}</a>
                                                        </h4>
                                                        <ul>
                                                            <li class="author">
                                                                <span class="maan-icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12.007"
                                                                        height="13.414" viewBox="0 0 12.007 13.414">
                                                                        <g transform="translate(-24.165)">
                                                                            <g data-name="Group 466"
                                                                                transform="translate(26.687)">
                                                                                <g data-name="Group 465"
                                                                                    transform="translate(0)">
                                                                                    <path data-name="Path 845"
                                                                                        d="M114.274,0a3.483,3.483,0,1,0,3.483,3.483A3.492,3.492,0,0,0,114.274,0Z"
                                                                                        transform="translate(-110.791)"
                                                                                        fill="#888" />
                                                                                </g>
                                                                            </g>
                                                                            <g data-name="Group 468"
                                                                                transform="translate(24.165 7.215)">
                                                                                <g data-name="Group 467"
                                                                                    transform="translate(0)">
                                                                                    <path data-name="Path 846"
                                                                                        d="M36.147,250.375a3.247,3.247,0,0,0-.35-.639,4.329,4.329,0,0,0-3-1.886.641.641,0,0,0-.441.106,3.712,3.712,0,0,1-4.38,0,.571.571,0,0,0-.441-.106,4.3,4.3,0,0,0-3,1.886,3.743,3.743,0,0,0-.35.639.323.323,0,0,0,.015.289,6.067,6.067,0,0,0,.411.608,5.778,5.778,0,0,0,.7.791,9.112,9.112,0,0,0,.7.608,6.936,6.936,0,0,0,8.274,0,6.685,6.685,0,0,0,.7-.608,7.021,7.021,0,0,0,.7-.791,5.329,5.329,0,0,0,.411-.608A.26.26,0,0,0,36.147,250.375Z"
                                                                                        transform="translate(-24.165 -247.841)"
                                                                                        fill="#888" />
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                    </svg>


                                                                </span>
                                                                <span class="maan-item-text"><a
                                                                        href="#">{{ $popularnewsentertainment->reporter_name }}</a></span>
                                                            </li>
                                                            <li class="author-date">
                                                                <span class="maan-icon"><svg viewBox="0 0 512 512">
                                                                        <path
                                                                            d="M347.216,301.211l-71.387-53.54V138.609c0-10.966-8.864-19.83-19.83-19.83c-10.966,0-19.83,8.864-19.83,19.83v118.978 c0,6.246,2.935,12.136,7.932,15.864l79.318,59.489c3.569,2.677,7.734,3.966,11.878,3.966c6.048,0,11.997-2.717,15.884-7.952 C357.766,320.208,355.981,307.775,347.216,301.211z">
                                                                        </path>
                                                                        <path
                                                                            d="M256,0C114.833,0,0,114.833,0,256s114.833,256,256,256s256-114.833,256-256S397.167,0,256,0z M256,472.341 c-119.275,0-216.341-97.066-216.341-216.341S136.725,39.659,256,39.659c119.295,0,216.341,97.066,216.341,216.341 S375.275,472.341,256,472.341z">
                                                                        </path>
                                                                    </svg></span>
                                                                <span
                                                                    class="maan-item-text">
                                                                    {{ $dateConverter->getConvertedDateTime((new \Illuminate\Support\Carbon($popularnewsentertainment->date))->format('d M, Y'), 'BnEn', '') }}
                                                                    
                                                                  </span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="sports-news">
                                <div class="maan-news-list">
                                    <ul>
                                        @if ($popularsnewscat2 != '' && $popularsnewscat2 != null)
                                            @foreach ($popularsnewscat2 as $popularnewssports)
                                                <li>
                                                    <div class="maan-list-img">
                                                        @if ($popularnewssports->image)
                                                            @php
                                                                $images = json_decode($popularnewssports->image);
                                                            @endphp
                                                            @if ($images != '')
                                                                @foreach ($images as $image)
                                                                    @if (File::exists($image))
                                                                        <a
                                                                            href="@if ($popularnewssports->news_categoryslug) {{ route(strtolower($popularnewssports->news_categoryslug) . '.details', ['id' => $popularnewssports->id, 'slug' => \Illuminate\Support\Str::slug($popularnewssports->title)]) }} @endif">

                                                                            <img src="{{ asset($image) }}"
                                                                                alt="list-news-img">
                                                                        </a>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        @endif

                                                    </div>
                                                    <div class="maan-list-text">
                                                        <span
                                                            class="maan-tag-@if ($loop->iteration == 1) green @elseif($loop->iteration == 2)red @elseif($loop->iteration == 3)blue @elseif($loop->iteration == 4)parpul @endif">{{ $popularnewssports->news_category }}</span>
                                                        <h4><a
                                                                href="@if ($popularnewssports->news_categoryslug) {{ route(strtolower($popularnewssports->news_categoryslug) . '.details', ['id' => $popularnewssports->id, 'slug' => \Illuminate\Support\Str::slug($popularnewssports->title)]) }} @endif">{{ $popularnewssports->title }}</a>
                                                        </h4>
                                                        <ul>
                                                            <li class="author">
                                                                <span class="maan-icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12.007"
                                                                        height="13.414" viewBox="0 0 12.007 13.414">
                                                                        <g transform="translate(-24.165)">
                                                                            <g data-name="Group 466"
                                                                                transform="translate(26.687)">
                                                                                <g data-name="Group 465"
                                                                                    transform="translate(0)">
                                                                                    <path data-name="Path 845"
                                                                                        d="M114.274,0a3.483,3.483,0,1,0,3.483,3.483A3.492,3.492,0,0,0,114.274,0Z"
                                                                                        transform="translate(-110.791)"
                                                                                        fill="#888" />
                                                                                </g>
                                                                            </g>
                                                                            <g data-name="Group 468"
                                                                                transform="translate(24.165 7.215)">
                                                                                <g data-name="Group 467"
                                                                                    transform="translate(0)">
                                                                                    <path data-name="Path 846"
                                                                                        d="M36.147,250.375a3.247,3.247,0,0,0-.35-.639,4.329,4.329,0,0,0-3-1.886.641.641,0,0,0-.441.106,3.712,3.712,0,0,1-4.38,0,.571.571,0,0,0-.441-.106,4.3,4.3,0,0,0-3,1.886,3.743,3.743,0,0,0-.35.639.323.323,0,0,0,.015.289,6.067,6.067,0,0,0,.411.608,5.778,5.778,0,0,0,.7.791,9.112,9.112,0,0,0,.7.608,6.936,6.936,0,0,0,8.274,0,6.685,6.685,0,0,0,.7-.608,7.021,7.021,0,0,0,.7-.791,5.329,5.329,0,0,0,.411-.608A.26.26,0,0,0,36.147,250.375Z"
                                                                                        transform="translate(-24.165 -247.841)"
                                                                                        fill="#888" />
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                    </svg>


                                                                </span>
                                                                <span class="maan-item-text"><a
                                                                        href="#">{{ $popularnewssports->reporter_name }}</a></span>
                                                            </li>
                                                            <li class="author-date">
                                                                <span class="maan-icon"><svg viewBox="0 0 512 512">
                                                                        <path
                                                                            d="M347.216,301.211l-71.387-53.54V138.609c0-10.966-8.864-19.83-19.83-19.83c-10.966,0-19.83,8.864-19.83,19.83v118.978 c0,6.246,2.935,12.136,7.932,15.864l79.318,59.489c3.569,2.677,7.734,3.966,11.878,3.966c6.048,0,11.997-2.717,15.884-7.952 C357.766,320.208,355.981,307.775,347.216,301.211z">
                                                                        </path>
                                                                        <path
                                                                            d="M256,0C114.833,0,0,114.833,0,256s114.833,256,256,256s256-114.833,256-256S397.167,0,256,0z M256,472.341 c-119.275,0-216.341-97.066-216.341-216.341S136.725,39.659,256,39.659c119.295,0,216.341,97.066,216.341,216.341 S375.275,472.341,256,472.341z">
                                                                        </path>
                                                                    </svg></span>
                                                                <span
                                                                    class="maan-item-text">
                                                                    {{ $dateConverter->getConvertedDateTime((new \Illuminate\Support\Carbon($popularnewssports->date))->format('d M, Y'), 'BnEn', '') }}
                                                                  </span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="technology-news">
                                <div class="maan-news-list">
                                    <ul>
                                        @if ($popularsnewscat3 != '' && $popularsnewscat3 != null)
                                            @foreach ($popularsnewscat3 as $popularnewstechnology)
                                                <li>
                                                    <div class="maan-list-img">
                                                        @if ($popularnewstechnology->image)
                                                            @php
                                                                $images = json_decode($popularnewstechnology->image);
                                                            @endphp
                                                            @if ($images != '')
                                                                @foreach ($images as $image)
                                                                    @if (File::exists($image))
                                                                        <a
                                                                            href="@if ($popularnewstechnology->news_categoryslug) {{ route(strtolower($popularnewstechnology->news_categoryslug) . '.details', ['id' => $popularnewstechnology->id, 'slug' => \Illuminate\Support\Str::slug($popularnewstechnology->title)]) }} @endif">

                                                                            <img src="{{ asset($image) }}"
                                                                                alt="list-news-img">
                                                                        </a>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        @endif

                                                    </div>
                                                    <div class="maan-list-text">
                                                        <span
                                                            class="maan-tag-@if ($loop->iteration == 1) green @elseif($loop->iteration == 2)red @elseif($loop->iteration == 3)blue @elseif($loop->iteration == 4)parpul @endif">{{ $popularnewstechnology->news_category }}</span>
                                                        <h4><a
                                                                href="@if ($popularnewstechnology->news_categoryslug) {{ route(strtolower($popularnewstechnology->news_categoryslug) . '.details', ['id' => $popularnewstechnology->id, 'slug' => \Illuminate\Support\Str::slug($popularnewstechnology->title)]) }} @endif">{{ $popularnewstechnology->title }}</a>
                                                        </h4>
                                                        <ul>
                                                            <li class="author">
                                                                <span class="maan-icon">

                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12.007"
                                                                        height="13.414" viewBox="0 0 12.007 13.414">
                                                                        <g transform="translate(-24.165)">
                                                                            <g data-name="Group 466"
                                                                                transform="translate(26.687)">
                                                                                <g data-name="Group 465"
                                                                                    transform="translate(0)">
                                                                                    <path data-name="Path 845"
                                                                                        d="M114.274,0a3.483,3.483,0,1,0,3.483,3.483A3.492,3.492,0,0,0,114.274,0Z"
                                                                                        transform="translate(-110.791)"
                                                                                        fill="#888" />
                                                                                </g>
                                                                            </g>
                                                                            <g data-name="Group 468"
                                                                                transform="translate(24.165 7.215)">
                                                                                <g data-name="Group 467"
                                                                                    transform="translate(0)">
                                                                                    <path data-name="Path 846"
                                                                                        d="M36.147,250.375a3.247,3.247,0,0,0-.35-.639,4.329,4.329,0,0,0-3-1.886.641.641,0,0,0-.441.106,3.712,3.712,0,0,1-4.38,0,.571.571,0,0,0-.441-.106,4.3,4.3,0,0,0-3,1.886,3.743,3.743,0,0,0-.35.639.323.323,0,0,0,.015.289,6.067,6.067,0,0,0,.411.608,5.778,5.778,0,0,0,.7.791,9.112,9.112,0,0,0,.7.608,6.936,6.936,0,0,0,8.274,0,6.685,6.685,0,0,0,.7-.608,7.021,7.021,0,0,0,.7-.791,5.329,5.329,0,0,0,.411-.608A.26.26,0,0,0,36.147,250.375Z"
                                                                                        transform="translate(-24.165 -247.841)"
                                                                                        fill="#888" />
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                    </svg>

                                                                </span>
                                                                <span class="maan-item-text"><a
                                                                        href="#">{{ $popularnewstechnology->reporter_name }}</a></span>
                                                            </li>
                                                            <li class="author-date">
                                                                <span class="maan-icon"><svg viewBox="0 0 512 512">
                                                                        <path
                                                                            d="M347.216,301.211l-71.387-53.54V138.609c0-10.966-8.864-19.83-19.83-19.83c-10.966,0-19.83,8.864-19.83,19.83v118.978 c0,6.246,2.935,12.136,7.932,15.864l79.318,59.489c3.569,2.677,7.734,3.966,11.878,3.966c6.048,0,11.997-2.717,15.884-7.952 C357.766,320.208,355.981,307.775,347.216,301.211z">
                                                                        </path>
                                                                        <path
                                                                            d="M256,0C114.833,0,0,114.833,0,256s114.833,256,256,256s256-114.833,256-256S397.167,0,256,0z M256,472.341 c-119.275,0-216.341-97.066-216.341-216.341S136.725,39.659,256,39.659c119.295,0,216.341,97.066,216.341,216.341 S375.275,472.341,256,472.341z">
                                                                        </path>
                                                                    </svg></span>
                                                                <span
                                                                    class="maan-item-text">
                                                                    {{ $dateConverter->getConvertedDateTime((new \Illuminate\Support\Carbon($popularnewstechnology->date))->format('d M, Y'), 'BnEn', '') }}
                                                                   </span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Maan Most Popular End -->
    <!-- Maan Politics News Start -->
    {{-- <section class="maan-technology-news-section maan-politics-section">
        <div class="container-fluid">
            <div class="maan-title justify-content-center">
                <div class="maan-title-text">
                    <h2>{{ __('Politics News') }}</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($latestnewspolitics as $lastnewspolitics)
                    <div
                        class="@if ($loop->iteration <= 2) col-lg-6 politics-news-big-items @else col-lg-4 col-md-6 technologysmall-card-wrp @endif ">
                        <div class="card maan-default-post">
                            <div class="maan-post-img">
                                @if ($lastnewspolitics->image)
                                    @php
                                        $images = json_decode($lastnewspolitics->image);
                                    @endphp
                                    @if ($images != '')
                                        @foreach ($images as $image)
                                            <a
                                                href="@if ($lastnewspolitics->news_categoryslug) {{ route(strtolower($lastnewspolitics->news_categoryslug) . '.details', ['id' => $lastnewspolitics->id, 'slug' => \Illuminate\Support\Str::slug($lastnewspolitics->title)]) }} @endif">
                                                <img src="{{ asset($image) }}" alt="top-news">
                                            </a>
                                        @endforeach
                                    @endif
                                @endif
                            </div>
                            <div class="card-body maan-card-body">
                                <div class="maan-text">
                                    <h4><a
                                            href="@if ($lastnewspolitics->news_categoryslug) {{ route(strtolower($lastnewspolitics->news_categoryslug) . '.details', ['id' => $lastnewspolitics->id, 'slug' => \Illuminate\Support\Str::slug($lastnewspolitics->title)]) }} @endif">{{ $lastnewspolitics->title }}</a>
                                    </h4>
                                    <ul>
                                        <li>
                                            <span class="maan-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14.485" height="16.182"
                                                    viewBox="0 0 14.485 16.182">
                                                    <g transform="translate(-24.165)">
                                                        <g data-name="Group 466" transform="translate(27.207)">
                                                            <g data-name="Group 465" transform="translate(0)">
                                                                <path data-name="Path 845"
                                                                    d="M114.993,0a4.2,4.2,0,1,0,4.2,4.2A4.213,4.213,0,0,0,114.993,0Z"
                                                                    transform="translate(-110.791)" fill="#888" />
                                                            </g>
                                                        </g>
                                                        <g data-name="Group 468" transform="translate(24.165 8.704)">
                                                            <g data-name="Group 467" transform="translate(0)">
                                                                <path data-name="Path 846"
                                                                    d="M38.619,250.9a3.918,3.918,0,0,0-.422-.771,5.222,5.222,0,0,0-3.614-2.275.773.773,0,0,0-.532.128,4.478,4.478,0,0,1-5.284,0,.688.688,0,0,0-.532-.128,5.185,5.185,0,0,0-3.614,2.275,4.516,4.516,0,0,0-.422.771.39.39,0,0,0,.018.349,7.318,7.318,0,0,0,.5.734,6.97,6.97,0,0,0,.844.954,11,11,0,0,0,.844.734,8.367,8.367,0,0,0,9.981,0,8.065,8.065,0,0,0,.844-.734,8.47,8.47,0,0,0,.844-.954,6.429,6.429,0,0,0,.5-.734A.313.313,0,0,0,38.619,250.9Z"
                                                                    transform="translate(-24.165 -247.841)"
                                                                    fill="#888" />
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>

                                            </span>
                                            <span class="maan-item-text"><a
                                                    href="#">{{ $lastnewspolitics->reporter_name }}</a></span>
                                        </li>
                                        <li>
                                            <span class="maan-icon"><svg viewBox="0 0 512 512">
                                                    <path
                                                        d="M347.216,301.211l-71.387-53.54V138.609c0-10.966-8.864-19.83-19.83-19.83c-10.966,0-19.83,8.864-19.83,19.83v118.978 c0,6.246,2.935,12.136,7.932,15.864l79.318,59.489c3.569,2.677,7.734,3.966,11.878,3.966c6.048,0,11.997-2.717,15.884-7.952 C357.766,320.208,355.981,307.775,347.216,301.211z">
                                                    </path>
                                                    <path
                                                        d="M256,0C114.833,0,0,114.833,0,256s114.833,256,256,256s256-114.833,256-256S397.167,0,256,0z M256,472.341 c-119.275,0-216.341-97.066-216.341-216.341S136.725,39.659,256,39.659c119.295,0,216.341,97.066,216.341,216.341 S375.275,472.341,256,472.341z">
                                                    </path>
                                                </svg></span>
                                            <span
                                                class="maan-item-text">{{ (new \Illuminate\Support\Carbon($lastnewspolitics->date))->format('d M, Y') }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section> --}}

    <!-- Maan Politics News End -->
    <!-- Maan Entertainment News Start -->
    <section class="maan-entertainment-news">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="maan-title">
                        <div class="maan-title-text">
                            <h2>{{ $category6->name }}</h2>
                        </div>
                    </div>

                    <div class="maan-left-content">
                        <div class="row">
                            <div class="maan-entertainmentslide">
                                @foreach ($latest_catagory_id6_post4 as $lastnewsentertainment)
                                    <div class="col-lg-6">
                                        <div class="card maan-default-post">
                                            <div class="maan-post-img">
                                                @if ($lastnewsentertainment->image)
                                                    @php
                                                        $images = json_decode($lastnewsentertainment->image);
                                                    @endphp
                                                    @if ($images != '')
                                                        @foreach ($images as $image)
                                                            <a
                                                                href="@if ($lastnewsentertainment->news_categoryslug) {{ route(strtolower($lastnewsentertainment->news_categoryslug) . '.details', ['id' => $lastnewsentertainment->id, 'slug' => \Illuminate\Support\Str::slug($lastnewsentertainment->title)]) }} @endif">
                                                                <img src="{{ asset($image) }}" alt="top-news">
                                                            </a>
                                                        @endforeach
                                                    @endif
                                                @endif
                                            </div>
                                            <div class="card-body maan-card-body">
                                                <div class="maan-text">
                                                    <h4><a
                                                            href="@if ($lastnewsentertainment->news_categoryslug) {{ route(strtolower($lastnewsentertainment->news_categoryslug) . '.details', ['id' => $lastnewsentertainment->id, 'slug' => \Illuminate\Support\Str::slug($lastnewsentertainment->title)]) }} @endif">{{ $lastnewsentertainment->title }}</a>
                                                    </h4>
                                                    <ul>
                                                        <li>
                                                            <span class="maan-icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="12.007"
                                                                    height="13.414" viewBox="0 0 12.007 13.414">
                                                                    <g transform="translate(-24.165)">
                                                                        <g data-name="Group 466"
                                                                            transform="translate(26.687)">
                                                                            <g data-name="Group 465"
                                                                                transform="translate(0)">
                                                                                <path data-name="Path 845"
                                                                                    d="M114.274,0a3.483,3.483,0,1,0,3.483,3.483A3.492,3.492,0,0,0,114.274,0Z"
                                                                                    transform="translate(-110.791)"
                                                                                    fill="#888" />
                                                                            </g>
                                                                        </g>
                                                                        <g data-name="Group 468"
                                                                            transform="translate(24.165 7.215)">
                                                                            <g data-name="Group 467"
                                                                                transform="translate(0)">
                                                                                <path data-name="Path 846"
                                                                                    d="M36.147,250.375a3.247,3.247,0,0,0-.35-.639,4.329,4.329,0,0,0-3-1.886.641.641,0,0,0-.441.106,3.712,3.712,0,0,1-4.38,0,.571.571,0,0,0-.441-.106,4.3,4.3,0,0,0-3,1.886,3.743,3.743,0,0,0-.35.639.323.323,0,0,0,.015.289,6.067,6.067,0,0,0,.411.608,5.778,5.778,0,0,0,.7.791,9.112,9.112,0,0,0,.7.608,6.936,6.936,0,0,0,8.274,0,6.685,6.685,0,0,0,.7-.608,7.021,7.021,0,0,0,.7-.791,5.329,5.329,0,0,0,.411-.608A.26.26,0,0,0,36.147,250.375Z"
                                                                                    transform="translate(-24.165 -247.841)"
                                                                                    fill="#888" />
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                </svg>
                                                            </span>
                                                            <span class="maan-item-text"><a
                                                                    href="#">{{ $lastnewsentertainment->reporter_name }}</a></span>
                                                        </li>
                                                        <li>
                                                            <span class="maan-icon"><svg viewBox="0 0 512 512">
                                                                    <path
                                                                        d="M347.216,301.211l-71.387-53.54V138.609c0-10.966-8.864-19.83-19.83-19.83c-10.966,0-19.83,8.864-19.83,19.83v118.978 c0,6.246,2.935,12.136,7.932,15.864l79.318,59.489c3.569,2.677,7.734,3.966,11.878,3.966c6.048,0,11.997-2.717,15.884-7.952 C357.766,320.208,355.981,307.775,347.216,301.211z">
                                                                    </path>
                                                                    <path
                                                                        d="M256,0C114.833,0,0,114.833,0,256s114.833,256,256,256s256-114.833,256-256S397.167,0,256,0z M256,472.341 c-119.275,0-216.341-97.066-216.341-216.341S136.725,39.659,256,39.659c119.295,0,216.341,97.066,216.341,216.341 S375.275,472.341,256,472.341z">
                                                                    </path>
                                                                </svg></span>
                                                            <span
                                                                class="maan-item-text">
                                                                
                                                                {{ $dateConverter->getConvertedDateTime((new \Illuminate\Support\Carbon($lastnewsentertainment->date))->format('d M, Y'), 'BnEn', '') }}
                                                               </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @foreach ($latestnewsentertainment as $lastnewsentertainment)
                                <div class="col-lg-6">
                                    <div class="maan-news-list">
                                        <ul>
                                            <li>
                                                <div class="maan-list-img">
                                                    @if ($lastnewsentertainment->image)
                                                        @php
                                                            $images = json_decode($lastnewsentertainment->image);
                                                        @endphp
                                                        @if ($images != '')
                                                            @foreach ($images as $image)
                                                                <a
                                                                    href="@if ($lastnewsentertainment->news_categoryslug) {{ route(strtolower($lastnewsentertainment->news_categoryslug) . '.details', ['id' => $lastnewsentertainment->id, 'slug' => \Illuminate\Support\Str::slug($lastnewsentertainment->title)]) }} @endif">
                                                                    <img src="{{ asset($image) }}" alt="top-news">
                                                                </a>
                                                            @endforeach
                                                        @endif
                                                    @endif
                                                </div>
                                                <div class="maan-list-text">
                                                    <h4><a
                                                            href="@if ($lastnewsentertainment->news_categoryslug) {{ route(strtolower($lastnewsentertainment->news_categoryslug) . '.details', ['id' => $lastnewsentertainment->id, 'slug' => \Illuminate\Support\Str::slug($lastnewsentertainment->title)]) }} @endif">{{ $lastnewsentertainment->title }}</a>
                                                    </h4>
                                                    <ul>
                                                        <li>
                                                            <span class="maan-icon"><svg viewBox="0 0 512 512">
                                                                    <path
                                                                        d="M347.216,301.211l-71.387-53.54V138.609c0-10.966-8.864-19.83-19.83-19.83c-10.966,0-19.83,8.864-19.83,19.83v118.978 c0,6.246,2.935,12.136,7.932,15.864l79.318,59.489c3.569,2.677,7.734,3.966,11.878,3.966c6.048,0,11.997-2.717,15.884-7.952 C357.766,320.208,355.981,307.775,347.216,301.211z">
                                                                    </path>
                                                                    <path
                                                                        d="M256,0C114.833,0,0,114.833,0,256s114.833,256,256,256s256-114.833,256-256S397.167,0,256,0z M256,472.341 c-119.275,0-216.341-97.066-216.341-216.341S136.725,39.659,256,39.659c119.295,0,216.341,97.066,216.341,216.341 S375.275,472.341,256,472.341z">
                                                                    </path>
                                                                </svg></span>
                                                            <span
                                                                class="maan-item-text">
                                                                {{ $dateConverter->getConvertedDateTime((new \Illuminate\Support\Carbon($lastnewsentertainment->date))->format('d M, Y'), 'BnEn', '') }}
                                                               </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>


                </div>
                <div class="col-lg-4">
                    <div class="maan-title">
                        <div class="maan-title-text">
                            <h2>সাথেই থাকুন</h2>
                        </div>
                    </div>
                    <div class="maan-stay-connected maan-slide-section">
                        <div class="row maan-s-follower">
                            <div class="col-sm-6">
                                <div class="follower-btn maan-facebook">
                                    <a href="{{ socials()[0]->url }}" target="_blank">
                                        <div class="maan-icon">
                                            <svg viewBox="0 0 155.139 155.139">
                                                <path
                                                    d="M89.584,155.139V84.378h23.742l3.562-27.585H89.584V39.184 c0-7.984,2.208-13.425,13.67-13.425l14.595-0.006V1.08C115.325,0.752,106.661,0,96.577,0C75.52,0,61.104,12.853,61.104,36.452 v20.341H37.29v27.585h23.814v70.761H89.584z">
                                                </path>
                                            </svg>
                                        </div>
                                        <div class="maan-text">
                                            <div class="maan-f-text">{{ __('Follower') }}</div>
                                            <div class="maan-f-numbber"><span
                                                    class="counter">{{ socials()[0]->follower }}</span>{{ __('K') }}
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="follower-btn maan-instagram">
                                    <a href="{{ socials()[2]->follower }}" target="_blank">
                                        <div class="maan-icon">
                                            <svg viewBox="0 0 511 511.9">
                                                <path
                                                    d="m510.949219 150.5c-1.199219-27.199219-5.597657-45.898438-11.898438-62.101562-6.5-17.199219-16.5-32.597657-29.601562-45.398438-12.800781-13-28.300781-23.101562-45.300781-29.5-16.296876-6.300781-34.898438-10.699219-62.097657-11.898438-27.402343-1.300781-36.101562-1.601562-105.601562-1.601562s-78.199219.300781-105.5 1.5c-27.199219 1.199219-45.898438 5.601562-62.097657 11.898438-17.203124 6.5-32.601562 16.5-45.402343 29.601562-13 12.800781-23.097657 28.300781-29.5 45.300781-6.300781 16.300781-10.699219 34.898438-11.898438 62.097657-1.300781 27.402343-1.601562 36.101562-1.601562 105.601562s.300781 78.199219 1.5 105.5c1.199219 27.199219 5.601562 45.898438 11.902343 62.101562 6.5 17.199219 16.597657 32.597657 29.597657 45.398438 12.800781 13 28.300781 23.101562 45.300781 29.5 16.300781 6.300781 34.898438 10.699219 62.101562 11.898438 27.296876 1.203124 36 1.5 105.5 1.5s78.199219-.296876 105.5-1.5c27.199219-1.199219 45.898438-5.597657 62.097657-11.898438 34.402343-13.300781 61.601562-40.5 74.902343-74.898438 6.296876-16.300781 10.699219-34.902343 11.898438-62.101562 1.199219-27.300781 1.5-36 1.5-105.5s-.101562-78.199219-1.300781-105.5zm-46.097657 209c-1.101562 25-5.300781 38.5-8.800781 47.5-8.601562 22.300781-26.300781 40-48.601562 48.601562-9 3.5-22.597657 7.699219-47.5 8.796876-27 1.203124-35.097657 1.5-103.398438 1.5s-76.5-.296876-103.402343-1.5c-25-1.097657-38.5-5.296876-47.5-8.796876-11.097657-4.101562-21.199219-10.601562-29.398438-19.101562-8.5-8.300781-15-18.300781-19.101562-29.398438-3.5-9-7.699219-22.601562-8.796876-47.5-1.203124-27-1.5-35.101562-1.5-103.402343s.296876-76.5 1.5-103.398438c1.097657-25 5.296876-38.5 8.796876-47.5 4.101562-11.101562 10.601562-21.199219 19.203124-29.402343 8.296876-8.5 18.296876-15 29.398438-19.097657 9-3.5 22.601562-7.699219 47.5-8.800781 27-1.199219 35.101562-1.5 103.398438-1.5 68.402343 0 76.5.300781 103.402343 1.5 25 1.101562 38.5 5.300781 47.5 8.800781 11.097657 4.097657 21.199219 10.597657 29.398438 19.097657 8.5 8.300781 15 18.300781 19.101562 29.402343 3.5 9 7.699219 22.597657 8.800781 47.5 1.199219 27 1.5 35.097657 1.5 103.398438s-.300781 76.300781-1.5 103.300781zm0 0">
                                                </path>
                                                <path
                                                    d="m256.449219 124.5c-72.597657 0-131.5 58.898438-131.5 131.5s58.902343 131.5 131.5 131.5c72.601562 0 131.5-58.898438 131.5-131.5s-58.898438-131.5-131.5-131.5zm0 216.800781c-47.097657 0-85.300781-38.199219-85.300781-85.300781s38.203124-85.300781 85.300781-85.300781c47.101562 0 85.300781 38.199219 85.300781 85.300781s-38.199219 85.300781-85.300781 85.300781zm0 0">
                                                </path>
                                                <path
                                                    d="m423.851562 119.300781c0 16.953125-13.746093 30.699219-30.703124 30.699219-16.953126 0-30.699219-13.746094-30.699219-30.699219 0-16.957031 13.746093-30.699219 30.699219-30.699219 16.957031 0 30.703124 13.742188 30.703124 30.699219zm0 0">
                                                </path>
                                            </svg>
                                        </div>
                                        <div class="maan-text">
                                            <div class="maan-f-text">{{ __('Follower') }}</div>
                                            <div class="maan-f-numbber"><span
                                                    class="counter">{{ socials()[2]->follower }}</span>{{ __('K') }}
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="follower-btn maan-twitter">
                                    <a href="{{ socials()[1]->url }}">
                                        <div class="maan-icon">
                                            <svg viewBox="0 0 512 512">
                                                <path
                                                    d="M512,97.248c-19.04,8.352-39.328,13.888-60.48,16.576c21.76-12.992,38.368-33.408,46.176-58.016 c-20.288,12.096-42.688,20.64-66.56,25.408C411.872,60.704,384.416,48,354.464,48c-58.112,0-104.896,47.168-104.896,104.992 c0,8.32,0.704,16.32,2.432,23.936c-87.264-4.256-164.48-46.08-216.352-109.792c-9.056,15.712-14.368,33.696-14.368,53.056 c0,36.352,18.72,68.576,46.624,87.232c-16.864-0.32-33.408-5.216-47.424-12.928c0,0.32,0,0.736,0,1.152 c0,51.008,36.384,93.376,84.096,103.136c-8.544,2.336-17.856,3.456-27.52,3.456c-6.72,0-13.504-0.384-19.872-1.792 c13.6,41.568,52.192,72.128,98.08,73.12c-35.712,27.936-81.056,44.768-130.144,44.768c-8.608,0-16.864-0.384-25.12-1.44 C46.496,446.88,101.6,464,161.024,464c193.152,0,298.752-160,298.752-298.688c0-4.64-0.16-9.12-0.384-13.568 C480.224,136.96,497.728,118.496,512,97.248z">
                                                </path>
                                            </svg>
                                        </div>
                                        <div class="maan-text">
                                            <div class="maan-f-text">{{ __('Follower') }}</div>
                                            <div class="maan-f-numbber"><span
                                                    class="counter">{{ socials()[1]->follower }}</span>{{ __('K') }}
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="follower-btn maan-youtube">
                                    <a href="{{ socials()[4]->url }}" target="_blank">
                                        <div class="maan-icon">
                                            <svg viewBox="-21 -117 682.66672 682">
                                                <path
                                                    d="m626.8125 64.035156c-7.375-27.417968-28.992188-49.03125-56.40625-56.414062-50.082031-13.703125-250.414062-13.703125-250.414062-13.703125s-200.324219 0-250.40625 13.183593c-26.886719 7.375-49.03125 29.519532-56.40625 56.933594-13.179688 50.078125-13.179688 153.933594-13.179688 153.933594s0 104.378906 13.179688 153.933594c7.382812 27.414062 28.992187 49.027344 56.410156 56.410156 50.605468 13.707031 250.410156 13.707031 250.410156 13.707031s200.324219 0 250.40625-13.183593c27.417969-7.378907 49.03125-28.992188 56.414062-56.40625 13.175782-50.082032 13.175782-153.933594 13.175782-153.933594s.527344-104.382813-13.183594-154.460938zm-370.601562 249.878906v-191.890624l166.585937 95.945312zm0 0" />
                                            </svg>
                                        </div>
                                        <div class="maan-text">
                                            <div class="maan-f-text">{{ __('Follower') }}</div>
                                            <div class="maan-f-numbber"><span
                                                    class="counter">{{ socials()[4]->follower }}</span>{{ __('M') }}
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="maan-news-side-add">

                            @if ($ads->isNotEmpty())
                                @foreach ($ads as $ad)
                                    @if ($ad->sidebar_ads !== '' && !empty($ad->sidebar_ads))
                                        <div class="custom_container home_page_ad">
                                            <img class="alignnone size-full wp-image-130312"
                                                src="{{ asset('public/public/sidebar_ads/' . $ad->sidebar_ads) }}"
                                                alt="Header Ads" width="878" height="476" />
                                        </div>
                                    @endif
                                @endforeach
                            @endif


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Maan Entertainment News End -->
    <!-- Maan Video News Start -->
    <section class="maan-video-news-section maan-slide-section">
        <div class="container-fluid">
            <div class="maan-title justify-content-center">
                <div class="maan-title-text">
                    <h2><svg xmlns="http://www.w3.org/2000/svg" width="30.082" height="19.339"
                            viewBox="0 0 30.082 19.339">
                            <g id="video-camera" transform="translate(0 -85.333)">
                                <g id="Group_1529" data-name="Group 1529" transform="translate(0 85.333)">
                                    <path id="Path_4265" data-name="Path 4265"
                                        d="M29.573,87.642a1.075,1.075,0,0,0-1.045-.047l-7.04,3.521V88.556a3.223,3.223,0,0,0-3.223-3.223H3.223A3.223,3.223,0,0,0,0,88.556v12.892a3.223,3.223,0,0,0,3.223,3.223H18.264a3.223,3.223,0,0,0,3.223-3.223V98.889l7.04,3.526a1.074,1.074,0,0,0,1.555-.967V88.556A1.074,1.074,0,0,0,29.573,87.642ZM10.744,99.3a4.3,4.3,0,1,1,4.3-4.3A4.3,4.3,0,0,1,10.744,99.3Z"
                                        transform="translate(0 -85.333)" fill="#ee0015" />
                                </g>
                            </g>
                        </svg>
                        {{ __('Video News') }}</h2>
                </div>
            </div>
            <div class="row maan-card-slide">
                @foreach ($latestVideoGalleries as $latestVideoGallery)
                    <div class="col-lg-6">
                        <div class="card maan-default-post big-card">
                            <div class="maan-post-img">
                                <a class="venobox" data-autoplay="true" data-vbtype="video"
                                    href="{{ asset($latestVideoGallery->video) }}">
                                    <svg viewBox="0 0 163.861 163.861">
                                        <path
                                            d="M34.857,3.613C20.084-4.861,8.107,2.081,8.107,19.106v125.637c0,17.042,11.977,23.975,26.75,15.509L144.67,97.275 c14.778-8.477,14.778-22.211,0-30.686L34.857,3.613z" />
                                    </svg>
                                </a>

                            </div>
                            <div class="card-body maan-card-body">
                                <div class="maan-text">
                                    <h4><a href="#">{{ $latestVideoGallery->title }}</a></h4>
                                    <ul>
                                        <li>
                                            <span class="maan-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12.007" height="13.414"
                                                    viewBox="0 0 12.007 13.414">
                                                    <g transform="translate(-24.165)">
                                                        <g data-name="Group 466" transform="translate(26.687)">
                                                            <g data-name="Group 465" transform="translate(0)">
                                                                <path data-name="Path 845"
                                                                    d="M114.274,0a3.483,3.483,0,1,0,3.483,3.483A3.492,3.492,0,0,0,114.274,0Z"
                                                                    transform="translate(-110.791)" fill="#888" />
                                                            </g>
                                                        </g>
                                                        <g data-name="Group 468" transform="translate(24.165 7.215)">
                                                            <g data-name="Group 467" transform="translate(0)">
                                                                <path data-name="Path 846"
                                                                    d="M36.147,250.375a3.247,3.247,0,0,0-.35-.639,4.329,4.329,0,0,0-3-1.886.641.641,0,0,0-.441.106,3.712,3.712,0,0,1-4.38,0,.571.571,0,0,0-.441-.106,4.3,4.3,0,0,0-3,1.886,3.743,3.743,0,0,0-.35.639.323.323,0,0,0,.015.289,6.067,6.067,0,0,0,.411.608,5.778,5.778,0,0,0,.7.791,9.112,9.112,0,0,0,.7.608,6.936,6.936,0,0,0,8.274,0,6.685,6.685,0,0,0,.7-.608,7.021,7.021,0,0,0,.7-.791,5.329,5.329,0,0,0,.411-.608A.26.26,0,0,0,36.147,250.375Z"
                                                                    transform="translate(-24.165 -247.841)"
                                                                    fill="#888" />
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>

                                            </span>
                                            <span class="maan-item-text"><a
                                                    href="#">{{ $latestVideoGallery->user_name }}</a></span>
                                        </li>
                                        <li>
                                            <span class="maan-icon"><svg viewBox="0 0 512 512">
                                                    <path
                                                        d="M347.216,301.211l-71.387-53.54V138.609c0-10.966-8.864-19.83-19.83-19.83c-10.966,0-19.83,8.864-19.83,19.83v118.978 c0,6.246,2.935,12.136,7.932,15.864l79.318,59.489c3.569,2.677,7.734,3.966,11.878,3.966c6.048,0,11.997-2.717,15.884-7.952 C357.766,320.208,355.981,307.775,347.216,301.211z">
                                                    </path>
                                                    <path
                                                        d="M256,0C114.833,0,0,114.833,0,256s114.833,256,256,256s256-114.833,256-256S397.167,0,256,0z M256,472.341 c-119.275,0-216.341-97.066-216.341-216.341S136.725,39.659,256,39.659c119.295,0,216.341,97.066,216.341,216.341 S375.275,472.341,256,472.341z">
                                                    </path>
                                                </svg></span>
                                            <span
                                                class="maan-item-text">
                                                {{ $dateConverter->getConvertedDateTime((new \Illuminate\Support\Carbon($latestVideoGallery->date))->format('d M, Y'), 'BnEn', '') }}
                                               </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
    <!-- Maan Video News End -->
    <!-- Maan Sports News Start -->
    {{-- <section class="maan-sports-news-section">
        <div class="container">
            <div class="maan-title justify-content-center">
                <div class="maan-title-text">
                    <h2>{{ __('Sports News') }}</h2>
                </div>
            </div>
            <div class="row maan-slide-section">
                <div class="col-lg-6 ">
                    <div class="maan-slide-section maan-stay-connected">
                        <div class="maan-slide">
                            <div class="card maan-default-post maansports-big-card">
                                @foreach ($latestnewssports as $lastnewssports)
                                    @if ($loop->iteration == 1)
                                        <div class="maan-post-img">
                                            @if ($lastnewssports->image)
                                                @php
                                                    $images = json_decode($lastnewssports->image);
                                                @endphp
                                                @if ($images != '')
                                                    @foreach ($images as $image)
                                                        <a
                                                            href="@if ($lastnewssports->news_categoryslug) {{ route(strtolower($lastnewssports->news_categoryslug) . '.details', ['id' => $lastnewssports->id, 'slug' => \Illuminate\Support\Str::slug($lastnewssports->title)]) }} @endif">
                                                            <img src="{{ asset($image) }}" alt="top-news">
                                                        </a>
                                                    @endforeach
                                                @endif
                                            @endif
                                        </div>
                                        <div class="card-body maan-card-body">
                                            <div class="maan-text">
                                                <h4 class="m-0"><a
                                                        href="@if ($lastnewssports->news_categoryslug) {{ route(strtolower($lastnewssports->news_categoryslug) . '.details', ['id' => $lastnewssports->id, 'slug' => \Illuminate\Support\Str::slug($lastnewssports->title)]) }} @endif">{{ $lastnewssports->title }}</a>
                                                </h4>
                                                <ul>
                                                    <li>
                                                        <span class="maan-icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="12.007"
                                                                height="13.414" viewBox="0 0 12.007 13.414">
                                                                <g transform="translate(-24.165)">
                                                                    <g data-name="Group 466"
                                                                        transform="translate(26.687)">
                                                                        <g data-name="Group 465" transform="translate(0)">
                                                                            <path data-name="Path 845"
                                                                                d="M114.274,0a3.483,3.483,0,1,0,3.483,3.483A3.492,3.492,0,0,0,114.274,0Z"
                                                                                transform="translate(-110.791)"
                                                                                fill="#888" />
                                                                        </g>
                                                                    </g>
                                                                    <g data-name="Group 468"
                                                                        transform="translate(24.165 7.215)">
                                                                        <g data-name="Group 467" transform="translate(0)">
                                                                            <path data-name="Path 846"
                                                                                d="M36.147,250.375a3.247,3.247,0,0,0-.35-.639,4.329,4.329,0,0,0-3-1.886.641.641,0,0,0-.441.106,3.712,3.712,0,0,1-4.38,0,.571.571,0,0,0-.441-.106,4.3,4.3,0,0,0-3,1.886,3.743,3.743,0,0,0-.35.639.323.323,0,0,0,.015.289,6.067,6.067,0,0,0,.411.608,5.778,5.778,0,0,0,.7.791,9.112,9.112,0,0,0,.7.608,6.936,6.936,0,0,0,8.274,0,6.685,6.685,0,0,0,.7-.608,7.021,7.021,0,0,0,.7-.791,5.329,5.329,0,0,0,.411-.608A.26.26,0,0,0,36.147,250.375Z"
                                                                                transform="translate(-24.165 -247.841)"
                                                                                fill="#888" />
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </svg>

                                                        </span>
                                                        <span class="maan-item-text"><a
                                                                href="#">{{ $lastnewssports->reporter_name }}</a></span>
                                                    </li>
                                                    <li>
                                                        <span class="maan-icon"><svg viewBox="0 0 512 512">
                                                                <path
                                                                    d="M347.216,301.211l-71.387-53.54V138.609c0-10.966-8.864-19.83-19.83-19.83c-10.966,0-19.83,8.864-19.83,19.83v118.978 c0,6.246,2.935,12.136,7.932,15.864l79.318,59.489c3.569,2.677,7.734,3.966,11.878,3.966c6.048,0,11.997-2.717,15.884-7.952 C357.766,320.208,355.981,307.775,347.216,301.211z">
                                                                </path>
                                                                <path
                                                                    d="M256,0C114.833,0,0,114.833,0,256s114.833,256,256,256s256-114.833,256-256S397.167,0,256,0z M256,472.341 c-119.275,0-216.341-97.066-216.341-216.341S136.725,39.659,256,39.659c119.295,0,216.341,97.066,216.341,216.341 S375.275,472.341,256,472.341z">
                                                                </path>
                                                            </svg></span>
                                                        <span
                                                            class="maan-item-text">{{ (new \Illuminate\Support\Carbon($lastnewssports->date))->format('d M, Y') }}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <div class="card maan-default-post maansports-big-card">
                                @foreach ($latestnewssports as $lastnewssports)
                                    @if ($loop->iteration == 1)
                                        <div class="maan-post-img">
                                            @if ($lastnewssports->image)
                                                @php
                                                    $images = json_decode($lastnewssports->image);
                                                @endphp
                                                @if ($images != '')
                                                    @foreach ($images as $image)
                                                        <a
                                                            href="@if ($lastnewssports->news_categoryslug) {{ route(strtolower($lastnewssports->news_categoryslug) . '.details', ['id' => $lastnewssports->id, 'slug' => \Illuminate\Support\Str::slug($lastnewssports->title)]) }} @endif">
                                                            <img src="{{ asset($image) }}" alt="top-news">
                                                        </a>
                                                    @endforeach
                                                @endif
                                            @endif
                                        </div>
                                        <div class="card-body maan-card-body">
                                            <div class="maan-text">
                                                <h4 class="m-0"><a
                                                        href="@if ($lastnewssports->news_categoryslug) {{ route(strtolower($lastnewssports->news_categoryslug) . '.details', ['id' => $lastnewssports->id, 'slug' => \Illuminate\Support\Str::slug($lastnewssports->title)]) }} @endif">{{ $lastnewssports->title }}</a>
                                                </h4>
                                                <ul>
                                                    <li>
                                                        <span class="maan-icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="12.007"
                                                                height="13.414" viewBox="0 0 12.007 13.414">
                                                                <g transform="translate(-24.165)">
                                                                    <g data-name="Group 466"
                                                                        transform="translate(26.687)">
                                                                        <g data-name="Group 465" transform="translate(0)">
                                                                            <path data-name="Path 845"
                                                                                d="M114.274,0a3.483,3.483,0,1,0,3.483,3.483A3.492,3.492,0,0,0,114.274,0Z"
                                                                                transform="translate(-110.791)"
                                                                                fill="#888" />
                                                                        </g>
                                                                    </g>
                                                                    <g data-name="Group 468"
                                                                        transform="translate(24.165 7.215)">
                                                                        <g data-name="Group 467" transform="translate(0)">
                                                                            <path data-name="Path 846"
                                                                                d="M36.147,250.375a3.247,3.247,0,0,0-.35-.639,4.329,4.329,0,0,0-3-1.886.641.641,0,0,0-.441.106,3.712,3.712,0,0,1-4.38,0,.571.571,0,0,0-.441-.106,4.3,4.3,0,0,0-3,1.886,3.743,3.743,0,0,0-.35.639.323.323,0,0,0,.015.289,6.067,6.067,0,0,0,.411.608,5.778,5.778,0,0,0,.7.791,9.112,9.112,0,0,0,.7.608,6.936,6.936,0,0,0,8.274,0,6.685,6.685,0,0,0,.7-.608,7.021,7.021,0,0,0,.7-.791,5.329,5.329,0,0,0,.411-.608A.26.26,0,0,0,36.147,250.375Z"
                                                                                transform="translate(-24.165 -247.841)"
                                                                                fill="#888" />
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </svg>

                                                        </span>
                                                        <span class="maan-item-text"><a
                                                                href="#">{{ $lastnewssports->reporter_name }}</a></span>
                                                    </li>
                                                    <li>
                                                        <span class="maan-icon"><svg viewBox="0 0 512 512">
                                                                <path
                                                                    d="M347.216,301.211l-71.387-53.54V138.609c0-10.966-8.864-19.83-19.83-19.83c-10.966,0-19.83,8.864-19.83,19.83v118.978 c0,6.246,2.935,12.136,7.932,15.864l79.318,59.489c3.569,2.677,7.734,3.966,11.878,3.966c6.048,0,11.997-2.717,15.884-7.952 C357.766,320.208,355.981,307.775,347.216,301.211z">
                                                                </path>
                                                                <path
                                                                    d="M256,0C114.833,0,0,114.833,0,256s114.833,256,256,256s256-114.833,256-256S397.167,0,256,0z M256,472.341 c-119.275,0-216.341-97.066-216.341-216.341S136.725,39.659,256,39.659c119.295,0,216.341,97.066,216.341,216.341 S375.275,472.341,256,472.341z">
                                                                </path>
                                                            </svg></span>
                                                        <span
                                                            class="maan-item-text">{{ (new \Illuminate\Support\Carbon($lastnewssports->date))->format('d M, Y') }}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        @foreach ($latestnewssports as $lastnewssports)
                            @if ($loop->iteration > 1)
                                <div class="col-lg-6">
                                    <div class="card maan-default-post maansports-small-card">
                                        <div class="maan-post-img">
                                            @if ($lastnewssports->image)
                                                @php
                                                    $images = json_decode($lastnewssports->image);
                                                @endphp
                                                @if ($images != '')
                                                    @foreach ($images as $image)
                                                        <a
                                                            href="@if ($lastnewssports->news_categoryslug) {{ route(strtolower($lastnewssports->news_categoryslug) . '.details', ['id' => $lastnewssports->id, 'slug' => \Illuminate\Support\Str::slug($lastnewssports->title)]) }} @endif">
                                                            <img src="{{ asset($image) }}" alt="top-news">
                                                        </a>
                                                    @endforeach
                                                @endif
                                            @endif
                                        </div>
                                        <div class="card-body maan-card-body">
                                            <div class="maan-text">
                                                <h4><a
                                                        href="@if ($lastnewssports->news_categoryslug) {{ route(strtolower($lastnewssports->news_categoryslug) . '.details', ['id' => $lastnewssports->id, 'slug' => \Illuminate\Support\Str::slug($lastnewssports->title)]) }} @endif">{{ $lastnewssports->title }}</a>
                                                </h4>
                                                <ul>
                                                    <li>
                                                        <span class="maan-icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="12.007"
                                                                height="13.414" viewBox="0 0 12.007 13.414">
                                                                <g transform="translate(-24.165)">
                                                                    <g data-name="Group 466"
                                                                        transform="translate(26.687)">
                                                                        <g data-name="Group 465" transform="translate(0)">
                                                                            <path data-name="Path 845"
                                                                                d="M114.274,0a3.483,3.483,0,1,0,3.483,3.483A3.492,3.492,0,0,0,114.274,0Z"
                                                                                transform="translate(-110.791)"
                                                                                fill="#888" />
                                                                        </g>
                                                                    </g>
                                                                    <g data-name="Group 468"
                                                                        transform="translate(24.165 7.215)">
                                                                        <g data-name="Group 467" transform="translate(0)">
                                                                            <path data-name="Path 846"
                                                                                d="M36.147,250.375a3.247,3.247,0,0,0-.35-.639,4.329,4.329,0,0,0-3-1.886.641.641,0,0,0-.441.106,3.712,3.712,0,0,1-4.38,0,.571.571,0,0,0-.441-.106,4.3,4.3,0,0,0-3,1.886,3.743,3.743,0,0,0-.35.639.323.323,0,0,0,.015.289,6.067,6.067,0,0,0,.411.608,5.778,5.778,0,0,0,.7.791,9.112,9.112,0,0,0,.7.608,6.936,6.936,0,0,0,8.274,0,6.685,6.685,0,0,0,.7-.608,7.021,7.021,0,0,0,.7-.791,5.329,5.329,0,0,0,.411-.608A.26.26,0,0,0,36.147,250.375Z"
                                                                                transform="translate(-24.165 -247.841)"
                                                                                fill="#888" />
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </svg>

                                                        </span>
                                                        <span class="maan-item-text"><a
                                                                href="#">{{ $lastnewssports->reporter_name }}</a></span>
                                                    </li>
                                                    <li>
                                                        <span class="maan-icon"><svg viewBox="0 0 512 512">
                                                                <path
                                                                    d="M347.216,301.211l-71.387-53.54V138.609c0-10.966-8.864-19.83-19.83-19.83c-10.966,0-19.83,8.864-19.83,19.83v118.978 c0,6.246,2.935,12.136,7.932,15.864l79.318,59.489c3.569,2.677,7.734,3.966,11.878,3.966c6.048,0,11.997-2.717,15.884-7.952 C357.766,320.208,355.981,307.775,347.216,301.211z">
                                                                </path>
                                                                <path
                                                                    d="M256,0C114.833,0,0,114.833,0,256s114.833,256,256,256s256-114.833,256-256S397.167,0,256,0z M256,472.341 c-119.275,0-216.341-97.066-216.341-216.341S136.725,39.659,256,39.659c119.295,0,216.341,97.066,216.341,216.341 S375.275,472.341,256,472.341z">
                                                                </path>
                                                            </svg></span>
                                                        <span
                                                            class="maan-item-text">{{ (new \Illuminate\Support\Carbon($lastnewssports->date))->format('d M, Y') }}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>

        </div>
    </section> --}}
    <!-- Maan Sports News End -->
    <!-- Maan Technology News Start -->
    {{-- <section class="maan-technology-news-section">
        <div class="container">
            <div class="maan-title-center v2">
                <div class="maan-title-icon"></div>
                <div class="maan-title-text">
                    <h2>{{ __('Technology News') }}</h2>
                </div>
                <div class="maan-title-icon"></div>
            </div>
            <div class="row">
                @foreach ($latestnewstechnology as $lastnewstehnology)
                    <div
                        class="@if ($loop->iteration <= 2) col-lg-6 @else col-lg-3 col-md-6 technologysmall-card-wrp @endif ">
                        <div class="card maan-default-post">
                            <div class="maan-post-img">
                                @if ($lastnewstehnology->image)
                                    @php
                                        $images = json_decode($lastnewstehnology->image);
                                    @endphp
                                    @if ($images != '')
                                        @foreach ($images as $image)
                                            <a
                                                href="@if ($lastnewstehnology->news_categoryslug) {{ route(strtolower($lastnewstehnology->news_categoryslug) . '.details', ['id' => $lastnewstehnology->id, 'slug' => \Illuminate\Support\Str::slug($lastnewstehnology->title)]) }} @endif">
                                                <img src="{{ asset($image) }}" alt="top-news">
                                            </a>
                                        @endforeach
                                    @endif
                                @endif
                            </div>
                            <div class="card-body maan-card-body">
                                <div class="maan-text">
                                    <h4><a
                                            href="@if ($lastnewstehnology->news_categoryslug) {{ route(strtolower($lastnewstehnology->news_categoryslug) . '.details', ['id' => $lastnewstehnology->id, 'slug' => \Illuminate\Support\Str::slug($lastnewstehnology->title)]) }} @endif">{{ $lastnewstehnology->title }}</a>
                                    </h4>
                                    <ul>
                                        <li>
                                            <span class="maan-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12.007" height="13.414"
                                                    viewBox="0 0 12.007 13.414">
                                                    <g transform="translate(-24.165)">
                                                        <g data-name="Group 466" transform="translate(26.687)">
                                                            <g data-name="Group 465" transform="translate(0)">
                                                                <path data-name="Path 845"
                                                                    d="M114.274,0a3.483,3.483,0,1,0,3.483,3.483A3.492,3.492,0,0,0,114.274,0Z"
                                                                    transform="translate(-110.791)" fill="#888" />
                                                            </g>
                                                        </g>
                                                        <g data-name="Group 468" transform="translate(24.165 7.215)">
                                                            <g data-name="Group 467" transform="translate(0)">
                                                                <path data-name="Path 846"
                                                                    d="M36.147,250.375a3.247,3.247,0,0,0-.35-.639,4.329,4.329,0,0,0-3-1.886.641.641,0,0,0-.441.106,3.712,3.712,0,0,1-4.38,0,.571.571,0,0,0-.441-.106,4.3,4.3,0,0,0-3,1.886,3.743,3.743,0,0,0-.35.639.323.323,0,0,0,.015.289,6.067,6.067,0,0,0,.411.608,5.778,5.778,0,0,0,.7.791,9.112,9.112,0,0,0,.7.608,6.936,6.936,0,0,0,8.274,0,6.685,6.685,0,0,0,.7-.608,7.021,7.021,0,0,0,.7-.791,5.329,5.329,0,0,0,.411-.608A.26.26,0,0,0,36.147,250.375Z"
                                                                    transform="translate(-24.165 -247.841)"
                                                                    fill="#888" />
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>

                                            </span>
                                            <span class="maan-item-text"><a
                                                    href="#">{{ $lastnewstehnology->reporter_name }}</a></span>
                                        </li>
                                        <li>
                                            <span class="maan-icon"><svg viewBox="0 0 512 512">
                                                    <path
                                                        d="M347.216,301.211l-71.387-53.54V138.609c0-10.966-8.864-19.83-19.83-19.83c-10.966,0-19.83,8.864-19.83,19.83v118.978 c0,6.246,2.935,12.136,7.932,15.864l79.318,59.489c3.569,2.677,7.734,3.966,11.878,3.966c6.048,0,11.997-2.717,15.884-7.952 C357.766,320.208,355.981,307.775,347.216,301.211z">
                                                    </path>
                                                    <path
                                                        d="M256,0C114.833,0,0,114.833,0,256s114.833,256,256,256s256-114.833,256-256S397.167,0,256,0z M256,472.341 c-119.275,0-216.341-97.066-216.341-216.341S136.725,39.659,256,39.659c119.295,0,216.341,97.066,216.341,216.341 S375.275,472.341,256,472.341z">
                                                    </path>
                                                </svg></span>
                                            <span
                                                class="maan-item-text">{{ (new \Illuminate\Support\Carbon($lastnewstehnology->date))->format('d M, Y') }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section> --}}
    <!-- Maan Technology News End -->
    <!-- Maan Don't Miss Start -->

    @if ($latestphotogalleries != '' && $latestphotogalleries != null)
        <section class="maan-don-t-miss-section">
            <div class="container">
                <div class="maan-title">

                    <div class="maan-title-text">
                        @if ($latestphotogalleries != '' && $latestphotogalleries != null)
                            <h2>ফটো গ্যালারি</h2>
                        @endif
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row maan-slide">
                    @foreach ($latestphotogalleries as $latestphotogallery)
                        <div class="col-lg-2">
                            <div class="card maan-card-img">
                                <a
                                    href="{{ route('photogallery.details', ['id' => $latestphotogallery->id, 'slug' => \Illuminate\Support\Str::slug($latestphotogallery->title)]) }}">
                                    <img src="{{ asset($latestphotogallery->image) }}" alt="top-news">
                                </a>

                                <div class="card-body maan-card-body">

                                    <div class="maan-text">
                                        <h4><a
                                                href="{{ route('photogallery.details', ['id' => $latestphotogallery->id, 'slug' => \Illuminate\Support\Str::slug($latestphotogallery->title)]) }}">{{ $latestphotogallery->title }}
                                                <br> {{ __('132.2m') }}</a></h4>
                                        <ul>
                                            <li>
                                                <span class="maan-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14.485"
                                                        height="16.182" viewBox="0 0 14.485 16.182">
                                                        <g transform="translate(-24.165)">
                                                            <g data-name="Group 466" transform="translate(27.207)">
                                                                <g data-name="Group 465" transform="translate(0)">
                                                                    <path data-name="Path 845"
                                                                        d="M114.993,0a4.2,4.2,0,1,0,4.2,4.2A4.213,4.213,0,0,0,114.993,0Z"
                                                                        transform="translate(-110.791)" fill="#fff" />
                                                                </g>
                                                            </g>
                                                            <g data-name="Group 468" transform="translate(24.165 8.704)">
                                                                <g data-name="Group 467" transform="translate(0)">
                                                                    <path data-name="Path 846"
                                                                        d="M38.619,250.9a3.918,3.918,0,0,0-.422-.771,5.222,5.222,0,0,0-3.614-2.275.773.773,0,0,0-.532.128,4.478,4.478,0,0,1-5.284,0,.688.688,0,0,0-.532-.128,5.185,5.185,0,0,0-3.614,2.275,4.516,4.516,0,0,0-.422.771.39.39,0,0,0,.018.349,7.318,7.318,0,0,0,.5.734,6.97,6.97,0,0,0,.844.954,11,11,0,0,0,.844.734,8.367,8.367,0,0,0,9.981,0,8.065,8.065,0,0,0,.844-.734,8.47,8.47,0,0,0,.844-.954,6.429,6.429,0,0,0,.5-.734A.313.313,0,0,0,38.619,250.9Z"
                                                                        transform="translate(-24.165 -247.841)"
                                                                        fill="#fff" />
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </svg>

                                                </span>
                                                <span class="maan-item-text"><a
                                                        href="#">{{ $latestphotogallery->user_name }}</a></span>
                                            </li>
                                            <li>
                                                <span class="maan-icon"><svg viewBox="0 0 512 512">
                                                        <path
                                                            d="M347.216,301.211l-71.387-53.54V138.609c0-10.966-8.864-19.83-19.83-19.83c-10.966,0-19.83,8.864-19.83,19.83v118.978 c0,6.246,2.935,12.136,7.932,15.864l79.318,59.489c3.569,2.677,7.734,3.966,11.878,3.966c6.048,0,11.997-2.717,15.884-7.952 C357.766,320.208,355.981,307.775,347.216,301.211z">
                                                        </path>
                                                        <path
                                                            d="M256,0C114.833,0,0,114.833,0,256s114.833,256,256,256s256-114.833,256-256S397.167,0,256,0z M256,472.341 c-119.275,0-216.341-97.066-216.341-216.341S136.725,39.659,256,39.659c119.295,0,216.341,97.066,216.341,216.341 S375.275,472.341,256,472.341z">
                                                        </path>
                                                    </svg></span>
                                                <span
                                                    class="maan-item-text">
                                                    {{ $dateConverter->getConvertedDateTime( $latestphotogallery->created_at->format('d M, Y'), 'BnEn', '') }}
                                                  </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

    @endif
    <!-- Maan Don't Miss End -->
    <!-- Maan Lifestyle News Start -->
    {{-- <section class="maan-lifestyle-news">
        <div class="container">
            <div class="maan-title">
                <div class="maan-title-text">
                    <h2>{{ __('Lifestyle News') }}</h2>
                </div>
            </div>
            <div class="row maan-post-groop">
                @foreach ($latestnewslifestyle as $lastnewslifestyle)
                    <div class="col-lg-3">
                        <div class="card maan-default-post">
                            <div class="maan-post-img">
                                @if ($lastnewslifestyle->image)
                                    @php
                                        $images = json_decode($lastnewslifestyle->image);
                                    @endphp
                                    @if ($images != '')
                                        @foreach ($images as $image)
                                            <a
                                                href="@if ($lastnewslifestyle->news_categoryslug) {{ route(strtolower($lastnewslifestyle->news_categoryslug) . '.details', ['id' => $lastnewslifestyle->id, 'slug' => \Illuminate\Support\Str::slug($lastnewslifestyle->title)]) }} @endif">
                                                <img src="{{ asset($image) }}" alt="last-news">
                                            </a>
                                        @endforeach
                                    @endif
                                @endif
                            </div>
                            <div class="card-body maan-card-body">
                                <div class="maan-text">
                                    <h4><a
                                            href="@if ($lastnewslifestyle->news_categoryslug) {{ route(strtolower($lastnewslifestyle->news_categoryslug) . '.details', ['id' => $lastnewslifestyle->id, 'slug' => \Illuminate\Support\Str::slug($lastnewslifestyle->title)]) }} @endif">{{ $lastnewslifestyle->title }}</a>
                                    </h4>
                                    <ul>
                                        <li>
                                            <span class="maan-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12.007" height="13.414"
                                                    viewBox="0 0 12.007 13.414">
                                                    <g transform="translate(-24.165)">
                                                        <g data-name="Group 466" transform="translate(26.687)">
                                                            <g data-name="Group 465" transform="translate(0)">
                                                                <path data-name="Path 845"
                                                                    d="M114.274,0a3.483,3.483,0,1,0,3.483,3.483A3.492,3.492,0,0,0,114.274,0Z"
                                                                    transform="translate(-110.791)" fill="#888" />
                                                            </g>
                                                        </g>
                                                        <g data-name="Group 468" transform="translate(24.165 7.215)">
                                                            <g data-name="Group 467" transform="translate(0)">
                                                                <path data-name="Path 846"
                                                                    d="M36.147,250.375a3.247,3.247,0,0,0-.35-.639,4.329,4.329,0,0,0-3-1.886.641.641,0,0,0-.441.106,3.712,3.712,0,0,1-4.38,0,.571.571,0,0,0-.441-.106,4.3,4.3,0,0,0-3,1.886,3.743,3.743,0,0,0-.35.639.323.323,0,0,0,.015.289,6.067,6.067,0,0,0,.411.608,5.778,5.778,0,0,0,.7.791,9.112,9.112,0,0,0,.7.608,6.936,6.936,0,0,0,8.274,0,6.685,6.685,0,0,0,.7-.608,7.021,7.021,0,0,0,.7-.791,5.329,5.329,0,0,0,.411-.608A.26.26,0,0,0,36.147,250.375Z"
                                                                    transform="translate(-24.165 -247.841)"
                                                                    fill="#888" />
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>

                                            </span>
                                            <span class="maan-item-text"><a
                                                    href="#">{{ $lastnewslifestyle->reporter_name }}</a></span>
                                        </li>
                                        <li>
                                            <span class="maan-icon"><svg viewBox="0 0 512 512">
                                                    <path
                                                        d="M347.216,301.211l-71.387-53.54V138.609c0-10.966-8.864-19.83-19.83-19.83c-10.966,0-19.83,8.864-19.83,19.83v118.978 c0,6.246,2.935,12.136,7.932,15.864l79.318,59.489c3.569,2.677,7.734,3.966,11.878,3.966c6.048,0,11.997-2.717,15.884-7.952 C357.766,320.208,355.981,307.775,347.216,301.211z">
                                                    </path>
                                                    <path
                                                        d="M256,0C114.833,0,0,114.833,0,256s114.833,256,256,256s256-114.833,256-256S397.167,0,256,0z M256,472.341 c-119.275,0-216.341-97.066-216.341-216.341S136.725,39.659,256,39.659c119.295,0,216.341,97.066,216.341,216.341 S375.275,472.341,256,472.341z">
                                                    </path>
                                                </svg></span>
                                            <span
                                                class="maan-item-text">{{ (new \Illuminate\Support\Carbon($lastnewslifestyle->date))->format('d M, Y') }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section> --}}
    <!-- Maan Lifestyle News End -->

@endsection
