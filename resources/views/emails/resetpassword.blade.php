Dear {{ $name }}, <br/><br>

Your Password Reset Link is: <a href="{{ url('password/reset/'.$request) }}">{{ url('password/reset/'.$request) }}</a>

<br><br>
<div class="warning">This Link activated For Only 10 Minutes.</div>
<br><br>

Thank You