<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OtherRequestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TicketRequestController;
use App\Http\Controllers\TourismController;
use App\Http\Controllers\VisaController;
use App\Models\Tourism;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use PHPUnit\Framework\Attributes\Ticket;

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

Route::get('/', [HomeController::class,'index'])->name('home');

Route::get('/welcome', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/tickets', [TicketController::class, 'view'])->name('dashboard.tickets');
    Route::get('/dashboard/tickets-request', [TicketRequestController::class, 'ViewAllRequest'])->name('dashboard.view.tickets.requests');
    Route::get('/dashboard/visa-request', [OtherRequestController::class, 'ViewVisaRequest'])->name('dashboard.view.visa.requests');
    Route::post('/dashboard/ticket-request-responded/{slug}', [TicketRequestController::class, 'RequestResponded']);
    Route::post('/dashboard/visa-request-responded/{slug}', [OtherRequestController::class, 'RequestResponded']);
    Route::get('/dashboard/new-ticket',[TicketController::class,'newTicketPage']);
    Route::post('/dashboard/add/new-ticket',[TicketController::class,'new']);
    Route::post('/dashboard/delete-ticket/{slug}',[TicketController::class,'delete']);
    Route::get('/dashboard/edit-ticket/{slug}',[TicketController::class,'editPage']);
    Route::post('/dashboard/edit-ticket/{slug}',[TicketController::class,'edit']);

    Route::get('/dashboard/visas', [VisaController::class, 'index'])->name('dashboard.visas');
    Route::get('/dashboard/new-visa',[VisaController::class,'newVisaPage']);
    Route::post('/dashboard/add/new-visa',[VisaController::class,'new']);
    Route::post('/dashboard/delete-visa/{slug}',[VisaController::class,'delete']);
    Route::get('/dashboard/edit-visa/{slug}',[VisaController::class,'editPage']);
    Route::post('/dashboard/edit-visa/{slug}',[VisaController::class,'edit']);

    Route::get('/dashboard/tour', [TourismController::class, 'index'])->name('dashboard.tour');
    Route::get('/dashboard/new-tour',[TourismController::class,'newTourPage']);
    Route::post('/dashboard/add/new-tour',[TourismController::class,'new']);
    Route::post('/dashboard/delete-tour/{slug}',[TourismController::class,'delete']);
    Route::get('/dashboard/edit-tour/{slug}',[TourismController::class,'editPage']);
    Route::post('/dashboard/edit-tour/{slug}',[TourismController::class,'edit']);
    
});

Route::get('/tickets', [TicketController::class, 'index'])->name('tickets');
Route::get('/visas/{slug}', [VisaController::class, 'home'])->name('visa');
Route::get('/tourism/{slug}', [TourismController::class, 'home'])->name('tourism');
Route::post('/ticket-request', [TicketRequestController::class, 'request'])->name('ticket.request');
Route::post('/submit-user-request/{slug}', [OtherRequestController::class, 'message'])->name('other.request');
Route::get('/Categories/{slug}',[CategoryController::class,'index']);
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';