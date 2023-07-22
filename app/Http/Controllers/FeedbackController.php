<?php

namespace App\Http\Controllers;
use App\Models\Feedback;
use Carbon\Carbon;
use Hamcrest\Core\IsNull;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Flash;

use function PHPUnit\Framework\isNull;
use App\Repositories\FeedbackRepository;

class FeedbackController extends Controller
{
    public function __construct(FeedbackRepository $feedbackRepo)
    {
        $this->feedbackRepository = $feedbackRepo;
    }

    /**
     * Display a listing of the Partai.
     */
     public function index(){
        if (Auth::user()->hasRole(['admin-kandidat-free', 'admin-kandidat-premium','relawan-free','relawan-premium'])) {
        $id = Auth::id();
        $terakhir = Feedback::where('users_id',$id)->latest()->first();

        if (is_null($terakhir)) {
            return view('feedbacks.index',[
                'feedbackAbility' => true
            ]);
        }

        $selisih =  Carbon:: now()->diff($terakhir->created_at);

        if ($selisih->d <= 7) {
            $feedbackAbility = false;
        }else{
            $feedbackAbility = true;

            return view('feedbacks.index',[
                'feedbackAbility' => $feedbackAbility
            ]);
        }
    }
        if (Auth::user()->hasRole('super-admin')) {
            $feedbacks = $this->feedbackRepository->paginate(10);
            return view('feedbacks.list')
            ->with('feedbacks', $feedbacks);
        }
        return view('feedbacks.index',[
            'feedbackAbility' => $feedbackAbility
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judulFeedback' => 'required|min:4|max:255',
            'feedback' => 'required||min:4|max:255',
        ]);

        $feedback = Feedback::create([
            'judul_feedback' => $request->judulFeedback,
            'feedback' => $request->feedback,
            'users_id' => Auth::user()->id
        ]);
        return redirect('/feedback');
    }
}
