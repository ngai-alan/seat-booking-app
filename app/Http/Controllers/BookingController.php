<?php
namespace App\Http\Controllers;

use App\Repository\EmployeeRepository;
use App\Repository\OfficeRepository;
use App\Repository\SeatRepository;
use App\Repository\TimeslotRepository;
use App\Repository\BookingRepository;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    private $officeRepo;
    private $employeeRepo;
    private $seatRepo;
    private $timeslotRepo;
    private $bookingRepo;

    /**
     * Inject Required Repository
     *
     * @param OfficeRepository $officeRepo
     * @param EmployeeRepository $employeeRepo
     * @param SeatRepository $seatRepo
     */
    public function __construct(OfficeRepository $officeRepo, EmployeeRepository $employeeRepo, 
    SeatRepository $seatRepo, TimeslotRepository $timeslotRepo, BookingRepository $bookingRepo)
    {
        $this->officeRepo = $officeRepo;
        $this->employeeRepo = $employeeRepo;
        $this->seatRepo = $seatRepo;
        $this->timeslotRepo = $timeslotRepo;
        $this->bookingRepo = $bookingRepo;
    }

    public function selectOfficeEmployee(Request $request)
    {
        $offices = $this->officeRepo->getAll();
        $employees = $this->employeeRepo->getAll();

        return view('booking.selectOfficeEmployee', [
            'employees' => $employees,
            'offices' => $offices
        ]);
    }

    public function selectTimeslot(Request $request)
    {
        $validatedData = $this->validete($request);

        $employeeId = $validatedData['employee_id'];
        $officeId = $validatedData['office_id'];
        $bookingDate = $validatedData['booking_date'];
        $timeslots = $this->timeslotRepo->getAll();
        $employee = $this->employeeRepo->find($employeeId);
        $office = $this->officeRepo->find($officeId);

        if ($this->isWeekend($validatedData['booking_date'])) {
            return back()->withErrors(['booking_date' => 'Please Select a Business day']);
        }

        $seats = $this->seatRepo->getSeatWithBooking($officeId, $bookingDate);

        return view('booking.selectTimeslot', [
            'seats' => $seats,
            'employee_id' => $employeeId,
            'employee_name' => $employee->first_name . ' ' . $employee->last_name,
            'office_name' => $office->name,
            'timeslots' => $timeslots,
            'booking_date' => $bookingDate
        ]);
    }

    public function reserve(Request $request)
    {
        $validatedData = $this->validateReserve($request);

        $this->bookingRepo->create($validatedData);

        $timeslot = $this->timeslotRepo->find($validatedData['timeslot_id']);

        $message = 'Seat is reserved for you at ' . $timeslot->name . '(' . $validatedData['booking_date'] . ')';

        $request->session()->flash('message', $message);

        return redirect('/booking/select-office-and-employee');
    }

    private function validete(Request $request)
    {
        $validatedData = $request->validate([
            'employee_id' => ['required', 'exists:employees,id'],
            'office_id' => ['required', 'exists:offices,id'],
            'booking_date' => ['required', 'date', 'after_or_equal:today']
        ]);

        return $validatedData;
    }

    public function validateReserve(Request $request)
    {
        $validated = $request->validate([
            'seat_id' => ['required', 'exists:seats,id'],
            'timeslot_id' => ['required', 'exists:timeslots,id'],
            'employee_id' => ['required', 'exists:employees,id'],
            'booking_date' => ['required', 'date']
        ]);

        return $validated;
    }

    public function isWeekend($date)
    {
        if(date('N', strtotime($date)) >= 6) {
            return true;
        } else {
            return false;
        }
    }
}