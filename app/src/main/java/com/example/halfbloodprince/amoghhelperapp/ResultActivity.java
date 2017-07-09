package com.example.halfbloodprince.amoghhelperapp;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.TextView;

import org.w3c.dom.Text;

public class ResultActivity extends AppCompatActivity {
    TextView correctResponse,incorrectResponse,finalScore, accuracyResponse;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_result);
        correctResponse = (TextView) findViewById(R.id.resultTxt3);
        incorrectResponse = (TextView) findViewById(R.id.resultTxt4);
        accuracyResponse= (TextView) findViewById(R.id.resultTxt5);
        finalScore = (TextView) findViewById(R.id.resultTxt6);

        correctResponse.setText("No. of correct attempts: "+Constants.getCorrect());
        incorrectResponse.setText("No. of incorrect attempts: "+Constants.getIncorrect());
        double accuracy= Constants.getCorrect()*100/(Constants.getIncorrect()+Constants.getCorrect());
        int fAccuracy= (int)accuracy;
        finalScore.setText("Final Score: "+Constants.getScore());
        accuracyResponse.setText("Accuracy: "+fAccuracy+"%");




    }
}
