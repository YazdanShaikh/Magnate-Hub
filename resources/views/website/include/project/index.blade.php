@forelse($Project as $p)
@php
$name = substr($p->name, 0, 25).'....';
$description = substr($p->description, 0, 150).'....';
@endphp

<div class="col-lg-4 col-sm-6">
    <div class="f-card">
        <a href="/project/{{ $p->url }}"><img src="{{ asset('/uploads/project/card/' . $p->card) }}" alt="{{ $p->name }}"></a>
        <div class="cap">{{ $p->category }}</div>
        <div class="f-des">
            <a href="/project/{{ $p->url }}"><h4>{{ $name }}</h4></a>
            <span><i class="fa-solid fa-location-dot"></i> {{ $p->location }}</span>
            <h6>ID: {{ $p->id }}</h6>
            {{-- <p>{{ $description }}</p> --}}
            <div class="d-flex justify-content-end">
                <a href="/project/{{ $p->url }}"><button class="f-pre btn theme-btn2 mx-0"> View Details</button></a>
            </div>
            @if($p->premium == 1)
                <img src="/website/images/crown.png" class="crown">
            @endif
            @if($p->franchise == 1)
                <img src="/website/images/star.png" class="crown">
            @endif
            
        </div>
    </div>
</div>
@empty
    <div class="col-12 text-center">
        <img src="/website/images/nothing.png" style="width: 400px;">
    </div>
@endforelse
