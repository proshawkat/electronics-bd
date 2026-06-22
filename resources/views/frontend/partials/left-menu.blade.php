<aside id="column-left" class="side-column">
    <div class="grid-rows">
        <div class="grid-row grid-row-column-left-1">
            <div class="grid-cols">
                <div class="grid-col grid-col-column-left-1-1">
                    <div class="grid-items">
                        <div class="grid-item grid-item-column-left-1-1-1">
                            <div id="flyout-menu-68a47950ef24c" class="flyout-menu flyout-menu-7">
                                <ul class="rd-menu">
                                    @foreach($menuCategories as $category)
                                        @if($category->children->count())
                                            <li class="menu-item flyout-menu-item flyout-menu-item-{{ $loop->iteration }} multi-level dropdown">
                                                <a href="{{ route('category.show', $category->slug) }}" class="dropdown-toggle" aria-expanded="false">
                                                    <svg width="15px" height="15px" viewBox="-19.04 0 75.804 75.804" xmlns="http://www.w3.org/2000/svg">
                                                        <g id="Group_65" data-name="Group 65" transform="translate(-831.568 -384.448)">
                                                            <path id="Path_57" data-name="Path 57" d="M833.068,460.252a1.5,1.5,0,0,1-1.061-2.561l33.557-33.56a2.53,2.53,0,0,0,0-3.564l-33.557-33.558a1.5,1.5,0,0,1,2.122-2.121l33.556,33.558a5.53,5.53,0,0,1,0,7.807l-33.557,33.56A1.5,1.5,0,0,1,833.068,460.252Z" fill="#000000"/>
                                                        </g>
                                                    </svg>                                                    
                                                    <span class="links-text">{{ $category->name }}</span>
                                                    <span class="open-menu collapsed" data-toggle="collapse" data-target="#collapse-{{ $category->id }}">
                                                        <i class="fa fa-plus"></i>
                                                    </span>
                                                </a>

                                                <div class="dropdown-menu j-dropdown" id="collapse-{{ $category->id }}">
                                                    <ul class="rd-menu">
                                                        @foreach($category->children as $sub)
                                                            <li class="menu-item menu-item-c{{ $sub->id }}">
                                                                <a href="{{ route('category.sub.show', [$category->slug, $sub->slug]) }}">
                                                                    <span class="links-text">{{ $sub->name }}</span>
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </li>
                                        @else
                                            <li class="menu-item flyout-menu-item flyout-menu-item-{{ $loop->iteration }} multi-level">
                                                <a href="{{ route('category.show', $category->slug) }}">
                                                    <svg width="15px" height="15px" viewBox="-19.04 0 75.804 75.804" xmlns="http://www.w3.org/2000/svg">
                                                        <g id="Group_65" data-name="Group 65" transform="translate(-831.568 -384.448)">
                                                            <path id="Path_57" data-name="Path 57" d="M833.068,460.252a1.5,1.5,0,0,1-1.061-2.561l33.557-33.56a2.53,2.53,0,0,0,0-3.564l-33.557-33.558a1.5,1.5,0,0,1,2.122-2.121l33.556,33.558a5.53,5.53,0,0,1,0,7.807l-33.557,33.56A1.5,1.5,0,0,1,833.068,460.252Z" fill="#000000"/>
                                                        </g>
                                                    </svg>

                                                    <span class="links-text">{{ $category->name }}</span>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>

