<?php namespace Bantenprov\DashboardApel\Http\Controllers;

/* require */
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\DashboardApel\Facades\DashboardApel;

/* Models */
use Bantenprov\DashboardApel\Models\Bantenprov\DashboardApel\DashboardApel as PdrbModel;
use Bantenprov\DashboardApel\Models\Bantenprov\DashboardApel\Province;
use Bantenprov\DashboardApel\Models\Bantenprov\DashboardApel\Regency;

/* etc */
use Validator;

/**
 * The DashboardApelController class.
 *
 * @package Bantenprov\DashboardApel
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class DashboardApelController extends Controller
{

    protected $province;

    protected $regency;

    protected $dashboard_apel;

    public function __construct(Regency $regency, Province $province, PdrbModel $dashboard_apel)
    {
        $this->regency  = $regency;
        $this->province = $province;
        $this->dashboard_apel     = $dashboard_apel;
    }

    public function index(Request $request)
    {
        /* todo : return json */

        return 'index';

    }

    public function create()
    {

        return response()->json([
            'provinces' => $this->province->all(),
            'regencies' => $this->regency->all()
        ]);
    }

    public function show($id)
    {

        $dashboard_apel = $this->dashboard_apel->find($id);

        return response()->json([
            'negara'    => $dashboard_apel->negara,
            'province'  => $dashboard_apel->getProvince->name,
            'regencies' => $dashboard_apel->getRegency->name,
            'tahun'     => $dashboard_apel->tahun,
            'data'      => $dashboard_apel->data
        ]);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'negara'        => 'required',
            'province_id'   => 'required',
            'regency_id'    => 'required',
            'kab_kota'      => 'required',
            'tahun'         => 'required|integer',
            'data'          => 'required|integer',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'title'     => 'error',
                'message'   => 'add failed',
                'type'      => 'failed',
                'errors'    => $validator->errors()
            ]);
        }

        $check = $this->dashboard_apel->where('regency_id',$request->regency_id)->where('tahun',$request->tahun)->count();

        if($check > 0)
        {
            return response()->json([
                'title'         => 'error',
                'message'       => 'Data allready exist',
                'type'          => 'failed',
            ]);

        }else{
            $data = $this->dashboard_apel->create($request->all());

            return response()->json([
                    'type'      => 'success',
                    'title'     => 'success',
                    'id'      => $data->id,
                    'message'   => 'PDRB '. $this->regency->find($request->regency_id)->name .' tahun '. $request->tahun .' successfully created',
                ]);
        }

    }

    public function update(Request $request, $id)
    {
        /* todo : return json */
        return '';

    }

    public function destroy($id)
    {
        /* todo : return json */
        return '';

    }
}

