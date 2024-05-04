
@php
$i=1;
$Content = 'Project';
@endphp
@forelse($project as $p)
<tr>
    <td>{{$i}}</td>
    <td><img src="{{ asset('/uploads/project/card/' . $p->card) }}" alt="{{ $Content }} Card Image"></td>
    <td>{{$p->name}}</td>
    <td>
        @if ($p->status == 0)
            <span class="badge bg-success m-1">Active</span>
        @else
            <span class="badge bg-danger m-1">De-Active</span>
        @endif
    </td>
    <td>{{$p->account}}</td>
    <td>{{$p->date}}</td>
    <td class="text-center">
        {{-- <button title="Delete {{ $Content }}" type="button" class="btn btn-outline-danger waves-effect waves-light m-1 Table_Button" Code="{{ $p->code }}" data-toggle="modal" data-target="#Delete_Model">
            <i class="fa fa fa-trash-o fa-2x"></i>
        </button> --}}

        @if ($p->status == 1)
            <button title="Active {{ $Content }}" type="button" class="btn btn-outline-success waves-effect waves-light m-1 Table_Button Status" Code="{{ $p->code }}">
                <i class="fa fa-unlock fa-2x"></i>
            </button>
        @else
            <button title="De-Active {{ $Content }}" type="button" class="btn btn-outline-danger waves-effect waves-light m-1 Table_Button Status" Code="{{ $p->code }}">
                <i class="fa fa-lock fa-2x"></i>
            </button>
        @endif

        {{-- <a href="/dashboard/project/{{$p->code}}/edit">
            <button title="Edit {{ $Content }}" type="button" class="btn btn-outline-success waves-effect waves-light m-1 Table_Button">
                <i class="fa fa-edit fa-2x"></i>
            </button>
        </a>

        <a href="/dashboard/project/{{$p->code}}/images">
            <button title="Images {{ $Content }}" type="button" class="btn btn-outline-primary waves-effect waves-light m-1 Table_Button">
                <i class="fa fa-image fa-2x"></i>
            </button>
        </a> --}}
    </td>
</tr>
@php
$i++;
@endphp
@empty
<td colspan="8" class="text-center">Nothing Found</td>
@endforelse

<script>
	$(".Table_Button").on('click', function(){ $(".code").val($(this).attr('Code')); });
    $(".Status").on('click', function(e){ e.preventDefault(); var fd  = new FormData();
    fd.append('code', $(this).attr('Code')); fd.append('_token', $("input[name=_token]").val());
    $.ajax({method: "POST",url:'/User/<?php echo $Content ?>/Status',processData: false,contentType: false,data: fd,})
    .done(function(response) {if (response.error == 'logout') {location.assign("/dashboard/logout");}
    if (response.error == false) {Get(); Notification('success','mini','fa fa-check','bottom right',response.message);}});});
</script>

