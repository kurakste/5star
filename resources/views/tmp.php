
        
Question -------------------
            Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('object_id');
            $table->String('Question');
            $table->foreign('object_id')->references('id')->on('objects')->onDelete('cascade')->onUpdate('cascade');
        });

Answer ----------------------

        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('feedback_id');
            $table->unsignedInteger('question_id');
            $table->Integer('Answer');
            $table->foreign('question_id')->references('id')->on('question')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('feedback_id')->references('id')->on('feedbacks')->onDelete('cascade')->onUpdate('cascade');
