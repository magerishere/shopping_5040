<div class="card">
    <div class="card-body">
        @session('session_message')
        <div class="alert alert-{{session()->get('session_alert_type')}}">
            {{session()->get('session_alert')}}
        </div>
        @endsession

        {{$slot}}
    </div>
</div>
