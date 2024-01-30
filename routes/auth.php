<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AllTransactionController;
use App\Http\Controllers\Admin\DashboradController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\User\ATMController;
use App\Http\Controllers\User\PinController;
use App\Http\Controllers\User\TranferController;
use App\Http\Controllers\User\UpdateProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::middleware('auth')->group(function () {

    Route::get('pin', [PinController::class, 'pin'])
                ->name('pin');
    Route::post('pin', [PinController::class, 'setPin'])
                ->name('pin');
    Route::get('UpdatePassword', [PinController::class, 'UpdatePassword'])
                ->name('UpdatePassword');
    Route::get('updateProfile', [UpdateProfileController::class, 'updateProfile'])
                ->name('updateProfile');
    Route::put('/updateProfile', [UpdateProfileController::class, 'update'])
                ->name('updateProfile');
    Route::get('photo', [UpdateProfileController::class, 'photo'])
                ->name('photo');
    Route::post('/profile/upload', [UpdateProfileController::class, 'upload'])->name('profile.upload');
    Route::post('/profile/delete-image', [UpdateProfileController::class, 'deleteImage'])->name('profile.deleteImage');

    Route::get('accountDetaill', [PinController::class, 'accountDetail'])
                ->name('accountDetaill');
    Route::post('/get-conversion-rate', [PinController::class, 'getConversionRate']);

    Route::get('tranfer', [TranferController::class, 'tranfer'])
                ->name('tranfer');
    Route::post('tranfer', [TranferController::class, 'saveTransaction'])
                ->name('tranfer');

    Route::get('insertpin', [PinController::class, 'insetPin'])
                ->name('insertpin');
    Route::post('insert-pin', [PinController::class, 'insertPin'])
                ->name('insert-pin');
    Route::get('atm', [ATMController::class, 'atm'])
                ->name('atm');
    Route::post('atm', [ATMController::class, 'atmCard'])
                ->name('atm');

    Route::get('loan', [ATMController::class, 'loan'])
                ->name('loan');
    Route::post('loan', [ATMController::class, 'loanCard'])
                ->name('loan');

    Route::get('account-statement', [TranferController::class, 'accountStatement'])
                ->name('account-statement');
    Route::post('account-statement', [TranferController::class, 'getStatement'])
                ->name('account-statement');

    Route::get('show_statement', [TranferController::class, 'getStatement'])
                ->name('show_statement');
    Route::get('otp', [PinController::class, 'otp'])
                ->name('otp');
    Route::post('process-otp', [PinController::class, 'processOTP'])
                ->name('process-otp');
    Route::get('singleTransfer', [TranferController::class, 'singleTransfer'])
                ->name('singleTransfer');
    Route::get('singleTransferDetail/{transaction_id}', [TranferController::class, 'viewDetailsOfSingleTransfer'])
                ->name('singleTransferDetail');


    
    
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');



});

Route::get('/admin/register', [AdminAuthController::class, 'showRegisterForm'])->name('admin.register');
Route::post('/admin/register', [AdminAuthController::class, 'register'])->name('admin.register');

Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
            
            // Logout
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');


Route::middleware(['admin'])->group(function () {
    Route::get('admin', [DashboradController::class, 'dashborad'])
                ->name('admin');
    Route::get('/admin', [DashboradController::class, 'showUserCount']) ->name('admin');
    Route::post('/update-transactionstatus/{id}', [DashboradController::class, 'updateTransactionStatus'])->name('update-transactionstatus');
    Route::post('/update-status/{id}', [DashboradController::class, 'updateStatus'])->name('update-status');
    Route::post('/delete-user/{id}',  [DashboradController::class, 'deleteUser'])->name('delete-user');    
    Route::get('/add-money/{user}',[DashboradController::class, 'add'])->name('add-money'); 
    Route::post('/add-money/{user}', [DashboradController::class, 'addMoney'])->name('credit-account');  
    Route::get('/remove-money/{user}',[DashboradController::class, 'remove'])->name('remove-money'); 
    Route::post('/remove-money/{user}', [DashboradController::class, 'removeMoney'])->name('debit-account');  
    Route::get('/edit/{user}', [DashboradController::class, 'edit'])->name('edit');
    Route::put('/update/{user}', [DashboradController::class, 'update'])->name('update');
    Route::get('/allTranfer', [AllTransactionController::class, 'allTranfer'])->name('allTranfer');
    Route::get('/allLoan', [AllTransactionController::class, 'allLoan'])->name('allLoan');
    Route::get('/allCard', [AllTransactionController::class, 'allCard'])->name('allCard');
    Route::post('/card-status', [AllTransactionController::class, 'cardStatus'])->name('card-status');
    Route::get('/allCurrency', [AllTransactionController::class, 'AllCurrency'])->name('allCurrency');
    Route::get('/allCurrency/{user}', [AllTransactionController::class, 'edit'])->name('allCurrency');
    Route::put('/allCurrency/{user}', [AllTransactionController::class, 'update'])->name('allCurrency.user');



});
