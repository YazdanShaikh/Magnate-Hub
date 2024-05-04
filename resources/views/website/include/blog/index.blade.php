@forelse($Blog as $b)
<div class="blog-card new-custom-blog">
    <a href="/blog/{{ $b->url }}"><img src="{{ asset('/uploads/blog/card/'. $b->card) }}" class="w-100" alt=""></a>
    <div class="blog-des">
        <a href="/blog/{{ $b->url }}">
            @php
            if(strlen($b->name) > 80){
                $name = substr($b->name,80).'...';
            }else{
                $name = $b->name;
            }
            @endphp
            <h3>{{ $name }}</h3>
        </a>
        @php
        if(strlen($b->description) > 100){
            $description = substr($b->description,100).'...';
        }else{
            $description = $b->description;
        }
        @endphp
        <p>{{ $description }}</p>
        <div class="blog-footer">
            <div class="row align-items-center">
                <div class="col-lg-9 d-flex align-items-center justify-content-sm-start justify-content-between fi">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('/uploads/blog/writter_image/'. $b->writter_image) }}" alt="" style="height:40px;width:40px;">
                        <p>{{ $b->writter_name }}</p>
                    </div>
                    <div class="d-flex align-items-center mx-sm-4 mx-0">
                        <i class="fa-regular fa-calendar-check"></i>
                        <p>{{ date('F d Y', strtotime($b->date)) }}</p>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fa-regular fa-eye"></i>
                        <p>{{ $b->views }}</p>
                    </div>
                </div>
                <div class="col-lg-3 text-end">
                    <a href="/blog/{{ $b->url }}"><button class="btn theme-btn2 mt-3 mt-sm-0">Read More</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("#last_id").val('<?php echo $b->blog_id ?>');
</script>
@empty
@endforelse
