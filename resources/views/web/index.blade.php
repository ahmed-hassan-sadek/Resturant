<?php

use App\Models\Gallery;
use App\Models\Item;
?>

@include('assets.navbar')
    <!-- Header -->
    <header id="header">
        <div class="intro">
            <div class="overlay">
                <div class="container">
                    <div class="row">
                        <div class="intro-text">
                            <h1>Touché</h1>
                            <p>Restaurant / Coffee / Pub</p>
                            <a href="#about" class="btn btn-custom btn-lg page-scroll">Discover Story</a> </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- About Section -->
    <div id="about">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6 ">
                    <div class="about-img"><img src="{{ asset('images/about/' . $about->image) }}" class="img-responsive" alt=""></div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="about-text">
                        <h2>Our Restaurant</h2>
                        <hr>
                        <p>{{$about->body}}</p>
                        <h3></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Restaurant Menu Section -->
    <div id="restaurant-menu">
        <div class="section-title text-center center">
            <div class="overlay">
                <h2>Menu</h2>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit duis sed.</p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach($cats as $cat)
                <div class="col-xs-12 col-sm-6">
                    <div class="menu-section">
                        <h2 class="menu-section-title">{{$cat->name}}</h2>
                        <?php  $cat_id = $cat->id ;
                        
                        $items = Item::where('category_id' , '=' , $cat_id)->with('category')->get();
                        ?>

                        <hr>
                        @foreach($items as $item)
                        <div class="menu-item">
                            <div class="menu-item-name"> {{$item->name}} </div>
                            <div class="menu-item-price"> ${{ $item->price }} </div>
                            <div class="menu-item-description"> {{ $item->desc }} </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
                @endforeach
            </div>
            
        </div>
    </div>
    <!-- Portfolio Section -->
    <div id="portfolio">
        <div class="section-title text-center center">
            <div class="overlay">
                <h2>Gallery</h2>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit duis sed.</p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="categories">
                    <ul class="cat">
                        <li>
                            <ol class="type">
                                <li><a href="#" data-filter="*" class="active">All</a></li>
                                @foreach($cats as $cat)
                                    <li><a href="#" data-filter=".{{$cat->name}}" class="active">{{ $cat->name }}</a></li>
                                @endforeach

                                
                                
                            </ol>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="row">
            
                <div class="portfolio-items">
                @foreach($cats as $cat)
                    <?php $cat_id = $cat->id; 
                    $galleries = Gallery::where('category_id' , '=' , $cat_id)->with('category')->get();
                    ?>
                    @foreach($galleries as $gallery)
                    <div class="col-sm-6 col-md-4 col-lg-4 {{ $cat->name }}">
                        <div class="portfolio-item">
                            <div class="hover-bg">
                                <a href="{{ asset('images/gallery/' . $gallery->image) }}" title="{{ $gallery->name }}" data-lightbox-gallery="gallery1">
                                    <div class="hover-text">
                                        <h4>{{ $gallery->name }}</h4>
                                    </div>
                                    <img src="{{ asset('images/gallery/' . $gallery->image) }}" class="img-responsive" alt="Project Title"> </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endforeach
                </div>
                
            </div>
        </div>
    </div>
    <!-- Team Section -->
    <div id="team" class="text-center">
        <div class="overlay">
            <div class="container">
                <div class="col-md-10 col-md-offset-1 section-title">
                    <h2>Meet Our Chefs</h2>
                    <hr>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit duis sed dapibus leonec.</p>
                </div>
                <div id="row">
                    @foreach($chefs as $chef)
                        <div class="col-md-4 team">
                            <div class="thumbnail">
                                <div class="team-img"><img src="{{asset('images/chefs/'. $chef->image)}}" alt="..."></div>
                                <div class="caption">
                                    <h3>{{$chef->name}}</h3>
                                    <p>{{$chef->body}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <!-- Call Reservation Section -->
    <div id="call-reservation" class="text-center">
        <div class="container">
            <h2>Want to make a reservation? Call <strong>1-887-654-3210</strong></h2>
        </div>
    </div>
    <!-- Contact Section -->
    <div id="contact" class="text-center">
        <div class="container">
            <div class="section-title text-center">
                <h2>Contact Form</h2>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit duis sed.</p>
            </div>
            @include('partials._session')
            @include('partials._errors')
            <div class="col-md-10 col-md-offset-1">
            <form  action="{{ route('contact.store') }}" method="post" novalidate>
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" id="name" name="name" class="form-control" placeholder="Name" required="required">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" id="email" name="email" class="form-control" placeholder="Email" required="required">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea name="body" id="message" class="form-control" rows="4" placeholder="Message" required></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div id="success"></div>
                    <button type="submit" class="btn btn-custom btn-lg">Send Message</button>
                </form>
            </div>
        </div>
    </div>
    @include('assets.footer')
