
@php
$i=1;
$Content = 'Bookmark';
@endphp
@forelse($wishlist as $w)
<tr>
    <td>{{$i}}</td>
    <td><img src="{{ asset('/uploads/project/card/' . $w->card) }}"></td>
    <td>{{$w->name}}</td>
    <td>{{$w->date}}</td>
    <td class="text-center">
        <button title="Remove {{ $Content }}" type="button" class="btn btn-outline-danger waves-effect waves-light m-1 Table_Button Remove" Code="{{ $w->code }}">
            <i class="fa fa-trash fa-2x"></i>
        </button>
    </td>
</tr>
@php
$i++;
@endphp
@empty
<td colspan="8" class="text-center">Nothing Found</td>
@endforelse
<script>
    $(".Remove").on('click', function(){
        var fd  = new FormData();
        fd.append('code', $(this).attr('Code'));
        fd.append('_token', $("input[name=_token]").val());
        $.ajax({method: "POST",url:'/User/Wishlist/Remove',processData: false,contentType: false,data: fd,})
        .done(function(response) {if (response.error == true) {location.assign("/login");}
        if (response.error == false) {Get(); Notification('Bookmark','Removed Successfully','success');}});
    });
</script>
