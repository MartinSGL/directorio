@props(['color'])
<div class="alert alert-{{$color}}">
    <strong>
        <i class="fas fa-check-circle fa-fw"></i>
    </strong>
        {{$slot}}
</div>
