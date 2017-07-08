package com.example.halfbloodprince.amoghhelperapp;

import android.content.Intent;
import android.support.annotation.IdRes;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.TextView;
import java.util.Random;

public class ThirdTrainingActivity extends AppCompatActivity {
    RadioGroup rGroup1;
    TextView qLabel3,qResult3;
    RadioButton option1, option2, option3, option4;
    Button qNextButton3;
    String[][] questionArrays= {{"Japan","India","Australia", "Mexico"},
            {"Train","Car","Bus","Bicycle"},{"Ram", "Rohit","Shyam","Sumit"},{"Bulb","Ketley","Trimmer","Geyser"}};
    int number1,number2;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_third_training);
        Random rn= new Random();
        int n = questionArrays.length ;
        number1 = rn.nextInt(n);
        number2= rn.nextInt(n);

        rGroup1= (RadioGroup) findViewById(R.id.radioButtonGroup);
        qLabel3 = (TextView) findViewById(R.id.qLabel3);
        qNextButton3 = (Button) findViewById(R.id.qNextButton3);
        qResult3 = (TextView) findViewById(R.id.qResult3);
        option1 = (RadioButton) findViewById(R.id.radioOption1);
        option2 = (RadioButton) findViewById(R.id.radioOption2);
        option3 = (RadioButton) findViewById(R.id.radioOption3);
        option4 = (RadioButton) findViewById(R.id.radioOption4);

        qLabel3.setText("Select option '"+questionArrays[number1][number2]+"' from the options.");
        option1.setText(questionArrays[number1][0]);
        option2.setText(questionArrays[number1][1]);
        option3.setText(questionArrays[number1][2]);
        option4.setText(questionArrays[number1][3]);

        rGroup1.setOnCheckedChangeListener(new RadioGroup.OnCheckedChangeListener() {
            @Override
            public void onCheckedChanged(RadioGroup radioGroup, @IdRes int i) {
                int checkVar=0;
                switch(i){
                    case R.id.radioOption1:
                        if (number2==0) checkVar=1;
                        break;
                    case R.id.radioOption2:
                        if (number2==1) checkVar=1;
                        break;
                    case R.id.radioOption3:
                        if (number2==2) checkVar=1;
                        break;
                    case R.id.radioOption4:
                        if (number2==3) checkVar=1;
                        break;
                    default:
                        break;
                }
                if(checkVar==1){
                    qResult3.setVisibility(View.VISIBLE);
                    qResult3.setTextColor(getResources().getColor(R.color.colorGreen));
                    qResult3.setCompoundDrawablesWithIntrinsicBounds(R.drawable.ic_check_circle_black_24dp,0,0,0);
                    qResult3.setText(R.string.correct_answer);
                    qNextButton3.setClickable(true);
                    qNextButton3.setEnabled(true);
                }
                else{
                    qResult3.setVisibility(View.VISIBLE);
                    qResult3.setTextColor(getResources().getColor(R.color.colorRed));
                    qResult3.setCompoundDrawablesWithIntrinsicBounds(R.drawable.ic_close_black_24dp,0,0,0);
                    qResult3.setText(R.string.incorrect_answer);
                    qNextButton3.setClickable(false);
                    qNextButton3.setEnabled(false);
                }
            }
        });
        qNextButton3.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                startActivity(new Intent(ThirdTrainingActivity.this, FourthTrainingActivity.class));
            }
        });
    }
}
