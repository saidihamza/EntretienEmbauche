<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\TypeFormController;
use App\Http\Controllers\Setting;
use App\Http\Controllers\CandidatController;
use App\Http\Controllers\AvisController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\CompetenceController;
use App\Http\Controllers\CompetenceTypeController;
use App\Http\Controllers\AffectationController;
use App\Http\Controllers\MotifController;
use App\Http\Controllers\SourceController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\DecisionController;
use App\Http\Controllers\CompagneController;
use App\Http\Controllers\EntretienController;
use App\Http\Controllers\FeedbackController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/** for side bar menu active */
function set_active( $route ) {
    if( is_array( $route ) ){
        return in_array(Request::path(), $route) ? 'active' : '';
    }
    return Request::path() == $route ? 'active' : '';
}

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware'=>'auth'],function()
{
    Route::get('home',function()
    {
        return view('home');
    });
    Route::get('home',function()
    {
        return view('home');
    });
});

Auth::routes();

// ----------------------------login ------------------------------//
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate');
    Route::get('/logout', 'logout')->name('logout');
    Route::post('change/password', 'changePassword')->name('change/password');
});

// ----------------------------- register -------------------------//
Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/register','storeUser')->name('register');    
});

// -------------------------- main dashboard ----------------------//
Route::controller(HomeController::class)->group(function () {
    Route::get('/home', 'index')->middleware('auth')->name('home');
    Route::get('user/profile/page', 'userProfile')->middleware('auth')->name('user/profile/page');
    Route::get('teacher/dashboard', 'teacherDashboardIndex')->middleware('auth')->name('teacher/dashboard');
    Route::get('student/dashboard', 'studentDashboardIndex')->middleware('auth')->name('student/dashboard');
});

// ----------------------------- user controller -------------------------//
Route::controller(UserManagementController::class)->group(function () {
    Route::get('list/users', 'index')->middleware('auth')->name('list/users');
    Route::post('change/password', 'changePassword')->name('change/password');
    Route::get('view/user/edit/{id}', 'userView')->middleware('auth');
    Route::post('user/update', 'userUpdate')->name('user/update');
    Route::post('user/delete', 'userDelete')->name('user/delete');
});

// ------------------------ setting -------------------------------//
Route::controller(Setting::class)->group(function () {
    Route::get('setting/page', 'index')->middleware('auth')->name('setting/page');
});

// ------------------------ candidat -------------------------------//
Route::controller(CandidatController::class)->group(function () {
    Route::get('candidat/list', 'candidat')->middleware('auth')->name('candidat/list'); // list candidat
    Route::get('candidat/grid', 'candidatGrid')->middleware('auth')->name('candidat/grid'); // grid candidat
    Route::get('candidat/add/page', 'candidatAdd')->middleware('auth')->name('candidat/add/page'); // page candidat
    Route::post('candidat/add/save', 'candidatSave')->name('candidat/add/save'); // save record candidat
    Route::get('candidat/edit/{id}', 'candidatEdit'); // view for edit
    Route::post('candidat/update', 'candidatUpdate')->name('candidat/update'); // update record candidat
    Route::post('candidat/delete', 'candidatDelete')->name('candidat/delete'); // delete record candidat
    Route::get('candidat/profile/{id}', 'candidatProfile')->middleware('auth'); // profile candidat
    Route::get('candidat/suivie', 'candidatSuivie')->middleware('auth')->name('candidat/suivie');

});

// ------------------------ avis -------------------------------//
Route::controller(AvisController::class)->group(function () {
    Route::get('avis/add/page', 'avisAdd')->middleware('auth')->name('avis/add/page'); // page avis
    Route::get('avis/list/page', 'avisList')->middleware('auth')->name('avis/list/page'); // page avis
    Route::get('avis/grid/page', 'avisGrid')->middleware('auth')->name('avis/grid/page'); // page grid avis
    Route::post('avis/save', 'saveRecord')->middleware('auth')->name('avis/save'); // save record
    Route::get('avis/edit/{id}', 'editRecord'); // view avis record
    Route::get('avis/attente', [AvisController::class, 'avisAttente'])->middleware('auth')->name('avis/attente');
    Route::post('avis/update', 'updateRecordavis')->middleware('auth')->name('avis/update'); // update record
    Route::post('avis/delete', 'avisDelete')->name('avis/delete'); // delete record teacher
});

// ----------------------- evaluations -----------------------------//

Route::get('/evaluations', [EvaluationController::class, 'index'])->name('evaluations.index');
Route::post('/evaluations', [EvaluationController::class, 'store'])->name('evaluations.store');
Route::put('/evaluations/{evaluation}', [EvaluationController::class, 'update'])->name('evaluations.update');
Route::delete('/evaluations/{id}', [EvaluationController::class, 'destroy'])->name('evaluations.destroy');

// ----------------------- Categorie -----------------------------//

Route::get('/categories', [CategorieController::class, 'index'])->name('categories.index');
Route::post('/categories', [CategorieController::class, 'store'])->name('categories.store');
Route::put('/categories/{entretien}', [CategorieController::class, 'update'])->name('categories.update');
Route::delete('/categories/{id}', [CategorieController::class, 'destroy'])->name('categories.destroy');
// ----------------------------- formation -------------------------//
Route::post('/formation', [FormationController::class, 'store'])->name('formation.store');
Route::get('/formation/{id}/edit', [FormationController::class, 'edit'])->name('formation.edit');
Route::put('/formation/{id}', [FormationController::class, 'update'])->name('formation.update');


// ----------------------------experiences ------------------------------//
Route::post('/experiences', [ExperienceController::class, 'store'])->name('experiences.store');

// ----------------------------competences ------------------------------//
Route::post('/competences', [CompetenceController::class, 'store'])->name('competences.store');
Route::put('/competences/{id}', [CompetenceController::class, 'update'])->name('competences.update');
Route::get('/competences/type', [CompetenceController::class, 'type'])->name('competences.type');
Route::delete('/competences/{id}', [CompetenceController::class, 'destroy'])->name('competences.destroy');

// ----------------------------type de competences ------------------------------//

Route::get('/competence-types', [CompetenceTypeController::class, 'index'])->name('competence_types.index');
Route::get('/competence-types/create', [CompetenceTypeController::class, 'create'])->name('competence_types.create');
Route::post('/competence-types', [CompetenceTypeController::class, 'store'])->name('competenceTypes.store');

Route::get('/competence-types/{id}/edit', [CompetenceTypeController::class, 'edit'])->name('competenceTypes.edit');
Route::put('/competence-types/{id}', [CompetenceTypeController::class, 'update'])->name('competenceTypes.update');
Route::delete('/competence-types/{id}', [CompetenceTypeController::class, 'destroy'])->name('competenceTypes.destroy');

// ----------------------------motifs ------------------------------//

Route::get('/motifs', [MotifController::class, 'index'])->name('motifs.index');
Route::post('/motifs', [MotifController::class, 'store'])->name('motifs.store');
Route::put('/motifs/{motif}', [MotifController::class, 'update'])->name('motifs.update');
Route::delete('/motifs/{id}', [MotifController::class, 'destroy'])->name('motifs.destroy');

// ----------------------------Affectation ------------------------------//

Route::get('/affectations', [AffectationController::class, 'index'])->name('affectations.index');
Route::post('/affectations', [AffectationController::class, 'store'])->name('affectations.store');
Route::put('/affectations/{motif}', [AffectationController::class, 'update'])->name('affectations.update');
Route::delete('/affectations/{id}', [AffectationController::class, 'destroy'])->name('affectations.destroy');

// ----------------------------Source ------------------------------//

Route::get('/source', [SourceController::class, 'index'])->name('source.index');
Route::post('/source', [SourceController::class, 'store'])->name('source.store');
Route::put('/source/{source}', [SourceController::class, 'update'])->name('source.update');
Route::delete('/source/{id}', [SourceController::class, 'destroy'])->name('source.destroy');

// ----------------------------decisions ------------------------------//

Route::get('/decisions', [DecisionController::class, 'index'])->name('decisions.index');
Route::post('/decisions', [DecisionController::class, 'store'])->name('decisions.store');
Route::put('/decisions/{decision}', [DecisionController::class, 'update'])->name('decisions.update');
Route::delete('/decisions/{id}', [DecisionController::class, 'destroy'])->name('decisions.destroy');

// ----------------------------compagnes ------------------------------//

Route::get('compagnes', [CompagneController::class, 'index'])->name('compagnes.index');
Route::get('compagnes/create', [CompagneController::class, 'create'])->name('compagnes.create');
Route::post('compagnes', [CompagneController::class, 'store'])->name('compagnes.store');
Route::get('compagnes/{compagne}', [CompagneController::class, 'show'])->name('compagnes.show');
Route::get('compagnes/{compagne}/edit', [CompagneController::class, 'edit'])->name('compagnes.edit');
Route::put('compagnes/{compagne}', [CompagneController::class, 'update'])->name('compagnes.update');
Route::delete('compagnes/{compagne}', [CompagneController::class, 'destroy'])->name('compagnes.destroy');

// ----------------------------Entretien ------------------------------//

Route::get('entretiens', [EntretienController::class, 'index'])->name('entretiens.index');
Route::post('entretiens', [EntretienController::class, 'store'])->name('entretiens.store');
Route::get('entretiens/{entretien}', [EntretienController::class, 'show'])->name('entretiens.show');
Route::get('entretiens/{entretien}/edit', [EntretienController::class, 'edit'])->name('entretiens.edit');
Route::put('entretiens/{entretien}', [EntretienController::class, 'update'])->name('entretiens.update');
Route::delete('entretiens/{entretien}', [EntretienController::class, 'destroy'])->name('entretiens.destroy');

// ----------------------------feedback ------------------------------//

Route::get('feedbacks', [FeedbackController::class, 'index'])->name('feedbacks.index');
Route::post('feedbacks', [FeedbackController::class, 'store'])->name('feedbacks.store');
Route::get('feedbacks/{feedback}', [FeedbackController::class, 'show'])->name('feedbacks.show');
Route::get('feedbacks/{feedback}/edit', [FeedbackController::class, 'edit'])->name('feedbacks.edit');
Route::put('feedbacks/{feedback}', [FeedbackController::class, 'update'])->name('feedbacks.update');
Route::delete('feedbacks/{feedback}', [FeedbackController::class, 'destroy'])->name('feedbacks.destroy');
