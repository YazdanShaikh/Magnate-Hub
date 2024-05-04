@foreach($List as $l)
<li class="Project_List clearfix clearfix_{{ $l->project_id }}" onclick="View_Chat({{ $l->project_id }},{{ $l->user_id }})">
    <div class="media media_chat">
    @if($l->profile == null)
        <img class="rounded-circle user-image" src="/user/assets/profile.png" alt="">
    @else
        <img class="rounded-circle user-image" src="{{ asset('/uploads/user/profile/'. $l->profile) }}" alt="">
    @endif
        @foreach($Notification as $n)
            @if($n->project_id == $l->project_id && $n->count > 0)
                <div class="status-circle away"></div>
            @endif
        @endforeach
        <div class="media-body">
            <div class="about">
                <div class="name project_name">{{ $l->project }}</div>
                <div class="status">{{ $l->name }}</div>
            </div>
        </div>
    </div>
</li>
@endforeach
@csrf
<script>
    function View_Chat(project_id,user_id){
        var fd = new FormData();
        fd.append('_token', $("input[name=_token]").val());
        fd.append('project_id', project_id);
        fd.append('user_id', user_id);
        $("#project_id").val(project_id);
        $("#user_id").val(user_id);
        $(".clearfix .media").removeClass('media_active_class');
        $(".clearfix_"+project_id+" .media").addClass('media_active_class');
        $.ajax({
            method: "POST",
            url: '/Raising/Chat/Get',
            processData: false,
            contentType: false,
            data: fd
        }).done(function(response) {
            if (response.error == true) {
                location.assign("/dashboard/login");
            }else{
                $(".Send_Button").removeAttr('disabled');
                $("#Chat").html('').append(response);
                $(".chat-history").scrollTop($(".chat-history").height() * 100);
            }
        });
    }
</script>
