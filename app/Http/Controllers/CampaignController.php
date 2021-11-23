<?php

namespace App\Http\Controllers;

use App\Http\Requests\CampaignSearchRequest;
use App\Http\Requests\CampaignStoreRequest;
use App\Models\Campaign;
use App\Services\UserService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use function React\Promise\map;

class CampaignController extends Controller
{
    use ApiResponser;

    /**
     * @var UserService
     */
    public $userService;

    /**
     * CampaignController constructor.
     * @param $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the campaigns with pagination.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //==================[Validation of the parameters]===============START
        $rules = [
            'order' => 'in:asc,desc'
        ];

        $this->validate($request, $rules);
        //==================[Validation of the parameters]===============END

        return Campaign::orderBy('created_at', $request->order)->paginate(20);
    }

    /**
     * Store a campaign in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CampaignStoreRequest $request)
    {
        // User Validation ( Check if the user exists before creating the campaign )
        $this->userService->getUser($request->user_id);

        // Pre-processing the data for the inputs
        $inputs = $request->only(['channel', 'campaign_name', 'source', 'target_url']);

        foreach($inputs as $key => $value){
            $data[] = [
                'type' => $key,
                'value' => $value
            ];
        }

        // Create the campaigns and inputs
        return Campaign::create([
            'user_id' => $request->user_id
        ])->inputs()->insert($data);

    }

    /**
     * Sort the campaigns by one of the inputs.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(CampaignSearchRequest  $request)
    {
        // It looks like a snake
        return Campaign::join('campaign_input', 'campaigns.id', '=', 'campaign_input.campaign_id')
            ->join('inputs', 'inputs.id', '=', 'campaign_input.input_id')
            ->where('inputs.type', '=', $request->input)
            ->orderBy('inputs.value', $request->order)
            ->select('campaigns.*')
            ->with('inputs')
            ->get();
    }




}
