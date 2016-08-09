<?php
namespace App\Services;

use Auth;
use App\Tour;
use App\Hotel;
use App\Venue;
use App\Vehicle;
use App\Restaurant;
use App\Http\Request;

/**
 * Class AdminService
 * @package App\Services
 */
class AdminService
{

    public function approveBusiness($id, $name)
    {
        if (!Auth::check()) {
            return redirect(404);
        }
        return $this->checkModel($id, $name, 1);
    }

    public function suspendBusiness($id, $name)
    {
        if (!Auth::check()) {
            return redirect(404);
        }
        return $this->checkModel($id, $name, 0);

    }

    public function checkModel($id, $name, $status)
    {
        switch ($name) {
            case "restaurant":
                Restaurant::where('id', $id)->update(['status' => $status]);
                break;
            case "hotel":
                Hotel::where('id', $id)->update(['status' => $status]);
                break;
            case "venue":
                Venue::where('id', $id)->update(['status' => $status]);
                break;
            case "tour":
                Tour::where('id', $id)->update(['status' => $status]);
                break;
            case "vehicle":
                Vehicle::where('id', $id)->update(['status' => $status]);
                break;
            default:
                return back()->with(['error' => 'No correct model can be found to insert ']);
                break;
        }
    }
}
