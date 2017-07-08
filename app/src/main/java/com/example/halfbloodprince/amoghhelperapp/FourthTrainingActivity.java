package com.example.halfbloodprince.amoghhelperapp;

import android.app.DatePickerDialog;
import android.content.Intent;
import android.support.v4.app.DialogFragment;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.TextView;

import java.util.Random;

public class FourthTrainingActivity extends AppCompatActivity implements DatePickerDialog.OnDateSetListener{
    EditText qDatePickerBtn4;
    TextView qResult4,qLabel4;
    Button qNextButton4;
    int minYear=2001, yearMod=20, monthMod=12, dayMod=30;
    String displayDate;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_fourth_training);
        qDatePickerBtn4 = (EditText) findViewById(R.id.dateChooserBtn);
        qResult4 = (TextView)  findViewById(R.id.qResult4);
        qLabel4 = (TextView)  findViewById(R.id.qLabel4);
        qNextButton4 = (Button) findViewById(R.id.qNextButton4);
        Random rn= new Random();

        qDatePickerBtn4.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                DialogFragment newFragment = new DatePickerFragment();
                newFragment.show(getSupportFragmentManager(), "datePicker");
            }
        });
        int chosenYear = minYear +rn.nextInt(yearMod+1);
        int chosenMonth= 1+rn.nextInt(monthMod+1);
        int chosenDay=1+rn.nextInt(dayMod+1);
        if(chosenMonth==2){ chosenDay=1+rn.nextInt(29);}
        displayDate= ""+chosenDay+"/"+chosenMonth+"/"+chosenYear;
        qLabel4.setText("Choose the date: "+displayDate+ " (dd/mm/yyyy).");
        qNextButton4.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                startActivity(new Intent(FourthTrainingActivity.this,FifthTrainingActivity.class));
            }
        });
    }

    @Override
    public void onDateSet(DatePicker view, int year, int month, int dayOfMonth) {
         String finalDate=new StringBuilder().append(dayOfMonth).append("/")
                 .append(month+1).append("/").append(year).toString();
        qDatePickerBtn4.setText(new StringBuilder().append(dayOfMonth).append("/")
                .append(month+1).append("/").append(year));
        if(finalDate.equals(displayDate)){
            qResult4.setVisibility(View.VISIBLE);
            qResult4.setTextColor(getResources().getColor(R.color.colorGreen));
            qResult4.setCompoundDrawablesWithIntrinsicBounds(R.drawable.ic_check_circle_black_24dp,0,0,0);
            qResult4.setText(R.string.correct_answer);
            qNextButton4.setClickable(true);
            qNextButton4.setEnabled(true);
        }
        else{
            qResult4.setVisibility(View.VISIBLE);
            qResult4.setTextColor(getResources().getColor(R.color.colorRed));
            qResult4.setCompoundDrawablesWithIntrinsicBounds(R.drawable.ic_close_black_24dp,0,0,0);
            qResult4.setText(R.string.incorrect_answer);
            qNextButton4.setClickable(false);
            qNextButton4.setEnabled(false);
        }
    }
}
