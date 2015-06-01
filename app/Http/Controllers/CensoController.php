<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;

class CensoController extends Controller {

	public function censo($p)
        {
            $p = (int)$p;

		switch($p){
			case 3:  
				$piso = 1;
				break;
			case 7:
				$piso = 4;
				break;
			default:
				$piso = 0;
		}
            $info = DB::connection('sqlsrv_censo')->select(
                    "SELECT 
			MAEPAB1.MPNumC, 
			MAEPAB1.MPUced, 
			MAEPAB1.MPUDoc, 
			CAPBAS.MPNom1, 
			CAPBAS.MPNom2, 
			CAPBAS.MPApe1, 
			CAPBAS.MPApe2, 
			MAEPAB1.MPFchI, 
			CAPBAS.MPFchN, 
			datediff(year, MPFchN, MPFchI) AS EDAD, 
			CAPBAS.MPSexo, 
			MAEPAB1.MPCtvIn, 
			MAEPAB1.MPUdx, 
			MAEDIA.DMNomb, 
			INGRESOS.IngNit, 
			MAEEMP.MENOMB
			FROM ((((MAEPAB INNER JOIN MAEPAB1 ON MAEPAB.MPCodP = MAEPAB1.MPCodP) LEFT JOIN CAPBAS ON (MAEPAB1.MPUDoc = CAPBAS.MPTDoc) AND (MAEPAB1.MPUced = CAPBAS.MPCedu)) LEFT JOIN MAEDIA ON MAEPAB1.MPUdx = MAEDIA.DMCodi) LEFT JOIN INGRESOS ON (MAEPAB1.MPCtvIn = INGRESOS.IngCsc) AND (MAEPAB1.MPUDoc = INGRESOS.MPTDoc) AND (MAEPAB1.MPUced = INGRESOS.MPCedu)) LEFT JOIN MAEEMP ON INGRESOS.IngNit = MAEEMP.MENNIT
			WHERE (((MAEPAB.MPCodP)=" . $p . ") AND ((MAEPAB1.MPDisp)=1) AND ((MAEPAB1.MPActCam)='N'))
			ORDER BY MAEPAB.MPCodP, MAEPAB1.MPNumC"
                    );
            
            if (!$info) {
			fail('404');
		}
                
            return view('censos.censo', compact('info', 'piso'));
        }
}

