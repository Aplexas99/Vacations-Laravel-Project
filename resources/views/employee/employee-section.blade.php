
<div class="user-section">
                    <img src="https://via.placeholder.com/100" alt="User image" class="user-image">
                    <h3 class="user-name">{{$employee->username}} </h3>
                    <p>Vacation days left: <span class="vacation-days">{{$employee->vacation_days_left}}</span></p>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="../my-teams">My Teams</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../my-projects">My projects</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../vacation-requests">My vacations</a>
                        </li>
                        <li>
                            @if($employee->isProjectManager() || $employee->isTeamLeader())
                                <a class="nav-link" href="../pm-vacation-requests">Vacation requests</a>
                            @endif
                        </li>
                    </ul>
                </div>