<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\CarController as FrontendCarController;
use App\Http\Controllers\Frontend\PageController as FrontendPageController;
use App\Http\Controllers\Frontend\BookingController as FrontendBookingController;
use App\Http\Controllers\Frontend\ContactController as FrontendContactController;
use App\Http\Controllers\Frontend\ChatController as FrontendChatController;
use App\Http\Controllers\Frontend\AuthController as FrontendAuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\HomepageController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [FrontendPageController::class, 'about'])->name('about');
Route::get('/products', [FrontendCarController::class, 'index'])->name('cars.index');
Route::get('/products/{slug}', [FrontendCarController::class, 'show'])->name('cars.show');
Route::get('/services', [FrontendPageController::class, 'services'])->name('services');
Route::get('/articles', [FrontendPageController::class, 'articles'])->name('articles');
Route::get('/articles/{slug}', [FrontendPageController::class, 'article'])->name('articles.detail');
Route::get('/help', [FrontendPageController::class, 'helpCenter'])->name('help');
Route::get('/contact', [FrontendPageController::class, 'contact'])->name('contact');
Route::post('/contact', [FrontendContactController::class, 'store'])->name('contact.store');
Route::get('/booking/{car_slug?}', [FrontendBookingController::class, 'create'])->name('booking');
Route::post('/booking', [FrontendBookingController::class, 'store'])->name('booking.store');
Route::get('/booking/confirmation/{booking}', [FrontendBookingController::class, 'confirmation'])->name('booking.confirmation');
Route::get('/page/{slug}', [FrontendPageController::class, 'show'])->name('page.show');

// Live Chat
Route::post('/chat/send', [FrontendChatController::class, 'sendMessage'])->name('chat.send');
Route::get('/chat/messages', [FrontendChatController::class, 'getMessages'])->name('chat.messages');
Route::post('/chat/start', [FrontendChatController::class, 'index'])->name('chat.start');
Route::get('/chat/check-new-messages', [FrontendChatController::class, 'checkNewMessages'])->name('chat.check');
Route::post('/chat/set-type', [FrontendChatController::class, 'setChatType'])->name('chat.setType');

// Auth Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'reset'])->name('password.update');

// Social Login
Route::get('/auth/{provider}', [FrontendAuthController::class, 'redirectToProvider'])->name('social.login');
Route::get('/auth/{provider}/callback', [FrontendAuthController::class, 'handleProviderCallback']);
Route::get('/auth/whatsapp', [FrontendAuthController::class, 'redirectToWhatsApp'])->name('auth.whatsapp');

// Customer Dashboard (logged in users)
Route::middleware(['auth'])->group(function () {
    // Customer Dashboard
    Route::get('/dashboard', [App\Http\Controllers\Frontend\CustomerController::class, 'dashboard'])->name('customer.dashboard');
    Route::get('/my-bookings', [App\Http\Controllers\Frontend\CustomerController::class, 'bookings'])->name('customer.bookings');
    Route::get('/profile', [App\Http\Controllers\Frontend\CustomerController::class, 'profile'])->name('customer.profile');
    Route::post('/profile', [App\Http\Controllers\Frontend\CustomerController::class, 'updateProfile'])->name('customer.profile.update');
    Route::post('/profile/password', [App\Http\Controllers\Frontend\CustomerController::class, 'updatePassword'])->name('customer.password.update');

    // Customer Content Pages
    Route::get('/dashboard/home', [App\Http\Controllers\Frontend\CustomerController::class, 'home'])->name('customer.home');
    Route::get('/dashboard/about', [App\Http\Controllers\Frontend\CustomerController::class, 'about'])->name('customer.about');
    Route::get('/dashboard/products', [App\Http\Controllers\Frontend\CustomerController::class, 'products'])->name('customer.products');
    Route::get('/dashboard/services', [App\Http\Controllers\Frontend\CustomerController::class, 'services'])->name('customer.services');
    Route::get('/dashboard/articles', [App\Http\Controllers\Frontend\CustomerController::class, 'articles'])->name('customer.articles');
    Route::get('/dashboard/help', [App\Http\Controllers\Frontend\CustomerController::class, 'help'])->name('customer.help');
    Route::get('/dashboard/contact', [App\Http\Controllers\Frontend\CustomerController::class, 'contact'])->name('customer.contact');

    // Partner Dashboard
    Route::get('/partner/home', [App\Http\Controllers\Frontend\PartnerController::class, 'home'])->name('partner.home');
    Route::get('/partner/dashboard', [App\Http\Controllers\Frontend\PartnerController::class, 'dashboard'])->name('partner.dashboard');
    Route::get('/partner/listings', [App\Http\Controllers\Frontend\PartnerController::class, 'listings'])->name('partner.listings');
    Route::get('/partner/bookings', [App\Http\Controllers\Frontend\PartnerController::class, 'bookings'])->name('partner.bookings');
    Route::get('/partner/profile', [App\Http\Controllers\Frontend\PartnerController::class, 'profile'])->name('partner.profile');
    Route::post('/partner/profile', [App\Http\Controllers\Frontend\PartnerController::class, 'updateProfile'])->name('partner.profile.update');
    Route::post('/partner/profile/password', [App\Http\Controllers\Frontend\PartnerController::class, 'updatePassword'])->name('partner.password.update');

    // Partner Content Pages
    Route::get('/partner/about', [App\Http\Controllers\Frontend\PartnerController::class, 'about'])->name('partner.about');
    Route::get('/partner/products', [App\Http\Controllers\Frontend\PartnerController::class, 'products'])->name('partner.products');
    Route::get('/partner/services', [App\Http\Controllers\Frontend\PartnerController::class, 'services'])->name('partner.services');
    Route::get('/partner/articles', [App\Http\Controllers\Frontend\PartnerController::class, 'articles'])->name('partner.articles');
    Route::get('/partner/help', [App\Http\Controllers\Frontend\PartnerController::class, 'help'])->name('partner.help');
    Route::get('/partner/contact', [App\Http\Controllers\Frontend\PartnerController::class, 'contact'])->name('partner.contact');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {
    // Admin Login
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'login']);
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

    // Protected Admin Routes
    Route::middleware(['admin'])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/dashboard', [DashboardController::class, 'index']);
        Route::get('/dashboard/stats', [DashboardController::class, 'stats'])->name('admin.dashboard.stats');
        Route::get('/notifications', [NotificationController::class, 'index'])->name('admin.notifications');

        // Cars
        Route::resource('/cars', CarController::class)->names([
            'index' => 'admin.cars.index',
            'create' => 'admin.cars.create',
            'store' => 'admin.cars.store',
            'show' => 'admin.cars.show',
            'edit' => 'admin.cars.edit',
            'update' => 'admin.cars.update',
            'destroy' => 'admin.cars.destroy',
        ]);

        // Categories
        Route::resource('/categories', CategoryController::class)->names([
            'index' => 'admin.categories.index',
            'create' => 'admin.categories.create',
            'store' => 'admin.categories.store',
            'edit' => 'admin.categories.edit',
            'update' => 'admin.categories.update',
            'destroy' => 'admin.categories.destroy',
        ]);

        // Services
        Route::resource('/services', ServiceController::class)->names([
            'index' => 'admin.services.index',
            'create' => 'admin.services.create',
            'store' => 'admin.services.store',
            'edit' => 'admin.services.edit',
            'update' => 'admin.services.update',
            'destroy' => 'admin.services.destroy',
        ]);

        // Testimonials
        Route::resource('/testimonials', TestimonialController::class)->names([
            'index' => 'admin.testimonials.index',
            'create' => 'admin.testimonials.create',
            'store' => 'admin.testimonials.store',
            'edit' => 'admin.testimonials.edit',
            'update' => 'admin.testimonials.update',
            'destroy' => 'admin.testimonials.destroy',
        ]);

        // Articles
        Route::resource('/articles', ArticleController::class)->names([
            'index' => 'admin.articles.index',
            'create' => 'admin.articles.create',
            'store' => 'admin.articles.store',
            'edit' => 'admin.articles.edit',
            'update' => 'admin.articles.update',
            'destroy' => 'admin.articles.destroy',
        ]);

        // Sliders
        Route::resource('/sliders', SliderController::class)->names([
            'index' => 'admin.sliders.index',
            'create' => 'admin.sliders.create',
            'store' => 'admin.sliders.store',
            'edit' => 'admin.sliders.edit',
            'update' => 'admin.sliders.update',
            'destroy' => 'admin.sliders.destroy',
        ]);

        // Bookings
        Route::get('/bookings', [BookingController::class, 'index'])->name('admin.bookings.index');
        Route::get('/bookings/export/csv', [BookingController::class, 'export'])->name('admin.bookings.export');
        Route::get('/bookings/{booking}', [BookingController::class, 'show'])->name('admin.bookings.show');
        Route::put('/bookings/{booking}/status', [BookingController::class, 'updateStatus'])->name('admin.bookings.status');

        // Users
        Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
        Route::post('/users', [UserController::class, 'store'])->name('admin.users.store');
        Route::get('/users/{id}', [UserController::class, 'show'])->name('admin.users.show');
        Route::put('/users/{id}/approve', [UserController::class, 'approve'])->name('admin.users.approve');
        Route::put('/users/{id}/reject', [UserController::class, 'reject'])->name('admin.users.reject');
        Route::put('/users/{id}/suspend', [UserController::class, 'suspend'])->name('admin.users.suspend');
        Route::put('/users/{id}/activate', [UserController::class, 'activate'])->name('admin.users.activate');
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');

        // Contacts
        Route::get('/contacts', [AdminContactController::class, 'index'])->name('admin.contacts.index');
        Route::get('/contacts/{id}', [AdminContactController::class, 'show'])->name('admin.contacts.show');
        Route::put('/contacts/{id}/read', [AdminContactController::class, 'markAsRead'])->name('admin.contacts.read');
        Route::delete('/contacts/{id}', [AdminContactController::class, 'destroy'])->name('admin.contacts.destroy');

        // FAQs
        Route::resource('/faqs', FaqController::class)->names([
            'index' => 'admin.faqs.index',
            'create' => 'admin.faqs.create',
            'store' => 'admin.faqs.store',
            'edit' => 'admin.faqs.edit',
            'update' => 'admin.faqs.update',
            'destroy' => 'admin.faqs.destroy',
        ]);

        // Settings
        Route::get('/settings', [SettingController::class, 'index'])->name('admin.settings.index');
        Route::post('/settings', [SettingController::class, 'update'])->name('admin.settings.update');

        // Homepage Content
        Route::get('/homepage', [HomepageController::class, 'index'])->name('admin.homepage.index');
        Route::post('/homepage', [HomepageController::class, 'update'])->name('admin.homepage.update');

        // Pages
        Route::resource('/pages', PageController::class)->names([
            'index' => 'admin.pages.index',
            'create' => 'admin.pages.create',
            'store' => 'admin.pages.store',
            'edit' => 'admin.pages.edit',
            'update' => 'admin.pages.update',
            'destroy' => 'admin.pages.destroy',
        ]);

        // Chat
        Route::get('/chat', [ChatController::class, 'index'])->name('admin.chat.index');
        Route::get('/chat/sessions', [ChatController::class, 'getSessions'])->name('admin.chat.sessions');
        Route::get('/chat/unread-count', [ChatController::class, 'getUnreadCount'])->name('admin.chat.unreadCount');
        Route::get('/chat/mode', [ChatController::class, 'getChatMode'])->name('admin.chat.mode');
        Route::post('/chat/toggle-mode', [ChatController::class, 'toggleMode'])->name('admin.chat.toggleMode');
        Route::get('/chat/sessions/{session}/messages', [ChatController::class, 'getMessages'])->name('admin.chat.messages');
        Route::post('/chat/sessions/{session}/messages', [ChatController::class, 'sendMessage'])->name('admin.chat.sendMessage');
        Route::get('/chat/{session}', [ChatController::class, 'show'])->name('admin.chat.show');
        Route::post('/chat/{session}/send', [ChatController::class, 'sendMessage'])->name('admin.chat.send');
    });
});
