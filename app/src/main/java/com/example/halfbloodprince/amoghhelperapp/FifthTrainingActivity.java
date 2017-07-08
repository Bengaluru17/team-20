package com.example.halfbloodprince.amoghhelperapp;

import android.app.TimePickerDialog;
import android.support.v4.app.DialogFragment;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.TimePicker;

import java.util.Random;

public class FifthTrainingActivity extends AppCompatActivity implements TimePickerDialog.OnTimeSetListener {
    Button qNextButton5;
    EditText timePickerBtn;
    TextView qResult5, qLabel5;
    int hourMod=24, minuteMod=60;
    String resultTime;
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
        resultTime= chosenHours+":"+chosenMinutes;
        qLabel5.setText("Choose time: "+resultTime);
        timePickerBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                DialogFragment newFragment = new TimePickerFragment();
                newFragment.show(getSupportFragmentManager(), "timePicker");
            }
        });
        qNextButton5= (Button) findViewById(R.id.qNextButton5);

        qNextButton5.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

            }
        });
    }
    @Override
    public void  onTimeSet(TimePicker view, int hourOfDay, int minute) {
        String displayTime= hourOfDay+":"+minute;
        timePickerBtn.setText(new StringBuilder().append(hourOfDay).append(":")
                .append(minute));
        if(displayTime.equals(resultTime)){
            qResult5.setVisibility(View.VISIBLE);
            qResult5.setTextColor(getResources().getColor(R.color.colorGreen));
            qResult5.setCompoundDrawablesWithIntrinsicBounds(R.drawable.ic_check_circle_black_24dp,0,0,0);
            qResult5.setText(R.string.correct_answer);
            qNextButton5.setClickable(true);
            qNextButton5.setEnabled(true);
        }
        else{
            qResult5.setVisibility(View.VISIBLE);
            qResult5.setTextColor(getResources().getColor(R.color.colorRed));
            qResult5.setCompoundDrawablesWithIntrinsicBounds(R.drawable.ic_close_black_24dp,0,0,0);
            qResult5.setText(R.string.incorrect_answer);
            qNextButton5.setClickable(false);
            qNextButton5.setEnabled(false);
        }


    }
}
