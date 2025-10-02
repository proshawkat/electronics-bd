<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preload" href="{{ asset('public/backend/css/adminlte.css') }}" as="style" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
        crossorigin="anonymous" media="print" onload="this.media='all'" />
        <link rel="stylesheet" href="{{ asset('public/backend/css/overlayscrollbars.min.css') }}" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" crossorigin="anonymous" />
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('public/backend/css/adminlte.css') }}" />
        <style>
            .bg-body-secondary{
                background-color: #f85606 !important;
            }
            .sidebar-wrapper a, .sidebar-wrapper .nav-header{
                color: #fff !important;
            }
            .sidebar-brand{
                border-bottom: 1px solid #fff !important;
            }
            
        </style>
        @yield('styles')
    </head>
    <body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
        <div class="app-wrapper">
            @include('backend.includes.header')
            @include('backend.includes.sidebar')
            <main class="app-main">
                @foreach (['success', 'error', 'warning', 'info'] as $msg)
                    @if(session()->has($msg))
                        <div class="alert alert-{{ $msg }} alert-dismissible fade show" role="alert">
                            {{ session($msg) }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                @endforeach

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
        <script
        src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
        crossorigin="anonymous"
        ></script>
        <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        crossorigin="anonymous"
        ></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
        <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"
        crossorigin="anonymous"
        ></script>
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
        <script src="{{ asset('public/backend/js/adminlte.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('#product-description').summernote({
                height: 200,      
                placeholder: 'Write here...',
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['fontsize', 'color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'table', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview']]
                ]
                });
            });

            $(document).ready(function () {
                var selectedCategory = $('#selected_category').val();
                var selectedSubCategory = $('#selected_sub_category').val();

                if (selectedCategory) {
                    $('#category_id').val(selectedCategory);

                    $.ajax({
                        url: '/electronics-bd/admin/get-subcategories/' + selectedCategory,
                        type: 'GET',
                        success: function (data) {
                            $('#sub_category_id').html('<option value="">Choose...</option>');
                            $.each(data, function (id, name) {
                                var selected = (id == selectedSubCategory) ? 'selected' : '';
                                $('#sub_category_id').append('<option value="' + id + '" ' + selected + '>' + name + '</option>');
                            });
                        }
                    });
                }

                $('#category_id').on('change', function () {
                    var category_id = $(this).val();
                    $('#sub_category_id').html('<option value="">Choose...</option>');

                    if (category_id) {
                        $.ajax({
                            url: '/electronics-bd/admin/get-subcategories/' + category_id,
                            type: 'GET',
                            success: function (data) {
                                $.each(data, function (id, name) {
                                    $('#sub_category_id').append('<option value="' + id + '">' + name + '</option>');
                                });
                            }
                        });
                    }
                });
            });
        </script>
    </body>
</html>
