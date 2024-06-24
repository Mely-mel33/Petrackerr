<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\PubliController;
use App\Http\Controllers\DashboardController;
use Chatify\Http\Controllers\MessagesController;
use App\Http\Controllers\AlerteController;
use App\Http\Controllers\VetooController;
use App\Http\Controllers\RendezVousController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\AdopteController;
use App\Http\Controllers\ReportController;


// Route d'accueil accessible sans authentification
Route::get('/', [HomeController::class, 'index'])->name('home');


// Middleware pour les routes nécessitant une authentification
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // routes/web.php
    Route::resource('posts', PostController::class);
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');


    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::post('/comments/{comment}/reply', [CommentController::class, 'reply'])->name('comments.reply');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');


    Route::post('/posts/{post}/like', [LikeController::class, 'store'])->name('posts.like');
    Route::delete('/posts/{post}/like', [LikeController::class, 'destroy'])->name('posts.unlike');

    
    // Routes pour les signalements
    Route::post('/posts/{post}/report', [ReportController::class, 'store'])->name('report.store');
    Route::get('/admin/reports', [ReportController::class, 'reportAdmin'])->name('reports.admin');
    Route::delete('/admin/reports/{report}', [ReportController::class, 'delete'])->name('reports.delete');


    // Routes Pet
    Route::get('/pet', [PetController::class, 'index'])->name('pet.index');
    Route::get('/pet/create', [PetController::class, 'create'])->name('pet.create');
    Route::post('/pet/store', [PetController::class, 'store'])->name('pet.store');
    Route::get('/pet/{pet}/edit', [PetController::class, 'edit'])->name('pet.edit');
    Route::put('/pet/{pet}', [PetController::class, 'update'])->name('pet.update');
    Route::delete('/pet/{pet}', [PetController::class, 'destroy'])->name('pet.destroy');
    Route::get('/pet/{id}', [PetController::class, 'show'])->name('pet.show');
    Route::get('/planning', [PetController::class, 'planning'])->name('pet.planning');
    Route::post('/add-note-to-pet', [PetController::class, 'addNoteToPet'])->name('add-note-to-pet');
    Route::get('/pet/{pet}/note/{note}/edit', [PetController::class, 'editNote'])->name('pet.editnote');
    Route::put('/pet/{pet}/note/{note}', [PetController::class, 'updateNote'])->name('pet.updatenote');
    Route::delete('/pet/{pet}/note/{note}', [PetController::class, 'destroyNote'])->name('pet.destroynote');
    Route::post('/pet/{id}/mark-as-adoptable', [PetController::class, 'markAsAdoptable'])->name('pet.mark_as_adoptable');
    Route::post('/pets/{id}/cancel_adoption', [PetController::class, 'cancelAdoption'])->name('pet.cancel_adoption');


    //Routes Adoption
    Route::get('/adopt', [AdopteController::class, 'index'])->name('adopt.index');
    Route::get('/adopt/{pet}', [AdopteController::class, 'show'])->name('adopt.show');
    Route::get('/adopt/create', [AdopteController::class, 'create'])->name('adopt.create');
    Route::post('/adoption/store', [AdopteController::class, 'store'])->name('adoption.store');
    Route::get('/adopt/{pet}/edit', [AdopteController::class, 'edit'])->name('adopt.edit');
    Route::put('/adopt/{pet}', [AdopteController::class, 'update'])->name('adopt.update');
    Route::delete('/adopt/{pet}', [AdopteController::class, 'destroy'])->name('adopt.destroy');
    Route::post('/adoption/{pet}', [AdopteController::class, 'store'])->name('adoption.store');
    Route::get('/adoption/requests', [AdopteController::class, 'viewAdoptionRequests'])->name('adoption.requests');
  //  Route::post('/adoption/requests/approve/{id}', [AdoptController::class, 'AdoptionApprove'])->name('adoption.approve');
//Route::post('/adoption/requests/refuse/{id}', [AdoptController::class, 'AdoptionReject'])->name('adoption.reject');
Route::post('/adoption/{id}/approve', [AdopteController::class, 'AdoptionApprove'])->name('request.approve');
Route::post('/adoption/{id}/reject', [AdopteController::class, 'AdoptionReject'])->name('request.reject');
Route::post('/adoption/{id}/remarque', [AdopteController::class, 'ajouterRemarqu'])->name('request.remarque');
Route::post('/adoption/{id}/remarque', [AdopteController::class, 'addRemark'])->name('request.remarque');
Route::post('/adoption/{id}/approve', [AdopteController::class, 'approve'])->name('request.approve');
Route::post('/adoption/{id}/reject', [AdopteController::class, 'reject'])->name('request.reject');
Route::get('/adopdes', [AdopteController::class, 'adopdes'])->name('adopdes');
    // Routes Publi
    Route::get('/publi', [PubliController::class, 'Publi'])->name('publi.index');
    Route::get('/publi/create', [PubliController::class, 'create'])->name('publi.create');
    Route::post('/publi/store', [PubliController::class, 'store'])->name('publi.store');
    Route::get('/publi/{publi}/edit', [PubliController::class, 'edit'])->name('publi.edit');
    Route::put('/publi/{publi}', [PubliController::class, 'update'])->name('publi.update');
    Route::delete('/publi/{publi}', [PubliController::class, 'destroy'])->name('publi.destroy');


    // Routes User
    Route::get('/accueil', [DashboardController::class, 'accueil'])->name('accueil');
    Route::get('/api/signalements-par-semaine', [DashboardController::class, 'getSignalementsParSemaine']);
    Route::get('/api/getAnimauxAjoutesParType', [DashboardController::class, 'getAnimauxAjoutesParType']);
    Route::get('/user', [UserController::class, 'User'])->name('user');
    Route::get('/MonProfil', [UserController::class, 'monprofil'])->name('monprofil');
    Route::get('/messagerie', [UserController::class, 'messagerie'])->name('messagerie');
    Route::get('/messagerieV', [VetooController::class, 'messagerieV'])->name('messagerieV');
    Route::get('/prendrdv', [UserController::class, 'Prendrdv'])->name('prendrdv');
    Route::get('/Prendrdv/store', [UserController::class, 'store'])->name('Prendrdv.store');
    Route::get('/listesveto', [UserController::class, 'listesveto'])->name('listesveto');


    // Routes Alerte
    Route::get('/alerte', [AlerteController::class, 'alerte'])->name('alerte');
    Route::post('/envoyer-alerte', [AlerteController::class, 'store'])->name('envoyer_alerte');
    Route::get('/alertes-admin', [AlerteController::class, 'indexAdmin'])->name('alertes_admin');
    Route::put('/alertes/{alerte}/accepter', [AlerteController::class, 'accepter'])->name('alertes.accepter');
    Route::put('/alertes/{alerte}/refuser', [AlerteController::class, 'refuser'])->name('alertes.refuser');
    Route::delete('/alertes/{alerte}', [AlerteController::class, 'destroy'])->name('alertes.destroy');
    Route::get('/listalert', [AlerteController::class, 'listalert'])->name('listalert');



    // Routes Véto
    Route::get('/listesveto/search', [VetooController::class, 'search'])->name('listesveto.search');
    Route::get('/veto/createv', [VetooController::class, 'create'])->name('veto.createv');
    Route::post('/veto/store', [VetooController::class, 'store'])->name('veto.store');
    Route::get('/veto/{id}/edit', [VetooController::class, 'edit'])->name('veto.edit');
    Route::put('/veto/{id}', [VetooController::class, 'update'])->name('veto.update');
    Route::get('/veto/show/{id}', [VetooController::class, 'show'])->name('veto.show');
    Route::get('/veto/{id}', [VetooController::class, 'showProfile'])->name('veto.showProfile');
    Route::get('/veto/MonProfil/{id}', [VetooController::class, 'show'])->name('veto.MonProfil');
    Route::get('/veto/recherche', [VetooController::class, 'recherche'])->name('veto.recherche');
    Route::get('/véto', [VetooController::class, 'véto'])->name('véto');
    Route::get('/publiveto', [VetooController::class, 'Publi'])->name('publiveto');
    //routes pour afficher un profil
    Route::get('/Monprofil', [VetooController::class, 'Monprofil'])->name('Monprofil');
    Route::get('/RDVs', [VetooController::class, 'RDVs'])->name('RDVs');
    Route::get('/CheckAproved', [VetooController::class, 'CheckAproved'])->name('CheckAproved');
    Route::post('/veto/check', [VetooController::class, 'check'])->name('veto.check');
    //routes pour chercher un veto
    Route::get('/listesveto', [VetooController::class, 'index'])->name('listesveto');
    Route::get('/searchveto', [VetooController::class, 'search'])->name('searchveto');
    Route::post('/RDVs/{id}/approve', [VetooController::class, 'veterinaireApprove'])->name('RDVs.approve');
    Route::post('/RDVs/{id}/reject', [VetooController::class, 'veterinaireReject'])->name('RDVs.reject');
    Route::get('/véto', [VetooController::class, 'véto'])->name('véto');
    //Route::delete('/veto/{id}', [VetooController::class, 'véto'])->name('véto');
 // web.php
 Route::post('/rdvs/{id}/remarque', [VetooController::class, 'ajouterRemarque'])->name('RDVs.remarque');
 Route::get('/search-veto', [VetooController::class, 'search'])->name('search.veto');

    // Routes Rdvs
    Route::get('/Prendrdv/create/{petId}', [RendezVousController::class, 'create'])->name('Prendrdv.create');
    Route::post('Prendrdv/store', [RendezVousController::class, 'store'])->name('Prendrdv.store');
    Route::get('/prendrdv/{petId}', [RendezVousController::class, 'showForm'])->name('prendrdv');
    Route::post('/Prendrdv', [RendezVousController::class, 'store'])->name('Prendrdv.store');
    Route::get('/RDVs', [RendezVousController::class, 'index'])->name('RDVs');
    Route::post('/veto/RDVs/approve/{id}', [RendezVousController::class, 'approve'])->name('veto.approve');
    Route::delete('/veto/RDVs/reject/{id}', [RendezVousController::class, 'reject'])->name('veto.reject');
  

Route::get('/listesrdv', [RendezVousController::class, 'listesrdv'])->name('rdv.listesrdv');


    Route::get('/prrdv/{veto_id}', [RendezVousController::class, 'prrdv'])->name('rdv.prrdv');
    Route::post('/rdv/store', [RendezVousController::class, 'store'])->name('rdv.store');
    Route::get('/demandes', [RendezVousController::class, 'demandes'])->name('rdv.demandes');
Route::post('/demandes/{demande}/accept', [RendezVousController::class, 'accepterDemande'])->name('rdv.accept');
Route::post('/demandes/{demande}/refuse', [RendezVousController::class, 'refuserDemande'])->name('rdv.refuse');
Route::post('/demandes/{id}/remarque', [RendezVousController::class, 'ajouterRemarque'])->name('demandes.remarque');
    // Routes Message
    Route::get('/messages', [MessagesController::class, 'index'])->name('messages');
    Route::get('/chatify/favorites', [MessagesController::class, 'favorites']);
    Route::post('/chatify/getContacts', [MessagesController::class, 'getContacts']);


    // Routes Admin
    Route::get('/admin', [AdminController::class, 'Admin'])->name('admin');
    Route::get('/adminuser', [AdminController::class, 'AdminUser'])->name('adminuser');
    Route::get('/adminpubli', [AdminController::class, 'AdminPubli'])->name('adminpubli');
    Route::get('/adminveto', [AdminController::class, 'Adminveto'])->name('Adminveto');
    // Routes pour approuver ou rejeter une inscription
    Route::delete('/{veto}', [AdminController::class, 'destroy'])->name('veto.destroy');
    // Route pour approuver une inscription par l'administrateur
    Route::post('/admin/veto/approve/{id}', [AdminController::class, 'approve'])->name('admin.veto.approve');
    // Route pour supprimer une inscription par l'administrateur
    Route::delete('/admin/veto/{id}', [AdminController::class, 'destroy'])->name('admin.veto.destroy');


});
