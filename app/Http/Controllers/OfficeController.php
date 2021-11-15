<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\OfficeRepository;
use App\Repository\SeatRepository;

class OfficeController extends Controller
{
    public $officeRepo;
    private $seatRepo;

    public function __construct(OfficeRepository $officeRepo, SeatRepository $seatRepo)
    {
        $this->officeRepo = $officeRepo;
        $this->seatRepo = $seatRepo;
    }

    /**
     * Register new office
     * 
     * If all values are validated, new office will be created
     *
     * @param Request $request
     * @return void
     */
    public function register(Request $request)
    {
        
        $validatedData = $this->validete($request);
        
        $office = $this->officeRepo->create($validatedData);

        $office->seatCount = $validatedData['numberOfSeats'];

        $this->seatRepo->createSeat($office);
        
        $request->session()->flash('message', 'New Office is created!!');
        // redirect to homepage with success message
        return redirect('/office/all');

    }

    public function showAll()
    {
        $offices = $this->officeRepo->getAll();

        foreach($offices as $office) {
            $seatCount = $this->seatRepo->getSeatCount($office->id);
            $office->seatCount = $seatCount;
        }
        
        return view('office.list', [
            'offices' => $offices,
        ]);
    }

    private function validete(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'bail|required|max:255',
            'numberOfSeats' => 'bail|required|numeric|min:1'
        ]);

        return $validatedData;
    }
}