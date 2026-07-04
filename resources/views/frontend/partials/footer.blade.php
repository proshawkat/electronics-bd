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
                            <svg width="18" height="18" viewBox="0 0 448 512" fill="#fff"><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg>
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
