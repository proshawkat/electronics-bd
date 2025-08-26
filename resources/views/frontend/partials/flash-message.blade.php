@if (session('success') || session('error') || session('info') || $errors->any())
    @php
        if(session('success')) {
            $type = 'success';
            $message = session('success');
        } elseif(session('error')) {
            $type = 'danger';
            $message = session('error');
        } elseif(session('info')) {
            $type = 'info';
            $message = session('info');
        } elseif($errors->any()) {
            $type = 'danger';
            $message = implode('<br>', $errors->all()); 
        }
    @endphp

    <div id="flash-message" class="alert alert-{{ $type }} alert-dismissible fade show" style="opacity:1; display:block; position:fixed; top:20px; right:20px; z-index:9999;">
        {!! $message !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <script>
        setTimeout(function() {
            const flash = document.getElementById('flash-message');
            if(flash) {
                flash.classList.remove('show');
                flash.classList.add('hide');
            }
        }, 55000); // 5 second
    </script>
@endif
