<?php

use App\Controllers\AuthController;
use App\Controllers\UserController;
use App\controllers\GradeController;
use App\controllers\TrackController;
use App\controllers\AcademicCategory;
use App\controllers\SectionController;
use App\controllers\SettingController;
use App\Controllers\StudentController;
use App\Controllers\AcademicController;
use App\Controllers\DashboardController;
use App\Controllers\AcademicYearController;
use App\controllers\AcademicCategoryController;
use App\controllers\StrandController;

// LOGIN ROUTE
$router->get('/login', [AuthController::class, 'showLogin']);
$router->post('/login', [AuthController::class, 'login']);
$router->get('/logout', [AuthController::class, 'logout']);

// DASHBOARD ROUTE
$router->get('/dashboard', [DashboardController::class, 'index']);

// USER ROUTE
$router->get('/user', [UserController::class, 'index']);

// STUDENT ROUTES
$router->get('/students', [StudentController::class, 'index']);
$router->get('/students/create', [StudentController::class, 'create']);
$router->post('/students/store', [StudentController::class, 'store']);
$router->get('/students/edit/{id}', [StudentController::class, 'edit']);
$router->post('/students/update/{id}', [StudentController::class, 'update']);
$router->get('/students/delete/{id}', [StudentController::class, 'delete']); // Show confirmation page

// ACADEMIC ROUTES
$router->get('/academic', [AcademicController::class, 'index']);

// GRADE ROUTES
$router->get('/grade', [GradeController::class, 'index']);
$router->get('/grade/create', [GradeController::class, 'create']);
$router->post('/grade/store', [GradeController::class, 'store']);
$router->get('/grade/edit/{id}', [GradeController::class, 'edit']);
$router->post('/grade/update', [GradeController::class, 'update']);
$router->get('/grade/delete/{id}', [GradeController::class, 'delete']);


// SECTION ROUTES
$router->get('/section', [SectionController::class, 'index']);
$router->get('/section/create', [SectionController::class, 'create']); // Show create form
$router->post('/section/store', [SectionController::class, 'store']);  // Store new section
$router->get('/section/edit/{id}', [SectionController::class, 'edit']); // Show edit form
$router->post('/section/update', [SectionController::class, 'update']); // Update section
$router->get('/section/delete/{id}', [SectionController::class, 'delete']);

// TRACK ROUTES
$router->get('/tracks', [TrackController::class, 'index']);
$router->post('/tracks/store', [TrackController::class, 'store']);
$router->post('/tracks/update/{id}', [TrackController::class, 'update']);

// STRAND ROUTES
$router->get('/strand', [StrandController::class, 'index']);
$router->post('/strand/store', [StrandController::class, 'store']);
$router->post('/strand/update', [StrandController::class, 'update']);




$router->get('/track_strand', [AcademicController::class, 'trackStrand']);
$router->get('/subjects', [AcademicController::class, 'subjects']);
$router->get('/rfid_numbers', [AcademicController::class, 'rfidNumbers']);

// ACADEMIC YEAR ROUTES
$router->get('/academic_years', [AcademicYearController::class, 'index']);
$router->get('/academic_years/create', [AcademicYearController::class, 'create']);
$router->post('/academic_years/store', [AcademicYearController::class, 'store']);
$router->get('/academic_years/edit/{id}', [AcademicYearController::class, 'edit']);
$router->post('/academic_years/update', [AcademicYearController::class, 'update']);
$router->get('/academic_years/delete/{id}', [AcademicYearController::class, 'delete']);

// SETTINGS ROUTES
$router->get('/settings', [SettingController::class, 'index']);

// ACADEMIC CATEGORY
$router->get('/academic_category', [AcademicCategoryController::class, 'index']);
$router->get('/academic_category/edit/{id}', [AcademicCategoryController::class, 'edit']);
$router->get('/academic_category/create', [AcademicCategoryController::class, 'create']);
$router->post('/academic_category/store', [AcademicCategoryController::class, 'store']);
$router->post('/academic_category/update', [AcademicCategoryController::class, 'update']);
$router->get('/academic_category/delete/{id}', [AcademicCategoryController::class, 'delete']);


