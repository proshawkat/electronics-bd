@extends('layouts.frontend')

@section('content')
<div id="content" class="col-sm-9 mt-2">
    <div class="row">
        <div class="col-sm-12">
            <h2 style="font-size: 20px; margin-bottom: 0px;">All Categories</h2>
            <hr style="margin-top: 5px; margin-bottom: 5px;">
            <div class="all-categories-wrapper">
                @foreach($categories as $category)
                    <div class="all-category-card">
                        <h3 class="all-category-title">
                            <a href="{{ route('category.show', $category->slug) }}" style="display: flex; align-items: center;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" style="margin-right: 8px;" viewBox="0 0 16 16">
                                  <path d="M9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.825a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3zm-8.322.12C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139z"/>
                                </svg>
                                {{ $category->name }}
                            </a>
                        </h3>
                        @if($category->children->count() > 0)
                            <ul class="all-subcategory-list">
                                @foreach($category->children as $subCategory)
                                    <li>
                                        <a href="{{ route('category.sub.show', ['slug' => $category->slug, 'sub_slug' => $subCategory->slug]) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" style="margin-right: 6px;" viewBox="0 0 16 16">
                                              <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                            </svg>
                                            {{ $subCategory->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
