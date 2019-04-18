<div class="site-section site-section-sm site-blocks-1">
    <div class="container">
        <div class="row">

            @isset($offer)
                @foreach($offer as $f)
                    <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
                        <div class="icon mr-4 align-self-start">
                            <span class="{{$f->class}}"></span>
                        </div>
                        <div class="text">
                            <h2 class="text-uppercase">{{$f->title}}</h2>
                            <p>{{$f->text}}</p>
                        </div>
                    </div>
                @endforeach
            @endisset


        </div>
    </div>
</div>