<?php

namespace App\Http\Controllers\Api\V1;

use App\Course;
use App\TeacherAccess;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TeacherAccessController extends Controller
{
    public function getMyAvailableCourses($user_id)
    {
        $courses = Course::join('teacher_accesses', 'courses.id', '=', 'teacher_accesses.course_id')
            ->where('teacher_accesses.user_id', $user_id)
            ->get();
        return $courses;
    }

    public function getMyNotAvailableCourses($user_id)
    {
        $teacherAccesses = TeacherAccess::where('user_id', $user_id)->get();
        $ids = [];
        foreach ($teacherAccesses as $teacherAccess){
            $ids[] = $teacherAccess->course_id;
        }
        $courses = Course::whereNotIn('id', $ids)->get();
        return $courses;
    }
}
