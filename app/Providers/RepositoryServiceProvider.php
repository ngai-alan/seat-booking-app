<?php 

namespace App\Providers;

use App\Repository\BookingRepository;
use App\Repository\EloquentRepositoryInterface;
use App\Repository\EmployeeRepository; 
use App\Repository\Eloquent\EmployeeRepositoryImpl;
use App\Repository\OfficeRepository;
use App\Repository\Eloquent\OfficeRepositoryImpl;
use App\Repository\SeatRepository; 
use App\Repository\Eloquent\SeatRepositoryImpl;
use App\Repository\TimeslotRepository; 
use App\Repository\Eloquent\TimeslotRepositoryImpl;
use App\Repository\Eloquent\BaseRepository;
use App\Repository\Eloquent\BookingRepositoryImpl;
use Illuminate\Support\ServiceProvider; 

/** 
* Class RepositoryServiceProvider 
* @package App\Providers 
*/ 
class RepositoryServiceProvider extends ServiceProvider 
{ 
   /** 
    * Register services. 
    * 
    * @return void  
    */ 
   public function register() 
   { 
       $this->app->bind(EloquentRepository::class, BaseRepositoryImpl::class);
       $this->app->bind(EmployeeRepository::class, EmployeeRepositoryImpl::class);
       $this->app->bind(OfficeRepository::class, OfficeRepositoryImpl::class);
       $this->app->bind(SeatRepository::class, SeatRepositoryImpl::class);
       $this->app->bind(TimeslotRepository::class, TimeslotRepositoryImpl::class);
       $this->app->bind(BookingRepository::class, BookingRepositoryImpl::class);
   }
}