
<div class="user-section">
                    <img src="https://via.placeholder.com/100" alt="User image" class="user-image">
                    <h3 class="user-name">{{$employee->username}} </h3>
                    <p>Vacation days left: <span class="vacation-days">{{$employee->vacation_days_left}}</span></p>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="#">My Teams</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">My projects</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">My vacations</a>
                        </li>
                        <li>
                            <a class="nav-link" href="#">Vacation requests</a>
                        </li>
                    </ul>
                </div>