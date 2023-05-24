<div class="card {{$cardClass}}">
    <div class="card-body shadow-lg">
        @session('session_alert')
        <div class="alert alert-{{session()->get('session_alert_type')}}">
            {{session()->get('session_alert')}}
        </div>
        @endsession

        {{$slot}}
    </div>
</div>
