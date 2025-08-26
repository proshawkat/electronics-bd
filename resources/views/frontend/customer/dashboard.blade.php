
@extends('layouts.frontend')

@section('content')   
<div id="account-account" class="container">
    <div class="row">

        <div id="content" class="account-page col-sm-9">
            <div class="my-account">
                <h2 class="title">My Account</h2>
                <ul class="list-unstyled account-list">
                    <li class="edit-info"><a href="edit-account.php">Edit your account information</a></li>
                    <li class="edit-pass"><a href="password.php">Change your password</a></li>
                    <li class="edit-address"><a href="address.php">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="50px" height="50px"><path d="M544 144C552.8 144 560 151.2 560 160L560 480C560 488.8 552.8 496 544 496L96 496C87.2 496 80 488.8 80 480L80 160C80 151.2 87.2 144 96 144L544 144zM96 96C60.7 96 32 124.7 32 160L32 480C32 515.3 60.7 544 96 544L544 544C579.3 544 608 515.3 608 480L608 160C608 124.7 579.3 96 544 96L96 96zM240 312C270.9 312 296 286.9 296 256C296 225.1 270.9 200 240 200C209.1 200 184 225.1 184 256C184 286.9 209.1 312 240 312zM208 352C163.8 352 128 387.8 128 432C128 440.8 135.2 448 144 448L336 448C344.8 448 352 440.8 352 432C352 387.8 316.2 352 272 352L208 352zM408 208C394.7 208 384 218.7 384 232C384 245.3 394.7 256 408 256L488 256C501.3 256 512 245.3 512 232C512 218.7 501.3 208 488 208L408 208zM408 304C394.7 304 384 314.7 384 328C384 341.3 394.7 352 408 352L488 352C501.3 352 512 341.3 512 328C512 314.7 501.3 304 488 304L408 304z"/></svg>
                        Modify your address book entries</a>
                    </li>
                    <li class="edit-wishlist"><a href="wishlist.php">Modify your wish list</a></li>
                </ul>
            </div>
            <div class="my-orders">
                <h2 class="title">My Orders</h2>
                <ul class="list-unstyled account-list">
                    <li class="edit-order">
                        <a href="order.php">
                            <svg width="50px" height="50px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="5" y="4" width="14" height="17" rx="2" stroke="#222222"/>
                            <path d="M9 9H15" stroke="#222222" stroke-linecap="round"/>
                            <path d="M9 13H15" stroke="#222222" stroke-linecap="round"/>
                            <path d="M9 17H13" stroke="#222222" stroke-linecap="round"/>
                            </svg>
                            View your order history
                        </a>
                    </li>
                    <li class="edit-rewards">
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="50px" height="50px"><path d="M341.9 38.1C328.5 29.9 311.6 29.9 298.2 38.1C273.8 53 258.7 57 230.1 56.4C214.4 56 199.8 64.5 192.2 78.3C178.5 103.4 167.4 114.5 142.3 128.2C128.5 135.7 120.1 150.4 120.4 166.1C121.1 194.7 117 209.8 102.1 234.2C93.9 247.6 93.9 264.5 102.1 277.9C117 302.3 121 317.4 120.4 346C120 361.7 128.5 376.3 142.3 383.9C164.4 396 175.6 406 187.4 425.4L138.7 522.5C132.8 534.4 137.6 548.8 149.4 554.7L235.4 597.7C246.9 603.4 260.9 599.1 267.1 587.9L319.9 492.8L372.7 587.9C378.9 599.1 392.9 603.5 404.4 597.7L490.4 554.7C502.3 548.8 507.1 534.4 501.1 522.5L452.5 425.3C464.2 405.9 475.5 395.9 497.6 383.8C511.4 376.3 519.8 361.6 519.5 345.9C518.8 317.3 522.9 302.2 537.8 277.8C546 264.4 546 247.5 537.8 234.1C522.9 209.7 518.9 194.6 519.5 166C519.9 150.3 511.4 135.7 497.6 128.1C472.5 114.4 461.4 103.3 447.7 78.2C440.2 64.4 425.5 56 409.8 56.3C381.2 57 366.1 52.9 341.7 38zM320 160C373 160 416 203 416 256C416 309 373 352 320 352C267 352 224 309 224 256C224 203 267 160 320 160z"/></svg>
                            Your Reward Points
                        </a>
                    </li>
                    <li class="edit-returns"><a href="https://www.citytechbd.com/index.php?route=account/return">View your return requests</a></li>
                    <li class="edit-transactions"><a href="https://www.citytechbd.com/index.php?route=account/transaction">Your Transactions</a></li>
                    <li class="edit-recurring"><a href="https://www.citytechbd.com/index.php?route=account/recurring">Recurring payments</a></li>
                </ul>
            </div>
            <div class="my-newsletter">
                <h2 class="title">Newsletter</h2>
                <ul class="list-unstyled account-list">
                    <li><a href="https://www.citytechbd.com/index.php?route=account/newsletter">Subscribe / unsubscribe to newsletter</a></li>
                </ul>
            </div>
        </div>

        @include('frontend.partials.account-menu')

    </div>
</div>
@endsection