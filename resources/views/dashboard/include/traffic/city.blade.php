@php
$i = 1;
@endphp
@forelse($Traffic as $t)
<tr>
    <td>{{ $i }}</td>
    <td>{{ $t->city }}</td>
    <td>{{ $t->count }}</td>
    <td>
        <a href="/dashboard/traffic/city/{{ $t->city }}/{{ $t->country }}">
            <button title="Traffic Of {{ $t->city }}" type="button" class="btn btn-outline-primary waves-effect waves-light m-1 Table_Button">
                <i class="fa fa-info fa-2x"></i>
            </button>
        </a>
    </td>
</tr>
@php
$i++;
@endphp
@empty
<tr class="text-center">
    <td colspan="4">Nothing Found</td>
</tr>
@endforelse
