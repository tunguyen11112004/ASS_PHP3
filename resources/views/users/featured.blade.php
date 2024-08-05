<section class="featured spad">
    <div class="container">
        <div class="row">

        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Featured Product</h2>
                </div>
                <div class="featured__controls">
                    <form action="{{ route('user.timKiemDM') }}" method="GET">
                        <div >
                            <select  name="nameCategory" id="">
                                @foreach ($category as $value)
                                    <option value="{{ $value->id_cate }}">{{ $value->name_category }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="primary-btn">SEARCH</button>
                        </div>
                    </form>
                </div>
            </div>
            @foreach ($products as $pro)
                <div class="col-lg-3 col-md-4 col-sm-6 mix ">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{ asset($pro->image) }}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">{{ $pro->name }}</a></h6>
                            <h5>${{ $pro->price }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
