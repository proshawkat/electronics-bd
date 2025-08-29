<div class="refine-categories refine-grid">
    <div class="refine-items">
        @foreach($subcategories as $sub)
            <div class="refine-item">
                <a href="{{ route('category.sub.show', [$slug, $sub->slug]) }}">
                    <span class="refine-name"><span class="links-text">{{ $sub->name }}</span></span>
                </a>
            </div>
        @endforeach    
    </div>
</div>