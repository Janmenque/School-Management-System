<?php

namespace App\Http\Controllers\api\v2\Parent;

use App\SmStudent;
use App\Scopes\SchoolScope;
use Illuminate\Http\Request;
use App\Scopes\GlobalAcademicScope;
use App\Http\Controllers\Controller;
use App\Scopes\StatusAcademicSchoolScope;

class ParentController extends Controller
{
    public function childrens(Request $request)
    {
        $data = SmStudent::withoutGlobalScope(SchoolScope::class)->with(['class' => function ($q) {
            $q->withoutGlobalScopes([StatusAcademicSchoolScope::class, GlobalAcademicScope::class])->where('school_id', auth()->user()->school_id);
        }, 'user', 'section' => function ($q) {
            $q->withoutGlobalScope(StatusAcademicSchoolScope::class)->where('school_id', auth()->user()->school_id);
        }])
            ->where('school_id', auth()->user()->school_id)
            ->where('active_status', 1)
            ->where('parent_id', $request->parent_id)
            ->get()
            ->map(function ($value) {
                return [
                    'student_id'    => (int)$value->id,
                    'full_name'     => (string)$value->full_name,
                    'class'         => (string)@$value->class->class_name,
                    'section'       => (string)@$value->section->section_name,
                    'image_url' => @$value->user->avatar_url ? (string)asset(@$value->user->avatar_url) : (string)null
                ];
            });

        if (!$data) {
            $response = [
                'success' => false,
                'data'    => null,
                'message' => 'Operation failed'
            ];
        } else {
            $response = [
                'success' => true,
                'data'    => $data,
                'message' => 'Children list'
            ];
        }
        return response()->json($response);
    }
}
