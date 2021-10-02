
<?php
use App\Models\Item;
?>

@include('assets.navbar')

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