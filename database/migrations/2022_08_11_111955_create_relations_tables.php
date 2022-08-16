<?php

    use App\Models\Room;
    use App\Models\School;
    use App\Models\Student;
    use App\Models\Subject;
    use App\Models\Teacher;
    use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelationsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_teacher', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->references('id')->on('schools')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('teacher_id')->references('id')->on('teachers')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('subject_teacher', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subject_id')->references('id')->on('subjects')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('teacher_id')->references('id')->on('teachers')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('room_subject', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subject_id')->references('id')->on('subjects')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('room_id')->references('id')->on('rooms')->onUpdate('cascade')->onDelete('cascade');
            $table->date('time');
            $table->timestamps();
        });
        Schema::create('student_subject', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subject_id')->references('id')->on('subjects')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('student_id')->references('id')->on('students')->onUpdate('cascade')->onDelete('cascade');
            $table->double('mark');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('school_teacher');
        Schema::dropIfExists('subject_teacher');
        Schema::dropIfExists('room_subject');
        Schema::dropIfExists('student_subject');
    }
}
