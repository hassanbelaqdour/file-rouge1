<?php


namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class PaymentController extends Controller
{
    public function checkout(Course $course)
    {
        
        $existingEnrollment = Enrollment::where('user_id', Auth::id())
            ->where('course_id', $course->id)
            ->where('status', 'completed')
            ->first();
            
        if ($existingEnrollment) {
            return redirect()->route('student.courses.show', $course->id)
                ->with('message', 'Vous êtes déjà inscrit à ce cours');
        }
        
        if ($course->type == 'free' || $course->price <= 0) {
            Enrollment::create([
                'user_id' => Auth::id(),
                'course_id' => $course->id,
                'status' => 'completed'
            ]);
            
            return redirect()->route('student.courses.show', $course->id)
                ->with('message', 'Vous êtes maintenant inscrit à ce cours gratuit');
        }
        
        Stripe::setApiKey(env('STRIPE_SECRET'));
        
        
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => $course->title,
                    ],
                    'unit_amount' => $course->price * 100, 
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('payment.success', ['course' => $course->id, 'session_id' => '{CHECKOUT_SESSION_ID}']),
            'cancel_url' => route('payment.cancel', ['course' => $course->id]),
        ]);
        
        Enrollment::create([
            'user_id' => Auth::id(),
            'course_id' => $course->id,
            'payment_id' => $session->id,
            'status' => 'pending'
        ]);
        
        return redirect($session->url);
    }


    public function success(Request $request, Course $course)
    {
        $sessionId = $request->session_id;
        
        
        $enrollment = Enrollment::where('payment_id', $sessionId)->first();
        
        if ($enrollment) {
            $enrollment->update(['status' => 'completed']);
        }
        
        return redirect()->route('student.courses.show', $course->id)
            ->with('message', 'Paiement réussi! Vous avez maintenant accès au cours.');
    }

    public function cancel(Course $course)
    {
        return redirect()->route('student.courses.index')
            ->with('message', 'Le paiement a été annulé.');
    }
    
}