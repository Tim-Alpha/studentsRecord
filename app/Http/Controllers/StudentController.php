<?php

namespace App\Http\Controllers;

use App\Jobs\StudenRegistrationProcess;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function insert() {
        return view('upload_csv');
    }
    public function upload() {
        if (request()->has('mycsv')) {
            $data = file(request()->mycsv);

            // dividing files into smaller chunks
            $chunks = array_chunk($data, 10);

            $header = [];
            $batch = Bus::batch([])->dispatch();

            foreach ($chunks as $key => $value) {
                $data = array_map('str_getcsv', $value);

                if ($key === 0) {
                    $header = $data[0];
                    $header[0] = str_replace("\u{FEFF}", '', $header[0]);
                    unset($data[0]);
                }
                $batch->add(new StudenRegistrationProcess($data, $header));
            }
            return $data;
        }
        return 'please upload file';
    }

    public function batch()
    {
        $batchId = request('id');
        return Bus::findBatch($batchId);
    }

    public function batchInProgress()
    {
        $batches = DB::table('job_batches')->where('pending_jobs', '>', 0)->get();
        if (count($batches) > 0) {
            return Bus::findBatch($batches[0]->id);
        }

        return [];
    }
}
