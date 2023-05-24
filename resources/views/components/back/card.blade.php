<div class="card">
    <div class="card-body">
        @session('session_alert')
        <div class="alert alert-{{session()->get('session_alert_type')}}">
            {{session()->get('session_alert')}}
        </div>
        @endsession

        {{$slot}}
    </div>
</div>
