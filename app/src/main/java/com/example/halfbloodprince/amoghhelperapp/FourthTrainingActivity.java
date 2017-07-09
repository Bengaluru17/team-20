package com.example.halfbloodprince.amoghhelperapp;

import android.app.DatePickerDialog;
import android.content.Intent;
import android.support.design.widget.NavigationView;
import android.support.v4.app.DialogFragment;
import android.support.v4.view.GravityCompat;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.Toolbar;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.TextView;

import java.util.Random;

public class FourthTrainingActivity extends AppCompatActivity implements DatePickerDialog.OnDateSetListener
    ,NavigationView.OnNavigationItemSelectedListener{
    EditText qDatePickerBtn4;
    TextView qResult4,qLabel4,scoreButton4;
    Button qNextButton4;
    int minYear=2001, yearMod=20, monthMod=12, dayMod=30;
    String displayDate;
    int chosenYear, chosenMonth, chosenDay;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_fourth_training);

        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);
        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(
                this, drawer, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close);
        drawer.setDrawerListener(toggle);
        toggle.syncState();
        NavigationView navigationView = (NavigationView) findViewById(R.id.nav_view);
        navigationView.setNavigationItemSelectedListener(this);

        qDatePickerBtn4 = (EditText) findViewById(R.id.dateChooserBtn);
        qResult4 = (TextView)  findViewById(R.id.qResult4);
        qLabel4 = (TextView)  findViewById(R.id.qLabel4);
        qNextButton4 = (Button) findViewById(R.id.qNextButton4);
        scoreButton4 = (TextView) findViewById(R.id.scoreButton4);
        Random rn= new Random();
        scoreButton4.setText("Score: "+Constants.getScore());
        qDatePickerBtn4.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                DialogFragment newFragment = new DatePickerFragment();
                newFragment.show(getSupportFragmentManager(), "datePicker");
            }
        });
        chosenYear = minYear +rn.nextInt(yearMod+1);
        chosenMonth= 1+rn.nextInt(monthMod);
        chosenDay=1+rn.nextInt(dayMod);
        if(chosenMonth==2){ chosenDay=1+rn.nextInt(28);}
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
            Constants.increaseScore(50);
            Constants.increaseCorrect();
        }
        else {
            qResult4.setVisibility(View.VISIBLE);
            qResult4.setCompoundDrawablesWithIntrinsicBounds(R.drawable.ic_close_black_24dp,0,0,0);
            if(year!=chosenYear) {
                qResult4.setText("Incorrect year chosen!");
                qResult4.setTextColor(getResources().getColor(R.color.colorYellow));
            }
            else if(month+1!=chosenMonth) {
                qResult4.setText("Incorrect month chosen!");
                qResult4.setTextColor(getResources().getColor(R.color.colorYellow));
            }
            else {
                qResult4.setText("Incorrect date chosen!");
                qResult4.setTextColor(getResources().getColor(R.color.colorRed));
            }
            qNextButton4.setClickable(false);
            qNextButton4.setEnabled(false);
            Constants.decreaseScore(10);
            Constants.increaseIncorrect();
        }
        scoreButton4.setText("Score: "+Constants.getScore());
    }

    @Override
    public void onBackPressed() {
        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        if (drawer.isDrawerOpen(GravityCompat.START)) {
            drawer.closeDrawer(GravityCompat.START);
        } else {
            super.onBackPressed();
        }
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.first_training, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_score) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }

    @SuppressWarnings("StatementWithEmptyBody")
    @Override
    public boolean onNavigationItemSelected(MenuItem item) {
        // Handle navigation view item clicks here.
        int id = item.getItemId();

        if (id == R.id.level1) {
            startActivity(new Intent(FourthTrainingActivity.this,FirstTrainingActivity.class));
        } else if(id==R.id.level2){
            startActivity(new Intent(FourthTrainingActivity.this,SecondTrainingActivity.class));
        } else if(id==R.id.level3){
            startActivity(new Intent(FourthTrainingActivity.this,ThirdTrainingActivity.class));
        } else if(id==R.id.level4){
        } else if(id==R.id.level5){
            startActivity(new Intent(FourthTrainingActivity.this,FifthTrainingActivity.class));
        }

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        drawer.closeDrawer(GravityCompat.START);
        return true;
    }

}
