<script type="text/javascript" src="{{ asset('theme/assets/Scripts/jquery-3.5.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('theme/assets/Scripts/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('theme/assets/Scripts/countdown.js') }}"></script>
<script type="text/javascript" src="{{ asset('theme/assets/Scripts/scripts.js') }}"></script>

@yield('special-scripts')

<script>
  jQuery(document).ready(function() {
    jQuery('li.nav-item a[href="'+ window.location.href +'"]').parent().addClass('active');
  });
</script>