<footer class="new-footer">
    <div class="new-footer-main">
        <div class="container-fluid">
            <div class="row new-footer-row">

                {{-- Column 1: Address --}}
                <div class="col-xs-12 col-sm-6 col-md-3 new-footer-col">
                    <h4 class="new-footer-heading">Address:</h4>
                    <p class="new-footer-address">{{ $generalSettings->address ?? 'Old 11 New 24, National Stadium, Dhaka-1000' }}</p>
                    <ul class="new-footer-contact-list">
                        <li>
                            <span class="nf-icon">✉</span>
                            <a href="mailto:{{ $generalSettings->email ?? '' }}">
                                Email: {{ $generalSettings->email ?? 'radioelectric24@gmail.com' }}
                            </a>
                        </li>
                        <li>
                            <span class="nf-icon">📞</span>
                            <a href="tel:{{ $generalSettings->phone ?? '' }}">
                                Call: {{ $generalSettings->phone ?? '88-01979551074, 02-223381074' }}
                            </a>
                        </li>
                        <li>
                            <span class="nf-icon">🕐</span>
                            <span>Time: 10:30 am–7:30 pm &nbsp;(Friday off)</span>
                        </li>
                    </ul>
                </div>

                {{-- Column 2: Company Information --}}
                <div class="col-xs-12 col-sm-6 col-md-3 new-footer-col">
                    <h4 class="new-footer-heading">Company Information</h4>
                    <ul class="new-footer-links">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Career</a></li>
                        <li><a href="{{ route('customer.dashboard') }}">My Account</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms &amp; Conditions</a></li>
                    </ul>
                </div>

                {{-- Column 3: Support --}}
                <div class="col-xs-12 col-sm-6 col-md-3 new-footer-col">
                    <h4 class="new-footer-heading">Support</h4>
                    <ul class="new-footer-links">
                        <li><a href="#">How to Order</a></li>
                        <li><a href="#">Delivery Policy</a></li>
                        <li><a href="{{ route('contact.index') }}">Contact</a></li>
                    </ul>
                </div>

                {{-- Column 4: Google Map + Social --}}
                <div class="col-xs-12 col-sm-6 col-md-3 new-footer-col">
                    <h4 class="new-footer-heading">Find us on Google Map</h4>
                    <div class="new-footer-map">
                        <a href="{{ $generalSettings->google_map ?? 'https://maps.google.com' }}" target="_blank">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.2765083087256!2d90.40729!3d23.72804!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjPCsDQzJzQxLjAiTiA5MMKwMjQnMjYuMyJF!5e0!3m2!1sen!2sbd!4v1234567890"
                                width="100%"
                                height="90"
                                style="border:0; border-radius:4px;"
                                allowfullscreen=""
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </a>
                    </div>
                    {{-- Social Icons --}}
                    <div class="new-footer-social">
                        @if(!empty($generalSettings->facebook))
                        <a href="{{ $generalSettings->facebook }}" target="_blank" class="nf-social-btn nf-fb" title="Facebook">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="#fff"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                        </a>
                        @endif
                        @if(!empty($generalSettings->whatsapp))
                        <a href="{{ $generalSettings->whatsapp }}" target="_blank" class="nf-social-btn nf-wa" title="WhatsApp">
                            <svg width="18" height="18" viewBox="0 0 32 32" fill="#fff"><path d="M26.576 5.363c-2.69-2.69-6.406-4.354-10.511-4.354-8.209 0-14.865 6.655-14.865 14.865 0 2.732.737 5.291 2.022 7.491l-2.147 7.839 8.031-2.107a14.86 14.86 0 0 0 7.107 1.81h.006c8.209 0 14.862-6.656 14.862-14.865 0-4.103-1.662-7.817-4.505-10.679z"/></svg>
                        </a>
                        @endif
                        @if(!empty($generalSettings->youtube))
                        <a href="{{ $generalSettings->youtube }}" target="_blank" class="nf-social-btn nf-yt" title="YouTube">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="#fff"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46A2.78 2.78 0 0 0 1.46 6.42 29 29 0 0 0 1 12a29 29 0 0 0 .46 5.58 2.78 2.78 0 0 0 1.95 1.96C5.12 20 12 20 12 20s6.88 0 8.59-.46a2.78 2.78 0 0 0 1.96-1.96A29 29 0 0 0 23 12a29 29 0 0 0-.46-5.58z"/><polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02" fill="#FFB300"/></svg>
                        </a>
                        @endif
                    </div>
                </div>

            </div>{{-- /.row --}}
        </div>{{-- /.container-fluid --}}
    </div>{{-- /.new-footer-main --}}

    {{-- Copyright Bar --}}
    <div class="new-footer-bottom">
        <span>Copyright &copy; 2016–{{ date('Y') }}, RadioElectric BD. All Rights Reserved.</span>
    </div>
</footer>
