<h2>Vacation request info</h2>
<br>
<div class="list-group">
        <h4>Start Date: {{$vacation->start_date}}</h4>
        <h4>End Date: {{$vacation->end_date}}</h4>
        <h4>Duration: {{$vacation->duration}} days</h4>
        <h4>Status: {{$vacation->status}}</h4>
        @if($vacation->getApproversCount() > 0)
        <h4>Approved By: </h4>
        @foreach($vacation->getApprovers() as $approver)
           <ul>
              <li>{{$approver->approver->username}}</li>
           </ul>
        @endforeach
        @endif
        @if($vacation->getRejectorsCount() > 0)
        <h4>Rejected By: </h4>
        @foreach($vacation->getRejectors() as $rejector)
           <ul>
              <li>{{$rejector->approver->username}}</li>
           </ul>
        @endforeach
        @endif
        @if (isset($vacation->note))
           <h4>Note: {{$vacation->note}}</h4>
        @endif
</div>
