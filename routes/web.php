<?php
use App\Http\Controllers\admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\MemberReminderController;
use App\Http\Controllers\member\MemberController;
use App\Http\Controllers\admin\LoanRequestController;
use App\Http\Controllers\member\LoanController;
use App\Http\Controllers\member\LoanBalanceController;
use App\Http\Controllers\admin\LoanPaymentController;
use App\Http\Controllers\admin\LoanListController;
use App\Http\Controllers\admin\ClientSavingsController;
use App\Http\Controllers\admin\LoanTypeListController;
use App\Http\Controllers\admin\ArchiveController;
use App\Http\Controllers\admin\InterfaceController;
use App\Http\Controllers\member\InterfaceMemberController;
use App\Http\Controllers\member\AccountSettingsController;
use App\Http\Controllers\staff\StaffController;
use App\Http\Controllers\admin\PersonalInformationController;
use App\Http\Controllers\admin\TransactionHistoryController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/template', function () {
    return view('email.MemberEmailViewTemplate');
});

// ADMIN DASHBOARD
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    // Route::resource('/members', AdminController::class,['names' => 'member']);
    Route::get('/members', [AdminController::class, 'index'])->name('member.index');
//Interface

Route::get('interface',[InterfaceController::class,'interface'])->name('member.interface');
Route::get('members/personal/{id}',[PersonalInformationController::class,'personal'])->name('member.personal');
Route::get('members/transaction/{id}',[TransactionHistoryController::class,'transaction'])->name('member.transaction');

Route::get('members/archive/{id}',[ArchiveController::class,'restore'])->name('restore');
// Create Routes
Route::get('/members/create', [AdminController::class, 'create'])->name('member.create');
Route::post('/members', [AdminController::class, 'store'])->name('member.store');

// Update Routes
Route::put('/members/{id}', [AdminController::class, 'update'])->name('member.update');
Route::patch('/members/{id}', [AdminController::class, 'update']); // Alternative for partial updates
Route::get('/members/{id}/edit', [AdminController::class, 'edit'])->name('member.edit');

// Show Route
Route::get('/members/{id}', [AdminController::class, 'show'])->name('member.show');

// Destroy Route
Route::delete('/members/{id}', [AdminController::class, 'destroy'])->name('member.destroy');


    Route::resource('/loan-request', LoanRequestController::class,['names' => 'loan-request']);
    Route::get('notifications', [MemberReminderController::class,'index'])->name('notifications');
    Route::put('notifications/update', [MemberReminderController::class,'setSetting'])->name('notifications.update');

    Route::get('admin/archive',[ArchiveController::class,'archive'])->name('archive');
    

    // Loan Review
    Route::get('loan-review/{id}',[LoanRequestController::class,'ReviewLoanRequest'])->name('loan-review');
    Route::put('loan-review/{id}/approved',[LoanRequestController::class,'LoanApproved'])->name('loan-review-approved');
    Route::put('loan-review/{id}/declined',[LoanRequestController::class,'LoanDeclined'])->name('loan-review-declined');

    // Loan Payment
    Route::get('loan-payment',[LoanPaymentController::class,'index'])->name('loan-payment-index');
    Route::get('loan-payment/{id}',[LoanPaymentController::class,'viewActiveLoan'])->name('loan-payment-user-loan-lists');
    Route::post('loan-payment/{id}',[LoanPaymentController::class,'PayLoan'])->name('pay.loan');

    // Loan
    Route::get('loan/{id}',[LoanPaymentController::class,'viewLoan'])->name('loan');

    // Loan List
    Route::get('loan-lists',[LoanListController::class,'index'])->name('loan.lists');

    // Loan List Type
    Route::get('loan-lists/general',[LoanTypeListController::class,'general'])->name('loan.lists.general');
    Route::get('loan-lists/comfort',[LoanTypeListController::class,'comfort'])->name('loan.lists.comfort');
    Route::get('loan-lists/house',[LoanTypeListController::class,'housing'])->name('loan.lists.house');
    Route::get('loan-lists/educational',[LoanTypeListController::class,'educational'])->name('loan.lists.educational');

    // Savings
    Route::get('savings',[ClientSavingsController::class,'index'])->name('savings.index');
    Route::get('savings/account/{id}',[ClientSavingsController::class,'viewSaving'])->name('savings.account');
});

Route::prefix('staff')->name('staff.')->middleware('auth')->group(function () {
    Route::get('index',[StaffController::class,'index'])->name('index');
    Route::get('interface',[StaffController::class,'interface'])->name('interface');
}); 

// MEMBER DASHBOARD
Route::prefix('member')->name('member.')->middleware('auth')->group(function () {
    Route::resource('/notifications', MemberController::class,['names' => 'mail']);
    Route::resource('/loan', LoanController::class,['names' => 'loan']);
   
    Route::get('profile',[MemberController::class,'profile'])->name('profile');
    //Account Settings
    Route::get('/account-settings',[AccountSettingsController::class,'account_settings'])->name('mail.settings');

    Route::get('/interface',[InterfaceMemberController::class,'interface'])->name('mail.interface');
    // PUT
    Route::put('loan-request', [LoanController::class,'LoanRequest'])->name('loan-request');

    // Loan Balance
    Route::get('/loan-balance/',[LoanBalanceController::class,'index'])->name('loan-balance-index');

    // Loan Transaction
    Route::get('loan-transaction/{id}', [LoanController::class,'viewLoan'])->name('loan-transaction');

    Route::get('loan-current/', [LoanController::class,'viewCurrentlyPayment'])->name('loan-current');

});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
