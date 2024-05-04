@php
    $i = 0;
    $cf = 0;
@endphp
@foreach ($Chat as $c)
    @if ($c->message != null)
        @if ($c->send != 1)
            <li>
                <div class="message my-message">
                    @if($c->user_profile != null)
                    <img class="rounded-circle float-start chat-user-img img-30" src="{{ asset('/uploads/user/profile/' . $c->user_profile) }}" alt=""style="height:30px; width:30px;">
                    @else
                    <img class="rounded-circle float-start chat-user-img img-30" src="/user/assets/profile.png" alt="">
                    @endif
                    <div class="message-data text-end"><span
                            class="message-data-time">{{ date('h:i A', strtotime($c->time)) }}</span></div> <span
                        class="message_span">{{ $c->message }}</span>
                </div>
            </li>
        @else
            <li class="clearfix">
                <div class="message other-message pull-right">
                    @if($c->raising_profile != null)
                        <img class="rounded-circle float-end chat-user-img img-30" src="{{ asset('/uploads/raising/profile/' . $c->raising_profile) }}" alt=""style="height:30px; width:30px;">
                    @else
                        <img class="rounded-circle float-end chat-user-img img-30" src="/user/assets/profile.png" alt="">
                    @endif
                    <div class="message-data"><span
                            class="message-data-time">{{ date('h:i A', strtotime($c->time)) }}</span></div> <span
                        class="message_span">{{ $c->message }}</span>
                </div>
            </li>
        @endif
        @php
            $cf++;
        @endphp
    @endif
    @php
        $i++;
    @endphp
@endforeach
@if ($cf == 0)
    <div class="row">
        <div class="col-12 text-center">
            <img style="height:500px; object-fit:contain;" src="/raising/assets/start.png">
        </div>
    </div>
@endif
<script>
    $("#project").html('<?php echo $Project[0]->name; ?>');
    $("#raising_name").html('<?php echo $User[0]->name; ?>');
    $("#raising_name").attr('href','/dashboard/professionals/user/<?php echo $User[0]->code; ?>');
    $("#card").attr('src', '/uploads/project/card/<?php echo $Project[0]->card; ?>');
    $("#message_count").val('<?php echo $i; ?>');
    if ('<?php echo $User[0]->profile; ?>' != '') {
        $("#user_profile").attr('src','/uploads/user/profile/<?php echo $User[0]->profile; ?>');   
    }
</script>
