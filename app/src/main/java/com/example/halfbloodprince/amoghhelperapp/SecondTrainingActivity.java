package com.example.halfbloodprince.amoghhelperapp;

import android.content.Intent;
import android.graphics.drawable.Drawable;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.Spinner;
import android.widget.TextView;

import static java.security.AccessController.getContext;

public class SecondTrainingActivity extends AppCompatActivity {
    Spinner qSpinner2;
    TextView qResult2;
    Button qNextButton2;
    String options[]={"Phone call","Mail","Message","Skype"};

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_second_training);
        qResult2 = (TextView)  findViewById(R.id.qResult2);
        qSpinner2 = (Spinner) findViewById(R.id.qSpinner2);
        qNextButton2 = (Button) findViewById(R.id.qNextButton2);

        ArrayAdapter<CharSequence> adapter = ArrayAdapter.createFromResource(this,
                R.array.options_array, android.R.layout.simple_spinner_item);
        adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        qSpinner2.setAdapter(adapter);
        qSpinner2.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
            @Override
            public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
                if(options[position].equals("Mail")) {
                    qResult2.setVisibility(View.VISIBLE);
                    qResult2.setTextColor(getResources().getColor(R.color.colorGreen));
                    qResult2.setCompoundDrawablesWithIntrinsicBounds(R.drawable.ic_check_circle_black_24dp,0,0,0);
                    qResult2.setText(R.string.correct_answer);
                    qNextButton2.setClickable(true);
                }
                else {
                    qResult2.setVisibility(View.VISIBLE);
                    qResult2.setTextColor(getResources().getColor(R.color.colorRed));
                    qResult2.setCompoundDrawablesWithIntrinsicBounds(R.drawable.ic_close_black_24dp,0,0,0);
                    qResult2.setText(R.string.incorrect_answer);
                    qNextButton2.setClickable(false);
                }
            }

            @Override
            public void onNothingSelected(AdapterView<?> parent) {
            }
        });
        qNextButton2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                startActivity(new Intent(SecondTrainingActivity.this,ThirdActivity.class));
            }
        });
    }
}
