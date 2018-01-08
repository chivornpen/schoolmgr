<?php
    use Illuminate\Support\Facades\Auth;
    Route::get('/','DefaultController@index');
    Auth::routes();
    
    Route::group(['middleware'=>'checklog','auth','web'],function (){
       Route::get('/admin/home','DefaultController@AdminPanel');
        //creat module and put it in session
        Route::get('/admin',function(){
            $po= Auth::user()->position;
            $test=[];
            foreach ($po->modules as $mo) {
                 $test[]=$mo->nav;
            }
            $collection1 = collect($test);
            //$collection1 = $collection->unique('module');
            Session::put('collection1',$collection1);
            return redirect('/admin/home');
        });
        Route::get('/role/view','RoleController@index');
        Route::post('/admin/create/role','RoleController@createRole');
        Route::get('/admin/delete/role/{id}','RoleController@deleteRole');
        Route::get('/admin/update/role/edit/{id}','RoleController@edit');
        Route::get('/admin/role/update/{id}','RoleController@updateRole');
        Route::patch('/admin/role/update/{id}','RoleController@updateRole');

        //Position Route
        Route::get('/admin/position/create','PositionController@createPosition');
        Route::post('/admin/position/store','PositionController@store');
        Route::get('/admin/position/delete/{id}','PositionController@deletePosition');

        Route::get('/admin/position/edit/{id}','PositionController@edit');
        Route::patch('/admin/position/update/{id}','PositionController@updatePosition');

        //user
        Route::get('/admin/user','UserController@create');
        Route::post('/admin/user/stored','UserController@stored');

        Route::get('/admin/user/edit/{id}','UserController@edit');
        Route::patch('/admin/user/update/{id}','UserController@update');
        Route::get('/admin/user/view/{id}','UserController@viewUser');
        Route::get('/admin/user/delete/{id}','UserController@delete');
        Route::get('/admin/get/user','UserController@getUserList');
        Route::get('/admin/reset/password/{id}','UserController@resetPassword');
        Route::patch('/admin/reset/user/password/{id}','UserController@resetPasswordSuccess');

        //posting (create category and article)

        Route::resource('/category','CategoryController');
        
        
        //Year Route
        Route::get('/admin/year/create','YearController@create');
        Route::post('/admin/year/stored','YearController@stored');
        Route::get('/admin/year/delete/{id}','YearController@deleteYear');

        Route::get('/admin/year/edit/{id}','YearController@edit');
        Route::patch('/admin/year/update/{id}','YearController@updateYear');

        //Turn Route
        Route::get('/admin/session/create','TurnController@create');
        Route::post('/admin/session/stored','TurnController@stored');
        Route::get('/admin/session/delete/{id}','TurnController@deleteTurn');

        Route::get('/admin/session/edit/{id}','TurnController@edit');
        Route::patch('/admin/session/update/{id}','TurnController@updateTurn');

        //Generation Route
        Route::get('/admin/generation/create','GenerationController@create');
        Route::post('/admin/generation/stored','GenerationController@stored');
        Route::get('/admin/generation/delete/{id}','GenerationController@deleteGeneration');

        Route::get('/admin/generation/edit/{id}','GenerationController@edit');
        Route::patch('/admin/generation/{id}/update','GenerationController@updateG');

        //Classroom Route
        Route::get('/admin/classroom/create','ClassroomController@create');
        Route::post('/admin/classroom/stored','ClassroomController@stored');
        Route::get('/admin/classroom/delete/{id}','ClassroomController@deleteClassroom');

        Route::get('/admin/classroom/edit/{id}','ClassroomController@edit');
        Route::patch('/admin/classroom/update/{id}','ClassroomController@updateClassroom');

        //Student Route
        Route::get('/admin/student/create','StudentController@create');
        Route::post('/admin/student/store','StudentController@stored');

        Route::get('/admin/student/edit/{id}','StudentController@edit');
        Route::patch('/admin/student/update/{id}','StudentController@update');
        Route::get('/admin/get/student','StudentController@getTableStudent');
        Route::get('/admin/student/delete/{id}','StudentController@deleteStudent');

        Route::get('/admin/student/view/{id}','StudentController@view');

        //Subject Route
        Route::get('/admin/subject/create','SubjectController@create');
        Route::post('/admin/subject/stored','SubjectController@stored');

        Route::get('/admin/subject/edit/{id}','SubjectController@edit');
        Route::patch('/admin/subject/update/{id}','SubjectController@updateSubject');
        Route::get('/admin/subject/delete/{id}','SubjectController@delete');

        //teacher Route
        Route::get('/admin/teacher/create','TeacherController@create');
        Route::post('/admin/teacher/stored','TeacherController@stored');

        Route::get('/admin/teacher/view/{id}','TeacherController@view');
        Route::get('/admin/teacher/edit/{id}','TeacherController@edit');
        Route::patch('/admin/teacher/update/{id}','TeacherController@updateTeacher');
        Route::get('/admin/teacher/delete/{id}','TeacherController@deleteTeacher');


    });
