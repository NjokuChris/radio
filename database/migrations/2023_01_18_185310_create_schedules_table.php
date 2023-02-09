<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('station_id');
            $table->foreign('station_id')->references('id')->on('stations')->onDelete('cascade');

            $table->string('EnabledEvent')->default('False');
            $table->string('UseDate')->default('False');
            $table->string('AdditionalTime')->nullable();
            $table->string('EveryYear')->default('False');
            $table->string('Imm')->default('True');
            $table->string('Above')->default('False');
            $table->string('FileName');
            $table->string('MuteLev')->default('50');
            $table->string('DelPrev')->default('True');
            $table->string('DoNotRunIfStopped')->default('False');
            $table->string('bRepeat')->default('False');
            $table->string('nRepeatPer')->default('10');
            $table->string('DoNotMarkAsScheduled')->default('False');
            $table->string('nRepeat')->default('1');
            $table->string('RepeatLimit')->default('False');
            $table->string('Shuffle')->default('False');
            $table->string('PausePlaylist')->default('False');
            $table->string('UseWeeks')->default('False');
            $table->string('Enqueue')->default('False');
            $table->string('DelTaskAction')->default('2');
            $table->string('DelTaskUseDate')->default('True');
            $table->string('DelTaskEveryYear')->default('True');
            $table->string('TaskName')->nullable();
            $table->string('ClearMainPlaylist')->default('False');
            $table->string('AddToPlaylistEnd')->default('False');
            $table->string('UseDaysOfWeek')->default('False');
            $table->string('Hours')->nullable();
            $table->string('Minutes')->nullable();
            $table->string('Seconds')->nullable();
            $table->string('IsDurationLimit')->default('False');
            $table->string('DurationLimit')->default('10');
            $table->string('TimeType')->default('0');
            $table->string('TaskNameAsTitle')->default('False');
            $table->string('ItemImageIndex')->default('11');
            $table->string('FontColor')->default('15395562');
            $table->string('BackColor')->default('1644825');
            $table->string('GroupName')->nullable();
            $table->string('OverrideRelay')->default('False');
            $table->string('DTMFOn')->default('False');
            $table->string('DTMFString')->nullable();
            $table->string('DTMFOnly')->default('False');
            $table->string('DTMFExitOn')->default('False');
            $table->string('DTMFExitString')->nullable();
            $table->string('MaxTimeWaitOn')->default('False');
            $table->string('MaxTimeWaitSec')->default('0');
            $table->string('MaxTimeWaitAction')->default('0');
            $table->string('TimeToStart')->nullable();
            $table->string('NextRunStr')->nullable();
            $table->string('IntTimeToStart')->default('2147483647');
            $table->string('WasStartedLast')->default('False');
            $table->string('ManualStart')->default('0');
            $table->string('UseFillers')->default('False');
            $table->string('FillersSource')->nullable();
            $table->string('FillersRecurse')->default('True');
            $table->string('FillerMaxAmount')->default('120');
            $table->string('FillerAllowMax')->default('False');
            $table->string('Days')->default('0000000');
            $table->string('Weeks');
            $table->datetime('Time');
            $table->datetime('DelTaskTime');
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
        Schema::dropIfExists('schedules');
    }
};
