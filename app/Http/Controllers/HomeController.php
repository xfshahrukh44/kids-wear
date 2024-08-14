<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\inquiry;
use App\schedule;
use App\newsletter;
use App\post;
use App\banner;
use App\imagetable;
use DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Mail;
use View;
use Session;
use App\Http\Helpers\UserSystemInfoHelper;
use App\Http\Traits\HelperTrait;
use Auth;
use App\Profile;
use App\Page;
use Image;

class HomeController extends Controller
{
    use HelperTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // use Helper;

    public function __construct()
    {
        //$this->middleware('auth');

        $logo = imagetable::
            select('img_path')
            ->where('table_name', '=', 'logo')
            ->first();

        $favicon = imagetable::
            select('img_path')
            ->where('table_name', '=', 'favicon')
            ->first();

        View()->share('logo', $logo);
        View()->share('favicon', $favicon);

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = Page::where('page_name', 'Home')->first();

        return view('welcome', compact('page'));
    }

    public function categories()
    {
        return view('front.categories');
    }

    public function shop(Request $request)
    {
        $products = Product::
            when(request()->has('search') && request()->get('search') != "", function ($q) {
                return $q->where('product_title', 'LIKE', '%' . request()->get('search') . '%')
                    ->orWhere('description', 'LIKE', '%' . request()->get('search') . '%');
            })
            ->when(request()->has('category_id'), function ($q) {
                return $q->where('category', request()->get('category_id'));
            })
            ->paginate(18);

        return view('front.shop', compact('products'));
    }

    public function productDetail(Request $request, $id)
    {
        $product = Product::find($id);
        $featured_products = Product::take(3)->get();

        return view('front.product-detail', compact('product', 'featured_products'));
    }

    public function blog()
    {
        $page = DB::table('pages')->where('id', 1)->first();

        $blog = DB::table('blogs')->get();

        return view('blog', compact('page', 'blog'));
    }

    public function blog_detail($id = '')
    {
        $page = DB::table('pages')->where('id', 1)->first();

        // dd($id);
        $blog_detail = DB::table('blogs')->where('id', $id)->first();

        return view('blog_detail', compact('page', 'blog_detail'));
    }

    public function careerSubmit(Request $request)
    {
        inquiry::create($request->all());

        // Send the email
        $data = [
            'fname' => $request->fname,
            'email' => $request->email,
            'notes' => $request->notes,
        ];

        try {
            Mail::send([], [], function ($message) use ($data) {
                $message->to($data['email'])
                    ->subject('New Inquiry Submission')
                    ->setBody(
                        '<p>Name: ' . $data['fname'] . '</p>' .
                        '<p>Email: ' . $data['email'] . '</p>' .
                        '<p>Notes: ' . $data['notes'] . '</p>',
                        'text/html'
                    );
            });
        } catch (\Exception $e) {
            Log::error('MAIL FAILED: ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Thank you for contacting us. We will get back to you asap');
        //        return response()->json(['message'=>'Thank you for contacting us. We will get back to you asap', 'status' => true]);
//        return back();
    }

    public function newsletterSubmit(Request $request)
    {

        $is_email = newsletter::where('newsletter_email', $request->newsletter_email)->count();
        if ($is_email == 0) {
            $inquiry = new newsletter;
            $inquiry->newsletter_email = $request->newsletter_email;
            $inquiry->save();
            return response()->json(['message' => 'Thank you for contacting us. We will get back to you asap', 'status' => true]);

        } else {
            return response()->json(['message' => 'Email already exists', 'status' => false]);
        }

    }

    public function updateContent(Request $request)
    {
        $id = $request->input('id');
        $keyword = $request->input('keyword');
        $htmlContent = $request->input('htmlContent');
        if ($keyword == 'page') {
            $update = DB::table('pages')
                ->where('id', $id)
                ->update(array('content' => $htmlContent));

            if ($update) {
                return response()->json(['message' => 'Content Updated Successfully', 'status' => true]);
            } else {
                return response()->json(['message' => 'Error Occurred', 'status' => false]);
            }
        } else if ($keyword == 'section') {
            $update = DB::table('section')
                ->where('id', $id)
                ->update(array('value' => $htmlContent));
            if ($update) {
                return response()->json(['message' => 'Content Updated Successfully', 'status' => true]);
            } else {
                return response()->json(['message' => 'Error Occurred', 'status' => false]);
            }
        }
    }

    public function contact()
    {
        $page = DB::table('pages')->where('id', 1)->first();

        return view('contact', compact('page'));
    }

    public function initiateCloverPayment (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required',
            'number' => 'required',
            'exp_month' => 'required',
            'exp_year' => 'required',
            'cvc' => 'required',
        ]);

        if ($validator->fails()) {
            return json_encode([
                'success' => false,
                'data' => [],
                'message' => 'Payment failed!',
                'errors' => $validator->errors(),
            ]);
        }

        $fedex_shipment_res = create_fedex_shipment([
            'first_name' => $request->first_name,
            'phone' => $request->phone,
            'address_line_1' => $request->address_line_1,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
            'country' => $request->country,
        ]);

        if (!$fedex_shipment_res['status']) {
            return json_encode([
                'success' => false,
                'data' => [],
                'message' => 'Payment failed!',
                'errors' => [$fedex_shipment_res['tracking_number']],
            ]);
        }

        $order_id = create_clover_order();
        if ($order_id) {
            $payment_res = create_clover_payment($order_id, $request->amount, $request->number, $request->exp_month, $request->exp_year, $request->cvc);

            if ($payment_res) {
                return json_encode([
                    'success' => true,
                    'data' => [
                        'tracking_number' => $fedex_shipment_res['tracking_number']
                    ],
                    'message' => 'Payment successful!',
                    'errors' => [],
                ]);
            }
        }

        return json_encode([
            'success' => false,
            'data' => [],
            'message' => "Couldn't create order.",
            'errors' => [],
        ]);
    }

}
