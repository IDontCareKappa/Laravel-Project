<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{

    /**
     * Asigning all values of Post object
     *
     * @param int $userId
     * @param string $message
     * @param string $title
     * @param double $grade
     * @param int $gradeCount
     * @param int $gradeSum
     * @param string $usersThatAddedGrade
     */
    public function fillAttributes($userId, $message, $title,
                                $grade, $gradeCount, $gradeSum,
                                $usersThatAddedGrade)
    {
        $this->user_id = $userId;
        $this->message = $message;
        $this->title = $title;
        $this->grade = $grade;
        $this->grade_count = $gradeCount;
        $this->grade_sum = $gradeSum;
        $this->users_that_added_grade = $usersThatAddedGrade;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }



    public function getUsersThatAddedGrade()
    {
        return json_decode($this->users_that_added_grade);
    }

    public function isUserAddedGrade()
    {
        $usersThatAddedGrade = $this->getUsersThatAddedGrade();
        if ($usersThatAddedGrade == null){
            return false;
        } else {
            return in_array(Auth::user()->id, $usersThatAddedGrade);
        }
    }

    public function updatePostGrade($grade)
    {
        $this->grade_count++;
        $this->grade_sum += $grade;
        $this->grade = round($this->grade_sum / $this->grade_count, 2);
    }

    public function addUserToPost($userId){
        $usersThatAddedGrade = $this->getUsersThatAddedGrade();
        if ($usersThatAddedGrade == null){
            $usersThatAddedGrade = array();
        }
        array_push($usersThatAddedGrade, $userId);
        $this->users_that_added_grade = json_encode($usersThatAddedGrade);
        $this->save();
    }

    use HasFactory;
}
