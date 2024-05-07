<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Appointments;
use App\Models\Dogs;
use DB;
use Illuminate\Support\Facades\Storage;
use OpenAdmin\Admin\Admin;
use OpenAdmin\Admin\Controllers\Dashboard;
use OpenAdmin\Admin\Layout\Column;
use OpenAdmin\Admin\Layout\Content;
use OpenAdmin\Admin\Layout\Row;
use OpenAdmin\Admin\Show;
use OpenAdmin\Admin\Widgets\Table;
use Illuminate\Support\HtmlString;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->css_file(Admin::asset("open-admin/css/pages/dashboard.css"))
            ->title('Dashboard')
            ->description('Description...')
            ->row(Dashboard::title())
            ->row(function (Row $row) {

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::environment());
                });

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::extensions());
                });

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::dependencies());
                });
            });
    }
    public function appointments(Content $content)
    {
        $content->header('Assign Appointments');
        $headers = ['Sl No', 'Dog Name', 'Date & Time', 'Pickup address', 'Postcode', 'Status', 'Assign Caretaker'];
        $appointments = Appointments::with('dogs')->get()->toArray();

        $rows = [];
        $count = 1;
        $caretakers = DB::table('admin_users AS a')
            ->join('admin_role_permissions AS b', 'a.id', '=', 'b.permission_id')
            ->join('admin_roles AS c', 'b.role_id', '=', 'c.id')
            ->where('c.slug', '=', 'caretaker')
            ->select('a.id', 'a.name')
            ->get()->toArray();
        $dropdownHtml = '<select> <option> ---Select Caretaker ---</option>';
        if ($caretakers) {
            foreach ($caretakers as $caretaker) {
                $dropdownHtml .= '<option value="' . $caretaker->id . '">' . $caretaker->name . '</option>';
            }
        }
        $dropdownHtml .= '</select>';

        foreach ($appointments as $key => $appointment) {
            $dropdownHtml .= '<input type="hidden" class="appointment_id" value="'.$appointment['id'].'" >';
            $rows[$key] = [
                $count, $appointment['dogs']['name'] . '<a href="' . route('admin.viewdogs', $appointment['dogs']['id']) . '"><i class="icon-eye"></i></a>',
                $appointment['datetime'], $appointment['pickup_address'],
                $appointment['postcode'], $appointment['status'], $dropdownHtml,
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
        $imageUrl = asset('images/'.$dog->id.'/'. $dog->image);

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
}
