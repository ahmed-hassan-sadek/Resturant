<?php
use App\Models\Gallery;
?>

@include('assets.navbar')
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