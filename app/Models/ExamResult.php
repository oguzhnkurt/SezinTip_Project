<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id', 'exam_id', 'score'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
}
