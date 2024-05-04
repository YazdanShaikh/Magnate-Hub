<div class="blog-card">
    <img src="{{ asset('/uploads/blog/card/'. $Blog[0]->card) }}" class="w-100" alt="">
    <div class="blog-des">
        <h3>{{ $Blog[0]->name }}</h3>
        <div class="blog-footer">
            <div class="row align-items-center">
                <div class="col-lg-12 d-flex align-items-center justify-content-sm-start justify-content-between fi ">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('/uploads/blog/writter_image/'. $Blog[0]->writter_image) }}" alt="" style="height:40px;width:40px;">
                        <p>{{ $Blog[0]->writter_name }}</p>
                    </div>
                    <div class="d-flex align-items-center mx-sm-4 mx-0">
                        <i class="fa-regular fa-calendar-check"></i>
                        <p>September 7 2020</p>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fa-regular fa-eye"></i>
                        <p>{{ $Blog[0]->views }}</p>
                    </div>
                </div>
            </div>
        </div>
        <p class="mt-3">
            {!! html_entity_decode($Blog[0]->blog) !!}
        </p>
    </div>
</div>
