<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\VacationRequestApproversController;
use App\Http\Controllers\VacationRequestController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

    Route::get("/admin/vacation-requests", [VacationRequestController::class, 'showVacationRequests'])->name("admin.vacationRequests.showAll");
    Route::get("/admin/vacation-requests/{id}", [VacationRequestController::class, 'showVacationInfo'])->name("admin.vacationRequests.showVacationInfo");
    Route::get("/admin/employees", [EmployeeController::class, 'showEmployees'])->name("admin.employees.showAll");
    Route::get("/admin/employees/{id}", [EmployeeController::class, 'showEmployeeInfo'])->name("admin.employees.showEmployeeInfo");
    Route::get("/admin/employees/{id}/delete", [EmployeeController::class, 'deleteEmployee'])->name("admin.employees.deleteEmployee");
    Route::get("/admin/employees-add", [EmployeeController::class, 'showAddEmployee'])->name("admin.employees.showAddEmployee");
    Route::post("/admin/employees-add", [EmployeeController::class, 'addEmployee'])->name("admin.employees.addEmployee");
    Route::get("/admin/roles", [RoleController::class, 'showRoles'])->name("admin.roles.showAll");
    Route::get("/admin/roles/{id}", [RoleController::class, 'showRoleInfo'])->name("admin.roles.showRoleInfo");
    Route::get("/admin/roles/{id}/delete", [RoleController::class, 'deleteRole'])->name("admin.roles.deleteRole");
    Route::get("/admin/roles-add", [RoleController::class, 'showAddRole'])->name("admin.roles.showAddRole");
    Route::post("/admin/roles-add", [RoleController::class, 'addRole'])->name("admin.roles.addRole");
    Route::get("/admin/teams", [TeamController::class, 'showTeams'])->name("admin.teams.showAll");
    Route::get("/admin/teams/{id}", [TeamController::class, 'showTeamInfo'])->name("admin.teams.showTeamInfo");
    Route::get("/admin/teams/{id}/delete", [TeamController::class, 'deleteTeam'])->name("admin.teams.deleteTeam");
    Route::get("/admin/teams-add", [TeamController::class, 'showAddTeam'])->name("admin.teams.showAddTeam");
    Route::post("/admin/teams-add", [TeamController::class, 'addTeam'])->name("admin.teams.addTeam");
    Route::post("/admin/teams-add-member/{memberId}/{teamId}", [TeamController::class, 'addMemberToTeam'])->name("admin.teams.addMemberToTeam");
    Route::get("/admin/teams/{id}/{memberId}", [TeamController::class, 'deleteTeamMember'])->name("admin.teams.deleteTeamMember");
    Route::get("/admin/projects", [ProjectController::class, 'showProjects'])->name("admin.projects.showAll");
    Route::get("/admin/projects/{id}", [ProjectController::class, 'showProjectInfo'])->name("admin.projects.showProjectInfo");
    Route::put("/admin/projects/{id}", [ProjectController::class, 'updateProject'])->name("admin.projects.updateProject");
    Route::get("/admin/projects/{id}/delete", [ProjectController::class, 'deleteProject'])->name("admin.projects.deleteProject");
    Route::get("/admin/projects-add", [ProjectController::class, 'showAddProject'])->name("admin.projects.showAddProject");
    Route::post("/admin/projects-add", [ProjectController::class, 'addProject'])->name("admin.projects.addProject");




Route::get('/vacation-requests', [EmployeeController::class, 'vacationRequests'])->name('vacationRequests');
Route::post("/vacation-requests-add",[VacationRequestController::class, 'addVacationRequest'])->name("vacationRequests.addVacationRequest");
Route::get('/my-teams', [EmployeeController::class, 'myTeams'])->name('myTeams');
Route::get('/my-projects', [EmployeeController::class, 'myProjects'])->name('myProjects');

Route::get('/vacation-requests/{id}', [VacationRequestController::class, 'showVacationInfo'])->name('vacationRequests.showVacationInfo');
Route::get('/vacation-requests-add', [VacationRequestController::class, 'showAddVacationRequest'])->name('vacationRequests.add');

Route::get('/my-projects/{id}', [ProjectController::class, 'showProjectInfo'])->name('myProjects.showProjectInfo');

Route::get('/my-teams/{id}', [TeamController::class, 'showTeamInfo'])->name('myTeams.showTeamInfo');
Route::get('/my-teams/{id}/{memberId}', [TeamController::class, 'deleteTeamMember'])->name('myTeams.deleteTeamMember');

Route::get('/pm-vacation-requests', [VacationRequestApproversController::class, 'showVacationRequests'])->name('vacationRequestApprovers.showVacationRequests');
Route::get('/pm-vacation-requests/{id}', [VacationRequestController::class, 'showValidateVacationRequest'])->name('vacationRequests.showValidateVacationRequest');
Route::get('/pm-completed-vacation-requests/{id}', [VacationRequestController::class, 'showCompletedVacationRequest'])->name('vacationRequests.showCompletedVacationRequest');
Route::post('/pm-approve-vacation-requests/{id}', [VacationRequestApproversController::class, 'approveVacationRequest'])->name('vacationRequestApprovers.approveVacationRequest');
Route::post('/pm-reject-vacation-requests/{id}', [VacationRequestApproversController::class, 'rejectVacationRequest'])->name('vacationRequestApprovers.rejectVacationRequest');

    Route::resource('employees', EmployeeController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('teams', TeamController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('vacationRequests', VacationRequestController::class);
    Route::resource('vacationRequestApprovers', VacationRequestApproversController::class);

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/', [LoginController::class, 'showLoginForm'])->name('home');
Route::post('login', [LoginController::class, 'login'])->name('loginSubmit');

Route::post('logout', [LoginController::class, 'logout'])->name('logout');