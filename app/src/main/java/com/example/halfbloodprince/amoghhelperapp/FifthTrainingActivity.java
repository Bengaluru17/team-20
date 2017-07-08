package com.example.halfbloodprince.amoghhelperapp;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

import java.util.Random;

public class FifthTrainingActivity extends AppCompatActivity {
    Button qNextButton5;
    EditText timePickerBtn;
    TextView qResult5, qLabel5;
    int hourMod=24, minuteMod=60;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_fifth_training);
        qResult5 = (TextView) findViewById(R.id.qResult5);
        qLabel5 = (TextView) findViewById(R.id.qLabel5);
        timePickerBtn = (EditText) findViewById(R.id.timeChooserBtn);
        Random rn= new Random();
        int chosenHours =rn.nextInt(hourMod);
        int chosenMinutes=rn.nextInt(minuteMod);
        qLabel5.setText("Choose time: "+chosenHours+":"+chosenMinutes);

        qNextButton5= (Button) findViewById(R.id.qNextButton5);

        qNextButton5.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

            }
        });
    }
}
