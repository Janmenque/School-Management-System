<?php

namespace App\Http\Controllers\api\v2\Lesson;

use App\SmStaff;
use App\SmStudent;
use App\SmWeekend;
use Carbon\Carbon;
use App\SmClassRoom;
use App\SmClassTime;
use App\SmAcademicYear;
use App\SmAssignSubject;
use Carbon\CarbonPeriod;
use App\SmGeneralSettings;
use App\Scopes\SchoolScope;
use Illuminate\Http\Request;
use App\Models\StudentRecord;
use App\SmClassRoutineUpdate;
use App\Scopes\GlobalAcademicScope;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Lesson\Entities\SmLesson;
use App\Scopes\StatusAcademicSchoolScope;
use Modules\Lesson\Entities\LessonPlanner;
use App\Http\Resources\v2\LessonPlanResource;
use App\Http\Resources\v2\LessonPlanDetailsResource;

class LessonController extends Controller
{
    public function index(Request $request)
    {
        $student_id = $request->student_id;
        $record_id = $request->record_id;
        $next_date = $request->next_date;

        $student_detail = SmStudent::withOutGlobalScope(SchoolScope::class)->where('id', $student_id)->first(['id', 'school_id']);

        $gs = SmGeneralSettings::where('school_id', $student_detail->school_id)->first('week_start_id');

        $week_end = SmWeekend::withOutGlobalScope(SchoolScope::class)->where('school_id', $student_detail->school_id)->where('id', $gs->week_start_id)->value('name');

        $start_day = WEEK_DAYS_BY_NAME[$week_end ?? 'Saturday'];

        $end_day = $start_day == 0 ? 6 : $start_day - 1;

        if ($next_date) {
            $date = Carbon::parse($next_date);
            if ($date->isPast()) {
                $end_date = Carbon::parse($next_date)->subDays(1);
                $start_date = Carbon::parse($end_date)->subDays(6);
                $data['this_week'] = $week_number = $end_date->weekOfYear;
                $period = CarbonPeriod::create($start_date, $end_date);
            } elseif ($date->isFuture()) {
                $start_date = Carbon::parse($next_date)->addDay(1);
                $date = Carbon::parse($next_date)->addDay(1);
                $end_date = Carbon::parse($start_date)->addDay(7);
                $data['this_week'] = $week_number = $end_date->weekOfYear;
                $period = CarbonPeriod::create($start_date, $end_date);
            } else {
                $data['this_week'] = $weekNumber = date("W");
                $period = CarbonPeriod::create(Carbon::now()->startOfWeek($start_day)->format('Y-m-d'), Carbon::now()->endOfWeek($end_day)->format('Y-m-d'));
            }
        } else {
            $data['this_week'] = $weekNumber = date("W");
            $period = CarbonPeriod::create(Carbon::now()->startOfWeek($start_day)->format('Y-m-d'), Carbon::now()->endOfWeek($end_day)->format('Y-m-d'));
        }

        $dates = [];
        foreach ($period as $date) {
            $dates[] = $date->format('Y-m-d');
        }
        $student_record = StudentRecord::where('school_id', $student_detail->school_id)->findOrFail($record_id);

        $data['weeks'] = SmWeekend::withOutGlobalScope(SchoolScope::class)
            ->with(['classRoutine' => function ($q) use ($student_record) {
                $q->withoutGlobalScope(StatusAcademicSchoolScope::class)
                    ->where('class_id', $student_record->class_id)
                    ->where('section_id', $student_record->section_id)
                    ->where('academic_id', SmAcademicYear::SINGLE_SCHOOL_API_ACADEMIC_YEAR())
                    ->where('school_id', auth()->user()->school_id);
            }])
            ->orderBy('order', 'ASC')
            ->where('active_status', 1)
            ->where('school_id',  $student_detail->school_id)
            ->get()->map(function ($value, $index) use ($period) {
                $dates = [];
                foreach ($period as $date) {
                    $dates[] = $date->format('Y-m-d');
                }
                return [
                    'id' => (int)$value->id,
                    'name' => (string)$value->name,
                    'isWeekend' => (int)$value->is_weekend,
                    'date' => (string)$dates[$index],
                    'classRoutine' => LessonPlanResource::collection($value->classRoutine)
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
                'message' => 'Lesson plan list'
            ];
        }
        return response()->json($response);
    }


    public function ViewlessonPlannerLesson(Request $request)
    {
        $lessonPlanDetail = LessonPlanner::withoutGlobalScope(StatusAcademicSchoolScope::class)
            ->with(['topics' => function ($q) {
                $q->where('school_id', auth()->user()->school_id);
            }, 'subject' => function ($q) {
                $q->withoutGlobalScopes([StatusAcademicSchoolScope::class, GlobalAcademicScope::class])->where('school_id', auth()->user()->school_id);
            }, 'topicName' => function ($q) {
                $q->withoutGlobalScope(StatusAcademicSchoolScope::class)->where('school_id', auth()->user()->school_id);
            }, 'class' => function ($q) {
                $q->withoutGlobalScope(StatusAcademicSchoolScope::class)->where('school_id', auth()->user()->school_id);
            }, 'lessonName' => function ($q) {
                $q->withoutGlobalScope(StatusAcademicSchoolScope::class)->where('school_id', auth()->user()->school_id);
            }])
            ->where('school_id', auth()->user()->school_id)
            ->find($request->lesson_plan_id);

        $lessonPlanDetail = new LessonPlanDetailsResource($lessonPlanDetail);

        if (!$lessonPlanDetail) {
            $response = [
                'success' => false,
                'data'    => null,
                'message' => 'Operation failed'
            ];
        } else {
            $response = [
                'success' => true,
                'data'    => $lessonPlanDetail,
                'message' => 'Lesson plan detail'
            ];
        }
        return response()->json($response);
    }
}
