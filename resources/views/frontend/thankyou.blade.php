@extends('layouts.frontend')

@section('styles')
<style>
    #common-success{
        background: #fff;
    }
    .route-product-product:not(.popup) h1.page-title{
        display: block !important;
    }
    .page-title {
        font-family: 'Oswald';
        font-weight: 400;
        font-size: 26px;
        color: rgba(48, 56, 65, 1);
        text-align: left;
        text-transform: uppercase;
        border-width: 0;
        border-bottom-width: 1px;
        border-style: solid;
        border-color: rgba(221, 221, 221, 1);
        border-radius: 0px;
        padding: 20px;
        margin: 0px;
        white-space: normal;
        overflow: visible;
        text-overflow: initial;
        text-align: left;
    }
    .container-wrapper p{
        padding: 2rem 2rem 0 !important;
    }
</style>
@endsection
@section('content')    
    <h1 class="title page-title"><span>Thank you for your order!</span></h1>
    <div id="common-success" class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="container-wrapper">
                    <p>We’ve successfully received and processed your order.</p>
                    <p>If you have any questions or concerns, please feel free to contact the <a href="{{ route('contact.index') }}">store owner</a>.</p>
                    <p>We appreciate your business and hope you enjoy your purchase!</p>
                    <div class="buttons">
                        <div class="pull-right"><a href="{{ route('home') }}" class="btn btn-primary">Continue</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection