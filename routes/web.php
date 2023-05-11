<?php

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

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Auth::routes();
/* CoreUI templates */

Route::middleware('auth')->group(function () {
  Route::view('/', 'panel.blank');
  // Section CoreUI elements

  //	Route::view('/sample/dashboard','samples.dashboard');
  //	Route::view('/sample/buttons','samples.buttons');
  //	Route::view('/sample/social','samples.social');
  //	Route::view('/sample/cards','samples.cards');
  //	Route::view('/sample/forms','samples.forms');
  //	Route::view('/sample/modals','samples.modals');
  //	Route::view('/sample/switches','samples.switches');
  //	Route::view('/sample/tables','samples.tables');
  //	Route::view('/sample/tabs','samples.tabs');
  //	Route::view('/sample/icons-font-awesome', 'samples.font-awesome-icons');
  //	Route::view('/sample/icons-simple-line', 'samples.simple-line-icons');
  //	Route::view('/sample/widgets','samples.widgets');
  //	Route::view('/sample/charts','samples.charts');

  Route::get('/PERSONS', ['uses' => 'PersonController@index', 'as' => 'persons']);
  Route::get('PERSON/CREATE', ['uses' => 'PersonController@create', 'as' => 'createPerson']);
  Route::post('PERSON/CREATE', ['uses' => 'PersonController@store']);
  Route::get('/PERSONS/{id}', ['uses' => 'PersonController@show', 'as' => 'viewPerson']);
  Route::get('/PERSONS/{id}/edit', ['uses' => 'PersonController@edit', 'as' => 'editPerson']);
  Route::put('/PERSONS/{id}/edit', ['uses' => 'PersonController@update', 'as' => 'updatePerson']);
  Route::delete('/DELETEPERSON/{id}', ['uses' => 'PersonController@delete', 'as' => 'deletePerson']);
  Route::get('PEOPLE/SEARCH', ['uses' => 'PersonController@findPeople', 'as' => 'findPeople']);
  Route::get('PEOPLE/APPLICATION/{id}', ['uses' => 'PersonController@goToApplication', 'as' => 'goToApplication']);
  //     Route::post('ADDMEDICAL', ['uses' => 'PersonController@addMedical', 'as' => 'addMedical']);
  //     Route::delete('/DELETEMEDICAL', ['uses' => 'PersonController@deleteMedical', 'as' => 'deleteMedical']);
  // route to move to show each application made by an applicant.
  Route::get('/PERSONS/application/{id}', ['uses' => 'ApplicationController@showApplication', 'as' => 'showApplication']);

  Route::get('/stands', ['uses' => 'StandController@index', 'as' => 'stands']);
  Route::get('/stand/{id}', ['uses' => 'StandController@show', 'as' => 'showStand']);
  Route::get('/create/stand', ['uses' => 'StandController@create', 'as' => 'createStand']);
  Route::post('/create/stand', ['uses' => 'StandController@store']);
  Route::get('/stand/{id}/edit', ['uses' => 'StandController@edit', 'as' => 'editStand']);
  Route::put('updateStand/{id}', ['uses' => 'StandController@update', 'as' => 'updateStand']);
  Route::get('reponotification/{id}', ['uses' => 'StandController@getNotification', 'as' => 'repoNotification']);

  Route::get('/graves', ['uses' => 'GraveController@index', 'as' => 'graves']);
  Route::get('/graves/{id}', ['uses' => 'GraveController@show', 'as' => 'showGrave']);
  Route::get('/create/grave', ['uses' => 'GraveController@create', 'as' => 'createGrave']);
  Route::post('/create/grave', ['uses' => 'GraveController@store']);
  Route::get('/grave/{id}/edit', ['uses' => 'GraveController@edit', 'as' => 'editGrave']);
  Route::put('updateGrave/{id}', ['uses' => 'GraveController@update', 'as' => 'updateGrave']);
  Route::get('/getAvailableGraves', ['uses' => 'GraveController@getAvailableGraves', 'as' => 'getAvailableGraves']);
  Route::get('/insert', ['uses' => 'GraveController@insertform', 'as' => 'insert']);
  Route::get('/gravesmap', ['uses' => 'GraveController@map', 'as' => 'gravesmap']);
  Route::post('/add_batch', ['uses' => 'GraveController@insert', 'as' => 'add_batch']);
  Route::get('autocomplete', array('as' => 'autocomplete', 'uses' => 'PostController@autocomplete'));

  Route::get('/cemeteryowners', ['uses' => 'OwnerController@index', 'as' => 'cemeteryowners']);
  Route::get('/cemeteryowners/{id}', ['uses' => 'OwnerController@show', 'as' => 'showCemeteryOwner']);
  Route::get('/create/cemeteryowner', ['uses' => 'OwnerController@create', 'as' => 'createCemeteryOwner']);
  Route::post('/create/cemeteryowner', ['uses' => 'OwnerController@store']);
  Route::get('/cemeteryowners/{id}/edit', ['uses' => 'OwnerController@edit', 'as' => 'editCemeteryOwner']);
  Route::put('/updateCemeteryOwners{id}', ['uses' => 'OwnerController@update', 'as' => 'updateCemeteryOwner']);
  Route::post('deleteCemeteryOwner', ['uses' => 'OwnerController@destroy', 'as' => 'deleteCemeteryOwner']);
  Route::get('/getCemeteryOwners', ['uses' => 'OwnerController@getCemeteryOwners', 'as' => 'getCemeteryOwners']);
  Route::get('/getPayments', ['uses' => 'OwnerController@getPayments', 'as' => 'getPayments']);
  Route::get('/getAmounts', ['uses' => 'OwnerController@getAmount', 'as' => 'getAmount']);
  Route::get('/getGraves', ['uses' => 'OwnerController@getGraves', 'as' => 'getGraves']);

  Route::get('/cemeterysections', ['uses' => 'CemeterySectionController@index', 'as' => 'cemeterysections']);
  Route::get('/create/cemeterysection', ['uses' => 'CemeterySectionController@create', 'as' => 'createCemeterySection']);
  Route::post('/create/cemeterysection', ['uses' => 'CemeterySectionController@store']);
  Route::get('/cemeterysections/{id}/edit', ['uses' => 'CemeterySectionController@edit', 'as' => 'editCemeterySection']);
  Route::put('/updateCemeterySection{id}', ['uses' => 'CemeterySectionController@update', 'as' => 'updateCemeterySection']);
  Route::get('/cemeterysections/{id}', ['uses' => 'CemeterySectionController@show', 'as' => 'showCemeterySection']);

  Route::get('/burials', ['uses' => 'DeceasedController@index', 'as' => 'burials']);
  Route::get('/burials/{id}', ['uses' => 'DeceasedController@show', 'as' => 'showBurial']);
  Route::get('/create/burials/', ['uses' => 'DeceasedController@create', 'as' => 'createBurial']);
  Route::post('/create/burials/', ['uses' => 'DeceasedController@store']);
  Route::get('/burials/{id}/edit', ['uses' => 'DeceasedController@edit', 'as' => 'editBurial']);
  Route::put('/updateburials{id}', ['uses' => 'DeceasedController@update', 'as' => 'updateBurial']);
  Route::get('/burialattachments/{id}', ['uses' => 'DeceasedController@attachments', 'as' => 'burialattachments']);
  Route::get('/getOwners', ['uses' => 'DeceasedController@getOwners', 'as' => 'getOwners']);
  Route::get('/getGraves', ['uses' => 'DeceasedController@getGraves', 'as' => 'getGraves']);
  Route::get('/download/{file}', ['uses' => 'DeceasedController@download', 'as' => 'download']);
  Route::get('/burialDoc/{id}', ['uses' => 'DeceasedController@printBurial', 'as' => 'printBurial']);

  Route::get('/propertytypes', ['uses' => 'PropertyTypeController@index', 'as' => 'propertytypes']);
  Route::get('/create/propertytype', ['uses' => 'PropertyTypeController@create', 'as' => 'createPropertyTypes']);
  Route::post('/create/propertytype', ['uses' => 'PropertyTypeController@store']);
  Route::get('/propertytypes/{id}/edit', ['uses' => 'PropertyTypeController@edit', 'as' => 'editPropertyTypes']);
  Route::put('/updatePropertytype{id}', ['uses' => 'PropertyTypeController@update', 'as' => 'updatePropertyType']);
  Route::get('/propertytypes/{id}', ['uses' => 'PropertyTypeController@show', 'as' => 'showPropertyType']);

  Route::get('/propertycategories', ['uses' => 'PropertyCategoryController@index', 'as' => 'propertycategories']);
  Route::get('/create/propertycategories', ['uses' => 'PropertyCategoryController@create', 'as' => 'createPropertyCategories']);
  Route::post('/create/propertycategories', ['uses' => 'PropertyCategoryController@store']);
  Route::get('/propertycategories/{id}/edit', ['uses' => 'PropertyCategoryController@edit', 'as' => 'editPropertyCategories']);
  Route::put('/updatePropertycategories{id}', ['uses' => 'PropertyCategoryController@update', 'as' => 'updatePropertyCategory']);
  Route::get('/propertycategories/{id}', ['uses' => 'PropertyCategoryController@show', 'as' => 'showPropertyCategory']);

  Route::get('/councilproperties', ['uses' => 'CouncilPropertyController@index', 'as' => 'councilproperties']);
  Route::get('/create/councilproperties', ['uses' => 'CouncilPropertyController@create', 'as' => 'createCouncilProperties']);
  Route::post('/create/councilproperties', ['uses' => 'CouncilPropertyController@store']);
  Route::get('/councilproperties/{id}/edit', ['uses' => 'CouncilPropertyController@edit', 'as' => 'editCouncilProperties']);
  Route::put('/updateCouncilProperties{id}', ['uses' => 'CouncilPropertyController@update', 'as' => 'updateCouncilProperty']);
  Route::get('/councilproperties/{id}', ['uses' => 'CouncilPropertyController@show', 'as' => 'showCouncilProperty']);

  Route::get('/inspectionstages', ['uses' => 'InspectionstagesController@index', 'as' => 'inspectionstages']);
  Route::get('/create/inspectionstages', ['uses' => 'InspectionstagesController@create', 'as' => 'createInspectionStages']);
  Route::post('/create/inspectionstages', ['uses' => 'InspectionstagesController@store']);
  Route::get('/inspectionstages/{id}/edit', ['uses' => 'InspectionstagesController@edit', 'as' => 'editInspectionStages']);
  Route::put('/updateInspectionStages{id}', ['uses' => 'InspectionstagesController@update', 'as' => 'updateInspectionStages']);
  Route::get('/inspectionstages/{id}', ['uses' => 'InspectionstagesController@show', 'as' => 'showInspectionStages']);

  Route::get('/stageinspections', ['uses' => 'StageInspectionController@index', 'as' => 'stageinspection']);
  //Route::get('/stageinspections/{id}', ['uses' => 'StageInspectionController@create', 'as' => 'createStageInspection']);
  //Route::post('/stageinspections/{id}', ['uses' => 'StageInspectionController@store',]);
  Route::post('/create/stageinspections', ['uses' => 'StageInspectionController@store', 'as' => 'saveStageInspection']);
  Route::get('/stageinspections/{id}/edit', ['uses' => 'StageInspectionController@edit', 'as' => 'editStageInspection']);
  Route::put('/updatestageinspections/{id}', ['uses' => 'StageInspectionController@update', 'as' => 'updateStageInspection']);
  Route::get('/stageinspections/{id}', ['uses' => 'StageInspectionController@show', 'as' => 'showStageInspection']);

  Route::get('/batches', ['uses' => 'BatchController@index', 'as' => 'batches']);
  Route::get('/batches/{id}/edit', ['uses' => 'BatchController@edit', 'as' => 'editBatch']);
  Route::get('/batches/{id}', ['uses' => 'BatchController@show', 'as' => 'showBatch']);
  Route::get('/batch/create', ['uses' => 'BatchController@create', 'as' => 'createBatch']);
  Route::post('/batch/create', ['uses' => 'BatchController@store']);
  Route::put('updateBatch/{id}', ['uses' => 'BatchController@update', 'as' => 'updateBatch']);

  Route::get('/standtypes', ['uses' => 'StandTypeController@index', 'as' => 'standtypes']);
  Route::get('/standtypes/{id}/edit', ['uses' => 'StandTypeController@edit', 'as' => 'editStandType']);
  Route::get('/standtypes/{id}', ['uses' => 'StandTypeController@show', 'as' => 'showStandType']);
  Route::get('/standtype/create', ['uses' => 'StandTypeController@create', 'as' => 'createStandType']);
  Route::post('/standtype/create', ['uses' => 'StandTypeController@store']);
  Route::put('updateStandType/{id}', ['uses' => 'StandTypeController@update', 'as' => 'updateStandType']);

  Route::get('/developers', ['uses' => 'DeveloperController@index', 'as' => 'developers']);
  Route::get('/getDevelopers', ['uses' => 'DeveloperController@getDevelopers', 'as' => 'getDevelopers']);
  Route::get('/developers/{id}/edit', ['uses' => 'DeveloperController@edit', 'as' => 'editDeveloper']);
  Route::get('/developers/{id}', ['uses' => 'DeveloperController@show', 'as' => 'showDeveloper']);
  Route::get('/developer/create', ['uses' => 'DeveloperController@create', 'as' => 'createDeveloper']);
  Route::post('/developer/create', ['uses' => 'DeveloperController@store']);
  Route::put('updateDeveloper/{id}', ['uses' => 'DeveloperController@update', 'as' => 'updateDeveloper']);


  Route::get('/applicationstages', ['uses' => 'ApplicationStagesController@index', 'as' => 'applicationstages']);
  Route::get('/applicationstages/{id}/edit', ['uses' => 'ApplicationStagesController@edit', 'as' => 'editApplicationStage']);
  Route::get('/applicationstages/{id}', ['uses' => 'ApplicationStagesController@show', 'as' => 'showApplicationStage']);
  Route::get('/applicationstage/create', ['uses' => 'ApplicationStagesController@create', 'as' => 'createApplicationStage']);
  Route::post('/applicationstage/create', ['uses' => 'ApplicationStagesController@store']);
  Route::put('updateApplicationStage/{id}', ['uses' => 'ApplicationStagesController@update', 'as' => 'updateApplicationStage']);

  Route::get('/developmentstages', ['uses' => 'DevelopmentStageController@index', 'as' => 'developmentstages']);
  Route::get('/developmentstages/{id}/edit', ['uses' => 'DevelopmentStageController@edit', 'as' => 'editDevelopmentStage']);
  Route::get('/developmentstages/{id}', ['uses' => 'DevelopmentStageController@show', 'as' => 'showDevelopmentStage']);
  Route::get('/developmentstage/create', ['uses' => 'DevelopmentStageController@create', 'as' => 'createDevelopmentStage']);
  Route::post('/developmentstage/create', ['uses' => 'DevelopmentStageController@store']);
  Route::put('updateDevelopmentStage/{id}', ['uses' => 'DevelopmentStageController@update', 'as' => 'updateDevelopmentStage']);

  Route::post('/allocation/create', ['uses' => 'AllocationController@store', 'as' => 'addAllocation']);
  Route::put('/updateAllocation', ['uses' => 'AllocationController@update', 'as' => 'updateAllocation']);
  Route::post('/allocategrave/create', ['uses' => 'AllocateGraveController@store', 'as' => 'createAllocateGrave']);

  //     Route::get('/batches', ['uses'=>'BatchController@index', 'as'=>'batches']);
  //
  //
  //
  //     Route::get('/stand/create', ['uses'=>'StandController@create', 'as'=>'createStand']);
  //     Route::post('/stand/create', ['uses'=>'StandController@store', 'as'=>'createStand']);
  //     Route::post('updateStand/{id}', ['uses'=>'StandController@update', 'as'=>'updateStand']);




  Route::get('/findSmsClients', ['uses' => 'SmsController@findSmsClients', 'as' => 'findSmsClients']);

  Route::post('getBankAdminReport', ['uses' => 'ReportController@getBankAdminReport', 'as' => 'getBankAdminReport']);
  Route::post('getCashAdminReport', ['uses' => 'ReportController@getCashAdminReport', 'as' => 'getCashAdminReport']);
  Route::post('getDefaultersReport', ['uses' => 'ReportController@getDefaulters', 'as' => 'getDefaultersReport']);
  Route::get('getBadDebtorsReport', ['uses' => 'ReportController@getBadDebtors', 'as' => 'getBadDebtorsReport']);
  Route::get('getRefundsReport', ['uses' => 'ReportController@getRefunds', 'as' => 'getRefundsReport']);
  Route::post('activeloansreport', ['uses' => 'ReportController@getActiveLoans', 'as' => 'activeloansreport']);
  Route::get('reports', ['uses' => 'ReportController@index', 'as' => 'reports']);
  Route::post('statement', ['uses' => 'ReportController@getStatement', 'as' => 'statement']);
  Route::post('transactionlist', ['uses' => 'ReportController@getTransactionList', 'as' => 'transactionlist']);
  Route::post('paymentTypeReport', ['uses' => 'ReportController@getByPayment', 'as' => 'paymentTypeReport']);
  Route::post('productLoanReport', ['uses' => 'ReportController@getProductLoans', 'as' => 'productLoanReport']);
  Route::post('newClientReport', ['uses' => 'ReportController@getNewClientReport', 'as' => 'newClientReport']);
  Route::get('sendSms', ['uses' => 'SmsController@sendSms', 'as' => 'sendSms']);
  Route::get('export', ['uses' => 'ReportController@export', 'as' => 'export']);

  Route::get('getApplicants', ['uses' => 'ReportController@getApplicants', 'as' => 'getApplicants']);
  Route::get('getStands', ['uses' => 'ReportController@getStands', 'as' => 'getStandsReport']);
  Route::get('getAvailableStands', ['uses' => 'ReportController@getAvailableStands', 'as' => 'getAvailableStands']);
  Route::get('getAllocatedStands', ['uses' => 'ReportController@getAllocatedStands', 'as' => 'getAllocatedStands']);
  Route::get('getApplications', ['uses' => 'ReportController@getApplications', 'as' => 'getApplicationsReport']);
  Route::get('getApprovedApplications', ['uses' => 'ReportController@getApprovedApplications', 'as' => 'getApprovedApplications']);
  Route::get('getDeclinedApplications', ['uses' => 'ReportController@getDeclinedApplications', 'as' => 'getDeclinedApplications']);
  Route::get('getPendingApplications', ['uses' => 'ReportController@getPendingApplications', 'as' => 'getPendingApplications']);

  //	Route::view('/sample/dashboard','samples.dashboard');
  //	Route::view('/sample/buttons','samples.buttons');
  //	Route::view('/sample/social','samples.social');
  //	Route::view('/sample/cards','samples.cards');
  //	Route::view('/sample/forms','samples.forms');
  //	Route::view('/sample/modals','samples.modals');
  //	Route::view('/sample/switches','samples.switches');
  //	Route::view('/sample/tables','samples.tables');
  //	Route::view('/sample/tabs','samples.tabs');
  //	Route::view('/sample/icons-font-awesome', 'samples.font-awesome-icons');
  //	Route::view('/sample/icons-simple-line', 'samples.simple-line-icons');
  //	Route::view('/sample/widgets','samples.widgets');
  //	Route::view('/sample/charts','samples.charts');

  Route::get('/PERSONS', ['uses' => 'PersonController@index', 'as' => 'persons']);
  Route::get('PERSON/CREATE', ['uses' => 'PersonController@create', 'as' => 'createPerson']);
  Route::post('PERSON/CREATE', ['uses' => 'PersonController@store']);
  Route::get('/PERSONS/{id}', ['uses' => 'PersonController@show', 'as' => 'viewPerson']);
  Route::get('/PERSONS/{id}/edit', ['uses' => 'PersonController@edit', 'as' => 'editPerson']);
  Route::put('/PERSONS/{id}/edit', ['uses' => 'PersonController@update', 'as' => 'updatePerson']);
  Route::delete('/DELETEPERSON/{id}', ['uses' => 'PersonController@delete', 'as' => 'deletePerson']);
  Route::get('PEOPLE/SEARCH', ['uses' => 'PersonController@findPeople', 'as' => 'findPeople']);
  Route::get('PEOPLE/APPLICATION/{id}', ['uses' => 'PersonController@goToApplication', 'as' => 'goToApplication']);
  //     Route::post('ADDMEDICAL', ['uses' => 'PersonController@addMedical', 'as' => 'addMedical']);
  //     Route::delete('/DELETEMEDICAL', ['uses' => 'PersonController@deleteMedical', 'as' => 'deleteMedical']);

  // beneficiary-related routes
  // Route::delete('/PERSONS/{id}', [BeneficiaryController::class, 'destroy']);

  // route to lead to addbeneficiary page
  Route::get('PERSONS/{id}/addBeneficiary', ['uses' => 'BeneficiaryController@addBeneficiary', 'as' => 'addBeneficiary']);
  Route::post('PERSONS/{id}/addBeneficiary', ['uses' => 'BeneficiaryController@create', 'as' => 'createBeneficiary']);
  // route to delete beneficiary
  Route::delete('deleteBeneficiary/{beneID}', ['uses' => 'BeneficiaryController@destroy', 'as' => 'deleteBeneficiary']);
  // route to lead to editbeneficiary page
  Route::get('editBeneficiary/{beneID}', ['uses' => 'BeneficiaryController@editBeneficiary', 'as' => 'editBeneficiary']);
  Route::put('editBeneficiary/{beneID}', ['uses' => 'BeneficiaryController@edit', 'as' => 'updateBeneficiary']);

  // route to lead to addspouse page
  Route::get('PERSONS/{id}/addSpouse', ['uses' => 'SpouseController@addSpouse', 'as' => 'addSpouse']);
  Route::post('PERSONS/{id}/addSpouse', ['uses' => 'SpouseController@create', 'as' => 'createSpouse']);
  // route to delete spouse
  Route::delete('deleteSpouse/{spouID}', ['uses' => 'SpouseController@destroy', 'as' => 'deleteSpouse']);
  // route to lead to editspouse page
  Route::get('editSpouse/{spouID}', ['uses' => 'SpouseController@editSpouse', 'as' => 'editSpouse']);
  Route::put('editSpouse/{spouID}', ['uses' => 'SpouseController@edit', 'as' => 'updateSpouse']);

  Route::get('/stands', ['uses' => 'StandController@index', 'as' => 'stands']);
  Route::get('/stand/{id}', ['uses' => 'StandController@show', 'as' => 'showStand']);
  Route::get('/create/stand', ['uses' => 'StandController@create', 'as' => 'createStand']);
  Route::post('/create/stand', ['uses' => 'StandController@store']);
  Route::get('/stand/{id}/edit', ['uses' => 'StandController@edit', 'as' => 'editStand']);
  Route::put('updateStand/{id}', ['uses' => 'StandController@update', 'as' => 'updateStand']);

  Route::get('/graves', ['uses' => 'GraveController@index', 'as' => 'graves']);
  Route::get('/graves/{id}', ['uses' => 'GraveController@show', 'as' => 'showGrave']);
  Route::get('/create/grave', ['uses' => 'GraveController@create', 'as' => 'createGrave']);
  Route::post('/create/grave', ['uses' => 'GraveController@store']);
  Route::get('/grave/{id}/edit', ['uses' => 'GraveController@edit', 'as' => 'editGrave']);
  Route::put('updateGrave/{id}', ['uses' => 'GraveController@update', 'as' => 'updateGrave']);
  Route::get('/getAvailableGraves', ['uses' => 'GraveController@getAvailableGraves', 'as' => 'getAvailableGraves']);
  Route::get('/insert', ['uses' => 'GraveController@insertform', 'as' => 'insert']);
  Route::get('/gravesmap', ['uses' => 'GraveController@map', 'as' => 'gravesmap']);
  Route::post('/add_batch', ['uses' => 'GraveController@insert', 'as' => 'add_batch']);
  Route::get('autocomplete', array('as' => 'autocomplete', 'uses' => 'PostController@autocomplete'));

  Route::get('/cemeteryowners', ['uses' => 'OwnerController@index', 'as' => 'cemeteryowners']);
  Route::get('/cemeteryowners/{id}', ['uses' => 'OwnerController@show', 'as' => 'showCemeteryOwner']);
  Route::get('/create/cemeteryowner', ['uses' => 'OwnerController@create', 'as' => 'createCemeteryOwner']);
  Route::post('/create/cemeteryowner', ['uses' => 'OwnerController@store']);
  Route::get('/cemeteryowners/{id}/edit', ['uses' => 'OwnerController@edit', 'as' => 'editCemeteryOwner']);
  Route::put('/updateCemeteryOwners{id}', ['uses' => 'OwnerController@update', 'as' => 'updateCemeteryOwner']);
  Route::post('deleteCemeteryOwner', ['uses' => 'OwnerController@destroy', 'as' => 'deleteCemeteryOwner']);
  Route::get('/getCemeteryOwners', ['uses' => 'OwnerController@getCemeteryOwners', 'as' => 'getCemeteryOwners']);
  Route::get('/getPayments', ['uses' => 'OwnerController@getPayments', 'as' => 'getPayments']);
  Route::get('/getAmounts', ['uses' => 'OwnerController@getAmount', 'as' => 'getAmount']);

  Route::get('/cemeterysections', ['uses' => 'CemeterySectionController@index', 'as' => 'cemeterysections']);
  Route::get('/create/cemeterysection', ['uses' => 'CemeterySectionController@create', 'as' => 'createCemeterySection']);
  Route::post('/create/cemeterysection', ['uses' => 'CemeterySectionController@store']);
  Route::get('/cemeterysections/{id}/edit', ['uses' => 'CemeterySectionController@edit', 'as' => 'editCemeterySection']);
  Route::put('/updateCemeterySection{id}', ['uses' => 'CemeterySectionController@update', 'as' => 'updateCemeterySection']);
  Route::get('/cemeterysections/{id}', ['uses' => 'CemeterySectionController@show', 'as' => 'showCemeterySection']);

  Route::get('/burials', ['uses' => 'DeceasedController@index', 'as' => 'burials']);
  Route::get('/burials/{id}', ['uses' => 'DeceasedController@show', 'as' => 'showBurial']);
  Route::get('/create/burials/', ['uses' => 'DeceasedController@create', 'as' => 'createBurial']);
  Route::post('/create/burials/', ['uses' => 'DeceasedController@store']);
  Route::get('/burials/{id}/edit', ['uses' => 'DeceasedController@edit', 'as' => 'editBurial']);
  Route::put('/updateburials{id}', ['uses' => 'DeceasedController@update', 'as' => 'updateBurial']);
  Route::get('/burialattachments/{id}', ['uses' => 'DeceasedController@attachments', 'as' => 'burialattachments']);
  Route::get('/getOwners', ['uses' => 'DeceasedController@getOwners', 'as' => 'getOwners']);
  Route::get('/getGraves', ['uses' => 'DeceasedController@getGraves', 'as' => 'getGraves']);
  Route::get('/download/{file}', ['uses' => 'DeceasedController@download', 'as' => 'download']);
  Route::get('/burialDoc/{id}', ['uses' => 'DeceasedController@printBurial', 'as' => 'printBurial']);

  Route::get('/propertytypes', ['uses' => 'PropertyTypeController@index', 'as' => 'propertytypes']);
  Route::get('/create/propertytype', ['uses' => 'PropertyTypeController@create', 'as' => 'createPropertyTypes']);
  Route::post('/create/propertytype', ['uses' => 'PropertyTypeController@store']);
  Route::get('/propertytypes/{id}/edit', ['uses' => 'PropertyTypeController@edit', 'as' => 'editPropertyTypes']);
  Route::put('/updatePropertytype{id}', ['uses' => 'PropertyTypeController@update', 'as' => 'updatePropertyType']);
  Route::get('/propertytypes/{id}', ['uses' => 'PropertyTypeController@show', 'as' => 'showPropertyType']);

  Route::get('/propertycategories', ['uses' => 'PropertyCategoryController@index', 'as' => 'propertycategories']);
  Route::get('/create/propertycategories', ['uses' => 'PropertyCategoryController@create', 'as' => 'createPropertyCategories']);
  Route::post('/create/propertycategories', ['uses' => 'PropertyCategoryController@store']);
  Route::get('/propertycategories/{id}/edit', ['uses' => 'PropertyCategoryController@edit', 'as' => 'editPropertyCategories']);
  Route::put('/updatePropertycategories{id}', ['uses' => 'PropertyCategoryController@update', 'as' => 'updatePropertyCategory']);
  Route::get('/propertycategories/{id}', ['uses' => 'PropertyCategoryController@show', 'as' => 'showPropertyCategory']);

  Route::get('/councilproperties', ['uses' => 'CouncilPropertyController@index', 'as' => 'councilproperties']);
  Route::get('/create/councilproperties', ['uses' => 'CouncilPropertyController@create', 'as' => 'createCouncilProperties']);
  Route::post('/create/councilproperties', ['uses' => 'CouncilPropertyController@store']);
  Route::get('/councilproperties/{id}/edit', ['uses' => 'CouncilPropertyController@edit', 'as' => 'editCouncilProperties']);
  Route::put('/updateCouncilProperties{id}', ['uses' => 'CouncilPropertyController@update', 'as' => 'updateCouncilProperty']);
  Route::get('/councilproperties/{id}', ['uses' => 'CouncilPropertyController@show', 'as' => 'showCouncilProperty']);

  Route::get('/batches', ['uses' => 'BatchController@index', 'as' => 'batches']);
  Route::get('/batches/{id}/edit', ['uses' => 'BatchController@edit', 'as' => 'editBatch']);
  Route::get('/batches/{id}', ['uses' => 'BatchController@show', 'as' => 'showBatch']);
  Route::get('/batch/create', ['uses' => 'BatchController@create', 'as' => 'createBatch']);
  Route::post('/batch/create', ['uses' => 'BatchController@store']);
  Route::put('updateBatch/{id}', ['uses' => 'BatchController@update', 'as' => 'updateBatch']);

  Route::get('/batchtypes', ['uses' => 'BatchTypeController@index', 'as' => 'batchtypes']);
  Route::get('/batchtypes/{id}/edit', ['uses' => 'BatchTypeController@edit', 'as' => 'editBatchType']);
  Route::get('/batchtypes/{id}', ['uses' => 'BatchTypeController@show', 'as' => 'showBatchType']);
  Route::get('/batchtype/create', ['uses' => 'BatchTypeController@create', 'as' => 'createBatchType']);
  Route::post('/batchtype/create', ['uses' => 'BatchTypeController@store']);
  Route::put('updateBatchType/{id}', ['uses' => 'BatchTypeController@update', 'as' => 'updateBatchType']);

  Route::get('/standtypes', ['uses' => 'StandTypeController@index', 'as' => 'standtypes']);
  Route::get('/standtypes/{id}/edit', ['uses' => 'StandTypeController@edit', 'as' => 'editStandType']);
  Route::get('/standtypes/{id}', ['uses' => 'StandTypeController@show', 'as' => 'showStandType']);
  Route::get('/standtype/create', ['uses' => 'StandTypeController@create', 'as' => 'createStandType']);
  Route::post('/standtype/create', ['uses' => 'StandTypeController@store']);
  Route::put('updateStandType/{id}', ['uses' => 'StandTypeController@update', 'as' => 'updateStandType']);

  // stand classes
  Route::get('/standclasses', ['uses' => 'StandClassController@index', 'as' => 'standclasses']);
  Route::get('/standclasses/{id}/edit', ['uses' => 'StandClassController@edit', 'as' => 'editStandClass']);
  Route::get('/standclasses/{id}', ['uses' => 'StandClassController@show', 'as' => 'showStandClass']);
  Route::get('/standclass/create', ['uses' => 'StandClassController@create', 'as' => 'createStandClass']);
  Route::post('/standclass/create', ['uses' => 'StandClassController@store']);
  Route::put('updateStandClass/{id}', ['uses' => 'StandClassController@update', 'as' => 'updateStandClass']);

  Route::get('/developers', ['uses' => 'DeveloperController@index', 'as' => 'developers']);
  Route::get('/getDevelopers', ['uses' => 'DeveloperController@getDevelopers', 'as' => 'getDevelopers']);
  Route::get('/developers/{id}/edit', ['uses' => 'DeveloperController@edit', 'as' => 'editDeveloper']);
  Route::get('/developers/{id}', ['uses' => 'DeveloperController@show', 'as' => 'showDeveloper']);
  Route::get('/developer/create', ['uses' => 'DeveloperController@create', 'as' => 'createDeveloper']);
  Route::post('/developer/create', ['uses' => 'DeveloperController@store']);
  Route::put('updateDeveloper/{id}', ['uses' => 'DeveloperController@update', 'as' => 'updateDeveloper']);


  Route::get('/applicationstages', ['uses' => 'ApplicationStagesController@index', 'as' => 'applicationstages']);
  Route::get('/applicationstages/{id}/edit', ['uses' => 'ApplicationStagesController@edit', 'as' => 'editApplicationStage']);
  Route::get('/applicationstages/{id}', ['uses' => 'ApplicationStagesController@show', 'as' => 'showApplicationStage']);
  Route::get('/applicationstage/create', ['uses' => 'ApplicationStagesController@create', 'as' => 'createApplicationStage']);
  Route::post('/applicationstage/create', ['uses' => 'ApplicationStagesController@store']);
  Route::put('updateApplicationStage/{id}', ['uses' => 'ApplicationStagesController@update', 'as' => 'updateApplicationStage']);

  Route::get('/developmentstages', ['uses' => 'DevelopmentStageController@index', 'as' => 'developmentstages']);
  Route::get('/developmentstages/{id}/edit', ['uses' => 'DevelopmentStageController@edit', 'as' => 'editDevelopmentStage']);
  Route::get('/developmentstages/{id}', ['uses' => 'DevelopmentStageController@show', 'as' => 'showDevelopmentStage']);
  Route::get('/developmentstage/create', ['uses' => 'DevelopmentStageController@create', 'as' => 'createDevelopmentStage']);
  Route::post('/developmentstage/create', ['uses' => 'DevelopmentStageController@store']);
  Route::put('updateDevelopmentStage/{id}', ['uses' => 'DevelopmentStageController@update', 'as' => 'updateDevelopmentStage']);

  Route::post('/allocation/create', ['uses' => 'AllocationController@store', 'as' => 'addAllocation']);
  Route::put('/updateAllocation', ['uses' => 'AllocationController@update', 'as' => 'updateAllocation']);
  Route::post('/allocategrave/create', ['uses' => 'AllocateGraveController@store', 'as' => 'createAllocateGrave']);
  Route::get('/standconfigs', ['uses' => 'StandConfigController@index', 'as' => 'standconfigs']);
  Route::get('/standconfigs/{id}/edit', ['uses' => 'StandConfigController@edit', 'as' => 'editStandConfig']);
  Route::get('/standconfigs/{id}', ['uses' => 'StandConfigController@show', 'as' => 'showStandConfig']);
  Route::get('/standconfig/create', ['uses' => 'StandConfigController@create', 'as' => 'createStandConfigs']);
  Route::post('/standconfig/create', ['uses' => 'StandConfigController@store']);
  Route::put('updatestandconfig/{id}', ['uses' => 'StandConfigController@update', 'as' => 'updateStandConfigs']);

  Route::post('/allocation/create', ['uses' => 'AllocationController@store', 'as' => 'addAllocation']);
  Route::put('/updateAllocation', ['uses' => 'AllocationController@update', 'as' => 'updateAllocation']);


  Route::get('/cessions', ['uses' => 'CessionController@index', 'as' => 'cessions']);
  Route::post('/addCession', ['uses' => 'CessionController@store', 'as' => 'addCession']);
  Route::put('/updateCession', ['uses' => 'AllocationController@updateCession', 'as' => 'updateCession']); #
  // Route to show each cession details.
  Route::get('/cessions/{id}', ['uses' => 'CessionController@show', 'as' => 'showCession']);

  Route::post('/addRepossession', ['uses' => 'RepossessionController@store', 'as' => 'addRepossession']);
  Route::put('/updateRepossession', ['uses' => 'RepossessionController@update', 'as' => 'updateRepossession']);

  //     Route::get('/batches', ['uses'=>'BatchController@index', 'as'=>'batches']);
  //
  //
  //
  //     Route::get('/stand/create', ['uses'=>'StandController@create', 'as'=>'createStand']);
  //     Route::post('/stand/create', ['uses'=>'StandController@store', 'as'=>'createStand']);
  //     Route::post('updateStand/{id}', ['uses'=>'StandController@update', 'as'=>'updateStand']);




  Route::get('/findSmsClients', ['uses' => 'SmsController@findSmsClients', 'as' => 'findSmsClients']);

  Route::post('getBankAdminReport', ['uses' => 'ReportController@getBankAdminReport', 'as' => 'getBankAdminReport']);
  Route::post('getCashAdminReport', ['uses' => 'ReportController@getCashAdminReport', 'as' => 'getCashAdminReport']);
  Route::post('getDefaultersReport', ['uses' => 'ReportController@getDefaulters', 'as' => 'getDefaultersReport']);
  Route::get('getBadDebtorsReport', ['uses' => 'ReportController@getBadDebtors', 'as' => 'getBadDebtorsReport']);
  Route::get('getRefundsReport', ['uses' => 'ReportController@getRefunds', 'as' => 'getRefundsReport']);
  Route::post('activeloansreport', ['uses' => 'ReportController@getActiveLoans', 'as' => 'activeloansreport']);
  Route::get('reports', ['uses' => 'ReportController@index', 'as' => 'reports']);
  Route::post('statement', ['uses' => 'ReportController@getStatement', 'as' => 'statement']);
  Route::post('transactionlist', ['uses' => 'ReportController@getTransactionList', 'as' => 'transactionlist']);
  Route::post('paymentTypeReport', ['uses' => 'ReportController@getByPayment', 'as' => 'paymentTypeReport']);
  Route::post('productLoanReport', ['uses' => 'ReportController@getProductLoans', 'as' => 'productLoanReport']);
  Route::post('newClientReport', ['uses' => 'ReportController@getNewClientReport', 'as' => 'newClientReport']);
  Route::get('sendSms', ['uses' => 'SmsController@sendSms', 'as' => 'sendSms']);
  Route::get('export', ['uses' => 'ReportController@export', 'as' => 'export']);

  Route::get('getApplicants', ['uses' => 'ReportController@getApplicants', 'as' => 'getApplicants']);
  Route::get('getStands', ['uses' => 'ReportController@getStands', 'as' => 'getStandsReport']);
  Route::get('getAvailableStands', ['uses' => 'ReportController@getAvailableStands', 'as' => 'getAvailableStands']);
  Route::get('getAllocatedStands', ['uses' => 'ReportController@getAllocatedStands', 'as' => 'getAllocatedStands']);
  Route::get('getApplications', ['uses' => 'ReportController@getApplications', 'as' => 'getApplicationsReport']);
  Route::get('getApprovedApplications', ['uses' => 'ReportController@getApprovedApplications', 'as' => 'getApprovedApplications']);
  Route::get('getDeclinedApplications', ['uses' => 'ReportController@getDeclinedApplications', 'as' => 'getDeclinedApplications']);
  Route::get('getPendingApplications', ['uses' => 'ReportController@getPendingApplications', 'as' => 'getPendingApplications']);
  Route::get('getCompanyProfile', ['uses' => 'ReportController@getCompanyProfile', 'as' => 'getCompanyProfile']);
  Route::get('getByLaws', ['uses' => 'ReportController@getByLaws', 'as' => 'getByLaws']);
  Route::get('getChecklist', ['uses' => 'ReportController@getChecklist', 'as' => 'getChecklist']);


  //Form routes to re-print forms.
  Route::get('printApplication/{id}', ['uses' => 'FormController@printApplication', 'as' => 'printApplication']);
  Route::get('printOfferLetter/{id}', ['uses' => 'FormController@printOfferLetter', 'as' => 'printOfferLetter']);
  Route::get('printStageInspection/{id}', ['uses' => 'FormController@printStageInspection', 'as' => 'printStageInspection']);
  Route::get('printCession/{id}', ['uses' => 'FormController@printCession', 'as' => 'printCession']);
  Route::get('printLease/{id}', ['uses' => 'FormController@printLease', 'as' => 'printLease']);
  Route::get('printRuralLease/{id}', ['uses' => 'FormController@printRuralLease', 'as' => 'printRuralLease']);
  // Route::get('printCertOfCompletion', ['uses' => 'FormController@printCertOfCompletion', 'as' => 'printCertOfCompletion']);
  // Route::get('printCertOfOccupation', ['uses' => 'FormController@printCertOfOccupation', 'as' => 'printCertOfOccupation']);


  //Route::get('/', ['uses'=>'HomeController@index', 'as'=>'home']);
  Route::get('/sms', ['uses' => 'SmsController@index', 'as' => 'sms']);
  Route::get('/findSmsClients', ['uses' => 'SmsController@findSmsClients', 'as' => 'findSmsClients']);




  Route::get('/deductions', ['uses' => 'DeductionController@index', 'as' => 'deductions']);
  Route::post('import', 'DeductionController@import')->name('import');
  Route::get('/processSSB/{id}', ['uses' => 'DeductionController@processSSB', 'as' => 'processSSB']);
  Route::get('/resetSSB', ['uses' => 'DeductionController@reset', 'as' => 'resetSSB']);

  Route::get('/products', ['uses' => 'ProductController@index', 'as' => 'product']);
  Route::get('/products/{id}/edit', ['uses' => 'ProductController@edit', 'as' => 'editProduct']);
  Route::get('/products/{id}', ['uses' => 'ProductController@show', 'as' => 'showProduct']);
  Route::get('/product/create', ['uses' => 'ProductController@create', 'as' => 'createProduct']);
  Route::post('/product/create', ['uses' => 'ProductController@store']);
  Route::post('updateProduct/{id}', ['uses' => 'ProductController@update', 'as' => 'updateProduct']);
  Route::post('deleteProduct', ['uses' => 'ProductController@destroy', 'as' => 'deleteProduct']);
  Route::post('addDueDate', ['uses' => 'ProductDueDateController@store', 'as' => 'addDueDate']);
  Route::post('transferLoans', ['uses' => 'ProductController@transferLoans', 'as' => 'transferLoans']);
  Route::get('/getproduct/{id}', ['uses' => 'ProductController@getProduct', 'as' => 'getproduct']);
  Route::get('/getrollovers', ['uses' => 'ProductController@getRollover', 'as' => 'getrollover']);
  Route::post('rolloverLoans', ['uses' => 'ProductController@rollover', 'as' => 'rolloverLoans']);

  Route::get('/clients', ['uses' => 'ClientController@index', 'as' => 'clients']);
  Route::get('/clients/{id}/edit', ['uses' => 'ClientController@edit', 'as' => 'editClient']);
  Route::get('/clients/{id}', ['uses' => 'ClientController@show', 'as' => 'showClient']);
  Route::get('/client/create', ['uses' => 'ClientController@create', 'as' => 'createClient']);
  Route::post('/client/create', ['uses' => 'ClientController@store']);
  Route::put('updateClient/{id}', ['uses' => 'ClientController@update', 'as' => 'updateClient']);
  Route::get('SEARCHCLIENTS/SEARCH', ['uses' => 'ClientController@findClients', 'as' => 'findClients']);

  Route::get('/loans', ['uses' => 'LoanController@index', 'as' => 'loans']);
  Route::post('/loans/create', ['uses' => 'LoanController@store', 'as' => 'createLoan']);
  Route::get('/getLoan/{id}', ['uses' => 'LoanController@getLoan', 'as' => 'getLoan']);
  Route::put('/topup', ['uses' => 'LoanController@topUp', 'as' => 'topup']);
  Route::post('/repayment', ['uses' => 'LoanController@repayment', 'as' => 'repayment']);
  Route::post('/importLoan', ['uses' => 'LoanController@importLoan', 'as' => 'importLoan']);

  Route::get('/floats', ['uses' => 'FloatController@index', 'as' => 'floats']);
  Route::post('/addFloat', ['uses' => 'FloatController@store', 'as' => 'addFloat']);
  Route::post('/withdrawal', ['uses' => 'FloatController@processWithdrawal', 'as' => 'withdrawal']);

  Route::get('/refunds', ['uses' => 'RefundController@index', 'as' => 'refunds']);
  Route::post('/processRefund', ['uses' => 'RefundController@store', 'as' => 'processRefund']);

  Route::get('/genders', ['uses' => 'GenderController@index', 'as' => 'gender']);
  Route::get('/genders/{id}/edit', ['uses' => 'GenderController@edit', 'as' => 'editGender']);
  Route::get('/genders/{id}', ['uses' => 'GenderController@show', 'as' => 'showGender']);
  Route::get('/gender/create', ['uses' => 'GenderController@create', 'as' => 'createGender']);
  Route::post('/gender/create', ['uses' => 'GenderController@store', 'as' => 'storeGender']);
  Route::put('updateGender/{id}', ['uses' => 'GenderController@update', 'as' => 'updateGender']);

  Route::get('/maritals', ['uses' => 'MaritalController@index', 'as' => 'marital']);
  Route::get('/maritals/{id}/edit', ['uses' => 'MaritalController@edit', 'as' => 'editMarital']);
  Route::get('/maritals/{id}', ['uses' => 'MaritalController@show', 'as' => 'showMarital']);
  Route::get('/maritals/create', ['uses' => 'MaritalController@create', 'as' => 'createMarital']);
  Route::post('/maritals/create', ['uses' => 'MaritalController@store']);
  Route::put('updateMarital/{id}', ['uses' => 'MaritalController@update', 'as' => 'updateMarital']);
  Route::delete('deleteMarital/{id}', ['uses' => 'MaritalController@destroy', 'as' => 'deleteMarital']);

  Route::get('/repayments', ['uses' => 'RepaymentController@index', 'as' => 'repayments']);
  Route::post('/reverse', ['uses' => 'RepaymentController@reverseTransaction', 'as' => 'reverse']);

  Route::post('/allocate', ['uses' => 'GradeController@allocate', 'as' => 'allocate']);

  Route::post('/examgrade', ['uses' => 'ExamController@assign', 'as' => 'examgrade']);

  Route::get('/deleteAssignment/{id}', ['uses' => 'ExamController@deleteAssignment', 'as' => 'deleteAssignment']);

  Route::get('/backToProfile/{id}', ['uses' => 'TeacherController@goBack', 'as' => 'goBack']);

  Route::post('/assign', ['uses' => 'GradeController@assignTeacher', 'as' => 'assign']);

  Route::get('/classes', ['uses' => 'GradeController@getGrades', 'as' => 'classes']);

  Route::get('/couseworkmarks/{id}', ['uses' => 'AssessmentResultController@index', 'as' => 'cousework']);

  Route::get('/AllMarks/{gradeid}/{subjectid}', ['uses' => 'AssessmentResultController@allmarks', 'as' => 'allmarks']);

  Route::get('goBack/{id}', ['uses' => 'TeacherController@goBack', 'as' => 'goBack']);

  Route::post('/createassessment', ['uses' => 'AssessmentController@store', 'as' => 'createassessment']);

  Route::post('/insertmark', ['uses' => 'AssessmentResultController@insertmark', 'as' => 'insertmark']);

  Route::post('/insertExam', ['uses' => 'AssessmentResultController@insertExam', 'as' => 'insertExam']);

  Route::get('/getmarks/{id}/{studentid}', ['uses' => 'AssessmentResultController@getmarks', 'as' => 'getmarks']);

  Route::get('/admin', ['uses' => 'AdminController@index', 'as' => 'admin']);
  Route::get('/admin/{id}/edit', ['uses' => 'AdminController@edit', 'as' => 'editUser']);
  Route::get('/admin/create', ['uses' => 'AdminController@create', 'as' => 'createUser']);
  Route::post('/admin/create', ['uses' => 'AdminController@store', 'as' => 'createUser']);
  Route::post('updateUser/{id}', ['uses' => 'AdminController@update', 'as' => 'updateUser']);
  Route::post('updateRoles', ['uses' => 'AdminController@updateRoles', 'as' => 'updateRoles']);
  Route::get('deleteUser/{id}', ['uses' => 'AdminController@destroy', 'as' => 'deleteUser']);


  Route::get('/feestructures', ['uses' => 'FeeStructureController@index', 'as' => 'feestructures']);
  Route::get('/feestructure/{id}/edit', ['uses' => 'FeeStructureController@edit', 'as' => 'editStructure']);
  Route::get('/feestructure/{id}', ['uses' => 'FeeStructureController@show', 'as' => 'showStructure']);
  Route::get('/feestructures/create', ['uses' => 'FeeStructureController@create', 'as' => 'createStructure']);
  Route::post('/feestructures/create', ['uses' => 'FeeStructureController@store', 'as' => 'createStructure']);
  Route::post('updatefeestructure/{id}', ['uses' => 'FeeStructureController@update', 'as' => 'updateStructure']);
  Route::post('charge', ['uses' => 'FeeStructureController@charge', 'as' => 'charge']);
  Route::get('getStudents', ['uses' => 'FeeStructureController@getStudents', 'as' => 'getStudents']);
  Route::post('pay', ['uses' => 'FeeStructureController@makePayment', 'as' => 'makePayment']);

  Route::get('/session', ['uses' => 'AdminController@getSession', 'as' => 'session']);
  Route::get('/session/{id}/edit', ['uses' => 'AdminController@editSession', 'as' => 'editSession']);
  Route::post('updateSession/{id}', ['uses' => 'AdminController@updateSession', 'as' => 'updateSession']);

  Route::get('searchAssessment', ['uses' => 'AssessmentController@searchAssessment', 'as' => 'searchAssessment']);


  Route::get('staffprofile/{id}', ['uses' => 'TeacherController@show', 'as' => 'staffprofile']);
  Route::get('profile', ['uses' => 'TeacherController@profile', 'as' => 'profile']);
  Route::get('getBack/{gradeid}/{subjectid}', ['uses' => 'AssessmentResultController@getBack', 'as' => 'getBack']);
  Route::put('UpdateStaff', ['uses' => 'StaffController@update', 'as' => 'UpdateStaff']);
  Route::put('UpdateStudent', ['uses' => 'StudentController@update', 'as' => 'UpdateStudent']);
  Route::get('searchStudent', ['uses' => 'StudentController@searchStudent', 'as' => 'searchStudent']);
  Route::put('UpdateSubject', ['uses' => 'SubjectController@update', 'as' => 'UpdateSubject']);   //UpdateParent

  //    Route::get('searchParent',['uses'=>'ParentController@searchParent','as'=>'searchParent']);
  //    Route::get('searchStaff',['uses'=>'StaffController@searchStaff','as'=>'searchStaff']);
  Route::get('searchApplications', ['uses' => 'ApplicationController@searchApplications', 'as' => 'searchApplications']);

  Route::put('UpdateParent', ['uses' => 'ParentController@update', 'as' => 'UpdateParent']);
  Route::put('UpdateApplicant', ['uses' => 'ApplicationController@update', 'as' => 'UpdateApplicant']);
  Route::put('Enroll', ['uses' => 'EnrolmentController@Enroll', 'as' => 'Enroll']);

  //    Route::prefix('xul')->group(function () {

  // Route::resource('staffs', 'StaffController');
  Route::put('staffs/update', ['uses' => 'StaffController@update', 'as' => 'UpdateStaff']);
  Route::get('staffs', ['uses' => 'StaffController@index', 'as' => 'staffs']);

  //Route::resource('terms', 'TermController');
  Route::put('updateTerm/{id}', ['uses' => 'TermController@update', 'as' => 'UpdateTerm']);
  Route::post('terms/store', ['uses' => 'TermController@store', 'as' => 'createTerm']);
  Route::get('terms', ['uses' => 'TermController@index', 'as' => 'terms']);
  Route::get('terms/{id}/edit', ['uses' => 'TermController@edit', 'as' => 'editTerm']);
  Route::get('term/create', ['uses' => 'TermController@create', 'as' => 'termCreate']);

  //Route::resource('classes', 'GradeClassController');
  Route::put('classes/updateClass/{id}', ['uses' => 'GradeClassController@update', 'as' => 'UpdateClass']);
  Route::post('classes/store', ['uses' => 'GradeClassController@store', 'as' => 'createClass']);
  Route::get('classes', ['uses' => 'GradeClassController@index', 'as' => 'classes']);
  Route::get('class/{id}/edit', ['uses' => 'GradeClassController@edit', 'as' => 'editClass']);
  Route::get('/class/{id}', ['uses' => 'GradeClassController@show', 'as' => 'getClass']);

  //Route::resource('parents', 'ParentController');
  Route::put('parents/update', ['uses' => 'ParentController@update', 'as' => 'UpdateParent']);
  Route::get('parents', ['uses' => 'ParentController@index', 'as' => 'parents']);

  //Route::resource('enrolments', 'EnrolmentController');
  Route::put('enrolments/update', ['uses' => 'EnrolmentController@update', 'as' => 'UpdateEnrolment']);
  Route::post('enrolments/store', ['uses' => 'EnrolmentController@store', 'as' => 'createEnrolment']);
  Route::get('enrolments', ['uses' => 'EnrolmentController@index', 'as' => 'enrolments']);

  //  Route::resource('applications', 'ApplicationController');
  // Route::put('applications/update', ['uses' => 'ApplicationController@update', 'as' => 'UpdateApplicant']);
  Route::post('applications/store', ['uses' => 'ApplicationController@store', 'as' => 'createApplication']);
  Route::get('applications', ['uses' => 'ApplicationController@index', 'as' => 'applications']);
  Route::get('findApplications', ['uses' => 'ApplicationController@findApplications', 'as' => 'findApplications']);

  //Route::resource('subjects', 'SubjectController');
  Route::get('subject/{id}', ['uses' => 'SubjectController@show', 'as' => 'showSubject']);
  Route::get('subjects/{id}/edit', ['uses' => 'SubjectController@edit', 'as' => 'editSubject']);
  Route::post('subject/store', ['uses' => 'SubjectController@store', 'as' => 'createSubject']);
  Route::get('subjects', ['uses' => 'SubjectController@index', 'as' => 'subjects']);
  Route::get('subjectCreate', ['uses' => 'SubjectController@create', 'as' => 'subjectCreate']);
  Route::put('updateSubject/{id}', ['uses' => 'SubjectController@update', 'as' => 'updateSubject']);

  // Route::resource('grades', 'GradeController');
  Route::put('grades/update', ['uses' => 'GradeController@update', 'as' => 'UpdateGrade']);
  Route::post('grades/store', ['uses' => 'GradeController@store', 'as' => 'createGrade']);
  Route::get('grades', ['uses' => 'GradeController@index', 'as' => 'grades']);

  // Route::resource('grades', 'GradeController');
  Route::put('departments/update', ['uses' => 'DepartmentController@update', 'as' => 'UpdateDepartment']);
  Route::post('departments/store', ['uses' => 'DepartmentController@store', 'as' => 'createDepartment']);
  Route::get('departments', ['uses' => 'DepartmentController@index', 'as' => 'departments']);

  // Route::resource('grades', 'GradeController');
  Route::put('students/update', ['uses' => 'StudentController@update', 'as' => 'UpdateStudent']);
  Route::get('students', ['uses' => 'StudentController@index', 'as' => 'students']);

  // Route::resource('sets', 'SubjectSetController');
  Route::put('sets/update', ['uses' => 'SubjectSetController@update', 'as' => 'UpdateSet']);
  Route::post('sets/store', ['uses' => 'SubjectSetController@store', 'as' => 'setStore']);
  Route::get('sets', ['uses' => 'SubjectSetController@index', 'as' => 'sets']);
  Route::get('sets/create', ['uses' => 'SubjectSetController@create', 'as' => 'createSet']);


  // Route::resource('sets', 'SubjectSetController');
  Route::put('roles/update', ['uses' => 'RoleController@update', 'as' => 'UpdateRole']);
  Route::post('roles/store', ['uses' => 'RoleController@store', 'as' => 'createRole']);
  Route::get('roles', ['uses' => 'RoleController@index', 'as' => 'roles']);
  Route::post('role/create', ['uses' => 'RoleController@store']);
  Route::get('role/create', ['uses' => 'RoleController@create', 'as' => 'createRole']);
  Route::get('roles', ['uses' => 'RoleController@index', 'as' => 'roles']);
  Route::get('/role/{id}', ['uses' => 'RoleController@show', 'as' => 'viewRole']);
  Route::get('/role/{id}/edit', ['uses' => 'RoleController@edit', 'as' => 'editRole']);
  Route::put('/role/{id}/edit', ['uses' => 'RoleController@update', 'as' => 'updateRole']);

  // Route::resource('sets', 'SubjectSetController');
  Route::put('rollovers/update', ['uses' => 'RollOverController@update', 'as' => 'UpdateRollover']);
  Route::post('rollovers/store', ['uses' => 'RollOverController@store', 'as' => 'createRollover']);

  Route::get('rollovers', ['uses' => 'RollOverController@index', 'as' => 'rollovers']);

  Route::get('assessments', ['uses' => 'AssessmentController@index', 'as' => 'assessments']);
  Route::get('assessment/{id}', ['uses' => 'AssessmentController@show', 'as' => 'showAssessment']);


  Route::post('Exams/MidTerm', ['uses' => 'ExamController@enterMidMarks', 'as' => 'enterMidExams']);

  Route::post('Exams/MidTermGrade', ['uses' => 'ExamController@enterGrade', 'as' => 'enterGrade']);

  Route::post('Exams/Exams', ['uses' => 'ExamController@enterExams', 'as' => 'enterExams']);

  Route::post('Exams/AddComment', ['uses' => 'ExamController@addComment', 'as' => 'addComment']);


  //Route::resource('rollovers', 'RollOverController');
  //Route::resource('sets', 'SubjectSetController');
  //Route::resource('assessments', 'AssessmentController');




  Route::resource('teachers', 'TeacherController');
  Route::resource('exams', 'ExamController');
  //Route::resource('students', 'StudentController');
  //Route::resource('roles', 'RoleController');
  //Route::resource('departments', 'DepartmentController');



  //    });




  Route::post('addTimeTable', ['uses' => 'SubjectSetController@store', 'as' => 'addTimeTable']);
  Route::post('addGroup', ['uses' => 'SubjectSetController@storeGroup', 'as' => 'addGroup']);
  Route::post('updateGroup', ['uses' => 'SubjectSetController@updateGroup', 'as' => 'updateGroup']);
  Route::post('addSet', ['uses' => 'SubjectSetController@storeSetUp', 'as' => 'addSet']);
  Route::get('groups/search', ['uses' => 'SubjectSetController@getSubjectGroups', 'as' => 'getGroup']);

  Route::post('roll', ['uses' => 'RollOverController@rollover', 'as' => 'rollover']);
  Route::post('addStudentClass', ['uses' => 'GradeClassController@addStudentClass', 'as' => 'addStudentClass']);
  Route::post('addStudentSet', ['uses' => 'StudentController@addStudentSet', 'as' => 'addStudentSet']);


  Route::post('deleteGroup', ['uses' => 'SubjectSetController@deleteGroup', 'as' => 'deleteGroup']);

  Route::get('staff/{id}', ['uses' => 'StaffController@getStaff', 'as' => 'getStaff']);
  Route::get('subject/{id}', ['uses' => 'SubjectController@getSubject', 'as' => 'getSubject']);
  Route::get('parent/{id}', ['uses' => 'ParentController@getParent', 'as' => 'getParent']);
  Route::get('getChildren/{id}', ['uses' => 'ParentController@getChildren', 'as' => 'getChildren']);
  Route::get('getApplicant/{id}', ['uses' => 'ApplicationController@getApplicant', 'as' => 'getApplicant']);
  Route::get('getStudent/{id}', ['uses' => 'StudentController@getStudent', 'as' => 'getStudent']);

  Route::get('getClassStudent/{id}', ['uses' => 'GradeClassController@getStudents', 'as' => 'getClassStudent']);
  Route::get('getSubjectSet/{id}', ['uses' => 'SubjectSetController@getSubjectSet', 'as' => 'getSubjectSet']);

  Route::get('getClass/SEARCH', ['uses' => 'GradeClassController@search', 'as' => 'findClass']);
  Route::get('getSet/SEARCH', ['uses' => 'SubjectSetController@search', 'as' => 'findSet']);

  Route::get('getSetStudents/{id}', ['uses' => 'SubjectSetController@getSetStudents', 'as' => 'getSetStudents']);

  Route::get('removeStudent/{id}', ['uses' => 'StudentController@removeStudent', 'as' => 'removeStudent']);

  Route::get('removeSet/{id}', ['uses' => 'SubjectSetController@removeSet', 'as' => 'removeSet']);

  Route::get('downloadReport/{id}/{term}/{year}', ['uses' => 'StudentController@download', 'as' => 'downloadReport']);

  Route::get('printStudentReport/{id}/{term}/{year}', ['uses' => 'StudentController@printStudentReport', 'as' => 'printStudentReport']);

  Route::get('printEndOfTermReport/{id}/{term}/{year}', ['uses' => 'StudentController@printEndOfTermReport', 'as' => 'printEndOfTermReport']);

  Route::get('back/{term}/{year}/{form}', ['uses' => 'GradeClassController@back', 'as' => 'back']);

  Route::get('activities', ['uses' => 'ActivityController@index', 'as' => 'activities']);
  Route::post('addActGroup', ['uses' => 'ActivityController@storeActGroup', 'as' => 'addActGroup']);
  Route::post('editActGroup', ['uses' => 'ActivityController@editActGroup', 'as' => 'editActGroup']);
  Route::get('getActStudents/{id}', ['uses' => 'ActivityController@getActStudents', 'as' => 'getActStudents']);
  Route::get('activities/{id}', ['uses' => 'ActivityController@show', 'as' => 'marks']);
  Route::post('activities/AddComment', ['uses' => 'ActivityController@addActComment', 'as' => 'addActComment']);
  Route::get('removemember/{id}', ['uses' => 'CommunicationController@removemember', 'as' => 'removemember']);


  Route::get('getact/search', ['uses' => 'ActivityController@search', 'as' => 'getmyact']);
  Route::post('addStudentActivity', ['uses' => 'ActivityController@addStudentActivity', 'as' => 'addStudentActivity']);
  Route::post('deleteActivity', ['uses' => 'ActivityController@destroy', 'as' => 'deleteActivity']);
  Route::get('removeStudentActivity/{id}/{id2}', ['uses' => 'ActivityController@removeStudentActivity', 'as' => 'removeStudentActivity']);

  Route::get('group/{id}', ['uses' => 'CommunicationController@getMembers', 'as' => 'getMembers']);
  Route::get('removegroup/{id}', ['uses' => 'CommunicationController@removeGroup', 'as' => 'removegroup']);



  Route::post('Student/AddOverall', ['uses' => 'StudentController@addComment', 'as' => 'addOverallComment']);

  Route::post('addmember', ['uses' => 'CommunicationController@addmember', 'as' => 'addmember']);

  Route::get('communications', ['uses' => 'CommunicationController@index', 'as' => 'communications']);
  Route::post('addEmailGroup', ['uses' => 'CommunicationController@addgroup', 'as' => 'addEmailGroup']);
  Route::post('sendSingleEmail', ['uses' => 'CommunicationController@sendEmail', 'as' => 'sendSingleEmail']);
  Route::post('sendBulkEmail', ['uses' => 'CommunicationController@sendBulkEmail', 'as' => 'sendBulkEmail']);

  //--Start Project Costing Routes --//
  Route::get('costing-project', ['uses' => 'Costing\ProjectController@index', 'as' => 'costing-project']);
  Route::get('costing-project/create', ['uses' => 'Costing\ProjectController@create', 'as' => 'costing-project/create']);
  Route::post('store-costing-project', ['uses' => 'Costing\ProjectController@store', 'as' => 'store-costing-project']);
  Route::get('get-costing-project/{id}', ['uses' => 'Costing\ProjectController@show', 'as' => 'get-costing-project']);
  Route::get('costing-project/{id}/edit', ['uses' => 'Costing\ProjectController@edit', 'as' => 'edit-costing-project']);
  Route::put('update-costing-project/{id}', ['uses' => 'Costing\ProjectController@update', 'as' => 'update-costing-project']);
  Route::delete('delete-costing-project/{id}', ['uses' => 'Costing\ProjectController@destroy', 'as' => 'delete-costing-project']);

  //--Costing Stands Routes--//
  Route::get('costing-project-stand/create/{id}', ['uses' => 'Costing\StandsController@create', 'as' => 'costing-project-stand']);
  Route::post('store-costing-project-stand', ['uses' => 'Costing\StandsController@store', 'as' => 'store-costing-project-stand']);
  Route::delete('delete-costing-project-stand/{id}', ['uses' => 'Costing\StandsController@destroy', 'as' => 'delete-costing-project-stand']);
  Route::get('costing-project-stand/{id}/edit', ['uses' => 'Costing\StandsController@edit', 'as' => 'edit-costing-project-stand']);
  Route::put('update-costing-project-stand/{id}', ['uses' => 'Costing\StandsController@update', 'as' => 'update-costing-project-stand']);
  Route::get('get-costing-project-stand/{id}', ['uses' => 'Costing\StandsController@show', 'as' => 'get-costing-project-stand']);

  //--Costing Stages Routes--//
  Route::get('costing-project-stage/create/{id}', ['uses' => 'Costing\StageController@create', 'as' => 'costing-project-stage']);
  Route::post('store-costing-project-stage', ['uses' => 'Costing\StageController@store', 'as' => 'store-costing-project-stage']);
  Route::get('costing-project-stage/{id}/edit', ['uses' => 'Costing\StageController@edit', 'as' => 'costing-project-stage']);
  Route::delete('delete-costing-project-stage/{id}', ['uses' => 'Costing\StageController@destroy', 'as' => 'delete-costing-project-stage']);
  Route::get('get-costing-project-stage/{id}', ['uses' => 'Costing\StageController@show', 'as' => 'get-costing-project-stage']);

  //--Costing MarkUp Routes--//
  Route::post('store-costing-project-markup', ['uses' => 'Costing\MarkUpController@store', 'as' => 'store-costing-project-markup']);


  //-- Main Costing Stages--//
  Route::get('costing-main-stage', ['uses' => 'Costing\MainStagesController@index', 'as' => 'costing-main-stage']);
  Route::get('costing-main-stage/create', ['uses' => 'Costing\MainStagesController@create', 'as' => 'costing-main-stage/create']);
  Route::post('store-costing-main-stage', ['uses' => 'Costing\MainStagesController@store', 'as' => 'store-costing-main-stage']);
  Route::get('get-costing-main-stage/{id}/edit', ['uses' => 'Costing\MainStagesController@edit', 'as' => 'get-costing-main-stage']);
  Route::put('update-costing-main-stage/{id}', ['uses' => 'Costing\MainStagesController@update', 'as' => 'update-costing-main-stage']);
  //--End Project Costing Routes --//

  //--Lease Routes--//
  Route::get('lease', ['uses' => 'LeasesController@index', 'as' => 'lease']);
  Route::get('lease-renewal/{id}/edit', ['uses' => 'LeasesController@renewLease', 'as' => 'lease-renewal']);

  //--End Lease Routes--//

  // reinstatements
  Route::post('addReinstatement', ['uses' => 'ReinstatementController@createReinstatement', 'as' => 'addReinstatement']);

  //Company Routes
  Route::get('company', ['uses' => 'Companycontroller@index', 'as' => 'company']);
  // Route::get('/company/{id}', ['uses'=>'CompanyController@show', 'as'=>'showCompany']);
  Route::get('/company/create', ['uses' => 'Companycontroller@create', 'as' => 'createCompany']);
  Route::post('/company/create', ['uses' => 'Companycontroller@store']);
  Route::get('/company/show', ['uses' => 'Companycontroller@show', 'as' => 'showCompany']);
  Route::delete('/company/{id}', 'Companycontroller@destroy');
  Route::get('/company/editCompany', ['uses' => 'Companycontroller@editCompany', 'as' => 'editCompany']);
  Route::put('/company/editCompany', ['uses' => 'Companycontroller@update', 'as' => 'updateCompany']);

  //notification routes
  Route::get('/bulksms', ['uses' => 'BulkSmsController@sendForm', 'as' => 'send']);
  Route::post('/bulksms', 'BulkSmsController@sendSms');
  Route::post('/sendOffer', ['uses' => 'BulkSmsController@sendOffer', 'as' => 'sendOffer']);
  Route::post('/repoNotify', ['uses' => 'BulkSmsController@repoNotify', 'as' => 'repoNotify']);

  /*spouse routes
  Route::get('PERSONS/{id}/addSpouse', ['uses' => 'SpouseController@create', 'as' => 'createSpouse']);
  Route::post('PERSONS/{id}/addSpouse', ['uses' => 'SpouseController@store']);
  Route::put('/spouse/{id}/edit', ['uses' => 'SpouseController@update', 'as' => 'updateSpouse']);
  */

  //waitingList
  Route::get('/waiting-list', ['uses' => 'WaitingListController@index', 'as' => 'waitinglist']);
  Route::get('waiting-history/{id}', ['uses' => 'WaitingListController@show', 'as' => 'waiting-history']);
  Route::post('/waiting-list', ['uses' => 'WaitingListController@update', 'as' => 'updateExpiryDate']);

  //license
  Route::get('users/status/{user_id}/{status_code}', ['uses' => 'AdminController@updateStatus', 'as' => 'updateStatus']);

  //softdeletes
  Route::delete('repossession/{id}', ['uses' => 'RepossessionController@destroy', 'as' => 'destroyRepo']);

  //--Lease Routes--//
  Route::get('lease', ['uses' => 'LeasesController@index', 'as' => 'lease']);
  Route::get('lease-renewal/{id}/edit', ['uses' => 'LeasesController@renewLease', 'as' => 'lease-renewal']);
  Route::get('lease-create', ['uses' => 'LeasesController@create', 'as' => 'lease-create']);
  Route::post('lease-store', ['uses' => 'LeasesController@store', 'as' => 'lease-store']);
  Route::get('lease-stand-autocomplete', 'LeasesController@searchStands');
  Route::delete('lease/{id}', ['uses' => 'LeasesController@destroy']);
  Route::get('lease/{id}/edit', ['uses' => 'LeasesController@edit', 'as' => 'lease-edit']);
  Route::put('lease-update/{id}', ['uses' => 'LeasesController@update', 'as' => 'lease-update']);
  Route::get('lease/{id}', ['uses' => 'LeasesController@show', 'as' => 'lease-show']);
  Route::post('lease-decision', ['uses' => 'LeasesController@statusDecision', 'as' => 'lease-decision']);
  //--End Lease Routes--//


  //-- Debtors Routes --//
  Route::get('debtors',['uses' => 'DebtorsController@index','as' => 'debtors']);
  Route::get('debtors/{id}',['uses' =>'DebtorsController@show','as'=>'showDebtor']);
  //-- End Debtors Routes --//

  // Rural Lease Routes//
  Route::get('rurallease', ['uses' => 'RuralLeaseController@index', 'as' => 'rurallease.index']);
  //Route::get('rurallease-renewal/{id}/edit', ['uses' => 'RuralLeaseController@renewLease', 'as' => 'rurallease-renewal']);
  Route::post('rurallease', ['uses' => 'RuralLeaseController@store', 'as' => 'rurallease.store']);
  Route::get('rurallease/{id}', ['uses' => 'RuralLeaseController@show', 'as' => 'rurallease.show']);
  Route::post('rurallease-decision', ['uses' => 'RuralLeaseController@statusDecision', 'as' => 'rurallease-decision']);
  Route::get('rurallease/{id}/edit', ['uses' => 'RuralLeaseController@edit', 'as' => 'rurallease-edit']);
  Route::put('rurallease/{id}/edit', ['uses' => 'RuralLeaseController@update', 'as' => 'rurallease-update']);
  Route::delete('rurallease/{id}', ['uses' => 'RuralLeaseController@destroy', 'as' => 'rurallease.destroy']);

});
// Section Pages
//Route::view('/sample/error404','errors.404')->name('error404');
//Route::view('/sample/error500','errors.500')->name('error500');

Auth::routes();

Route::get('/', 'HomeController@index');

//Auth::routes();

//Route::get('/home', 'HomeController@index');
