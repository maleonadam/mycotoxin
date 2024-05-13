<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Inquiry;
use App\Models\Feedback;
use App\Mail\ContactForm;
use Mail;
use Session;

class WebsiteController extends Controller
{
    // landing page
    public function index()
    {
        return view('index');
    }

    // about us page
    public function aboutus()
    {
        return view('about');
    }

    // services page
    public function services()
    {
        return view('services');
    }

    // gallery page
    public function gallery()
    {
        return view('gallery');
    }

    // contact us page
    public function contactus()
    {
        return view('contactus');
    }

    // service charter
    public function charter()
    {
        return view('charter');
    }

    // service charter download
    public function service_charter()
    {
        return view('service_charter');
    }

    // accreditation certificate download
    public function credit_cert()
    {
        return view('accreditation_certificate');
    }

    // all products page
    public function allProducts()
    {
        $products = Product::orderBy('id', 'ASC')->get();
        return view('manage.allproducts', compact('products'));
    }

    // inquiries submit
    public function submitInquiry(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required'
        ]);

        // save to database
        $inquiry = new Inquiry();
        $inquiry->name = $request->input('name');
        $inquiry->email = $request->input('email');
        $inquiry->message = $request->input('message');
        $inquiry->save();

        // send mail
        // Mail::send(new ContactForm($inquiry));

        Session::flash('success-message', 'Thanks for contacting us...');
        return redirect()->route('welcome');
    }

    // show feedback
    public function showFeedback()
    {
        $feedbacks = Feedback::paginate(20);

        return view('manage.feedback.index', compact('feedbacks'));
    }

    public function showClientForm($id)
    {
        $feedback = Feedback::findOrFail($id);
        return view('manage.feedback.show', compact('feedback'));
    }

    // feedback page
    public function feedback()
    {
        return view('feedback');
    }

    // submit feedback
    public function submitFeedback(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'date' => 'required',
            'service_offered' => 'required',
            'satisfaction_level' => 'required',
            'services_again' => 'required',
            'value_for_fee' => 'required',
            'prices_quotes' => 'required',
            'employee_response' => 'required',
            'samples_easy' => 'required',
            'turnaround_time' => 'required',
            'delivery_my_needs' => 'required',
            'reports_easy' => 'required',
            'payments_easy' => 'required',
            'previous_response' => 'required',
            'help_feedback' => 'required',
            'complaint' => 'required'
        ]);

        $feedback = new Feedback();
        $feedback->name = $request->input('name');
        $feedback->address = $request->input('address');
        $feedback->phone = $request->input('phone');
        $feedback->date = $request->input('date');
        $feedback->service_offered = $request->input('service_offered');

        // satisfaction_level
        if ($request['satisfaction_level'] == 'very_pleased') {
            $feedback->satisfaction_level = 1;
        } elseif ($request['satisfaction_level'] == 'pleased') {
            $feedback->satisfaction_level = 2;
        } elseif ($request['satisfaction_level'] == 'adequate') {
            $feedback->satisfaction_level = 3;
        } elseif ($request['satisfaction_level'] == 'dissatisfied') {
            $feedback->satisfaction_level = 4;
        } elseif ($request['satisfaction_level'] == 'strongly_dissatisfied') {
            $feedback->satisfaction_level = 5;
        }

        // services_again
        if ($request['services_again'] == 'yes') {
            $feedback->services_again = 1;
        } elseif ($request['services_again'] == 'maybe') {
            $feedback->services_again = 2;
        } elseif ($request['services_again'] == 'no') {
            $feedback->services_again = 3;
        }

        // value_for_fee
        if ($request['value_for_fee'] == 'yes') {
            $feedback->value_for_fee = 1;
        } elseif ($request['value_for_fee'] == 'maybe') {
            $feedback->value_for_fee = 2;
        } elseif ($request['value_for_fee'] == 'no') {
            $feedback->value_for_fee = 3;
        }

        // prices_quotes
        if ($request['prices_quotes'] == 'strongly_agree') {
            $feedback->prices_quotes = 1;
        } elseif ($request['prices_quotes'] == 'agree') {
            $feedback->prices_quotes = 2;
        } elseif ($request['prices_quotes'] == 'neutral') {
            $feedback->prices_quotes = 3;
        } elseif ($request['prices_quotes'] == 'disagree') {
            $feedback->prices_quotes = 4;
        } elseif ($request['prices_quotes'] == 'strongly_disagree') {
            $feedback->prices_quotes = 5;
        }

        // employee_response
        if ($request['employee_response'] == 'strongly_agree') {
            $feedback->employee_response = 1;
        } elseif ($request['employee_response'] == 'agree') {
            $feedback->employee_response = 2;
        } elseif ($request['employee_response'] == 'neutral') {
            $feedback->employee_response = 3;
        } elseif ($request['employee_response'] == 'disagree') {
            $feedback->employee_response = 4;
        } elseif ($request['employee_response'] == 'strongly_disagree') {
            $feedback->employee_response = 5;
        }

        // samples_easy
        if ($request['samples_easy'] == 'strongly_agree') {
            $feedback->samples_easy = 1;
        } elseif ($request['samples_easy'] == 'agree') {
            $feedback->samples_easy = 2;
        } elseif ($request['samples_easy'] == 'neutral') {
            $feedback->samples_easy = 3;
        } elseif ($request['samples_easy'] == 'disagree') {
            $feedback->samples_easy = 4;
        } elseif ($request['samples_easy'] == 'strongly_disagree') {
            $feedback->samples_easy = 5;
        }

        // turnaround_time
        if ($request['turnaround_time'] == 'strongly_agree') {
            $feedback->turnaround_time = 1;
        } elseif ($request['turnaround_time'] == 'agree') {
            $feedback->turnaround_time = 2;
        } elseif ($request['turnaround_time'] == 'neutral') {
            $feedback->turnaround_time = 3;
        } elseif ($request['turnaround_time'] == 'disagree') {
            $feedback->turnaround_time = 4;
        } elseif ($request['turnaround_time'] == 'strongly_disagree') {
            $feedback->turnaround_time = 5;
        }

        // delivery_my_needs
        if ($request['delivery_my_needs'] == 'strongly_agree') {
            $feedback->delivery_my_needs = 1;
        } elseif ($request['delivery_my_needs'] == 'agree') {
            $feedback->delivery_my_needs = 2;
        } elseif ($request['delivery_my_needs'] == 'neutral') {
            $feedback->delivery_my_needs = 3;
        } elseif ($request['delivery_my_needs'] == 'disagree') {
            $feedback->delivery_my_needs = 4;
        } elseif ($request['delivery_my_needs'] == 'strongly_disagree') {
            $feedback->delivery_my_needs = 5;
        }

        // reports_easy
        if ($request['reports_easy'] == 'strongly_agree') {
            $feedback->reports_easy = 1;
        } elseif ($request['reports_easy'] == 'agree') {
            $feedback->reports_easy = 2;
        } elseif ($request['reports_easy'] == 'neutral') {
            $feedback->reports_easy = 3;
        } elseif ($request['reports_easy'] == 'disagree') {
            $feedback->reports_easy = 4;
        } elseif ($request['reports_easy'] == 'strongly_disagree') {
            $feedback->reports_easy = 5;
        }

        // payments_easy
        if ($request['payments_easy'] == 'strongly_agree') {
            $feedback->payments_easy = 1;
        } elseif ($request['payments_easy'] == 'agree') {
            $feedback->payments_easy = 2;
        } elseif ($request['payments_easy'] == 'neutral') {
            $feedback->payments_easy = 3;
        } elseif ($request['payments_easy'] == 'disagree') {
            $feedback->payments_easy = 4;
        } elseif ($request['payments_easy'] == 'strongly_disagree') {
            $feedback->payments_easy = 5;
        }

        $feedback->previous_response = $request->input('previous_response');
        $feedback->help_feedback = $request->input('help_feedback');
        $feedback->complaint = $request->input('complaint');

        $feedback->save();

        Session::flash('success-message', 'Feedback recorded...');
        return redirect()->route('feedback');
    }
}
