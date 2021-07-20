<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::any('/profile', [App\Http\Controllers\GeneralController::class, 'profile'])->name('profile');

Route::get('/notation-types', [App\Http\Controllers\NotationTypeController::class, 'index'])->name('notation-types');
Route::any('/getnotationtypes', [App\Http\Controllers\NotationTypeController::class, 'getNotationTypes'])->name('getnotationtypes');
Route::any('/deletenotationtype/{id}', [App\Http\Controllers\NotationTypeController::class, 'deleteNotationType'])->name('deletenotationtype');
Route::any('/notationtypeadd', [App\Http\Controllers\NotationTypeController::class, 'addNotationType'])->name('notationtypeadd');
Route::any('/notationtypebyid/{id}', [App\Http\Controllers\NotationTypeController::class, 'notationTypeById'])->name('notationtypebyid');
Route::any('/notationtypeedit', [App\Http\Controllers\NotationTypeController::class, 'editNotationType'])->name('notationtypeedit');



Route::get('/certificate-types', [App\Http\Controllers\CertificateTypeController::class, 'index'])->name('certificate-types');
Route::any('/getcertificatetypes', [App\Http\Controllers\CertificateTypeController::class, 'getCertificateTypes'])->name('getcertificatetypes');
Route::any('/deletecertificatetype/{id}', [App\Http\Controllers\CertificateTypeController::class, 'deleteCertificateType'])->name('deletecertificatetype');
Route::any('/certificatetypeadd', [App\Http\Controllers\CertificateTypeController::class, 'addCertificateType'])->name('certificatetypeadd');
Route::any('/certificatetypebyid/{id}', [App\Http\Controllers\CertificateTypeController::class, 'certificateTypeById'])->name('certificatetypebyid');
Route::any('/certificatetypeedit', [App\Http\Controllers\CertificateTypeController::class, 'editCertificateType'])->name('certificatetypeedit');



Route::get('/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('roles');
Route::any('/getroles', [App\Http\Controllers\RoleController::class, 'getRoles'])->name('getroles');
Route::any('/deleterole/{id}', [App\Http\Controllers\RoleController::class, 'deleteRole'])->name('deleterole');
Route::any('/roleadd', [App\Http\Controllers\RoleController::class, 'addRole'])->name('roleadd');
Route::any('/rolebyid/{id}', [App\Http\Controllers\RoleController::class, 'roleById'])->name('rolebyid');
Route::any('/roleedit', [App\Http\Controllers\RoleController::class, 'editRole'])->name('roleedit');



Route::get('/reactions', [App\Http\Controllers\ReactionController::class, 'index'])->name('reactions');
Route::any('/getreactions', [App\Http\Controllers\ReactionController::class, 'getReactions'])->name('getreactions');
Route::any('/deletereaction/{id}', [App\Http\Controllers\ReactionController::class, 'deleteReaction'])->name('deletereaction');
Route::any('/reactionadd', [App\Http\Controllers\ReactionController::class, 'addReaction'])->name('reactionadd');
Route::any('/reactionbyid/{id}', [App\Http\Controllers\ReactionController::class, 'reactionById'])->name('reactionbyid');
Route::any('/reactionedit', [App\Http\Controllers\ReactionController::class, 'editReaction'])->name('reactionedit');



Route::get('/consumer-note-types', [App\Http\Controllers\ConsumerNotesController::class, 'consumerNoteType'])->name('consumer-note-types');
Route::any('/getconsumernotetypes', [App\Http\Controllers\ConsumerNotesController::class, 'getConsumerNoteTypes'])->name('getconsumernotetypes');
Route::any('/deleteconsumernotetype/{id}', [App\Http\Controllers\ConsumerNotesController::class, 'deleteConsumerNoteType'])->name('deleteconsumernotetype');
Route::any('/consumernotetypeadd', [App\Http\Controllers\ConsumerNotesController::class, 'addConsumerNoteType'])->name('consumernotetype');
Route::any('/consumernotetypebyid/{id}', [App\Http\Controllers\ConsumerNotesController::class, 'consumerNoteTypeById'])->name('reactionbyid');
Route::any('/consumernotetypeedit', [App\Http\Controllers\ConsumerNotesController::class, 'editConsumerNoteType'])->name('consumernotetypeedit');



Route::get('/races', [App\Http\Controllers\RaceController::class, 'index'])->name('races');
Route::any('/getraces', [App\Http\Controllers\RaceController::class, 'getRaces'])->name('getraces');
Route::any('/deleterace/{id}', [App\Http\Controllers\RaceController::class, 'deleteRace'])->name('deleterace');
Route::any('/raceadd', [App\Http\Controllers\RaceController::class, 'addRace'])->name('raceadd');
Route::any('/racebyid/{id}', [App\Http\Controllers\RaceController::class, 'raceById'])->name('racebyid');
Route::any('/raceedit', [App\Http\Controllers\RaceController::class, 'editRace'])->name('raceedit');


Route::get('/ethnicities', [App\Http\Controllers\EthnicityController::class, 'index'])->name('ethnicities');
Route::any('/getethnicities', [App\Http\Controllers\EthnicityController::class, 'getEthnicities'])->name('getethnicities');
Route::any('/deleteethnicity/{id}', [App\Http\Controllers\EthnicityController::class, 'deleteEthnicity'])->name('deleteethnicity');
Route::any('/ethnicityadd', [App\Http\Controllers\EthnicityController::class, 'addEthnicity'])->name('ethnicityadd');
Route::any('/ethnicitybyid/{id}', [App\Http\Controllers\EthnicityController::class, 'ethnicityById'])->name('ethnicitybyid');
Route::any('/ethnicityedit', [App\Http\Controllers\EthnicityController::class, 'editEthnicity'])->name('ethnicityedit');



Route::get('/languages', [App\Http\Controllers\LanguageController::class, 'index'])->name('languages');
Route::any('/getlanguages', [App\Http\Controllers\LanguageController::class, 'getLanguages'])->name('getlanguages');
Route::any('/deletelanguage/{id}', [App\Http\Controllers\LanguageController::class, 'deleteLanguage'])->name('deletelanguage');
Route::any('/languageadd', [App\Http\Controllers\LanguageController::class, 'addLanguage'])->name('languageadd');
Route::any('/languagebyid/{id}', [App\Http\Controllers\LanguageController::class, 'languageById'])->name('languagebyid');
Route::any('/languageedit', [App\Http\Controllers\LanguageController::class, 'editLanguage'])->name('languageedit');


Route::get('/services', [App\Http\Controllers\ServiceController::class, 'index'])->name('services');
Route::any('/getservices', [App\Http\Controllers\ServiceController::class, 'getServices'])->name('getservices');
Route::any('/deleteservice/{id}', [App\Http\Controllers\ServiceController::class, 'deleteService'])->name('deleteservice');
Route::any('/serviceadd', [App\Http\Controllers\ServiceController::class, 'addService'])->name('serviceadd');
Route::any('/servicebyid/{id}', [App\Http\Controllers\ServiceController::class, 'serviceById'])->name('servicebyid');
Route::any('/serviceedit', [App\Http\Controllers\ServiceController::class, 'editService'])->name('serviceedit');


Route::any('/deletefile/{id}', [App\Http\Controllers\GeneralController::class, 'deleteFile'])->name('deletefile');




Route::get('/consumers-listing', [App\Http\Controllers\ConsumerController::class, 'index'])->name('consumers-listing');
Route::any('/getconsumers', [App\Http\Controllers\ConsumerController::class, 'getConsumers'])->name('getconsumers');
Route::any('/consumer-list', [App\Http\Controllers\ConsumerController::class, 'getConsumerList'])->name('consumer-list');
Route::any('/consumers-add', [App\Http\Controllers\ConsumerController::class, 'addConsumer'])->name('consumers-add');
Route::any('/consumers-edit/{id}', [App\Http\Controllers\ConsumerController::class, 'editConsumer'])->name('consumers-edit');
Route::get('/consumers-details/{id}', [App\Http\Controllers\ConsumerController::class, 'consumerDetail'])->name('consumers-details');
Route::any('/deleteconsumers', [App\Http\Controllers\ConsumerController::class, 'deleteConsumers'])->name('deleteconsumers');
Route::any('/searchconsumers', [App\Http\Controllers\ConsumerController::class, 'searchConsumers'])->name('searchconsumers');
Route::any('/pdfconsumers', [App\Http\Controllers\ConsumerController::class, 'pdfConsumerAll'])->name('pdfconsumers');
Route::any('/getconsumerbyid', [App\Http\Controllers\ConsumerController::class, 'getConsumerbyid'])->name('getconsumerbyid');

Route::any('/consumers-suspended/{id}', [App\Http\Controllers\ConsumerController::class, 'ConsumerSuspend'])->name('consumers-suspended');
Route::any('/consumers-delete/{id}', [App\Http\Controllers\ConsumerController::class, 'ConsumerDelete'])->name('consumers-delete');


Route::any('/assessment-list', [App\Http\Controllers\AssessmentController::class, 'getAssessmentList'])->name('assessment-list');
Route::get('/assessments-listing', [App\Http\Controllers\AssessmentController::class, 'index'])->name('assessments-listing');
Route::any('/assessments-add/{type_id}/{consumer_id}', [App\Http\Controllers\AssessmentController::class, 'addAssessment'])->name('assessments-add');
Route::get('/assessments-details/{id}', [App\Http\Controllers\AssessmentController::class, 'assessmentDetail'])->name('assessments-details');
Route::any('/getassessments', [App\Http\Controllers\AssessmentController::class, 'getAssessments'])->name('getassessments');
Route::any('/assessments-edit/{id}', [App\Http\Controllers\AssessmentController::class, 'editAssessment'])->name('assessments-edit');
Route::any('/assessment-mail/{id}', [App\Http\Controllers\AssessmentController::class, 'mailAssessment'])->name('assessment-mail');
Route::any('/assessment-pdf/{id}', [App\Http\Controllers\AssessmentController::class, 'pdfAssessment'])->name('assessment-pdf');
Route::any('/pdfassessments', [App\Http\Controllers\AssessmentController::class, 'pdfAssessmentAll'])->name('pdfassessments');
Route::any('/deleteassessments', [App\Http\Controllers\AssessmentController::class, 'deleteAssessments'])->name('deleteassessments');
Route::any('/assessments-spendtime', [App\Http\Controllers\AssessmentController::class, 'spendTime'])->name('assessments-spendtime');
Route::any('/assessments-getspendtimes', [App\Http\Controllers\AssessmentController::class, 'getSpendtimes'])->name('assessments-getspendtimes');
Route::any('/assessments-updatespendtime', [App\Http\Controllers\AssessmentController::class, 'getUpdateSpendtimes'])->name('assessments-updatespendtime');
Route::any('/searchassessments', [App\Http\Controllers\AssessmentController::class, 'searchAssessments'])->name('searchassessments');
Route::any('/getTotalSpendtimeByAssessmentId/{id}', [App\Http\Controllers\AssessmentController::class, 'getTotalSpendtimeByAssessmentId'])->name('getTotalSpendtimeByAssessmentId');

Route::any('/assessments-add-sub/{assessment_id}/{subtype_id}', [App\Http\Controllers\AssessmentController::class, 'addSubAssessment'])->name('assessments-add-sub');
Route::any('/getassessmentbyid', [App\Http\Controllers\AssessmentController::class, 'getAssessmentById'])->name('getassessmentbyid');
Route::any('/getotherassessments', [App\Http\Controllers\AssessmentController::class, 'getOtherassessments'])->name('getotherassessments');



Route::any('/authorization-list', [App\Http\Controllers\AuthorizationController::class, 'getAuthorizationList'])->name('authorization-list');
Route::get('/authorizations-listing', [App\Http\Controllers\AuthorizationController::class, 'index'])->name('authorizations-listing');
Route::any('/authorizations-add/{consumer_id}', [App\Http\Controllers\AuthorizationController::class, 'addAuthorization'])->name('authorizations-add');
Route::any('/authorizations-edit/{id}', [App\Http\Controllers\AuthorizationController::class, 'editAuthorization'])->name('authorizations-edit');
Route::get('/authorizations-details/{id}', [App\Http\Controllers\AuthorizationController::class, 'authorizationDetail'])->name('authorizations-details');
Route::any('/getauthorizations', [App\Http\Controllers\AuthorizationController::class, 'getAuthorizations'])->name('getauthorizations');
Route::any('/deleteauthorizations', [App\Http\Controllers\AuthorizationController::class, 'deleteAuthorizations'])->name('deleteauthorizations');
Route::any('/pdfauthorizations', [App\Http\Controllers\AuthorizationController::class, 'pdfauthorizationAll'])->name('pdfauthorizations');
Route::any('/authorization-pdf/{id}', [App\Http\Controllers\AuthorizationController::class, 'pdfAuthorization'])->name('authorization-pdf');
Route::any('/authorization-mail/{id}', [App\Http\Controllers\AuthorizationController::class, 'mailAuthorization'])->name('authorization-mail');
Route::any('/authorizations-spendtime', [App\Http\Controllers\AuthorizationController::class, 'spendTime'])->name('authorizations-spendtime');
Route::any('/authorizations-getspendtimes', [App\Http\Controllers\AuthorizationController::class, 'getSpendtimes'])->name('authorizations-getspendtimes');
Route::any('/authorizations-updatespendtime', [App\Http\Controllers\AuthorizationController::class, 'getUpdateSpendtimes'])->name('authorizations-updatespendtime');
Route::any('/getassessmentsbyconsumerid', [App\Http\Controllers\AuthorizationController::class, 'getAssessmentsByConsumerId'])->name('getassessmentsbyconsumerid');

Route::any('/getservicesbyassessmentid', [App\Http\Controllers\AuthorizationController::class, 'getServicesByassessmentId'])->name('getservicesbyassessmentid');
Route::any('/getauthsbyid', [App\Http\Controllers\AuthorizationController::class, 'getAuthsById'])->name('getauthsbyid');
Route::any('/getTotalSpendtimeByAuthId/{id}', [App\Http\Controllers\AuthorizationController::class, 'getTotalSpendtimeByAuthId'])->name('getTotalSpendtimeByAuthId');


Route::get('/assessment-types', [App\Http\Controllers\AssessmentController::class, 'assessmentType'])->name('assessment-types');
Route::any('/assessment-type-add', [App\Http\Controllers\AssessmentController::class, 'addAssessmentType'])->name('assessment-type-add');
Route::get('/assessment-type-details/{id}', [App\Http\Controllers\AssessmentController::class, 'assessmentTypeDetail'])->name('assessment-type-details');
Route::any('/assessment-type-edit/{id}', [App\Http\Controllers\AssessmentController::class, 'editAssessmentType'])->name('assessment-type-edit');



Route::get('/serviceplan-listing', [App\Http\Controllers\ServicePlanController::class, 'index'])->name('serviceplan-listing');
Route::get('/serviceplan-add', [App\Http\Controllers\ServicePlanController::class, 'addServicePlan'])->name('serviceplan-add');
Route::get('/serviceplan-details', [App\Http\Controllers\ServicePlanController::class, 'servicePlanDetail'])->name('serviceplan-details');


Route::get('/consumer-notes-listing', [App\Http\Controllers\ConsumerNotesController::class, 'index'])->name('consumer-notes-listing');
Route::get('/consumer-notes-add', [App\Http\Controllers\ConsumerNotesController::class, 'addConsumerNote'])->name('consumer-notes-add');
Route::get('/consumer-notes-details', [App\Http\Controllers\ConsumerNotesController::class, 'consumerNoteDetail'])->name('consumer-notes-details');


Route::get('/employee-listing', [App\Http\Controllers\EmployeeController::class, 'index'])->name('employee-listing');
Route::any('/getemployees', [App\Http\Controllers\EmployeeController::class, 'getEmployees'])->name('getemployees');
Route::any('/employee-list', [App\Http\Controllers\EmployeeController::class, 'getEmployeeList'])->name('employee-list');
Route::any('/deleteemployees', [App\Http\Controllers\EmployeeController::class, 'deleteEmployees'])->name('deleteemployees');
Route::any('/employee-add', [App\Http\Controllers\EmployeeController::class, 'addEmployee'])->name('employee-add');
Route::get('/employee-details/{id}', [App\Http\Controllers\EmployeeController::class, 'employeeDetail'])->name('employee-details');
Route::any('/employee-edit/{id}', [App\Http\Controllers\EmployeeController::class, 'editEmployee'])->name('employee-edit');
Route::any('/employee-mail/{id}', [App\Http\Controllers\EmployeeController::class, 'mailEmployee'])->name('employee-mail');
Route::any('/employee-pdf/{id}', [App\Http\Controllers\EmployeeController::class, 'pdfEmployee'])->name('employee-pdf');
Route::any('/employee-ban/{id}', [App\Http\Controllers\EmployeeController::class, 'banEmployee'])->name('employee-ban');
Route::any('/searchemployees', [App\Http\Controllers\EmployeeController::class, 'searchEmployees'])->name('searchemployees');
Route::any('/printemployees', [App\Http\Controllers\EmployeeController::class, 'printEmployees'])->name('printemployees');
Route::any('/pdfemployees', [App\Http\Controllers\EmployeeController::class, 'pdfEmployeeAll'])->name('pdfemployees');
Route::any('/certificationreminder', [App\Http\Controllers\EmployeeController::class, 'certificationReminder'])->name('certificationreminder');


Route::any('/userlogin', [App\Http\Controllers\UserController::class, 'login'])->name('userlogin');

Route::any('/checkemail', [App\Http\Controllers\EmployeeController::class, 'checkEmail'])->name('checkemail');
Route::any('/checkconsumeremail', [App\Http\Controllers\ConsumerController::class, 'checkConsumerEmail'])->name('checkconsumeremail');







Route::get('/route-listing', [App\Http\Controllers\RouteController::class, 'index'])->name('route-listing');
Route::any('/route-add', [App\Http\Controllers\RouteController::class, 'addRoute'])->name('route-add');
Route::get('/route-details/{id}', [App\Http\Controllers\RouteController::class, 'routeDetail'])->name('route-details');
Route::any('/route-edit/{id}', [App\Http\Controllers\RouteController::class, 'editRoute'])->name('route-edit');
















Route::get('/locations', [App\Http\Controllers\LocationController::class, 'index'])->name('locations');
Route::any('/location-add', [App\Http\Controllers\LocationController::class, 'addLocation'])->name('location-add');
Route::get('/location-details/{id}', [App\Http\Controllers\LocationController::class, 'locationDetail'])->name('location-details');
Route::any('/location-edit/{id}', [App\Http\Controllers\LocationController::class, 'editLocation'])->name('location-edit');


Route::get('/relations', [App\Http\Controllers\RelationController::class, 'index'])->name('relations');
Route::any('/relation-add', [App\Http\Controllers\RelationController::class, 'addRelation'])->name('relation-add');
Route::get('/relation-details/{id}', [App\Http\Controllers\RelationController::class, 'relationDetail'])->name('relation-details');
Route::any('/relation-edit/{id}', [App\Http\Controllers\RelationController::class, 'editRelation'])->name('relation-edit');


Route::get('/problems', [App\Http\Controllers\ProblemController::class, 'index'])->name('problems');
Route::any('/problem-add', [App\Http\Controllers\ProblemController::class, 'addProblem'])->name('problem-add');
Route::get('/problem-details/{id}', [App\Http\Controllers\ProblemController::class, 'problemDetail'])->name('problem-details');
Route::any('/problem-edit/{id}', [App\Http\Controllers\ProblemController::class, 'editProblem'])->name('problem-edit');

Route::get('/payers', [App\Http\Controllers\PayerController::class, 'index'])->name('payers');
Route::any('/payer-add', [App\Http\Controllers\PayerController::class, 'addPayer'])->name('payer-add');
Route::get('/payer-details/{id}', [App\Http\Controllers\PayerController::class, 'payerDetail'])->name('payer-details');
Route::any('/payer-edit/{id}', [App\Http\Controllers\PayerController::class, 'editPayer'])->name('payer-edit');

Route::get('/pay-types', [App\Http\Controllers\PayerController::class, 'payType'])->name('pay-types');
Route::any('/pay-type-add', [App\Http\Controllers\PayerController::class, 'addPayType'])->name('pay-type-add');
Route::get('/pay-type-details/{id}', [App\Http\Controllers\PayerController::class, 'payTypeDetail'])->name('pay-type-details');
Route::any('/pay-type-edit/{id}', [App\Http\Controllers\PayerController::class, 'editPayType'])->name('pay-type-edit');







Route::get('/htmlpdf', [App\Http\Controllers\PDFController::class, 'htmlPDF'])->name('htmlpdf');
Route::get('/generatePDF', [App\Http\Controllers\PDFController::class, 'generatePDF'])->name('generatePDF');












