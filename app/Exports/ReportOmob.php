<?php

namespace App\Exports;

use App\Reading;
use App\Level;
use App\Students;
use DB;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ReportOmob implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    //membuat parameter export data
    public function __construct(string $date, string $kelas)
    {
        $this->date = $date;
        $this->kelas = $kelas;
        $explodeDate = explode(" / ", $this->date);
        $this->d1 = $explodeDate[0];
        $this->d2 = $explodeDate[1];
    }
    // public function collection()
    // {
    //     return Reading::all();
    // }
    public function view(): View
    {

        // query data ranking
        return view('exports.adminreport', [
            'students' => DB::table('recaps')
            ->join('users','users.id','=','recaps.users_id')
            ->join('levels','levels.units_id' ,'=','recaps.units_id')
            ->join ('students','students.kelas_id','=','levels.id')
            ->where('students.kelas_id',$this->kelas)
            ->get(),
            'readings' => Reading::with('level')->where('kelas_id', $this->kelas)->whereBetween('created_at', [$this->d1, $this->d2])
                ->groupBy('users_id')->orderByRaw('SUM(total_baca) DESC')->get(),
            'levels' => Level::where('id', $this->kelas)->get()
        ]);
    }
}
