<?php

use App\Http\Controllers\TestController;
// User
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\DashboardController as UserDash;
use App\Http\Controllers\User\PaymentController as UserPayment;
use App\Http\Controllers\User\ProfileController as UserProfile;

// Admin
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\UserController as AdminUser;
use App\Http\Controllers\Admin\WithdrawalController as AdminWithdrawal;

// Creator
use App\Http\Controllers\Creator\DashboardController as CreatorDashboard;
use App\Http\Controllers\Creator\ProfileController as CreatorProfile;
// Brand
use App\Http\Controllers\Brand\DashboardController as BrandDashboard;
use App\Http\Controllers\Brand\ProfileController as BrandProfile;
// Accountant
use App\Http\Controllers\Accountant\DashboardController as AccountantDash;
use App\Http\Controllers\Accountant\ProfileController as AccountantProfile;

// Course
use App\Http\Controllers\Course\MainController as CourseMain;
use App\Http\Controllers\Course\EnrollController as CourseEnroll;

// Group
use App\Http\Controllers\Group\MainController as GroupMain;
use App\Http\Controllers\Group\SettingsController as GroupSettings;
use App\Http\Controllers\Group\PostController as GroupPost;

// Webinar
use App\Http\Controllers\Webinar\MainController as WebinarMain;
use App\Http\Controllers\Webinar\SubscribeController as WebinarSubscribe;

// Mentoring
use App\Http\Controllers\Mentoring\MainController as MentoringMain;
use App\Http\Controllers\Mentoring\SubscribeController as MentoringSubscribe;

// Mentee
use App\Http\Controllers\Mentee\DashboardController as MenteeDashboard;
use App\Http\Controllers\Mentee\ProfileController as MenteeProfile;
use App\Http\Controllers\Mentee\CourseController as MenteeCourse;
use App\Http\Controllers\Mentee\WebinarController as MenteeWebinar;
use App\Http\Controllers\Mentee\MentoringController as MenteeMentoring;
use App\Http\Controllers\Mentee\TransactionController as MenteeTransaction;

// Post
use App\Http\Controllers\Post\MainController as PostMain;

// Organisation
use App\Http\Controllers\Organisation\DashboardController as OrganisationDashboard;
use App\Http\Controllers\Organisation\ProfileController as OrganisationProfile;
use App\Http\Controllers\Organisation\MenteeController as OrganisationMentee;
use App\Http\Controllers\Organisation\MentorController as OrganisationMentor;

// Institution
use App\Http\Controllers\Institution\DashboardController as InstitutionDashboard;
use App\Http\Controllers\Institution\ProfileController as InstitutionProfile;
use App\Http\Controllers\Institution\MenteeController as InstitutionMentee;
use App\Http\Controllers\Institution\MentorController as InstitutionMentor;
Route::name("courses.")->prefix("courses")->group(function(){
    Route::get("/",[CourseMain::class,"index"])->name("index");
    Route::get("view/{id}/{title}",[CourseMain::class,"view"])->name("view");
    Route::middleware(["auth","verified"])->name("enroll.")->prefix("enroll")->group(function(){
        Route::get("/{id}",[CourseEnroll::class,"enroll"])->name("add");
    });
});

Route::name("webinars.")->prefix("webinars")->group(function(){
    Route::get("/",[WebinarMain::class,"index"])->name("index");
    Route::get("view/{id}/{title}",[WebinarMain::class,"view"])->name("view");
    Route::middleware(["auth","verified"])->name("subscribe.")->prefix("subscribe")->group(function(){
        Route::get("/{id}",[WebinarSubscribe::class,"subscribe"])->name("add");
        Route::get("/{id}/fill-form",[WebinarSubscribe::class,"fillForm"])->name("fill-form");
        Route::post("/{id}/fill-form",[WebinarSubscribe::class,"submitForm"])->name("fill-form");
    });
});
Route::name("mentorings.")->prefix("mentorings")->group(function(){
    Route::get("/",[MentoringMain::class,"index"])->name("index");
    Route::get("view/{id}/{title}",[MentoringMain::class,"view"])->name("view");
    Route::middleware(["auth","verified"])->name("subscribe.")->prefix("subscribe")->group(function(){
        Route::get("/{id}/slot",[MentoringSubscribe::class,"chooseSlot"])->name("slot");
        Route::post("/{id}",[MentoringSubscribe::class,"subscribe"])->name("add");
        Route::get("/{id}/fill-form",[MentoringSubscribe::class,"fillForm"])->name("fill-form");
        Route::post("/{id}/fill-form",[MentoringSubscribe::class,"submitForm"])->name("fill-form");
    });
});

Route::get("courses/{type?}",[InstructorCourse::class,"index"])->name("courses");
        Route::get("courses/create/new",[InstructorCourse::class,"create"])->name("courses.create");
        Route::post("courses/create/new",[InstructorCourse::class,"store"])->name("courses.create");
        Route::get("courses/edit/{id}/landing",[InstructorCourse::class,"editLand"])->name("courses.edit-land");
        Route::post("courses/edit/{id}/landing",[InstructorCourse::class,"updateLand"])->name("courses.edit-land");
        Route::get("courses/edit/{id}/target",[InstructorCourse::class,"editTarget"])->name("courses.edit-target");
        Route::post("courses/edit/{id}/target",[InstructorCourse::class,"updateTarget"])->name("courses.edit-target");
        Route::get("courses/edit/{id}/curriculum",[InstructorCourse::class,"editCir"])->name("courses.edit-cir");
        Route::post("courses/edit/{id}/curriculum",[InstructorCourse::class,"updateCir"])->name("courses.edit-cir");
        Route::get("courses/edit/{id}/settings",[InstructorCourse::class,"editSettings"])->name("courses.edit-settings");
        Route::post("courses/edit/{id}/settings/review",[InstructorCourse::class,"review"])->name("courses.edit-settings.review");
        Route::post("courses/edit/{id}/settings/publish",[InstructorCourse::class,"publish"])->name("courses.edit-settings.publish");
        Route::post("courses/edit/{id}/settings/delete",[InstructorCourse::class,"delete"])->name("courses.edit-settings.delete");

        Route::get("webinars",[InstructorWebinar::class,"index"])->name("webinars");
        Route::get("webinars/create",[InstructorWebinar::class,"create"])->name("webinars.create");
        Route::post("webinars/create",[InstructorWebinar::class,"store"])->name("webinars.create");
        Route::post("webinars/delete",[InstructorWebinar::class,"delete"])->name("webinars.delete");
        Route::get("webinars/{id}/form/create",[InstructorWebinar::class,"createForm"])->name("webinars.form.create");
        Route::post("webinars/{id}/form/create",[InstructorWebinar::class,"storeForm"])->name("webinars.form.create");

        Route::get("mentorings",[InstructorMentoring::class,"index"])->name("mentorings");
        Route::get("mentorings/create",[InstructorMentoring::class,"create"])->name("mentorings.create");
        Route::post("mentorings/create",[InstructorMentoring::class,"store"])->name("mentorings.create");
        Route::post("mentorings/delete",[InstructorMentoring::class,"delete"])->name("mentorings.delete");
        Route::get("mentorings/{id}/form/create",[InstructorMentoring::class,"createForm"])->name("mentorings.form.create");
        Route::post("mentorings/{id}/form/create",[InstructorMentoring::class,"storeForm"])->name("mentorings.form.create");

        Route::get("learnings",[InstructorLearning::class,"index"])->name("learnings");
        Route::get("learnings/create",[InstructorLearning::class,"create"])->name("learnings.create");
        Route::post("learnings/create",[InstructorLearning::class,"store"])->name("learnings.create");
        Route::post("learnings/delete",[InstructorLearning::class,"delete"])->name("learnings.delete");
        Route::get("learnings/{id}/certificate/create",[InstructorLearning::class,"createCertificate"])->name("learnings.certificate.create");
        Route::post("learnings/{id}/certificate/create",[InstructorLearning::class,"storeCertificate"])->name("learnings.certificate.create");

        // Wallet
        Route::get('wallet',[InstructorWallet::class,"index"])->name('wallet');
        Route::get('wallet/accounts',[InstructorWallet::class,"accounts"])->name('wallet.accounts');
        Route::post('wallet/withdraw',[InstructorWallet::class,"withdraw"])->name('wallet.withdraw');
        Route::post('wallet/accounts/bank',[InstructorWallet::class,"addBank"])->name('wallet.addBank');
        Route::post('wallet/accounts/upi',[InstructorWallet::class,"addUpi"])->name('wallet.addUpi');
