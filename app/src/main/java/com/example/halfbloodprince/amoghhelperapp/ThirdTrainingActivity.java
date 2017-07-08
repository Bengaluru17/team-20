package com.example.halfbloodprince.amoghhelperapp;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.Button;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.TextView;

import org.w3c.dom.Text;

import java.util.Random;
import java.util.concurrent.ThreadLocalRandom;

public class ThirdTrainingActivity extends AppCompatActivity {
    RadioGroup rGroup1;
    TextView qLabel3,qResult3;
    RadioButton option1, option2, option3, option4;
    Button qNextButton3;
    String[][] questionArrays= {{"Japan","India","Australia", "Mexico"},
            {"Train","Bicycle","Bus","Bicycle"},{"Ram", "Rohit","Shyam","Sumit"},{"Bulb","Ketley","Trimmer","Geyser"}};
    int number1,number2;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_third_training);
        Random rand1=new Random();
        Random rand2=new Random();
        number1 = rand1.nextInt((questionArrays.length) + 1);
        number2 = rand2.nextInt((questionArrays.length) + 1);
        qLabel3 = (TextView) findViewById(R.id.qLabel3);
        qNextButton3 = (Button) findViewById(R.id.qNextButton3);
        option1 = (RadioButton) findViewById(R.id.radioOption1);
        option2 = (RadioButton) findViewById(R.id.radioOption2);
        option3 = (RadioButton) findViewById(R.id.radioOption3);
        option4 = (RadioButton) findViewById(R.id.radioOption4);
    }
}
