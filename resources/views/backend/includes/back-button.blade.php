@php
    $backUrl = url()->previous();
@endphp

@if($backUrl && $backUrl !== url()->current())
    <a href="{{ $backUrl }}" class="btn btn-warning btn-sm">
        &laquo; Back
    </a>
@endif
