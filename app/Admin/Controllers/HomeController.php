<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\DogWalkReport;
use App\Models\Appointments;
use App\Models\Dogs;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\HtmlString;
use Mail;
use OpenAdmin\Admin\Admin;
use OpenAdmin\Admin\Controllers\Dashboard;
use OpenAdmin\Admin\Layout\Column;
use OpenAdmin\Admin\Layout\Content;
use OpenAdmin\Admin\Layout\Row;
use OpenAdmin\Admin\Show;
use OpenAdmin\Admin\Widgets\Table;
use Redirect;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->css_file(Admin::asset("open-admin/css/pages/dashboard.css"))
            ->title('PawsInMotion')
            ->description('Welcome to PawsInMotion Admin')
            ->row(function (Row $row) {

                
                $row->column(12, function (Column $column) {

                    // Append the rules and policies content
                    $rulesAndPolicies = view('admin.rules_and_policies')->render();
                    $column->append($rulesAndPolicies);
                });

                // $row->column(4, function (Column $column) {
                //     $column->append(Dashboard::extensions());
                // });

                // $row->column(4, function (Column $column) {
                //     $column->append(Dashboard::dependencies());
                // });
            });
    }
    public function appointments(Content $content)
    {
        $content->header('All Appointments');
        $caretakers = DB::table('admin_users AS a')
            ->join('admin_role_permissions AS b', 'a.id', '=', 'b.permission_id')
            ->join('admin_roles AS c', 'b.role_id', '=', 'c.id')
            ->where('c.slug', '=', 'caretaker')
            ->select('a.id', 'a.name')
            ->get()->toArray();
        $isCarer = collect($caretakers)->contains('id', Auth::id());
        if ($isCarer) {
            $headers = ['Sl No', 'Dog Name', 'Date & Time', 'Pickup address', 'Postcode', 'Is Complete?', 'Send Mail'];
            $appointments = Appointments::where('caretaker_id', Auth::id())->with('dogs')->get()->toArray();
        } else {
            $headers = ['Sl No', 'Dog Name', 'Date & Time', 'Pickup address', 'Postcode', 'Status', 'Assign Caretaker'];
            $appointments = Appointments::with('dogs')->get()->toArray();
        }

        $rows = [];
        $count = 1;
        foreach ($appointments as $key => $appointment) {
            $appointment_id = $appointment['id'];
            if (!$isCarer) {
                $dropdownHtml = '<select class="caretaker_select"> <option value=""> ---Select Caretaker ---</option>';
                foreach ($caretakers as $caretaker) {
                    $selected = $appointment['caretaker_id'] == $caretaker->id ? 'selected' : '';
                    $dropdownHtml .= '<option value="' . $caretaker->id . '" ' . $selected . '>' . $caretaker->name . '</option>';
                }
                $dropdownHtml .= '</select>';
            }
            $rows[$key] = [
                $count,
                $appointment['dogs']['name'] . '<a href="' . route('admin.viewdogs', $appointment['dogs']['id']) . '"><i class="icon-eye"></i></a>',
                $appointment['datetime'],
                $appointment['pickup_address'],
                $appointment['postcode'],
                ($isCarer) ? '<input type="hidden" id="appointment_id_check" value="' . $appointment_id . '"  class="appointment">
<input type="checkbox" class="status_checkbox" name="status" value="" ' . ($appointment['status'] === 'completed' ? 'checked' : '') . ' >' : $appointment['status'],
                '<input type="hidden" id="appointment_id" value="' . $appointment_id . '">' . ($isCarer ?
                    '<a class="btn-primary" href="' . route('admin.sendmail', ['id' => $appointment['dogs']['id'], 'appointment_id' => $appointment_id]) . '">Send Mail</i></a>' : $dropdownHtml),

            ];

            $count++;
        }

        $table = new Table($headers, $rows);
        return $content->view('admin.appointments', ['data' => $table->render()]);

    }
    /**
     * Make a show builder.
     *
     * @param mixed   $id
     * @return Show
     */
    public function viewdogs($id)
    {
        $dog = Dogs::findOrFail($id);

        // Get the full URL of the image
        $imageUrl = asset('images/' . $dog->id . '/' . $dog->image);

        $show = new Show($dog);

        $show->field('', __(''))->as(function () use ($imageUrl) {
            return new HtmlString("<img src='$imageUrl' style='max-width: 200px; max-height: 200px;' />");
        });
        $show->field('name', __('Name :'));
        $show->field('height', __('Height :'));
        $show->field('weight', __('Weight :'));
        $show->field('age', __('Age :'));
        $show->field('notes', __('Description :'));

        return $show;

    }
    public function assign(Request $request)
    {
        $appointmentId = $request->input('appointment_id');
        $caretakerId = $request->input('caretaker_id');
        // Update appointment with caretaker ID
        $appointment = Appointments::findOrFail($appointmentId);
        $appointment->caretaker_id = $caretakerId != null ? $caretakerId : null;
        $appointment->status = $caretakerId != null ? 'assigned' : 'created';
        $appointment->save();

        return response()->json(['success' => true]);
    }
    public function sendmail(Content $content, $id, $appointment_id)
    {
        $dogId = $id;
        $appointment_id = $appointment_id;
        $content->header('View Appointment Details');
        $content->description('View Appointment Details and Send email to dog owners');
        $appointment = Appointments::findOrFail($appointment_id);
        $ownerDetails = User::findOrFail($appointment['user_id']);
        $dog = Dogs::findOrFail($dogId);

        // Get the full URL of the image
        $imageUrl = asset('images/' . $dog->id . '/' . $dog->image);

        $show = new Show($dog);

        $show->field('', __(''))->as(function () use ($imageUrl) {
            return new HtmlString("<img src='$imageUrl' style='max-width: 200px; max-height: 200px;' />");
        });
        $show->field('name', __('Name :'));
        $show->field('height', __('Height :'));
        $show->field('weight', __('Weight :'));
        $show->field('age', __('Age :'));
        $show->field('notes', __('Description :'));

        $showOwner = new Show($ownerDetails);

        $showOwner->field(' ', __('Owner Details'));
        $showOwner->field('name', __('First Name :'));
        $showOwner->field('lastname', __('Last Name :'));
        $showOwner->field('email', __('Email :'));
        $showOwner->field('contact', __('Contact Number:'));
        return view('admin.view_dog', compact('show', 'showOwner', 'dogId', 'appointment_id'));
    }

    public function completestatus(Request $request)
    {
        $appointmentId = $request->input('appointment_id');
        $status = $request->input('status');
        $appointment = Appointments::findOrFail($appointmentId);
        $appointment->status = $status;
        $appointment->save();

        return response()->json(['success' => true]);
    }
    public function sentownermail(Request $request)
    {

        // Validate form data including file upload
        $validatedData = $request->validate([
            'duration' => 'required|string',
            'route' => 'required|string',
            'behavior' => 'nullable|string',
            'interaction' => 'nullable|string',
            'toilet_breaks' => 'nullable|string',
            'environmental_conditions' => 'nullable|string',
            'health_observations' => 'nullable|string',
            'hydration' => 'nullable|string',
            'general_observations' => 'nullable|string',
            'media' => 'nullable|file|mimes:jpeg,png,mp4|max:2048', // Adjust max file size as needed
        ]);
        // Fetch additional data if needed
        $appointment_id = $request->input('appointment_id');
        $dogId = $request->input('dog_id');
        $ownerId = Appointments::findOrFail($appointment_id)->user_id;
        $ownerDetails = User::findOrFail($ownerId);
        $dog = Dogs::findOrFail($dogId);
        if ($request->hasFile('media')) {
            $file = $request->file('media');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('media', $fileName); // Store file in the "media" directory
            $fullFilePath = storage_path('app/' . $filePath); // Full path to the stored file
        } else {
            $fileName = null;
            $fullFilePath = null;
        }
        // Compose email content
        $emailContent = [
            'dog_id' => $dogId,
            'dog_name' => $dog->name,
            'duration' => $validatedData['duration'],
            'route' => $validatedData['route'],
            'behavior' => $validatedData['behavior'] ?? '',
            'interaction' => $validatedData['interaction'] ?? '',
            'toilet_breaks' => $validatedData['toilet_breaks'] ?? '',
            'environmental_conditions' => $validatedData['environmental_conditions'] ?? '',
            'health_observations' => $validatedData['health_observations'] ?? '',
            'hydration' => $validatedData['hydration'] ?? '',
            'general_observations' => $validatedData['general_observations'] ?? '',
            'mediaPath' => $fileName, // Pass file name to email content
            'fullFilePath' => $fullFilePath, // Pass full file path for embedding
        ];
        // Send email
        $mailsent = Mail::to($ownerDetails->email)->send(new DogWalkReport($emailContent, $fullFilePath));
        if ($mailsent) {
            return Redirect::to('http://127.0.0.1:8000/admin/appointments');
        }
    }
}
