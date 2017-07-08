package com.example.halfbloodprince.amoghhelperapp;

import android.app.TimePickerDialog;
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
import android.widget.EditText;
import android.widget.TextView;
import android.widget.TimePicker;

import java.util.Random;

public class FifthTrainingActivity extends AppCompatActivity implements TimePickerDialog.OnTimeSetListener,
    NavigationView.OnNavigationItemSelectedListener{
    Button qNextButton5;
    EditText timePickerBtn;
    TextView qResult5, qLabel5;
    int hourMod=24, minuteMod=60;
    String resultTime;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_fifth_training);

        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);
        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(
                this, drawer, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close);
        drawer.setDrawerListener(toggle);
        toggle.syncState();
        NavigationView navigationView = (NavigationView) findViewById(R.id.nav_view);
        navigationView.setNavigationItemSelectedListener(this);

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
        if (id == R.id.action_settings) {
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
            startActivity(new Intent(FifthTrainingActivity.this,FirstTrainingActivity.class));
        } else if(id==R.id.level2){
            startActivity(new Intent(FifthTrainingActivity.this,SecondTrainingActivity.class));
        } else if(id==R.id.level3){
            startActivity(new Intent(FifthTrainingActivity.this,ThirdTrainingActivity.class));
        } else if(id==R.id.level4){
            startActivity(new Intent(FifthTrainingActivity.this,FourthTrainingActivity.class));
        } else if(id==R.id.level5){
        }

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        drawer.closeDrawer(GravityCompat.START);
        return true;
    }
}
