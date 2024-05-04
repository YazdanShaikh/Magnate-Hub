@foreach($Chat as $c)
    @if($c->send == 1)
    <li>
        <div class="message my-message"><img class="rounded-circle float-start chat-user-img img-30" src="{{ asset('/uploads/project/card/' . $c->card) }}" alt="" style="height:30px; width:30px;">
            <div class="message-data text-end"><span class="message-data-time">{{ date('h:i A', strtotime($c->time)) }}</span></div> <span class="message_span">{{ $c->message }}</span>
        </div>
    </li>
    @else
    <li class="clearfix">
        <div class="message other-message pull-right">
            @if($c->profile != null)
            <img class="rounded-circle float-end chat-user-img img-30" src="{{ asset('/uploads/user/profile/' . $c->profile) }}" alt=""style="height:30px; width:30px;">
            @else
            <img class="rounded-circle float-end chat-user-img img-30" src="/user/assets/profile.png" alt="">
            @endif
            <div class="message-data"><span class="message-data-time">{{ date('h:i A', strtotime($c->time)) }}</span></div> <span class="message_span">{{ $c->message }}</span>
        </div>
    </li>
    @endif
@endforeach