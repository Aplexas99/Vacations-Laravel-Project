<h2>Request from: {{$vacationRequest->employee->username}}</h2>
<br>
<div class="list-group">
        <h4>Start date: {{$vacationRequest->start_date}}</h4>
        <h4>End Date: {{$vacationRequest->end_date}}</h4>
        <h4>Days used: <span id="duration"></span> days</h4>
        @if($vacationRequest->getApproversCount() > 0)
        <h4>Approvers:</h4>
        <ul>
            @foreach($vacationRequest->getApprovers() as $approver)
            <li>{{$approver->approver->username}}</li>
            @endforeach
        </ul>
        @endif
        @if($vacationRequest->getRejectorsCount() > 0)
        <h4>Rejectors:</h4>
        <ul>
            @foreach($vacationRequest->getRejectors() as $rejector)
            <li>{{$rejector->approver->username}}</li>
            @endforeach
        </ul>
        @endif
        @if(isset($vacationRequest->note))
            <h4>Note:</h4>
            <p>{{$vacationRequest->note}}</p>
        @endif

</div>

<script>
    let startDateValue = "{{ $vacationRequest->start_date }}";
let endDateValue = "{{ $vacationRequest->end_date }}";

    const durationElement = document.getElementById('duration');

    calculateDuration();
    function calculateDuration() {
        const startDate = new Date(startDateValue);
        const endDate = new Date(endDateValue);

        const duration = Math.ceil((endDate - startDate) / (1000 * 60 * 60 * 24));
        durationElement.textContent = duration;
    }
</script>
