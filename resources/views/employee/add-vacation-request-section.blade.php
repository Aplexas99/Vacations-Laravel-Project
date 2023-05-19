<h2>Add new vacation request:</h2>
<br>
<form action="{{ route('vacationRequests.addVacationRequest') }}" method="POST">
    @csrf
    <div class="list-group">
        <input type="hidden" name="employee_id" value="{{ $employee->id }}">
        <h5>Start date:</h5>
        <input type="date" id="start-date" name="start_date" placeholder="start date" required>
        <h5>End date:</h5>
        <input type="date" id="end-date" name="end_date" placeholder="end date" required>
        <h5>Note:</h5>
        <input type="text" name="note" placeholder="note">
        <h5>Duration:</h5>
        <h5 id="duration"></h5>
        <br>
        <br>
        <button type="submit" class="btn btn-success btn-l btn-submit" id="btn-submit">Submit request</button>
    </div>
</form>



<script>
    


    const startDateInput = document.getElementById('start-date');
    const endDateInput = document.getElementById('end-date');
    const durationElement = document.getElementById('duration');
    
    const submitButton = document.getElementById('btn-submit');

    submitButton.addEventListener('click', function(event) {
        event.preventDefault();
        const startDate = new Date(startDateInput.value);
        const endDate = new Date(endDateInput.value);
        const duration = Math.ceil((endDate - startDate) / (1000 * 60 * 60 * 24));
        if(duration > "{{$employee->vacation_days_left}}") {
            alert("You don't have enough vacation days");
        } else {
            submitButton.form.submit();
        }
    });
    startDateInput.addEventListener('change', calculateDuration);
    endDateInput.addEventListener('change', calculateDuration);

    function calculateDuration() {
        const startDate = new Date(startDateInput.value);
        const endDate = new Date(endDateInput.value);

        
        submitButton.disabled = false;
        
        if (startDate && endDate) {
            const duration = Math.ceil((endDate - startDate) / (1000 * 60 * 60 * 24));
            durationElement.textContent = duration;

            if(duration <= 0) {
                submitButton.disabled = true;
                alert("End date must be after start date");
            }

        } else {
            durationElement.textContent = '';
        }
    }

</script>
