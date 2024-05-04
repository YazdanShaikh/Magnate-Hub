<?php use Carbon\Carbon; ?>
@php
    $i = 0;
@endphp
@foreach($Chat as $c)
@if($i <= 5)
@php
    if ($c->date != date('Y-m-d')) {
        $Days = ceil(abs(strtotime(date('Y-m-d')) - strtotime($c->date)) / 86400);
        if ($Days == 1) { $Time_Left = $Days . ' Day ago'; } else { $Time_Left = $Days . ' Days ago';}
    } else {
        $Differerce = Carbon::parse($c->time)->diffInMinutes(Carbon::parse(date('H:i:s')));
        if($Differerce == 0){ $Time_Left = 'Just Now'; }else {if($Differerce < 60){ $Time_Left = $Differerce .' Minutes ago'; }else { $Find_Hour = floor($Differerce / 60); if($Find_Hour == 1) { $Time_Left = $Find_Hour . ' Hour Ago'; }else{ $Time_Left = $Find_Hour . ' Hours Ago'; } }}
    }
@endphp
<li>
    <a href="/dashboard/professionals/chat/{{ $c->code }}">
        <div class="media">
            @if($c->profile != null)
                <img class="img-fluid rounded-circle me-3" src="{{ asset('/uploads/user/profile/' . $c->profile) }}" style="height:50px; width:50px;">
            @else
                <img class="img-fluid rounded-circle me-3" src="/user/assets/profile.png">
            @endif
            <div class="media-body">{{ \Illuminate\Support\Str::limit($c->project_name, 25, $end='...') }} <span>{{ \Illuminate\Support\Str::limit($c->user_name, 25, $end='...') }}<span>
                @if($c->message == null)
                 <p class="f-12 light-font">{{ $c->user_name }} Has Added You On Chat</p>
                @else
                <p class="f-12 light-font">{{ \Illuminate\Support\Str::limit($c->message, 40, $end='...') }}</p>
                @endif
            </div>
            <p class="f-12">{{ $Time_Left }}</p>
        </div>
    </a>
</li>
@endif
@php
    $i++;
@endphp
@endforeach
@if($i > 5)
    <li class="text-center"> <a class="f-w-700" href="/dashboard/professionals/chat">See All </a></li>
@endif
<script>
    if ('<?php echo $i ?>' == 0) {
        $("#chat_Icon").addClass('d-none');
    }else{
        $("#chat_Icon").removeClass('d-none');
    }
</script>
