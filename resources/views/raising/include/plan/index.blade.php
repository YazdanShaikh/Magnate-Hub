
@php
$i=1;
$Content = 'Plan';
@endphp
@forelse($Plan as $p)
@php
    if($p->type == 1){
        $type = 'Essentials';
        $price = 19;
    }elseif ($p->type == 2) {
        $type = 'Premium';
        $price = 29;
    }elseif ($p->type == 3) {
        $type = 'Enterprise';
        $price = 39;
    }elseif ($p->type == 4) {
        $price = 249;
        $type = 'Capital Raise';
    }
@endphp
<tr>
    <td>{{$i}}</td>
    <td>{{$type}}</td>
    <td>${{$price}}</td>
    <td>{{ date('F d Y', strtotime($p->date)) }}</td>
    <td>
        @if($p->type == 1)
            {{ date('F d Y', strtotime($p->expiry)) }}
        @else
            Listing active until sold
        @endif
    </td>
    <td>
        @if($p->type == 1)
            @if($p->expiry >= date('Y-m-d'))
                @if($p->status == 1)
                    <span class="badge badge-danger">Expired</span>
                @else
                    <span class="badge badge-success">Expire In {{ round((strtotime($p->expiry) - time()) / 86400) }} Days</span>
                @endif
            @else
                <span class="badge badge-danger">Expired</span>
            @endif
        @else   
            @if($p->status == 1)
                <span class="badge badge-danger">Expired</span>
            @else
                <span class="badge badge-success">Active</span>
            @endif
        @endif
    </td>
</tr>
@php
$i++;
@endphp
@empty
<td colspan="8" class="text-center">Nothing Found</td>
@endforelse
