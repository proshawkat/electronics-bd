<footer>
    <div class="grid-rows">
        <div class="grid-row grid-row-1">
            <div class="row">
                <div class="col-sm-4">
                    <div class="grid-items">
                        <div class="grid-item grid-item-1">
                            <div class="module title-module module-title-311">
                                <div class="title-wrapper">
                                    <h3>Service</h3>
                                    <div class="title-divider"></div>
                                    <div class="subtitle"></div>
                                </div>
                            </div>
                        </div>
                        <div class="grid-item grid-item-2">
                            <div class="module module-info_blocks module-info_blocks-305">
                                <div class="module-body">
                                    <div class="module-item module-item-1 info-blocks info-blocks-icon">
                                        <a href="tel:{{ $generalSettings->phone }}" class="info-block">
                                            <div class="info-block-content">
                                                <div class="info-block-title">9am - 12pm</div>
                                                <div class="info-block-text">{{ $generalSettings->phone }}</div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="module-item module-item-2 info-blocks info-blocks-icon">
                                        <a href="mailto:{{ $generalSettings->email }}" class="info-block">
                                            <div class="info-block-content">
                                                <div class="info-block-title">E-mail Us:</div>
                                                <div class="info-block-text">{{ $generalSettings->email }}</div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="grid-items">
                        <div class="grid-item grid-item-1">
                            <div class="links-menu links-menu-72">
                                <h3 class="title module-title closed">Custom Links</h3>
                                <ul class="module-body">
                                    <li class="menu-item links-menu-item links-menu-item-1">
                                        <a href="#">
                                            <span class="links-text">About Us</span>
                                        </a>
                                    </li>


                                    <li class="menu-item links-menu-item links-menu-item-3">
                                        <a href="{{ route('contact.index'); }}">
                                            <span class="links-text">Contact</span>
                                        </a>
                                    </li>

                                    <li class="menu-item links-menu-item links-menu-item-4">
                                        <a href="#">
                                            <span class="links-text">Returns</span>
                                        </a>
                                    </li>

                                    <li class="menu-item links-menu-item links-menu-item-6">
                                        <a href="{{ route('customer.dashboard') }}">
                                            <span class="links-text">My Accounts</span>
                                        </a>
                                    </li>

                                    <li class="menu-item links-menu-item links-menu-item-7">
                                        <a href="#">
                                            <span class="links-text">Privacy Policy</span>
                                        </a>
                                    </li>

                                    <li class="menu-item links-menu-item links-menu-item-8">
                                        <a href="#">
                                            <span class="links-text">Terms and Conditions</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="grid-items">
                        <div class="grid-item grid-item-1">
                            <div class="module title-module module-title-312">
                                <div class="title-wrapper">
                                    <h3>Stay Connected</h3>
                                    <div class="title-divider"></div>
                                    <div class="subtitle">
                                        <a href="{{ $generalSettings->google_map }}" target="_blank">
                                            {{ $generalSettings->address }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid-item grid-item-2">
                            <div class="icons-menu icons-menu-61">
                                <ul>
                                    <li class="menu-item icons-menu-item icons-menu-item-1 icon-menu-icon">
                                        <a data-toggle="tooltip" data-tooltip-class="icons-menu-tooltip-61" data-placement="top" title="" href="{{ $generalSettings->facebook }}" target="_blank" data-original-title="Facebook">
                                            <span class="links-text">Facebook</span>
                                        </a>
                                    </li>
                                    <li class="menu-item icons-menu-item icons-menu-item-2 icon-menu-icon">
                                        <a data-toggle="tooltip" data-tooltip-class="icons-menu-tooltip-61" data-placement="top" title="" href="{{ $generalSettings->whatsapp }}" target="_blank" data-original-title="Whatsapp">
                                            <span class="links-text">Whatsapp</span>
                                        </a>
                                    </li>
                                    <li class="menu-item icons-menu-item icons-menu-item-3 icon-menu-icon">
                                        <a data-toggle="tooltip" data-tooltip-class="icons-menu-tooltip-61" data-placement="top" title="" href="{{ $generalSettings->youtube }}" data-original-title="YouTube">
                                            <span class="links-text">YouTube</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid-row grid-row-2">
            <div class="grid-cols">
                <div class="grid-col grid-col-1">
                    <div class="grid-items">
                        <div class="grid-item grid-item-1">
                            <div class="links-menu links-menu-77">
                                <ul class="module-body">
                                    <li class="menu-item links-menu-item links-menu-item-1">
                                        <a>
                                            <span class="links-text">Copyright © 2016-{{ date('Y') }}, RadioElectric BD, All Rights Reserved</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
