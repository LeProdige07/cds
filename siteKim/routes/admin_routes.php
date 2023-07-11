<?php



Route::resource('users', App\Http\Controllers\UserController::class)->middleware('access:User');
Route::resource('roles', App\Http\Controllers\RoleController::class)->middleware('access:Role');
Route::resource('services', App\Http\Controllers\ServiceController::class)->middleware('access:Service');
Route::resource('details', App\Http\Controllers\DetailController::class)->middleware('access:Detail');
Route::get('/details_by_service/{id}', [App\Http\Controllers\DetailController::class, 'details']);
Route::resource('projects', App\Http\Controllers\ProjectController::class)->middleware('access:Project');
Route::resource('faqs', App\Http\Controllers\FaqController::class)->middleware('access:Faq');
Route::resource('nouvelles', App\Http\Controllers\NouvelleController::class)->middleware('access:Nouvelle');
Route::resource('temoignages', App\Http\Controllers\TemoignageController::class)->middleware('access:Temoignage');
Route::resource('personnels', App\Http\Controllers\PersonnelController::class)->middleware('access:Personnel');
Route::resource('clientsatisfaits', App\Http\Controllers\ClientSatisfaitController::class)->middleware('access:ClientSatisfait');
Route::resource('contacts', App\Http\Controllers\ContactController::class)->middleware('access:Contact');

// Activer et Désactiver un élément avec l'attribut status
Route::get('/activer_clientsatisfait/{id}', [App\Http\Controllers\ClientSatisfaitController::class, 'activer_clientsatisfait']);
Route::get('/desactiver_clientsatisfait/{id}', [App\Http\Controllers\ClientSatisfaitController::class, 'desactiver_clientsatisfait']);
Route::get('/activer_personnel/{id}', [App\Http\Controllers\PersonnelController::class, 'activer_personnel']);
Route::get('/desactiver_personnel/{id}', [App\Http\Controllers\PersonnelController::class, 'desactiver_personnel']);
Route::get('/activer_temoignage/{id}', [App\Http\Controllers\TemoignageController::class, 'activer_temoignage']);
Route::get('/desactiver_temoignage/{id}', [App\Http\Controllers\TemoignageController::class, 'desactiver_temoignage']);
Route::get('/activer_nouvelle/{id}', [App\Http\Controllers\NouvelleController::class, 'activer_nouvelle']);
Route::get('/desactiver_nouvelle/{id}', [App\Http\Controllers\NouvelleController::class, 'desactiver_nouvelle']);
Route::get('/activer_faq/{id}', [App\Http\Controllers\FaqController::class, 'activer_faq']);
Route::get('/desactiver_faq/{id}', [App\Http\Controllers\FaqController::class, 'desactiver_faq']);
Route::get('/activer_project/{id}', [App\Http\Controllers\ProjectController::class, 'activer_project']);
Route::get('/desactiver_project/{id}', [App\Http\Controllers\ProjectController::class, 'desactiver_project']);
Route::get('/activer_service/{id}', [App\Http\Controllers\ServiceController::class, 'activer_service']);
Route::get('/desactiver_service/{id}', [App\Http\Controllers\ServiceController::class, 'desactiver_service']);
