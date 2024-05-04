@php
$i=1;
$Content = 'Contact';
@endphp
@forelse($contact as $c)
<tr>
    <td>{{$i}}</td>
    <td>{{$c->name}}</td>
    <td>{{$c->email}}</td>
    <td>{{$c->phone}}</td>
    <td>{{$c->subject}}</td>
    <td>{{$c->date}}</td>
    <td class="text-center">
        <button title="Delete {{ $Content }}" type="button" class="btn btn-outline-danger waves-effect waves-light m-1 Table_Button Delete_Button" Code="{{ $c->code }}" data-toggle="modal" data-target="#Delete_Model">
            <i class="fa fa-trash-o fa-2x"></i>
        </button>

        <button title="Read {{ $Content }} Message" type="button" class="btn btn-outline-success waves-effect waves-light m-1 Table_Button Read_Button" Code="{{ $c->code }}" data-toggle="modal" data-target="#Read_Model">
            <i class="fa fa-envelope-open fa-2x"></i>
        </button>
    </td>
</tr>
@php
$i++;
@endphp
@empty
<td colspan="7" class="text-center">Nothing Found</td>
@endforelse

<script>
	$(".Delete_Button").on('click', function(){ $(".code").val($(this).attr('Code')); });
    $(".Read_Button").on('click', function(e){ e.preventDefault(); var fd  = new FormData();
    fd.append('code', $(this).attr('Code')); fd.append('_token', $("input[name=_token]").val());
    $.ajax({method: "POST",url:'/<?php echo $Content ?>/Read',processData: false,contentType: false,data: fd,})
    .done(function(response) {if (response.error == 'logout') {location.assign("/dashboard/logout");}
    else{
        var contact = response.contact;
        $("#name_span").text(contact[0].name);
        $("#email_span").text(contact[0].email);
        $("#phone_span").text(contact[0].phone);
        $("#subject_span").text(contact[0].subject);
        $("#message_span").text(contact[0].message);
    }});});
</script>

