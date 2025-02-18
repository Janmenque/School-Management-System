<?php

namespace App\Http\Controllers\api\v2\Admin;

use App\SmNoticeBoard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Scopes\StatusAcademicSchoolScope;

class StaffNoticeController extends Controller
{
    public function noticeList()
    {
        $allNotices = SmNoticeBoard::withoutGlobalScope(StatusAcademicSchoolScope::class)
            ->where('school_id', auth()->user()->school_id)
            ->select('id', 'notice_title', 'notice_date', 'notice_message')->get();
        if (!$allNotices) {
            $response = [
                'success' => false,
                'data'    => null,
                'message' => 'Operation failed'
            ];
        } else {
            $response = [
                'success' => true,
                'data'    => $allNotices,
                'message' => 'Notice list successful'
            ];
        }
        return response()->json($response);
    }
}
