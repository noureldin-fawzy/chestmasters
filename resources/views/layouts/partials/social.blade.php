
@if(setting('social.facebook'))
  <li><a href="{{ setting('social.facebook') }}" target="_blank"><i class="fab fa-facebook-f fa-fw"></i></a> </li>
@endif

@if(setting('social.twitter'))
  <li><a href="{{ setting('social.twitter') }}" target="_blank"><i class="fab fa-twitter fa-fw"></i></i></a> </li>
@endif

@if(setting('social.instagram'))
  <li><a href="{{ setting('social.instagram') }}" target="_blank"><i class="fab fa-instagram fa-fw"></i></a> </li>
@endif

@if(setting('social.youtube'))
  <li><a href="{{ setting('social.youtube') }}" target="_blank"><i class="fab fa-youtube fa-fw"></i></a> </li>
@endif
