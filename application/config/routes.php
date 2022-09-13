<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['postuser']='auth/login';
$route['logout']='dashboard/logout';
$route['dashboard']='dashboard/index';
$route['dashboard/students']='dashboard/students';
$route['dashboard/lecturers']='dashboard/teachers';
$route['dashboard/lecturers/edit/(:num)']='dashboard/editteachers/$1';
$route['dashboard/students/edit/(:num)']='dashboard/editstudents/$1';
$route['dashboard/rooms']='dashboard/rooms';
$route['dashboard/subjects']='dashboard/subjects';
$route['dashboard/students/new']='dashboard/newstudents';
$route['dashboard/lecturers/new']='dashboard/newlecturer';
$route['dashboard/exam_timetables']='dashboard/exams';
$route['addroom']='dashboard/addroom';
$route['addsubject']='dashboard/addsubject';
$route['addtable']='dashboard/addtable';
$route['uploadstudents']='dashboard/uploadstudents';
$route['uploadsubjects']='dashboard/uploadsubjects';
$route['uploadteachers']='dashboard/uploadteachers';
$route['deletestudent/(:num)'] = 'dashboard/delete_student/$1';
$route['deleteteacher/(:num)'] = 'dashboard/delete_teacher/$1';
$route['deletexam/(:num)'] = 'dashboard/delete_exam/$1';
$route['deletesubject/(:num)'] = 'dashboard/delete_subject/$1';
$route['deleteroom/(:num)'] = 'dashboard/delete_room/$1';
$route['account']='student/index';
$route['register']='student/register';
$route['postregister']='auth/postregister';
$route['activate/(:num)']='auth/activate/$1';
$route['account/lecturers']='student/lecturers';
$route['account/timetable']='student/exams';
$route['home']='lecturer/index';
$route['updateacher']='dashboard/updateacher';
$route['updatestudent']='dashboard/updatestudent';
$route['addstudent']='dashboard/addstudent';
$route['addlecturer']='dashboard/addteacher';
$route['getsubjects']='dashboard/getsubjects';