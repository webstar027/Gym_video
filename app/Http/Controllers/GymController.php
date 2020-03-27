<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Services\GymService;


class GymController extends Controller
{
    protected $gymservice;

     /**
     * constructor
     *
     * @param GymService $gymservice
     */
	public function __construct(GymService $gymservice)
	{
        $this->gymservice = $gymservice;
    }

    /**
     * Post video.
     *
	 * @param Illuminate\Http\Request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function search(Request $request)
    {
        $user = $request->user();
        $all = $this->gymservice->index();

        $sub_gyms = $user->gyms;

        foreach($all as $key=> $gym)
        {
            $sub = $sub_gyms->find($gym->id);
            
            if ($sub)
            {
                $gym->status = $sub->pivot->status;
                $gym->time = $sub->pivot->updated_at;
            }

            $gym->owner = $this->gymservice->getGymOwner($gym->owner_id);
        }

        return view('addgym', ['allgyms'=>$all]);
    }

    public function request_access(request $request, $gym_id){

        $this->gymservice->update($request, $gym_id);
    }

    public function request_cancel(request $request, $gym_id){

        $this->gymservice->update($request, $gym_id);
    }
    /**
     * Get videos of this gym
     *
     * @param integer
     * @return \Illuminate\Contracts\Support\Renderable
     */    
	public function gymvideos($gym_id)
	{
        $videos = $this->gymservice->read($gym_id)->videos;
        return view('viewvideos', ['videos' => $videos, 'gym_id' => $gym_id]);
    }
    public function gymview($gym_id){
        $data = $this->gymservice->read($gym_id);
        return view('viewgym',$data);
    }
}
