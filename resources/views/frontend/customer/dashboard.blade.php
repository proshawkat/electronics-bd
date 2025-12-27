
@extends('layouts.frontend')

@section('content')   
<div id="account-account" class="container">
    <div class="row">

        <div id="content" class="account-page col-sm-9">
            <div class="my-account">
                <h2 class="title">My Account</h2>
                <ul class="list-unstyled account-list">
                    <li class="edit-info"><a href="{{ route('customer.edit_info') }}">Edit your account information</a></li>
                    <li class="edit-pass"><a href="{{ route('customer.password.change') }}">Change your password</a></li>
                    <li class="edit-address"><a href="{{ route('customer.address') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="50px" height="50px"><path d="M544 144C552.8 144 560 151.2 560 160L560 480C560 488.8 552.8 496 544 496L96 496C87.2 496 80 488.8 80 480L80 160C80 151.2 87.2 144 96 144L544 144zM96 96C60.7 96 32 124.7 32 160L32 480C32 515.3 60.7 544 96 544L544 544C579.3 544 608 515.3 608 480L608 160C608 124.7 579.3 96 544 96L96 96zM240 312C270.9 312 296 286.9 296 256C296 225.1 270.9 200 240 200C209.1 200 184 225.1 184 256C184 286.9 209.1 312 240 312zM208 352C163.8 352 128 387.8 128 432C128 440.8 135.2 448 144 448L336 448C344.8 448 352 440.8 352 432C352 387.8 316.2 352 272 352L208 352zM408 208C394.7 208 384 218.7 384 232C384 245.3 394.7 256 408 256L488 256C501.3 256 512 245.3 512 232C512 218.7 501.3 208 488 208L408 208zM408 304C394.7 304 384 314.7 384 328C384 341.3 394.7 352 408 352L488 352C501.3 352 512 341.3 512 328C512 314.7 501.3 304 488 304L408 304z"/></svg>
                        Modify your address book entries</a>
                    </li>
                    <li class="edit-wishlist"><a href="{{ route('wishlist') }}">Modify your wish list</a></li>
                </ul>
            </div>
            <div class="my-orders">
                <h2 class="title">My Orders</h2>
                <ul class="list-unstyled account-list">
                    <li class="edit-order">
                        <a href="{{ route('customer.order') }}">
                            <svg width="50px" height="50px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="5" y="4" width="14" height="17" rx="2" stroke="#222222"/>
                            <path d="M9 9H15" stroke="#222222" stroke-linecap="round"/>
                            <path d="M9 13H15" stroke="#222222" stroke-linecap="round"/>
                            <path d="M9 17H13" stroke="#222222" stroke-linecap="round"/>
                            </svg>
                            View your order history
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        @include('frontend.partials.account-menu')

    </div>
</div>
@endsection